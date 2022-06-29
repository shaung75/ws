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
      <h3 class="section-title">Invoices</h3>
      <div class="section-intro"></div>
    </div>
    <div class="col-12 col-md-8">
      <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
        
          <div class="mb-3">
            <label for="tax_rate" class="form-label">
              Tax rate (%)
            </label>
            <input type="number" class="form-control" id="tax_rate" name="tax_rate" value="{{$settings->tax_rate}}" required>

            @error('tax_rate')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

          </div>
          <div class="mb-3">
            <label for="invoice_prefix" class="form-label">Invoice Prefix</label>
            <input type="text" class="form-control" id="invoice_prefix" name="invoice_prefix" value="{{$settings->invoice_prefix}}">

            @error('invoice_prefix')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror

          </div>
          <div class="mb-3">
            <label for="invoice_suffix" class="form-label">Invoice Suffix</label>
            <input type="text" class="form-control" id="invoice_suffix" name="invoice_suffix" value="{{$settings->invoice_suffix}}">

            @error('invoice_suffix')
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

</form>

@endsection