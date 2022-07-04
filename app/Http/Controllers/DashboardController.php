<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Show the dashboard
	 * @return [type] [description]
	 */
  public function index() {
  	return view('dashboard', [
  		'overdueInvoices' => Invoice::overdue()
  	]);
  }
}
