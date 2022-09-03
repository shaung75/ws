<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
	/**
	 * Show the create appointment form
	 * @return [type] [description]
	 */
  public function index($year = null, $month = null) {
  	// Set current month/year
  	if(!$year || !$month) {
  		$month = date('n');
  		$year = date('Y');
  	}

  	if($month == 12) {
  		$monthNext = 1;
  		$monthPrev = $month - 1;
  		$yearNext = $year + 1;
  		$yearPrev = $year;
  	} elseif($month == 1) {
  		$monthNext = $month + 1;
  		$monthPrev = 12;
  		$yearNext = $year;
  		$yearPrev = $year - 1;
  	}	else {
  		$monthNext = $month + 1;
  		$monthPrev = $month - 1;
  		$yearPrev = $year;
  		$yearNext = $year;
  	}

    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    $appointments = Appointment::query()
                      ->whereYear('date', '=', $year)
                      ->whereMonth('date', '=', $month)
                      ->orderBy('date', 'asc')
                      ->get()
                      ->groupBy(function ($q) {
                        return Carbon::parse($q->date)->format('j');
                      });

    $incomplete = Appointment::query()
                      ->where('complete','=', null)
                      ->whereDate('date', '<', Carbon::today())
                      ->orderBy('date', 'asc')
                      ->get();

    return view('appointments.index', [
    	'month' => $month,
    	'year' => $year,
    	'monthNext' => $monthNext,
    	'monthPrev' => $monthPrev,
    	'yearNext' => $yearNext,
    	'yearPrev' => $yearPrev,
    	'monthName' => $this->getMonthName($month),
      'daysInMonth' => $daysInMonth,
      'appointments' => $appointments,
      'incomplete' => $incomplete
    ]);
  }

	/**
	 * Show the create appointment form
	 * @return [type] [description]
	 */
  public function create() {
    return view('appointments.create', [
    	'clients' => Client::get()->sortBy('surname')
    ]);
  }

  /**
   * Store the appointment
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function store(Request $request) {
    $formFields = $request->validate([
      'client_id' => 'required',
      'date' => 'required',
    ]);

    $formFields['notes'] = $request->notes;

    $appointment = Appointment::create($formFields);

    return redirect('/appointments/')->with('message', 'Created successfully');
  }

  /**
   * Show the individual appointment
   * @param  Appointment $appointment [description]
   * @return [type]                   [description]
   */
  public function show(Appointment $appointment) {
    return view('appointments.show', [
      'appointment' => $appointment
    ]);
  }

  /**
   * Show the appointment edit form
   * @param  Appointment $appointment [description]
   * @return [type]                   [description]
   */
  public function edit(Appointment $appointment) {
    return view('appointments.edit', [
      'appointment' => $appointment,
      'clients' => Client::get()->sortBy('surname')
    ]);
  }

  /**
   * Update the appointment details
   * @param  Request     $request     [description]
   * @param  Appointment $appointment [description]
   * @return [type]                   [description]
   */
  public function update(Request $request, Appointment $appointment) {
    $formFields = $request->validate([
      'client_id' => 'required',
      'date' => 'required',
    ]);

    $formFields['notes'] = $request->notes;
    $formFields['complete'] = $request->complete;

    $appointment->update($formFields);

    return redirect('/appointments/'.$appointment->id)->with('message', 'Updated successfully');
  }

  /**
   * Mark appointment as complete
   * @param  Request     $request     [description]
   * @param  Appointment $appointment [description]
   * @return [type]                   [description]
   */
  public function updateComplete(Request $request, Appointment $appointment) {
    $formFields['complete'] = 1;

    $appointment->update($formFields);

    return redirect('/appointments/'.$appointment->id)->with('message', 'Marked as complete');
  }

  /**
   * Get month name
   * @param  [type] $monthNumber [description]
   * @return [type]              [description]
   */
  private function getMonthName($monthNumber)
	{
		return date("F", mktime(0, 0, 0, $monthNumber, 1));
	}
}
