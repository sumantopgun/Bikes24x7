@extends('workshop_admin.layout')
@section('title', 'My Work List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">My Work List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$works->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Registration No.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($works as $work)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($work->bike_details)->brand_name.' '.optional($work->bike_details)->model_name.' '.optional($work->bike_details)->model_cc.' '.optional($work->bike_details)->bike_year }}</td>

                                <td>{{ $work->bike_buy_requests->bike_buy_reg_no ?? 'N/A' }}</td>
                                    
                                <td><a href="{{ route('workshop.bike-assigned.edit',$work->id) }}" type="button" class="btn btn-primary btn-sm">Work Details</a></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No work list found.....</p>
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