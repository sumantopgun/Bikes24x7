@extends('superadmin.layout')
@section('title', 'Application Details')
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
                    <h4 class="card-title">RTO Office Information</h4>
                    <div class="form-group">
                        <label for="rto_office_name">Office Name</label>
                        <input type="text" class="form-control" id="rto_office_name" disabled value="{{ $application->rto_office->rto_office_name ?? 'N/A' }}">
                    </div>
                    <div class="form-group">
                        <label for="rto_office_location">Office Location</label>
                        <input type="text" class="form-control" id="rto_office_location" disabled value="{{ $application->rto_office->rto_office_location ?? 'N/A' }} ">
                    </div>
                    <div class="form-group">
                        <label for="rto_contact_no">Contact No.</label>
                        <input type="text" class="form-control" id="rto_office_location" disabled value="{{ $application->rto_office->rto_contact_no ?? 'N/A' }} ">
                    </div>

                    <h4 class="card-title">Customer Information</h4>
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" disabled value="{{ $application->customer->user_first_name ?? 'N/A' }} {{ $application->customer->user_last_name ?? '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_no">Contact No.</label>
                        <input type="text" class="form-control" id="contact_no" disabled value="{{ $application->customer->phone ?? 'N/A' }} ">
                    </div>

                    <div class="form-group">
                        <label for="customer_location">Customer Address</label>
                        <input type="text" class="form-control" id="customer_location" disabled value="{{ optional($application->customer)->user_locality .', '.optional($application->customer)->user_city.', '.optional($application->customer)->user_pincode }}">
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

                    <div class="form-group">
                        <label for="appointments_reschedule_id">Appointment Reschedule Date & Time</label>
                        @foreach ($application->rescheduleAppointments as $item)

                            <input type="text" class="form-control" id="appointments_reschedule_id" disabled value="{{ $item->appointments_date ?? 'N/A' }} & {{ $item->appointments_time ?? '' }}">
                            
                            
                        @endforeach
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
    </div>
@endsection
@push('scripts')

@endpush