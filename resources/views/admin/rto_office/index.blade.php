@extends('admin.layout')
@section('title', 'Rto office List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">RTO Office List</h4>
        <a href="{{route('admin.rto-office.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New RTO Office</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$rtoOffice->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Contact No</th>
                        <th>City</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rtoOffice as $office)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $office->rto_office_name ?? 'N/A' }}</td>
                            <td>{{ $office->rto_office_location ?? 'N/A'}}</td>
                            <td>{{ $office->rto_contact_no ?? 'N/A' }}</td>
                            <td>{{ $office->city->city_name ?? 'N/A' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-success" href="{{route('admin.rto-office.edit', $office->id)}}">Edit</a>
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
            <p class="alert alert-info">No RTO office found.....</p>
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