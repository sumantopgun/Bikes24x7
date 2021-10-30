@component('mail::message')
# Appointment Status


{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Hey {{ $customerName }}! <br>
Greetings from Bikes24x7! <br>
Your Application Status for {{ $rto_fees_application_name }}<br>
The following is your application status: {{ $rto_applications_status }} <br>
@if ($rto_applications_remarks)
Reasons for cancelling : {{ $rto_applications_remarks }} <br> 
@endif

<br>

Thanks,<br>
Team Bikes24x7.
@endcomponent
