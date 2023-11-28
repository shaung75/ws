@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Appointments</h1>
  <div class="row gy-4">
    <div class="col-12 col-lg-12">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Booked appointments</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body app-card-orders-table px-4 w-100">

          <div class="d-none d-lg-block">
            <table class="table app-table-hover mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">
                    <a href="/appointments/{{$yearPrev}}/{{$monthPrev}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                      </svg>
                    </a>
                  </th>
                  <th class="cell text-center" colspan="2">{{$monthName}} {{$year}}</th>
                  <th class="cell text-end">
                    <a href="/appointments/{{$yearNext}}/{{$monthNext}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                      </svg>                    
                    </a>
                  </th>
                </tr>
              </thead>
            </table>

            {!!$calendar!!}
          </div>

          <div class="d-lg-none">
            <table class="table app-table-hover mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">
                    <a href="/appointments/{{$yearPrev}}/{{$monthPrev}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                      </svg>
                    </a>
                  </th>
                  <th class="cell text-center" colspan="2">{{$monthName}} {{$year}}</th>
                  <th class="cell text-end">
                    <a href="/appointments/{{$yearNext}}/{{$monthNext}}">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                      </svg>                    
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>

                @for ($i = 1; $i <= $daysInMonth; $i++)
                  <tr>
                    <td class="cell">{{$i}}</td>
                    <td class="cell">
                      @isset($appointments[$i])
                        @foreach($appointments[$i] as $appointment)
                          {{\Carbon\Carbon::parse($appointment->date)->format('H:i')}} - 
                          <a href="/appointments/{{$appointment->id}}">
                            @if($appointment->client->business_name)
                              {{$appointment->client->business_name}}
                            @else
                              {{$appointment->client->first_name}} {{$appointment->client->surname}}
                            @endif
                          </a><br>
                        @endforeach
                      @endisset
                    </td>
                    <td class="cell">
                      @isset($appointments[$i])
                        @foreach($appointments[$i] as $appointment)
                          {{$appointment->client->town}}<br>
                        @endforeach
                      @endisset
                    </td>
                    <td class="cell text-end">
                      @isset($appointments[$i])
                        @foreach($appointments[$i] as $appointment)
                          @if($appointment->complete == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                              <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            <br>
                          @else
                            &nbsp;<br>
                          @endif
                        @endforeach
                      @endisset
                    </td>
                  </tr>
                @endfor
              </tbody>
            </table>
          </div>

        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <a class="btn app-btn-primary" href="/appointments/create">Add appointment</a>
        </div>
        <!--//app-card-footer-->
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->
    <div class="col-12 col-lg-6">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Incomplete appointments</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body app-card-orders-table px-4 w-100">
          
          
          <div class="table-responsive">
            
            <table class="table app-table-hover mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">Date Booked</th>
                  <th class="cell">Client</th>
                  <th class="cell">Town</th>
                  <th class="cell"></th>
                  <th class="cell"></th>
                </tr>
              </thead>
              <tbody>

                @foreach($incomplete as $appt)
                  <tr>
                    <td class="cell">{{\Carbon\Carbon::parse($appt->date)->format('d/m/Y')}}</td>
                    <td class="cell">
                      <a href="/appointments/{{$appt->id}}">
                        @if($appt->client->business_name)
                          {{$appt->client->business_name}}
                        @else
                          {{$appt->client->first_name}} {{$appt->client->surname}}
                        @endif
                      </a>
                    </td>
                    <td class="cell">{{$appt->client->town}}</td>
                    <td class="cell text-end"><a href="/appointments/{{$appt->id}}/edit">Reschedule</a></td>
                    <td class="cell text-end">
                      <a href="/appointments/{{$appt->id}}/delete" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                      </a>
                    </td>
                  </tr>
                @endforeach                                   
                
              </tbody>
            </table>
          </div><!--//table-responsive-->          

        </div>

        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Carried Over - due this month</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body app-card-orders-table px-4 w-100">
          
          
          <div class="table-responsive">
            
            <table class="table app-table-hover mb-0 text-left">
              <thead>
                <tr>
                  <th class="cell">Due</th>
                  <th class="cell">Client</th>
                  <th class="cell">Town</th>
                  <th class="cell"></th>
                </tr>
              </thead>
              <tbody>

                @foreach($carriedCurrent as $carryCurrent)
                  <tr>
                    <td class="cell">{{\Carbon\Carbon::parse($carryCurrent->due_date)->format('M Y')}}</td>
                    <td class="cell">
                      <a href="/clients/{{$carryCurrent->client_id}}">
                        @if($carryCurrent->business_name)
                          {{$carryCurrent->business_name}}
                        @else
                          {{$carryCurrent->first_name}} {{$carryCurrent->surname}}
                        @endif
                      </a></td>
                    <td class="cell">{{$carryCurrent->town}}</td>
                    <td class="cell text-end">
                      @if($carryCurrent->booked)
                        <a href="/appointments/{{$carryCurrent->booked}}" style="color: #f90;">Booked</a>

                      @else
                        <a href="/appointments/create/{{$carryCurrent->client_id}}">Book in</a>
                      @endif
                    </td>
                  </tr>
                @endforeach                                   
                
              </tbody>
            </table>
          </div><!--//table-responsive-->          

        </div>

        <div class="app-card-footer p-4 mt-auto">
          
        </div>
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->

    <div class="col-12 col-lg-6">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Carried Over - All</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body app-card-orders-table px-4 w-100">
          
          
          <div class="table-responsive">
            
            @foreach($carriedAll as $key => $carried)
              @if(!empty($carried))
                <h6>{{$key}}</h6>
                <table class="table app-table-hover mb-50 text-left">
                  <thead>
                    <tr>
                      <th class="cell" style="width: 25%">Due</th>
                      <th class="cell" style="width: 25%">Client</th>
                      <th class="cell" style="width: 25%">Town</th>
                      <th class="cell" style="width: 25%"></th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($carried as $carryAll)
                    <tr>
                      <td class="cell">{{\Carbon\Carbon::parse($carryAll->due_date)->format('M Y')}}</td>
                      <td class="cell">
                        <a href="/clients/{{$carryAll->client_id}}">
                          @if($carryAll->business_name)
                            {{$carryAll->business_name}}
                          @else
                            {{$carryAll->first_name}} {{$carryAll->surname}}
                          @endif
                        </a></td>
                      <td class="cell">{{$carryAll->town}}</td>
                      <td class="cell text-end">
                        @if($carryAll->booked)
                          <a href="/appointments/{{$carryAll->booked}}" style="color: #f90;">Booked</a>
                        @else
                          <a href="/appointments/create/{{$carryAll->client_id}}">Book in</a>
                        @endif
                    </tr>
                  @endforeach                                      
                    
                  </tbody>
                </table>
              @endif              
            @endforeach             

          </div><!--//table-responsive-->          

        </div>

        <div class="app-card-footer p-4 mt-auto">
          
        </div>
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->
  </div>
    

@endsection