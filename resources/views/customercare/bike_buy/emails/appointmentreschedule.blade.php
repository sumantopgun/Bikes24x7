@component('mail::message')
# Appointment Reschedule


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Hi {{ $bike_buy_request_details->customer->user_first_name ?? '' }}, <br>
Your Appointment Reschedule <br>
Following are your reschedule appointment details: <br>
Reschedule Date: {{ $bike_buy_request_details->appointments->appointments_date }} <br>
Reschedule Time: {{ $bike_buy_request_details->appointments->appointments_time }} <br>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
