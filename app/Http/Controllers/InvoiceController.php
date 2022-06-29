<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
		/**
		 * Stores invoice
		 * @param  Client $client [description]
		 * @return [type]         [description]
		 */
    public function store(Client $client) {
    	$fields['client_id'] = $client->id;
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
    		'invoice' => $invoice
    	]);
    }
}
