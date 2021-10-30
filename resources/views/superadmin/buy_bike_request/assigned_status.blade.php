@extends('superadmin.layout')
@section('title', 'Bike Assigned Status')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bike Assigned Status</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$assignedStatus->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Bike Registration no.</th>
                            <th>Is Bike Received Workshop</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignedStatus as $assigned)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($assigned->sell_bike_details)->brand_name.' '.optional($assigned->sell_bike_details)->model_name.' '.optional($assigned->sell_bike_details)->model_cc.' '.optional($assigned->sell_bike_details)->bike_year }}</td>

                                <td>{{ $assigned->bike_buy_reg_no ?? 'N/A' }}</td>
                                    
                                <td><button type="button" class="btn btn-primary btn-sm" >{{ $assigned->assigned_details->is_bike_received_workshop ?? 'No' }}</button></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No assigned status list found.....</p>
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