@extends('customer.layout')
@section('title', $title)
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">{{ $title ?? '' }}</h4><br><br>
        {{-- @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @error ('remaining_amount')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror --}}
        @if(!$applications->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Application Name</th>
                            <th>RTO Office Name</th>
                            <th>Total Payment</th>
                            <th>Status</th>
                            <th>Actions</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $application->rto_fee->rto_fees_application_name ?? 'N/A' }}</td>
                                <td>{{ $application->rto_office->rto_office_name ?? 'N/A' }}</td>
                                <td>Rs. {{ $application->rto_applications_paid_amount ?? 'N/A' }}</td>
                                <td><div class="badge badge-success badge-fw">{{ $application->rto_applications_status ?? 'N/A' }}</div></td> 
                                <td><a button class="btn btn-outline-primary" href="{{route('customer.rto-application.show', $application->id)}}">Details</a></td> 

                                <td>
                                    @if ($application->rto_applications_uploaded_invoice)
                                        <a href="{{ asset('storage/'.$application->rto_applications_uploaded_invoice) }}" download>
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
            <p class="alert alert-info">No application found.....</p>
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