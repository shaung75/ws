@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Add New Service</h1>
  
  <form action="/services" autocomplete="off" method="POST">

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
	              <h4 class="app-card-title">Service Details</h4>
	            </div>
	            <!--//col-->
	          </div>
	          <!--//row-->
	        </div>

	        <!--//app-card-header-->
	        <div class="app-card-body px-4 w-100">

	        	@unless(count($pianos) == 0)

							<div class="row mb-3">
								<div class="col-3">
									<label for="piano_id" class="form-label">Piano</label>
								</div>
								<div class="col-9">
									<select class="form-select" id="piano" name="piano_id">
										<option>Select piano</option>
										@foreach($pianos as $piano)
											<option value="{{$piano->id}}" {{old('piano_id') == $piano->id || $p->id == $piano->id ? 'selected' : ''}}>
												#{{$piano->stock_number}} - {{$piano->manufacturer->manufacturer}} {{$piano->model}}
											</option>
										@endforeach
									</select>

									@error('manufacturer_id')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-3">
									<label for="type_id" class="form-label">Service type</label>
								</div>
								<div class="col-9">
									<select class="form-select" id="type_id" name="type_id">
										<option value="">Select service type</option>
										@foreach($types as $type)
											<option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>
												{{$type->type}}
											</option>
										@endforeach
									</select>

									@error('type_id')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-3">
									<label for="model" class="form-label">Date</label>		
								</div>
								<div class="col-9">
									<input type="text" class="form-control w-25 datePick" name="service_date" value="{{old('service_date')}}">	

									@error('model')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<hr class="mb-3">

							<div class="row mb-3">
								<div class="col-3">
									<label for="colour" class="form-label">Technician</label>		
								</div>
								<div class="col-9">
									<input type="text" class="form-control" id="technician" name="technician" value="{{old('technician')}}">		

									@error('technician')
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
		          <button type="submit" class="btn app-btn-primary">Create Service</button>
		        </div>
		        <!--//app-card-footer-->

	        @else
						<p>You need to add some pianos first! <a href="/pianos">Do that here</a></p>
					@endunless
	      </div>
	      <!--//app-card-->
	    </div>
	    <!--//col-->

	  </div>
	  <!--//row-->

	</form>

@endsection