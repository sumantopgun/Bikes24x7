@extends('frontend.layout')
@section('title', 'Login')
@section('meta_desc', 'Login')

@push('style')
  <link rel="stylesheet" href="{{ asset('frontend/css/login.css')}}">
@endpush

@section('content')
  <section class="login_section">
    <div class="container">
      <div class="login_main_sec col-md-12">
        <div class="col-md-1">
        </div>
        <div class="login_sec_left col-md-5">
          <div class="login_heading">
            <h1>Welcome Back!</h1>
          </div>
          
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
          <div class="login_body_sec">
            <div class="log_input_user">
              <input type="text" class="login_username" placeholder="Email, Username or Phone number" name="email" value="{{ old('email') }}" required>
            </div>
            @error('email')
              <span style="color:red;">{{ $message }}</span>
            @enderror
            <div class="log_input_pass">
              <i class="fa fa-eye-slash" aria-hidden="true" id="eye"></i>
              <input type="password" class="login_password" id="password" placeholder="Password" name="password" required>
            </div>
            @error('password')
              <span style="color:red;">{{ $message }}</span>
            @enderror
            {{-- <div class="log_rem_sec">
              <input type="checkbox">
              <span>Remember me</span>
            </div> --}}
            <div class="logbtn_sec">
              <input type="submit" value="Login" class="login_submit_btn">
            </div>
            <div class="for_pass_sec">
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
            </div>
            <div class="donth_acc_sec">
              <span>Don't have an Account?</span><br>
              <a href="{{ route('register') }}">Create one now?</a>
            </div>
          </div>
        </form>

        </div>
        <div class="login_sec_right col-md-5">
          <img src="{{ asset('frontend/images/bike_login_img.png')}}" />
        </div>
        <div class="col-md-1">
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <script src="{{ asset('frontend/js/login.js')}}"></script>
    
@endpush
