@extends('superadmin.layout')
@section('title', 'Booking Refund List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Booking Refund List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        
        @if(!$refunds->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Bike Name</th>
                        <th>Shop Name</th>
                        <th>Booking Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($refunds as $refund)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $refund->customer->user_first_name ?? 'N/A' }} {{ $refund->customer->user_last_name ?? '' }}</td>
                            <td>{{ $refund->bike_sells->bike_name ?? 'N/A' }}</td>
                            <td>{{ $refund->shopName->shop_name ?? 'N/A' }}</td>
                            <td>Rs. {{ $refund->refund_amount ?? 'N/A' }}</td>
                            <td><div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-danger btn-sm" onclick="repayCnf({{$refund->id}})">Refund</button>
                                <a button class="btn btn-success" href="{{ route('superadmin.refunddetails', $refund->id) }}">Details</a>
                            </div></td>                          
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">Refund list not found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>

    <script src="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/jquery.avgrund/jquery.avgrund.min.js')}}"></script>

    <script>
        function repayCnf(id){
            // alert(id);
            swal({
                title: 'Are you sure?',
                // text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then(function () {
                window.location = "./refund-process/"+id;         
            })
        }
    </script>

@endpush