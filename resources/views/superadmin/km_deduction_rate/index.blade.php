@extends('superadmin.layout')
@section('title', 'KM Deduction Rate List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">KM Deduction Rate List</h4>
        <a href="{{route('superadmin.km-deduction-rate.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Deduction Rate</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$DeductionRates->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>KM From</th>
                        <th>KM To</th>
                        <th>Deduction Rate (%)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DeductionRates as $DeductionRate)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $DeductionRate->km_deduction_km_from ?? 'N/A' }}</td>
                            <td>{{ $DeductionRate->km_deduction_km_to ?? 'N/A' }}</td>
                            <td>{{ $DeductionRate->km_deduction_rate ?? ''}}%</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-success" href="{{route('superadmin.km-deduction-rate.edit', $DeductionRate->id)}}">Edit</a>
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
            <p class="alert alert-info">No KM Deduction Rate Found.....</p>
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