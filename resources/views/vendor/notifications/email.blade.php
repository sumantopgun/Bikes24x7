@component('mail::message')

@if ($actionText == 'Reset Password')
You are receiving this email because we received a password reset request for your account.
<br>  
@elseif($actionText == 'Verify Email Address')
# Thank you for signing up with Bikes24x7.

Please verify your email address by clicking on the verification link given below. 
<br>
@else
Please clicking on the link given below.
@endif

@component('mail::button', ['url' => $actionUrl])
{{ $actionText }}
@endcomponent

Thank You!<br>
Regards,<br>
Team {{ config('app.name') }}
@endcomponent
