@extends('admin.layout')
@section('title', 'RTO Insurance Fees List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">RTO Insurance Fees List</h4>
        {{-- <a href="{{route('admin.rto-insurance-fees.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New RTO Insurance Fees</a><br><br> --}}
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$rtoInsurances->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Wheeler Type</th>
                        <th>Is CNG</th>
                        <th>CNG Fees</th>                        
                        <th>Wheeler CC From</th>
                        <th>Wheeler CC To</th>
                        <th>Fees Amount</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rtoInsurances as $rtoInsurance)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rtoInsurance->insurance_fees_wheeler == 'two_wheelers' ? 'Two Wheeler' : 'Four Wheeler' }}</td>
                            <td>
                                @if ($rtoInsurance->insurance_fees_is_cng == 0)
                                    {{ 'No' }}
                                @else
                                    {{ 'Yes' }}
                                @endif
                            </td>
                            <td>{{ $rtoInsurance->insurance_fees_cng_fees ?? 'N/A'}}</td>
                            <td>{{ $rtoInsurance->insurance_fees_cc_from ?? 'N/A' }}</td>
                            <td>{{ $rtoInsurance->insurance_fees_cc_to ?? 'N/A' }}</td>
                            <td>{{ $rtoInsurance->insurance_fees_amount ?? 'N/A' }}</td>
                            <td>{{ $rtoInsurance->insurance_fees_total_amount ?? 'N/A' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-success" href="{{route('admin.rto-insurance-fees.edit', $rtoInsurance->id)}}">Edit</a>
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
            <p class="alert alert-info">No RTO Insurance Fees Found.....</p>
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