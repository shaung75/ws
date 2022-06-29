@extends('layouts.page')

@section('content')
  
  <div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
      <h1 class="app-page-title mb-0">Services</h1>
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
              <th class="cell">Date</th>
              <th class="cell">Piano</th>
              <th class="cell">Stock #</th>
              <th class="cell">Service type</th>
              <th class="cell">Completed by</th>
              <th class="cell"></th>
            </tr>
          </thead>
          <tbody>
          
            @unless(count($services) == 0)

              @foreach($services as $service)

                <tr>
                  <td class="cell">{{\Carbon\Carbon::parse($service->service_date)->format('d/m/Y')}}</td>
                  <td class="cell">{{$service->piano->manufacturer->manufacturer}} {{$service->piano->model}}</td>
                  <td class="cell">{{$service->piano->stock_number}}</td>
                  <td class="cell">{{$service->type->type}}</td>
                  <td class="cell">{{$service->technician}}</td>
                  <td class="cell"><a class="btn-sm app-btn-secondary" href="/services/{{$service->id}}">View</a></td>
                </tr>

              @endforeach
                    
            @else

              <tr>
                <td class="cell" colspan="4">No service history found</td>
              </tr>

            @endunless                    
            
          </tbody>
        </table>
      </div><!--//table-responsive--> 
  </div><!--//app-card-body-->    
</div><!--//app-card-->

{{$services->links()}}
          
@endsection
