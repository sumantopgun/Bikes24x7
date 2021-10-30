@extends('frontend.layout')
@section('title', 'Payment Page')
@section('rto_services', 'active')
@push('style')
    
@endpush
@section('content')
<div class="main2">
    {{-- <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('rto-services.index') }}">RTO Services</a></li>
                        <li><a href="#">RC Transfer</a></li>
                    </ul>
                    <h2 class="heading"> RC Transfer</h2>
                </div>
            </div>
        </div>
    </section> --}}

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
    "name": "{{$response['form_type']}}",
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
        document.getElementById('rto_applications_rto_fees_id').value = "{{$need_data['rto_applications_rto_fees_id']}}";
        document.getElementById('rto_applications_office_id').value = "{{$need_data['rto_applications_office_id']}}";
        document.getElementById('rto_applications_is_insurance').value = "{{$need_data['rto_applications_is_insurance']}}";
        document.getElementById('rto_applications_insurance_fees_id').value = "{{$need_data['rto_applications_insurance_fees_id']}}";
        document.getElementById('rto_applications_insurance_amount').value = "{{$need_data['rto_applications_insurance_amount']}}";
        document.getElementById('rto_applications_application_fees').value = "{{$need_data['rto_applications_application_fees']}}";
        document.getElementById('rto_applications_total_amount').value = "{{$need_data['rto_applications_total_amount']}}";
        document.getElementById('rto_applications_documents_uploaded').value = "{{$need_data['rto_applications_documents_uploaded']}}";
        document.getElementById('rto_applications_documents_images').value = "{{$need_data['rto_applications_documents_images']}}";
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
<form action="{{route('rto-payment-complete')}}" method="POST" hidden>
        <input type="hidden" value="{{csrf_token()}}" name="_token" /> 
        <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
        <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
        <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">

        <input type="text" class="form-control" id="rto_applications_rto_fees_id"  name="rto_applications_rto_fees_id">
        <input type="text" class="form-control" id="rto_applications_office_id"  name="rto_applications_office_id">
        <input type="text" class="form-control" id="rto_applications_is_insurance"  name="rto_applications_is_insurance">
        <input type="text" class="form-control" id="rto_applications_insurance_fees_id"  name="rto_applications_insurance_fees_id">
        <input type="text" class="form-control" id="rto_applications_insurance_amount"  name="rto_applications_insurance_amount">
        <input type="text" class="form-control" id="rto_applications_application_fees"  name="rto_applications_application_fees">
        <input type="text" class="form-control" id="rto_applications_total_amount"  name="rto_applications_total_amount">
        <input type="text" class="form-control" id="rto_applications_documents_uploaded"  name="rto_applications_documents_uploaded">
        <input type="text" class="form-control" id="rto_applications_documents_images"  name="rto_applications_documents_images">
    <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
</form>
@endpush


<!-- I'l copy the form  -->
<!-- This form is hidden -->
<!-- Let's crate the controller function -->
