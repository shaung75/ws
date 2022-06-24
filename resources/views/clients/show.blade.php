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
                <div class="item-label"><strong>Telephone</strong></div>
                <div class="item-data">{{$client->telephone}}</div>
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
                <a class="btn-sm app-btn-secondary" href="#">Change</a>
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
              <div class="col-auto">
                <h4>Google map here</h4>
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
                        <th class="cell">Make</a>
                        </th>
                        <th class="cell">Model</th>
                        <th class="cell">Colour</th>
                        <th class="cell">Stock #</th>
                        <th class="cell">Serial #</th>
                        <th class="cell">Service</th>
                        <th class="cell"></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      @unless(count($client->pianos) == 0)

                        @foreach($client->pianos as $piano)

                          <tr>
                            <td class="cell" class="text-center">{{$piano->manufacturer->manufacturer}}</td>
                            <td class="cell">{{$piano->model}}</td>
                            <td class="cell">{{$piano->colour}}</td>
                            <td class="cell">{{$piano->stock_number}}</td>
                            <td class="cell">{{$piano->serial_number}}</td>
                            <td class="cell"><span class="badge bg-success">OK</span></td>
                            <td class="cell"><a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}">View</a></td>
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
              <div class="col-auto">
                INVOICE INFO HERE
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <a class="btn app-btn-secondary" href="/invoices/add?&client={{$client->id}}">Add Invoice</a>
        </div>
        <!--//app-card-footer-->
      </div>
      <!--//app-card-->
    </div>
  </div>
  <!--//row-->

@endsection