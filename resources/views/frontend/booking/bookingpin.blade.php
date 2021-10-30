@component('mail::message')
# Authorization Pin


Hi {{ Auth::user()->user_first_name }},<br>
{{ $msgText }} <br>
<br>

Thank you,<br>
RIDEONRENT TECHNOLOGIES PRIVATE LIMITED
@endcomponent
