@extends('superadmin.layout')
@section('title', 'Bike Cancelled List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bike Cancelled List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$cancelledList->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Registration Number</th>
                            <th>Estimated Price</th>
                            <th>Buying Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cancelledList as $cancelled)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($cancelled->sell_bike_details)->brand_name.' '.optional($cancelled->sell_bike_details)->model_name.' '.optional($cancelled->sell_bike_details)->model_cc.' '.optional($cancelled->sell_bike_details)->bike_year }}</td>
                                <td>{{ $cancelled->bike_buy_reg_no ?? 'N/A' }}</td>
                                <td>Rs. {{ $cancelled->bike_buy_estimated_price ?? 'N/A' }}</td>
                                <td>{{ $cancelled->bike_buy_request_status ?? 'N/A' }}</td>
                            
                                    
                                <td><a button class="btn btn-outline-primary" href="{{route('superadmin.bike-buy-request.show', $cancelled->id)}}">Details</a></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No bike cancelled list found.....</p>
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