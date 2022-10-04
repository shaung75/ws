@extends('layouts.page')

@section('content')

<form action='/settings' method="POST">
  @csrf
  @method('put')
  <h1 class="app-page-title">Settings</h1>
  <hr class="mb-4">
  <div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
      <h3 class="section-title">General</h3>
      <div class="section-intro"></div>
    </div>
    <div class="col-12 col-md-8">
      <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
        
          <div class="mb-3">
            <label for="setting-input-1" class="form-label">
              Business Name
            </label>
            <input type="text" class="form-control" id="business_name" name="business_name" value="{{$settings->business_name}}" required>

            @error('business_name')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="business_address" class="form-label">Business Address</label>
            
            <input type="text" class="form-control" id="business_address1" name="business_address1" value="{{$settings->business_address1}}" required placeholder="Address line 1">

            @error('business_address1')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

            <input type="text" class="form-control" id="business_address2" name="business_address2" value="{{$settings->business_address2}}" placeholder="Address line 2">

            @error('business_address2')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

            <input type="text" class="form-control" id="town" name="business_town" value="{{$settings->business_town}}" required placeholder="Town">

            @error('business_town')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

            <input type="text" class="form-control" id="county" name="business_county" value="{{$settings->business_county}}" required placeholder="County">

            @error('business_county')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

            <input type="text" class="form-control" id="postcode" name="business_postcode" value="{{$settings->business_postcode}}" required placeholder="Postcode">

            @error('business_postcode')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

          </div>
          <div class="mb-3">
            <label for="business_email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="business_email" name="business_email" value="{{$settings->business_email}}">

            @error('business_email')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

          </div>
          <div class="mb-3">
            <label for="business_telephone" class="form-label">Telephone Number</label>
            <input type="text" class="form-control" id="business_telephone" name="business_telephone" value="{{$settings->business_telephone}}">

            @error('business_telephone')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

          </div>
          <button type="submit" class="btn app-btn-primary" >Save Changes</button>
        
        </div>
        <!--//app-card-body-->
      </div>
      <!--//app-card-->
    </div>
  </div>
  <!--//row-->
  
  <hr class="my-4">

  <div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
      <h3 class="section-title">Accounts</h3>
      <div class="section-intro"></div>
    </div>
    <div class="col-12 col-md-8">
      <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
        
          <div class="mb-3">
            @foreach($accounts as $account)
              <h5><strong>{{$account->account_name}}</strong></h5>
              <p>
                <strong>Tax Rate:</strong><br>
                {{$account->tax_rate}}%
              </p>
              <p>
                <strong>Invoice Prefix:</strong><br>
                {{$account->invoice_prefix}}
              </p>
              <p>
                <strong>Invoice Suffix:</strong><br>
                {{$account->invoice_suffix}}
              </p>
              <p>
                <strong>Invoices start from:</strong><br>
                {{$account->invoice_start_from}}
              </p>              
              <p>
                <strong>Payment Details:</strong><br>
                {{$account->payment_details}}
              </p>
              <p>
                <strong>Invoice Footer:</strong><br>
                {{$account->invoice_footer}}
              </p>

              <a href="/accounts/{{$account->id}}/edit" class="btn app-btn-primary" >Edit</a>
              <hr class="mb-3">
            @endforeach
          </div>
        
        </div>
        <!--//app-card-body-->
      </div>
      <!--//app-card-->
    </div>
  </div>
  <!--//row-->

</form>

@endsection