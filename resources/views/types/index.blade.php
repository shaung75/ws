@extends('layouts.page')

@section('content')
	
	<div class="row g-3 mb-4 align-items-center justify-content-between">
	  <div class="col-auto">
	    <h1 class="app-page-title mb-0">Service Types</h1>
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
								<th class="cell">Service Type</th>
								<th class="cell">Duration (months)</th>
								<th class="cell"></th>
							</tr>
						</thead>
						<tbody>
						
							@unless(count($types) == 0)

								@foreach($types as $type)

									<tr>
										<td class="cell" class="text-center">
											{{$type->type}}

											
											<div class="collapse" id="showTypeEdit{{$type->id}}">
												<form action="/types" method="POST">
													@csrf
													@method('put')

													<div class="row my-2">
														<div class="col">
															<input type="text" class="form-control" name="type" value="{{$type->type}}" required>
															<input type="hidden" name="id" value="{{$type->id}}">
														</div>
														<div class="col">
															<input type="number" class="form-control" id="duration" name="duration" value="{{$type->duration}}" required>
														</div>
														<div class="col">
															<button type="submit" class="btn app-btn-primary">Edit</button>
														</div>
													</div>
												</form>
											</div>
											
										</td>

										<td class="cell">
											{{$type->duration}}
										</td>

										<td class="cell text-end pe-5">
											
												<a class="me-3" data-bs-toggle="collapse" href="#showTypeEdit{{$type->id}}" aria-expanded="false" aria-controls="showTypeEdit{{$type->id}}">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
													  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
													</svg>
											  </a>
												<a href="/types/{{$type->id}}/delete">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
														<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
														<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
													</svg>
												</a>
											
										</td>
									</tr>

								@endforeach
									    
							@else

								<tr>
									<td class="cell" colspan="3">No Types found</td>
								</tr>

							@endunless

							<tr>
								<form action="/types" method="POST">
	    						@csrf
									<td class="cell">
										<input type="text" class="form-control" id="type" name="type" placeholder="Add service type" required>		
									</td>
									<td class="cell">
										<input type="number" class="form-control" id="duration" name="duration" placeholder="Duration (months)" required>		
									</td>
									<td class="cell">
										<button type="submit" class="btn app-btn-primary">Add new service type</button>
									</td>
								</form>
							</tr>	
							
						</tbody>
					</table>

				
	    </div><!--//table-responsive--> 
  </div><!--//app-card-body-->		
</div><!--//app-card-->
			    
@endsection
