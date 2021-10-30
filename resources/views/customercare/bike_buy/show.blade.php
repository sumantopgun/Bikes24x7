@extends('customercare.layout')
@section('title', 'Appointment Details')
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                {{-- @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif --}}
                @if ($booked->bike_buy_image)
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image</h4>
                                <a href="#"><img src="{{ asset('storage/'.$booked->bike_buy_image) }}" height="200" width="200" alt=""></a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Customer Information</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                <label for="exampleInputName1">Customer Name</label>
                                <input type="text" class="form-control" disabled value="{{ optional($booked->customer)->user_first_name.' '.optional($booked->customer)->user_last_name }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputName1">Phone No.</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($booked->customer)->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Customer City</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($booked->customer)->user_city }}">
                                </div>

                                <h4 class="card-title">Bike Information</h4>
                                <div class="form-group">
                                    <label for="bike_buy_is_rc_book_customer_name">Bike RC Book is Customer Name</label>
                                    <input type="text" class="form-control" id="bike_buy_is_rc_book_customer_name" disabled value="{{ $booked->bike_buy_is_rc_book_customer_name ?? 'N/A' }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Bike Name</label>
                                    <input type="text" class="form-control"  disabled value="{{ optional($booked->sell_bike_details)->brand_name.' '.optional($booked->sell_bike_details)->model_name.' '.optional($booked->sell_bike_details)->model_cc }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Base Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $booked->bike_buy_base_price ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Valuation Deduction Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $booked->bike_buy_deduction_amount ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Estimated Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $booked->bike_buy_estimated_price ?? 'N/A' }}">
                                </div>

                                <div class="form-group">
                                    <label for="bike_year">Bike Registration Year</label>
                                    <input type="text" class="form-control" id="bike_year" disabled value="{{ optional($booked->sell_bike_details)->bike_year }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_is_older_than_15">Bike is Older than 15 Years</label>
                                    <input type="text" class="form-control" id="bike_year" disabled value="{{ $booked->bike_buy_is_older_than_15 }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="bike_buy_reg_no">Bike Registration No.</label>
                                    <input type="text" class="form-control" id="bike_buy_reg_no" disabled value="{{ $booked->bike_buy_reg_no ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_no_of_km">Bike Running KM</label>
                                    <input type="text" class="form-control" id="bike_buy_no_of_km" disabled value="{{ optional($booked->km_deduction_rates)->km_deduction_km_from.'-'.optional($booked->km_deduction_rates)->km_deduction_km_to }} km">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_no_of_owners">No of Owners</label>
                                    <input type="text" class="form-control" id="bike_buy_no_of_owners" disabled value="{{ optional($booked->owner_deduction_rates)->owner_deduction_owner_no }}">
                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="bike_buy_is_insurance">Bike Insured</label>
                        <input type="text" class="form-control" id="bike_buy_is_insurance" disabled value="{{ $booked->bike_buy_is_insurance ?? 'N/A' }}">
                    </div>
                    @if ($booked->bike_buy_is_insurance == 'No')
                        <div class="form-group">
                            <label for="bike_buy_insurance_id">Selected Insurance</label>
                            <input type="text" class="form-control" id="bike_buy_insurance_id" disabled value="{{ optional($booked->insurance_deduction_rates)->insurance_deduction_cc_from.'-'.optional($booked->insurance_deduction_rates)->insurance_deduction_cc_to }} CC">
                        </div> 
                        <div class="form-group">
                            <label for="insurance_deduction_rate">Insurance Rate</label>
                            <input type="text" class="form-control" id="insurance_deduction_rate" disabled value="Rs. {{ optional($booked->insurance_deduction_rates)->insurance_deduction_rate }}">
                        </div>  
                    @endif
                    
                    <div class="form-group">
                        <label for="bike_buy_color">Bike Color</label>
                        <input type="text" class="form-control" id="bike_buy_color" disabled value="{{ $booked->bike_buy_color ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label for="bike_buy_current_city">Bike Current City</label>
                        <input type="text" class="form-control" id="bike_buy_current_city" disabled value="{{ $booked->bike_buy_current_city ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label for="bike_buy_status">Bike Status</label>
                        <input type="text" class="form-control" id="bike_buy_status" disabled value="{{ $booked->bike_buy_request_status ?? 'N/A' }}">
                    </div>

                    <h4 class="card-title">Collection Point Information</h4>
                    <div class="form-group">
                        <label>Shop Name</label>
                        <input type="text" class="form-control" disabled value="{{ optional($booked->collectionpoint)->shop_name }}">
                    </div>
                    <div class="form-group">
                        <label>Shop Location</label>
                        <input type="text" class="form-control" disabled value="{{ optional($booked->collectionpoint)->shop_location }}">
                    </div>
                    <div class="form-group">
                        <label>Contact No.</label>
                        <input type="text" class="form-control" disabled value="{{ optional($booked->collectionpoint)->contact_no }}">
                    </div>

                    <h4 class="card-title">Appointment Information</h4>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Date & Time</label>
                        <input type="text" class="form-control" id="appointments_date" disabled value="{{ $booked->appointments->appointments_date ?? 'N/A' }} & {{ $booked->appointments->appointments_time ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Status</label>
                        <input type="text" class="form-control" id="appointments_status" disabled value="{{ $booked->appointments->appointment_status=='confirmed' ? 'Confirmed' : 'Not confirmed'}}">
                    </div>
                    <div class="form-group">
                        <label for="appointments_reschedule">Appointments Reschedule</label>
                        <?php $appointments_reschedule = $booked->appointments->appointments_reschedule ?? 'N/A' ?>
                        @if ($appointments_reschedule == 1)
                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'Yes' }}">
                        @else
                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'No' }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="appointments_reschedule_id">Appointments Reschedule Name</label>
                        <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $booked->reschedule->user_first_name ?? '' }} {{ $booked->reschedule->user_last_name ?? 'N/A' }}">
                    </div>

                    <div class="form-group">
                        <label for="appointments_reschedule_id">Appointment Reschedule Date & Time</label>
                        @foreach ($booked->rescheduleAppointments as $item)

                            <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $item->appointments_date ?? 'N/A' }} & {{ $item->appointments_time ?? '' }}">
                            
                            
                        @endforeach
                    </div>
                    <center>
                        <div class="form-group btn-group" role="group" aria-label="Basic example">   
                            @if ($booked->appointments->appointment_status == 'unconfirmed')
                                <a button class="btn btn-primary" href="{{route('customercare.buy_confirm', ['request_id' => Crypt::encrypt($booked->id) ])}}">Confirm</a>
                            @endif                     
                            
                            <a button class="btn btn-danger" href="{{route('customercare.buy_reschedule', ['request_id' => Crypt::encrypt($booked->id) ])}}">Reschedule</a>
                        </div> 
                    </center>
                    
                </div>
            </div>
        </div>
        </div>
        
    </div>
@endsection