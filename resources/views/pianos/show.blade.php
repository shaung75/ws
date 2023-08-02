@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">{{$piano->manufacturer->manufacturer}} {{$piano->model}}</h1>
  <div class="row gy-4">
    <div class="col-12 col-lg-6">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                  <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Piano Details</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <!--//item-->
          @if($piano->client)
            <div class="item border-bottom py-3">
              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <div class="item-label"><strong>Assigned to</strong></div>
                  <div class="item-data">
                    <a href="/clients/{{$piano->client_id}}">
                      {{$piano->client->first_name}} {{$piano->client->surname}} (#{{$piano->client->id}})
                    </a>
                  </div>
                </div>                
              </div>
            </div>
          @endif
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Make</strong></div>
                <div class="item-data">{{$piano->manufacturer->manufacturer}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Model</strong></div>
                <div class="item-data">{{$piano->model}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Ivory keys</strong></div>
                <div class="item-data">{{$piano->ivory_keys == 1 ? 'Yes' : 'No'}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Colour</strong></div>
                <div class="item-data">{{$piano->colour}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Finish</strong></div>
                <div class="item-data">{{$piano->finish}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Serial Number</strong></div>
                <div class="item-data">{{$piano->serial_number}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Stock Number</strong></div>
                <div class="item-data">{{$piano->stock_number}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Year of Manufacture</strong></div>
                <div class="item-data">{{$piano->year_of_manufacture}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
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
                <div class="item-data">{{$piano->notes}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <a class="btn app-btn-secondary" href="/pianos/{{$piano->id}}/edit">Edit Piano</a>
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
                <span class="nav-icon">
                  <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                  </svg>
                </span>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Service History</h4>
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

                  <p><strong>Next service due: {{\Carbon\Carbon::parse($piano->service_status()->due)->format('d/m/Y')}} <span class="badge bg-{{$piano->service_status()->warning}}">{{$piano->service_status()->status}}</span></strong></p>

                  <div class="table-responsive">
                          
                    <table class="table app-table-hover mb-0 text-left">
                      <thead>
                        <tr>
                          <th class="cell">Service Date</th>
                          <th class="cell">Type</th>
                          <th class="cell">Price</th>
                          <th class="cell"></th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        @unless(count($piano->services) == 0)

                          @foreach($piano->services->sortBy('service_date') as $service)

                            <tr>
                              <td class="cell">{{\Carbon\Carbon::parse($service->service_date)->format('d/m/Y')}}</td>
                              <td class="cell">{{$service->type->type}}</td>
                              <td class="cell">
                                @if($service->price)
                                  &pound;{{$service->price}}
                                @endif
                              </td>
                              <td class="cell">
                                <a class="btn-sm app-btn-secondary" href="/services/{{$service->id}}">View</a>
                                <a class="btn-sm app-btn-secondary" href="/services/{{$service->id}}/delete">Delete</a>
                              </td>
                            </tr>

                          @endforeach
                                
                        @else

                          <tr>
                            <td class="cell" colspan="4">No service history found</td>
                          </tr>

                        @endunless                    
                        
                      </tbody>
                    </table>
                  </div><!--//table-responsive--> 

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
          <a class="btn app-btn-secondary" href="/services/create/{{$piano->id}}">Add service</a>
        </div>
        <!--//app-card-footer-->
      </div>
      <!--//app-card-->
    </div>
    

@endsection