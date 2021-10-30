@extends('seller.layout')
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
                        <h4 class="card-title">Bike Information</h4>
                        <div class="form-group">
                        <label for="exampleInputEmail3">Bike Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" disabled value="{{ $booked->bike_sells->bike_name ?? 'N/A' }}">
                        </div>
                        <div class="form-group">
                            <label for="offer_name">Bike Registration Date</label>
                            <input type="text" class="form-control" id="offer_name" disabled value="{{ $booked->bike_sells->bike_reg_date ?? 'N/A' }}">
                        </div>
                        <div class="form-group">
                            <label for="number_of_owners">Number of Owners</label>
                            <input type="text" class="form-control" id="number_of_owners" disabled value="{{ $booked->bike_sells->number_of_owners ?? 'N/A' }}">
                        </div>
                        <div class="form-group">
                            <label for="total_kilometers">Total Kilometers</label>
                            <input type="text" class="form-control" id="total_kilometers" disabled value="{{ $booked->bike_sells->total_kilometers ?? 'N/A' }}">
                        </div>
                        <div class="form-group">
                            <label for="offer_name">Offer Name</label>
                            <input type="text" class="form-control" id="offer_name" disabled value="{{ $booked->offers->offer_name ?? 'N/A' }}">
                        </div>
                        <div class="form-group">
                            <label for="bike_sell_status">Bike Status</label>
                            <input type="text" class="form-control" id="bike_sell_status" disabled value="{{ $booked->bike_sells->bike_sell_status ?? 'N/A' }}">
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