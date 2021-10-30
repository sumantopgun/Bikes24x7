@extends('frontend.layout')
@section('title', 'Admin Registration')
@section('meta_desc', 'Admin Registration')
@push('style')
  <link rel="stylesheet" href="{{ asset('frontend/css/register.css')}}" type="text/css">
@endpush
@section('content')
<section class="register_section">
  <div class="container">
    <div class="register_main_sec col-md-12">
      <div class="register_sec_left col-md-8">
        <form method="POST" action="{{ route('post-registration') }}" enctype="multipart/form-data">
          @csrf  
          <div class="register_heading">
            <h1>Admin Registration</h1>
          </div>
          <div class="col-md-12">
            <div class="col-md-6">

              <input class="form-control" type="hidden" name="user_country" value="{{ 'India' }}">

              <div class="register_body_sec">
                <div class="register_input_user">
                  <input type="text" class="register_firstname" placeholder="First Name" name="user_first_name" value="{{ old('user_first_name') }}" required>
                  @error('user_first_name')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="register_input_user">
                  <input type="text" class="register_lastname" placeholder="Last Name" name="user_last_name" value="{{ old('user_last_name') }}" required>
                  @error('user_last_name')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="register_input_user">
                  <input type="text" class="register_username" placeholder="Username" name="username" value="{{ old('username') }}" maxlength="25" required>
                  @error('username')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>
                <span id="checkuname" style="color:red;"></span>

                <div class="register_input_user">
                  <input type="email" class="register_email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                  @error('email')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>
                <span style="color:red;" id="checkemail"></span>

                <div class="register_input_phno">
                  <button class="send_otp_btn" id="sendOtp">Send OTP</button>
                  <input type="number" class="register_phno" placeholder="Phone Number" name="phone" value="{{ old('phone') }}" required>
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
              </div>
            </div>
            <div class="col-md-6">
              <div class="register_body_sec">
                <div class="register_input_user">
                  <input type="text" class="register_locality" placeholder="Locality" value="{{ old('user_locality') }}" name="user_locality" required>
                  @error('user_locality')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="register_input_user">
                  <input type="text" class="register_city" placeholder="City" name="user_city" value="{{ old('user_city') }}" required>
                  @error('user_city')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="register_input_user">
                  <input type="number" class="register_pincode" placeholder="Pincode" name="user_pincode" value="{{ old('user_pincode') }}" required>
                  @error('user_pincode')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="register_input_file">
                  <input type="file" id="myfile" name="user_profile_pic" required>
                  @error('user_profile_pic')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="register_input_pass">
                  <i class="fa fa-eye-slash" aria-hidden="true" id="eye"></i>
                  <input type="password" class="register_password" id="password" placeholder="Password" name="password" required>
                  @error('password')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>

                <div class="register_input_conf_pass">
                  <i class="fa fa-eye-slash" aria-hidden="true" id="confeye"></i>
                  <input type="password" class="register_conf_password" id="confirmpassword" placeholder="Confirm Password" name="password_confirmation" required>
                  @error('password_confirmation')
                    <span style="color:red;">{{ $message }}</span>
                  @enderror
                </div>
                <span id="message" style="color:red;"></span>

              </div>
            </div>
          </div>

          <div class="registerbtn_sec col-md-12">
            <input type="submit" value="Register" class="register_submit_btn" id="checkverify">
          </div>
        </form>
      </div>
      <div class="register_sec_right col-md-4">
        <img src="{{ asset('frontend/images/bike_login_img.png')}}" />
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
  <script src="{{ asset('frontend/js/register.js')}}"></script>
    <script src="{{ asset('custom/js/registration.js')}}"></script>
@endpush