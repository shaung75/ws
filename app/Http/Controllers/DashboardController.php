<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
	/**
	 * Show the dashboard
	 * @return [type] [description]
	 */
  public function index() {
  	$appointments = Appointment::query()
                      ->whereDate('date', '>=', Carbon::today())
                      ->orderBy('date', 'asc')
                      ->limit(10)
                      ->get()
                      ->groupBy([
                      	function ($q) {
	                        return Carbon::parse($q->date)->format('Y');
	                      },
	                      function ($q) {
	                        return Carbon::parse($q->date)->format('n');
	                      },
	                      function ($q) {
	                        return Carbon::parse($q->date)->format('j');
	                      }
                    	]);

  	return view('dashboard', [
  		'overdueInvoices' => Invoice::overdue(),
  		'appointments' => $appointments
  	]);
  }
}
