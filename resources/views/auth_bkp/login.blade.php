<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bikes24x7 | Login</title>
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
                    <h2>Login</h2>
                    <h4 class="font-weight-light">Hello! let's get started</h4>
                    {{-- <form class="pt-5"> --}}
                      @if (session('error'))
                          <div class="alert alert-error" role="alert">
                              {{ session('error') }}
                          </div>
                      @endif
                      @if (session('success'))
                          <div class="alert alert-success" role="alert">
                              {{ session('success') }}
                          </div>
                      @endif
                      <form class="pt-5" method="POST" action="{{ route('login') }}">
                        @csrf    
                        <div class="form-group">
                          <label for="inputLoginEmail">Username, Email or Phone</label>
                          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="inputLoginEmail" aria-describedby="emailHelp" value="{{ old('email') }}" required autocomplete="text" autofocus>
                          <i class="mdi mdi-account"></i>
                          @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="loginInputPassword">Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="loginInputPassword" name="password" required autocomplete="current-password">
                          <i class="mdi mdi-eye"></i>
                          @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                          @enderror
                        </div>
                        <div class="mt-5">
                          <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="mt-3 text-center">
                          <b><a class="auth-link text-black" href="{{ route('register') }}">
                            {{ __("Don't have an Account? Create one now!") }}
                          </a></b>
                        </div>
                        <div class="mt-3 text-center">
                          @if (Route::has('password.request'))
                                <a class="auth-link text-black" href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                          @endif
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

  <style>
  .auth .login-half-bg {
    background: url({{asset('admin_template/images/wp2708386.jpg')}});
    background-size: cover;
}
  </style>
  <!-- endinject -->
</body>

</html>
