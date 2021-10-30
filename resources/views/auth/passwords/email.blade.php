@extends('frontend.layout')
@section('title', 'Reset Password')

@push('style')
  <link rel="stylesheet" href="{{ asset('frontend/css/signup.css')}}">
@endpush

@section('content')
<section class="reset_pass_section">
    <div class="container">
      <div class="reset_pass_main_sec col-md-12">
        <div class="col-md-1">
        </div>
        <div class="reset_pass_sec_left col-md-5">
          <div class="reset_pass_heading">
            <h1>Reset Password</h1>
          </div>
          <div class="reset_pass_text">
            <span>Enter the email address associated<br>with your Bikes24x7 account.</span>
          </div>
          <form method="POST" action="{{ route('password.email') }}">
          @csrf   
          <div class="reset_pass_input_user">
            <input type="email" class="reset_pass_username @error('email') is-invalid @enderror" placeholder="E-Mail Address" id="email" name="email" value="{{ old('email') }}" required>
          </div>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong style="color:red;">{{ $message }}</strong>
              </span>
          @enderror
          <div class="reset_pass_btn_sec">
            <button type="submit" class="reset_pass_btn">Continue</button>
          </div>
        </form> 
        </div>
        <div class="reset_pass_sec_right col-md-5">
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
