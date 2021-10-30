<!DOCTYPE html>
<html lang="en">

<head>
  <!-- 1 meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bikes24x7 | Admin Register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_template/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin_template/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin_template/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth">
          <div class="row w-100">
            <div class="col-lg-8 mx-auto">
              <center>
                  <h2>Admin Registration</h2>
                  <h4 class="font-weight-light">Hello! let's get started</h4>
              </center> 
              <form method="POST" action="{{ route('post-registration') }}" enctype="multipart/form-data">
                @csrf              
                <div class="row">
                  <input class="form-control" type="hidden" name="user_country" value="{{ 'India' }}">
                    
                  <div class="col-lg-6 bg-white">
                    <div class="auth-form-light text-left p-5">
                      
                      <div class="form-group">
                        <label for="inputAdminLoginFname">First Name</label>
                        <input type="text" name="user_first_name" class="form-control @error('user_first_name') is-invalid @enderror" id="inputAdminLoginFname" value="{{ old('user_first_name') }}" required autocomplete="First Name" autofocus>
                        <i class="mdi mdi-account"></i>
                        @error('user_first_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="inputAdminLoginLname">Last Name</label>
                        <input type="text" name="user_last_name" class="form-control @error('user_last_name') is-invalid @enderror" id="inputAdminLoginLname" value="{{ old('user_last_name') }}" required autocomplete="Last Name" autofocus>
                        <i class="mdi mdi-account"></i>
                        @error('user_last_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="inputUsernameCheck">Username</label>
                          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="inputUsernameCheck" value="{{ old('username') }}" required autocomplete="name" maxlength="25" autofocus>
                          <i class="icon-user-following"></i>
                          @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                      </div>
                      <div class="alert alert-success" id="checkuname" role="alert">
                      </div>
                      <div class="form-group">
                          <label for="inputLoginEmail">Email</label>
                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmailCheck" aria-describedby="emailHelp" value="{{ old('email') }}" required autocomplete="Email" autofocus>
                          <i class="icon-cursor"></i>
                          @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                      </div>
                      <div class="alert alert-success" id="checkemail" role="alert">
                      </div>
                      <div class="form-group">
                        <label for="inputLoginPhone">Phone</label>
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="inputLoginPhone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                        <i id="sendOtp"><a button style="font-size: 10px; color:white;" class="btn btn-success" id="resendOtp">Send OTP</a></i>
                        {{-- <i class="icon-phone" id="sendOtp"></i> --}}
                        @error('phone')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                      </div>
                      
                      <div class="alert alert-success" id="showOtp" role="alert">
                      </div>
                      <div class="form-group" id="inputOtpVerification">
                        <label for="inputLoginOtpVerify">Verify OTP</label>
                        <input type="text" name="otpverify" class="form-control @error('otpverify') is-invalid @enderror" id="inputLoginOtpVerify" value="{{ old('otpverify') }}">
                        <i id="VerifyOtp"><a button style="font-size: 10px; color:white;" class="btn btn-success">Verify</a></i>                        
                      </div>
                      @error('otpverify')
                            <label class="error text-danger">{{ $message }}</label>
                      @enderror

                      
                    </div>
                  </div>
                  <div class="col-lg-6 bg-white">
                      <div class="auth-form-light text-left p-5">

                      <div class="form-group">
                          <label for="loginAdminInputLocality">Locality</label>
                          <input type="text" class="form-control @error('user_locality') is-invalid @enderror" id="loginAdminInputLocality" value="{{ old('user_locality') }}" name="user_locality" required autocomplete="Locality">
                          <i class="icon-home"></i>
                          @error('user_locality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>
                       
                        <div class="form-group">
                          <label for="City">City</label>
                          {{-- <select class="form-control @error('user_city') is-invalid @enderror" name="user_city" required>
                            <option value="">Select City</option>
                            <option selected value="Pune">Pune</option>
                          </select> --}}
                          <input type="text" name="user_city" class="form-control @error('user_city') is-invalid @enderror" id="inputAdminLoginLname" value="{{ old('user_city') }}" required autocomplete="City" autofocus>
                          @error('user_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="inputAdminLoginPincode">Pincode</label>
                          <input type="number" name="user_pincode" class="form-control @error('user_pincode') is-invalid @enderror" id="inputAdminLoginPincode" value="{{ old('user_pincode') }}" required autocomplete="Pincode" autofocus>
                          <i class="icon-cursor"></i>
                          @error('user_pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>

                        {{-- <div class="form-group">
                          <select class="form-control @error('user_type') is-invalid @enderror" name="user_type" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="customer_care">Customer Care</option>
                            <option value="shop">Shop</option>
                          </select>
                          @error('user_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div> --}}
                        <div class="form-group">
                          <label for="adminLoginInputPhoto">Photo</label>
                          <input id="adminLoginInputPhoto" class="form-control-file @error('user_profile_pic') is-invalid @enderror" type="file" name="user_profile_pic" required>
                          @error('user_profile_pic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="loginInputPassword">Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                          <i class="mdi mdi-eye" id="password_show"></i>
                          @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="confirm_password" name="password_confirmation" required autocomplete="new-password">
                            <i class="mdi mdi-eye" id="confirm_password_show"></i>
                            <div class="alert alert-success" id="message" role="alert">
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-8 mx-auto">
                  <div class="auth-form-light text-left">
                      <div>
                          <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium" id="checkverify">
                            {{ __('Register') }}
                          </button>
                      </div>
                  </div>
                </div>
                
                
            </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('admin_template/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('admin_template/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('admin_template/js/off-canvas.js')}}"></script>
  <script src="{{ asset('admin_template/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('admin_template/js/misc.js')}}"></script>
  <script src="{{ asset('admin_template/js/settings.js')}}"></script>
  <script src="{{ asset('admin_template/js/todolist.js')}}"></script>
  <script src="{{ asset('custom/js/registration.js')}}"></script>
  


  <style>
  .auth .login-half-bg {
    background: url({{asset('admin_template/images/wp2708386.jpg')}});
    background-size: cover;
}
  </style>
  <!-- endinject -->
</body>

</html>
