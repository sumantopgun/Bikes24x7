@extends('superadmin.layout')
@section('title', 'Bike Cancelled List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bike Cancelled List</h4><br><br>
        
        @if(!$orders->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Bike Name</th>
                        <th>Payment Amount</th>
                        <th>Total Amount</th>
                        <th>Remaining Amount</th>
                        <th>Appointment Date & Time</th>
                        <th>Bike Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->customer->user_first_name ?? 'N/A' }} {{ $order->customer->user_last_name ?? '' }}</td>
                            <td>{{ $order->bike_sells->bike_name ?? 'N/A' }}</td>
                            {{-- <td>Rs. {{ $order->payments->payments_amount ?? 'N/A' }}</td> --}}
                            <td>
                                <?php $amount = 0; ?>
                                @foreach ($order->payment as $item)
                                   <?php $amount += $item->payments_amount ; 
                                    $amount = 0+$amount;
                                   ?>
                                @endforeach
                                Rs. {{ $amount }}
                            </td>
                            <td>Rs. {{ $order->total_amount ?? 'N/A' }}</td>
                            <td>Rs. {{ $order->remaining_amount ?? 'N/A' }}</td>
                            <td>
                                {{ $order->appointments->appointments_date ?? 'N/A' }} & {{ $order->appointments->appointments_time ?? '' }}                     
                            </td>
                            <td><div class="badge badge-success badge-fw">{{ $order->bike_sells->bike_sell_status ?? 'N/A' }}</div></td> 
                            <td><a button class="btn btn-outline-primary" href="{{route('superadmin.bike-booked.show', $order->id)}}">Details</a></td>                                 
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">No products cancelled found.....</p>
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