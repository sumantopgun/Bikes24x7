@component('mail::message')
# Booking confirmation


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Hi {{ $bike_buy_request_details->customer->user_first_name ?? '' }}, <br>
Your appointment confirm <br>
Following are your appointment details: <br>
Appointment Date: {{ $bike_buy_request_details->appointments->appointments_date }} <br>
Appointment Time: {{ $bike_buy_request_details->appointments->appointments_time }} <br>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
