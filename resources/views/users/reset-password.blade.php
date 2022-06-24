@extends('layouts.html', ['bodyClass' => 'app-signup p-0'])

@section('body')
	<div class="row g-0 app-auth-wrapper">
	  <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
	    <div class="d-flex flex-column align-content-end">
	      <div class="app-auth-body mx-auto">
	        <div class="app-auth-branding mb-4">
	          <a class="app-logo" href="index.html"
	            ><img
                  class="logo-icon me-2"
                  src="/assets/images/logo.png"
                  alt="logo"
                /></a>
	        </div>
	        <h2 class="auth-heading text-center mb-4">Reset password</h2>

	        <div class="auth-form-container text-start mx-auto">
	          <form method="POST" action="/reset-password" class="auth-form auth-signup-form">
	            @csrf
	            <div class="email mb-3">
	              <label class="sr-only" for="email">Your Email</label>
	              <input
	                id="email"
	                name="email"
	                type="email"
	                class="form-control signup-email"
	                placeholder="Email"
	                required="required"
	                value="{{$email}}"
	              />
	              @error('email')
	              	<p class="error">{{$message}}</p>
	              @enderror
	            </div>
	            <div class="password mb-3">
	              <label class="sr-only" for="password">Password</label>
	              <input
	                id="password"
	                name="password"
	                type="password"
	                class="form-control signup-password"
	                placeholder="Create a password"
	                required="required"
	              />
	              @error('password')
	              	<p class="error">{{$message}}</p>
	              @enderror
	            </div>
	            <div class="password mb-3">
	              <label class="sr-only" for="password">Password confirmation</label>
	              <input
	                id="password-confirmation"
	                name="password_confirmation"
	                type="password"
	                class="form-control signup-password"
	                placeholder="Confirm password"
	                required="required"
	              />
	              @error('password-confirmation')
	              	<p class="error">{{$message}}</p>
	              @enderror
	            </div>
	            
	            <input type="hidden" name="token" value="{{$token}}">

	            <div class="text-center">
	              <button
	                type="submit"
	                class="btn app-btn-primary w-100 theme-btn mx-auto"
	              >
	                Reset Password
	              </button>
	            </div>
	          </form>
	          <!--//auth-form-->

	          <div class="auth-option text-center pt-5">
	            Already have an account?
	            <a class="text-link" href="/login">Log in</a>
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