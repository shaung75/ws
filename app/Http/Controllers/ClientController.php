<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Piano;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    

	/**
	 * View all clients
	 */
    public function index(Request $request) {
    	return view('clients.index', [
    		'clients' => Client::paginate(),
    	]);
    }

    /**
     * Show single client
     * @param  Client $client [description]
     * @return [type]         [description]
     */
    public function show(Client $client) {
        return view('clients.show', [
    		'client' => $client,
            'availablePianos' => Piano::where('client_id', null)->orderByRaw('CONVERT(stock_number, SIGNED)')->get()
    	]);
    }

    /**
     * Show edit form
     * @param  Client $client [description]
     * @return [type]         [description]
     */
    public function edit(Client $client) {
        return view('clients.edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the client
     * @return [type] [description]
     */
    public function update(Request $request, Client $client) {
        $formFields = $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'email', ($client->email != $request->email ? Rule::unique('clients','email') : '' )],
            'telephone'=> 'required',
            'address1' => 'required',
            'town' => 'required',
            'county' => 'required',
            'postcode' => 'required'
        ]);

        $formFields['notes'] = $request->notes;

        // If check if the postcode or coords have changed
        if($request->postcode != $client->postcode) {

            // Check if the coords have changed as well
            if($request->lat != $client->lat || $request->long != $client->long) {
                // Coord have chaged, use set values
                $formFields['lat'] = $request->lat;        
                $formFields['long'] = $request->long; 
            } else {
                // Geocode the postcode
                $geoResponse = json_decode(\GoogleMaps::load('geocoding')
                    ->setParam (['address' => $request->postcode])
                    ->get()
                );

                $coords = $geoResponse->results[0]->geometry->location;

                $formFields['lat'] = $coords->lat;        
                $formFields['long'] = $coords->lng;    
            }

        // Only the coords have changed so use them            
        } elseif($request->lat != $client->lat || $request->long != $client->long) {
            $formFields['lat'] = $request->lat;        
            $formFields['long'] = $request->long;
        }

        $client->update($formFields);

        return redirect('/clients/'.$client->id)->with('message', 'Updated successfully');
    }

    /**
     * Show create client form
     * @return [type] [description]
     */
    public function create() {
        return view('clients.create');
    }

    /**
     * Store the client
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) {
        $formFields = $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'email', Rule::unique('clients','email')],
            'telephone'=> ['required', Rule::unique('clients', 'telephone')],
            'address1' => 'required',
            'town' => 'required',
            'county' => 'required',
            'postcode' => 'required'
        ]);

        $formFields['notes'] = $request->notes;

        // If lat/long values have been set then use those, otherwise geocode postcode
        if($request->lat == '' || $request->long == '') {
            $geoResponse = json_decode(\GoogleMaps::load('geocoding')
                ->setParam (['address' => $request->postcode])
                ->get()
            );

            $coords = $geoResponse->results[0]->geometry->location;

            $formFields['lat'] = $coords->lat;        
            $formFields['long'] = $coords->lng;    
        } else {
            $formFields['lat'] = $request->lat;        
            $formFields['long'] = $request->long;    
        }

        $client = Client::create($formFields);

        return redirect('/clients/'.$client->id)->with('message', 'Created successfully');
    }
}
