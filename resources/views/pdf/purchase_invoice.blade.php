<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Document</title>

<style>
@page {
	footer: page-footer;
	margin: 0;
	margin-top: 35pt;
	margin-bottom: 20pt;
	margin-footer: 18pt;
}

@page :first {
	margin-top: 0;
}

.container { padding: 0 35pt; }


.com_name_text_sec{
    text-align: center;
}
.com_name_text_sec p{
    font-size: 40px;
    color: black;
    margin: 10px 0;
}
.com_add_text_sec{
    text-align: center;
}
.com_add_text_sec p{
    font-size: 18px;
    margin: 0px;
    color: black;
}
.com_gst_text_sec{
    text-align: center;
}
.com_gst_text_sec p{
    font-size: 18px;
    color: black;
    margin: 10px;
}
.delivery_no,.delivery_date{
    font-size: 20px;
    color: black;
    font-weight: 500;
    margin-bottom: 20pt;
}
.invoice_1st_sec {
    padding-left: 0px;
    padding-right: 0px;
}
.invoice_2nd_sec {
    padding-left: 0px;
    padding-right: 0px;
    padding-bottom: 10px;
}
.invoice_2nd_sec_date span,.invoice_2nd_sec_no span{
    font-size: 20px;
    color: black;
    font-weight: 500;
}
.invoice_3rd_sec {
    text-align: center;
    margin-top: 30px;
}
.invoice_3rd_sec hr{
    border-top: 1px solid black;
}
button.purchase_btn {
    font-size: 20px;
    color: white;
    background: black;
    border: none;
    padding: 5px;
    margin-left: 240px;
    margin-right: 150px;
}
.make_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 644px;
}
.model_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 639px;
}
.reg_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 527px;
}
.year_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 594px;
}
.ms_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 611px;
}
.ph_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 571px;
}
.email_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 617px;
}
.add_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 625px;
}
.add2_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 100%;
}
.sumrs_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 566px;
}
.rswrd_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 554px;
}
.invoice_last_sec{
    margin-bottom: 70px;
}
.invoice_5th_sec_1stsec span,.invoice_last_sec{
    font-size: 18px;
    color: black;
    font-weight: 500;
}
.invoice_5th_sec_1stsec{
    margin-top: 15px;
    margin-bottom: 15px;
}
.invoice_bal_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 50%;
}
.invoice_total_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 47%; 
}
.invoice_tbal_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 48%;  
}
.head_no_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 0;
    outline: 0;
    width: 150px;
}
.head_date_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 0;
    outline: 0;
    width: 440px;
}
</style>

</head>

<body>
	<div class="container">
		<center>
            <div class="com_name_text_sec">
                <p>Rideonrent Technologies Pvt. Ltd.</p>
            </div>
            <div class="com_add_text_sec">
                <p>{{ optional($invoiceInfo->collectionpoint)->shop_name }}, {{ optional($invoiceInfo->collectionpoint)->shop_location }}, Ph: {{ optional($invoiceInfo->collectionpoint)->contact_no }}</p>
            </div>
            <div class="com_gst_text_sec">
                <p>GST No.: 27AAHCR494R1ZD</p>
            </div>

        </center>
        <div>
            <span class="delivery_no" style="margin-bottom: 20pt;">Date :</span><input type="text" class="head_date_input" value="{{ Carbon\Carbon::now()->toDateString() }}">
            <span class="delivery_date" style="margin-bottom: 20pt;">No. :</span><input type="text" class="head_no_input" value="{{ optional($invoiceInfo->collectionpoint)->id }}/{{ $invoiceInfo->id }}">
        </div>
        <div class="invoice_3rd_sec">
            <hr>
            <button class="purchase_btn" style="position: absolute; top: -15px;">PURCHASE INVOICE</button>
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>We hereby confirm having taken possession of the vehicle</span>
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Make</span>
            <input type="text" class="make_input" value="  {{ optional($invoiceInfo->sell_bike_details)->brand_name.' '.optional($invoiceInfo->sell_bike_details)->model_name.' '.optional($invoiceInfo->sell_bike_details)->model_cc }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Model</span>
            <input type="text" class="model_input" value="{{ optional($invoiceInfo->sell_bike_details)->model_name }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Registration number</span>
            <input type="text" class="reg_input" value=" {{ $invoiceInfo->bike_buy_reg_no ?? 'N/A' }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Year of Mfg</span>
            <input type="text" class="year_input" value=" {{ optional($invoiceInfo->sell_bike_details)->bike_year }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>From M/s</span>
            <input type="text" class="ms_input" value=" {{ optional($invoiceInfo->customerBilling)->billing_full_name }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Address</span>
            <input type="text" class="add_input" value=" {{ optional($invoiceInfo->customerBilling)->billing_address1 }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            {{-- <span>&nbsp;</span> --}}
            <input type="text" class="add2_input" value="  {{ optional($invoiceInfo->customerBilling)->billing_address2 }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Phone Number</span>
            <input type="text" class="ph_input" value="  {{ optional($invoiceInfo->customer)->phone }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Email ID</span>
            <input type="text" class="email_input" value="  {{ optional($invoiceInfo->customerBilling)->billing_email }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>For a sum of Rs</span>
            <input type="text" class="sumrs_input" value=" {{ $invoiceInfo->tatal_amount_paid ?? 'N/A' }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            @php
                $amount = $invoiceInfo->tatal_amount_paid;
                $f = new \NumberFormatter( locale_get_default(), \NumberFormatter::SPELLOUT );
                $word = $f->format($amount);
            @endphp
            <span>Rupees In Words</span>
            <input type="text" class="rswrd_input" value="{{ $word }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Payment Made as Follows</span><br>
            <span>Paid by Cash/Cheque</span>
        </div>
        @foreach ($invoiceInfo->payments->sortBy('created_at') as $paymentInfo)
            <div class="invoice_5th_sec_1stsec">
                <span>{{ $loop->iteration }}.</span><input type="text" class="invoice_bal_input" value="{{ $paymentInfo->out_payment_amount ?? 'N/A' }}"><span>Bal.</span>
            </div>
        @endforeach
        
        {{-- <div class="invoice_5th_sec_1stsec">
            <span>2.</span><input type="text" class="invoice_bal_input"><span>Bal.</span>
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>3.</span><input type="text" class="invoice_bal_input"><span>Bal.</span>
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>4.</span><input type="text" class="invoice_bal_input"><span>Bal.</span>
        </div> --}}
        <div class="invoice_5th_sec_1stsec">
            <span>Total</span><input type="text" class="invoice_total_input" value="  {{ $invoiceInfo->tatal_amount_paid ?? 'N/A' }}">
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Bal.</span><input type="text" class="invoice_tbal_input">
        </div>
        <div class="invoice_last_sec">
            <span>RideOnRent Technologies Pvt. Ltd.</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span>Signature of Seller</span>
        </div>
        <div class="invoice_5th_sec_1stsec">
            <span>Autorised Signatory</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span>Name</span>
        </div>
    </div> 
</body>
</html>