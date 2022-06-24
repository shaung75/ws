@extends('layouts.html')

@section('header')

  @include('layouts.header')

@endsection

@section('body')
  
  <div class="app-wrapper">
    
    <div class="app-content pt-3 p-md-3 p-lg-4">

	    <div class="container-xl">

        <x-alerts />

	    	@yield('content')

	    </div><!--//container-fluid-->

    </div><!--//app-content-->
    
    <footer class="app-footer">

	    <x-copyright />

    </footer><!--//app-footer-->
    
  </div><!--//app-wrapper-->    					

@endsection