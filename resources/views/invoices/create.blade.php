@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Add new invoice</h1>
  
  <form action="/invoices/add" method="POST">

	  <div class="row gy-4">
		
			@csrf

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
	              <h4 class="app-card-title">Client Details</h4>
	            </div>
	            <!--//col-->
	          </div>
	          <!--//row-->
	        </div>

	        <!--//app-card-header-->
	        <div class="app-card-body px-4 w-100">

						<div class="row mb-3">
							<div class="col-3">
								<label for="id" class="form-label">Select client</label>		
							</div>
							<div class="col-9">

								@unless(count($clients) == 0)

									<select class="form-select" name="id">

										<option value="" disabled selected>Select client</option>

										@foreach($clients as $client)

											<option value="{{$client->id}}">#{{$client->id}} - 
												@if($client->business_name)
													{{$client->business_name}}
												@else
													{{$client->first_name}} {{$client->surname}}
												@endif
											</option>

										@endforeach

									</select>
									
									@error('id')
										<div class="alert alert-danger mt-3" role="alert">
											<small>{{$message}}</small>
										</div>
									@enderror

								@else

									<p>No clients found</p>

								@endunless

							</div>
						</div>

	        </div>
	        <!--//app-card-body-->
	        <div class="app-card-footer p-4 mt-auto">
	          <button type="submit" class="btn app-btn-primary">Create Invoice</button>
	        </div>
	        <!--//app-card-footer-->
	      </div>
	      <!--//app-card-->
	    </div>
	    <!--//col-->
	  </div>
	  <!--//row-->

	</form>

@endsection