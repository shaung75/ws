@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Add Appointment</h1>
  
  <form action="/appointments" method="POST">

	  <div class="row gy-4">
		
			@csrf

	    <div class="col-12">
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
	              <h4 class="app-card-title">Appointment Details</h4>
	            </div>
	            <!--//col-->
	          </div>
	          <!--//row-->
	        </div>

	        <!--//app-card-header-->
	        <div class="app-card-body px-4 w-100">

	        	@unless(count($clients) == 0)

							<div class="row mb-3">
								<div class="col-3">
									<label for="client_id" class="form-label">Client</label>
								</div>
								<div class="col-5">
									<select class="form-select" id="client" name="client_id">
										<option disabled selected>Select Client</option>
										
										@php
											$prevBus = '';
										@endphp

										@foreach($clients as $key => $client)

											@if(!$prevBus && $client->business_name)
												<option disabled>-----</option>	
											@endif

											<option value="{{$client->id}}" {{old('client_id') == $client->id || $client_id == $client->id ? 'selected' : ''}}>
												
												@if($client->business_name)
													{{$client->business_name}}
												@else
													{{$client->surname}}, {{$client->first_name}}
												@endif
												
											</option>

											@php
												$prevBus = $client->business_name;
											@endphp
										@endforeach

									</select>

									@error('client_id')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror

								</div>
								<div class="col-4">
									<small><a href="/clients/create">Create Client</a></small>
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-3">
									<label for="model" class="form-label">Date &amp; Time</label>		
								</div>
								<div class="col-3">
									<input type="datetime-local" class="form-control" name="date" value="{{old('date')}}">

									@error('date')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<hr class="mb-3">

							<div class="row mb-3">
								<div class="col-3">
									<label for="notes" class="form-label">Notes</label>		
								</div>
								<div class="col-9">
									<textarea class="form-control" id="notes" rows="10" name="notes" style="height:100px;">{{old('notes')}}</textarea>	

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
		          <button type="submit" class="btn app-btn-primary">Create Appointment</button>
		        </div>
		        <!--//app-card-footer-->

	        @else
						<p>You need to add some clients first! <a href="/clients">Do that here</a></p>
					@endunless
	      </div>
	      <!--//app-card-->
	    </div>
	    <!--//col-->

	  </div>
	  <!--//row-->

	</form>

@endsection