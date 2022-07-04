@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Duplicate Piano ({{$piano->manufacturer->manufacturer}} {{$piano->model}})</h1>
  
  <form action="/pianos" method="POST">

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
	              <h4 class="app-card-title">Piano Details</h4>
	            </div>
	            <!--//col-->
	          </div>
	          <!--//row-->
	        </div>

	        <!--//app-card-header-->
	        <div class="app-card-body px-4 w-100">

	        	@unless(count($manufacturers) == 0)

							<div class="row mb-3">
								<div class="col-3">
									<label for="manufacturer_id" class="form-label">Manufacturer</label>
								</div>
								<div class="col-9">
									<select class="form-select" id="manufacturer" name="manufacturer_id">
										<option>Select manufacturer</option>
										@foreach($manufacturers as $manufacturer)
											<option value="{{$manufacturer->id}}" {{old('manufacturer_id', $piano->manufacturer_id) == $manufacturer->id ? 'selected' : ''}}>{{$manufacturer->manufacturer}}</option>
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
									<label for="model" class="form-label">Model</label>		
								</div>
								<div class="col-9">
									<input type="text" class="form-control" id="model" name="model" value="{{old('model', $piano->model)}}">		

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
									<label for="colour" class="form-label">Colour</label>		
								</div>
								<div class="col-9">
									<input type="text" class="form-control" id="colour" name="colour" value="{{old('colour', $piano->colour)}}">		

									@error('colour')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-3">
									<label for="finish" class="form-label">Finish</label>		
								</div>
								<div class="col-9">
									<input type="text" class="form-control" id="finish" name="finish" value="{{old('finish', $piano->finish)}}" >		

									@error('finish')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-3">
									<label for="serial_number" class="form-label">Serial Number</label>		
								</div>
								<div class="col-9">
									<input type="text" class="form-control" id="serial_number" name="serial_number" value="{{old('serial_number')}}">		

									@error('serial_number')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-3">
									<label for="stock_number" class="form-label">Stock Number</label>		
								</div>
								<div class="col-9">
									<input type="text" class="form-control" id="stock_number" name="stock_number" value="{{old('stock_number')}}">		

									@error('stock_number')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-3">
									<label for="year_of_manufacture" class="form-label">Year of Manufacture</label>		
								</div>
								<div class="col-9">
									<input type="text" class="form-control" id="year_of_manufacture" name="year_of_manufacture" value="{{old('year_of_manufacture', $piano->year_of_manufacture)}}">		

									@error('year_of_manufacture')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

							<div class="row mb-3">
								<div class="col-3">
									<label for="year_of_manufacture" class="form-label">Piano has ivory keys</label>		
								</div>
								<div class="col-9">
									<div class="form-check">
                    <input class="form-check-input" name="ivory_keys" type="checkbox" value="1" id="settings-checkbox-1" {{old('ivory_keys', $piano->ivory_keys) == 1 ? 'checked' : ''}}>
                  </div>	

									@error('ivory_keys')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror
								</div>
							</div>

						
		        </div>
		        <!--//app-card-body-->
		        <div class="app-card-footer p-4 mt-auto">
		          <button type="submit" class="btn app-btn-primary">Create Piano</button>
		        </div>
		        <!--//app-card-footer-->

	        @else
						<p>You need to add some manufacturers first! <a href="/manufacturers">Do that here</a></p>
					@endunless
	      </div>
	      <!--//app-card-->
	    </div>
	    <!--//col-->

	  </div>
	  <!--//row-->

	</form>

@endsection