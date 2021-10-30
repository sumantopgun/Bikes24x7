@extends('seller.layout')
@section('title', 'Inventory List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Inventory List</h4><br><br>

        @if(!$inventoryLists->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Image</th>
                            <th>Bike Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventoryLists as $inventory)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $inventory->bike_name ?? '' }}</td>
                                <td><a href="{{asset('storage/'.$inventory->bike_image)}}" target="blank"><img height="100" width="100" src="{{asset('storage/'.$inventory->bike_image)}}" /></a></td>
                                <td><div class="badge badge-success badge-fw">{{ $inventory->bike_sell_status ?? 'N/A' }}</div></td> 
                                <td><a button class="btn btn-outline-primary" href="{{ route('product-details', $inventory->id) }}">Details</a></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No inventory list found.....</p>
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