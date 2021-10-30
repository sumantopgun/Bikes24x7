@extends('collection_point.layout')
@section('title', 'Cancelled List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Cancelled List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$bikecancelled->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Estimated Price</th>
                            <th>Appointment Date & Time</th>
                            <th>Buying Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bikecancelled as $cancelled)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($cancelled->sell_bike_details)->brand_name.' '.optional($cancelled->sell_bike_details)->model_name.' '.optional($cancelled->sell_bike_details)->model_cc.' '.optional($cancelled->sell_bike_details)->bike_year }}</td>
                                <td>Rs. {{ $cancelled->bike_buy_estimated_price ?? 'N/A' }}</td>
                                <td>
                                    @if ($cancelled->bike_buy_appointment_id == Null)
                                        {{-- <a href="{{ route('bike-sell-appointments',$cancelled->id ) }}" role="button" class="badge badge-info badge-fw">Book Appointment</a> --}}
                                    
                                    @else
                                        {{ $cancelled->appointments->appointments_date ?? 'N/A' }} & {{ $cancelled->appointments->appointments_time ?? 'N/A' }}
                                    @endif                  
                                </td>

                                <td>@if($cancelled->bike_buy_request_status == 'requested') {{ 'Requested' }} @elseif($cancelled->bike_buy_request_status == 'inspected') {{ 'Bike Inspected' }} @elseif($cancelled->bike_buy_request_status == 'doc_found') {{ 'Documents Found' }} @elseif($cancelled->bike_buy_request_status == 'account_details_requested') {{ 'Account Details Submitted' }} @elseif($cancelled->bike_buy_request_status == 'advance_paid') {{ 'Advance Paid' }} @elseif($cancelled->bike_buy_request_status == 'paid') {{ 'Paid' }} @endif</td>
                                    
                                <td><a button class="btn btn-outline-primary" href="{{route('collectionpoint.bike-buy.show', $cancelled->id)}}">Details</a></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No cancelled list found.....</p>
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