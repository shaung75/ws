@extends('layouts.page')

@section('content')

  <div class="row">
    <div class="col-6">
      <h1 class="app-page-title">
        Appointment Details

        @if($appointment->complete)
          <span style="color: #15a362;">(Complete)</span>
        @endif
      </h1>
    </div>
    <div class="col-6">
      <a href="/appointments/{{$appointment->id}}/delete" class="btn btn-danger text-white">Delete Appointment</a>
    </div>
  </div>

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
              <h4 class="app-card-title">{{\Carbon\Carbon::parse($appointment->date)->format('d/m/Y - H:i')}}</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <!--//item-->
          @if($appointment->client->business_name)
            <div class="item border-bottom py-3">
              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <div class="item-label"><strong>Business Name</strong></div>
                  <div class="item-data">
                    <a href="/clients/{{$appointment->client->id}}">
                      {{$appointment->client->business_name}}
                    </a>
                  </div>
                </div>
                <!--//col-->
                <div class="col text-end">
                  <a class="btn-sm app-btn-secondary" href="/appointments/{{$appointment->id}}/edit">Change</a>
                </div>
                <!--//col-->
              </div>
              <!--//row-->
            </div>
            <!--//item-->
          @endif
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Name</strong></div>
                <div class="item-data">
                  @if($appointment->client->business_name)
                    {{$appointment->client->first_name}} {{$appointment->client->surname}}
                  @else
                    <a href="/clients/{{$appointment->client->id}}">
                      {{$appointment->client->first_name}} {{$appointment->client->surname}}
                    </a>
                  @endif
                </div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/appointments/{{$appointment->id}}/edit">Change</a>
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
                  @if($appointment->client->address1)
                    {{$appointment->client->address1}}<br>
                  @endif
                  @if($appointment->client->address2)
                    {{$appointment->client->address2}}<br>
                  @endif
                  @if($appointment->client->town)
                    {{$appointment->client->town}}<br>
                  @endif
                  @if($appointment->client->county)
                    {{$appointment->client->county}}<br>
                  @endif
                  @if($appointment->client->postcode)
                    {{$appointment->client->postcode}}<br>
                  @endif
                </div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/appointments/{{$appointment->id}}/edit">Change</a>
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
                <div class="item-data">{{$appointment->client->telephone}}</div>
                <div class="item-data">{{$appointment->client->telephone_secondary}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/appointments/{{$appointment->id}}/edit">Change</a>
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
                <div class="item-data">{{$appointment->notes}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/appointments/{{$appointment->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto container">
          <div class="row">
            <div class="col-6">
              <a class="btn app-btn-secondary" href="/appointments/{{$appointment->id}}/edit">Edit Appointment</a>
            </div>
            <div class="col-6 text-end">
              <form action="/appointments/{{$appointment->id}}/complete" method="POST">
                @csrf
                @method('PUT')

                <button type="submit" class="btn app-btn-primary">Mark as Complete</button>
              </form>
            </div>
          </div>
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
                    const uluru = { lat: {{$appointment->client->lat}}, lng: {{$appointment->client->long}} };
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
          
        </div>
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->
    
  </div>
  <!--//row-->

@endsection