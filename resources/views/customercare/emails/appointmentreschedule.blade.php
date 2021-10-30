@component('mail::message')
# Appointment Reschedule


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Hi {{ $booking_details->customer->user_first_name ?? '' }}, <br>
Your Appointment Reschedule <br>
Following are your reschedule appointment details: <br>
Reschedule Date: {{ $booking_details->appointments->appointments_date }} <br>
Reschedule Time: {{ $booking_details->appointments->appointments_time }} <br>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
