<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Setting;
use Illuminate\Http\Request;
use Mail;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Shows all invoices
     * @return [type] [description]
     */
    public function index() {
        return view('invoices.index', [
            'invoices' => Invoice::paginate(),
        ]);
    }

    /**
     * Search Invoices
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function search(Request $request) {
        $search = $request->search;

        $clients = Client::query()
                    ->where('business_name', 'LIKE', "%{$search}%")
                    ->orWhere('surname', 'LIKE', "%{$search}%")
                    ->orWhere('first_name', 'LIKE', "%{$search}%")
                    ->get();

        $clientIds = [];

        foreach ($clients as $client) {
            $clientIds[] = $client->id;    
        }

        $invoices = Invoice::query()
                    ->where('id', 'LIKE', "%{$search}%")
                    ->orWhere(function ($query) use ($clientIds) {
                        $query->whereIn('client_id', $clientIds);
                    })
                    ->get();

        return view('invoices.search', [
            'invoices' => $invoices,
            'search' => $search
        ]);
    }

	/**
	 * Stores invoice
	 * @param  Client $client [description]
	 * @return [type]         [description]
	 */
    public function store(Request $request, Client $client) {
    	$fields['client_id'] = $request->id ? $request->id : $client->id; // If coming from /invoices/create or client screen
    	$fields['invoice_date'] = date("Y-m-d");
    	$fields['due_date'] = date('Y-m-d', strtotime($fields['invoice_date'] . "+1 month" ));

    	$invoice = Invoice::create($fields);

    	return redirect('/invoices/' . $invoice->id)->with('message', 'Invoice #'.$invoice->id.' created');
    }

    /**
     * Show the individual invoice
     * @param  Invoice $invoice [description]
     * @return [type]           [description]
     */
    public function show(Invoice $invoice) {
        return view('invoices.show', [
    		'invoice' => $invoice,
            'tax-rate' => ($invoice->account->tax_rate / 100) + 1
    	]);
    }

    /**
     * Show the edit form for invoice
     * @param  Invoice $invoice [description]
     * @return [type]           [description]
     */
    public function edit(Invoice $invoice) {
        return view('invoices.edit', [
            'invoice' => $invoice,
            'clients' => Client::all(),
            'accounts' => Account::all()
        ]);
    }

    /**
     * Updates invoice
     * @param  Request $request [description]
     * @param  Invoice $invoice [description]
     * @return [type]           [description]
     */
    public function update(Request $request, Invoice $invoice) {
        $formFields = $request->validate([
            'invoice_date' => 'required',
            'due_date' => 'required',
            'account_id' => 'required'
        ]);

        $formFields['paid'] = $request->paid;
        $formFields['hide_vat'] = $request->hide_vat;

        $invoice->update($formFields);

        return redirect('/invoices/'.$invoice->id)->with('message', 'Invoice updated');
    }

    /**
     * Show the PDF invoice
     * @param  Invoice $invoice [description]
     * @return [type]           [description]
     */
    public function pdf(Invoice $invoice) {
        $settings = new Setting;

        $pdf = PDF::loadView('invoices.pdf-new', [
            'invoice' => $invoice,
            'settings' => $settings->fetch(),
            'tax-rate' => ($invoice->account->tax_rate / 100) + 1
        ]);
        return $pdf->download($invoice->id.'-'.($invoice->client->business_name ? $invoice->client->business_name : $invoice->client->surname).'-invoice.pdf');
    }

    /**
     * Send PDF invoice
     * @param  Invoice $invoice [description]
     * @return [type]           [description]
     */
    public function sendInvoice(Invoice $invoice) {
        $settings = new Setting;

        $data["email"] = $invoice->client->email;
        $data["title"] = "Invoice";
        $data["invoice"] = $invoice;
        $data["settings"] = $settings->fetch();
  
        //$pdf = PDF::loadView('emails.myTestMail', $data);
        
        $pdf = PDF::loadView('invoices.pdf', $data);
  
        Mail::send('emails.invoice', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "invoices.pdf");
        });

        return redirect('/invoices/'.$invoice->id)->with('message', 'Invoice mailed to customer');
    }

    /**
     * Update payment
     * @param  Invoice $invoice [description]
     * @return [type]           [description]
     */
    public function updatePayment(Request $request, Invoice $invoice) {
        $formFields['paid'] = $request->paid;

        $invoice->update($formFields);

        return redirect()->back()->with('message', 'Payment updated for invoice #'.$invoice->id);
    }

    /**
     * Shows the customer select form for creating an invoice
     * @return [type] [description]
     */
    public function create() {
        return view('invoices.create', [
            'clients' => Client::all()
        ]);
    }
}
