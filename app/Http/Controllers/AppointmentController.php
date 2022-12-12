<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
      $carriedDate = $yearNext.'-'.$monthNext.'-1';
  	} elseif($month == 1) {
  		$monthNext = $month + 1;
  		$monthPrev = 12;
  		$yearNext = $year;
  		$yearPrev = $year - 1;
      $carriedDate = $year.'-'.$monthNext.'-1';
  	}	else {
  		$monthNext = $month + 1;
  		$monthPrev = $month - 1;
  		$yearPrev = $year;
  		$yearNext = $year;
      $carriedDate = $year.'-'.$monthNext.'-1';
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

    /*
    $carriedAll = DB::select('
                        SELECT t1.* ,
                        first_name,
                        surname,
                        business_name,
                        town,
                        client_id
                        FROM services t1
                        INNER JOIN pianos  on t1.piano_id = pianos.id
                        LEFT JOIN clients on pianos.client_id = clients.id 
                        WHERE t1.due_date = (
                          SELECT MAX(t2.due_date) FROM services t2
                          WHERE t2.piano_id = t1.piano_id
                          AND t2.service_date <> t2.due_date
                        )
                        AND t1.due_date < "'.$carriedDate.'"
                        AND (first_name <> "" OR business_name <> "")
                        ORDER BY t1.due_date
                      ');

    $carriedCurrent = DB::select('
                        SELECT t1.* ,
                        first_name,
                        surname,
                        business_name,
                        town,
                        client_id
                        FROM services t1
                        INNER JOIN pianos  on t1.piano_id = pianos.id
                        LEFT JOIN clients on pianos.client_id = clients.id 
                        WHERE t1.due_date = (
                          SELECT MAX(t2.due_date) FROM services t2
                          WHERE t2.piano_id = t1.piano_id
                          AND t2.service_date <> t2.due_date
                        )
                        AND t1.due_date < "'.$carriedDate.'"
                        AND t1.due_date >= "'.$year.'-'.$month.'-01"
                        AND (first_name <> "" OR business_name <> "")
                        ORDER BY t1.due_date
                      ');

    */
   
    $carriedAll = DB::select('
                    SELECT t1.* ,
                    first_name,
                    surname,
                    business_name,
                    town,
                    client_id
                    FROM services t1
                    INNER JOIN pianos  on t1.piano_id = pianos.id
                    LEFT JOIN clients on pianos.client_id = clients.id 
                    WHERE t1.due_date = (
                      SELECT MAX(t2.due_date) FROM services t2
                      WHERE t2.piano_id = t1.piano_id
                    )
                    AND (t1.service_date <> t1.due_date AND t1.due_date < "'.$carriedDate.'")
                    AND (first_name <> "" OR business_name <> "")
                    ORDER BY t1.due_date
                  ');

    $carriedCurrent = DB::select('
                    SELECT t1.* ,
                    first_name,
                    surname,
                    business_name,
                    town,
                    client_id
                    FROM services t1
                    INNER JOIN pianos  on t1.piano_id = pianos.id
                    LEFT JOIN clients on pianos.client_id = clients.id 
                    WHERE t1.due_date = (
                      SELECT MAX(t2.due_date) FROM services t2
                      WHERE t2.piano_id = t1.piano_id
                    )
                    AND (t1.service_date <> t1.due_date AND t1.due_date < "'.$carriedDate.'" AND t1.due_date >= "'.$year.'-'.$month.'-01")
                    AND (first_name <> "" OR business_name <> "")
                    ORDER BY t1.due_date
                  ');



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
      'incomplete' => $incomplete,
      'carriedCurrent' => $carriedCurrent,
      'carriedAll' => $carriedAll,
    ]);
  }

	/**
	 * Show the create appointment form
	 * @return [type] [description]
	 */
  public function create(Client $client) {
    return view('appointments.create', [
    	'clients' => Client::get()->sortBy('surname')->sortBy('business_name'),
      'client_id' => $client->id
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
