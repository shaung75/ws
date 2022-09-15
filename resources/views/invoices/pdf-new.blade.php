<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>White &amp; Sentance</title>

    <style>
      body {
        font-family: sans-serif;
      }
      h1, h2 {
        font-family: serif;
        font-weight: normal;
      }
      h1 {
        transform:scale(1,1.5);
        font-size: 3em;
      }
      h2 {
        font-style: italic;
      }
      p {
        margin: 0px;
        padding: 0px;
      }
      .col {
        width: 50%;
        float: left;
      }
      .clear {
        clear:both;
      }
      .text-center {
        text-align: center;
      }
      .text-right {
        text-align: right;
      }
      .green {
        color: #007500;
      }
      table {
        border: 3px #007500 solid;
        border-collapse: collapse;
      }
      td {
        border: 1px #007500 solid;
        padding: 5px 10px;
        vertical-align: top;
      }
      .invoice-meta table {
        margin-right: 0px;
        margin-left: auto;
      }
      .invoice {
        width: 100%;
        margin: 50px 0px;
      }
      .invoice .goods {
        width: 80%;
        font-weight: bold;
      }
      .invoice-body td {
        height: 15px;
        border: none;
        border-right: 1px #007500 solid;
      }
      .footer {
        font-size: 12px;
        text-align: center;
        margin-top: 20px;
      }
      p span {
        color: #333;
      }
      .header {
        margin-bottom: 50px;
      }
    
    </style>
  </head>
  <body>
    <div class="text-center header">
      <h1 class="green">{{$invoice->account->account_name}}</h1>
      <h2 class="green">Piano specialists since 1897</h2>
      <p>{{$settings->business_address1}}, {{$settings->business_address2}}, {{$settings->business_town}}, {{$settings->business_postcode}}</p>
      <p>T: {{$settings->business_telephone}} E: {{$settings->business_email}}</p>
      <p>www.wspianos.co.uk</p>
      <p class="green">New and used pianos <span>-</span> Restoration <span>-</span> Tuning <span>-</span> Valuations</p>
    </div>

    <div class="col">
      @if($invoice->client->business_name)
        {{$invoice->client->business_name}}<br>
      @endif
      {{$invoice->client->first_name}} {{$invoice->client->surname}}<br>
      {{$invoice->client->address1}}<br>
      {{$invoice->client->address2 != '' ? $invoice->client->address2 .'<br>' : ''}}
      {{$invoice->client->town}}<br>
      {{$invoice->client->county}}, {{$invoice->client->postcode}}<br>
      {{$invoice->client->telephone}}
    </div>

    <div class="col invoice-meta">
      <table>
        <tr>
          <td>Invoice</td>
          <td>{{$invoice->account->invoice_prefix}}{{$invoice->id}}{{$invoice->account->invoice_suffix}}</td>
        </tr>
        <tr>
          <td>Date</td>
          <td>{{\Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y')}}</td>
        </tr>
      </table>
    </div>

    <div class="clear"></div>

    <table class="invoice">
      <tr>
        <td class="goods">Goods</td>
        <td></td>
      </tr>

      @unless(count($invoice->items) == 0)

        @foreach($invoice->items as $item)

          <tr>

            <td class="invoice-body">{{$item->description}}</td>
            <td>
              @if($invoice->hide_vat)
                &pound;{{number_format($item->unit_price * $item->qty,2)}}
              @else
                &pound;{{number_format(($item->unit_price * $item->qty) / (($invoice->account->tax_rate/100)+1),2)}}
              @endif
            </td>

          </tr>

        @endforeach

      @else

        <tr>
          <td colspan="2">
            No invoice items added
          </td>
        </tr>

      @endunless      

      @if(!$invoice->hide_vat)
        <tr>
          <td class="text-right"><strong>Goods total</strong></td>
          <td><strong>&pound;{{number_format($invoice->total()->gross,2)}}</strong></td>
        </tr>
        <tr>
          <td class="text-right"><strong>VAT</strong></td>
          <td><strong>&pound;{{number_format($invoice->total()->vat,2)}}</strong></td>
        </tr>
      @else
        <tr>
          <td class="text-center">No VAT payable</td>
          <td></td>
        </tr>
      @endif
      <tr>
        <td class="text-right"><strong>Invoice total</strong></td>
        <td><strong>&pound;{{number_format($invoice->total()->net,2)}}</strong></td>
      </tr>
    </table>

    <div class="col">
      {!! nl2br($invoice->account->payment_details) !!}
    </div>
    <div class="col text-right">
      All goods remain the property of {{$invoice->account->account_name}} until full payment has been received.
    </div>

    <div class="clear"></div>

    <div class="footer">
      {!! nl2br($invoice->account->invoice_footer) !!}
    </div>
  </body>
</html>