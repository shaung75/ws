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

        $client->update($formFields);

        return redirect()->back()->with('message', 'Updated successfully');
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

        $client = Client::create($formFields);

        return redirect('/clients/'.$client->id)->with('message', 'Created successfully');
    }
}
