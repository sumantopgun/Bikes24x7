@extends('customercare.layout')
@section('title', 'Request List')
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
        <h4 class="card-title" style="text-align: center;">Request List</h4><br><br>
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
                        <th>Appointment Date & Time</th>
                        <th>Appointment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activeBooking as $active)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ optional($active->customer)->user_first_name.' '.optional($active->customer)->user_last_name }}</td>
                            <td>{{ optional($active->customer)->phone }}</td>
                            <td>{{ optional($active->sell_bike_details)->brand_name.' '.optional($active->sell_bike_details)->model_name.' '.optional($active->sell_bike_details)->model_cc.' '.optional($active->sell_bike_details)->bike_year }}</td>
                            <td>
                                {{ $active->appointments->appointments_date ?? 'N/A' }} & {{ $active->appointments->appointments_time ?? 'N/A' }}                  
                            </td>

                            <td>{{ $active->appointments->appointment_status=='confirmed' ? 'Confirmed' : 'Not confirmed'}}</td>

                            <td>
                                @if ($active->appointments->appointments_reschedule)
                                    <a button class="btn btn-primary" href="{{route('customercare.bike_buy_rescheduleBooking', $active->id)}}">Details</a>
                                @else
                                    <button type="button" class="btn btn-danger btn-sm" onclick="bookingDetails({{$active->id}})">Details</button>
                                @endif

                                <a button class="btn btn-info" href="{{route('customercare.bike_buy_notifyCustomer', $active->id)}}">Notify customer</a>
                                
                            </td>
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            <!-- Modal Start -->
            <div class="modal fade" id="authorizationModalPin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('customercare.verify_bike_buy_authorizationpin') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Booking Authorization Pin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="text" name="booking_request_id" id="bookingId" hidden>
                        <input class="form-control" type="password" name="request_authorization_pin" id="request_authorization_pin" placeholder="Enter Authorization Pin" required> <i class="fa fa-eye-slash" aria-hidden="true" id="eyePin"></i>
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
            <p class="alert alert-info">No appointment found.....</p>
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
            $('#request_authorization_pin').val('');
            $('#bookingId').val(id);
        }

        $('#eyePin').click(function(){
            if($(this).hasClass('fa-eye-slash')){
                
                $(this).removeClass('fa-eye-slash');
                
                $(this).addClass('fa-eye');
                
                $('#request_authorization_pin').attr('type','text');
                
            }else{
                
                $(this).removeClass('fa-eye');
                
                $(this).addClass('fa-eye-slash');  
                
                $('#request_authorization_pin').attr('type','password');
            }
        });
    </script>
@endpush