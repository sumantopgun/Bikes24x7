@component('mail::message')
# Appointment Notification


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Hi {{ $customer_first_name ?? '' }}, <br>
We tried calling you, but no one received the call.
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
