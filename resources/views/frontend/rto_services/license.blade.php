@extends('frontend.layout')
@section('title', 'License')
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
                            <li><a href="#">License</a></li>
                        </ul>
                        <h2 class="heading"> License</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="RTO-area">
            <div class="container">
                <form method="POST" class="forms-sample" action="{{ route('rto-services.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="form_type" id="license" value="license">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="transfer-details">
                                <h3>What is a License?</h3>
                                <p>2-wheeler or 4-wheeler driving license services available.</p>
                                <p> A Learner's license is issued to all eligible candidates. After a period of 30 days, they have to apply for a permanent license. 
                                </p>
                                <h3>Charges</h3>
                                <p><strong>Learner's + Permanent</strong> <br>
                                Rs. {{ $License_for_two_wheeler->rto_fees_amount ?? '' }}/- two wheelers<br>
                                Rs. {{ $License_for_four_wheeler->rto_fees_amount ?? '' }}/- four wheelers<br>
                                <strong>Both Rs. {{ $License_for_both->rto_fees_amount ?? '' }}/-</strong></p>
                                <h3>Documents Required</h3>
                                <p><strong class="text-underline">For Local Residents: </strong><br>
                                    1. Any 2 address proofs: <br>
                                    <small style="color:#c8c8c8;">[Aadhar card, Election card, Passport, Electricity Bill, Corporation tax, BSNL telephone bill]
                                    </small><br>
                                    2. PAN Card 
                                </p>
                                <p><strong class="text-underline">For Residents on Rent: </strong><br>
                                    (Submit All) <br> </p>
                                <ul>
                                    <li>- Aadhar card / Election card</li>
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
                                        <div class="col-md-12 pt-40">
                                            <div class="form-group">
                                                <input type="radio" class="fate" name="residents" required id="resident1" value="resident1" />
                                                <label for="resident1">For local residents</label>
                                                <input type="radio" required class="fate" name="residents" id="resident2" value="resident2" />
                                                <label for="resident2">For residents staying on rent</label>
                                            </div>
                                            @error('residents')
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
                                                </div>
                                                @error('address_proof_1')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                                                                        
                                                <div class="form-group">
                                                    <label>Address Proof 2 <span class="tooltip"><i class="fa fa-info"></i><span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileaddress_proof_2" class="f-input" readonly  placeholder="Upload Address 2"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnaddress_proof_2" name="address_proof_2" type="file" class="upload"/>
                                                    </div>
                                                </div> 
                                                @error('address_proof_2')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror 
                                                                                        
                                                <div class="form-group">
                                                    <label>Pan Card <span class="tooltip"><i class="fa fa-info"></i><span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFilepan_card" readonly class="f-input"  placeholder="Upload Pan Card"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnpan_card" name="pan_card" type="file" class="upload"/>
                                                    </div>
                                                </div>  
                                                @error('pan_card')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror  
                                            </div>

                                            <div id="clicked_resident2" class="hidden_destiny">	
                                                <div class="form-group">
                                                    <label>Aadhar Card / Election Card / Passport <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileaadhar_election_passport" class="f-input" readonly placeholder="Upload One of the above"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnaadhar_election_passport" name="aadhar_election_passport" type="file" class="upload"/>
                                                    </div>
                                                </div>
                                                @error('aadhar_election_passport')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror  
                                                                                        
                                                <div class="form-group">
                                                    <label>Registered Rent Agreement <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileregistered_rent_agreement" class="f-input" readonly placeholder="Upload Rent Agreement"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnregistered_rent_agreement" name="registered_rent_agreement" type="file" class="upload"/>
                                                    </div>
                                                </div> 
                                                @error('registered_rent_agreement')
                                                    <span style="color:red;">{{ $message }}</span>
                                                @enderror
                                            
                                                <div class="form-group">
                                                    <label>Electricity Bill <span class="tooltip"><i class="fa fa-info"></i>
                                                    <span class="tooltiptext">Information</span></span></label>
                                                    <input id="uploadFileelectricity_bill" class="f-input" readonly placeholder="Upload Electricity Bill"/>
                                                    <div class="fileUpload btn btn--browse">
                                                        <span><i class="fa fa-upload"></i></span>
                                                        <input id="uploadBtnelectricity_bill" name="electricity_bill" type="file" class="upload"/>
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


                        <input type="hidden" name="rto_applications_rto_fees_id" id="rto_applications_rto_fees_idval" value="{{$License_for_two_wheeler->id}}">

                        <input type="hidden" name="rto_applications_is_insurance"  value="1">

                        <input type="hidden" name="rto_applications_total_amount" id="totalfeesCal">
                        {{-- <input type="hidden" name="rto_applications_insurance_amount" id="totalInsuranceFees"> --}}
                        <input type="hidden" name="rto_applications_application_fees" id="totalApplicationFees">
                        
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
                                                <label>Vehicle Type</label>
                                                <input type="radio" id="2whhel" name="rto_applications_rto_fees_id_check" value="two_wheelers" required checked>
                                                <label for="2whhel">Two Wheeler</label>
                                                <input type="radio" id="4whhel" name="rto_applications_rto_fees_id_check" value="four_wheelers" required>
                                                <label for="4whhel">Four Wheeler</label>
                                                <input type="radio" id="both" name="rto_applications_rto_fees_id_check" value="License_for_both" required>
                                                <label for="both">Both</label>
                                            </div>
                                            @error('rto_applications_rto_fees_id_check')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                            
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
                                    
                                    {{-- <div class="row">
                                        <div class="col-xs-7 center">
                                            <p>RTO Insurance Fees :</p>
                                        </div>
                                        <div class="col-xs-5 right">
                                            <p><i class="fa fa-rupee"></i> 3000.00</p>
                                        </div>
                                    </div> --}}
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
                                    <a href="{{ route('rto-services.show', $rto_transfer='rto-transfer') }}">
                                        <div class="o-ser">
                                            <h3>RTO Transfer</h3>
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
            
            // calTransferFees
            $("#calTransferFees").text({{ $License_for_two_wheeler->rto_fees_amount }} + '.00');
            // $("#totalApplicationFees").val({{ $License_for_two_wheeler->rto_fees_amount  }});
            
            $("#calTotalFees").text({{ $License_for_two_wheeler->rto_fees_amount  }} + '.00');
            // $("#totalfeesCal").val({{ $License_for_two_wheeler->rto_fees_amount  }});
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
                    
                    $("#calTransferFees").text({{ $License_for_two_wheeler->rto_fees_amount }} + '.00');
                    $("#calTotalFees").text({{ $License_for_two_wheeler->rto_fees_amount  }} + '.00');
                    // $("#totalfeesCal").val({{ $License_for_two_wheeler->rto_fees_amount  }});
                    // $("#totalApplicationFees").val({{ $License_for_two_wheeler->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $License_for_two_wheeler->id  }});

                }else if(VehicleType=='four_wheelers'){
                    $("#calTransferFees").text({{ $License_for_four_wheeler->rto_fees_amount }} + '.00');
                    // $("#totalApplicationFees").val({{ $License_for_four_wheeler->rto_fees_amount  }});
                    // total price cal
                    $("#calTotalFees").text({{ $License_for_four_wheeler->rto_fees_amount }} + '.00');
                    // $("#totalfeesCal").val({{ $License_for_four_wheeler->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $License_for_four_wheeler->id  }});
                }else{
                    $("#calTransferFees").text({{ $License_for_both->rto_fees_amount }} + '.00');
                    // $("#totalApplicationFees").val({{ $License_for_both->rto_fees_amount  }});
                    // total price cal
                    $("#calTotalFees").text({{ $License_for_both->rto_fees_amount }} + '.00');
                    // $("#totalfeesCal").val({{ $License_for_both->rto_fees_amount  }});
                    $("#rto_applications_rto_fees_idval").val({{ $License_for_both->id  }});
                }
            });
        
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

        $("input:radio[name='residents']").change(function(){
            var IsResidents = $(this).val();
            // console.log(IsResidents);
            if (IsResidents == 'resident1') {
                $('#uploadBtnaddress_proof_1').prop('required',true);
                $('#uploadBtnaddress_proof_2').prop('required',true);
                $('#uploadBtnpan_card').prop('required',true);

                $('#uploadBtnaadhar_election_passport').prop('required',false);
                $('#uploadBtnregistered_rent_agreement').prop('required',false);
                $('#uploadBtnelectricity_bill').prop('required',false);
            } else {
                $('#uploadBtnaadhar_election_passport').prop('required',true);
                $('#uploadBtnregistered_rent_agreement').prop('required',true);
                $('#uploadBtnelectricity_bill').prop('required',true);

                $('#uploadBtnaddress_proof_1').prop('required',false);
                $('#uploadBtnaddress_proof_2').prop('required',false);
                $('#uploadBtnpan_card').prop('required',false);
            }
        });

        document.getElementById("uploadBtnaddress_proof_1").onchange = function () {
            document.getElementById("uploadFileaddress_proof_1").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnaddress_proof_2").onchange = function () {
            document.getElementById("uploadFileaddress_proof_2").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnpan_card").onchange = function () {
            document.getElementById("uploadFilepan_card").value = this.value.replace("C:\\fakepath\\", "");
        };

        document.getElementById("uploadBtnaadhar_election_passport").onchange = function () {
            document.getElementById("uploadFileaadhar_election_passport").value = this.value.replace("C:\\fakepath\\", "");
        };
        document.getElementById("uploadBtnregistered_rent_agreement").onchange = function () {
            document.getElementById("uploadFileregistered_rent_agreement").value = this.value.replace("C:\\fakepath\\", "");
        };
        
        document.getElementById("uploadBtnelectricity_bill").onchange = function () {
            document.getElementById("uploadFileelectricity_bill").value = this.value.replace("C:\\fakepath\\", "");
        };
        
        
    </script>
@endpush