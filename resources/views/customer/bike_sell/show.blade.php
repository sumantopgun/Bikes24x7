@extends('customer.layout')
@section('title', 'Bike Selling Details')
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
    .modal-body {
        background: #eca7a7ba;
    }
</style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                @if ($bike_sell->bike_buy_image)
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Image</h4>
                                <a href="#"><img src="{{ asset('storage/'.$bike_sell->bike_buy_image) }}" height="200" width="200" alt=""></a>
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
                                    <label for="bike_buy_is_rc_book_customer_name">RC Book is My Name</label>
                                    <input type="text" class="form-control" id="bike_buy_is_rc_book_customer_name" disabled value="{{ $bike_sell->bike_buy_is_rc_book_customer_name ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Bike Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" disabled value="{{ optional($bike_sell->sell_bike_details)->brand_name.' '.optional($bike_sell->sell_bike_details)->model_name.' '.optional($bike_sell->sell_bike_details)->model_cc }}">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Base Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $bike_sell->bike_buy_base_price ?? 'N/A' }}">
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Valuation Deduction Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $bike_sell->bike_buy_deduction_amount ?? 'N/A' }}">
                                </div> --}}

                                <div class="form-group">
                                    <label for="bike_buy_base_price">Bike Estimated Price</label>
                                    <input type="text" class="form-control" id="bike_buy_base_price" disabled value="Rs. {{ $bike_sell->bike_buy_estimated_price ?? 'N/A' }}">
                                </div>                                

                                <div class="form-group">
                                    <label for="bike_year">Bike Registration Year</label>
                                    <input type="text" class="form-control" id="bike_year" disabled value="{{ optional($bike_sell->sell_bike_details)->bike_year }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_is_older_than_15">Bike is Older than 15 Years</label>
                                    <input type="text" class="form-control" id="bike_year" disabled value="{{ $bike_sell->bike_buy_is_older_than_15 }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="bike_buy_reg_no">Bike Registration No.</label>
                                    <input type="text" class="form-control" id="bike_buy_reg_no" disabled value="{{ $bike_sell->bike_buy_reg_no ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_no_of_km">Bike Running KM</label>
                                    <input type="text" class="form-control" id="bike_buy_no_of_km" disabled value="{{ optional($bike_sell->km_deduction_rates)->km_deduction_km_from.'-'.optional($bike_sell->km_deduction_rates)->km_deduction_km_to }} km">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_no_of_owners">No of Owners</label>
                                    <input type="text" class="form-control" id="bike_buy_no_of_owners" disabled value="{{ optional($bike_sell->owner_deduction_rates)->owner_deduction_owner_no }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_is_insurance">Bike is Insurance</label>
                                    <input type="text" class="form-control" id="bike_buy_is_insurance" disabled value="{{ $bike_sell->bike_buy_is_insurance ?? 'N/A' }}">
                                </div>

                                {{-- @if ($bike_sell->bike_buy_is_insurance == 'No')
                                    <div class="form-group">
                                        <label for="bike_buy_insurance_id">Selected Insurance</label>
                                        <input type="text" class="form-control" id="bike_buy_insurance_id" disabled value="{{ optional($bike_sell->insurance_deduction_rates)->insurance_deduction_cc_from.'-'.optional($bike_sell->insurance_deduction_rates)->insurance_deduction_cc_to }} CC">
                                    </div> 
                                    <div class="form-group">
                                        <label for="insurance_deduction_rate">Insurance Rate</label>
                                        <input type="text" class="form-control" id="insurance_deduction_rate" disabled value="Rs. {{ optional($bike_sell->insurance_deduction_rates)->insurance_deduction_rate }}">
                                    </div>  
                                @endif --}}

                                <div class="form-group">
                                    <label for="bike_buy_color">Bike Color</label>
                                    <input type="text" class="form-control" id="bike_buy_color" disabled value="{{ $bike_sell->bike_buy_color ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="bike_buy_current_city">Bike Current City</label>
                                    <input type="text" class="form-control" id="bike_buy_current_city" disabled value="{{ $bike_sell->bike_buy_current_city ?? 'N/A' }}">
                                </div>

                                <div class="form-group">
                                    <label for="bike_sell_status">Bike Sell Status</label>
                                    <input type="text" class="form-control" id="bike_sell_status" disabled value="@if($bike_sell->bike_buy_request_status == 'requested') {{ 'Requested' }} @elseif($bike_sell->bike_buy_request_status == 'inspected') {{ 'Bike Inspected' }} @elseif($bike_sell->bike_buy_request_status == 'doc_found') {{ 'Documents Found' }} @elseif($bike_sell->bike_buy_request_status == 'account_details_requested') {{ 'Account Details Submitted' }} @elseif($bike_sell->bike_buy_request_status == 'advance_paid') {{ 'Advance Paid' }} @elseif($bike_sell->bike_buy_request_status == 'paid') {{ 'Paid' }} @endif">
                                </div>
                                @if ($bike_sell->bike_buy_appointment_id)
                                    <h4 class="card-title">Appointment Information</h4>
                                    <div class="form-group">
                                        <label for="appointments_date">Appointment Date & Time</label>
                                        <input type="text" class="form-control" id="appointments_date" disabled value="{{ $bike_sell->appointments->appointments_date ?? 'N/A' }} & {{ $bike_sell->appointments->appointments_time ?? 'N/A' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="appointments_date">Appointment Status</label>
                                        <input type="text" class="form-control" id="appointments_status" disabled value="{{ $bike_sell->appointments->appointment_status=='confirmed' ? 'Confirmed' : 'Not confirmed'}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="appointments_reschedule">Appointments Reschedule</label>
                                        <?php $appointments_reschedule = $bike_sell->appointments->appointments_reschedule ?? 'N/A' ?>
                                        @if ($appointments_reschedule == 1)
                                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'Yes' }}">
                                        @else
                                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'No' }}">
                                        @endif
                                    </div>
                                    
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    @if ($bike_sell->bike_buy_appointment_id == Null)
                    <h4 class="card-title">Appointment Information</h4>
                        <center><a href="{{ route('bike-sell-appointments',$bike_sell->id ) }}" role="button" class="badge badge-info badge-fw">Book Appointment</a></center>
                    @else

                        <div class="form-group">
                            <label for="appointments_reschedule_id">Appointments Reschedule Name</label>
                            <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $bike_sell->reschedule->user_first_name ?? '' }} {{ $bike_sell->reschedule->user_last_name ?? 'N/A' }}">
                        </div>

                        <div class="form-group">
                            <label for="appointments_reschedule_id">Appointment Reschedule Date & Time</label>
                            @php
                                $nowAppoint = $bike_sell->appointments->appointments_date .' & '.$bike_sell->appointments->appointments_time;
                            @endphp
                            @foreach ($bike_sell->rescheduleAppointments as $item)

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
                        </div>
                        
                        <h4 class="card-title">Collection Point Information</h4>
                        <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" class="form-control" disabled value="{{ optional($bike_sell->collectionpoint)->shop_name }}">
                        </div>
                        <div class="form-group">
                            <label>Shop Location</label>
                            <input type="text" class="form-control" disabled value="{{ optional($bike_sell->collectionpoint)->shop_location }}">
                        </div>
                        <div class="form-group">
                            <label>Contact No.</label>
                            <input type="text" class="form-control" disabled value="{{ optional($bike_sell->collectionpoint)->contact_no }}">
                        </div>
                    {{-- Bike Inspection Information --}}
                        @if ($bike_sell->bike_buy_inspection_id)
                            <h4 class="card-title">Bike Inspection Information</h4>
                            <div class="form-group">
                                <label for="bike_buy_inspection_deduction_amount">Bike Inspection Deduction Amount</label>
                                <input type="text" class="form-control" disabled value="Rs. {{ $bike_sell->bike_buy_inspection_deduction_amount ?? 'N/A' }} ">
                            </div>
                            <div class="form-group">
                                <label for="bike_buy_final_price">Now Total Bike Price</label>
                                <input type="text" class="form-control" disabled value="Rs. {{ $bike_sell->bike_buy_final_price ?? 'N/A' }} ">
                            </div>
                        @endif

                    {{-- You agree and upload Documents --}}
                        @if ($bike_sell->bike_buy_is_client_agree == Null)
                            
                        @elseif ($bike_sell->bike_buy_is_client_agree == 'Yes')
                            <h4 class="card-title">Final Price</h4>
                            @if ($bike_sell->bike_buy_negotiation_amount)
                                <div class="form-group">
                                    <label for="bike_buy_negotiation_amount">Negotiation Amount</label>
                                    <input type="text" class="form-control"  disabled value="Rs. {{ $bike_sell->bike_buy_negotiation_amount ?? 'N/A' }} ">
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="bike_buy_agreed_bike_price">Bike Agreed Price</label>
                                <input type="text" class="form-control" id="bike_buy_agreed_bike_price" disabled value="Rs. {{ $bike_sell->bike_buy_agreed_bike_price ?? 'N/A' }} ">
                            </div>
                            <div class="form-group">
                                <label for="consider_for_advance">Consider for Advance</label>
                                <input type="text" class="form-control" disabled value="{{ $bike_sell->consider_for_advance ?? 'N/A' }} ">
                            </div>

                            <h4 class="card-title">Documents Information</h4>
                            @if ($bike_sell->bike_buy_documents_names == Null)
                                <center><button type="button" class="btn btn-info btn-sm" onclick="uploadDocuments()">Upload Documents</button></center>
                            @else
                                @php
                                    $docs = explode('|',$bike_sell->bike_buy_uploaded_documents);
                                    $doc_names = explode('|',$bike_sell->bike_buy_documents_names);
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
                                @if ($bike_sell->bike_buy_request_status != 'paid' && $bike_sell->bike_buy_request_status != 'denied')
                                    <center><button type="button" class="btn btn-info btn-sm" onclick="uploadDocuments()">Update Documents</button></center><br>
                                @endif
                                

                                @if ($bike_sell->bike_buy_doucments_remarks)
                                    <div class="form-group">
                                        <label for="bike_buy_doucments_remarks">Documents Remarks (by collection point)</label>
                                        <input type="text" class="form-control" id="bike_buy_doucments_remarks" disabled value="{{ $bike_sell->bike_buy_doucments_remarks ?? '' }} ">
                                    </div>
                                @endif

                                @if ($bike_sell->bike_buy_superadmin_remarks)
                                    <div class="form-group">
                                        <label for="bike_buy_superadmin_remarks">Documents Remarks (by superadmin)</label>
                                        <input type="text" class="form-control" id="bike_buy_superadmin_remarks" disabled value="{{ $bike_sell->bike_buy_superadmin_remarks ?? '' }} ">
                                    </div>
                                @endif

                                @if ($bike_sell->bike_buy_is_all_document_found_physically == Null || $bike_sell->bike_buy_is_all_document_found_physically == 'No')
                                    <div class="form-group">
                                        <label for="all_document_found_physically" style="color:red;">**Submit all documents physically to collection point**</label>
                                    </div>
                                @endif

                                <h4 class="card-title">Account Information</h4>
                                @if ($bike_sell->bike_buy_accounts_id == Null)
                                    <center><button type="button" class="btn btn-info btn-sm" onclick="uploadAccountDetails()">Upload Account Details</button></center>
                                @else
                                    <div class="form-group">
                                        <label for="acc_name">Account Holder Name</label>
                                        <input type="text" class="form-control" disabled value="{{ optional($bike_sell->account_details)->pay_account_datail_acc_name }} ">
                                    </div>
                                    <div class="form-group">
                                        <label for="acc_name">Account Number</label>
                                        <input type="text" class="form-control" disabled value="{{ optional($bike_sell->account_details)->pay_account_datail_acc_no }} ">
                                    </div>
                                    <div class="form-group">
                                        <label for="acc_name">IFSC Code</label>
                                        <input type="text" class="form-control" disabled value="{{ optional($bike_sell->account_details)->pay_account_datail_ifsc }} ">
                                    </div>
                                    <div class="form-group">
                                        <label for="acc_name">Bank Name</label>
                                        <input type="text" class="form-control" disabled value="{{ optional($bike_sell->account_details)->pay_account_datail_bank_name }} ">
                                    </div>
                                    <div class="form-group">
                                        <label for="acc_name">Branch Details</label>
                                        <input type="text" class="form-control" disabled value="{{ optional($bike_sell->account_details)->pay_account_datail_branch }} ">
                                    </div>

                                    <label for="acc_name">Account Book First Page / Cancel Checkbook Image</label>
                                    <span class="pip">
                                        <a target="blank" href="{{asset('storage/'.optional($bike_sell->account_details)->pay_account_datail_account_detail_image)}}"><img class="imageThumb" src="{{asset('storage/'.optional($bike_sell->account_details)->pay_account_datail_account_detail_image)}}"></a>
                                    </span> <br><br>
                                @endif
                                
                                {{-- <h4 class="card-title">Bike Total Payable</h4>
                                <div class="form-group">
                                    <label for="accounts_id">Total Remaining Amount</label>
                                    <input type="text" class="form-control" disabled value="Rs. {{ $bike_sell->bike_buy_agreed_bike_price ?? 'N/A' }} ">
                                </div>
                                <div class="form-group">
                                    <label for="accounts_id">Consider for Advance</label>
                                    <input type="text" class="form-control" disabled value="{{ $bike_sell->consider_for_advance ?? 'N/A' }} ">
                                </div>
                                <div class="form-group">
                                    <label for="accounts_id">Advance Paid</label>
                                    <input type="text" class="form-control" disabled value="{{ $bike_sell->is_advance_paid ?? 'N/A' }} ">
                                </div>
                                <div class="form-group">
                                    <label for="accounts_id">Tatal Amount Paid</label>
                                    <input type="text" class="form-control" disabled value="{{ $bike_sell->tatal_amount_paid ?? 'N/A' }} ">
                                </div>

                                <h4 class="card-title">Payment Details</h4> --}}

                            @endif

                            <!-- document upload Modal Start -->
                            <div class="modal fade" id="documentsUpload" tabindex="-1" role="dialog" aria-labelledby="documentsUpload-2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="POST" action="{{ route('customer.documents_upload') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="documentsUpload-2">Bike Document</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input class="form-control" type="hidden" name="bike_buy_request_id" id="bike_buy_request_id" value="{{ $bike_sell->id }}">
    
                                                <label for="bike_buy_upload_rc_book">RC Book</label>
                                                <input id="bike_buy_upload_rc_book" class="form-control-file" type="file" name="bike_buy_upload_rc_book">
    
                                                <label for="bike_buy_upload_aadhar_card">Aadhar Card</label>
                                                <input id="bike_buy_upload_aadhar_card" class="form-control-file" type="file" name="bike_buy_upload_aadhar_card">
    
                                                <label for="bike_buy_upload_form29_signed">Form 29 Signed</label>
                                                <input id="bike_buy_upload_form29_signed" class="form-control-file" type="file" name="bike_buy_upload_form29_signed">

                                                <label for="bike_buy_upload_pan_card">PAN Card</label>
                                                <input id="bike_buy_upload_pan_card" class="form-control-file" type="file" name="bike_buy_upload_pan_card">

                                                <label for="bike_buy_upload_insurance">Insurance </label>
                                                <input id="bike_buy_upload_insurance" class="form-control-file" type="file" name="bike_buy_upload_insurance">

                                                <label for="bike_buy_upload_form_30">Form 30 </label>
                                                <input id="bike_buy_upload_form_30" class="form-control-file" type="file" name="bike_buy_upload_form_30">

                                                <label for="bike_buy_upload_bank_noc">Bank NOC</label>
                                                <input id="bike_buy_upload_bank_noc" class="form-control-file" type="file" name="bike_buy_upload_bank_noc">
    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="documentsUploadSubmit" class="btn btn-info">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- document Modal Ends -->
    
                            <!--  upload account details Modal Start -->
                            <div class="modal fade" id="uploadAccountDetails" tabindex="-1" role="dialog" aria-labelledby="uploadAccountDetails-2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="POST" action="{{ route('customer.account_details') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadAccountDetails-2">Account Details Upload</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <span style="color:red;">**Please note that payment will be done to owner's bank account only.**</span>
                                                <br>
                                                <input class="form-control" type="hidden" name="bike_buy_request_id" id="bike_buy_request_id" value="{{ $bike_sell->id }}">
    
                                                <label for="pay_account_datail_acc_name">Account Holder Name</label>
                                                <input class="form-control" type="text" name="pay_account_datail_acc_name" id="pay_account_datail_acc_name" maxlength="100" required>
    
                                                <label for="pay_account_datail_acc_no">Account Number</label>
                                                <input class="form-control" type="text" name="pay_account_datail_acc_no" id="pay_account_datail_acc_no" maxlength="25" required>
    
                                                <label for="pay_account_datail_ifsc">IFSC Code</label>
                                                <input class="form-control" type="text" name="pay_account_datail_ifsc" id="pay_account_datail_ifsc" maxlength="11" required>
    
                                                <label for="pay_account_datail_bank_name">Bank Name</label>
                                                <input class="form-control" type="text" name="pay_account_datail_bank_name" id="pay_account_datail_bank_name" maxlength="45" required>
    
                                                <label for="pay_account_datail_branch">Branch Details</label>
                                                <input class="form-control" type="text" name="pay_account_datail_branch" id="pay_account_datail_branch" maxlength="45" required>
    
                                                <label for="pay_account_datail_account_detail_image">Passbook First Page / Cancelled Cheque Image </label>
                                                <input id="pay_account_datail_account_detail_image" class="form-control-file" type="file" name="pay_account_datail_account_detail_image" required>
                                                <span style="color:red;">**Must be Image**</span>
    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="uploadAccountDetailsSubmit" class="btn btn-info">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- upload account details Modal Ends -->
                        @else
                            <div class="form-group">
                                <label for="bike_buy_is_client_agree">Customer Agreed</label>
                                <input type="text" class="form-control" id="bike_buy_is_client_agree" disabled value="{{ $bike_sell->bike_buy_is_client_agree ?? '' }} ">
                            </div>
                        @endif
                        
                    @endif

                    
                </div>
            </div>
        </div>
        </div>

        {{-- Payment details --}}
        @if ($bike_sell->bike_buy_payment_id)

        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Payment Details</h4>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="total_amount_customer" disabled value="Rs. {{ $bike_sell->bike_buy_agreed_bike_price ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Amount Paid</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled value="Rs. {{ $bike_sell->tatal_amount_paid ?? 'N/A' }} ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Remaining Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  disabled value="Rs. {{ $bike_sell->bike_buy_agreed_bike_price - $bike_sell->tatal_amount_paid }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Advance Paid</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" disabled value="{{ $bike_sell->is_advance_paid ?? 'N/A' }}">
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
                            @foreach ($bike_sell->payments->sortBy('created_at') as $paymentInfo)
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

        function uploadDocuments(){
            $('#documentsUpload').modal('show');
        }

        function uploadAccountDetails(){
            $('#uploadAccountDetails').modal('show');
        }
        
    </script>
@endpush