@extends('layouts.page')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
  <div class="col-auto">
    <h1 class="app-page-title mb-0">Invoice #{{$invoice->id}}</h1>
  </div>
</div>
<!--//row-->

<form action="/invoices/{{$invoice->id}}" method="POST">

  @csrf
  @method('put')

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
              <h4 class="app-card-title">Invoice Details</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <!--//item-->
          <div class="row mb-3">
            <div class="col-3">
              <label for="account_id" class="form-label">Billing Account</label>
            </div>
            <div class="col-9">

              <select class="form-select" name="account_id">

                @foreach($accounts as $account)

                  <option value="{{$account->id}}" {{$account->id == $invoice->account_id ? 'selected' : ''}}>{{$account->account_name}}</option>

                @endforeach

              </select>
              @error('account_id')
                <div class="alert alert-danger mt-3" role="alert">
                  <small>{{$message}}</small>
                </div>
              @enderror
            </div>
          </div>
          <!-- //item-->

          <div class="row mb-3">
            <div class="col-3">
              <label for="model" class="form-label">Invoice Date</label>    
            </div>
            <div class="col-9">
              <input type="date" class="form-control w-50" name="invoice_date" value="{{$invoice->invoice_date}}"> 

              @error('invoice_date')
                <div class="alert alert-danger mt-3" role="alert">
                  <small>{{$message}}</small>
                </div>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-3">
              <label for="model" class="form-label">Due Date</label>    
            </div>
            <div class="col-9">
              <input type="date" class="form-control w-50" name="due_date" value="{{$invoice->due_date}}"> 

              @error('due_date')
                <div class="alert alert-danger mt-3" role="alert">
                  <small>{{$message}}</small>
                </div>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-3">
              <label for="model" class="form-label">Hide VAT?</label>    
            </div>
            <div class="col-9">
              <div class="form-check">
                <input class="form-check-input" name="hide_vat" type="checkbox" value="1" id="settings-checkbox-1" {{$invoice->hide_vat == 1 ? 'checked' : ''}}>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-3">
              <label for="model" class="form-label">Paid</label>    
            </div>
            <div class="col-9">
              <div class="form-check">
                <input class="form-check-input" name="paid" type="checkbox" value="1" id="settings-checkbox-1" {{$invoice->paid == 1 ? 'checked' : ''}}>
              </div>
            </div>
          </div>

          
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <button class="btn app-btn-primary" type="submit">Save</button>
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
              <h4 class="app-card-title">Client</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          @unless(count($clients) == 0)

            <select class="form-select" name="id">

              <option value="" disabled selected>Select client</option>

              @foreach($clients as $client)

                <option value="{{$client->id}}" {{$client->id == $invoice->client->id ? 'selected' : ''}}>#{{$client->id}} - {{$client->first_name}} {{$client->surname}}</option>

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
        <div class="app-card-footer p-4 mt-auto">
          
        </div>
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->
    
  </div>
</form>

@endsection