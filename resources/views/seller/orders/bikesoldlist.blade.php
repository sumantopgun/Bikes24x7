@extends('seller.layout')
@section('title', 'My Orders')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">My Orders</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$orders->isEmpty())
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
                        <th>Customer Phone No.</th>
                        <th>Bike Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $order->bike_sells->bike_name ?? 'N/A' }}</td>
                                {{-- <td>Rs. {{ $activeBook->payments->payments_amount ?? 'N/A' }}</td> --}}
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
                                <td>
                                    {{ $order->billingAddress->billing_phone_no ?? 'N/A' }}              
                                </td>
                                    

                                <td><div class="badge badge-success badge-fw">{{ $order->bike_sells->bike_sell_status ?? 'N/A' }}</div></td> 
                                <td><a button class="btn btn-outline-primary" href="{{route('seller.orders.show', $order->id)}}">Details</a></td>                                
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">No Products Found.....</p>
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