@extends('customer.layout')
@section('title', 'Cancelled Orders')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Cancelled Orders</h4><br><br>
        
        @if(!$cancelledlists->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Bike Name</th>
                        <th>Payment Amount</th>
                        <th>Total Amount</th>
                        <th>Remaining Amount</th>
                        <th>Refund Status</th>
                        <th>Bike Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cancelledlists as $order)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
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
                            <td>{{ $order->booking_requests_refund_status ?? 'N/A' }}</td>
                            <td><a button target="blank" href="{{route('product-details', $order->booking_requests_bike_id)}}" class="badge badge-success badge-fw">{{ $order->bike_sells->bike_sell_status ?? 'N/A' }}</a></td> 
                            
                            <td><a button class="btn btn-outline-primary" href="{{route('customer.orders.show', $order->id)}}">Details</a></td>                                
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">No Orders Cancelled Found.....</p>
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