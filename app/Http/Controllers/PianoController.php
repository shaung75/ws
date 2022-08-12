<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Piano;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;

class PianoController extends Controller
{
	/**
	 * Show all pianos
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function index(Request $request) {
    	
    	if($request->route()->uri == 'pianos') {
    		$pianos = $this->paginate(Piano::get()->sortBy('stock_number'), 15, $request->page, ['path' => 'pianos']);
    		$list = 'all';
    	} elseif ($request->route()->uri == 'pianos/assigned') {
    		$pianos = $this->paginate(Piano::get()->where('client_id', '!=', null)->sortBy('stock_number'), 15, $request->page, ['path' => 'pianos/assigned']);
    		$list = 'assigned';
    	} elseif ($request->route()->uri == 'pianos/unassigned') {
    		$pianos = $this->paginate(Piano::get()->where('client_id', '=', null)->sortBy('stock_number'), 15, $request->page, ['path' => 'pianos/assigned']);
    		$list = 'unassigned';
    	}    	

    	return view('pianos.index', [
    		'pianos' => $pianos,
    		'list' => $list
    	]);
    }

    /**
     * Show single piano
     * @param  Piano  $piano [description]
     * @return [type]        [description]
     */
    public function show(Piano $piano) {
    	return view('pianos.show', [
    		'piano' => $piano,
    	]);
    }

    /**
     * Create a new piano
     * @return [type] [description]
     */
    public function create() {
        return view('pianos.create', [
            'manufacturers' => Manufacturer::get()->sortBy('manufacturer')
        ]);
    }

    /**
     * Create a duplicate a piano
     * @return [type] [description]
     */
    public function duplicate(Piano $piano) {
        return view('pianos.duplicate', [
            'manufacturers' => Manufacturer::get()->sortBy('manufacturer'),
            'piano' => $piano
        ]);
    }

    /**
     * Show edit form
     * @param  Client $piano [description]
     * @return [type]         [description]
     */
    public function edit(Piano $piano) {
        return view('pianos.edit', [
            'piano' => $piano,
            'manufacturers' => Manufacturer::all()
        ]);
    }

    /**
     * Store a new piano
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) {
        $formFields = $request->validate([
            'manufacturer_id' => 'required',
            'model' => 'required',
            'colour' => 'required',
            'finish' => 'required',
            'serial_number' => ['required', Rule::unique('pianos','serial_number')],
            'year_of_manufacture' => 'required'
        ]);

        $formFields['ivory_keys'] = $request->ivory_keys;
        $formFields['stock_number'] = $request->stock_number;

        $piano = Piano::create($formFields);

        return redirect('/pianos/'.$piano->id)->with('message', 'Created successfully');
    }

    /**
     * Update piano
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request, Piano $piano) {
        $formFields = $request->validate([
            'manufacturer_id' => 'required',
            'model' => 'required',
            'colour' => 'required',
            'finish' => 'required',
            'serial_number' => ['required', ($piano->serial_number != $request->serial_number ? Rule::unique('pianos','serial_number') : '' )],
            'year_of_manufacture' => 'required'
        ]);

        $formFields['ivory_keys'] = $request->ivory_keys;
        $formFields['stock_number'] = $request->stock_number;
        
        $piano->update($formFields);

        return redirect('/pianos/'.$piano->id)->with('message', 'Updated successfully');
    }

    /**
     * Assign piano to client
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function assignClient(Request $request) {
        $formFields = $request->validate([
            'piano_id' => 'required',
            'client_id' => 'required'
        ]);

        $piano = Piano::find($request->piano_id);

        $formFields['client_id'] = $request->client_id;

        $piano->update($formFields);

        $today = date('Y-m-d', time());

        // Create the initial service
        $piano->services()->create([
            'type_id' => 1,
            'service_date' => $today,
            'due_date' => date('Y-m-d', strtotime($today . "+3 months" ) )
        ]);

        return redirect()->back()->with('message', 'Piano assigned to client');
    }

    /**
     * Unnasign piano from client
     * @param  Piano  $piano [description]
     * @return [type]        [description]
     */
    public function unassign(Piano $piano) {
        $formFields['client_id'] = null;

        $piano->update($formFields);

        return redirect()->back()->with('message', 'Piano unassigned from client');
    }

    /**
     * Paginate collection results
     * @param  [type]  $items   [description]
     * @param  integer $perPage [description]
     * @param  [type]  $page    [description]
     * @param  array   $options [description]
     * @return [type]           [description]
     */
    private function paginate($items, $perPage = 5, $page = null, $options = []) {
	    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
	    $items = $items instanceof Collection ? $items : Collection::make($items);
	    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
	}
}
