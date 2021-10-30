@extends('shop.layout')
@section('title', 'Appointment Cancelled')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Appointment Cancelled</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$expireBooking->isEmpty())
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
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expireBooking as $expireBook)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $expireBook->customer->user_first_name ?? 'N/A' }} {{ $expireBook->customer->user_last_name ?? '' }}</td>
                            <td>{{ $expireBook->bike_sells->bike_name ?? 'N/A' }}</td>
                            <td>
                                {{-- Rs. {{ $expireBook->payments->payments_amount ?? 'N/A' }} --}}
                                <?php $amount = 0; ?>
                                @foreach ($expireBook->payment as $item)
                                   <?php $amount += $item->payments_amount ; 
                                    $amount = 0+$amount;
                                   ?>
                                @endforeach
                                Rs. {{ $amount }}
                            </td>
                            <td>Rs. {{ $expireBook->total_amount ?? 'N/A' }}</td>
                            <td>Rs. {{ $expireBook->remaining_amount ?? 'N/A' }}</td>
                            <td>
                                {{ $expireBook->appointments->appointments_date ?? 'N/A' }} & {{ $expireBook->appointments->appointments_time ?? '' }}                     
                            </td>

                            {{-- <td><a button class="btn btn-outline-primary" href="{{route('shop.appointment.show', $expireBook->id)}}">Details</a></td>                                  --}}
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">No Appointment Cancelled.....</p>
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