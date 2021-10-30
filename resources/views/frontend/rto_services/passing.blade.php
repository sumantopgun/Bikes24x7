@extends('frontend.layout')
@section('title', 'Passing')
@section('rto_services', 'active')
@push('style')    
    {{-- <link rel="stylesheet" href="{{ asset('admin_template/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend_template/css/cart.css')}}"> --}}
@endpush
@section('content')
    <div class="main2">
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('rto-services.index') }}">RTO Services</a></li>
                            <li><a href="#">Passing</a></li>
                        </ul>
                        <h2 class="heading"> Passing</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="RTO-area">
            <div class="container">
                <form method="POST" class="forms-sample" action="{{ route('rto-services.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="form_type" id="passing" value="passing">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="transfer-details">
                                <h3>What is Passing ?</h3>
                                <p>Required if your vehicle is being transferred from one state to the other.</p>
                                <p> 
                                    To transfer a vehicle from one state to another, the original state's RTO must issue an NOC that needs to be submitted to the RTO of the state where the vehicle needs to be transferred. The passing may only be completed after the vehicle is inspected, and the State Tax is paid to the RTO authority of the new state. On completing this process, a new registration number is assigned to the vehicle by the state where the vehicle needs to be transferred.
                                </p>
                                <h3>Charges</h3>
                                <p>2-Wheelers : Actual RTO charges + Rs. {{ $Passing_for_two_wheeler->rto_fees_amount ?? '' }}/- service charge<br>
                                4- Wheelers : Actual RTO charges + Rs. {{ $Passing_for_four_wheeler->rto_fees_amount ?? '' }}/- service charge<br>
                                </p>
                                <h3>Documents Required **</h3>
                                <p>1. Original RC </p>
                                <p>2. NOC (No Objection Certificate) from RTO where the vehicle was registered to the RTO where the vehicle needs to be transferred (other state)</p>
                                <p> 3. Address Proof Local Residents: (Any 2 of the following)
                                    [Aadhar Card, Electricity Bill, Passport]
                                    Residents on Rent: (All of the following) <br>
                                </p>
                                <ul>
                                <li>- [Aadhar Card / Election Card / Passport]</li>
                                <li>- Registered Rent Agreement</li>
                                <li> - Electricity Bill</li> 
                                <p>4. Valid insurance if available </p>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="transfer-doc">
                                <h3>Upload Documents</h3>
                                {{-- <form> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Original RC <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFileoriginal_rc_book" readonly class="f-input" placeholder="Upload Original RC"/>
                                                <div class="fileUpload btn btn--browse">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input id="uploadBtnoriginal_rc_book" name="original_rc_book" required type="file" class="upload" />
                                                </div>
                                                @error('original_rc_book')
                                                    <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>NOC (No Objection Certificate) <br><small>[From RTO where the vehicle was registered to the RTO where the vehicle needs to be transferred (other state)] </small>
                                                </label>
                                                <input id="uploadFileno_objection_certificate" readonly class="f-input" placeholder="Upload NOC"/>
                                                <div class="fileUpload btn btn--browse">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input id="uploadBtnno_objection_certificate" name="no_objection_certificate" required type="file" class="upload" />
                                                </div>
                                                @error('no_objection_certificate')
                                                    <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="radio" class="fate" name="residents" id="resident1" value="resident1" />
                                                <label for="resident1">For local residents</label>
                                                <input type="radio" class="fate" name="residents" id="resident2" value="resident2" />
                                                <label for="resident2">For residents staying on rent</label>
                                            </div>
                                            @error('resident')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror

                                            <div id="clicked_resident1" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <label>Address Proof 1 <span class="tooltip"><i class="fa fa-info"></i><span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileaddress_proof_1" readonly class="f-input"  placeholder="Upload Address 1"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnaddress_proof_1" name="address_proof_1" type="file" class="upload"/>
                                                    </div>
                                                    @error('address_proof_1')
                                                        <span style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                                                        
                                                <div class="form-group">
                                                    <label>Address Proof 2 <span class="tooltip"><i class="fa fa-info"></i><span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileaddress_proof_2" readonly class="f-input"  placeholder="Upload Address 2"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnaddress_proof_2" name="address_proof_2" type="file" class="upload"/>
                                                    </div>
                                                    @error('address_proof_2')
                                                        <span style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                </div>                                            
                                            </div>

                                            <div id="clicked_resident2" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <label>Aadhar Card/ Election Card/ Passport of Buyer <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileaadhar_election_passport_of_buyer" readonly class="f-input"  placeholder="Upload One of the above"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnaadhar_election_passport_of_buyer" name="aadhar_election_passport_of_buyer" type="file" class="upload"/>
                                                    </div>
                                                    @error('aadhar_election_passport_of_buyer')
                                                        <span style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                                                        
                                                <div class="form-group">
                                                    <label>Registered Rent Agreement of Buyer <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFilereq_rent_agreement_of_buyer" readonly class="f-input"  placeholder="Upload Rent Agreement of Buyer"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnreq_rent_agreement_of_buyer" name="req_rent_agreement_of_buyer" type="file" class="upload"/>
                                                    </div>
                                                    @error('req_rent_agreement_of_buyer')
                                                        <span style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                </div> 
                                            
                                                <div class="form-group">
                                                    <label>Electricity Bill of the registered place on the agreement <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileelectricity_bill_of_the_registered_place_on_the_agreement" readonly class="f-input"  placeholder="Upload Electricity Bill"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnelectricity_bill_of_the_registered_place_on_the_agreement" name="electricity_bill_of_the_registered_place_on_the_agreement" type="file" class="upload"/>
                                                    </div>
                                                    @error('electricity_bill_of_the_registered_place_on_the_agreement')
                                                        <span style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                </div>       
                                            </div>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                        </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="transfer-doc">
                                {{-- <form> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>RTO Office</label>
                                                <select class="form-control" name="rto_applications_office_id" required>
                                                    <option value="">Select RTO Office</option>
                                                    @if (!$rtoOffices->isEmpty())
                                                        @foreach ($rtoOffices as $rtoOffice)
                                                            <option value="{{$rtoOffice->id}}">{{$rtoOffice->rto_office_name}}, {{$rtoOffice->rto_office_location}}</option>
                                                        @endforeach                
                                                    @endif
                                                </select>
                                            </div>
                                            @error('rto_applications_office_id')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label class="d-inline-block">Vehicle Type</label>
                                                <input type="radio" id="2whhel" name="rto_applications_rto_fees_id_check" value="two_wheelers" required checked>
                                                <label for="2whhel">Two Wheeler</label>
                                                <input type="radio" id="4whhel" name="rto_applications_rto_fees_id_check" value="four_wheelers" required >
                                                <label for="4whhel">Four Wheeler</label>
                                            </div>
                                            @error('rto_applications_rto_fees_id_check')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror

                                            <input type="hidden" name="rto_applications_rto_fees_id" id="rto_applications_rto_fees_idval" value="{{$Passing_for_two_wheeler->id}}">

                                            <hr>
                                            
                                            
                                            <div class="form-group">
                                                <label class="d-inline-block">Insurance</label>
                                                <input type="radio" class="fate2" name="rto_applications_is_insurance" id="insureance1" value="1" />
                                                <label for="insureance1">Yes</label>
                                                <input type="radio" class="fate2" name="rto_applications_is_insurance" id="insureance2" value="0" />
                                                <label for="insureance2">No</label>
                                            </div>
                                            @error('rto_applications_is_insurance')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror

                                            <div id="clicked_1" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <input id="uploadFilevalid_insurance" readonly class="f-input"  placeholder="Upload Valid Insurance"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnvalid_insurance" name="valid_insurance" type="file" class="upload"/>
                                                    </div>
                                                </div>
                                                @error('valid_insurance')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div id="clicked_0" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <span class="text-danger">Extra Charges will be applied on third party Insurance</span>
                                                    <label id="bikeTrim_cc">Two Wheeler Trim(CC)</label>
                                                    <select class="form-control" name="rto_applications_insurance_fees_id" id="rto_applications_insurance_fees_id">
                                                        <option value="">Select Two Wheeler Trim</option>
                                                    </select>
                                                </div>
                                                @error('rto_applications_insurance_fees_id')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <input type="hidden" name="rto_applications_total_amount" id="totalfeesCal">
                                            <input type="hidden" name="rto_applications_insurance_amount" id="totalInsuranceFees">
                                            <input type="hidden" name="rto_applications_application_fees" id="totalApplicationFees">
                                            
                                            <hr>
                                            <div class="form-group">
                                                <input type="checkbox" name="terms_and_conditions" required><span><a target="blank" href="{{ route('termsconditions') }}">Terms & Conditions</a></span>
                                            </div>
                                            @error('terms_and_conditions')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                {{-- </form> --}}
                        </div>
                        </div>
                    
                    </div>
                
                    <div class="row row-centered">
                        <div class="col-md-8 col-centered">
                            <div class="transfer-pay"> 
                                <div class="transfer-breakup">
                                    <div class="row">
                                        <div class="col-xs-7 center">
                                            <p>RTO Transfer Fees :</p>
                                        </div>
                                        <div class="col-xs-5 right">
                                            <p><i class="fa fa-rupee"></i> <span id="calTransferFees"> 0000.00</span></p>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xs-7 center">
                                            <p>RTO Insurance Fees :</p>
                                        </div>
                                        <div class="col-xs-5 right">
                                            <p><i class="fa fa-rupee"></i> <span id="calInsuranceFees"> 0000.00</span></p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <div class="transfer-total">
                                    <div class="row">
                                        <div class="col-xs-7 center">
                                            <h3>Total Fees :</h3>
                                        </div>
                                        <div class="col-xs-5 right">
                                            <h4><i class="fa fa-rupee"></i> <span id="calTotalFees"> 0000.00</span></h4>
                                            <span class="drop-arrow"><i class="fa fa-angle-up"></i></span>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-xs-12 center">
                                            <button type="submit" class="pay-btn btn-block">Proceed to Pay</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section>
        
        <!-- Top Picks-->
        <section class="similer-bike-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="other_ser_title">
                            <h2>Other Services</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div id="carousel-picks3" class="carousel-picks3 owl-carousel owl-theme" >
                            <div class="item">
                                <div class="col-item">
                                    <a href="{{ route('rto-services.show', $license='license') }}">
                                        <div class="o-ser">
                                            <h3>License</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-item">
                                    <a href="{{ route('rto-services.show', $noc='noc') }}">
                                        <div class="o-ser">
                                            <h3>noc</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-item">
                                    <a href="{{ route('rto-services.show', $loan_cancellation='loan-cancellation') }}">
                                        <div class="o-ser">
                                            <h3>Loan cancellation</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-item">
                                    <a href="{{ route('rto-services.show', $repassing='repassing') }}">
                                        <div class="o-ser">
                                            <h3>Repassing</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-item">
                                    <a href="{{ route('rto-services.show', $rto_transfer='rto-transfer') }}">
                                        <div class="o-ser">
                                            <h3>RTO Transfer</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-item">
                                    <a href="{{ route('rto-services.show', $duplicate_registration_certificate='duplicate-registration-certificate') }}">
                                        <div class="o-ser">
                                            <h3>DUPLICATE RC</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> 
                    
                    </div>
                </div>      
                    
            </div>
            
        </section>
        <!-- Top Picks-->
    
   </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin_template/js/file-upload.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#rto_applications_insurance_fees_id").empty();
            $("#rto_applications_insurance_fees_id").append('<option data-price="00" value="">Select Two Wheeler Trim</option>');
            $("#rto_applications_insurance_fees_id").append('@if (!$InsuranceFee->isEmpty()) @foreach ($InsuranceFee->where("insurance_fees_wheeler","two_wheelers") as $item) <option data-price="{{$item->insurance_fees_total_amount}}" value="{{$item->id}}">{{ $item->insurance_fees_wheeler=='two_wheelers' ? 'Two Wheeler' : ''}}, CC From : {{$item->insurance_fees_cc_from}} To {{$item->insurance_fees_cc_to}}, Total Price : {{$item->insurance_fees_total_amount}} ({{'Third Party'}})</option> @endforeach @endif');
            
            // calTransferFees
            $("#calTransferFees").text({{ $Passing_for_two_wheeler->rto_fees_amount }} + '.00');
            $("#totalApplicationFees").val({{ $Passing_for_two_wheeler->rto_fees_amount  }});
            
            $("#calTotalFees").text({{ $Passing_for_two_wheeler->rto_fees_amount  }} + '.00');
            $("#totalfeesCal").val({{ $Passing_for_two_wheeler->rto_fees_amount  }});
        });
    </script>

    <script>
        $(function(){

            $("input:radio[name='rto_applications_rto_fees_id_check']").change(function(){
            // $('#rto_applications_rto_fees_id').change(function(){
                // var amount = $(this).find(':selected').data('price');
                var VehicleType = $(this).val();
                console.log(VehicleType);
                if(VehicleType=='two_wheelers'){
                    $("#bikeTrim_cc").text('Two Wheeler Trim(CC)');
                    
                    $("#calTransferFees").text({{ $Passing_for_two_wheeler->rto_fees_amount }} + '.00');
                    $("#calTotalFees").text({{ $Passing_for_two_wheeler->rto_fees_amount  }} + '.00');
                    $("#totalfeesCal").val({{ $Passing_for_two_wheeler->rto_fees_amount  }});
                    $("#totalApplicationFees").val({{ $Passing_for_two_wheeler->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $Passing_for_two_wheeler->id  }});
                    
                    $("#calInsuranceFees").text('0000.00');
                    $("#totalInsuranceFees").val('0');
                    $("#rto_applications_insurance_fees_id").empty();
                    $("#rto_applications_insurance_fees_id").append('<option data-price="00" value="">Select Two Wheeler Trim</option>');
                    $("#rto_applications_insurance_fees_id").append('@if (!$InsuranceFee->isEmpty()) @foreach ($InsuranceFee->where("insurance_fees_wheeler","two_wheelers") as $item) <option data-price="{{$item->insurance_fees_total_amount}}" value="{{$item->id}}">{{ $item->insurance_fees_wheeler=='two_wheelers' ? 'Two Wheeler' : ''}}, CC From : {{$item->insurance_fees_cc_from}} To {{$item->insurance_fees_cc_to}}, Total Price : {{$item->insurance_fees_total_amount}} ({{'Third Party'}})</option> @endforeach @endif');
                }else{
                    $("#bikeTrim_cc").text('Four Wheeler Trim(CC)');
                    $("#calTransferFees").text({{ $Passing_for_four_wheeler->rto_fees_amount }} + '.00');
                    $("#totalApplicationFees").val({{ $Passing_for_four_wheeler->rto_fees_amount  }});
                    // total price cal
                    $("#calTotalFees").text({{ $Passing_for_four_wheeler->rto_fees_amount }} + '.00');
                    $("#totalfeesCal").val({{ $Passing_for_four_wheeler->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $Passing_for_four_wheeler->id  }});
                    $("#calInsuranceFees").text('0000.00');
                    $("#totalInsuranceFees").val('0');

                    $("#rto_applications_insurance_fees_id").empty();
                    $("#rto_applications_insurance_fees_id").append('<option data-price="00" value="">Select Four Wheeler Trim</option>');
                    $("#rto_applications_insurance_fees_id").append('@if (!$InsuranceFee->isEmpty()) @foreach ($InsuranceFee->where("insurance_fees_wheeler","four_wheelers") as $item) <option data-price="{{$item->insurance_fees_total_amount}}" value="{{$item->id}}">{{ $item->insurance_fees_wheeler=='four_wheelers' ? 'Four Wheeler' : ''}}, @if($item->insurance_fees_is_cng=='1') IsCNG : {{'Yes'}} , CNG Fees : {{ $item->insurance_fees_cng_fees }} @else IsCNG : {{ 'No' }} @endif , CC From : {{$item->insurance_fees_cc_from}} To {{$item->insurance_fees_cc_to}}, Fees Amount : {{$item->insurance_fees_amount}}, Total Price : {{$item->insurance_fees_total_amount}} ({{'Third Party'}})</option> @endforeach @endif');
                }
            });

            $("input:radio[name='rto_applications_is_insurance']").change(function(){
                var IsInsurance = $(this).val();
                console.log(IsInsurance);
                if (IsInsurance == '0') {
                    $('#rto_applications_insurance_fees_id').prop('required',true);
                    $('#uploadBtnvalid_insurance').prop('required',false);
                } else {
                    $('#uploadBtnvalid_insurance').prop('required',true);
                    $("#rto_applications_insurance_fees_id").prop('selectedIndex',0);
                    $('#rto_applications_insurance_fees_id').prop('required',false);
                    $("#calInsuranceFees").text('0000.00');
                    $("#totalInsuranceFees").val('0');

                    var calTransferFees = $("#calTransferFees").text().replace(/[^0-9]/gi, '');
                    var calInsuranceFees = $("#calInsuranceFees").text().replace(/[^0-9]/gi, '');
                    var calTransferFeesNum = parseInt(calTransferFees) / 100 ;
                    var calInsuranceFeesNum = parseInt(calInsuranceFees) / 100 ;
                    var total = calTransferFeesNum + calInsuranceFeesNum;
                    $("#calTotalFees").text(total + '.00');
                    $("#totalfeesCal").val(total);
                    $("#totalInsuranceFees").val(calInsuranceFeesNum);
                    $("#totalApplicationFees").val(calTransferFeesNum);
                }
            });
        
        });

        // insurance price cal
        $('#rto_applications_insurance_fees_id').change(function(){
            var amount = $(this).find(':selected').data('price');
            $("#calInsuranceFees").text(amount + '.00');
            // var calTransferFees = ("#calTransferFees").text();
            var calTransferFees = $("#calTransferFees").text().replace(/[^0-9]/gi, '');
            var calInsuranceFees = $("#calInsuranceFees").text().replace(/[^0-9]/gi, '');
            var calTransferFeesNum = parseInt(calTransferFees) / 100 ;
            var calInsuranceFeesNum = parseInt(calInsuranceFees) / 100 ;
            var total = calTransferFeesNum + calInsuranceFeesNum;
            $("#calTotalFees").text(total + '.00');
            $("#totalfeesCal").val(total);
            $("#totalInsuranceFees").val(calInsuranceFeesNum);
            $("#totalApplicationFees").val(calTransferFeesNum);
            
            // console.log(total);
        });

        $("input:radio[name='residents']").change(function(){
            var IsResidents = $(this).val();
            // console.log(IsResidents);
            if (IsResidents == 'resident1') {
                $('#uploadBtnaddress_proof_1').prop('required',true);
                $('#uploadBtnaddress_proof_2').prop('required',true);

                $('#uploadBtnaadhar_election_passport_of_buyer').prop('required',false);
                $('#uploadBtnreq_rent_agreement_of_buyer').prop('required',false);
                $('#uploadBtnelectricity_bill_of_the_registered_place_on_the_agreement').prop('required',false);
            } else {
                $('#uploadBtnaadhar_election_passport_of_buyer').prop('required',true);
                $('#uploadBtnreq_rent_agreement_of_buyer').prop('required',true);
                $('#uploadBtnelectricity_bill_of_the_registered_place_on_the_agreement').prop('required',true);

                $('#uploadBtnaddress_proof_1').prop('required',false);
                $('#uploadBtnaddress_proof_2').prop('required',false);
            }
        });
    </script>

    <script>
        $('.fate').click(function () {
            $('.hidden_destiny').each(function () {
                if ($(this).is(':visible')) {
                    $(this).stop().slideUp('slow');
                }
            });
            var id = $(this).val();
            $('#clicked_' + id).stop().slideDown('slow');
        });
        $('.fate2').click(function () {
            $('.hidden_destiny').each(function () {
                if ($(this).is(':visible')) {
                    $(this).stop().slideUp('slow');
                }
            });
            var id = $(this).val();
            $('#clicked_' + id).stop().slideDown('slow');
        });

        document.getElementById("uploadBtnoriginal_rc_book").onchange = function () {
            document.getElementById("uploadFileoriginal_rc_book").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnno_objection_certificate").onchange = function () {
            document.getElementById("uploadFileno_objection_certificate").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnaddress_proof_1").onchange = function () {
            document.getElementById("uploadFileaddress_proof_1").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnaddress_proof_2").onchange = function () {
            document.getElementById("uploadFileaddress_proof_2").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnaadhar_election_passport_of_buyer").onchange = function () {
            document.getElementById("uploadFileaadhar_election_passport_of_buyer").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnreq_rent_agreement_of_buyer").onchange = function () {
            document.getElementById("uploadFilereq_rent_agreement_of_buyer").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnelectricity_bill_of_the_registered_place_on_the_agreement").onchange = function () {
            document.getElementById("uploadFileelectricity_bill_of_the_registered_place_on_the_agreement").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnvalid_insurance").onchange = function () {
            document.getElementById("uploadFilevalid_insurance").value = this.value.replace("C:\\fakepath\\", "");
        };
        
        
    </script>
@endpush