@extends('superadmin.layout')
@section('title', 'Bike Buy Details')
@push('style')
<style>    
    .imageThumb {
        max-height: 82px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }
    .pip {
        display: inline-grid;
        margin: 10px 10px 0 0;
        width: min-content;
    }
</style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                @if ($bike_buy->bike_buy_image)
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image</h4>
                                <a href="#"><img src="{{ asset('storage/'.$bike_buy->bike_buy_image) }}" height="200" width="200" alt=""></a>
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- <form class="forms-sample"> --}}
                                <h4 class="card-title">Bike Information</h4>

                                <div class="form-group">
                                    <label for="bike_buy_is_rc_book_customer_name">Bike RC Book is Customer Name</label>
                                    <input type="text" class="form-control" id="bike_buy_is_rc_book_customer_name" disabled value="{{ $bike_buy->bike_buy_is_rc_book_customer_name ?? 'N/A' }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail3">Bike Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" disabled value="{{ optional($bike_buy->sell_bike_details)->brand_name.' '.optional($bike_buy->sell_bike_details)->model_name.' '.optional($bike_buy->sell_bike_details)->model_cc }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Base Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $bike_buy->bike_buy_base_price ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Valuation Deduction Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $bike_buy->bike_buy_deduction_amount ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Estimated Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $bike_buy->bike_buy_estimated_price ?? 'N/A' }}">
                                </div>

                                <div class="form-group">
                                    <label for="bike_year">Bike Registration Year</label>
                                    <input type="text" class="form-control" id="bike_year" disabled value="{{ optional($bike_buy->sell_bike_details)->bike_year }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_is_older_than_15">Bike is Older than 15 Years</label>
                                    <input type="text" class="form-control" id="bike_year" disabled value="{{ $bike_buy->bike_buy_is_older_than_15 }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="bike_buy_reg_no">Bike Registration No.</label>
                                    <input type="text" class="form-control" id="bike_buy_reg_no" disabled value="{{ $bike_buy->bike_buy_reg_no ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_no_of_km">Bike Running KM</label>
                                    <input type="text" class="form-control" id="bike_buy_no_of_km" disabled value="{{ optional($bike_buy->km_deduction_rates)->km_deduction_km_from.'-'.optional($bike_buy->km_deduction_rates)->km_deduction_km_to }} km">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_no_of_owners">No of Owners</label>
                                    <input type="text" class="form-control" id="bike_buy_no_of_owners" disabled value="{{ optional($bike_buy->owner_deduction_rates)->owner_deduction_owner_no }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_is_insurance">Bike Insured</label>
                                    <input type="text" class="form-control" id="bike_buy_is_insurance" disabled value="{{ $bike_buy->bike_buy_is_insurance ?? 'N/A' }}">
                                </div>
                                @if ($bike_buy->bike_buy_is_insurance == 'No')
                                    <div class="form-group">
                                        <label for="bike_buy_insurance_id">Selected Insurance</label>
                                        <input type="text" class="form-control" id="bike_buy_insurance_id" disabled value="{{ optional($bike_buy->insurance_deduction_rates)->insurance_deduction_cc_from.'-'.optional($bike_buy->insurance_deduction_rates)->insurance_deduction_cc_to }} CC">
                                    </div> 
                                    <div class="form-group">
                                        <label for="insurance_deduction_rate">Insurance Rate</label>
                                        <input type="text" class="form-control" id="insurance_deduction_rate" disabled value="Rs. {{ optional($bike_buy->insurance_deduction_rates)->insurance_deduction_rate }}">
                                    </div>  
                                @endif
                                
                                <div class="form-group">
                                    <label for="bike_buy_color">Bike Color</label>
                                    <input type="text" class="form-control" id="bike_buy_color" disabled value="{{ $bike_buy->bike_buy_color ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_current_city">Bike Current City</label>
                                    <input type="text" class="form-control" id="bike_buy_current_city" disabled value="{{ $bike_buy->bike_buy_current_city ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_status">Bike Buying Status</label>
                                    <input type="text" class="form-control" id="bike_buy_status" disabled value="@if($bike_buy->bike_buy_request_status == 'requested') {{ 'Requested' }} @elseif($bike_buy->bike_buy_request_status == 'inspected') {{ 'Bike Inspected' }} @elseif($bike_buy->bike_buy_request_status == 'doc_found') {{ 'Documents Found' }} @elseif($bike_buy->bike_buy_request_status == 'account_details_requested') {{ 'Account Details Submitted' }} @elseif($bike_buy->bike_buy_request_status == 'advance_paid') {{ 'Advance Paid' }} @elseif($bike_buy->bike_buy_request_status == 'paid') {{ 'Paid' }} @endif">
                                </div>


                                <h4 class="card-title">Collection Point Information</h4>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->collectionpoint)->shop_name }}">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->collectionpoint)->shop_location }}">
                                </div>
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->collectionpoint)->contact_no }}">
                                </div>

                                <h4 class="card-title">Customer Information</h4>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->customer)->user_first_name.' '.optional($bike_buy->customer)->user_last_name }}">
                                </div>
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->customer)->phone }}">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    

                    <h4 class="card-title">Appointment Information</h4>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Date & Time</label>
                        <input type="text" class="form-control" id="appointments_date" disabled value="{{ $bike_buy->appointments->appointments_date ?? 'N/A' }} & {{ $bike_buy->appointments->appointments_time ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Status</label>
                        <input type="text" class="form-control" id="appointments_status" disabled value="{{ $bike_buy->appointments->appointment_status ?? 'N/A' }} ">
                    </div>
                    <div class="form-group">
                        <label for="appointments_reschedule">Appointments Reschedule</label>
                        <?php $appointments_reschedule = $bike_buy->appointments->appointments_reschedule ?? 'N/A' ?>
                        @if ($appointments_reschedule == 1)
                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'Yes' }}">
                        @else
                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'No' }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="appointments_reschedule_id">Appointments Reschedule Name</label>
                        <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $bike_buy->reschedule->user_first_name ?? '' }} {{ $bike_buy->reschedule->user_last_name ?? 'N/A' }}">
                    </div>

                    <div class="form-group">
                        <label for="appointments_reschedule_id">Appointment Reschedule Date & Time</label>
                        @foreach ($bike_buy->rescheduleAppointments as $item)

                            <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $item->appointments_date ?? 'N/A' }} & {{ $item->appointments_time ?? '' }}">
                            
                            
                        @endforeach
                    </div>

                    <h4 class="card-title">Bike Inspection Information</h4>

                    @if ($bike_buy->bike_buy_inspection_id)
                        <div class="form-group">
                            <label for="bike_buy_inspection_deduction_amount">Bike Inspection Deduction Amount</label>
                            <input type="text" class="form-control" id="bike_buy_inspection_deduction_amount" disabled value="Rs. {{ $bike_buy->bike_buy_inspection_deduction_amount ?? 'N/A' }} ">
                        </div>

                        <div class="form-group">
                            <label for="bike_buy_final_price">Now Total Bike Price</label>
                            <input type="text" class="form-control" id="bike_buy_final_price" disabled value="Rs. {{ $bike_buy->bike_buy_final_price ?? 'N/A' }} ">
                        </div>

                        <center><a button class="btn btn-primary" href="{{ route('superadmin.bike_inspection_details',$bike_buy->bike_buy_inspection_id ) }}">Bike Inspections All Details</a></center>

                        {{-- @if ($bike_buy->bike_buy_is_client_agree == Null)
                            <br>
                            <center><button type="button" class="btn btn-info btn-sm" onclick="clientAgree()">Client Agree</button></center> --}}
                        @if($bike_buy->bike_buy_is_client_agree == 'Yes')
                            <div class="form-group">
                                <label for="bike_buy_is_client_agree">Customer Agreed</label>
                                <input type="text" class="form-control" id="bike_buy_is_client_agree" disabled value="{{ $bike_buy->bike_buy_is_client_agree ?? '' }} ">
                            </div>
                            @if ($bike_buy->bike_buy_negotiation_amount)
                                <div class="form-group">
                                    <label for="bike_buy_negotiation_amount">Negotiation Amount</label>
                                    <input type="text" class="form-control"  disabled value="Rs. {{ $bike_buy->bike_buy_negotiation_amount ?? 'N/A' }} ">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_negotiation_remark">Negotiation Remarks</label>
                                    <input type="text" class="form-control"  disabled value="Rs. {{ $bike_buy->bike_buy_negotiation_remark ?? 'N/A' }} ">
                                </div>
                            @endif                            

                            <div class="form-group">
                                <label for="bike_buy_agreed_bike_price">Bike Agreed Price</label>
                                <input type="text" class="form-control"  disabled value="Rs. {{ $bike_buy->bike_buy_agreed_bike_price ?? 'N/A' }} ">
                            </div>
                            <div class="form-group">
                                <label for="consider_for_advance">Consider for Advance</label>
                                <input type="text" class="form-control" disabled value="{{ $bike_buy->consider_for_advance ?? 'N/A' }} ">
                            </div>
                            <h4 class="card-title">Documents Information</h4>
                            @if ($bike_buy->bike_buy_documents_names)
                                @php
                                    $docs = explode('|',$bike_buy->bike_buy_uploaded_documents);
                                    $doc_names = explode('|',$bike_buy->bike_buy_documents_names);
                                @endphp
                                @foreach ($docs as $key=>$item)
                                    @php 
                                        $name = $doc_names[$key];
                                    @endphp

                                    <span class="pip">
                                        <a target="blank" href="{{asset('storage/'.$item)}}"><img class="imageThumb" src="{{asset('storage/'.$item)}}" title="{{ $name }}"></a>
                                        <p>{{$name}}</p>
                                    </span>
                                @endforeach

                                @if ($bike_buy->bike_buy_doucments_remarks)
                                    <div class="form-group">
                                        <label for="bike_buy_doucments_remarks">Documents Remarks (by collection point)</label>
                                        <input type="text" class="form-control" id="bike_buy_doucments_remarks" disabled value="{{ $bike_buy->bike_buy_doucments_remarks ?? '' }} ">
                                    </div>
                                @endif

                                @if ($bike_buy->bike_buy_superadmin_remarks)
                                    <div class="form-group">
                                        <label for="bike_buy_superadmin_remarks">My Remarks</label>
                                        <input type="text" class="form-control" id="bike_buy_superadmin_remarks" disabled value="{{ $bike_buy->bike_buy_superadmin_remarks ?? '' }} ">
                                    </div>
                                @endif
                                
                                {{-- @if ($bike_buy->bike_buy_is_all_document_found_physically == 'Yes') --}}
                                @if ($bike_buy->bike_buy_request_status != 'paid' && $bike_buy->bike_buy_request_status != 'denied')
                                    <div class="form-group">
                                        <label for="all_document_found_physically">All Document Physically Found by Collection Point</label>
                                        <input type="text" class="form-control" id="all_document_found_physically" disabled value="{{ $bike_buy->bike_buy_is_all_document_found_physically ?? '' }} ">
                                    </div>
                                    <center><button type="button" class="btn btn-info btn-sm" onclick="uploadRemerks()">Documents Remarks</button></center><br>
                                @endif
                                {{-- @else
                                    <div class="form-group">
                                        <label for="all_document_found_physically">All Document Found Physically</label>
                                        <input type="text" class="form-control" id="all_document_found_physically" disabled value="{{ $bike_buy->bike_buy_is_all_document_found_physically ?? 'N/A' }} ">
                                    </div>
                                    <center><button type="button" class="btn btn-info btn-sm" onclick="uploadRemerks()">Documents Remarks</button></center><br>
                                @endif --}}
                                

                            @endif
                            <h4 class="card-title">Customer Account Information</h4>
                            @if ($bike_buy->bike_buy_accounts_id)
                                <div class="form-group">
                                    <label for="acc_name">Account Holder Name</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->account_details)->pay_account_datail_acc_name }} ">
                                </div>
                                <div class="form-group">
                                    <label for="acc_name">Account Number</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->account_details)->pay_account_datail_acc_no }} ">
                                </div>
                                <div class="form-group">
                                    <label for="acc_name">IFSC Code</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->account_details)->pay_account_datail_ifsc }} ">
                                </div>
                                <div class="form-group">
                                    <label for="acc_name">Bank Name</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->account_details)->pay_account_datail_bank_name }} ">
                                </div>
                                <div class="form-group">
                                    <label for="acc_name">Branch Details</label>
                                    <input type="text" class="form-control" disabled value="{{ optional($bike_buy->account_details)->pay_account_datail_branch }} ">
                                </div>

                                <label for="acc_name">Account Book First Page / Cancel Checkbook Image</label>
                                <span class="pip">
                                    <a target="blank" href="{{asset('storage/'.optional($bike_buy->account_details)->pay_account_datail_account_detail_image)}}"><img class="imageThumb" src="{{asset('storage/'.optional($bike_buy->account_details)->pay_account_datail_account_detail_image)}}"></a>
                                </span>
                                @if ($bike_buy->bike_buy_request_status != 'paid')
                                    <center><button type="button" class="btn btn-info btn-sm" onclick="paymentNow()">Pay Now</button></center><br><br>
                                @endif
                                
                            @else
                                <div class="form-group">
                                    <label for="accounts_id">Account Details</label>
                                    <input type="text" class="form-control" disabled value="{{ 'Not Uploaded' }} ">
                                </div>
                            @endif
                            
                            <!-- document upload Modal Start -->
                            <div class="modal fade" id="superadminRemarks" tabindex="-1" role="dialog" aria-labelledby="superadminRemarks-2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="POST" action="{{ route('superadmin.documents_remarks') }}" >
                                            @csrf
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="superadminRemarks-2">Bike Documents Remarks</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <input class="form-control" type="hidden" name="bike_buy_request_id" id="bike_buy_request_id" value="{{ $bike_buy->id }}">
    
                                                <label for="bike_buy_superadmin_remarks">Documents Remarks</label>
                                                <textarea class="form-control" id="bike_buy_superadmin_remarks" name="bike_buy_superadmin_remarks" rows="3">{{ $bike_buy->bike_buy_superadmin_remarks }}</textarea>
                                                
    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="documentsUploadSubmit" class="btn btn-info">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Ends -->
    
                            <!--  Payment Modal Start -->
                                <div class="modal fade" id="paymentNow" tabindex="-1" role="dialog" aria-labelledby="paymentNow-2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form class="forms-sample" method="POST" action="{{ route('superadmin.buy_request_payment') }}">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="paymentNow-2">Payment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input class="form-control" type="hidden" name="bike_buy_request_id" id="bike_buy_request_id" value="{{ $bike_buy->id }}">

                                                    <label for="total_amount">Total Amount</label>
                                                    <input class="form-control" type="number" id="total_amountId" name="total_amount" readonly>

                                                    <label for="out_payment_type">Payment Type</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="out_payment_type" id="out_payment_type" required>
                                                            <option value="">Select Payment Type</option>
                                                            <option value="Advance">Advance</option>
                                                            <option value="Final">Final</option>
                                                        </select>
                                                    </div>
    
                                                    <label for="out_payment_amount">Payment Amount</label>
                                                    <input class="form-control" type="number" min="1" oninput="validity.valid||(value='');" name="out_payment_amount" id="out_payment_amount" required>
    
                                                    <label for="out_payment_ref_no">Reference No.</label>
                                                    <input class="form-control" type="text" name="out_payment_ref_no" id="out_payment_ref_no" maxlength="50" required>
    
                                                    <label for="out_payment_other_info">Payment Other Info</label>
                                                    <textarea class="form-control" id="out_payment_other_info" name="out_payment_other_info" rows="3"></textarea>
    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id="PaySubmit" class="btn btn-info">Pay</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- Payment Modal Ends -->

                            
                        @else
                            <div class="form-group">
                                <label for="bike_buy_is_client_agree">Customer Agreed</label>
                                <input type="text" class="form-control" id="bike_buy_is_client_agree" disabled value="{{ $bike_buy->bike_buy_is_client_agree ?? '' }} ">
                            </div>
                        @endif

                        

                    @endif
                    
                    
                </div>
            </div>
        </div>
        </div>

        {{-- Payment details --}}
        @if ($bike_buy->bike_buy_payment_id)

        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Payment Details</h4>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="total_amount_customer" disabled value="Rs. {{ $bike_buy->bike_buy_agreed_bike_price ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Amount Paid</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled value="Rs. {{ $bike_buy->tatal_amount_paid ?? 'N/A' }} ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Remaining Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="booked_remaining_amount" disabled value="Rs. {{ $bike_buy->bike_buy_agreed_bike_price - $bike_buy->tatal_amount_paid }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Advance Paid</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="booked_remaining_amount" disabled value="{{ $bike_buy->is_advance_paid ?? 'N/A' }}">
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table mt-3 border-top">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Payments Type</th>
                                <th>Payments Amount</th>
                                <th>Reference No.</th>
                                <th>Other Info</th>
                                <th>Payments Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bike_buy->payments->sortBy('created_at') as $paymentInfo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $paymentInfo->out_payment_type ?? 'N/A' }}</td>
                                    <td>Rs. {{ $paymentInfo->out_payment_amount ?? 'N/A' }}</td>
                                    <td>{{ $paymentInfo->out_payment_ref_no ?? 'N/A' }}</td>
                                    <td>{{ $paymentInfo->out_payment_other_info ?? 'N/A' }}</td>
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
        @endif
        {{-- End Payment details --}}
    </div>
@endsection
@push('scripts')
    <script>

        function uploadRemerks(){
            $('#superadminRemarks').modal('show');
        }

        function paymentNow(){
            var total_amount = "{{ $bike_buy->bike_buy_agreed_bike_price - $bike_buy->tatal_amount_paid }}";
            $('#paymentNow').modal('show');
            $('#total_amountId').val(total_amount);

            $("#out_payment_amount").keyup(function(){
                var out_payment_amount = $('[name="out_payment_amount"]').val();
                var remaining = total_amount - out_payment_amount;
                $('#total_amountId').val(remaining);
                if( total_amount >= out_payment_amount ){
                    
                }else{
                    $('#out_payment_amount').val('0');
                    $('#total_amountId').val(total_amount);
                }
            });
        }
        
    </script>
@endpush