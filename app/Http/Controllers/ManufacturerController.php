<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
	/**
	 * Show all manufacturers
	 * @return [type] [description]
	 */
    public function index() {
    	return view('manufacturers.index', [
    		'manufacturers' => Manufacturer::all()->sortBy('manufacturer'),
    	]);
    }

    /**
     * Store the manufacturer
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) {
        $formFields = $request->validate([
            'manufacturer' => 'required'
        ]);

        $formFields['manufacturer'] = $request->manufacturer;

        $manufacturer = Manufacturer::create($formFields);

        return redirect()->back()->with('message', 'Created successfully');
    }

    /**
     * Update manufacturer
     * @param  Manufacturer $manufacturer [description]
     * @return [type]                     [description]
     */
    public function update(Request $request) {
        $formFields = $request->validate([
            'manufacturer' => 'required',
            'id' => 'required'
        ]);

        $manufacturer = Manufacturer::find($request->id);

        $manufacturer->update($formFields);

        return redirect()->back()->with('message', 'Updated successfully');
    }

    /**
     * Delete manufacturer
     * @param  Manufacturer $manufacturer [description]
     * @return [type]                     [description]
     */
    public function destroy(Manufacturer $manufacturer) {
        if(count($manufacturer->pianos) > 0) {
            return redirect()->back()->with('error', 'Manufacturer cannot be deletes as it has pianos assigned');       
        }

        $manufacturer->delete();

        return redirect()->back()->with('message', 'Manufacturer deleted');
    }
}
