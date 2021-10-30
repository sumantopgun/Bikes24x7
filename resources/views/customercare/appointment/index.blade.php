@extends('customercare.layout')
@section('title', 'Booking List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <style>
    i#eyePin {
        float: right;
        margin-top: -26px;
    }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Booking List</h4><br><br>
        {{-- Appointment --}}
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$activeBooking->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Customer Number</th>
                        <th>Bike Name</th>
                        <th>Booking Amount</th>
                        {{-- <th>Total Amount</th> --}}
                        {{-- <th>Remaining Amount</th> --}}
                        <th>Appointment Status</th>
                        <th>Appointment Date & Time</th>
                        <th>Remaining Day</th>
                        {{-- <th>Appointment Reschedule</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activeBooking as $activeBook)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $activeBook->customer->user_first_name ?? 'N/A' }} {{ $activeBook->customer->user_last_name ?? '' }}</td>
                            <td>{{ $activeBook->customer->phone ?? 'N/A' }}</td>
                            <td>{{ $activeBook->bike_sells->bike_name ?? 'N/A' }}</td>
                            <td>Rs. {{ $activeBook->payments->payments_amount ?? 'N/A' }}</td>
                            {{-- <td>
                                ?php $amount = 0; ?
                                @foreach ($activeBook->payment as $item)
                                   ?php $amount += $item->payments_amount ; 
                                    $amount = 0+$amount;
                                   ?
                                @endforeach
                                Rs. {{ $amount }}
                            </td> --}}
                            {{-- <td>Rs. {{ $activeBook->total_amount ?? 'N/A' }}</td> --}}
                            {{-- <td>Rs. {{ $activeBook->remaining_amount ?? 'N/A' }}</td> --}}
                            <td>
                                {{ $activeBook->appointments->appointments_date ?? 'N/A' }} & {{ $activeBook->appointments->appointments_time ?? '' }}                     
                            </td>
                            <td>{{ $activeBook->appointments->appointment_status ?? 'N/A' }}</td>
                            <td>{{ today()->diffInDays($activeBook->created_at->add($dayAgo+1, 'day')->format('Y-m-d')) }}</td>
                            {{-- <td><a button class="btn btn-danger" href="{{ route('customercare.reschedule',$activeBook->id ) }}">Reschedule</a></td> --}}
                            {{-- <td><button type="button" class="btn btn-danger btn-sm" onclick="myReschedule({{$activeBook->id}})">Reschedule</button></td> --}}
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @if ($activeBook->appointments->appointments_reschedule)
                                        <a button class="btn btn-primary" href="{{route('customercare.rescheduleBooking', $activeBook->id)}}">Details</a>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm" onclick="bookingDetails({{$activeBook->id}})">Details</button>
                                    @endif
                                        
                                        <a button class="btn btn-info" href="{{route('customercare.notifyCustomer', $activeBook->id)}}">Notify customer</a>
                                </div>                                
                            </td>

                            {{-- <td><a button class="btn btn-outline-primary" href="{{route('customercare.appointment.show', $activeBook->id)}}">Details</a></td>                                  --}}
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            <!-- Modal Start -->
            <div class="modal fade" id="authorizationModalPin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('customercare.verifyauthorizationpin') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Booking Authorization Pin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="hidden" name="booking_request_id" id="bookingId">
                       
                        <input class="form-control" type="password" name="booking_authorization_pin" id="booking_authorization_pin" placeholder="Enter Authorization Pin" required> <i class="fa fa-eye-slash" aria-hidden="true" id="eyePin"></i>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        
                        </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Modal Ends -->
            </div>
        </div>
        @else
            <p class="alert alert-info">No Appointment Found.....</p>
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
        function bookingDetails(id){
            // alert(id);
            $('#authorizationModalPin').modal('show');
            $('#booking_authorization_pin').val('');
            $('#bookingId').val(id);
        }
        
        $('#eyePin').click(function(){
        if($(this).hasClass('fa-eye-slash')){
            
            $(this).removeClass('fa-eye-slash');
            
            $(this).addClass('fa-eye');
            
            $('#booking_authorization_pin').attr('type','text');
            
        }else{
            
            $(this).removeClass('fa-eye');
            
            $(this).addClass('fa-eye-slash');  
            
            $('#booking_authorization_pin').attr('type','password');
        }
    });
    </script>
@endpush