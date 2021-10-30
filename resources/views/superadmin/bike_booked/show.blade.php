@extends('superadmin.layout')
@section('title', 'Booking Details')
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image</h4>
                        <a href="#"><img src="{{asset('storage/'.$booked->bike_sells->bike_image ?? '')}}" height="200" width="200" alt=""></a>
                    </div>
                </div>
                </div>
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if ($booked->booking_requests_billing_address_id!=Null)
                            <h4 class="card-title">Seller Information</h4>
                                <form class="forms-sample">
                                    <div class="form-group">
                                    <label for="exampleInputName1">Seller Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->customer->user_first_name.' '.$booked->customer->user_last_name  ?? 'N/A'}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Seller Phone No.</label>
                                        <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->customer->phone  ?? 'N/A'}}">
                                    </div>
                            @else
                            <h4 class="card-title">Customer Information</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                <label for="exampleInputName1">Customer Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->customer->user_first_name.' '.$booked->customer->user_last_name  ?? 'N/A'}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Customer Phone No.</label>
                                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->customer->phone  ?? 'N/A'}}">
                                </div>
                            @endif
                            
                                <h4 class="card-title">Bike Information</h4>
                                <div class="form-group">
                                <label for="exampleInputEmail3">Bike Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" disabled value="{{ $booked->bike_sells->bike_name ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="offer_name">Offer Name</label>
                                    <input type="text" class="form-control" id="offer_name" disabled value="{{ $booked->offers->offer_name ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_sell_status">Bike Status</label>
                                    <input type="text" class="form-control" id="bike_sell_status" disabled value="{{ $booked->bike_sells->bike_sell_status ?? 'N/A' }}">
                                </div>
                            {{-- <div class="form-group row">
                                <label for="payments_status" class="col-sm-3 col-form-label">Payments Status</label>
                                <div class="col-sm-9">
                                        <input type="text" class="form-control" id="payments_status" disabled value="{{ $booked->payments->payments_status ?? 'N/A' }}">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                
                    {{-- <div class="form-group">
                        <label for="Pincode">Appointments Shop Name</label>
                        <input type="text" class="form-control" id="Pincode" disabled value="{{ $booked->shop->shop_name ?? 'N/A' }}">
                    </div> --}}
                    @if ($booked->booking_requests_billing_address_id!=Null)
                        <h4 class="card-title">Billing Information</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                <label for="exampleInputName1">Full Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->billingAddress->billing_full_name  ?? 'N/A'}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Phone No.</label>
                                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->billingAddress->billing_phone_no  ?? 'N/A'}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Full Address</label>
                                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->billingAddress->billing_full_address  ?? 'N/A'}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">City</label>
                                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->billingAddress->billing_city  ?? 'N/A'}}">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Postal Code</label>
                                <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->billingAddress->billing_postal_code  ?? 'N/A'}}">
                            </div>
                    @else
                        <h4 class="card-title">Appointment Information</h4>
                        <div class="form-group">
                            <label for="appointments_date">Appointment Date & Time</label>
                            <input type="text" class="form-control" id="appointments_date" disabled value="{{ $booked->appointments->appointments_date ?? 'N/A' }} & {{ $booked->appointments->appointments_time ?? 'N/A' }}">
                        </div>
                        <div class="form-group">
                            <label for="appointments_date">Appointment Status</label>
                            <input type="text" class="form-control" id="appointments_status" disabled value="{{ $booked->appointments->appointment_status ?? 'N/A' }} ">
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
                            <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $booked->reschedule->user_first_name ?? 'N/A' }} {{ $booked->reschedule->user_last_name ?? 'N/A' }}">
                        </div>

                        <div class="form-group">
                            <label for="appointments_reschedule_id">Appointment Reschedule Date & Time</label>
                            {{-- @foreach ($booked->rescheduleAppointments->whereNotIn('appointments_date', $booked->appointments->appointments_date)->whereNotIn('appointments_time', $booked->appointments->appointments_time) as $item) --}}
                            @foreach ($booked->rescheduleAppointments as $item)

                                <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $item->appointments_date ?? 'N/A' }} & {{ $item->appointments_time ?? '' }}">
                                
                                
                            @endforeach
                            {{-- <input type="text" class="form-control" id="appointments_reschedule2_id" disabled value="{{ 'N/A' }}"> --}}
                        </div>
                    @endif
                    
                    <h4 class="card-title">Shop Information</h4>
                    <div class="form-group">
                        <label>Shop Name</label>
                        <input type="text" class="form-control" disabled value="{{ $booked->shop->shop_name ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label>Shop Location</label>
                        <input type="text" class="form-control" disabled value="{{ $booked->shop->shop_location ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label>Contact No.</label>
                        <input type="text" class="form-control" disabled value="{{ $booked->shop->contact_no ?? 'N/A' }}">
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Transaction Details</h4>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="total_amount_customer" disabled value="Rs. {{ $booked->total_amount ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Payments</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="payments_amount" disabled value="<?php $amount = 0;?>@foreach ($booked->payment as $item)<?php $amount += $item->payments_amount;$amount = 0+$amount;?>@endforeach Rs. {{ $amount }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="payments_amount" class="col-sm-3 col-form-label">Remaining Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="booked_remaining_amount" disabled value="Rs. {{ $booked->remaining_amount ?? 'N/A' }}">
                        </div>
                    </div>
                    @foreach ($booked->payment->where('final_payment', 1) as $final)
                        <div class="form-group row">
                            <label for="final_payment" class="col-sm-3 col-form-label">Final Payment Date</label>                        
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="final_payment" disabled value="{{ $final->created_at ?? 'N/A' }}">
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="table-responsive">
                    <table class="table mt-3 border-top">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Payments Type</th>
                            <th>Payments Id</th>
                            <th>Payments Amount</th>
                            <th>Payments Mode</th>
                            <th>Payments Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($booked->payment->sortBy('created_at') as $paymentInfo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paymentInfo->payments_type ?? 'N/A' }}</td>
                                <td>{{ $paymentInfo->payments_reference_id ?? 'N/A' }}</td>
                                <td>Rs. {{ $paymentInfo->payments_amount ?? 'N/A' }}</td>
                                <td>{{ $paymentInfo->payments_mode ?? 'N/A' }}</td>
                                <td><div class="badge badge-success badge-fw">{{ $paymentInfo->created_at ?? 'N/A' }}</div></td>
                            </tr>
                        @endforeach   
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </div>
@endsection