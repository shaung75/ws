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

		$service_date = date('Y-m-d', strtotime($request->service_date) );
		$due_date = date('Y-m-d', strtotime($service_date . ($request->type_id == 1 ? "+3 months" : "+12 months") ) );
		
		$formFields['service_date'] = $service_date;
		$formFields['due_date'] = $due_date;
		$formFields['notes'] = $request->notes;
		$formFields['technician'] = $request->technician;

		$service = Service::create($formFields);

		return redirect('/services/'.$service->id)->with('message', 'Created successfully');
	}

  /**
   * Show create service form
   * @return [type] [description]
   */
  public function create(Piano $piano) {
    return view('services.create', [
      'pianos' => Piano::get()->sortBy('stock_number'),
      'p' => $piano,
      'types' => Type::get(),
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

		$service_date = date('Y-m-d', strtotime($request->service_date) );
		$due_date = date('Y-m-d', strtotime($service_date . ($request->type_id == 1 ? "+3 months" : "+12 months") ) );
		
		$formFields['service_date'] = $service_date;
		$formFields['due_date'] = $due_date;
		$formFields['notes'] = $request->notes;
		$formFields['technician'] = $request->technician;

		$service->update($formFields);

		return redirect('/services/'.$service->id)->with('message', 'Updated successfully');
	}
}
