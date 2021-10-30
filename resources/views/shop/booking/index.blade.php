@extends('shop.layout')
@section('title', 'Booking Details')
@push('style')
    {{-- <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" /> --}}
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Booking Details</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @error ('remaining_amount')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        @error ('payment_type')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        @error ('pay_amount')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        @if($booked)
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Bike Name</th>
                            {{-- <th>Payment Amount</th>
                            <th>Total Amount</th> --}}
                            <th>Remaining Amount</th>
                            <th>Appointment Date & Time</th>
                            {{-- <th>Remaining Day</th> --}}
                            <th>Booking Type</th>
                            <th>Payment</th>
                            <th>Booking Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($activeBooking as $activeBook) --}}
                            <tr>           
                                <td>{{ $booked->customer->user_first_name ?? 'N/A' }} {{ $booked->customer->user_last_name ?? '' }}</td>
                                <td>{{ $booked->bike_sells->bike_name ?? 'N/A' }}</td>
                                {{-- <td>Rs. {{ $activeBook->payments->payments_amount ?? 'N/A' }}</td> --}}
                                {{-- <td>
                                    ?php $amount = 0; ?>
                                    @foreach ($booked->payment as $item)
                                       ?php $amount += $item->payments_amount ; 
                                        $amount = 0+$amount;
                                       ?>
                                    @endforeach
                                    Rs. {{ $amount }}
                                </td>
                                <td>Rs. {{ $booked->total_amount ?? 'N/A' }}</td> --}}
                                <td>Rs. {{ $booked->remaining_amount ?? 'N/A' }}</td> 
                                <td>
                                    {{ $booked->appointments->appointments_date ?? 'N/A' }} & {{ $booked->appointments->appointments_time ?? 'N/A' }}                     
                                </td>
                                <td>
                                    @if ($booked->booking_requests_billing_address_id!=Null)
                                        {{ 'Walkin' }}
                                    @else
                                        {{ 'Online' }}
                                    @endif
                                    {{-- {{ $booked->booking_requests_billing_address_id }} --}}
                                </td>
                                {{-- <td>{{ today()->diffInDays($activeBook->created_at->add($dayAgo+1, 'day')->format('Y-m-d')) }}</td> --}}

                                <td>
                                    @if ($booked->remaining_amount == 0)
                                        <button type="button" class="btn btn-success btn-sm">Paid</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm" onclick="payCash({{$booked->id}})">Pay</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($booked->booking_requests_book_status == 'booked')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="bookingStatus({{$booked->id}})">Change Status</button>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm">Not Allow</button>
                                    @endif
                                    
                                </td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-info" data-toggle="modal" data-target="#moreInfo">More Info</button>
                                    </div> 
                                </td>                                 
                            </tr>
                        {{-- @endforeach    --}}
                    </tbody>
                </table>                    
            </div>
            <!-- Modal Start -->
            <div class="modal fade" id="payCashId" tabindex="-1" role="dialog" aria-labelledby="payCashId-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('shop.payment') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="payCashId-2">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="booking_request_id" id="bookingId">
                            <label for="remaining_amount">Remaining Amount</label>
                            <input class="form-control" type="number" id="remainingAmountId" name="remaining_amount" readonly>
                            <label for="remaining_amount">Pay Amount</label>
                            <input class="form-control" type="number" id="payAmount" name="pay_amount" placeholder="Enter Amount">
                            <br>
                            <div class="form-group">
                                {{-- <label for="remaining_amount">Payment Type</label> --}}
                                <select class="form-control" name="payment_type" id="payment_type" required>
                                    <option value="">Payment Type</option>
                                    <option value="cash">Cash</option>
                                    <option value="online">Online</option>
                                </select>
                            </div>

                            {{-- <label for="booking_authorization_pin">Authorization Pin</label>
                            <input class="form-control" type="password" name="booking_authorization_pin" placeholder="Enter Authorization Pin" required> --}}
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Pay</button>
                        
                        </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Modal Ends -->

              <!-- Status Denied Modal Start -->
            <div class="modal fade" id="bookingStatusId" tabindex="-1" role="dialog" aria-labelledby="bookingStatus-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('shop.bookingstatuschange') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="bookingStatus-2">Booking Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="hidden" name="booking_request_id" id="bookingIdShow">
                        <div class="form-group">
                            <select class="form-control" name="book_status" id="book_status" required>
                                <option value="">Select Status</option>
                                <option value="success">Success</option>
                                @if ($booked->booking_requests_billing_address_id!=Null)
                                    <option value="denied">Denied</option>
                                @else
                                    <option value="refund">Refund</option>
                                @endif
                                
                                {{-- <option value="denied">Denied</option> --}}
                            </select>
                        </div>

                        <div class="form-group" id="refund_remarkField">
                            <textarea class="form-control" name="refund_remark" id="refund_remark" rows="4"></textarea>
                        </div>
                        {{-- <input class="form-control" type="password" name="booking_authorization_pin" placeholder="Enter Authorization Pin" required> --}}
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        
                        </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Modal Ends -->

              <!-- More info Modal starts -->
              
              <div class="modal fade" id="moreInfo" tabindex="-1" role="dialog" aria-labelledby="moreInfo" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header" style="display: block;">
                        <center>
                        <h4 class="modal-title" id="exampleModalLabel">Booking Details</h4>
                        </center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            @if ($booked)            
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
                                            <div class="form-group">
                                                <label for="offer_name">Offer Name</label>
                                                <input type="text" class="form-control" id="offer_name" disabled value="{{ $booked->offers->offer_name ?? 'N/A' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="bike_sell_status">Bike Status</label>
                                                <input type="text" class="form-control" id="bike_sell_status" disabled value="{{ $booked->bike_sells->bike_sell_status ?? 'N/A' }}">
                                            </div>
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
                                                <label for="appointment_status">Appointment Status</label>
                                                <input type="text" class="form-control" id="appointment_status" disabled value="{{ $booked->appointments->appointment_status ?? 'N/A' }}">
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
                                        
                                        {{-- <h4 class="card-title">Shop Information</h4>
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
                                        </div> --}}
                                        
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
                            @else
                            <p class="alert alert-info">Not Allow.....</p>
                            @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
              </div>
              <!-- Modal Ends -->

             
           
            </div>
        </div>
        @else
            <p class="alert alert-info">Not Found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script> --}}
    <script>
        $('#refund_remarkField').hide();
        
        function payCash(id){
            // alert(id);
            var remaining_amount = "{{ $booked->remaining_amount ?? 'N/A' }}";
            $('#payCashId').modal('show');
            $('#bookingId').val(id);
            $('#remainingAmountId').val(remaining_amount);

            $("#payAmount").keyup(function(){
                var payAmount = $('[name="pay_amount"]').val();
                var remaining = remaining_amount - payAmount;
                $('#remainingAmountId').val(remaining);
                // if( remaining <= remaining_amount ){
                //     $('#remainingAmountId').val(remaining);
                // }
            });
        }

        function bookingStatus(id){
            // alert(id);
            $('#bookingStatusId').modal('show');
            $('#bookingIdShow').val(id);
        }

        $("#book_status").change(function(){
            var book_status = $('[name="book_status"]').val();
            if(book_status=='refund'){
                $('#refund_remark').prop('required',true);
                $('#refund_remarkField').show();
            }else{
                $('#refund_remark').prop('required',false);
                $('#refund_remarkField').hide();
            }
        });

        function userDetails(id){
            // alert(id);
            $('#userDetailsId').modal('show');
            $('#userDetailsShow').val(id);
        }
    </script>
    <script> 
            
        </script>
@endpush