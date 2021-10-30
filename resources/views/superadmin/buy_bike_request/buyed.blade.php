@extends('superadmin.layout')
@section('title', 'Bikes Bought List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bikes Bought List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$bikeBuyed->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Buying Price</th>
                            <th>Registration Number</th>
                            <th>Total Amount Paid</th>
                            <th>Buying Status</th>
                            <th>Actions</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bikeBuyed as $buyed)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($buyed->sell_bike_details)->brand_name.' '.optional($buyed->sell_bike_details)->model_name.' '.optional($buyed->sell_bike_details)->model_cc.' '.optional($buyed->sell_bike_details)->bike_year }}</td>
                                <td>Rs. {{ $buyed->bike_buy_agreed_bike_price ?? 'N/A' }}</td>
                                <td>{{ $buyed->bike_buy_reg_no ?? 'N/A' }}</td>
                                <td>Rs. {{ $buyed->tatal_amount_paid ?? 'N/A' }}</td>

                                <td>@if($buyed->bike_buy_request_status == 'requested') {{ 'Requested' }} @elseif($buyed->bike_buy_request_status == 'inspected') {{ 'Bike Inspected' }} @elseif($buyed->bike_buy_request_status == 'doc_found') {{ 'Documents Found' }} @elseif($buyed->bike_buy_request_status == 'account_details_requested') {{ 'Account Details Submitted' }} @elseif($buyed->bike_buy_request_status == 'advance_paid') {{ 'Advance Paid' }} @elseif($buyed->bike_buy_request_status == 'paid') {{ 'Paid' }} @endif</td>
                                    
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a button class="btn btn-outline-primary" href="{{route('superadmin.bike-buy-request.show', $buyed->id)}}">Details</a>
                                    </div> 
                                </td>
                                <td>
                                    @if ($buyed->bike_buy_uploaded_purchase_invoice)
                                        <a href="{{ asset('storage/'.$buyed->bike_buy_uploaded_purchase_invoice) }}" download>
                                            <i style="width: 100%;height: 27px;" class="fa fa-fw fa-download"></i>
                                          </a>
                                    @else
                                        <button type="button" class="btn btn-primary btn-sm">N/A</button>
                                    @endif
                                </td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No Bikes Bought list found.....</p>
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