@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Edit Account</h1>
  
  <form action="/accounts/{{$account->id}}" method="POST">

	  <div class="row gy-4">
		
			@csrf
			@method('put')

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
	              <h4 class="app-card-title">Account Details</h4>
	            </div>
	            <!--//col-->
	          </div>
	          <!--//row-->
	        </div>

	        <!--//app-card-header-->
	        <div class="app-card-body px-4 w-100">

						<div class="row mb-3">
							<div class="col-3">
								<label for="account_name" class="form-label">Account Name</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="account_name" name="account_name" value="{{$account->account_name}}">		

								@error('account_name')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<hr class="mb-3">

						<div class="row mb-3">
							<div class="col-3">
								<label for="tax_rate" class="form-label">Tax Rate(%)</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="tax_rate" name="tax_rate" value="{{$account->tax_rate}}">		

								@error('tax_rate')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label for="invoice_prefix" class="form-label">Invoice Prefix</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix" value="{{$account->invoice_prefix}}" >		

								@error('invoice_prefix')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label for="invoice_suffix" class="form-label">Invoice Suffix</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="invoice_suffix" name="invoice_suffix" value="{{$account->invoice_suffix}}">		

								@error('invoice_suffix')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label for="invoice_start_from" class="form-label">Invoice numbers start from</label>		
							</div>
							<div class="col-9">
								<input type="text" class="form-control" id="invoice_start_from" name="invoice_start_from" value="{{$account->invoice_start_from}}">		

								@error('invoice_start_from')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label for="payment_details" class="form-label">Payment Details</label>		
							</div>
							<div class="col-9">
								<textarea class="form-control" id="payment_details" name="payment_details" rows="10" style="height:100px;">{{$account->payment_details}}</textarea>

								@error('payment_details')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label for="invoice_footer" class="form-label">Invoice Footer</label>		
							</div>
							<div class="col-9">
								<textarea class="form-control" id="invoice_footer" name="invoice_footer" rows="10" style="height:100px;">{{$account->invoice_footer}}</textarea>

								@error('invoice_footer')
									<div class="alert alert-danger mt-3" role="alert">
										<small>{{$message}}</small>
									</div>
								@enderror
							</div>
						</div>
					
	        </div>
	        <!--//app-card-body-->
	        <div class="app-card-footer p-4 mt-auto">
	          <button type="submit" class="btn app-btn-primary">Update Account</button>
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