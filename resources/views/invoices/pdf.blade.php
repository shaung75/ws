<!DOCTYPE html>
<html lang="en">
  <head>
    <title>White &amp; Sentance</title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta
      name="description"
      content="CRM for White &amp; Sentance"
      />
    <link rel="shortcut icon" href="favicon.ico" />
    
    <link id="theme-style" rel="stylesheet" href="../public/assets/css/invoice.css" />
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <!-- BEGIN INVOICE -->
        <div class="col-xs-12">
          <div class="grid invoice">
            <div class="grid-body">
              <div class="invoice-title">
                <div class="row">
                  <div class="col-xs-12 text-center py-3" style="background: #000;">
                    <img src="../public/assets/images/logo.png" alt="" height="60">
                  </div>
                </div>
                <br>
                
              </div>
              <hr>
              <div class="row">
                <div class="col">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>
                          <address>
                            <strong>Billed To:</strong><br>
                            {{$invoice->client->first_name}} {{$invoice->client->surname}}<br>
                            {{$invoice->client->address1}}<br>
                            {{$invoice->client->address2 != '' ? $invoice->client->address2 .'<br>' : ''}}
                            {{$invoice->client->town}}<br>
                            {{$invoice->client->county}}, {{$invoice->client->postcode}}<br>
                            {{$invoice->client->telephone}}
                          </address>
                        </td>
                        <td class="text-end">
                          <address>
                            <strong>{{$settings->business_name}}</strong><br>
                            {{$settings->business_address1}}<br>
                            {{$settings->business_address2}}<br>
                            {{$settings->business_town}}<br>
                            {{$settings->business_county}}, {{$settings->business_postcode}}<br>
                            {{$settings->business_telephone}}
                          </address>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <div class="row">
                <div class="col">
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>
                          <strong>invoice #{{$settings->invoice_prefix}}{{$invoice->id}}</strong>
                        </td>
                        <td class="text-end">
                          <strong>Invoice Date:</strong> {{\Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y')}}<br>
                          <strong>Due Date:</strong> {{\Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y')}}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-12">
                  <table class="table table-striped">
                    <thead>
                      <tr class="line">
                        <td class="text-center"><strong>Qty</strong></td>
                        <td><strong>Description</strong></td>
                        <td class="text-center"><strong>Unit</strong></td>
                        <td class="text-end"><strong>Total</strong></td>
                      </tr>
                    </thead>
                    <tbody>
                      @unless(count($invoice->items) == 0)

                        @foreach($invoice->items as $item)

                          <tr>

                            <td class="text-center">{{$item->qty}}</td>
                            <td>{{$item->description}}</td>
                            <td class="text-center">&pound;{{$item->unit_price}}</td>
                            <td class="text-end">&pound;{{$item->unit_price * $item->qty}}</td>

                          </tr>

                        @endforeach

                      @else

                        <tr>
                          <td colspan="4">
                            No invoice items added
                          </td>
                        </tr>

                      @endunless
                      
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-end"><strong>SUB-TOTAL</strong></td>
                        <td class="text-end"><strong>&pound;{{$invoice->total()->gross}}</strong></td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-end"><strong>VAT</strong></td>
                        <td class="text-end"><strong>&pound;{{$invoice->total()->vat}}</strong></td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-end"><strong>TOTAL</strong></td>
                        <td class="text-end"><strong>&pound;{{$invoice->total()->net}}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <hr>

              <div class="row mb-5">
                <div class="col">
                  {!! nl2br($settings->invoice_payment_details) !!}
                </div>
              </div>
              
              <div class="row">
                <div class="col text-center">
                  {!! nl2br($settings->invoice_footer) !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END INVOICE -->
      </div>
    </div>
  </body>
</html>