<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Manufacturer;
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
            'email' => ['nullable', 'email', ($client->email != $request->email ? Rule::unique('clients','email') : '' )],
            'telephone'=> 'required',
            'address1' => 'required',
            'town' => 'required',
            'county' => 'required',
            'postcode' => 'required'
        ]);

        $formFields['notes'] = $request->notes;
        $formFields['telephone_secondary'] = $request->telephone_secondary;

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
        } elseif($request->lat != $client->lat && $request->lat != null || $request->long != $client->long && $request->lat != null) {
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

        $client->update($formFields);

        return redirect('/clients/'.$client->id)->with('message', 'Updated successfully');
    }

    /**
     * Show create client form
     * @return [type] [description]
     */
    public function create() {
        return view('clients.create', [
            'manufacturers' => Manufacturer::get()->sortBy('manufacturer')
        ]);
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
            'email' => ['nullable', 'email', Rule::unique('clients','email')],
            'telephone'=> ['required', Rule::unique('clients', 'telephone')],
            'address1' => 'required',
            'town' => 'required',
            'county' => 'required',
            'postcode' => 'required'
        ]);

        $formFields['notes'] = $request->notes;
        $formFields['telephone_secondary'] = $request->telephone_secondary;

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

        // If we're creating a new piano as well, validate and create
        if($request->create_piano) {
            $pianoFormFields = $request->validate([
                'manufacturer_id' => 'required',
                'model' => 'required',
                'colour' => 'required',
                'finish' => 'required',
                'serial_number' => ['required', Rule::unique('pianos','serial_number')],
                'year_of_manufacture' => 'required'
            ]);

            $client = Client::create($formFields);

            $pianoFormFields['ivory_keys'] = $request->ivory_keys;
            $pianoFormFields['stock_number'] = $request->stock_number;
            $pianoFormFields['client_id'] = $client->id;

            $piano = Piano::create($pianoFormFields);
        } else {
            $client = Client::create($formFields);
        }     

        return redirect('/clients/'.$client->id)->with('message', 'Created successfully');
    }

    /**
     * Show the delete confirm page
     * @param  Client $client [description]
     * @return [type]         [description]
     */
    public function delete(Client $client) {
        return view('clients.delete', [
            'client' => $client
        ]);
    }

    /**
     * Delete the client
     * @param  Client $client [description]
     * @return [type]         [description]
     */
    public function destroy(Client $client) {
        // Unassign any pianos
        Piano::where('client_id', '=', $client->id)->update(['client_id' => null]);

        $client->delete();
        return redirect('/clients')->with('message', 'Client deleted');
    }
}
