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

    $resultA = array();
    
    foreach($appointments as $day => $appts) {
      foreach($appts as $appt) {
        $resultA[$year.'-'.$month.'-'.$day][]=$appt;
      }
    }

    $incomplete = Appointment::query()
                      ->where('complete','=', null)
                      ->whereDate('date', '<', Carbon::today())
                      ->orderBy('date', 'asc')
                      ->get();
    
    $towns = Client::distinct()->orderBy('town')->get(['town']);

    foreach($towns as $town) {
      $carriedAll[$town['town']] = DB::select('
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
                      AND town = ?
                      ORDER BY t1.due_date
                    ', array($town['town']));

    }

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
/*
$resultA['2022-12-02'][]=17;
$resultA['2022-12-02'][]=12;
$resultA['2022-12-02'][]=132;
$resultA['2022-12-02'][]=15;
$resultA['2022-12-12'][]=5;
$resultA['2022-12-13'][]=3;
$resultA['2022-12-14'][]=15;
$resultA['2022-12-15'][]=16;
*/
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
      'calendar' => $this->draw_calendar($month,$year,$resultA)
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
   * Delete the appointment
   * @param  Client $client [description]
   * @return [type]         [description]
   */
  public function destroy(Appointment $appointment) {
      $appointment->delete();
      return redirect('/appointments')->with('message', 'Appointment deleted');
  }

  /**
   * Delete appointment confirmation screen
   * @param  Appointment $appointment [description]
   * @return [type]                   [description]
   */
  public function delete(Appointment $appointment) {
    return view('appointments.delete', [
      'appointment' => $appointment
    ]);
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

private function draw_calendar($month,$year,$resultA)
{

  /* draw table */
  $calendar = '<table class="table app-table-hover mb-0 text-left">';

  /* table headings */
  $headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
  $calendar.= '<tr class="calendar-row"><td class="calendar-day-head" style="width: 14%;">'.implode('</td><td class="calendar-day-head" style="width: 14%;">',$headings).'</td></tr>';

  /* days and weeks vars now ... */
  $running_day = date('w',mktime(0,0,0,$month,1,$year));
  $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
  $days_in_this_week = 1;
  $day_counter = 0;



  /* row for week one */
  $calendar.= '<tr class="calendar-row">';

  /* print "blank" days until the first of the current week */
  for($x = 0; $x < $running_day; $x++):
    $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    $days_in_this_week++;
  endfor;

  /* keep going with days.... */
  for($list_day = 1; $list_day <= $days_in_month; $list_day++):
    $calendar.= '<td class="calendar-day">';
      /* add in the day number */
      $calendar.= '<div class="day-number"><strong><u>'.$list_day.'</u></strong></div>';

        $date=date('Y-n-j',mktime(0,0,0,$month,$list_day,$year));

        $tdHTML='';
        /* list the appt details */        
        if(isset($resultA[$date])){

          foreach($resultA[$date] as $key => $appt) {
            $tdHTML.=($appt->complete == 1) ? '<del>' : '';
            $tdHTML.=\Carbon\Carbon::parse($appt->date)->format('H:i').' ';
            $tdHTML.='<a href="/appointments/'.$appt->id.'">';
            if($appt->client->business_name) {
              $tdHTML.=$appt->client->business_name;
            } else {
              $tdHTML.=$appt->client->first_name.' '.$appt->client->surname;
            }
            $tdHTML.='</a>';
            $tdHTML.=($appt->complete == 1) ? '</del>' : '';
            $tdHTML.='<br>';
          }
          
        } 

      $calendar.=$tdHTML;      

    $calendar.= '</td>';

    if($running_day == 6):
      $calendar.= '</tr>';
      if(($day_counter+1) != $days_in_month):
        $calendar.= '<tr class="calendar-row">';
      endif;
      $running_day = -1;
      $days_in_this_week = 0;
    endif;
    $days_in_this_week++; $running_day++; $day_counter++;
  endfor;

  /* finish the rest of the days in the week */
  if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
      $calendar.= '<td class="calendar-day-np">&nbsp;</td>';
    endfor;
  endif;

  /* final row */
  $calendar.= '</tr>';

  /* end the table */
  $calendar.= '</table>';

  /* all done, return result */
  return $calendar;
}  
}
