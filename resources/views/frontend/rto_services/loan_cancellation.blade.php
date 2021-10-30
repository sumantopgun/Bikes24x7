@extends('frontend.layout')
@section('title', 'Loan cancellation (Hypothecation cancellation)')
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
                            <li><a href="#">Loan Cancellation</a></li>
                        </ul>
                        <h2 class="heading"> Loan Cancellation
                        <span> (Hypothecation Cancellation) </span></h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="RTO-area">
            <div class="container">
                <form method="POST" class="forms-sample" action="{{ route('rto-services.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="form_type" id="loan_cancellation" value="loan_cancellation">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="transfer-details">
                                <h3>What is a Loan Cancellation?</h3>
                                <p>Required if you want to cancel the loan on your vehicle. </p>
                                <p>If you have completely paid off the loan on your vehicle, then the finance company issues a Bank NOC which has to be submitted to the RTO for the cancellation of your loan from the registration certificate.
                                </p>
                                <h3>Charges</h3>
                                <p>Rs. {{ $loan_cancellation_for_two_wheeler->rto_fees_amount ?? '' }}/- two wheelers<br>
                                Rs. {{ $loan_cancellation_for_four_wheeler->rto_fees_amount ?? '' }}/- four wheelers<br>
                                </p>
                                <h3>Documents Required</h3>
                                <p>1. Original RC book </p>
                                <p>2. Aadhar card/ election card, Passport of the registered owner.</p>
                                <p> 3. PAN Card of the registered Owner </p>
                                <p>4. Bank NOC**<br>
                                <small> a. Covering Letter - signed by bank <br>
                                b. Form 35 (2 copies) - signed by bank </small>
                                </p>
                                <p>5. Valid insurance if available </p>

                                <p class="pt-40">**Forms below to be downloaded, signed and uploaded </p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="transfer-doc">
                                <h3>Upload Documents</h3>
                                {{-- <form> --}}
                                    <div class="row pt-40">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Original RC <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFileoriginal_rc_book" readonly class="f-input" placeholder="Upload Original RC"/>
                                                <div class="fileUpload btn btn--browse">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input id="uploadBtnoriginal_rc_book" type="file" name="original_rc_book" required class="upload" />
                                                </div>
                                                @error('original_rc_book')
                                                    <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Aadhar Card / Election Card / Passport of Registered Owner
                                                <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFileaadhar_election_passport_owner" class="f-input" readonly placeholder="Upload Aadhar card"/>
                                                <div class="fileUpload btn btn--browse">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input id="uploadBtnaadhar_election_passport_owner" name="aadhar_election_passport_owner" required type="file" class="upload" />
                                                </div>
                                                @error('aadhar_election_passport_owner')
                                                    <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>PAN Card of Registered Owner 
                                                <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFileowner_pan_card" class="f-input" readonly placeholder="Upload Pan card"/>
                                                <div class="fileUpload btn btn--browse">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input id="uploadBtnowner_pan_card" name="owner_pan_card" required type="file" class="upload" />
                                                </div>
                                                @error('owner_pan_card')
                                                    <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <input type="hidden" name="rto_applications_rto_fees_id" id="rto_applications_rto_fees_idval" value="{{$loan_cancellation_for_two_wheeler->id}}">

                                        <input type="hidden" name="rto_applications_total_amount" id="totalfeesCal">
                                        <input type="hidden" name="rto_applications_insurance_amount" id="totalInsuranceFees">
                                        <input type="hidden" name="rto_applications_application_fees" id="totalApplicationFees">
                                        
                                        <div class="col-md-12">
                                            <h5>Bank NOC :</h5>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Covering letter signed by bank   <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFilecovering_letter_signed_by_bank" readonly class="f-input" placeholder="Upload Covering letter "/>
                                                <div class="fileUpload btn btn--browse">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input id="uploadBtncovering_letter_signed_by_bank" name="covering_letter_signed_by_bank" required type="file" class="upload" />
                                                </div>
                                                @error('covering_letter_signed_by_bank')
                                                    <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Form 35 signed by bank   <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFileform_35_signed_by_bank" readonly class="f-input" placeholder="Upload Form 35 "/>
                                                <div class="fileUpload btn btn--browse">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input id="uploadBtnform_35_signed_by_bank" name="form_35_signed_by_bank" required type="file" class="upload" />
                                                </div>
                                                @error('form_35_signed_by_bank')
                                                    <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
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
                                                <input type="radio" id="4whhel" name="rto_applications_rto_fees_id_check" value="four_wheelers" required>
                                                <label for="4whhel">Four Wheeler</label>
                                            </div>
                                            @error('rto_applications_rto_fees_id_check')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror

                                            <hr>

                                            <div class="form-group">
                                                <label  class="d-inline-block"> Valid Insurance</label>
                                                <input type="radio" class="fate2" name="rto_applications_is_insurance" id="insureance1" value="1" required />
                                                <label for="insureance1">Yes</label>
        
                                                <input type="radio" class="fate2" name="rto_applications_is_insurance" id="insureance2" value="0" required />
                                                <label for="insureance2">No</label>
                                            </div>

                                            <div id="clicked_1" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <input id="uploadFilevalid_insurance" readonly class="f-input"  placeholder="Upload Valid Insurance"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnvalid_insurance" name="valid_insurance" type="file" class="upload"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="clicked_0" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <span class="text-danger">Extra Charges will be applied on third party Insurance</span>
                                                    <label id="bikeTrim_cc">Two Wheeler Trim(CC)</label>
                                                    <select class="form-control" name="rto_applications_insurance_fees_id" id="rto_applications_insurance_fees_id">
                                                        <option>Select Bike Trim</option>
                                                    </select>
                                                </div>
                                                @error('rto_applications_insurance_fees_id')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
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
                        
                        <div class="col-md-6">
                                <div class="download-form">
                                    <h3>Please download and sign these forms :</h3>
                                    <ul>
                                        <li><a href=""><img src="{{ asset('frontend/images/form-icon.png')}}"/><span>Covering Letter</span></a></li>
                                        <li><a href=""><img src="{{ asset('frontend/images/form-icon.png')}}"/><span>Form 35</span></a></li>
                                    </ul> 
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
                                            <h4><i class="fa fa-rupee"></i><span id="calTotalFees"> 0000.00</span></h4>
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
                                    <a href="{{ route('rto-services.show', $passing='passing') }}">
                                        <div class="o-ser">
                                            <h3>Passing</h3>
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
    {{-- <script src="{{ asset('admin_template/js/file-upload.js')}}"></script> --}}

    <script>
        $(document).ready(function(){
            $("#rto_applications_insurance_fees_id").empty();
            $("#rto_applications_insurance_fees_id").append('<option data-price="00" value="">Select Two Wheeler Trim</option>');
            $("#rto_applications_insurance_fees_id").append('@if (!$InsuranceFee->isEmpty()) @foreach ($InsuranceFee->where("insurance_fees_wheeler","two_wheelers") as $item) <option data-price="{{$item->insurance_fees_total_amount}}" value="{{$item->id}}">{{ $item->insurance_fees_wheeler=='two_wheelers' ? 'Two Wheeler' : ''}}, CC From : {{$item->insurance_fees_cc_from}} To {{$item->insurance_fees_cc_to}}, Total Price : {{$item->insurance_fees_total_amount}} ({{'Third Party'}})</option> @endforeach @endif');
            
            // calTransferFees
            $("#calTransferFees").text({{ $loan_cancellation_for_two_wheeler->rto_fees_amount }} + '.00');
            $("#totalApplicationFees").val({{ $loan_cancellation_for_two_wheeler->rto_fees_amount  }});
            
            $("#calTotalFees").text({{ $loan_cancellation_for_two_wheeler->rto_fees_amount  }} + '.00');
            $("#totalfeesCal").val({{ $loan_cancellation_for_two_wheeler->rto_fees_amount  }});           
        
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
                    $("#calTransferFees").text({{ $loan_cancellation_for_two_wheeler->rto_fees_amount }} + '.00');
                    $("#calTotalFees").text({{ $loan_cancellation_for_two_wheeler->rto_fees_amount  }} + '.00');
                    $("#totalfeesCal").val({{ $loan_cancellation_for_two_wheeler->rto_fees_amount  }});
                    $("#totalApplicationFees").val({{ $loan_cancellation_for_two_wheeler->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $loan_cancellation_for_two_wheeler->id  }});
                    
                    $("#calInsuranceFees").text('0000.00');
                    $("#totalInsuranceFees").val('0');
                    $("#rto_applications_insurance_fees_id").empty();
                    $("#rto_applications_insurance_fees_id").append('<option data-price="00" value="">Select Two Wheeler Trim</option>');
                    $("#rto_applications_insurance_fees_id").append('@if (!$InsuranceFee->isEmpty()) @foreach ($InsuranceFee->where("insurance_fees_wheeler","two_wheelers") as $item) <option data-price="{{$item->insurance_fees_total_amount}}" value="{{$item->id}}">{{ $item->insurance_fees_wheeler=='two_wheelers' ? 'Two Wheeler' : ''}}, CC From : {{$item->insurance_fees_cc_from}} To {{$item->insurance_fees_cc_to}}, Total Price : {{$item->insurance_fees_total_amount}} ({{'Third Party'}})</option> @endforeach @endif');
                }else{
                    $("#bikeTrim_cc").text('Four Wheeler Trim(CC)');
                    $("#calTransferFees").text({{ $loan_cancellation_for_four_wheeler->rto_fees_amount }} + '.00');
                    $("#totalApplicationFees").val({{ $loan_cancellation_for_four_wheeler->rto_fees_amount  }});
                    // total price cal
                    $("#calTotalFees").text({{ $loan_cancellation_for_four_wheeler->rto_fees_amount }} + '.00');
                    $("#totalfeesCal").val({{ $loan_cancellation_for_four_wheeler->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $loan_cancellation_for_four_wheeler->id  }});
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
                    $('#rto_applications_insurance_fees_id').prop('',false);
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
        document.getElementById("uploadBtnaadhar_election_passport_owner").onchange = function () {
            document.getElementById("uploadFileaadhar_election_passport_owner").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnowner_pan_card").onchange = function () {
            document.getElementById("uploadFileowner_pan_card").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtncovering_letter_signed_by_bank").onchange = function () {
            document.getElementById("uploadFilecovering_letter_signed_by_bank").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnform_35_signed_by_bank").onchange = function () {
            document.getElementById("uploadFileform_35_signed_by_bank").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnvalid_insurance").onchange = function () {
            document.getElementById("uploadFilevalid_insurance").value = this.value.replace("C:\\fakepath\\", "");
        };
        
        
    </script>
@endpush