@extends('customercare.layout')
@section('title', 'Appointment Reschedule')
@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/calendar/css/core@4.3.1/main.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/calendar/css/daygrid@4.3.0/main.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/calendar/css/timegrid@4.3.0/main.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/calendar/css/custom.css')}}" />
    <style>
        td.fc-highlight {
            background: #151bef;
        }
        .fc-row.fc-week.fc-widget-content {
            height: 56px !important;
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;">Appointment Reschedule</h4>

            <h5 class="pb-3"><b>Bike Name :</b> {{ $bike_name ?? '' }}, <b>Last Date :</b> {{ $ldate ?? '' }}</h5>
            <h6 class="pb-3">
                @error('date')
                    <label class="error text-danger">{{ $message }}</label>
                @enderror
                @error('slot')
                    <label class="error text-danger">{{ $message }}</label>
                @enderror
            
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
            </h6>
            <form method="POST" class="forms-sample" action="{{ route('customercare.reschedule-complete') }}">
                @csrf
                <input class="form-control" type="hidden" name="booking_request_id" value="{{ $request_id }}">
                <div id="calendar" class="col-lg-12 col-md-12 add_bottom_25">
                    <input type="hidden" class="form-control" id="bkdate" name="date">
                </div>
                <div class="col-lg-12 col-md-12 add_bottom_25">
                    <div class="form-group">
                        <label for="model_type">Appointment Time</label>
                        <select class="form-control" name="slot" required>
                            <option value="">Select Time Slot</option>
                            <option value="11:00 A.M">11:00 A.M</option>
                            <option value="12:00 P.M">12:00 P.M</option>
                            <option value="01:00 P.M">01:00 P.M</option>
                            <option value="02:00 P.M">02:00 P.M</option>
                            <option value="03:00 P.M">03:00 P.M</option>
                            <option value="04:00 P.M">04:00 P.M</option>
                            <option value="05:00 P.M">05:00 P.M</option>
                            <option value="06:00 P.M">06:00 P.M</option>
                            <option value="07:00 P.M">07:00 P.M</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn_1 full-width" type="submit" value="Reserve Now">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/calendar/js/core@4.3.1/main.min.js')}}"></script>
    <script src="{{ asset('frontend/calendar/js/interaction@4.3.0/main.min.js')}}"></script>
    <script src="{{ asset('frontend/calendar/js/daygrid@4.3.0/main.min.js')}}"></script>
    <script src="{{ asset('frontend/calendar/js/timegrid@4.3.0/main.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var today = new Date();
        var day = today.getDate();
        var lastdate = '{{ $ldate }}';
        var endDate = new Date(lastdate);

        var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
        selectable: true,
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'today'
        },
        dateClick: function(info) {
            var selecteddate = info.dateStr
            //var today = info.date
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            var today1 = yyyy + '-' + mm + '-' + dd;
            // console.log(today1);
            // console.log(selecteddate);
            //$('#bkdate').val(info.dateStr)
            //alert('clicked ' + info.dateStr);
            if (today1 > selecteddate || lastdate < selecteddate) {
            alert('Please Select Current Date or last Date');
            $('#bkdate').val('')
            }else{
            $('#bkdate').val(selecteddate)
            console.log("Ok");
            }
        },

        dayRender: function (date, cell) {
        var dy = date.date;
            if(dy.getDate() == endDate.getDate()){
               date.el.bgColor = "red"; 
            }
            
        },


        // select: function(info) {
        //   alert('selected ' + info.startStr + ' to ' + info.endStr);
        // }
        });

        calendar.render();
    });
    </script>
   
@endpush