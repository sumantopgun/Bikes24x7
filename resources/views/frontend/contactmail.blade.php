@component('mail::message')
# Enquiry Mail


Name = {{ $name }} <br>
Email Address = {{ $email }} <br>
Mobile Number = {{ $phno }} <br>
@if ($sell_brand)
Bike Brand = {{ $sell_brand }} <br>
@endif
@if ($sell_model)
Model Name = {{ $sell_model }} <br>
@endif
@if ($sell_year)
Bike Year = {{ $sell_year }} <br>
@endif
@if ($kilometers)
Kilometers Run (KM)  = {{ $kilometers }} <br>
@endif
@if ($estimated_price)
Estimated Price = {{ $estimated_price }} <br>
@endif
Query = {{ $querymsg }} <br>

<br>

Thank you,<br>
RIDEONRENT TECHNOLOGIES PRIVATE LIMITED
@endcomponent
