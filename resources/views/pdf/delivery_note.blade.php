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
    margin-bottom: 50pt;
    margin-footer: 18pt;
}

@page :first {
    margin-top: 0;
}

.container { padding: 0 35pt; }


.delivery_no,.delivery_date{
    font-size: 20px;
    color: black;
    font-weight: 500;
    margin-bottom: 20pt;
}
.delivery_3rd_sec_1st_sec{
    margin-top: 15px;
}
.delivery_3rd_sec_1st_sec span{
    font-size: 20px;
    color: black;
}
.delivery_3rd_sec_1st_sec,{
    margin-bottom: 10px;
}
.delivery_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 260px;
}
.reg_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 280px;
}
.co_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 270px;
}
.mr_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 607px;
}
.ph_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 280px;
}
.add_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 270px;
}
.add2_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 100%;
}
.foruse_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 85px;
}
.hour_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 150px;
}
.delivery_4th_sec,.delivery_5th_sec{
    margin-top: 20px;
}
.delivery_4th_sec span,.delivery_5th_sec span{
    font-size: 18px;
    color: black;
}
.delivery_6th_sec span,.delivery_8th_sec span{
    font-size: 25px;
    color: black;
    font-weight: 500;
}
.delivery_6th_sec{
    margin-bottom: 20px;
    margin-top: 20px;
}
.delivery_8th_sec{
    margin-top: 40px;
}
.chan_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 175px;
}
.del_model_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 150px;
}
.del_date_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 140px;
}
.eng_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 145px;
}
.dd_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 152px;
}
.rs_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 110px;
}
.veh_reg_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 150px;
}
.branch_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 150px;
}
.date2_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 110px;
}
.color_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 641px;
}
.veh_ph_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 180px;
}
.sig_rec_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 230px;
}
.veh_name_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 640px;
}
.veh_add_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 600px;
}
.veh_add2_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 1px solid black;
    outline: 0;
    width: 100%;
}
.head_no_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 0;
    outline: 0;
    width: 300px;
}
.head_date_input{
    border-top: 0;
    border-left: 0;
    border-right: 0;
    border-bottom: 0;
    outline: 0;
    width: 300px;
}
</style>

</head>

