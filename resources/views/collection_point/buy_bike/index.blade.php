@extends('collection_point.layout')
@section('title', 'Active Request List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Active Request List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$activeBooking->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Bike Name</th>
                            <th>Estimated Price</th>
                            <th>Appointment Date & Time</th>
                            <th>Buying Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activeBooking as $active)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($active->customer)->user_first_name.' '.optional($active->customer)->user_last_name }}</td>
                                
                                <td>{{ optional($active->sell_bike_details)->brand_name.' '.optional($active->sell_bike_details)->model_name.' '.optional($active->sell_bike_details)->model_cc.' '.optional($active->sell_bike_details)->bike_year }}</td>
                                <td>Rs. {{ $active->bike_buy_estimated_price ?? 'N/A' }}</td>
                                <td>
                                    @if ($active->bike_buy_appointment_id == Null)
                                        {{-- <a href="{{ route('bike-sell-appointments',$active->id ) }}" role="button" class="badge badge-info badge-fw">Book Appointment</a> --}}
                                    
                                    @else
                                        {{ $active->appointments->appointments_date ?? 'N/A' }} & {{ $active->appointments->appointments_time ?? 'N/A' }}
                                    @endif                  
                                </td>

                                <td>@if($active->bike_buy_request_status == 'requested') {{ 'Requested' }} @elseif($active->bike_buy_request_status == 'inspected') {{ 'Bike Inspected' }} @elseif($active->bike_buy_request_status == 'doc_found') {{ 'Documents Found' }} @elseif($active->bike_buy_request_status == 'account_details_requested') {{ 'Account Details Submitted' }} @elseif($active->bike_buy_request_status == 'advance_paid') {{ 'Advance Paid' }} @elseif($active->bike_buy_request_status == 'paid') {{ 'Paid' }} @endif</td>
                                    
                                <td><a button class="btn btn-outline-primary" href="{{route('collectionpoint.bike-buy.show', $active->id)}}">Details</a></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No active request list found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>
@endpush