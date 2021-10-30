@extends('customer.layout')
@section('title', 'Order Details')
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image</h4>
                        <a href="#"><img src="{{asset('storage/'.$order->bike_sells->bike_image ?? '')}}" height="200" width="200" alt=""></a>
                    </div>
                </div>
                </div>
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h4 class="card-title">Customer Information</h4> --}}
                            <form class="forms-sample">
                                <h4 class="card-title">Bike Information</h4>
                                <div class="form-group">
                                <label for="exampleInputEmail3">Bike Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" disabled value="{{ $order->bike_sells->bike_name ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="offer_name">Offer Name</label>
                                    <input type="text" class="form-control" id="offer_name" disabled value="{{ $order->offers->offer_name ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_sell_status">Bike Status</label>
                                    <input type="text" class="form-control" id="bike_sell_status" disabled value="{{ $order->bike_sells->bike_sell_status ?? 'N/A' }}">
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
                    <h4 class="card-title">Appointment Information</h4>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Date & Time</label>
                        <input type="text" class="form-control" id="appointments_date" disabled value="{{ $order->appointments->appointments_date ?? 'N/A' }} & {{ $order->appointments->appointments_time ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Status</label>
                        <input type="text" class="form-control" id="appointments_status" disabled value="{{ $order->appointments->appointment_status=='confirmed' ? 'Confirmed' : 'Not confirmed'}}">
                    </div>
                    <div class="form-group">
                        <label for="appointments_reschedule">Appointments Reschedule</label>
                        <?php $appointments_reschedule = $order->appointments->appointments_reschedule ?? 'N/A' ?>
                        @if ($appointments_reschedule == 1)
                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'Yes' }}">
                        @else
                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'No' }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="appointments_reschedule_id">Appointments Reschedule Name</label>
                        <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $order->reschedule->user_first_name ?? 'N/A' }} {{ $order->reschedule->user_last_name ?? 'N/A' }}">
                    </div>

                    <div class="form-group">
                        <label for="appointments_reschedule_id">Appointment Reschedule Date & Time</label>
                        {{-- @foreach ($booked->rescheduleAppointments->whereNotIn('appointments_date', $booked->appointments->appointments_date)->whereNotIn('appointments_time', $booked->appointments->appointments_time) as $item) --}}
                        @php
                            $nowAppoint = $order->appointments->appointments_date .' & '.$order->appointments->appointments_time;
                        @endphp
                        @foreach ($order->rescheduleAppointments as $item)

                            {{-- <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $item->appointments_date ?? 'N/A' }} & {{ $item->appointments_time ?? '' }}"> --}}

                            @if ($nowAppoint == $item->appointments_date.' & '.$item->appointments_time)
                                <div class="input-group mb-3">
                                    <input type="text" disabled class="form-control" aria-describedby="basic-addon2" value="{{ $item->appointments_date ?? '' }} & {{ $item->appointments_time ?? '' }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">{{ 'New' }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="input-group mb-3">
                                    <input type="text" disabled class="form-control" aria-describedby="basic-addon2" value="{{ $item->appointments_date ?? '' }} & {{ $item->appointments_time ?? '' }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">{{ 'Old' }}</span>
                                    </div>
                                </div>
                            @endif
                            
                            
                        @endforeach
                        {{-- <input type="text" class="form-control" id="appointments_reschedule2_id" disabled value="{{ 'N/A' }}"> --}}
                    </div>
                    <h4 class="card-title">Showroom Information</h4>
                    <div class="form-group">
                        <label>Showroom Name</label>
                        <input type="text" class="form-control" disabled value="{{ $order->shop->shop_name ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label>Showroom Location</label>
                        <input type="text" class="form-control" disabled value="{{ $order->shop->shop_location ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label>Contact No.</label>
                        <input type="text" class="form-control" disabled value="{{ $order->shop->contact_no ?? 'N/A' }}">
                    </div>
                    @if ($order->booking_requests_refund_status)
                        <h4 class="card-title">Refund Information</h4>
                        <div class="form-group">
                            <label>Refund Status</label>
                            <input type="text" class="form-control" disabled value="{{ $order->booking_requests_refund_status ?? 'N/A' }}">
                        </div>
                    @endif
                    

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
                            <input type="text" class="form-control" id="total_amount_customer" disabled value="Rs. {{ $order->total_amount ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Payments</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="payments_amount" disabled value="<?php $amount = 0;?>@foreach ($order->payment as $item)<?php $amount += $item->payments_amount;$amount = 0+$amount;?>@endforeach Rs. {{ $amount }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="payments_amount" class="col-sm-3 col-form-label">Remaining Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="booked_remaining_amount" disabled value="Rs. {{ $order->remaining_amount ?? 'N/A' }}">
                        </div>
                    </div>
                    @foreach ($order->payment->where('final_payment', 1) as $final)
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
                            {{-- <th>Id</th> --}}
                            <th>Transaction Type</th>
                            <th>Transaction Id</th>
                            <th>Transaction Amount</th>
                            <th>Transaction Mode</th>
                            <th>Transaction Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->payment->sortBy('created_at') as $paymentInfo)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $paymentInfo->payments_type ?? 'N/A' }}</td>
                                <td>{{ $paymentInfo->payments_reference_id ?? 'N/A' }}</td>
                                <td>Rs. {{ $paymentInfo->payments_amount ?? 'N/A' }}</td>
                                <td>{{ $paymentInfo->payments_mode ?? 'N/A' }}</td>
                                <td><div class="badge badge-success badge-fw">{{ $paymentInfo->created_at ?? 'N/A' }}</div></td>
                            </tr>
                        @endforeach  
                        @if ($order->booking_requests_refund_status)
                            <tr>
                                <td>{{ 'refund' }}</td>
                                <td>{{ $order->refund->refund_reference_id ?? 'N/A' }}</td>
                                <td>Rs. {{ $order->refund->refund_amount ?? 'N/A' }}</td>
                                <td>{{ 'online' }}</td>
                                <td><div class="badge badge-success badge-fw">{{ $order->refund->refund_at ?? 'N/A' }}</div></td>
                            </tr>
                        @endif 
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </div>
@endsection