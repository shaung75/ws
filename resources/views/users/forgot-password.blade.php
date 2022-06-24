@extends('layouts.html', ['bodyClass' => 'app-reset-password p-0'])

@section('body')
	<div class="row g-0 app-auth-wrapper">
	  <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
	    <div class="d-flex flex-column align-content-end">
	      <div class="app-auth-body mx-auto">
	        <div class="app-auth-branding mb-4">
	          <a class="app-logo" href="/"
	            ><img
                  class="logo-icon me-2"
                  src="assets/images/logo.png"
                  alt="logo"
                /></a>
	        </div>
	        <h2 class="auth-heading text-center mb-4">Password Reset</h2>

	        <div class="auth-intro mb-4 text-center">
	          Enter your email address below. We'll email you a link to a page where
	          you can easily create a new password.
	        </div>

	        <div class="auth-form-container text-left">
	          <form method="POST" action="/forgot-password" class="auth-form resetpass-form">
	          	@csrf

	          	@if(session()->has('message'))
                <div class="alert alert-success">
                  {{ session()->get('message') }}
                </div>
              @endif

              @error('email')
                <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
              @enderror

	            <div class="email mb-3">
	              <label class="sr-only" for="reg-email">Your Email</label>
	              <input
	                id="reg-email"
	                name="email"
	                type="email"
	                class="form-control login-email"
	                placeholder="Your Email"
	                required="required"
	              />
	              @error('email')
	              	<p class="error">{{$message}}</p>
	              @enderror
	            </div>
	            <!--//form-group-->
	            <div class="text-center">
	              <button
	                type="submit"
	                class="btn app-btn-primary btn-block theme-btn mx-auto"
	              >
	                Reset Password
	              </button>
	            </div>
	          </form>

	          <div class="auth-option text-center pt-5">
	            <a class="app-link" href="/login">Log in</a>
	          </div>
	        </div>
	        <!--//auth-form-container-->
	      </div>
	      <!--//auth-body-->
	      <footer class="app-auth-footer">
            
          <x-copyright />

        </footer>
	    </div>
	    <!--//flex-column-->
	  </div>
	  <!--//auth-main-col-->
	  <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
	    <div class="auth-background-holder"></div>
	    <div class="auth-background-mask"></div>
	    <div class="auth-background-overlay p-3 p-lg-5">
	      <div class="d-flex flex-column align-content-end h-100">
	        <div class="h-100"></div>
	      </div>
	    </div>
	    <!--//auth-background-overlay-->
	  </div>
	  <!--//auth-background-col-->
	</div>
	<!--//row-->


@endsection