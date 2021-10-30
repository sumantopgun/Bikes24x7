@extends('collection_point.layout')
@section('title', 'Bike Booking Details')
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

                                <center><button type="button" class="btn btn-info btn-sm" onclick="uploadRegistrationNoU()">Update Registration Number</button></center>

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
                                    <label for="bike_buy_status">Bike Status</label>
                                    <input type="text" class="form-control" id="bike_buy_status" disabled value="@if($bike_buy->bike_buy_request_status == 'requested') {{ 'Requested' }} @elseif($bike_buy->bike_buy_request_status == 'inspected') {{ 'Bike Inspected' }} @elseif($bike_buy->bike_buy_request_status == 'doc_found') {{ 'Documents Found' }} @elseif($bike_buy->bike_buy_request_status == 'account_details_requested') {{ 'Account Details Submitted' }} @elseif($bike_buy->bike_buy_request_status == 'advance_paid') {{ 'Advance Paid' }} @elseif($bike_buy->bike_buy_request_status == 'paid') {{ 'Paid' }} @endif">
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
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bike Inspection Information</h4>

                    @if ($bike_buy->bike_buy_inspection_id == Null)
                        <center><a button class="btn btn-primary" href="{{ route('collectionpoint.bike-inspection',$bike_buy->id ) }}">Bike Inspections Now</a></center>
                    @else
                        <div class="form-group">
                            <label for="bike_buy_inspection_deduction_amount">Bike Inspection Deduction Amount</label>
                            <input type="text" class="form-control" id="bike_buy_inspection_deduction_amount" disabled value="Rs. {{ $bike_buy->bike_buy_inspection_deduction_amount ?? 'N/A' }} ">
                        </div>

                        <div class="form-group">
                            <label for="bike_buy_final_price">Now Total Bike Price</label>
                            <input type="text" class="form-control" id="bike_buy_final_price" disabled value="Rs. {{ $bike_buy->bike_buy_final_price ?? 'N/A' }} ">
                        </div>

                        <center><a button class="btn btn-primary" href="{{ route('collectionpoint.bike_inspection_details',$bike_buy->bike_buy_inspection_id ) }}">Bike Inspections All Details</a></center>

                        @if ($bike_buy->bike_buy_is_client_agree == Null)
                            <br>
                            <form class="forms-sample" method="POST" action="{{ route('collectionpoint.client_agree') }}">
                                @csrf
                                <input class="form-control" type="hidden" name="bike_buy_request_id" id="bike_buy_request_id" value="{{ $bike_buy->id }}">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><br>Client Agree</label>
                                    <div class="col-sm-4">
                                        <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="bike_buy_is_client_agree" id="client_agree0" value="Yes" required>
                                            Yes
                                        <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="bike_buy_is_client_agree" id="client_agree1" value="No" required>
                                            No
                                        <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div id="showNegotiation" style="display:none;">

                                    <label for="bike_buy_negotiation_amount">Negotiation Amount</label>
                                    <input class="form-control" type="number" id="bike_buy_negotiation_amount" name="bike_buy_negotiation_amount">

                                    <label for="bike_buy_negotiation_remark">Negotiation Remarks *</label>
                                    <textarea class="form-control" id="bike_buy_negotiation_remark" name="bike_buy_negotiation_remark" rows="3"></textarea>

                                    <label for="bike_buy_agreed_bike_price">Agreed Bike Price</label>
                                    <input class="form-control" type="number" id="bike_buy_agreed_bike_price" name="bike_buy_agreed_bike_price" value="{{ $bike_buy->bike_buy_final_price ?? '' }}" readonly>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"><br>Consider for Advance</label>
                                        <div class="col-sm-4">
                                            <div class="form-radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="consider_for_advance" id="advance1" value="Yes">
                                                Yes
                                            <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-radio">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="consider_for_advance" id="advance0" value="No">
                                                No
                                            <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <center><button type="submit" id="ClientAgreeSubmit" class="btn btn-info">Submit</button></center>
                            </form>


                            {{-- <center><button type="button" class="btn btn-info btn-sm" onclick="clientAgree()">Client Agree</button></center> --}}

                            <!-- clientAgree Modal Start -->
                            {{-- <div class="modal fade" id="client_agree" tabindex="-1" role="dialog" aria-labelledby="clientAgree-2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="POST" action="{{ route('collectionpoint.client_agree') }}">
                                            @csrf
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="clientAgree-2">Client Agree</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <input class="form-control" type="hidden" name="bike_buy_request_id" id="bike_buy_request_id" value="{{ $bike_buy->id }}">
                                                <label for="bike_buy_negotiation_amount">Negotiation Amount</label>
                                                <input class="form-control" type="number" id="bike_buy_negotiation_amount" name="bike_buy_negotiation_amount">
    
                                                <label for="bike_buy_negotiation_remark">Negotiation Remarks</label>
                                                <textarea class="form-control" id="bike_buy_negotiation_remark" name="bike_buy_negotiation_remark" rows="3"></textarea>
    
                                                <label for="bike_buy_agreed_bike_price">Agreed Bike Price</label>
                                                <input class="form-control" type="number" id="bike_buy_agreed_bike_price" name="bike_buy_agreed_bike_price" value="{{ $bike_buy->bike_buy_final_price ?? '' }}" readonly>
    
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"><br>Client Agree</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="bike_buy_is_client_agree" id="client_agree0" value="Yes" required>
                                                            Yes
                                                        <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="bike_buy_is_client_agree" id="client_agree1" value="No" required>
                                                            No
                                                        <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"><br>Consider for Advance</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="consider_for_advance" id="advance1" value="Yes">
                                                            Yes
                                                        <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="consider_for_advance" id="advance0" value="No">
                                                            No
                                                        <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="ClientAgreeSubmit" class="btn btn-info">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- Modal Ends -->
                            
                        @elseif($bike_buy->bike_buy_is_client_agree == 'Yes')
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
                                <input type="text" class="form-control" id="bike_buy_agreed_bike_price" disabled value="Rs. {{ $bike_buy->bike_buy_agreed_bike_price ?? 'N/A' }} ">
                            </div>
                            <div class="form-group">
                                <label for="consider_for_advance">Consider for Advance</label>
                                <input type="text" class="form-control" disabled value="{{ $bike_buy->consider_for_advance ?? 'N/A' }} ">
                            </div>
                            <h4 class="card-title">Documents Information</h4>
                            @if ($bike_buy->bike_buy_documents_names == Null)
                                <center><button type="button" class="btn btn-info btn-sm" onclick="uploadDocuments()">Upload Documents</button></center>
                            @else
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
                                        <label for="bike_buy_doucments_remarks">Documents Remarks</label>
                                        <input type="text" class="form-control" id="bike_buy_doucments_remarks" disabled value="{{ $bike_buy->bike_buy_doucments_remarks ?? '' }} ">
                                    </div>
                                @endif

                                @if ($bike_buy->bike_buy_superadmin_remarks)
                                    <div class="form-group">
                                        <label for="bike_buy_superadmin_remarks">Documents Remarks (by superadmin)</label>
                                        <input type="text" class="form-control" id="bike_buy_superadmin_remarks" disabled value="{{ $bike_buy->bike_buy_superadmin_remarks ?? '' }} ">
                                    </div>
                                @endif
                                
                                @if ($bike_buy->bike_buy_is_all_document_found_physically == 'Yes')
                                    <div class="form-group">
                                        <label for="all_document_found_physically">All Document Found Physically</label>
                                        <input type="text" class="form-control" id="all_document_found_physically" disabled value="{{ $bike_buy->bike_buy_is_all_document_found_physically ?? '' }} ">
                                    </div>
                                @else
                                    <center><button type="button" class="btn btn-info btn-sm" onclick="uploadDocuments()">All Document Found Physically</button></center>
                                @endif
                                

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

                                <label id="invoiceInformation" for="acc_name">Passbook First Page / Cancelled Cheque Image</label>
                                <span class="pip">
                                    <a target="blank" href="{{asset('storage/'.optional($bike_buy->account_details)->pay_account_datail_account_detail_image)}}"><img class="imageThumb" src="{{asset('storage/'.optional($bike_buy->account_details)->pay_account_datail_account_detail_image)}}"></a>
                                </span><br><br>
                            @else
                                {{-- <div class="form-group">
                                    <label for="accounts_id">Account Details</label>
                                    <input type="text" class="form-control" disabled value="{{ 'Not Uploaded' }} ">
                                </div> --}}
                                <center><button type="button" class="btn btn-info btn-sm" onclick="uploadAccountDetails()">Upload Account Details</button></center>
                            @endif

                            <!-- document upload Modal Start -->
                            <div class="modal fade" id="documentsUpload" tabindex="-1" role="dialog" aria-labelledby="documentsUpload-2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="POST" action="{{ route('collectionpoint.documents_upload') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="documentsUpload-2">Bike Document</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <input class="form-control" type="hidden" name="bike_buy_request_id" id="bike_buy_request_id" value="{{ $bike_buy->id }}">
                                                @if ($bike_buy->bike_buy_uploaded_documents==Null)
                                                    <label for="bike_buy_upload_rc_book">RC Book</label>
                                                    <input id="bike_buy_upload_rc_book" class="form-control-file" type="file" name="bike_buy_upload_rc_book">
    
                                                    <label for="bike_buy_upload_aadhar_card">Aadhar Card</label>
                                                    <input id="bike_buy_upload_aadhar_card" class="form-control-file" type="file" name="bike_buy_upload_aadhar_card">
    
                                                    <label for="bike_buy_upload_form29_signed">Form 29 Signed</label>
                                                    <input id="bike_buy_upload_form29_signed" class="form-control-file" type="file" name="bike_buy_upload_form29_signed">

                                                    <label for="bike_buy_upload_pan_card">PAN Card</label>
                                                    <input id="bike_buy_upload_pan_card" class="form-control-file" type="file" name="bike_buy_upload_pan_card" >

                                                    <label for="bike_buy_upload_insurance">Insurance </label>
                                                    <input id="bike_buy_upload_insurance" class="form-control-file" type="file" name="bike_buy_upload_insurance" >

                                                    <label for="bike_buy_upload_form_30">Form 30 </label>
                                                    <input id="bike_buy_upload_form_30" class="form-control-file" type="file" name="bike_buy_upload_form_30" >

                                                    <label for="bike_buy_upload_bank_noc">Bank NOC</label>
                                                    <input id="bike_buy_upload_bank_noc" class="form-control-file" type="file" name="bike_buy_upload_bank_noc">
    
                                                    
                                                @else
                                                    <label for="aaa">All Document Found Physically</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="bike_buy_is_all_document_found_physically" id="bike_buy_is_all_document_found_physically" required>
                                                            <option value="">Select Status</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <label for="bike_buy_doucments_remarks">Documents Remarks</label>
                                                    <textarea class="form-control" id="bike_buy_doucments_remarks" name="bike_buy_doucments_remarks" rows="3">{{ $bike_buy->bike_buy_doucments_remarks }}</textarea>
                                                @endif
                                                
    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="documentsUploadSubmit" class="btn btn-info">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Ends -->

                            <!--  upload account details Modal Start -->
                            <div class="modal fade" id="uploadAccountDetails" tabindex="-1" role="dialog" aria-labelledby="uploadAccountDetails-2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form class="forms-sample" method="POST" action="{{ route('collectionpoint.account_details') }}" enctype="multipart/form-data">
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
                                                <input class="form-control" type="hidden" name="bike_buy_request_id" id="bike_buy_request_id" value="{{ $bike_buy->id }}">
    
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
                                <input type="text" class="form-control" id="bike_buy_is_client_agree" disabled value="{{ $bike_buy->bike_buy_is_client_agree ?? '' }} ">
                            </div>
                        @endif

                        @if ($bike_buy->bike_buy_request_status == 'paid')
                            <h4 class="card-title">Invoice Information</h4>
                            <center>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @if ($bike_buy->bike_buy_billing_details_id)
                                        <a button class="btn btn-success" href="{{route('collectionpoint.bike-buyed-invoice', $bike_buy->id)}}">Invoice</a>
                                    @else
                                        <button type="button" class="btn btn-success btn-sm" onclick="generateInvoice({{$bike_buy->id}})">Generate Invoice</button>
                                    @endif
        
                                    @if ($bike_buy->bike_buy_uploaded_purchase_invoice)
                                        <button type="button" class="btn btn-info btn-sm"><a href="{{ asset('storage/'.$bike_buy->bike_buy_uploaded_purchase_invoice) }}" download>
                                            <i style="width: 100%;height: 27px;" class="fa fa-fw fa-download"></i>
                                            </a>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-primary btn-sm" onclick="invoiceUpload({{$bike_buy->id}})">Upload Invoice</button>
                                    @endif
                                </div>
                            </center>
                            
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

        <!-- update reg no Modal Start -->
        <div class="modal fade" id="update_registration_no" tabindex="-1" role="dialog" aria-labelledby="update_registration_no-2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="forms-sample" method="POST" action="{{ route('collectionpoint.documents_upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="update_registration_no-2">Update Registration Number</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type="hidden" name="bike_buy_request_id" value="{{ $bike_buy->id }}">

                            <label for="bike_buy_bike_buy_reg_no">Registration Number</label>
                            <input class="form-control" type="text" name="bike_buy_bike_buy_reg_no" id="bike_buy_bike_buy_reg_no" value="{{ $bike_buy->bike_buy_reg_no ?? 'N/A' }}">
                            

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="update_registration_no_Submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Ends -->

        <!-- invoice upload Modal Start -->
        <div class="modal fade" id="invoiceUploadId" tabindex="-1" role="dialog" aria-labelledby="invoiceUpload-2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" class="forms-sample" action="{{ route('collectionpoint.bike-buyed-invoice-upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="invoiceUpload-2">Purchase Invoice Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" type="hidden" name=" bike_buy_requests_id" id="bookingId">  
                        
                        {{-- <label for="bike_buy_uploaded_purchase_invoice">Invoice</label> --}}
                        <input id="bike_buy_uploaded_purchase_invoice" class="form-control-file" type="file" name="bike_buy_uploaded_purchase_invoice" required>

                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Upload</button>
                    
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Modal Ends -->

        <!-- generate Invoice  Modal Start -->
        <div class="modal fade" id="generateInvoiceModel" tabindex="-1" role="dialog" aria-labelledby="generateInvoiceModel-2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form method="POST" class="forms-sample" action="{{ route('collectionpoint.bike-buyed-invoice-generate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="generateInvoiceModel-2">Customer Billing Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" type="hidden" name=" bike_buy_requests_id" id="InvoicebookingId">  
                        
                        <label for="billing_full_name">Name</label>
                        <input id="billing_full_name" class="form-control" type="text" name="billing_full_name" value="{{ $bike_buy->customer->user_first_name ?? ''}} {{ $bike_buy->customer->user_last_name ?? ''}}">

                        <label for="billing_email">Email</label>
                        <input id="billing_email" class="form-control" type="email" name="billing_email" value="{{ $bike_buy->customer->email ?? ''}}">

                        <label for="billing_phone_no">Phone No</label>
                        <input id="billing_phone_no" class="form-control" type="number" name="billing_phone_no" value="{{ $bike_buy->customer->phone ?? ''}}">

                        <label for="billing_address1">Address 1</label>
                        <input id="billing_address1" class="form-control" type="text" name="billing_address1" value="{{ $bike_buy->customer->user_locality ?? ''}}">

                        <label for="billing_address2">Address 2</label>
                        <input id="billing_address2" class="form-control" type="text" name="billing_address2" value="{{ $bike_buy->customer->user_city ?? ''}} ,{{ $bike_buy->customer->user_pincode ?? ''}}">

                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Generate Invoice</button>
                    
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Modal Ends -->

    </div>
@endsection
@push('scripts')
    <script>
        // function clientAgree(){
        //     $('#client_agree').modal('show');

        //     var bike_buy_agreed_bike_price = "{{ $bike_buy->bike_buy_final_price }}";

        //     $("#bike_buy_negotiation_amount").keyup(function(){
        //         var negotiation_amount = $('[name="bike_buy_negotiation_amount"]').val();
        //         var agreed_bike_price = +bike_buy_agreed_bike_price + +negotiation_amount;
        //         $('#bike_buy_agreed_bike_price').val(agreed_bike_price);
        //         if(negotiation_amount==''){
        //             $('#bike_buy_negotiation_remark').prop('required',false);
        //         }else{
        //             $('#bike_buy_negotiation_remark').prop('required',true);
        //         }
        //     });
        // }

        $("input:radio[name='bike_buy_is_client_agree']").change(function(){
                var client_agree = $(this).val();
                console.log(client_agree);
                if(client_agree == 'Yes'){
                    var bike_buy_agreed_bike_price = "{{ $bike_buy->bike_buy_final_price }}";
                    $("#bike_buy_negotiation_amount").keyup(function(){
                        var negotiation_amount = $('[name="bike_buy_negotiation_amount"]').val();
                        var agreed_bike_price = +bike_buy_agreed_bike_price + +negotiation_amount;
                        $('#bike_buy_agreed_bike_price').val(agreed_bike_price);
                        if(negotiation_amount==''){
                            $('#bike_buy_negotiation_remark').prop('required',false);
                        }else{
                            $('#bike_buy_negotiation_remark').prop('required',true);
                        }
                    });
                    $('#showNegotiation').show();
                }else{
                    $('#showNegotiation').hide();
                }
        });

        function uploadDocuments(){
            $('#documentsUpload').modal('show');
        }

        function uploadRegistrationNoU(){
            $('#update_registration_no').modal('show');
        }

        function uploadAccountDetails(){
            $('#uploadAccountDetails').modal('show');
        }
        
    </script>
     <script>
        function invoiceUpload(id){
            $('#invoiceUploadId').modal('show');
            $('#bookingId').val(id);
        }

        function generateInvoice(id){
            $('#generateInvoiceModel').modal('show');
            $('#InvoicebookingId').val(id);
        }
    </script>
@endpush