<body>
    <div class="container">
        <center><h3 style="background: black; color: white; margin-left: 200pt; margin-right: 200pt; padding: 5px;">DELIVERY NOTE</h3></center>
        <span class="delivery_no" style="margin-bottom: 20pt;">No. : </span><input type="text" class="head_no_input" value="  {{ optional($invoiceInfo->shop)->id }}/{{$invoiceInfo->id}}">
        <span class="delivery_date" style="margin-bottom: 20pt;">Date :</span><input type="text" style="margin-top: 4pt;" class="head_date_input" value=" {{ Carbon\Carbon::now()->toDateString() }}">
        <div class="delivery_3rd_sec_1st_sec">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I/We hereby confirm having taken possession of</span>
            <input type="text" class="delivery_input" value=" {{ optional($invoiceInfo->bike_sells)->bike_name }}">
        </div>
        <div class="delivery_3rd_sec_1st_sec">
            <span>Regn No.</span>
            <input type="text" class="reg_input" value=" {{ optional($invoiceInfo->bike_sells)->bike_regn_no }}">
            <span>C/O.</span>
            <input type="text" class="co_input">
        </div>
        @if ($invoiceInfo->booking_requests_billing_address_id!=Null)
            <div class="delivery_3rd_sec_1st_sec">
                <span>From Mr.</span>
                <input type="text" class="mr_input" value=" {{ $invoiceInfo->billingAddress->billing_full_name  ?? 'N/A'}}">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                <span>Phone</span>
                <input type="text" class="ph_input" value="  {{ $invoiceInfo->billingAddress->billing_phone_no  ?? 'N/A'}}">
                <span>Address</span>
                <input type="text" class="add_input" value="  {{ $invoiceInfo->billingAddress->billing_full_address  ?? 'N/A'}}">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                {{-- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> --}}
                <input type="text" class="add2_input" value="  {{ optional($invoiceInfo->billingAddress)->billing_city.','.optional($invoiceInfo->billingAddress)->billing_postal_code }}">
            </div>
        @else
            <div class="delivery_3rd_sec_1st_sec">
                <span>From Mr.</span>
                <input type="text" class="mr_input" value="  {{ optional($invoiceInfo->customer)->user_first_name.' '.optional($invoiceInfo->customer)->user_last_name }}">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                <span>Phone</span>
                <input type="text" class="ph_input" value="  {{ optional($invoiceInfo->customer)->phone }}">
                <span>Address</span>
                <input type="text" class="add_input" value="  {{ optional($invoiceInfo->customer)->user_locality }}">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                {{-- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> --}}
                <input type="text" class="add2_input" value="  {{ optional($invoiceInfo->customer)->user_city.','.optional($invoiceInfo->customer)->user_pincode }}">
            </div>
        @endif
        
        
        <div class="delivery_3rd_sec_1st_sec">
            <span>for use & Safe custody in good running condition to my full satisfaction on</span>
            <input type="text" class="foruse_input" value=" {{ optional($invoiceInfo->updated_at)->toDateString() }}">
        </div>
        <div class="delivery_3rd_sec_1st_sec">
            <span>at</span>
            <input type="text" class="hour_input" value="  {{ optional($invoiceInfo->updated_at)->format('H:i:s') }}">
            <span>hours.</span>
        </div>
        <div class="delivery_4th_sec">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Now onwards I am fully responsible for payment of yearly Road Tax, Insurances, any other tax payment and all court cases and penalties thereon which may become due on this vehicle, Accidental damages etc.</span>
        </div>
        <div class="delivery_5th_sec">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I am fully responsible to tranfer the vehicle 15 days after the delivery.</span><br>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I am fully satisfied with the vehicle and responsible for their Maintenance charges.</span><br>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; I am taking possession of unregistered vehicle at my own risk.</span>
        </div> 
        <div class="delivery_6th_sec">
            <span>Particulars of Vehicle</span>
        </div> 
        <div class="delivery_3rd_sec_1st_sec">
            <span>Chassis No.</span>
            <input type="text" class="chan_input" value=" {{ optional($invoiceInfo->bike_sells)->bike_chassis_no }}">
            <span>Model</span>
            <input type="text" class="del_model_input" value="  {{ optional($invoiceInfo->bike_sells_model)->model_name}}">
            <span>Date</span>
            <input type="text" class="del_date_input" value=" {{ optional($invoiceInfo->updated_at)->toDateString() }}">
        </div>
        <div class="delivery_3rd_sec_1st_sec">
            <span>Engine No.</span>
            <input type="text" class="eng_input" value=" {{ optional($invoiceInfo->bike_sells)->bike_engine_no }}">
            <span>DD/Cheque No.</span>
            <input type="text" class="dd_input">
            <span>Rs.</span>
            <input type="text" class="rs_input" value="  {{ $invoiceInfo->total_amount ?? ''}}">
        </div> 
        <div class="delivery_3rd_sec_1st_sec">
            <span>Vehicle Regn. No.</span>
            <input type="text" class="veh_reg_input" value=" {{ optional($invoiceInfo->bike_sells)->bike_regn_no }}">
            <span>Branch</span>
            <input type="text" class="branch_input" value=" {{ optional($invoiceInfo->bike_sells)->bike_regn_branch }}">
            <span>Date</span>
            <input type="text" class="date2_input" value="  {{ optional($invoiceInfo->bike_sells)->bike_reg_date }}">
        </div>
        <div class="delivery_3rd_sec_1st_sec">
            <span>Color</span>
            <input type="text" class="color_input" value="  {{ optional($invoiceInfo->bike_sells)->bike_color }}">
        </div> 
        @if ($invoiceInfo->booking_requests_billing_address_id!=Null)
            <div class="delivery_3rd_sec_1st_sec">
                <span>Phone No.</span>
                <input type="text" class="veh_ph_input" value="  {{ $invoiceInfo->billingAddress->billing_phone_no  ?? 'N/A'}}">
                <span>Signature of Receiver</span>
                <input type="text" class="sig_rec_input">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                <span>Name</span>
                <input type="text" class="veh_name_input" value="  {{ $invoiceInfo->billingAddress->billing_full_name  ?? 'N/A'}}">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                <span>Address</span>
                <input type="text" class="veh_add_input" value="  {{ $invoiceInfo->billingAddress->billing_full_address  ?? 'N/A'}}">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                {{-- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> --}}
                <input type="text" class="veh_add2_input" value="  {{ optional($invoiceInfo->billingAddress)->billing_city.','.optional($invoiceInfo->billingAddress)->billing_postal_code }}">
            </div>
        @else
            <div class="delivery_3rd_sec_1st_sec">
                <span>Phone No.</span>
                <input type="text" class="veh_ph_input" value="  {{ optional($invoiceInfo->customer)->phone }}">
                <span>Signature of Receiver</span>
                <input type="text" class="sig_rec_input">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                <span>Name</span>
                <input type="text" class="veh_name_input" value="  {{ optional($invoiceInfo->customer)->user_first_name.' '.optional($invoiceInfo->customer)->user_last_name }}">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                <span>Address</span>
                <input type="text" class="veh_add_input" value="  {{ optional($invoiceInfo->customer)->user_locality }}">
            </div>
            <div class="delivery_3rd_sec_1st_sec">
                {{-- <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> --}}
                <input type="text" class="veh_add2_input" value="  {{ optional($invoiceInfo->customer)->user_city.','.optional($invoiceInfo->customer)->user_pincode }}">
            </div>
        @endif
        
        <div class="delivery_8th_sec">
            <span>{{ optional($invoiceInfo->shop)->shop_name }}, {{ optional($invoiceInfo->shop)->shop_location }}, Ph: {{ optional($invoiceInfo->shop)->contact_no }}</span>
        </div>                       
    </div>
</body>
</html>