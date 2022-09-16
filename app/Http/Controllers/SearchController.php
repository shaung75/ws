<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Manufacturer;
use App\Models\Piano;
use Illuminate\Http\Request;

class SearchController extends Controller
{
		/**
		 * Search all records
		 * @param  Request $request [description]
		 * @return [type]           [description]
		 */
    public function search(Request $request) {
    	$search = $request->search;

    	// Clients
      $clients = Client::query()
                  ->where('business_name', 'LIKE', "%{$search}%")
                  ->orWhere('surname', 'LIKE', "%{$search}%")
                  ->orWhere('first_name', 'LIKE', "%{$search}%")
                  ->orWhere('id', '=', "{$search}")
                  ->get();

      // Invoices
      $clientIds = [];

      foreach ($clients as $client) {
        $clientIds[] = $client->id;    
      }

      // Pianos
      $manufacturer = Manufacturer::query()
                          ->where('manufacturer', 'LIKE', "%{$search}%")
                          ->first();

      if(!$manufacturer) {
          $manufacturerId = 0;
      } else {
          $manufacturerId = $manufacturer->id;
      }

      $pianos = Piano::query()
                  ->where('model', 'LIKE', "%{$search}%")
                  ->orWhere('colour', 'LIKE', "%{$search}%")
                  ->orWhere('finish', 'LIKE', "%{$search}%")
                  ->orWhere('serial_number', '=', "{$search}")
                  ->orWhere('stock_number', '=', "{$search}")
                  ->orWhere('year_of_manufacture', '=', "{$search}")
                  ->orWhere('manufacturer_id', '=', "{$manufacturerId}")
                  ->orWhere(function ($query) use ($clientIds) {
                      $query->whereIn('client_id', $clientIds);
                  })
                  ->get();

      $invoices = Invoice::query()
                  ->where('id', 'LIKE', "%{$search}%")
                  ->orWhere(function ($query) use ($clientIds) {
                      $query->whereIn('client_id', $clientIds);
                  })
                  ->get();                                    

    	return view('search.search', [
        'clients' => $clients,
        'search' => $search,
        'pianos' => $pianos,
        'list' => 'assigned',
        'invoices' => $invoices
      ]);
    }
}
