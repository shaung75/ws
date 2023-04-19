@extends('layouts.page')

@section('content')

<div class="row g-3 mb-4 align-items-center justify-content-between">
  <div class="col-auto">
    <h1 class="app-page-title mb-0">Invoice {{$invoice->account->invoice_prefix}}{{$invoice->invoice_number}}{{$invoice->account->invoice_suffix}}</h1>
  </div>
  <div class="col-auto">
    <div class="page-utilities">
      <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
        <div class="col-auto">
          <a class="btn app-btn-secondary" href="/invoices/{{$invoice->id}}/pdf">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
              <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
              <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
            </svg>
            Download Invoice
          </a>
        </div>
        <div class="col-auto">
          <a class="btn app-btn-primary" href="/invoices/{{$invoice->id}}/mail">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
            Email to Client
          </a>
        </div>
      </div>
      <!--//row-->
    </div>
    <!--//table-utilities-->
  </div>
  <!--//col-auto-->
</div>
<!--//row-->

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
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Billing Account</strong></div>
                <div class="item-data">{{$invoice->account->account_name}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Invoice Date</strong></div>
                <div class="item-data">{{\Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y')}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Due Date</strong></div>
                <div class="item-data">{{\Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y')}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Paid</strong></div>
                <div class="item-data">{{$invoice->paid ? 'Paid' : 'Unpaid'}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Hide VAT</strong></div>
                <div class="item-data">{{$invoice->hide_vat ? 'Yes' : 'No'}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label"><strong>Overridden Sub Total &amp; VAT</strong></div>
                <div class="item-data">{{$invoice->override_values ? 'Yes' : 'No'}}</div>
              </div>
              <!--//col-->
              <div class="col text-end">
                <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}/edit">Change</a>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          <a class="btn app-btn-secondary" href="/invoices/{{$invoice->id}}/edit">Edit Invoice</a>
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
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <div class="item-label">
                  @if($invoice->client->business_name)
                    <a href="/clients/{{$invoice->client->id}}">
                      <strong>{{$invoice->client->business_name}}</strong>
                    </a><br>
                    {{$invoice->client->first_name}} {{$invoice->client->surname}}
                  @else
                    <a href="/clients/{{$invoice->client->id}}">
                      <strong>{{$invoice->client->first_name}} {{$invoice->client->surname}}</strong>
                    </a>
                  @endif
                </div>
                <div class="item-data">
                  @if($invoice->client->address1)
                    {{$invoice->client->address1}}<br>
                  @endif
                  @if($invoice->client->address2)
                    {{$invoice->client->address2}}<br>
                  @endif
                  @if($invoice->client->town)
                    {{$invoice->client->town}}<br>
                  @endif
                  @if($invoice->client->county)
                    {{$invoice->client->county}}<br>
                  @endif
                  @if($invoice->client->postcode)
                    {{$invoice->client->postcode}}<br>
                  @endif
                </div>
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
        <div class="app-card-footer p-4 mt-auto">
          
        </div>
      </div>
      <!--//app-card-->
    </div>
    <!--//col-->
    <div class="col-12">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <span class="nav-icon">
                  <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                    <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                  </svg>
                </span>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">Items</h4>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
        </div>
        <!--//app-card-header-->
        <div class="app-card-body px-4 w-100">
          <div class="item border-bottom py-3">
            <div class="row justify-content-between align-items-center">
              <div class="col">
                <div class="table-responsive">
                        
                  <table class="table app-table-hover mb-0 text-left">
                    <thead>
                      <tr>
                        <th class="cell">Qty</th>
                        <th class="cell">Description</th>
                        <th class="cell">
                          Unit Price
                        </th>
                        <th class="cell">Total Price</th>
                        <th class="cell"></th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      @unless(count($invoice->items) == 0)

                        @foreach($invoice->items as $item)

                          <tr>
                            <td class="cell">{{$item->qty}}</td>
                            <td class="cell">{{$item->description}}</td>
                            <td class="cell">
                              &pound;{{number_format($item->unit_price,2)}}
                            </td>
                            <td class="cell">
                              &pound;{{number_format($item->unit_price * $item->qty,2)}}
                            </td>
                            <td class="cell text-end">
                              <form action="/invoice-items/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn app-btn-secondary py-0">Delete</button>
                              </form>
                            </td>
                          </tr>

                        @endforeach
                              
                      @else

                        <tr>
                          <td class="cell" colspan="4">No items found</td>
                        </tr>

                      @endunless                    
                      
                    </tbody>
                  </table>

                </div><!--//table-responsive--> 
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        <div class="app-card-footer p-4 mt-auto">
          
          <!-- Button trigger modal -->
          <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#assignItem">
            Add item to invoice
          </button>

          <!-- Modal -->
          <div class="modal fade" id="assignItem" tabindex="-1" aria-labelledby="assignItemLabel" aria-hidden="true">
            <form action="/invoice-items/create/{{$invoice->id}}" method="POST">
              @csrf
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="assignPianoLabel">Add item to invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <div class="mb-3">
                      <label for="setting-input-1" class="form-label">
                        <strong>Qty</strong>
                      </label>
                      <input type="number" class="form-control" id="qty" name="qty" value="{{old('qty')}}" required>

                      @error('qty')
                        <div class="alert alert-danger mt-3" role="alert">
                          <small>{{$message}}</small>
                        </div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="setting-input-1" class="form-label">
                        <strong>Description</strong>
                      </label>
                      <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" required>

                      @error('description')
                        <div class="alert alert-danger mt-3" role="alert">
                          <small>{{$message}}</small>
                        </div>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="setting-input-1" class="form-label">
                        <strong>Unit price (inc. VAT)</strong>
                      </label>
                      <input type="number" step=".01" class="form-control" id="unit_price" name="unit_price" value="{{old('unit_price')}}" required value="0.00">

                      @error('unit_price')
                        <div class="alert alert-danger mt-3" role="alert">
                          <small>{{$message}}</small>
                        </div>
                      @enderror
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn app-btn-primary">Add item</button>
                  </div>
                </div>
              </div>
            </form>
          </div>         
        </div>
      </div>
      <!--//app-card-->
    </div>

    <div class="col-4 offset-8">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        
        <div class="app-card-body px-4 w-100">
          <div class="item border-bottom py-3">
            <div class="row ">
              <div class="col">
                <div class="table-responsive">
                        
                  <table class="table app-table-hover mb-0 text-end">
                    <tbody>
                      @if(!$invoice->hide_vat)

                        @if($invoice->override_values)

                          @if($invoice->total()->net != $invoice->override_sub_total + $invoice->override_vat)
                            <tr>
                              <td class="cell text-center" colspan="2">
                                <div class="alert alert-danger" role="alert">
                                  Overriden amounts do not match item total!
                                </div>
                              </td>
                            </tr>
                          @endif

                          <tr>
                            <th class="cell">SUB-TOTAL</th>
                            <td class="cell">&pound;{{number_format($invoice->override_sub_total,2)}}</td>
                          </tr>
                          <tr>
                            <th class="cell">VAT</th>
                            <td class="cell">&pound;{{number_format($invoice->override_vat,2)}}</td>
                          </tr>
                        @else
                          <tr>
                            <th class="cell">SUB-TOTAL</th>
                            <td class="cell">&pound;{{number_format($invoice->total()->gross,2)}}</td>
                          </tr>
                          <tr>
                            <th class="cell">VAT</th>
                            <td class="cell">&pound;{{number_format($invoice->total()->vat,2)}}</td>
                          </tr>
                        @endif
                      @endif
                      <tr>
                        <th class="cell">TOTAL</th>
                        <td class="cell">&pound;{{number_format($invoice->total()->net,2)}}</td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//item-->
        </div>
        <!--//app-card-body-->
        
      </div>
      <!--//app-card-->
    </div>

  </div>
  <!--//row-->

@endsection