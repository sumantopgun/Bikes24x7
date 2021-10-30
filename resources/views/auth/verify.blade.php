@extends('frontend.layout')
@section('title', 'Verify Your Email Address')

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
            <h1>Verify Your Email Address</h1>
          </div>
          
          @if (session('resent'))
              <div class="alert alert-success" role="alert">
                  {{ __('A fresh verification link has been sent to your email address.') }}
              </div>
          @endif

          {{ __('Before proceeding, please check your email for a verification link.') }}
          {{ __('If you did not receive the email') }},
          <br><br>
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit" class="btn btn-full btn-success">{{ __('click here to request another') }}</button>.
          </form>

        </div>
        <div class="login_sec_right col-md-5">
          <img src="{{ asset('frontend/images/verify.png')}}" />
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
