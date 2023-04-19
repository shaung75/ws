<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
		/**
		 * Stores the invoice item
		 * @param  Invoice $invoice [description]
		 * @return [type]           [description]
		 */
    public function store(Request $request, Invoice $invoice) {
    	$formFields = $request->validate([
        'qty' => 'required',
        'description' => [ 'required', 'max:500' ],
        'unit_price' => 'required',
      ]);

      $formFields['invoice_id'] = $invoice->id;

      $item = Item::create($formFields);

    	return redirect()->back()->with('message', 'Item added');
    }

    public function destroy(Item $item) {
    	$item->delete($item->id);

    	return redirect()->back()->with('message', 'Item deleted');	
    }
}
