@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Delete Invoice {{$invoice->account->invoice_prefix}}{{$invoice->invoice_number}}{{$invoice->account->invoice_suffix}}</h1>
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
              <h4 class="app-card-title">{{$invoice->account->invoice_prefix}}{{$invoice->invoice_number}}{{$invoice->account->invoice_suffix}} - {{$invoice->client->first_name}} {{$invoice->client->surname}}</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Confirm Delete</strong> - This action cannot be undone</div>
                <div class="item-data"></div>
              </div>
              <!--//col-->
              <div class="col text-end">
                
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <form action="/invoices/{{$invoice->id}}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" class="btn app-btn-secondary">Delete Invoice</button>
          </form>
        </div>
        <!--//app-card-footer-->
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->
  </div>
  <!--//row-->

@endsection