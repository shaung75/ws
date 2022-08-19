<?php

namespace App\Http\Controllers;

use App\Models\Piano;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
	/**
	 * Show all services
	 * @return [type] [description]
	 */
	public function index() {
		return view('services.index', [
			'services' => Service::paginate(),
		]);
	}
	/**
	 * Create a service
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function store(Request $request) {
		$formFields = $request->validate([
		  'piano_id' => 'required',
		  'type_id' => 'required',
		  'service_date' => 'required',
		]);

		$type = Type::where('id',$request->type_id)->first();

		// Give default 12 months to null values
		if($type->duration == null) {
			$type->duration = 12;
		}

		$service_date = date('Y-m-d', strtotime($request->service_date) );

		$due_date = date('Y-m-d', strtotime($service_date . "+".$type->duration." months"));

		$formFields['service_date'] = $service_date;
		$formFields['due_date'] = $due_date;
		$formFields['notes'] = $request->notes;
		$formFields['technician'] = $request->technician;
		$formFields['price'] = $request->price;

		$service = Service::create($formFields);

		return redirect('/pianos/'.$request->piano_id)->with('message', 'Created successfully');
	}

  /**
   * Show create service form
   * @return [type] [description]
   */
  public function create(Piano $piano) {
    return view('services.create', [
      'pianos' => Piano::get()->sortBy('stock_number'),
      'p' => $piano,
      'types' => Type::orderBy('type')->get(),
    ]);
  }

  /**
   * Show individual service record
   * @param  Service $service [description]
   * @return [type]           [description]
   */
  public function show(Service $service) {
  	return view('services.show', [
  		'service' => $service
  	]);
  }

  /**
   * Show the edit form
   * @param  Service $service [description]
   * @return [type]           [description]
   */
  public function edit(Service $service) {
  	return view('services.edit', [
  		'pianos' => Piano::get()->sortBy('stock_number'),
  		'service' => $service,
  		'types' => Type::get(),
  	]);	
  }

  public function update(Request $request, Service $service) {
		$formFields = $request->validate([
		  'piano_id' => 'required',
		  'type_id' => 'required',
		  'service_date' => 'required',
		]);

		$type = Type::where('id',$request->type_id)->first();

		// Give default 12 months to null values
		if($type->duration == null) {
			$type->duration = 12;
		}

		$service_date = date('Y-m-d', strtotime($request->service_date) );
		
		$due_date = date('Y-m-d', strtotime($service_date . "+".$type->duration." months"));
		
		$formFields['service_date'] = $service_date;
		$formFields['due_date'] = $due_date;
		$formFields['notes'] = $request->notes;
		$formFields['technician'] = $request->technician;
		$formFields['price'] = $request->price;

		$service->update($formFields);

		return redirect('/pianos/'.$request->piano_id)->with('message', 'Updated successfully');
	}

	/**
	 * Show the delete confirmation page
	 * @param  Service $service [description]
	 * @return [type]           [description]
	 */
	public function delete(Service $service) {
    return view('services.delete', [
      'service' => $service
    ]);
  }

  /**
   * Delete the service record
   * @param  Service $service [description]
   * @return [type]           [description]
   */
  public function destroy(Service $service) {
  	$piano = $service->piano;

  	$service->delete();

  	return redirect('/pianos/'.$piano->id)->with('message', 'Service record deleted');
  }
}
