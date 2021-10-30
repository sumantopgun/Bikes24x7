@extends('frontend.layout')
@section('title', 'Billing Address')
@push('style')
<link href="{{ asset('frontend/css/billaddress.css')}}" rel="stylesheet">
@endpush
@section('content')
<section class="bill_address_section">
    <div class="container">
        <div class="bill_address_main_sec col-md-12">
            <div class="col-md-1">
            </div>
            <div class="billing_sec_left col-md-10">
                <div class="billing_heading">
                    <h3>Customer Info and Billing address</h3>
                </div>
                <form method="POST" class="forms-sample" action="{{ route('seller.billing-complete') }}">
                    @csrf

                    <input class="form-control" type="hidden" name="booking_request_id" value="{{ $request_id ?? '' }}">
                    <input class="form-control" type="hidden" name="shop_id" value="{{ $shop_id ?? '' }}">

                    <div class="billing_body_sec">
                        <div class="billing_input_full_nm_sec">
                            <input type="text" class="billing_fullname" id="billing_full_name" name="billing_full_name" placeholder="Full Name" required value="{{ old('billing_full_name') }}">
                            @error('billing_full_name')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 billing_input_email_sec">
                            <input type="email" class="billing_email" id="billing_email" name="billing_email" placeholder="Email" value="{{ old('billing_email') }}" required>
                            @error('billing_email')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 billing_input_ph_sec">
                            <input type="number" class="billing_phnum" id="billing_phone_no" name="billing_phone_no" placeholder="Phone Number" value="{{ old('billing_phone_no') }}" required>
                            @error('billing_phone_no')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="billing_input_add_sec">
                            <textarea class="billing_add" id="billing_full_address" name="billing_full_address" required style="height: 100px;" placeholder="Full Address">{{ old('billing_full_address') }}</textarea>
                            @error('billing_full_address')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="billing_input_city_sec col-md-6">
                            <input type="text" class="billing_city" id="billing_city" name="billing_city" placeholder="City" value="{{ old('billing_city') }}" required>
                            @error('billing_city')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="billing_input_postal_sec col-md-6">
                            <input type="text" class="billing_postal" id="billing_postal_code" name="billing_postal_code" placeholder="Postal code" value="{{ old('billing_postal_code') }}" required>
                            @error('billing_postal_code')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="billing_input_country_sec">
                            <select class="billing_country" name="billing_country" id="billing_country" required>
                                <option selected value="India">India</option>
                            </select>
                            @error('billing_country')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="billing_submit_sec">
                            <input type="submit" value="Submit" class="billing_submit_btn">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')

@endpush