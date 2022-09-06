@extends('layouts.page')

@section('content')
	
	<div class="row g-3 mb-4 align-items-center justify-content-between">
	  <div class="col-auto">
	    <h1 class="app-page-title mb-0">Invoices</h1>
	  </div>
	  <div class="col-auto">
	    <div class="page-utilities">
	      <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
	        <div class="col-auto">
	          <form class="table-search-form row gx-1 align-items-center">
	            <div class="col-auto">
	              <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
	            </div>
	            <div class="col-auto">
	              <button type="submit" class="btn app-btn-secondary">Search</button>
	            </div>
	          </form>
	        </div>
	      </div>
	      <!--//row-->
	    </div>
	    <!--//table-utilities-->
	  </div>
	  <!--//col-auto-->
	</div>
	<!--//row-->

	<div class="app-card app-card-orders-table shadow-sm mb-5">
	  <div class="app-card-body">
	    <div class="table-responsive">
	    	
	      <table class="table app-table-hover mb-0 text-left">
					<thead>
						<tr>
							<th class="cell">Invoice #</th>
							<th class="cell">Client</th>
							<th class="cell">Billing Account</th>
              <th class="cell">Date</th>
              <th class="cell">Due Date</th>
              <th class="cell">Value (inc VAT)</th>
              <th class="cell">Status</th>
              <th class="cell">Paid</th>
              <th class="cell"></th>
						</tr>
					</thead>
					<tbody>
					
						@unless(count($invoices) == 0)

							@foreach($invoices as $invoice)

								<tr>
                  <td class="cell">{{$invoice->account->invoice_prefix}}{{$invoice->id}}{{$invoice->account->invoice_suffix}}</td>
                  <td class="cell">
                  	<a href="/clients/{{$invoice->client->id}}">
                  		@if($invoice->client->business_name)
                  			{{$invoice->client->business_name}}
                  		@else
                  			{{$invoice->client->first_name}} {{$invoice->client->surname}}
                  		@endif
                  	</a>
                  </td>
                  <td class="cell">{{$invoice->account->account_name}}</td>
                  <td class="cell">{{\Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y')}}</td>
                  <td class="cell">{{\Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y')}}</td>
                  <td class="cell">&pound;{{number_format($invoice->total()->net,2)}}</td>
                  <td class="cell">
                    @if($invoice->paymentStatus() == 'Paid')
                      <span class="badge bg-success">
                        {{$invoice->paymentStatus()}}
                      </span>
                    @elseif($invoice->paymentStatus() == 'Pending')
                      <span class="badge bg-warning">
                        {{$invoice->paymentStatus()}}
                      </span>
                    @else
                      <span class="badge bg-danger">
                        {{$invoice->paymentStatus()}}
                      </span>
                    @endif
                  </td>
                  <td class="cell">
                    
                    <form action="/invoices/{{$invoice->id}}/payment" method="POST">
                      @csrf
                      @method('put')

                      <div class="form-check">
                        <input class="form-check-input" name="paid" type="checkbox" value="1" id="settings-checkbox-1" onChange="this.form.submit()" {{$invoice->paid == 1 ? 'checked' : ''}}>
                      </div>

                    </form>

                  </td>
                  <td class="cell text-end">

                    <a class="btn-sm app-btn-secondary" href="/invoices/{{$invoice->id}}">View</a>
                    
                  </td>
                </tr>

							@endforeach
								    
						@else

							<tr>
								<td class="cell" colspan="4">No invoices found</td>
							</tr>

						@endunless		    						
						
					</tbody>
				</table>
	    </div><!--//table-responsive--> 
  </div><!--//app-card-body-->		
</div><!--//app-card-->

{{$invoices->links()}}
			    
@endsection
