@extends('customer.layout')
@section('title', 'Order List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Order List</h4><br><br>
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
                        <th>Remaining Amount</th>
                        <th>Final Payment Date</th>
                        <th>Bike Status</th>
                        <th>Actions</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->bike_sells->bike_name ?? 'N/A' }}</td>
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
                                @forelse($order->payment->where('final_payment', 1) as $final)
                                    {{ $final->created_at ?? 'N/A' }}
                                @empty
                                    <p>N/A</p>
                                @endforelse                    
                            </td>

                            <td><div class="badge badge-success badge-fw">{{ $order->bike_sells->bike_sell_status ?? 'N/A' }}</div></td> 
                            
                            <td><a button class="btn btn-outline-primary" href="{{route('customer.orders.show', $order->id)}}">Details</a></td>
                            <td>
                                @if ($order->booking_requests_uploaded_invoice)
                                    <a href="{{ asset('storage/'.$order->booking_requests_uploaded_invoice) }}" download>
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
            <p class="alert alert-info">No Orders Found.....</p>
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