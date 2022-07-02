@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Account #{{$client->id}}</h1>
  
  <form action="/clients/{{$client->id}}" method="POST">

	  <div class="row gy-4">
		
			@csrf
			@method('PUT')

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
						<div class="row mb-3">
							<div class="col">
								<label for="first_name" class="form-label">First Name</label>		
								<input type="text" class="form-control" id="first_name" name="first_name" value="{{$client->first_name}}">		
								
								@error('first_name')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
							<div class="col">
								<label for="surname" class="form-label">Last Name</label>		
								<input type="text" class="form-control" id="surname" name="surname" value="{{$client->surname}}">		

								@error('surname')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<hr class="mb-3">

						<div class="row mb-3">
							<div class="col-3">
								<label for="address1" class="form-label">Address</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="address1" name="address1" value="{{$client->address1}}">		

								@error('address1')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-3">
								<label for="address2" class="form-label sr-only">Address line 2</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="address2" name="address2" value="{{$client->address2}}">		

								@error('address2')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-3">
								<label for="town" class="form-label">Town</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="town" name="town" value="{{$client->town}}">		

								@error('town')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-3">
								<label for="county" class="form-label">County</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="county" name="county" value="{{$client->county}}" >		

								@error('county')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-3">
								<label for="postcode" class="form-label">Postcode</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="postcode" name="postcode" value="{{$client->postcode}}">		

								@error('postcode')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<hr class="mb-3">

						<div class="row mb-3">
							<div class="col-3">
								<label for="telephone" class="form-label">Telephone</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="telephone" name="telephone" value="{{$client->telephone}}">		

								@error('telephone')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-3">
								<label for="email" class="form-label">Email</label>		
							</div>
							<div class="col-9">
								<input type="email" class="form-control" id="email" name="email" value="{{$client->email}}">		

								@error('email')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label for="notes" class="form-label">Notes</label>		
							</div>
							<div class="col-9">
								<textarea class="form-control" id="notes" rows="10" name="notes" style="height:100px;">{{$client->notes}}</textarea>

								@error('notes')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>
	        </div>
	        <!--//app-card-body-->
	        <div class="app-card-footer p-4 mt-auto">
	          <button type="submit" class="btn app-btn-primary">Update Client</button>
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
	                <p><strong>Instructions: </strong>Use the map to set the exact location of the client, otherwise the postcode will be used (you can set the exact location at a later date if required).</p>

	              	<input id="delete-markers" type="button" value="Delete Marker" class="btn app-btn-primary" />

	              	<hr>
							    
							    <div id="map"></div>
	                <script>
	                	var markers = [];

	                  function initMap() {
	                  	const start = { lat: 53.000224, lng: -0.407004 };
	                    
	                    const map = new google.maps.Map(document.getElementById("map"), {
	                      zoom: 17,
	                      center: start,
	                    });
	                    
	                    map.addListener("click", (e) => {
										    placeMarkerAndPanTo(e.latLng, map);
										  });

	                    // Add listener to delete marker button
	                    document.getElementById("delete-markers").addEventListener("click", deleteMarkers);

										  @if($client->lat != '')
										  	var oldLatLng = { lat: {{$client->lat}}, lng: {{$client->long}} };
												var marker = new google.maps.Marker({
											    position: oldLatLng,
											    map: map,
											  });
											  map.panTo(oldLatLng);

											  markers.push(marker);
											@endif
	                  }

	                  function placeMarkerAndPanTo(latLng, map) {
	                  	deleteMarkers();

										  var marker = new google.maps.Marker({
										    position: latLng,
										    map: map,
										  });
										  map.panTo(latLng);

										  markers.push(marker);

										  document.getElementById("lat").value = latLng.lat(function(){});
										  document.getElementById("long").value = latLng.lng(function(){});
										}

										function deleteMarkers() {
											document.getElementById("lat").value = '';
											document.getElementById("long").value = '';

											//Loop through all the markers and remove
											for (var i = 0; i < markers.length; i++) {
												markers[i].setMap(null);
											}
											markers = [];
										};

	                  window.initMap = initMap;
	                </script>

	                <input type="text" id="lat" name="lat" value="{{$client->lat}}">
	                <input type="text" id="long" name="long" value="{{$client->long}}">
	              </div>
	              <!--//col-->
	            </div>
	            <!--//row-->
	          </div>
	        </div>
	        <div class="app-card-footer p-4 mt-auto"> 
	         	<p>Lat: <span class="lat">0.1655</span>, Long: <span class="long">54.24545</span></p>          
	        </div>
	      </div>
	      <!--//app-card-->
	    </div>
	    <!--//col-->
	  </div>
	  <!--//row-->

	</form>

@endsection