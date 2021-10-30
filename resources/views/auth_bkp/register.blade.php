<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bikes24x7 | Register</title>
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
              <div class="row">
                <div class="col-lg-6 bg-white">
                  <div class="auth-form-light text-left p-5">
                    <h2>Register</h2>
                    <h4 class="font-weight-light">Hello! let's get started</h4>
                    {{-- <form class="pt-5"> --}}

                      <form method="POST" action="{{ route('register') }}">
                        @csrf   
                      {{-- <input class="form-control" type="hidden" name="user_type" value="{{'customer'}}"> --}}
                      <input class="form-control" type="hidden" name="user_country" value="{{ 'India' }}">

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
                          <input type="text" name="otpverify" class="form-control" id="inputLoginOtpVerify" value="{{ old('otpverify') }}">
                          <i id="VerifyOtp"><a button style="font-size: 10px; color:white;" class="btn btn-success">Verify</a></i>
                        </div>
                        @error('otpverify')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                          <label for="City">City</label>
                          {{-- <select class="form-control" name="user_city" required>
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
                          <label for="password">Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
                          <i toggle="#password-field" class="mdi mdi-eye" id="password_show"></i>
                          @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="confirm_password" name="password_confirmation" required autocomplete="new-password">
                            <i class="mdi mdi-eye" id="confirm_password_show"></i>
                        </div>
                        <div class="alert alert-success" id="message" role="alert">
                        </div>

                        <div class="mt-5">
                          <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium" id="checkverify">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="mt-2 w-75 mx-auto">
                            <div class="form-check form-check-flat">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                I accept terms and conditions
                                </label>
                            </div>
                            </div>
                            <div class="mt-2 text-center">
                            <a href="{{ route('login') }}" class="auth-link text-black">Already have an account? <span class="font-weight-medium">Sign in</span></a>
                            </div>
                      </form>                  
                    {{-- </form> --}}
                  </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                  <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  All rights reserved.</p>
                </div>
              </div>
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
