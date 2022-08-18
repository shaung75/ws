@extends('layouts.page')

@section('content')
	
	<div class="row g-3 mb-4 align-items-center justify-content-between">
	  <div class="col-auto">
	    <h1 class="app-page-title mb-0">Clients</h1>
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
							<th class="cell">Account</th>
							<th class="cell">Surname</th>
							<th class="cell">First name</th>
							<th class="cell">Pianos</th>
							<th class="cell">Service</th>
							<th class="cell"></th>
						</tr>
					</thead>
					<tbody>
					
						@unless(count($clients) == 0)

							@foreach($clients as $client)

								<tr>
									<td class="cell" class="text-center">{{$client['id']}}</td>
									<td class="cell">{{$client['surname']}}</td>
									<td class="cell">{{$client['first_name']}}</td>
									<td class="cell">{{count($client->pianos)}}</td>
									<td class="cell"><span class="badge bg-{{$client->service_status()->warning}}">{{$client->service_status()->status}}</span></td>
									<td class="cell">
										<a class="btn-sm app-btn-secondary" href="/clients/{{$client['id']}}">View</a>
										<a class="btn-sm app-btn-secondary" href="/clients/{{$client['id']}}/delete">Delete</a>
									</td>
								</tr>

							@endforeach
								    
						@else

							<tr>
								<td class="cell" colspan="4">No clients found</td>
							</tr>

						@endunless		    						
						
					</tbody>
				</table>
	    </div><!--//table-responsive--> 
  </div><!--//app-card-body-->		
</div><!--//app-card-->

{{$clients->links()}}
			    
@endsection
