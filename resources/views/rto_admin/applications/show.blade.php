@extends('rto_admin.layout')
@section('title', 'Application Details')
@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
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
    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }
    .remove:hover {
        background: white;
        color: black;
    }
    select#model_id {
        font-family: 'FontAwesome', 'sans-serif';
    }
    div#loading img {
        height: 100px;
    }
    div#spinner img {
        height: 100px;
    }
</style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Uploaded Documents</h4>
                        @if ($docs)
                            @foreach ($docs as $key=>$item)
                                @php 
                                    $name = $doc_names[$key];
                                    $extension = strrchr($item, '.');
                                @endphp
                                @if ($extension == '.pdf')
                                    <span class="pip">
                                        <a target="blank" href="{{asset('storage/'.$item)}}"><img class="imageThumb" src="{{asset('custom/pdf.png')}}" title="{{ $name }}"></a>
                                        <p>{{$name}}</p>
                                    </span>
                                @else
                                    <span class="pip">
                                        <a target="blank" href="{{asset('storage/'.$item)}}"><img class="imageThumb" src="{{asset('storage/'.$item)}}" title="{{ $name }}"></a>
                                        <p>{{$name}}</p>
                                    </span>
                                @endif
                            @endforeach
                        @endif
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">Application Status</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Status" disabled value="{{ $application->rto_applications_status ?? 'N/A' }}">
                            </div>
                        </div>
                        @if ($application->rto_applications_remarks!=Null)
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label">Reasons for cancelling</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="cancelling" disabled value="{{ $application->rto_applications_remarks ?? 'N/A' }}">
                                </div>
                            </div>
                        @endif
                        
                        <center>
                                {{-- <div class="badge badge-success badge-fw">{{ $application->rto_applications_status ?? 'N/A' }}</div> --}}
                            <div class="form-group btn-group" role="group" aria-label="Basic example">   
                                @if ($application->rto_applications_is_doc_valid == Null)
                                    <button type="button" class="btn btn-info btn-sm" onclick="documentsReceived({{$application->id}})">Documents Received?</button>
                                @elseif($application->rto_applications_status == 'Complete')

                                @elseif($application->rto_applications_status == 'Cancelled')
                                    
                                @else
                                    <button type="button" class="btn btn-primary btn-sm" onclick="statusUpdate({{$application->id}})">Update Status</button>
                                @endif 
                            </div> 
                        </center>
                    </div>
                </div>
                </div>
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h4 class="card-title">Customer Information</h4> --}}
                            <form class="forms-sample">
                                <h4 class="card-title">RTO Fees Information</h4>
                                <div class="form-group">
                                <label for="exampleInputEmail3">Application Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" disabled value="{{ $application->rto_fee->rto_fees_application_name ?? 'N/A' }}">
                                </div>
                                <div class="form-group">
                                    <label for="rto_fees_vehicle_type">Vehicle Type</label>
                                    <input type="text" class="form-control" id="offer_name" disabled value="{{ $application->rto_fee->rto_fees_vehicle_type == 'two_wheelers' ? 'Two Wheeler' : 'Four Wheeler' }}">
                                </div>
                                <div class="form-group">
                                    <label for="rto_fees_within_state">Within State</label>
                                    <input type="text" class="form-control" id="rto_fees_within_state" disabled value="{{ $application->rto_fee->rto_fees_within_state == '1' ? 'Yes' : 'No' }}">
                                </div>
                                <div class="form-group">
                                    <label for="rto_applications_application_fees">Fees Amount</label>
                                    <input type="number" class="form-control" id="rto_applications_application_fees" disabled value="{{ $application->rto_applications_application_fees ?? '' }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customer Information</h4>
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" disabled value="{{ $application->customer->user_first_name ?? 'N/A' }} {{ $application->customer->user_last_name ?? '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="rto_contact_no">Contact No.</label>
                        <input type="text" class="form-control" id="rto_office_location" disabled value="{{ $application->customer->phone ?? 'N/A' }} ">
                    </div>

                    <div class="form-group">
                        <label for="rto_office_location">Customer Address</label>
                        <input type="text" class="form-control" id="rto_office_location" disabled value="{{ optional($application->customer)->user_locality .', '.optional($application->customer)->user_city.', '.optional($application->customer)->user_pincode }}">
                    </div>

                    <h4 class="card-title">Insurance Information</h4>
                    @if ($application->rto_applications_is_insurance == 1)
                        <div class="form-group">
                            <label>Is Insurance</label>
                            <input type="text" class="form-control" disabled value="{{ 'Yes' }}">
                        </div>
                    @else
                        <div class="form-group">
                            <label>Is Insurance</label>
                            <input type="text" class="form-control" disabled value="{{ 'No' }}">
                        </div>
                        <div class="form-group">
                            <label>Insurance</label>
                            <input type="text" class="form-control" disabled value="{{ $application->insurance->insurance_fees_wheeler=='two_wheelers' ? 'Two Wheeler' : 'Four Wheeler'}}, CC From : {{$application->insurance->insurance_fees_cc_from}} To {{$application->insurance->insurance_fees_cc_to}},{{ $application->insurance->insurance_fees_is_cng=='1' ? 'CNG : Yes' : 'CNG : No'}}, Total Price : {{$application->rto_applications_insurance_amount}}">
                        </div>
                    @endif

                    <h4 class="card-title">Appointment Information</h4>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Date & Time</label>
                        <input type="text" class="form-control" id="appointments_date" disabled value="{{ $application->appointments->appointments_date ?? 'N/A' }} & {{ $application->appointments->appointments_time ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label for="appointments_date">Appointment Status</label>
                        <input type="text" class="form-control" id="appointments_status" disabled value="{{ $application->appointments->appointment_status ?? 'N/A' }} ">
                    </div>
                    <div class="form-group">
                        <label for="appointments_reschedule">Appointments Reschedule</label>
                        <?php $appointments_reschedule = $application->appointments->appointments_reschedule ?? 'N/A' ?>
                        @if ($appointments_reschedule == 1)
                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'Yes' }}">
                        @else
                            <input type="text" class="form-control" id="appointments_reschedule" disabled value="{{ 'No' }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="appointments_reschedule_id">Appointments Reschedule Name</label>
                        <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $application->reschedule->user_first_name ?? '' }} {{ $application->reschedule->user_last_name ?? 'N/A' }}">
                    </div>

                    <div class="form-group" id="invoiceInformation">
                        <label for="appointments_reschedule_id">Appointment Reschedule Date & Time</label>
                        @foreach ($application->rescheduleAppointments as $item)

                            <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $item->appointments_date ?? 'N/A' }} & {{ $item->appointments_time ?? '' }}">
                            
                            
                        @endforeach
                        {{-- <input type="text" class="form-control" id="appointments_reschedule2_id" disabled value="{{ 'N/A' }}"> --}}
                    </div>

                    @if ($application->rto_applications_status == 'Complete')
                    <h4 class="card-title">Invoice Information</h4>
                    <center>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            @if ($application->rto_applications_billing_details_id)
                                <a button class="btn btn-success" href="{{route('rtoadmin.rto-application-invoice', $application->id)}}">Invoice</a>
                            @else
                                <button type="button" class="btn btn-success btn-sm" onclick="generateInvoice({{$application->id}})">Generate Invoice</button>
                            @endif

                            @if ($application->rto_applications_uploaded_invoice)
                                {{-- <i class="fa fa-download"></i> --}}
                                <button type="button" class="btn btn-info btn-sm"><a href="{{ asset('storage/'.$application->rto_applications_uploaded_invoice) }}" download>
                                    <i style="width: 100%;height: 27px;" class="fa fa-fw fa-download"></i>
                                </a></button>
                                
                            @else
                                <button type="button" class="btn btn-info btn-sm" onclick="invoiceUpload({{$application->id}})">Upload Invoice</button>
                            @endif
                        </div>
                    </center>
                    @endif
                    
                    
                </div>
            </div>
        </div>
        </div>
        <!-- Authorization Modal Start -->
        <div class="modal fade" id="authorizationModalPin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                    
                {{-- <form method="POST" class="forms-sample" action="{{ route('customercare.verify_authorization_application_pin') }}"> --}}
                    @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Application Authorization Pin</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="alert alert-success" role="alert" id="errormsg" style="display: none;">
                    </div>
                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="application_request_id" id="applicationId">
                    <input class="form-control" type="password" name="rto_authorization_pin" id="rto_authorization_pin" placeholder="Enter Authorization Pin" required>
                    <center>
                        <div id="spinner" style="display:none;">
                            <p><img src="{{asset('custom/ZZ5H.gif')}}" /></p>
                        </div>
                    </center>
                    </div>
                    
                    <div class="modal-footer">
                    <button type="submit" id="pinCheck" class="btn btn-success">Submit</button>
                    
                    </div>
                {{-- </form> --}}
              </div>
            </div>
          </div>
          <!--  Authorization Modal Ends -->

          <!-- application status update Modal Start -->
        <div class="modal fade" id="applicationStatusUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                    
                {{-- <form method="POST" class="forms-sample" action="{{ route('customercare.verify_authorization_application_pin') }}"> --}}
                    @csrf
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Application Status Update</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="alert alert-success" role="alert" id="errormsgNext" style="display: none;">
                    </div>
                    <div class="modal-body">
                    <input class="form-control" type="hidden" name="application_request_id" id="applicationIdStatus">
                    <div class="form-group">
                        <select class="form-control" name="status_update" id="status_update" required>
                            <option value="">Update Status</option>
                            <option value="Processing">Processing</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Complete">Complete</option>
                        </select>
                    </div>
                    <div class="form-group" style="display:none;" id="reasonsShow">
                        <input class="form-control" type="text" name="status_reasons" id="status_reasons" placeholder="Reasons for cancelling">
                    </div>
                    <center>
                        <div id="loading" style="display:none;">
                            <p><img src="{{asset('custom/ZZ5H.gif')}}" /></p>
                        </div>
                    </center>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" id="applicationStatusSubmit" class="btn btn-success">Submit</button>
                    
                    </div>
                {{-- </form> --}}
              </div>
            </div>
          </div>
          <!--  application status update Modal Ends -->
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Transaction Details</h4>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rto_applications_total_amount" disabled value="Rs. {{ $application->rto_applications_total_amount ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Total Payments</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="rto_applications_paid_amount" disabled value="Rs. {{ $application->rto_applications_paid_amount ?? ''}}">
                        </div>
                    </div>
                    {{-- @foreach ($order->payment->where('final_payment', 1) as $final) --}}
                        <div class="form-group row">
                            <label for="final_payment" class="col-sm-3 col-form-label">Payment Date</label>                        
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="final_payment" disabled value="{{ $application->payment->created_at ?? 'N/A' }}">
                            </div>
                        </div>
                    {{-- @endforeach --}}
                    
                    <div class="table-responsive">
                    <table class="table mt-3 border-top">
                        <thead>
                        <tr>
                            <th>Payments Type</th>
                            <th>Payments Id</th>
                            <th>Payments Amount</th>
                            <th>Payments Mode</th>
                            <th>Payments Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach ($order->payment->sortBy('created_at') as $paymentInfo) --}}
                            <tr>
                                <td>{{ $application->payment->payments_type ?? 'N/A' }}</td>
                                <td>{{ $application->payment->payments_reference_id ?? 'N/A' }}</td>
                                <td>Rs. {{ $application->payment->payments_amount ?? 'N/A' }}</td>
                                <td>{{ $application->payment->payments_mode ?? 'N/A' }}</td>
                                <td><div class="badge badge-success badge-fw">{{ $application->payment->created_at ?? 'N/A' }}</div></td>
                            </tr>
                        {{-- @endforeach    --}}
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
            
            <!-- Modal Start -->
            <div class="modal fade" id="invoiceUploadId" tabindex="-1" role="dialog" aria-labelledby="invoiceUpload-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('rtoadmin.rto-application-invoice-upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="invoiceUpload-2">RTO Invoice Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type="hidden" name=" rto_applications_id" id="invoiceApplicationId">  
                            
                            {{-- <label for="rto_applications_uploaded_invoice">Invoice</label> --}}
                            <input id="rto_applications_uploaded_invoice" class="form-control-file" type="file" name="rto_applications_uploaded_invoice" required>

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
                    <form method="POST" class="forms-sample" action="{{ route('rtoadmin.rto-application-invoice-generate') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="generateInvoiceModel-2">Customer Billing Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type="hidden" name=" rto_applications_id" id="rtoApplicationId">  
                            
                            <label for="billing_full_name">Name</label>
                            <input id="billing_full_name" class="form-control" type="text" name="billing_full_name" value="{{ $application->customer->user_first_name ?? ''}} {{ $application->customer->user_last_name ?? ''}}" required>

                            <label for="billing_email">Email</label>
                            <input id="billing_email" class="form-control" type="email" name="billing_email" value="{{ $application->customer->email ?? ''}}" required>

                            <label for="billing_phone_no">Phone No</label>
                            <input id="billing_phone_no" class="form-control" type="number" name="billing_phone_no" value="{{ $application->customer->phone ?? ''}}" required>

                            <label for="billing_address">Billing Address</label>
                            <input id="billing_address" class="form-control" type="text" name="billing_address" value="{{ optional($application->customer)->user_locality .', '.optional($application->customer)->user_city.', '.optional($application->customer)->user_pincode }}" required>

                            <label for="registration_no">Registration No.</label>
                            <input id="registration_no" class="form-control" type="text" name="registration_no" required>

                            <label for="rto_service">RTO Service</label>
                            <input id="rto_service" class="form-control" type="text" name="rto_service" value="{{ $application->rto_fee->rto_fees_application_name ?? '' }}" required>

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
<!-- Sweetalert-->    
<script src="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('admin_template/node_modules/jquery.avgrund/jquery.avgrund.min.js')}}"></script>
<script src="{{ asset('admin_template/js/alerts.js')}}"></script>
<script src="{{ asset('admin_template/js/avgrund.js')}}"></script>
<!-- End Sweetalert-->
    <script>
        function documentsReceived(id){
            $('#authorizationModalPin').modal('show');
            $('#applicationId').val(id);
        }
        function statusUpdate(id){
            $('#applicationStatusUpdate').modal('show');
            $('#applicationIdStatus').val(id);
        }
        // status Cancelled reasons
        $("#status_update").change(function(){
            var status = $('[name="status_update"]').val();
            if(status=='Cancelled'){
                $('#status_reasons').prop('required',true);
                $('#reasonsShow').show();
            }else{
                $('#status_reasons').prop('required',false);
                $('#reasonsShow').hide();
            }
        });
    </script>
    <script>
        $(function () {
            // for document received by rto admin
            $('#pinCheck').click(function(){
                $('#spinner').show();
                var application_request_id = $('#applicationId').val();
                var rto_authorization_pin = $('#rto_authorization_pin').val();
                var token = $('[name="_token"]').val();
                $.ajax({
                    method: 'get',
                    url: '{{ route('rtoadmin.documents_received') }}',
                    data:{
                        _token:token,
                        rto_authorization_pin:rto_authorization_pin,
                        application_request_id:application_request_id,
                    },
                    success: function (response) {
                        var result = JSON.parse(response);
                        if(result.status == 200 ){
                            $('#spinner').hide();
                            console.log(result);
                            localStorage.setItem("swal",swal({ title:"Good job!", 
                                   text:"Ok",
                                   type:"success",
                                   showConfirmButton: true
                                  }).then(function(){
                                      window.location.reload();
                                  })
                            );
                            localStorage.getItem("swal")
                            // location.reload();
                        }else{
                            $('#errormsg').text(result.msg).show();
                            $('#spinner').hide();
                        }
                        
                    }
                });
            })

            // for application status update by rto admin
            $('#applicationStatusSubmit').click(function(){                
                $('#loading').show();
                var application_request_id = $('#applicationIdStatus').val();
                var application_status = $('#status_update').val();
                var status_reasons = $('#status_reasons').val();
                var token = $('[name="_token"]').val();
                $.ajax({
                    method: 'get',
                    url: '{{ route('rtoadmin.application_status_change') }}',
                    data:{
                        _token:token,
                        application_status:application_status,
                        application_request_id:application_request_id,
                        status_reasons:status_reasons,
                    },
                    success: function (response) {
                        console.log(response);
                        var result = JSON.parse(response);
                        if(result.status == 200 ){
                            $('#loading').hide();
                            console.log(result);
                            localStorage.setItem("swal",swal({ title:"Good job!", 
                                   text:"Status Updated",
                                   type:"success",
                                   showConfirmButton: true
                                  }).then(function(){
                                      window.location.reload();
                                  })
                            );
                            localStorage.getItem("swal")
                        }else{
                            $('#errormsgNext').text(result.msg).show();
                            $('#loading').hide();
                        }
                        
                    }
                });
            })
        });
        
    </script>
    <script>
        function invoiceUpload(id){
            $('#invoiceUploadId').modal('show');
            $('#invoiceApplicationId').val(id);
        }

        function generateInvoice(id){
            $('#generateInvoiceModel').modal('show');
            $('#rtoApplicationId').val(id);
        }

    </script>
@endpush