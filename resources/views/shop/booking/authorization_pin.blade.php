@extends('shop.layout')
@section('title', 'Authorization Pin')
@push('style')
    <style>
        .row {
            display: block;
            flex-wrap: wrap;
            margin-right: -10px;
            margin-left: -10px;
        }
    </style>    
@endpush
@section('content')
    <div class="content-wrapper">
        <center><br>
        <div class="row">
            
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Booking Authorization Pin</h4>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="alert alert-success" id="errormsg" role="alert" style="display:none;">
                    </div>
                    {{-- <form method="POST" class="forms-sample" action="{{ route('shop.authorizationpin') }}"> --}}
                        @csrf
                        <div class="form-group">
                            {{-- <label for="pin">Pin</label> --}}
                            <br>
                            <input type="password" class="form-control" id="booking_authorization_pin" name="booking_authorization_pin" placeholder="Enter Authorization Pin" required>
                        </div>
                        @error('pin')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror
                        <br>

                        <button type="submit" id="bookingPin" class="btn btn-success mr-2">Submit</button>
                    {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </center>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin_template/js/file-upload.js')}}"></script>
    <script>
        $("#bookingPin").click(function(){
            var booking_authorization_pin = $('#booking_authorization_pin').val();
            var token = $('[name="_token"]').val();
            // console.log(booking_authorization_pin);
            $.ajax({
                method: 'get',
                url: '{{ route('shop.authorizationpin') }}',
                data:{
                    _token:token,
                    booking_authorization_pin:booking_authorization_pin,
                },
                success: function (response) {
                    var result = JSON.parse(response); 
                    // console.log(result);  
                    if(result.status == 200 ){
                        window.location = '{{ route('shop.booking_details') }}';   
                    }else{
                        $('#errormsg').text(result.msg).show();
                    }
                      
                }
            });
        });
    </script>
@endpush