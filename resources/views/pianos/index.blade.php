@extends('layouts.page')

@section('content')
  
  <div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
      <h1 class="app-page-title mb-0">Pianos</h1>
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
              <th class="cell">Stock Number</th>
              <th class="cell">Manufacturer</th>
              <th class="cell">Model</th>
              <th class="cell">Colour</th>
              <th class="cell">Finish</th>
              <th class="cell">Year of Manufacture</th>
              <th class="cell">Service</th>

              @if($list == 'assigned')
                <th class="cell">Assigned to</th>
              @endif
              <th class="cell"></th>
            </tr>
          </thead>
          <tbody>
          
            @unless(count($pianos) == 0)

              @foreach($pianos as $piano)

                <tr>
                  <td class="cell" class="text-center">{{$piano->stock_number}}</td>
                  <td class="cell">{{$piano->manufacturer->manufacturer}}</td>
                  <td class="cell">{{$piano->model}}</td>
                  <td class="cell">{{$piano->colour}}</td>
                  <td class="cell">{{$piano->finish}}</td>
                  <td class="cell">{{$piano->year_of_manufacture}}</td>
                  <td class="cell"><span class="badge {{$piano->service_status()->status == 'OK' ? 'bg-success' : 'bg-danger'}}">{{$piano->service_status()->status}}</span></td>

                  @if($list == 'assigned')
                    <td class="cell">
                      <a href="/clients/{{$piano->client->id}}" >
                        {{$piano->client->first_name}} {{$piano->client->surname}}</td>
                      </a>
                  @endif
                  <td class="cell">
                    <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}/duplicate">Duplicate</a>
                    <a class="btn-sm app-btn-secondary" href="/pianos/{{$piano->id}}">View</a>
                  </td>
                </tr>

              @endforeach
                    
            @else

              <tr>
                <td class="cell" colspan="4">No pianos found</td>
              </tr>

            @endunless                    
            
          </tbody>
        </table>
      </div><!--//table-responsive--> 
  </div><!--//app-card-body-->    
</div><!--//app-card-->

{{$pianos->links()}}
          
@endsection
