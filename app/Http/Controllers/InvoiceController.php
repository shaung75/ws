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
            'invoices' => Invoice::where('paid', '!=', 1)->paginate(),
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
        $fields = $request->validate([
            'account_id' => 'required'
        ]);

        // Load the billing account
        $account = Account::where('id', '=', $request->account_id)->first();

    	$fields['client_id'] = $request->id ? $request->id : $client->id; // If coming from /invoices/create or client screen
    	$fields['invoice_date'] = date("Y-m-d");
    	$fields['due_date'] = date('Y-m-d', strtotime($fields['invoice_date'] . "+1 month" ));
        $fields['hide_vat'] = true;

        $latestInvoice = Invoice::where('account_id', '=', $request->account_id)->orderByDesc('invoice_number')->first();

        if($latestInvoice !== null && $latestInvoice->invoice_number >= $account->invoice_start_from) {
            $fields['invoice_number'] = $latestInvoice->invoice_number + 1;
        } else {
            $fields['invoice_number'] = $account->invoice_start_from;
        }

    	$invoice = Invoice::create($fields);

    	return redirect('/invoices/' . $invoice->id)->with('message', 'Invoice #'.$invoice->invoice_number.' created');
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

        // check the account hasnt changed
        if($request->account_id != $invoice->account_id) {
            $latestInvoice = Invoice::where('account_id', '=', $request->account_id)->latest()->first();

            if($latestInvoice !== null) {
                $formFields['invoice_number'] = $latestInvoice->invoice_number + 1;
            } else {
                $account = Account::where('id', '=', $request->account_id)->first();
                $formFields['invoice_number'] = $account->invoice_start_from;
            }   
        }

        // Override subtotal and vat values
        if($request->override_values) {
            $formFields['override_sub_total'] = $request->override_sub_total;
            $formFields['override_vat'] = $request->override_vat;
        } else {
            $formFields['override_sub_total'] = null;
            $formFields['override_vat'] = null;
        }

        $formFields['override_values'] = $request->override_values;
        
        if($request->paid) {
            $formFields['paid'] = $request->paid;    
        } else {
            $formFields['paid'] = 0;
        }

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
        return $pdf->download($invoice->account->invoice_prefix . $invoice->invoice_number . $invoice->account->invoice_suffix . '-'.($invoice->client->business_name ? $invoice->client->business_name : $invoice->client->surname).'-invoice.pdf');
    }

    /**
     * Send PDF invoice
     * @param  Invoice $invoice [description]
     * @return [type]           [description]
     */
    public function sendInvoice(Invoice $invoice) {
        $settings = new Setting;

        $data["title"] = "Invoice";
        $data["invoice"] = $invoice;
        $data["settings"] = $settings->fetch();

        // Send to billing name if exists
        if($invoice->client->use_billing) {
            $data["email"] = $invoice->client->billing_email;
            $data["greeting"] = $invoice->client->billing_name;
        } else {
            $data["email"] = $invoice->client->email;
            $abbreviations = array(
                                'Mr/Mrs',
                                'Mr',
                                'Mrs',
                                'Miss',
                                'Dr',
                                'Rev',
                                'Fr'
                            );

            if(in_array($invoice->client->first_name, $abbreviations)) {
                $data["greeting"] = $invoice->client->first_name . " " . $invoice->client->surname;
            } else {
                $data["greeting"] = $invoice->client->first_name;
            }    
        }
        
  
        //$pdf = PDF::loadView('emails.myTestMail', $data);
        
        $pdf = PDF::loadView('invoices.pdf-new', $data);
  
        Mail::send('emails.invoice', $data, function($message)use($data, $pdf, $invoice) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    //->attachData($pdf->output(), "invoices.pdf");
                    ->attachData($pdf->output(), $invoice->account->invoice_prefix . $invoice->invoice_number . $invoice->account->invoice_suffix . '-'.($invoice->client->business_name ? $invoice->client->business_name : $invoice->client->surname).'-invoice.pdf');
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
    public function create(Client $client) {
        return view('invoices.create', [
            'clients' => Client::all(),
            'accounts' => Account::all(),
            'client_id' => $client->id
        ]);
    }

    /**
     * Show the delete confirm page
     * @param  Invoice $invoice [description]
     * @return [type]           [description]
     */
    public function delete(Invoice $invoice) {
        return view('invoices.delete', [
            'invoice' => $invoice
        ]);
    }

    public function destroy(Invoice $invoice) {
        $invoice->delete();
        return redirect('/invoices')->with('message', 'Invoice deleted');
    }
}
