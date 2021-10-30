@extends('superadmin.layout')
@section('title', 'Rto Fees List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">RTO Fees List</h4>
        {{-- <a href="{{route('superadmin.rto-fees.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New RTO Fees</a><br><br> --}}
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$rtoFees->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Application Name</th>
                        {{-- <th>Application Type</th> --}}
                        <th>Vehicle Type</th>                        
                        <th>Fees Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rtoFees as $rtofee)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rtofee->rto_fees_application_name ?? 'N/A' }}</td>
                            {{-- <td>{{ $rtofee->rto_fees_application_type ?? 'N/A' }}</td> --}}
                            <td>{{ $rtofee->rto_fees_vehicle_type=='two_wheelers' ? 'Two Wheeler' : 'Four Wheeler'}}</td>
                            <td>{{ $rtofee->rto_fees_amount ?? 'N/A' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-success" href="{{route('superadmin.rto-fees.edit', $rtofee->id)}}">Edit</a>
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
            <p class="alert alert-info">No RTO Fees Found.....</p>
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