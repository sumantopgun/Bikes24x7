@extends('frontend.layout')
@section('title', 'Bike Appointments')
@section('BuyBike', 'active')
@push('style')
     {{-- <link rel="stylesheet" href="{{ asset('frontend/css/date-picker.css')}}" /> --}}
     <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css')}}">
@endpush
@section('content')
    <div class="main2">
        <section class="breadcrumb-area">
            {{-- <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            @guest
                                <li><a href="{{ route('buy-bike') }}">Buy Bike</a></li>
                            @else
                                @if (Auth::user()->user_type == 'shop_seller')
                                    <li><a href="{{ route('seller.buybike') }}">Buy Bike</a></li>
                                @else
                                    <li><a href="{{ route('buy-bike') }}">Buy Bike</a></li>
                                @endif
                            @endguest
                            <li><a href="#">{{ $bike_name ?? 'Bike Details' }}</a></li>
                            <li><a href="#">Book Appoinment</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </section>
        <section class="book-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Book Appointment</h2>
                        <ul class="book-list">
                            <li>The deposit amount will <span class="not_refund_am">not</span> be refunded, if you fail to visit the showroom within the next 3 days.</li>
                            <li>After the store visit, if you do not like the bike, we will refund your deposit amount.</li> 
                            <li> If you choose to buy the selected two-wheeler after visiting the store, you will only have to pay the remaining amount, ie. after deducting the deposit fee.</li>
                        </ul>
                        <h3 class="book-list2"><b>Bike Name :</b> {{ $bike_name ?? '' }}, <b>Last Date :</b> {{ $ldate ?? '' }}</h3>
                    </div>
                    <div class="col-md-6">
                        <h3 class="text-center">Select Date</h3>
                        <div id="dateCalender"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="book-form">
                            <form method="POST" class="forms-sample" action="{{ route('appointment-complete') }}">
                                @csrf
                                <input class="form-control" type="hidden" name="booking_request_id" value="{{ $request_id }}">

                                <input type="hidden" class="form-control" id="date" name="date">
                                @error('date')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror

                                <div class="form-group">
                                    <select class="form-control" name="slot" id="slot" required>
                                        <option value="">Select Time Slot</option>
                                        <option value="11:00 A.M" id="11am">11:00 A.M</option>
                                        <option value="12:00 P.M" id="12pm">12:00 P.M</option>
                                        <option value="01:00 P.M" id="1pm">01:00 P.M</option>
                                        <option value="02:00 P.M" id="2pm">02:00 P.M</option>
                                        <option value="03:00 P.M" id="3pm">03:00 P.M</option>
                                        <option value="04:00 P.M" id="4pm">04:00 P.M</option>
                                        <option value="05:00 P.M" id="5pm">05:00 P.M</option>
                                        <option value="06:00 P.M" id="6pm">06:00 P.M</option>
                                        <option value="07:00 P.M" id="7pm">07:00 P.M</option>
                                    </select>
                                </div>
                                @error('slot')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                                {{-- <div class="form-group">
                                    <select class="form-control">
                                        <option>Select City</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>Select Collection Point</option>
                                    </select>
                                </div> --}}
                                <div class="fix-date-cal">
                                    <div class="date-cal">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <p><strong>Date</strong>: <span id="datePickedShow">Select Date</span></p>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <p><strong>Time Slot</strong> <span id="showSlot">Select Time Slot</span></p>
                                            </div>
                                            {{-- <div class="col-md-6 col-xs-6">
                                                <p><strong>City</strong> : Pune</p>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <p><strong>Collection Point</strong> : Khardi</p>
                                            </div> --}}
                                        </div>
                                    </div>
                                    {{-- <a class="btn book-now-btn" data-toggle="modal" data-target="#thankModal">Reserve Now</a> --}}
                                    <center><br class="br_mobile_off">
                                        <input class="btn book-now-btn" type="submit" value="Reserve Now">
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="thankModal" tabindex="-1" role="dialog" aria-labelledby="thankModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <img src="{{ asset('frontend/images/thank1.jpg')}}">
                            </div>
                            <div class="col-md-7 text-center">
                                <h2>THANK YOU</h2>
                                <p>For your interest in bikes24X7</p>
                                <span>Your booking has been confirmed.<br>
                                Our customer service will get in touch with you at the earliest.</span>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">Close</button><br>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="bookingthankpopup" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Thank You for booking</p>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@push('scripts')
    {{-- <script src="{{ asset('frontend/js/date-picker.js')}}"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $("#thankModal").modal('show');
        });
        
        var currentTime = new Date().getHours();
        var start11Time = "11";
        var is11PM = start11Time.toLocaleLowerCase().indexOf('pm');
        var time11 = parseInt(start11Time);
        if (is11PM > -1) {
            time11 += 12;
        }
        if ( time11 <= currentTime ) {
            $("#11am").prop("disabled",true); 
        }
    
        var start12Time = "12";
        var is12PM = start12Time.toLocaleLowerCase().indexOf('pm');
        var time12 = parseInt(start12Time);
        if (is12PM > -1) {
            time12 += 12;
        }
        if ( time12 <= currentTime ) {
            $("#12pm").prop("disabled",true); 
        } 
    
        var start1Time = "13";
        var is1PM = start1Time.toLocaleLowerCase().indexOf('pm');
        var time1 = parseInt(start1Time);
        if (is1PM > -1) {
            time1 += 12;
        }
        if ( time1 <= currentTime ) {
            $("#1pm").prop("disabled",true); 
        }
    
        var start2Time = "14";
        var is2PM = start2Time.toLocaleLowerCase().indexOf('pm');
        var time2 = parseInt(start2Time);
        if (is2PM > -1) {
            time2 += 12;
        }
        if ( time2 <= currentTime ) {
            $("#2pm").prop("disabled",true); 
        }
    
        var start3Time = "15";
        var is3PM = start3Time.toLocaleLowerCase().indexOf('pm');
        var time3 = parseInt(start3Time);
        if (is3PM > -1) {
            time3 += 12;
        }
        if ( time3 <= currentTime ) {
            $("#3pm").prop("disabled",true); 
        }
    
        var start4Time = "16";
        var is4PM = start4Time.toLocaleLowerCase().indexOf('pm');
        var time4 = parseInt(start4Time);
        if (is4PM > -1) {
            time4 += 12;
        }
        if ( time4 <= currentTime ) {
            $("#4pm").prop("disabled",true); 
        }
    
        var start5Time = "17";
        var is5PM = start5Time.toLocaleLowerCase().indexOf('pm');
        var time5 = parseInt(start5Time);
        if (is5PM > -1) {
            time5 += 12;
        }
        if ( time5 <= currentTime ) {
            $("#5pm").prop("disabled",true); 
        }
        var start6Time = "18";
        var is6PM = start6Time.toLocaleLowerCase().indexOf('pm');
        var time6 = parseInt(start6Time);
        if (is6PM > -1) {
            time6 += 12;
        }
        if ( time6 <= currentTime ) {
            $("#6pm").prop("disabled",true); 
        }
    
        var start7Time = "19";
        var is7PM = start7Time.toLocaleLowerCase().indexOf('pm');
        var time7 = parseInt(start7Time);
        if (is7PM > -1) {
            time7 += 12;
        }
        if ( time7 <= currentTime ) {
            $("#7pm").prop("disabled",true); 
        }
    
        var today = new Date();
        // dateSelected = 'year';
        // var my_date = $( "#date-picked" ).val();
        // console.log(my_date);
        $(function(){

            // var today = new Date();
            var lastdate = '{{ $ldate }}';
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            var today1 = yyyy + '-' + mm + '-' + dd;
            var NoOfDays =  Math.floor(( Date.parse(lastdate) - Date.parse(today1) ) / 86400000);

            $("#slot").change(function(){
                var slot = $(this).val();
                showSlot.innerHTML = slot;
            });
            
            $("#dateCalender").datepicker({
                changeYear: true,
                changeMonth: true,
                minDate:0,
                maxDate:NoOfDays,
                dateFormat: "yy-m-dd",
                yearRange: "-100:+20",
                onSelect: function(selectedDate) {
                    $('#date').val(selectedDate)
                    $('#datePickedShow').text(selectedDate)
                    var seltimeslot = $('select[name="slot"]');
                    seltimeslot.val(seltimeslot.find('option').first().val());

                    var selDate = new Date(selectedDate);
                    today.setHours(0,0,0,0);
                    if(today.getTime() < selDate.getTime()){
                        $("#11am").prop("disabled",false);
                        $("#12pm").prop("disabled",false);
                        $("#1pm").prop("disabled",false);
                        $("#2pm").prop("disabled",false);
                        $("#3pm").prop("disabled",false);
                        $("#4pm").prop("disabled",false);
                        $("#5pm").prop("disabled",false);
                        $("#6pm").prop("disabled",false);
                        $("#7pm").prop("disabled",false);
                    }
                    else{
                        if ( time11 <= currentTime ) {
                           $("#11am").prop("disabled",true); 
                        } 
                        if ( time12 <= currentTime ) {
                           $("#12pm").prop("disabled",true); 
                        } 
                        if ( time1 <= currentTime ) {
                           $("#1pm").prop("disabled",true); 
                        }
                        if ( time2 <= currentTime ) {
                           $("#2pm").prop("disabled",true); 
                        }
                        if ( time3 <= currentTime ) {
                           $("#3pm").prop("disabled",true); 
                        }
                        if ( time4 <= currentTime ) {
                           $("#4pm").prop("disabled",true); 
                        }
                        if ( time5 <= currentTime ) {
                           $("#5pm").prop("disabled",true); 
                        }
                        if ( time6 <= currentTime ) {
                           $("#6pm").prop("disabled",true); 
                        }
                        if ( time7 <= currentTime ) {
                           $("#7pm").prop("disabled",true); 
                        }

                    }
                }
            });
        });
        

        
    </script>
   
@endpush