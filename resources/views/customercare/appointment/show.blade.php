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
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image</h4>
                        <a target="blank" href="{{asset('storage/'.$booked->bike_sells->bike_image ?? '')}}"><img src="{{asset('storage/'.$booked->bike_sells->bike_image ?? '')}}" height="200" width="200" alt=""></a>
                    </div>
                </div>
                </div>
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Customer Information</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                <label for="exampleInputName1">Customer Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->customer->user_first_name.' '.$booked->customer->user_last_name  ?? 'N/A'}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputName1">Customer Phone No.</label>
                                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->customer->phone ?? 'N/A'}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Customer City</label>
                                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $booked->customer->user_city ?? 'N/A'}}">
                                </div>
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
                    <h4 class="card-title">Booking Information</h4>
                    <div class="form-group">
                        <label>Booking Date</label>
                        <input type="text" class="form-control" disabled value="{{ $booked->payments->created_at->format('d/m/Y') ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label>Booking Amount</label>
                        <input type="text" class="form-control" disabled value="Rs. {{ $booked->payments->payments_amount ?? 'N/A' }}">
                    </div>
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

                    <h4 class="card-title">Appointment Information</h4>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Date & Time</label>
                        <input type="text" class="form-control" id="appointments_date" disabled value="{{ $booked->appointments->appointments_date ?? 'N/A' }} & {{ $booked->appointments->appointments_time ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Status</label>
                        <input type="text" class="form-control" id="appointments_status" disabled value="{{ $booked->appointments->appointment_status=='confirmed' ? 'Confirmed' : 'Not confirmed'}} ">
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
                        {{-- @foreach ($booked->rescheduleAppointments->whereNotIn('appointments_date', $booked->appointments->appointments_date)->whereNotIn('appointments_time', $booked->appointments->appointments_time) as $item) --}}
                        
                        @foreach ($booked->rescheduleAppointments as $item)
                            @php
                                $nowAppoint = $booked->appointments->appointments_date .' & '.$booked->appointments->appointments_time;
                            @endphp
                            @if ($nowAppoint == $item->appointments_date.' & '.$item->appointments_time)
                                <div class="input-group mb-3">
                                    <input type="text" disabled class="form-control" aria-describedby="basic-addon2" value="{{ $item->appointments_date ?? '' }} & {{ $item->appointments_time ?? '' }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">{{ 'after' }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="input-group mb-3">
                                    <input type="text" disabled class="form-control" aria-describedby="basic-addon2" value="{{ $item->appointments_date ?? '' }} & {{ $item->appointments_time ?? '' }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">{{ 'before' }}</span>
                                    </div>
                                </div>
                            @endif
                            
                            
                            
                        @endforeach
                        
                        {{-- <input type="text" class="form-control" id="appointments_reschedule2_id" disabled value="{{ 'N/A' }}"> --}}
                    </div>
                    <center>
                        <div class="form-group btn-group" role="group" aria-label="Basic example">   
                            @if ($booked->appointments->appointment_status == 'unconfirmed')
                                <a button class="btn btn-primary" href="{{route('customercare.confirm', ['booking_id' => Crypt::encrypt($booked->id) ])}}">Confirm</a>
                            @endif                     
                            
                            <a button class="btn btn-danger" href="{{route('customercare.reschedule', ['booking_id' => Crypt::encrypt($booked->id) ])}}">Reschedule</a>
                        </div> 
                    </center>
                    
                </div>
            </div>
        </div>
        </div>
        {{-- <div class="row grid-margin">
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
                            <input type="text" class="form-control" id="payments_amount" disabled value="?php $amount = 0;?@foreach ($booked->payment as $item)?php $amount += $item->payments_amount;$amount = 0+$amount;?>@endforeach Rs. {{ $amount }}">
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
                        @foreach ($booked->payment as $paymentInfo)
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
            </div> --}}
    </div>
@endsection