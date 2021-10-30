@extends('frontend.layout')
@section('title', 'Thank you')
@section('meta_desc', 'Thank you')
@push('style') 
    <link rel="stylesheet" href="{{ asset('frontend/css/about_us.css')}}" type="text/css">
@endpush
@section('content')
<section class="aboutus_section">
    
    <div class="about_us_3rd_sec">
        <div class="container">
            {{-- <div class="about_us_3rd_sec_header">
                <h2>Thank You</h2>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div> --}}
            <div class="jumbotron text-center">
                <h1 class="display-3">Thank You!</h1>
                @if (session('message'))
                    <p class="lead"><strong>{{ session('message') }}</strong></p>
                @endif
                
                <hr>
                <p class="lead">
                  <a class="btn btn-primary btn-sm" href="{{ url('/') }}" role="button">Continue to homepage</a>
                </p>
              </div>
        </div>
    </div>

</section>
@endsection

@push('scripts')
    
@endpush