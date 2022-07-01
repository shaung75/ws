<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
    	$response = json_decode(\GoogleMaps::load('geocoding')
				->setParam (['address' =>'NG34 8LF'])
		 		->get()
		 	);

		 	$coords = $response->results[0]->geometry->location;

		 	dd($coords);
		 	
    	return view('geo.index');
    }
}
