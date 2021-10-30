@extends('customer.layout')
@section('title', 'Payment Page')
@push('style')
    
@endpush
@section('content')
<div class="container margin_30">
    <button id="rzp-button1" hidden>Pay</button>
    <center><a href="{{ url()->previous() }}" class="btn_1">Back</a></center> 
          
</div>
@endsection
@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{$response['razorpayId']}}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$response['amount']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "{{$response['currency']}}",
    "name": "{{$response['bike_name']}}",
    "image": "{{ asset('frontend/images/logo.png')}}", // You can give your logo url
    "order_id": "{{$response['orderId']}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        // After payment successfully made response will come here
        // Let's send this response to Controller for update the payment response
        // Create a form for send this data
        // Set the data in form
        document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
        document.getElementById('rzp_orderid').value = response.razorpay_order_id;
        document.getElementById('rzp_signature').value = response.razorpay_signature;
        // // Let's submit the form automatically
        document.getElementById('payments_amount').value = "{{$need_data['payments_amount']}}";
        document.getElementById('remaining_amount').value = "{{$need_data['remaining_amount']}}";
        document.getElementById('payments_sell_id').value = "{{$need_data['payments_sell_id']}}";
        document.getElementById('payments_booking_id').value = "{{$need_data['payments_booking_id']}}";
        
        document.getElementById('rzp-paymentresponse').click();
    },
    "prefill": {
        "email": "{{$response['email']}}",
        "contact": "{{$response['contactNumber']}}"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
window.onload = function(){
    document.getElementById('rzp-button1').click();
};
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
<form action="{{route('customer.payment-online')}}" method="POST" hidden>
        <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
        <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
        <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
        <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">

        <input type="text" class="form-control" id="payments_amount"  name="payments_amount">
        <input type="text" class="form-control" id="remaining_amount"  name="remaining_amount">
        <input type="text" class="form-control" id="payments_sell_id"  name="payments_sell_id">
        <input type="text" class="form-control" id="payments_booking_id"  name="payments_booking_id">
    <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
</form>
@endpush


<!-- I'l copy the form  -->
<!-- This form is hidden -->
<!-- Let's crate the controller function -->
