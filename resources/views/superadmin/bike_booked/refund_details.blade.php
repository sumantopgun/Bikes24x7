@extends('superadmin.layout')
@section('title', 'Refund Details')
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image</h4>
                        <a href="#"><img src="{{asset('storage/'.$refund->bike_sells->bike_image ?? '')}}" height="200" width="200" alt=""></a>
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
                                <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $refund->customer->user_first_name.' '.$refund->customer->user_last_name  ?? 'N/A'}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Customer Phone No.</label>
                                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $refund->customer->phone  ?? 'N/A'}}">
                                </div>
                            
                                <h4 class="card-title">Bike Information</h4>
                                <div class="form-group">
                                <label for="exampleInputEmail3">Bike Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" disabled value="{{ $refund->bike_sells->bike_name ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_sell_status">Bike Status</label>
                                    <input type="text" class="form-control" id="bike_sell_status" disabled value="{{ $refund->bike_sells->bike_sell_status ?? 'N/A' }}">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="card-title">Shop Information</h4>
                    <div class="form-group">
                        <label>Shop Name</label>
                        <input type="text" class="form-control" disabled value="{{ $refund->shopName->shop_name ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label>Shop Location</label>
                        <input type="text" class="form-control" disabled value="{{ $refund->shshopNameop->shop_location ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label>Contact No.</label>
                        <input type="text" class="form-control" disabled value="{{ $refund->shopName->contact_no ?? 'N/A' }}">
                    </div>

                    <h4 class="card-title">Refund Information</h4>
                    <div class="form-group">
                        <label>Refund Remark by Shop</label>
                        <input type="text" class="form-control" disabled value="{{ $refund->refund_remark ?? 'N/A' }}">
                    </div>

                    <div class="form-group">
                        <label>Refund Amount</label>
                        <input type="text" class="form-control" disabled value="Rs. {{ $refund->refund_amount ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label>Refund Status</label>
                        <input type="text" class="form-control" disabled value="{{ $refund->refund_status ?? 'N/A' }}">
                    </div>

                    @if (optional($refund->refundDone)->refund_reference_id)
                        <div class="form-group">
                            <label>Refund Id</label>
                            <input type="text" class="form-control" disabled value="{{ $refund->refundDone->refund_reference_id ?? 'N/A' }}">
                        </div>
                    @endif
                    

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
            </div> --}}
    </div>
@endsection