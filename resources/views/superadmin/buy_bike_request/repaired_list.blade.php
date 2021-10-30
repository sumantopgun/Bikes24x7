@extends('superadmin.layout')
@section('title', 'Bike Repaired List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bike Repaired List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$repairs->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Registration Number</th>
                            <th>Category</th>
                            <th>Bike Model / CC</th>
                            <th>Registration Date</th>
                            <th>Assigned Shop Name</th>
                            <th>Workshop Name</th>
                            {{-- <th>Total Working Cost</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repairs as $repair)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($repair->bike_sells_details)->bike_name }}</td>
                                <td>{{ optional($repair->bike_sells_details)->bike_regn_no }}</td>
                                @php
                                    $model_id = $repair->bike_sells_details->model_id;
                                    $model = 'App\BikeModel'::with('categories')->where('id',$model_id)->first();
                                @endphp
                                <td>{{ $model->categories->category_name ?? '' }}</td>
                                <td>{{ $model->model_name ?? '' }} / {{ $model->model_cc ?? '' }}</td>

                                <td>{{ optional($repair->bike_sells_details)->bike_reg_date }}</td>
                                <td>{{ optional($repair->shop_details)->shop_name }}</td>
                                <td>{{ optional($repair->workshop_details)->shop_name }}</td>
                                {{-- <td>{{ $repair->workshop_works_cost->bike_inspection_total_deductions ?? 'N/A' }}</td> --}}
                                    
                                
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No repair bike list found.....</p>
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