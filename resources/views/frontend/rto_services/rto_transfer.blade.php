@extends('frontend.layout')
@section('title', 'RTO transfer')
@section('rto_services', 'active')
@push('style')    
 
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
                            <li><a href="#">RC Transfer</a></li>
                        </ul>
                        <h2 class="heading"> RC Transfer</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="RTO-area">
            <div class="container">
                <form method="POST" class="forms-sample" action="{{ route('rto-services.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="form_type" id="rto_transfer" value="rto_transfer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="transfer-details">
                                <h3>What is RC Transfer ?</h3>
                                <p>Required to transfer the ownership of your vehicles under the same RTO jurisdiction</p>
                                <p>If the address of the transferee is within the same RTO limits as the original RTO registration, then the ownership is directly transferred.</p>
                                <h3>Charges</h3>
                                <p>Rs. {{ $RTO_transfer_for_two_wheeler->rto_fees_amount ?? '' }}/- two wheelers<br>
                                Rs. {{ $RTO_transfer_for_four_wheeler->rto_fees_amount ?? '' }}/- four wheelers<br>
                                [transfer fee + service charges]</p>
                                <h3>Documents Required</h3>
                                <p>
                                    <strong>Seller's Documents</strong><br>
                                    1. Original RC<br>
                                    2. Aadhar Card of Seller<br>
                                    3. PAN Card of Seller
                                </p>
                                <p>
                                    <strong>Buyer's Documents</strong><br>
                                    <span class="text-underline">For local Residents:</span><br>
                                    (Any 2 address proofs)
                                </p>
                                <ul>
                                    <li>- Aadhar card</li>
                                    <li>- Election card</li>
                                    <li>- Passport</li>
                                    <li>- Electricity Bill</li>
                                    <li>- Corporation tax</li>
                                    <li>- BSNL telephone bill</li>
                                </ul>
                                <p>
                                <span class="text-underline">For Residents on Rent:</span><br>
                                    (Submit All)
                                </p>
                                <ul>
                                    <li>- Aadhar Card / Election Card / Passport</li>
                                    <li>- Registered Rent Agreement</li>
                                    <li>- Electricity Bill</li>
                                </ul>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="transfer-doc">
                                <h3>Upload Documents</h3>
                                {{-- <form> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>For Seller</h4>
                                            </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Original RC <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFileoriginal_rc_book" name="original_rc_book1" class="f-input" readonly placeholder="Upload Original RC"/>
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
                                                <label>Aadhar Card of Seller <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFileseller_aadhar_card" name="seller_aadhar_card1" readonly class="f-input" placeholder="Upload Aadhar card"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnseller_aadhar_card" type="file" name="seller_aadhar_card" required class="upload" />
                                                    </div>
                                                    @error('seller_aadhar_card')
                                                        <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                        <span style="color:red;">{{ $message }}</span>
                                                    @enderror
                                                    
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label>Pan Card of Seller <span class="tooltip"><i class="fa fa-info"></i>
                                                <span class="tooltiptext">Information</span></span></label>
                                                <input id="uploadFileseller_pan_card" name="seller_pan_card1" readonly class="f-input" placeholder="Upload Pan card"/>
                                                <div class="fileUpload btn btn--browse">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input id="uploadBtnseller_pan_card" type="file" name="seller_pan_card" required class="upload" />
                                                </div>
                                                @error('seller_pan_card')
                                                    <span class="upload-action"><img src="{{ asset('frontend/images/action2.png')}}"></span>
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                        </div>

                                        <input type="hidden" name="rto_applications_rto_fees_id" id="rto_applications_rto_fees_idval" value="{{$RTO_transfer_for_two_wheeler->id}}">

                                        <div class="col-md-12">
                                            <h4>For Buyers</h4>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="radio" required class="fate" name="residents" id="resident1" value="resident1" />
                                                <label for="resident1">For local residents</label>
                                                <input type="radio" class="fate" name="residents" required id="resident2" value="resident2" />
                                                <label for="resident2">For residents staying on rent</label>
                                            </div>
                                            @error('residents')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror

                                            <div id="clicked_resident1" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <label>Address Proof 1 <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileaddress_proof_1" name="address_proof_11" readonly class="f-input"  placeholder="Upload Address 1"/>

                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span><input id="uploadBtnaddress_proof_1" type="file" name="address_proof_1" class="upload"/>
                                                    </div>
                                                </div>
                                                @error('address_proof_1')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                                                                        
                                                <div class="form-group">
                                                    <label>Address Proof 2 <span class="tooltip"><i class="fa fa-info"></i><span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileaddress_proof_2" class="f-input" name="address_proof_22" readonly  placeholder="Upload Address 2"/>

                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span><input id="uploadBtnaddress_proof_2" type="file" name="address_proof_2" class="upload"/>
                                                    </div>
                                                </div>  
                                                @error('address_proof_2')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror                                          
                                            </div>

                                            <div id="clicked_resident2" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <label>Aadhar Card/ Election Card/ Passport of Buyer <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileaadhar_election_passport" name="aadhar_election_passport1" readonly class="f-input"  placeholder="Upload One of the above"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnaadhar_election_passport" type="file" name="aadhar_election_passport" class="upload"/>
                                                    </div>
                                                </div>
                                                @error('aadhar_election_passport')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                                                                        
                                                <div class="form-group">
                                                    <label>Registered Rent Agreement of Buyer <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFilereg_rent_agreement" name="reg_rent_agreement1" readonly class="f-input"  placeholder="Upload Rent Agreement of Buyer"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnreg_rent_agreement" type="file" name="reg_rent_agreement" class="upload"/>
                                                    </div>
                                                </div> 
                                                @error('reg_rent_agreement')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            
                                                <div class="form-group">
                                                    <label>Electricity Bill of the registered place on the agreement <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileelectricity_bill" name="electricity_bill1" readonly class="f-input"  placeholder="Upload Electricity Bill"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnelectricity_bill" type="file" name="electricity_bill" class="upload"/>
                                                    </div>
                                                </div>  
                                                @error('electricity_bill')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror                                         
                                            </div>
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>
                            
                        </div>

                        <input type="hidden" name="rto_applications_total_amount" id="totalfeesCal">
                        <input type="hidden" name="rto_applications_insurance_amount" id="totalInsuranceFees">
                        <input type="hidden" name="rto_applications_application_fees" id="totalApplicationFees">
                        
                        <div class="col-md-6">
                            <div class="transfer-doc">
                                {{-- <form> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>RTO Office</label>
                                                <select class="form-control" name="rto_applications_office_id">
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
                                                <label>Vehicle Type</label>
                                                <input type="radio" id="2whhel" name="rto_applications_rto_fees_id_check" checked required value="two_wheelers">
                                                <label for="2whhel">Two Wheeler</label>
                                                <input type="radio" id="4whhel" name="rto_applications_rto_fees_id_check" value="four_wheelers" required>
                                                <label for="4whhel">Four Wheeler</label>
                                            </div>
                                            @error('rto_applications_rto_fees_id_check')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                            <hr>

                                            <div class="form-group">
                                                <label>Valid insurance</label>
                                                <input type="radio" class="fate2" name="rto_applications_is_insurance" id="insureance1" value="1" required />
                                                <label for="insureance1">Yes</label>
                                                <input type="radio" class="fate2" name="rto_applications_is_insurance" id="insureance2" value="0" required />
                                                <label for="insureance2">No</label>
                                            </div>
                                            @error('rto_applications_is_insurance')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror

                                            <div id="clicked_1" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <input id="uploadFilevalid_insurance" name="valid_insurance1" readonly class="f-input"  placeholder="Upload Valid Insurance"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnvalid_insurance" type="file" name="valid_insurance" class="upload"/>
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
                                                        <option>Select Bike Trim</option>
                                                    </select>
                                                </div>
                                                @error('rto_applications_insurance_fees_id')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <hr>
                                            <div class="form-group">
                                                <input type="checkbox" name="checkbox" required><span>Accept <a target="blank" href="{{ route('termsconditions') }}">Terms & Conditions</a></span>
                                            </div>
                                            @error('checkbox')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                {{-- </form> --}}
                            </div>
                            
                        </div>

                        @if (!$rtoDocs->isEmpty())
                            <div class="col-md-6">
                                <div class="download-form">
                                    <h3>Please download and sign these forms :</h3>
                                    <ul>
                                        @foreach ($rtoDocs->where('rto_document_services_name','rc_transfer') as $form)
                                            <li><a href="{{asset('storage/'.$form->rto_document_file ?? '#')}}" download=""><img src="{{ asset('frontend/images/form-icon.png')}}"/><span>{{ $form->rto_document_file_name ?? ''}}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        
                        
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
                                        <p><i class="fa fa-rupee"></i><span id="calInsuranceFees"> 0000.00</span></p>
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
    <script src="{{ asset('admin_template/js/file-upload.js')}}"></script>
    {{-- <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        }); 
    </script> --}}
    <script>
        $(document).ready(function(){
            $("#rto_applications_insurance_fees_id").empty();
            $("#rto_applications_insurance_fees_id").append('<option data-price="00" value="">Select Two Wheeler Trim</option>');
            $("#rto_applications_insurance_fees_id").append('@if (!$InsuranceFee->isEmpty()) @foreach ($InsuranceFee->where("insurance_fees_wheeler","two_wheelers") as $item) <option data-price="{{$item->insurance_fees_total_amount}}" value="{{$item->id}}">{{ $item->insurance_fees_wheeler=='two_wheelers' ? 'Two Wheeler' : ''}}, CC From : {{$item->insurance_fees_cc_from}} To {{$item->insurance_fees_cc_to}}, Total Price : {{$item->insurance_fees_total_amount}} ({{'Third Party'}})</option> @endforeach @endif');
            
            // calTransferFees
            $("#calTransferFees").text({{ $RTO_transfer_for_two_wheeler->rto_fees_amount }} + '.00');
            $("#totalApplicationFees").val({{ $RTO_transfer_for_two_wheeler->rto_fees_amount  }});
            
            $("#calTotalFees").text({{ $RTO_transfer_for_two_wheeler->rto_fees_amount  }} + '.00');
            $("#totalfeesCal").val({{ $RTO_transfer_for_two_wheeler->rto_fees_amount  }});

            
        
        });
    </script>
    <script>
        $(function(){

            $("input:radio[name='rto_applications_rto_fees_id_check']").change(function(){
            // $('#rto_applications_rto_fees_id').change(function(){
                // var amount = $(this).find(':selected').data('price');
                var VehicleType = $(this).val();
                // console.log(VehicleType);
                if(VehicleType=='two_wheelers'){
                    $("#bikeTrim_cc").text('Two Wheeler Trim(CC)');
                    $("#calTransferFees").text({{ $RTO_transfer_for_two_wheeler->rto_fees_amount }} + '.00');
                    $("#calTotalFees").text({{ $RTO_transfer_for_two_wheeler->rto_fees_amount  }} + '.00');
                    $("#totalfeesCal").val({{ $RTO_transfer_for_two_wheeler->rto_fees_amount  }});
                    $("#totalApplicationFees").val({{ $RTO_transfer_for_two_wheeler->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $RTO_transfer_for_two_wheeler->id  }});
                    
                    $("#calInsuranceFees").text(' 0000.00');
                    $("#totalInsuranceFees").val('0');
                    $("#rto_applications_insurance_fees_id").empty();
                    $("#rto_applications_insurance_fees_id").append('<option data-price="00" value="">Select Two Wheeler Trim</option>');
                    $("#rto_applications_insurance_fees_id").append('@if (!$InsuranceFee->isEmpty()) @foreach ($InsuranceFee->where("insurance_fees_wheeler","two_wheelers") as $item) <option data-price="{{$item->insurance_fees_total_amount}}" value="{{$item->id}}">{{ $item->insurance_fees_wheeler=='two_wheelers' ? 'Two Wheeler' : ''}}, CC From : {{$item->insurance_fees_cc_from}} To {{$item->insurance_fees_cc_to}}, Total Price : {{$item->insurance_fees_total_amount}} ({{'Third Party'}})</option> @endforeach @endif');
                }else{
                    $("#bikeTrim_cc").text('Four Wheeler Trim(CC)');
                    $("#calTransferFees").text({{ $RTO_transfer_for_four_wheeler->rto_fees_amount }} + '.00');
                    $("#totalApplicationFees").val({{ $RTO_transfer_for_four_wheeler->rto_fees_amount  }});
                    // total price cal
                    $("#calTotalFees").text({{ $RTO_transfer_for_four_wheeler->rto_fees_amount }} + '.00');
                    $("#totalfeesCal").val({{ $RTO_transfer_for_four_wheeler->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $RTO_transfer_for_four_wheeler->id  }});
                    $("#calInsuranceFees").text(' 0000.00');
                    $("#totalInsuranceFees").val('0');

                    $("#rto_applications_insurance_fees_id").empty();
                    $("#rto_applications_insurance_fees_id").append('<option data-price="00" value="">Select Four Wheeler Trim</option>');
                    $("#rto_applications_insurance_fees_id").append('@if (!$InsuranceFee->isEmpty()) @foreach ($InsuranceFee->where("insurance_fees_wheeler","four_wheelers") as $item) <option data-price="{{$item->insurance_fees_total_amount}}" value="{{$item->id}}">{{ $item->insurance_fees_wheeler=='four_wheelers' ? 'Four Wheeler' : ''}}, @if($item->insurance_fees_is_cng=='1') IsCNG : {{'Yes'}} , CNG Fees : {{ $item->insurance_fees_cng_fees }} @else IsCNG : {{ 'No' }} @endif , CC From : {{$item->insurance_fees_cc_from}} To {{$item->insurance_fees_cc_to}}, Fees Amount : {{$item->insurance_fees_amount}}, Total Price : {{$item->insurance_fees_total_amount}} ({{'Third Party'}})</option> @endforeach @endif');
                }
            });

            $("input:radio[name='residents']").change(function(){
                var IsResidents = $(this).val();
                // console.log(IsResidents);
                if (IsResidents == 'resident1') {
                    $('#uploadBtnaddress_proof_1').prop('required',true);
                    $('#uploadBtnaddress_proof_2').prop('required',true);
                    $('#uploadBtnaadhar_election_passport').prop('required',false);
                    $('#uploadBtnreg_rent_agreement').prop('required',false);
                    $('#uploadBtnelectricity_bill').prop('required',false);
                } else {
                    $('#uploadBtnaadhar_election_passport').prop('required',true);
                    $('#uploadBtnreg_rent_agreement').prop('required',true);
                    $('#uploadBtnelectricity_bill').prop('required',true);
                    $('#uploadBtnaddress_proof_1').prop('required',false);
                    $('#uploadBtnaddress_proof_2').prop('required',false);
                }
            });

            $("input:radio[name='rto_applications_is_insurance']").change(function(){
                var IsInsurance = $(this).val();
                console.log(IsInsurance);
                if (IsInsurance == '0') {
                    // $('#InsuranceFeesList').show();
                    $('#rto_applications_insurance_fees_id').prop('required',true);
                    $('#uploadBtnvalid_insurance').prop('required',false);
                } else {
                    $('#uploadBtnvalid_insurance').prop('required',true);
                    // $('#InsuranceFeesList').hide();
                    $("#rto_applications_insurance_fees_id").prop('selectedIndex',0);
                    $('#rto_applications_insurance_fees_id').prop('required',false);
                    $("#calInsuranceFees").text(' 0000.00');
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
            // console.log(id);
            $('#clicked_' + id).stop().slideDown('slow');
        });

        document.getElementById("uploadBtnoriginal_rc_book").onchange = function () {
            document.getElementById("uploadFileoriginal_rc_book").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnseller_aadhar_card").onchange = function () {
            document.getElementById("uploadFileseller_aadhar_card").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnseller_pan_card").onchange = function () {
            document.getElementById("uploadFileseller_pan_card").value = this.value.replace("C:\\fakepath\\", "");
        };

        document.getElementById("uploadBtnaddress_proof_1").onchange = function () {
            document.getElementById("uploadFileaddress_proof_1").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnaddress_proof_2").onchange = function () {
            document.getElementById("uploadFileaddress_proof_2").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnaadhar_election_passport").onchange = function () {
            document.getElementById("uploadFileaadhar_election_passport").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnreg_rent_agreement").onchange = function () {
            document.getElementById("uploadFilereg_rent_agreement").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnelectricity_bill").onchange = function () {
            document.getElementById("uploadFileelectricity_bill").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnvalid_insurance").onchange = function () {
            document.getElementById("uploadFilevalid_insurance").value = this.value.replace("C:\\fakepath\\", "");
        };
            
            
    </script>
@endpush