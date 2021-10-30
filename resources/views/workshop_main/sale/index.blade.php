@extends('workshop_main.layout')
@section('title', 'Bike Sales List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bike Sales List</h4>
        <a href="{{route('workshop_main.sale.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Product</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$sales->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Bike Name</th>
                        <th>Model</th>
                        <th>Registration Date</th>
                        <th>Bike Price</th>
                        <th>Sale Price</th>
                        <th>Image</th>
                        <th>Gallery</th>
                        <th>Certified By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->bike_name }}</td>
                            <td>{{ $sale->models->model_name }}</td>
                            <td>{{ $sale->bike_reg_date }}</td>
                            <td>{{ $sale->bike_new_price }}</td>
                            <td>{{ $sale->bike_sell_price }}</td>
                            
                            <td>
                                <a href="{{asset('storage/'.$sale->bike_image)}}" target="blank"><img height="100" width="100" src="{{asset('storage/'.$sale->bike_image)}}" /></a>
                            </td>
                            <td>
                                <a button class="btn btn-primary" href="{{route('workshop_main.gallaryedit', $sale->id)}}">Edit Gallery</a>
                            </td>
                            <td>{{ $sale->bike_certified_by }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- <a button class="btn btn-outline-primary" href="#">View</a> --}}
                                    <a button class="btn btn-success" href="{{route('workshop_main.sale.edit', $sale->id)}}">Edit</a>
                                </div> 
                            </td>                                   
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">No products found.....</p>
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