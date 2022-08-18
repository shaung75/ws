@extends('layouts.page')

@section('content')

  <h1 class="app-page-title">Delete Piano</h1>
  <div class="row gy-4">
    <div class="col-12 col-lg-6">
      <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
        <div class="app-card-header p-3 border-bottom-0">
          <div class="row align-items-center gx-3">
            <div class="col-auto">
              <div class="app-icon-holder">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                  <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                </svg>
              </div>
              <!--//icon-holder-->
            </div>
            <!--//col-->
            <div class="col-auto">
              <h4 class="app-card-title">{{$piano->manufacturer->manufacturer}} {{$piano->model}}</h4>
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
          <form action="/pianos/{{$piano->id}}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" class="btn app-btn-secondary">Delete Piano</button>
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