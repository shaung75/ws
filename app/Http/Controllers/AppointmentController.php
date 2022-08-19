<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
	/**
	 * Show the create appointment form
	 * @return [type] [description]
	 */
  public function create() {
    return view('appointments.create', [
    	'clients' => Client::get()->sortBy('surname')
    ]);
  }
}
