@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Dashboard</h1>
  <div class="row gy-4">
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
              <h4 class="app-card-title">Upcoming appointments</h4>
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
                  <th class="cell">Date</th>
                  <th class="cell">Client</th>
                  <th class="cell"></th>
                  <th class="cell"></th>
                </tr>
              </thead>
              <tbody>

                @foreach($appointments as $keyYear => $year)
                  @foreach($year as $keyMonth => $month)
                    @foreach($month as $keyDay => $day)
                      <tr>
                        <td class="cell">{{$keyDay}}/{{$keyMonth}}/{{$keyYear}}</td>
                        <td class="cell">
                          @foreach($day as $appt)
                            {{\Carbon\Carbon::parse($appt->date)->format('H:i')}}
                            <a href="/appointments/{{$appt->id}}">
                              @if($appt->client->business_name)
                                {{$appt->client->business_name}}
                              @else
                                {{$appt->client->first_name}} {{$appt->client->surname}}
                              @endif
                            </a><br>
                          @endforeach
                        </td>
                        <td class="cell">
                          @foreach($day as $appt)
                            {{$appt->client->town}}<br>
                          @endforeach
                        </td>
                        <td class="cell text-end">
                          @foreach($day as $appt)
                            <a href="/appointments/{{$appt->id}}/delete" title="Delete">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                              </svg>
                            </a>
                            <br>                          
                          @endforeach
                        </td>
                      </tr>
                    @endforeach              
                  @endforeach            
                @endforeach

              </tbody>
            </table>
          </div>

        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <a class="btn app-btn-primary" href="/appointments">View appointments</a>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                  <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                  <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Overdue invoices</h4>
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
                  <th class="cell">#</th>
                  <th class="cell">Client</th>
                  <th class="cell">Due Date</th>
                  <th class="cell">Value (inc VAT)</th>
                  <th class="cell">Paid</th>
                  <th class="cell"></th>
                </tr>
              </thead>
              <tbody>
              
                @unless(count($overdueInvoices) == 0)

                  @foreach($overdueInvoices as $invoice)

                    <tr>
                      <td class="cell">{{$invoice->account->invoice_prefix}}{{$invoice->id}}{{$invoice->account->invoice_suffix}}</td>
                      <td class="cell">
                        <a href="/clients/{{$invoice->client->id}}">{{$invoice->client->first_name}} {{$invoice->client->surname}}</a>
                      </td>
                      <td class="cell">{{\Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y')}}</td>
                      <td class="cell">&pound;{{number_format($invoice->total()->net,2)}}</td>
                      <td class="cell">
                        
                        <form action="/invoices/{{$invoice->id}}/payment" method="POST">
                          @csrf
                          @method('put')

                          <div class="form-check">
                            <input class="form-check-input" name="paid" type="checkbox" value="1" id="settings-checkbox-1" onChange="this.form.submit()" {{$invoice->paid == 1 ? 'checked' : ''}}>
                          </div>

                        </form>

                      </td>
                      <td class="cell text-end">

                        <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}">View</a>
                        
                      </td>
                    </tr>

                  @endforeach
                        
                @else

                  <tr>
                    <td class="cell" colspan="6">No overdue invoices found!</td>
                  </tr>

                @endunless                    
                
              </tbody>
            </table>
          </div><!--//table-responsive-->          

        </div>
        <div class="app-card-footer p-4 mt-auto">
          <a class="btn app-btn-primary" href="/invoices">View invoices</a>
        </div>
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->
  </div>
    

@endsection