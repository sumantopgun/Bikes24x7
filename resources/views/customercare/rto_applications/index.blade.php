@extends('customercare.layout')
@section('title', $title)
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
        <h4 class="card-title" style="text-align: center;">{{ $title ?? '' }}</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        {{-- @error ('remaining_amount')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror --}}
        @if(!$applications->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Customer Number</th>
                            <th>Application Name</th>
                            <th>Appointment Date & Time</th>
                            <th>Appointment Status</th>
                            <th>Application Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $application->customer->user_first_name ?? 'N/A' }} {{ $application->customer->user_last_name ?? '' }}</td>
                                <td>{{ $application->customer->phone ?? 'N/A' }}</td>                                
                                <td>{{ $application->rto_fee->rto_fees_application_name ?? 'N/A' }}</td>
                                <td>{{ $application->appointments->appointments_date ?? 'N/A' }} & {{ $application->appointments->appointments_time ?? 'N/A' }}</td>
                                <td>{{ $application->appointments->appointment_status=='confirmed' ? 'Confirmed' : 'Not confirmed'}}</td>
                                <td><div class="badge badge-success badge-fw">{{ $application->rto_applications_status ?? 'N/A' }}</div></td> 
                                {{-- <td><a button class="btn btn-outline-primary" href="{{route('customercare.rto-application.show', $application->id)}}">Details</a></td> --}}
                                <td><button type="button" class="btn btn-danger btn-sm" onclick="applicationDetails({{$application->id}})">Details</button></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>
            <!-- Modal Start -->
            <div class="modal fade" id="authorizationModalPin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('customercare.verify_authorization_application_pin') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Application Authorization Pin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="hidden" name="application_request_id" id="applicationId">
                        <input class="form-control" type="hidden" name="application_form_type" id="form_type" value="{{ $form_type }}">
                        <input class="form-control" type="password" name="rto_authorization_pin" id="rto_authorization_pin" placeholder="Enter Authorization Pin" required> <i class="fa fa-eye-slash" aria-hidden="true" id="eyePin"></i>
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
            <p class="alert alert-info">No application found.....</p>
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
        function applicationDetails(id){
            // alert(id);
            $('#authorizationModalPin').modal('show');
            $('#rto_authorization_pin').val('');
            $('#applicationId').val(id);
        }

        $('#eyePin').click(function(){
            if($(this).hasClass('fa-eye-slash')){
                
                $(this).removeClass('fa-eye-slash');
                
                $(this).addClass('fa-eye');
                
                $('#rto_authorization_pin').attr('type','text');
                
            }else{
                
                $(this).removeClass('fa-eye');
                
                $(this).addClass('fa-eye-slash');  
                
                $('#rto_authorization_pin').attr('type','password');
            }
        });
    </script>

@endpush