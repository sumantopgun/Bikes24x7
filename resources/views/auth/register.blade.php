@extends('frontend.layout')
@section('title', 'Register')
@section('meta_desc', 'Registration')

@push('style')
  <link rel="stylesheet" href="{{ asset('frontend/css/signup.css')}}">
@endpush

@section('content')
<section class="signup_section">
    <div class="container">
      <div class="signup_main_sec col-md-12">
        <div class="col-md-1">
        </div>
        <div class="signup_sec_left col-md-5">
          <div class="signup_heading">
            <h1>Join Bikes24x7!</h1>
          </div>
          <div class="signup_body_sec">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <input class="form-control" type="hidden" name="user_country" value="{{ 'India' }}">
              <div class="signup_input_user">
                <input type="email" class="signup_username" placeholder="Email" name="email" value="{{ old('email') }}" required>
                @error('email')
                  <span style="color:red;">{{ $message }}</span>
                @enderror
              </div>
              <span id="checkemail" style="color:red;"></span>

              <div class="signup_input_phno">
                <button class="send_otp_btn" id="sendOtp">Send OTP</button>
                <input type="number" class="signup_phno" placeholder="Phone Number" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                  <span style="color:red;">{{ $message }}</span>
                @enderror
              </div>
              <span id="showOtp" style="color:red;"></span>

              <div class="enter_otp_sec" id="enter_otp_sec">
                <div class="enterotp_text">
                  <span>Enter OTP</span>
                </div>
                {{-- <div class="resendotp_text">
                  <span>Resend OTP</span>
                </div> --}}
                <div class="enterotpfield">
                  <fieldset>
                    <input name="1st_otp" maxlength="1"/>
                    <input name="2st_otp" maxlength="1"/>
                    <input name="3st_otp" maxlength="1"/>
                    <input name="4st_otp" maxlength="1"/>
                    <input name="5st_otp" maxlength="1"/>
                    <input name="6st_otp" maxlength="1"/>
                  </fieldset>
                  <button class="verify_otp_btn" id="VerifyOtp">Verify</button>
                </div>
                <input type="hidden" name="otpverify" id="inputLoginOtpVerify">
              </div>

              <div class="signup_input_user">
                  <input type="text" name="user_city" class="signup_username" id="inputAdminLoginLname" value="{{ old('user_city') }}" placeholder="City" required>
                @error('user_city')
                  <span style="color:red;">{{ $message }}</span>
                @enderror
              </div>

              <div class="signup_input_pass">
                <i class="fa fa-eye-slash" aria-hidden="true" id="eye"></i>
                <input type="password" class="signup_password" id="password" placeholder="Password" name="password" required>
                @error('password')
                  <span style="color:red;">{{ $message }}</span>
                @enderror
              </div>

              <div class="signup_input_conf_pass">
                <i class="fa fa-eye-slash" aria-hidden="true" id="confeye"></i>
                <input type="password" class="signup_conf_password" id="confirmpassword" placeholder="Confirm Password" name="password_confirmation" required>
                @error('password_confirmation')
                  <span style="color:red;">{{ $message }}</span>
                @enderror
              </div>
              <span id="message" style="color:red;"></span>

              <div class="signup_term_con_sec">
                <input type="checkbox" required>
                <span>I accept the <a target="blank" href="{{ route('termsconditions') }}">Terms and Conditions</a> </span>
              </div>
              <div class="signupbtn_sec">
                <input type="submit" value="Signup" class="signup_submit_btn" id="checkverify">
              </div>
            </form>
            <div class="alrh_acc_sec">
              <span>Already have an Account?</span><br>
              <a href="{{ route('login') }}">Login</a>
            </div>
          </div>
        </div>
        <div class="signup_sec_right col-md-5">
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
  <script src="{{ asset('custom/js/registration.js')}}"></script>
    
@endpush
