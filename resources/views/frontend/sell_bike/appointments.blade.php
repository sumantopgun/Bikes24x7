@extends('frontend.layout')
@section('title', 'Bike Sell Appointments')
@section('sellBike', 'active')
@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css')}}">
@endpush
@section('content')
<div class="main2">
	<section class="breadcrumb-area">
    	{{-- <div class="container">
        	<div class="row">
            	<div class="col-md-12">
                	<ul class="breadcrumb">
                    	<li>Home</li>
                        <li><a href="#">Sell Bike</a></li>
                        <li><a href="#">Bike Details</a></li>
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
                        <li>Book a date convenient to you for the inspection of your bike.</li>
                        <li> You will receive a call from our customer service to confirm your booking.</li> 
                        <li> A detailed inspection will take place in your presence.</li>
                        <li> Please ensure to carry all related documents of the bike, for the inspection, for our bike inspector to verify.</li>
                        <ul class="book-list2">
                            <li> Registration Certificate (RC Book)     </li>
                            <li>Pollution Under Control Certificate (PuC) <span class="text-danger">(*Optional)</span> </li>
                            <li>Insurance Certificate </li>
                            <li>Government approved identity documents- both Aadhar and PAN card (Both compulsory) </li>
                            <li>Address Proof (Driver’s License/ Passport) </li>
                            <li>2 Passport size photographs </li>
                            <li>Bank NOC <span class="text-danger">(*If there's a loan on the vehicle) </span></li>
                        </ul>
                        <li> After agreeing to the quoted price and verification of documents, we will buy your bike within 30 mins of the inspection.</li> 
                        <li> Please keep in mind that the money will only be transferred to the account of the registered owner. </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Select Date</h3>
                    <div id="dateCalender"></div>
                </div>
                <div class="col-md-6">
                	<div class="book-form">
                        <form method="POST" class="forms-sample" action="{{ route('sell-appointment-confirm') }}">
                            @csrf
                            <input class="form-control" type="hidden" name="bike_sell_request_id" value="{{ $request_id }}">

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

                            <div class="form-group">
                                <select class="form-control"  name="collection_city" id="collection_city" required>
                                    <option value="">Select City</option>
                                    @if (!$collection_point->isEmpty())
                                        @foreach ($collection_point->unique('city_id') as $point)
                                            <option value="{{$point->city_id}}">{{ $point->city->city_name }}</option>
                                        @endforeach                
                                    @endif
                                </select>
                            </div>
                            @error('collection_city')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <select class="form-control" name="collection_point" id="collection_point" required>
                                    <option value="">Select Collection Point</option>
                                </select>
                            </div>
                            @error('collection_point')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                            <div class="fix-date-cal">
                            	<div class="date-cal">
                                	<div class="row">
                                    	<div class="col-md-6 col-xs-6">
                                        	<p><strong>Date</strong>: <span id="datePickedShow">Select Date</span></p>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                        	<p><strong>Time Slot</strong> : <span id="showSlot">Select Time Slot</span></p>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                        	<p><strong>City</strong> : <span id="showCity">Select City</span></p>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                        	<p><strong>Collection Point</strong> : <span id="showCollectionPoint">Select Collection Point</span></p>
                                        </div>
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
                	       <img src="images/thank1.jpg">
                        </div>
                        <div class="col-md-7 text-center">
                	        <h2>THANK YOU</h2>
                            <p>For your interest in bikes24X7</p>
                            <span>Your appoinment has been confirmed.<br>
                            Our customer service will get in touch with you at the earliest.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
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

        $(function(){
            $("#dateCalender").datepicker({
                changeYear: true,
                changeMonth: true,
                minDate:0,
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
            
            $("#slot").change(function(){
                var slot = $(this).val();
                showSlot.innerHTML = slot;
            });

            $("#collection_city").change(function(){
                // var collection_city = $(this).val();
                var collection_city = $("#collection_city option:selected").text();
                showCity.innerHTML = collection_city;
            });

            $("#collection_point").change(function(){
                var collection_point = $("#collection_point option:selected").text();
                showCollectionPoint.innerHTML = collection_point;
            });
        });
        
    </script>
    <script>
        let collection_point_location = [];
        function filter_rows_by_collection_city(collection_point, city_id) {
            var temp_collection_point_location = [];
            for(const point of collection_point) {
                if(point.city_id == city_id) {
                    // temp_collection_point_location.push(point.shop_location);
                    temp_collection_point_location.push({
                        id: point.id,
                        name: point.shop_name,
                        location: point.shop_location
                    });
                }
            }
            collection_point_location.length = 0;
            collection_point_location = temp_collection_point_location;
        }

        $(function(){
            var collection_point = @json($collection_point);
            // console.log(collection_point);
            $("#collection_city").change(function(){
                var city_id = $("#collection_city").val();
                filter_rows_by_collection_city(collection_point, city_id);
                console.log(collection_point_location);

                $("#collection_point").empty().append('<option selected="selected" value="">Select Collection Point *</option>');
                
                $.each(collection_point_location, function(index, value) {
                    $("#collection_point").append('<option value="'+value.id+'">'+value.name+' , '+value.location+'</option>');
                });
            });
        });
        
    </script>

@endpush