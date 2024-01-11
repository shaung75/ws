@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Account #{{$client->id}}</h1>
  <div class="row gy-4">
    <div class="col-12 col-lg-6">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Client Details</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Business Name</strong></div>
                <div class="item-data">
                  @if($client->business_name)
                    {{$client->business_name}}
                  @else
                    N/A
                  @endif
                </div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/clients/{{$client->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Name</strong></div>
                <div class="item-data">{{$client->first_name}} {{$client->surname}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/clients/{{$client->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Email</strong></div>
                <div class="item-data">{{$client->email}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/clients/{{$client->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Telephone(s)</strong></div>
                <div class="item-data">{{$client->telephone}}</div>
                <div class="item-data">{{$client->telephone_secondary}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/clients/{{$client->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Address</strong></div>
                <div class="item-data">
                  @if($client->address1)
                    {{$client->address1}}<br>
                  @endif
                  @if($client->address2)
                    {{$client->address2}}<br>
                  @endif
                  @if($client->town)
                    {{$client->town}}<br>
                  @endif
                  @if($client->county)
                    {{$client->county}}<br>
                  @endif
                  @if($client->postcode)
                    {{$client->postcode}}<br>
                  @endif
                </div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/clients/{{$client->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Notes</strong></div>
                <div class="item-data">{{$client->notes}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/clients/{{$client->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <a class="btn app-btn-secondary" href="/clients/{{$client->id}}/edit">Edit Client</a>
          <a class="btn app-btn-primary" href="/appointments/create/{{$client->id}}">Book Appointment</a>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                  <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Location</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <div class="item py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col">
                <div id="map"></div>
                <script>
                  // Initialize and add the map
                  function initMap() {
                    // The location of Uluru
                    const uluru = { lat: {{$client->lat}}, lng: {{$client->long}} };
                    // The map, centered at Uluru
                    const map = new google.maps.Map(document.getElementById("map"), {
                      zoom: 17,
                      center: uluru,
                    });
                    // The marker, positioned at Uluru
                    const marker = new google.maps.Marker({
                      position: uluru,
                      map: map,
                    });
                  }

                  window.initMap = initMap;
                </script>

              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
        </div>
        <div class="app-card-footer p-4 mt-auto">
          <a class="btn app-btn-secondary" href="/clients/{{$client->id}}/edit">Set Location</a>
        </div>
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->
    <div class="col-12">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <span class="nav-icon">
                  <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                    <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                  </svg>
                </span>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Pianos</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col">
                <div class="table-responsive">
                        
                  <table class="table app-table-hover mb-0 text-left">
                    <thead>
                      <tr>
                        <th class="cell">Stock #</th>
                        <th class="cell">Make</th>
                        <th class="cell">Model</th>
                        <th class="cell">Colour</th>
                        <th class="cell">Serial #</th>
                        <th class="cell">Service</th>
                        <th class="cell"></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      @unless(count($client->pianos) == 0)

                        @foreach($client->pianos as $piano)

                          <tr>
                            <td class="cell">{{$piano->stock_number}}</td>
                            <td class="cell" class="text-center">{{$piano->manufacturer->manufacturer}}</td>
                            <td class="cell">{{$piano->model}}</td>
                            <td class="cell">{{$piano->colour}}</td>
                            <td class="cell">{{$piano->serial_number}}</td>
                            <td class="cell"><span class="badge bg-{{$piano->service_status()->warning}}">{{$piano->service_status()->status}}</span></td>
                            <td class="cell">
                              <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}">View</a>
                              <a class="btn-sm app-btn-secondary" href="/pianos/unassign/{{$piano->id}}">Unassign</a>
                            </td>
                          </tr>

                        @endforeach
                              
                      @else

                        <tr>
                          <td class="cell" colspan="4">No pianos found</td>
                        </tr>

                      @endunless                    
                      
                    </tbody>
                  </table>
                </div><!--//table-responsive--> 
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          
          <!-- Button trigger modal -->
          <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#assignPiano">
            Assign a piano to client
          </button>

          <!-- Modal -->
          <div class="modal fade" id="assignPiano" tabindex="-1" aria-labelledby="assignPianoLabel" aria-hidden="true">
            <form action="/pianos/assign-client" method="POST">
              @csrf
              @method('put')
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="assignPianoLabel">Assign a piano to client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @unless(count($availablePianos) == 0)
                      <select class="form-select" name="piano_id">
                        @foreach($availablePianos as $availablePiano)
                          <option value="{{$availablePiano->id}}">{{$availablePiano->manufacturer->manufacturer}} {{$availablePiano->model}} (s/n: {{$availablePiano->serial_number}})</option>
                        @endforeach
                      </select>
                      <input type="hidden" value="{{$client->id}}" name="client_id">
                    @else
                      <p>No available pianos to assign to the client</p>
                    @endunless
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn app-btn-primary">Assign piano</button>
                  </div>
                </div>
              </div>
            </form>
          </div>         
        </div>
      </div>
      <!--//app-card-->
    </div>
    <div class="col-12">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                  <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Invoices</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col">
                <div class="table-responsive">
                        
                  <table class="table app-table-hover mb-0 text-left">
                    <thead>
                      <tr>
                        <th class="cell">Invoice #</th>
                        <th class="cell">Date</th>
                        <th class="cell">Due Date</th>
                        <th class="cell">Value (inc VAT)</th>
                        <th class="cell">Status</th>
                        <th class="cell">Paid</th>
                        <th class="cell"></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      @unless(count($client->invoices) == 0)

                        @foreach($client->invoices as $invoice)

                          <tr>
                            <td class="cell">{{$invoice->account->invoice_prefix}}{{$invoice->invoice_number}}{{$invoice->account->invoice_suffix}}</td>
                            <td class="cell">{{\Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y')}}</td>
                            <td class="cell">{{\Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y')}}</td>
                            <td class="cell">{{$invoice->total()->net}}</td>
                            <td class="cell">
                              @if($invoice->paymentStatus() == 'Paid')
                                <span class="badge bg-success">
                                  {{$invoice->paymentStatus()}}
                                </span>
                              @elseif($invoice->paymentStatus() == 'Pending')
                                <span class="badge bg-warning">
                                  {{$invoice->paymentStatus()}}
                                </span>
                              @else
                                <span class="badge bg-danger">
                                  {{$invoice->paymentStatus()}}
                                </span>
                              @endif
                            </td>
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
                              <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}/delete">Delete</a>
                              <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}">View</a>
                            </td>
                          </tr>

                        @endforeach
                              
                      @else

                        <tr>
                          <td class="cell" colspan="4">No invoices found</td>
                        </tr>

                      @endunless                    
                      
                    </tbody>
                  </table>
                </div><!--//table-responsive--> 
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <a href="/invoices/create/{{$client->id}}" class="btn app-btn-primary">Add Invoice</a>
        </div>
        <!--//app-card-footer-->
      </div>
      <!--//app-card-->
    </div>
  </div>
  <!--//row-->

@endsection