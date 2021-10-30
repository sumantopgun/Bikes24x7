@extends('customer.layout')
@section('title', 'Active Order List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Active Order List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @error ('remaining_amount')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        @if(!$activeBooking->isEmpty())
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
                            <th>Appointment Date & Time</th>
                            <th>Payment</th>
                            <th>Appointment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activeBooking as $activeBook)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $activeBook->bike_sells->bike_name ?? 'N/A' }}</td>
                                {{-- <td>Rs. {{ $activeBook->payments->payments_amount ?? 'N/A' }}</td> --}}
                                <td>
                                    <?php $amount = 0; ?>
                                    @foreach ($activeBook->payment as $item)
                                       <?php $amount += $item->payments_amount ; 
                                        $amount = 0+$amount;
                                       ?>
                                    @endforeach
                                    Rs. {{ $amount }}
                                </td>
                                <td>Rs. {{ $activeBook->total_amount ?? 'N/A' }}</td>
                                <td>Rs. {{ $activeBook->remaining_amount ?? 'N/A' }}</td>
                                <td>
                                    @if ($activeBook->booking_requests_appointment_id == Null)
                                    <?php $lastdate = $activeBook->created_at->add(3, 'day')->format('Y-m-d'); $today = today()->format('Y-m-d');
                                    ?>
                                  
                                        @if ($lastdate >= $today)
                                        <a href="{{ route('appointments',$activeBook->id ) }}" role="button" class="badge badge-info badge-fw">Book Appointment</a>
                                        @else
                                        <button role="button" class="badge badge-danger badge-fw">Appointment Expire</button>
                                        @endif
                                    
                                    @else
                                        {{ $activeBook->appointments->appointments_date ?? 'N/A' }} & {{ $activeBook->appointments->appointments_time ?? 'N/A' }}
                                    @endif                  
                                </td>

                                <td>
                                    @if ($activeBook->booking_requests_book_status == 'success')
                                        @if ($activeBook->remaining_amount == 0)
                                            <button type="button" class="btn btn-success btn-sm">Paid</button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm" onclick="payOnline({{$activeBook->id}})">Pay</button>
                                        @endif
                                    @else
                                        {{ 'Not Active' }}
                                    @endif
                                    
                                </td>
                                    

                                <td><div class="badge badge-success badge-fw">{{ $activeBook->appointments->appointment_status=='confirmed' ? 'Confirmed' : 'Not confirmed'}}</div></td> 
                                <td><a button class="btn btn-outline-primary" href="{{route('customer.orders.show', $activeBook->id)}}">Details</a></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
            <!-- Modal Start -->
            <div class="modal fade" id="payOnlineId" tabindex="-1" role="dialog" aria-labelledby="payOnline-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('customer.payonline') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="payOnline-2">Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="hidden" name="booking_request_id" id="bookingId">
                        <label for="remaining_amount">Remaining Amount</label>
                        <input class="form-control" type="number" id="remainingAmountId" name="remaining_amount" readonly>
                        <label for="remaining_amount">Pay Amount</label>
                        <input class="form-control" type="number" id="payAmount" name="pay_amount" placeholder="Enter Amount">
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Pay</button>
                        
                        </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Modal Ends -->
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No Active Orders Found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>
    <script>
        function payOnline(id){
            // alert(id);
            var remaining_amount = "{{ $activeBook->remaining_amount ?? 'N/A' }}";
            $('#payOnlineId').modal('show');
            $('#bookingId').val(id);
            $('#remainingAmountId').val(remaining_amount);

            $("#payAmount").keyup(function(){
                var payAmount = $('[name="pay_amount"]').val();
                var remaining = remaining_amount - payAmount;
                $('#remainingAmountId').val(remaining);
                // if( remaining <= remaining_amount ){
                //     $('#remainingAmountId').val(remaining);
                // }
            });
        }
    </script>
@endpush