@extends('layouts.page')

@section('content')

<form action='/account' method="POST">
  @csrf
  @method('put')
  <h1 class="app-page-title">Account</h1>
  <hr class="mb-4">
  <div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
      <h3 class="section-title">Password</h3>
      <div class="section-intro"></div>
    </div>
    <div class="col-12 col-md-8">
      <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
        
          <div class="mb-3">
            <label for="old_password" class="form-label">
              Old password (required to change password)
            </label>
            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required>

            @error('old_password')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">New password</label>
            
            <input type="password" class="form-control" id="new_password" name="new_password" required placeholder="New password">

            @error('new_password')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm new password</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm new password">

            @error('new_password_confirmation')
              <div class="alert alert-danger mt-3" role="alert">
                <small>{{$message}}</small>
              </div>
            @enderror
          </div>
          
          <button type="submit" class="btn app-btn-primary" >Save Changes</button>
        
        </div>
        <!--//app-card-body-->
      </div>
      <!--//app-card-->
    </div>
  </div>
  <!--//row-->

</form>

@endsection