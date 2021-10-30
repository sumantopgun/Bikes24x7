@extends('frontend.layout')
@section('title', 'Sell Your Used Bike Online')
@section('meta_desc', 'Want to sell your bike? We help to sell your second hand two wheeler hassle-free within an hour. Also check out our verified bike value calculator for best deals.')
@section('meta_keywords', 'sell your bike, sell two wheeler, sell old bike, sell used bike, i want to sell my bike, want to sell my bike, sell two wheeler online, sell your bike online, sell old bikes near me, bike to sell near me, i want to sell my bike online, bike price calculator, bike value calculator, check my bike price, check your bike value, two wheeler valuation calculator')
@section('sellBike', 'active')
@push('style') 
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css')}}" type="text/css">
    <style>
        .has-errorRc {
            border: 1px solid #a94442;
        }
        .empty_dd {
            height: 90px;
        }
        .enquiry_btn {
            border: 2px #414579 solid;
        }
        @media only screen and (max-width: 992px) {
            .empty_dd {
                height: auto;
            }
        }
    </style>
@endpush
@section('content')
@if (Cookie::get('bike_name'))
    <div class="main2">
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li>Home</li>
                            <li><a href="#">Sell Bike</a></li>
                            <li><a href="#">Bike Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="product-show-area">
            <div class="container">
                <div class="row">
                    <div class="product-show">
                        <div class="col-md-7">
                            <!-- Slider -->
                            <div class="product-display">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div id="product__slider">
                                            <div class="product__slider-main">
                                                <div class="slide">
                                                    @if (Cookie::get('bike_image'))
                                                        <img src="{{asset('storage/'.Cookie::get('bike_image'))}}" alt="" class="img-responsive">
                                                    @else
                                                        <img src="{{ asset('frontend/images/gixxer.jpg')}}" alt="" class="img-responsive">
                                                    @endif
                                                </div>
                                                {{-- <div class="slide">
                                                    <img src="{{ asset('frontend/images/gixxer.jpg')}}" alt="" class="img-responsive">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{ asset('frontend/images/gixxer.jpg')}}" alt="" class="img-responsive">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{ asset('frontend/images/gixxer.jpg')}}" alt="" class="img-responsive">
                                                </div> --}}
                                            </div>
                                            <div class="product__slider-thmb">
                                                <div class="slide">
                                                    @if (Cookie::get('bike_image'))
                                                        <img src="{{asset('storage/'.Cookie::get('bike_image'))}}" alt="" class="img-responsive">
                                                    @else
                                                        <img src="{{ asset('frontend/images/gixxer.jpg')}}" alt="" class="img-responsive">
                                                    @endif
                                                </div>
                                                {{-- <div class="slide">
                                                    <img src="{{ asset('frontend/images/gixxer.jpg')}}" alt="" class="img-responsive">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{ asset('frontend/images/gixxer.jpg')}}" alt="" class="img-responsive">
                                                </div>
                                                <div class="slide">
                                                    <img src="{{ asset('frontend/images/gixxer.jpg')}}" alt="" class="img-responsive">
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <!--/Slider-->
                        </div>
                        <div class="col-md-5">
                            <div class="bike-details2">
                                <h2>{{ Cookie::get('bike_name') ?? '' }}</h2>
                                <div class="use-d">
                                    <div class="row">
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size" src="{{ asset('frontend/images/icon1.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">
                                                @php
                                                    $kmCount = App\KmDeductionRate::where('id',Cookie::get('km_deduction_km'))->first();
                                                @endphp
                                                <p>{{ $kmCount->km_deduction_km_from.'-'.$kmCount->km_deduction_km_to ?? '' }} km</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size" class="icon2_img_rotate" src="{{ asset('frontend/images/icon2.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">
                                                <p>{{ Cookie::get('bike_cc') ?? '' }} CC</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size" src="{{ asset('frontend/images/icon3.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">
                                                @php
                                                    $ownerCount = App\OwnerDeductionRate::where('id',Cookie::get('owner_deduction_owner_no'))->first();
                                                @endphp
                                                <p>{{ $ownerCount->owner_deduction_owner_no ?? '' }} Owner</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size" src="{{ asset('frontend/images/icon4.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">
                                                <p>{{ Cookie::get('bike_current_city') ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="sell_bike_price">     
                                    <i class="fa fa-rupee"></i>{{ Cookie::get('bike_valuation') ?? '' }}/- 
                                </h5>
                                <div class="clearfix"></div>
                                <div class="price-detail">
                                    <a href="{{route('sell-confirm')}}" class="next-btn pull-left" >Sell Now</a>
                                    <a href="" class="pre-btn pull-right" id="resetCookies">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Step Modal-->
        <section class="more_details_tab">
            <div class="container">
                <div class="row">
                    <div class="more-tab">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1default" data-toggle="tab">Bike Details</a></li>
                                    <li><a href="#tab2default" data-toggle="tab">RC Details</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1default">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title bike_sell_panel_heading">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Bike and Model</a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body bike_des_panel_body">
                                                          <div class="row">
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>Bike Type</small><p>{{ Cookie::get('bike_type') ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>Bike Brand</small><p>{{ Cookie::get('bike_category') ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>Bike Model</small><p>{{ Cookie::get('model_name') ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>Bike Trim (CC)</small><p>{{ Cookie::get('bike_cc') ?? '' }} CC</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>Bike Color</small><p>{{ Cookie::get('bike_color') ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title bike_sell_panel_heading">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Bike Usage</a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body bike_sell_panel_body">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>No of Owners</small><p>{{ $ownerCount->owner_deduction_owner_no ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>KM Travelled</small><p>{{ $kmCount->km_deduction_km_from.'-'.$kmCount->km_deduction_km_to ?? '' }} km</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2default">
                                            <div class="panel-group panel_group_bike_des" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-body bike_sell_rc_panel_body">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>Registration Number</small><p>{{ Cookie::get('bike_reg_no') ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>Registration Date</small><p>{{ Cookie::get('bike_reg_date') ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                    <small>Is RC Book on your Name?</small><p>{{ Cookie::get('is_rc_book_your_name') ?? '' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sell-step2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sell_bike_4easy_title">
                            <h2>Sell a bike in 4 easy steps</h2>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class="step-box">
                            <img src="{{ asset('frontend/images/Sell-16.png')}}"/>
                            <div class="step-no">1</div>
                            <div class="step_no_mob_1">1</div>
                            <h3>Calculate Price</h3>
                            <p>Find the best price for your Bike using our Bike Value Calculator. </p>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class="step-box step-box2">
                            <img src="{{ asset('frontend/images/Sell-17.png')}}"/>
                            <div class="step-no">2</div>
                            <div class="step_no_mob_2">2</div>
                            <h3>Book Appointment</h3>
                            <p>Book a convenient time slot to visit our showroom and get the bike inspected </p>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class="step-box">
                            <img src="{{ asset('frontend/images/Sell-15.png')}}"/>
                            <div class="step-no">3</div>
                            <div class="step_no_mob_3">3</div>
                            <h3>Bike Inspection </h3>
                            <p>Get your bike down for an inspection and receive its best price. </p>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class="step-box step-box2">
                            <img src="{{ asset('frontend/images/Sell-18.png')}}"/>
                            <div class="step-no">4</div>
                            <div class="step_no_mob_4">4</div>
                            <h3>Sell Bike</h3>
                            <p>Receive the payment and let us worry about the formalities and procedures for you! </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@else
    <div class="main2">
        <section class="inner-banner ptb-50">
          <div class="container">
            <div class="row">
              <div class="col-md-4 text-center">
                <h2 class="bene_buy_desk">BENEFITS OF SELLING <br>WITH <span>BIKES24x7</span></h2>
                <h2 class="bene_buy_mob">BENEFITS OF SELLING WITH <span>BIKES24x7</span></h2>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-3 col-xs-3 text-center">
                    <img src="{{ asset('frontend/images/Sell-07.png')}}" class="inner-b-img"/>
                    <p>Best Price</p>
                  </div>
                  <div class="col-md-3 col-xs-3 text-center">
                    <img src="{{ asset('frontend/images/Sell-11.png')}}" class="inner-b-img"/>
                    <p>Sell your bike <br>in 30 mins</p>
                  </div>
                  <div class="col-md-3 col-xs-3 text-center">
                    <img src="{{ asset('frontend/images/Sell-10.png')}}" class="inner-b-img"/>
                    <p>Free Inspection</p>
                  </div>
                  <div class="col-md-3 col-xs-3 text-center">
                    <img src="{{ asset('frontend/images/Sell-08.png')}}" class="inner-b-img"/>
                    <p>Hassle-free<br> Paperwork</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="sell-bike">
            <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="sell_section_title">
                  <h2>Bike Value Calculator</h2>
                </div>
              </div>
              <div class="col-md-12 sell_bike_padding">
                <div class="sell-step-form">
                  <!-- Multi step form --> 
                  <section class="multi_step_form text-left">  
                    <form id="sell-form"  method="POST" action="{{ route('sell-bike.store') }}" enctype="multipart/form-data"> 
                    @csrf
                      <!-- progressbar -->
                      <ul id="progressbar">
                        <li class="active">Bike Details</li>  
                        <li>Registration Details</li> 
                        <li>Check Price</li>
                      </ul>
                      <!-- fieldsets -->
                      <fieldset class="setup-content" id="step-1">
                        <span class="contact_dis">*If your bike is not listed in the system, please click on contact us and <br class="con_br_desk">share the details of your bike to sell</span><br>
                        <a href="{{ route('contact_us') }}" class="btn-primary enquiry_btn contact_btn" style="position: absolute; right: 30px; top: 40px;;">Contact Us</a>
                        <h3>Enter Bike Details</h3>
                        {{-- <a href="{{ route('contact_us') }}" class="btn-primary enquiry_btn" style="float:right;">Contact Us</a> --}}
                        <div class="clearfix"></div>
                        <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" id="rc_bookError">
                                    <label>Is RC Book on your Name?</label>
                                    <input type="radio" name="bike_rc_book" id="IsRCBook1" value="Yes" required>
                                    <span>Yes</span> 
                                    <input type="radio" name="bike_rc_book" id="IsRCBook2" value="No" required>
                                    <span>No</span> 
                                    <br>
                                    <div class="errorShowIsRCBook" style="display: none;">
                                        <small class="text-danger IsRCBook"></small>
                                    </div>
                                    <div class="form-group displayCheckbox" style="display: none;">
                                        <input type="checkbox" name="checkbox" id="checkbox"><span> Yes, I want to proceed.</span>
                                    </div>
                               
                                {{-- <small class="text-danger">* We will need the actual owner as per the RC book to complete the sell process.
                                 Payment will be done at owner's bank account only.</small> --}}
                              </div> 
                              <div class="form-group">
                              <label>Two-wheeler Type<small>*Required</small></label> 
                                <select class="form-control" name="bike_type" id="bike_type" required>
                                    <option>Select an option</option>
                                    <option value="Motorcycle">Motorcycle</option>
                                    <option value="Scooter">Scooter</option>
                                </select>
                                @error('bike_color')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                              </div> 

                              <div class="form-group">
                              <label>Two-wheeler Brand<small>*Required</small></label> 
                                <select class="form-control" name="bike_category" id="bike_category" required >
                                  <option>Select an option</option>
                                </select>
                                @error('bike_category')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                              <label>Two-wheeler Model<small>*Required</small></label> 
                                <select class="form-control" name="model_name" id="model_name" required >
                                  <option>Select an option</option>
                                </select>
                                @error('model_name')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                              </div>

                                <div class="form-group">
                                    <label>Two-wheeler Trim (CC) <small>*Required</small></label> 
                                    <select class="form-control" name="bike_cc" id="bike_cc" required>
                                        <option>Select an option</option>
                                    </select>
                                    @error('bike_cc')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div> 
                              
                          </div>
                      
                          <div class="col-md-6">
                              
                            <div class="empty_dd"></div>
                              <div class="form-group">
                                <label>Registration Year <small>*Required</small></label> 
                                  <select class="form-control" name="bike_year" id="bike_year" required>
                                    <option>Select an option</option>
                                  </select>
                                    @error('bike_year')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div> 

                                <input class="form-control" type="hidden" id="bike_modal_id" name="bike_buy_bike_modal_id">

                              <div class="form-group">
                              <label>Kilometers Run (KM)<small>*Required</small></label> 
                                <select class="form-control" name="km_deduction_km" id="km_deduction_km" required>
                                  <option>Select an option</option>
                                    @if (!$kmDeductionRate->isEmpty())
                                        @foreach ($kmDeductionRate as $kmRate)
                                            <option data-kmrate="{{$kmRate->km_deduction_rate}}" value="{{$kmRate->id}}">{{$kmRate->km_deduction_km_from}} To {{$kmRate->km_deduction_km_to}} km</option>
                                        @endforeach                
                                    @endif
                                </select>
                                @error('km_deduction_km')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="form-group">
                              <label>Number of Owners<small>*Required</small></label> 
                                <select class="form-control" name="owner_deduction_owner_no" id="owner_deduction_owner_no" required>
                                  <option>Select an option</option>
                                    @if (!$ownerDeductionRate->isEmpty())
                                        @foreach ($ownerDeductionRate as $OwnerRate)
                                            <option data-ownerrate="{{$OwnerRate->owner_deduction_rate}}" value="{{$OwnerRate->id}}">{{$OwnerRate->owner_deduction_owner_no}}</option>
                                        @endforeach                
                                    @endif
                                </select>
                                @error('owner_deduction_owner_no')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                              </div> 

                                <div class="form-group">
                                    <label>Two-wheeler Color<smallop>(Optional)</smallop></label>
                                    <input class="form-control" type="text" name="bike_color" id="bike_color" maxlength="15" placeholder="Bike Color" aria-label="Bike Color">
                                </div> 
                                @error('bike_color')
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                           </div>
                        
                        
                        
                        <div class="col-md-12"> 
                          <div class="form-group" id="fileUpload">
                          <label>Upload Image</label> 
                            <div class="wrapper">
                            <div class="file-upload">
                              <input type="file" name="bike_image" id="bike_image" />
                              <i class="fa fa-plus"></i>
                            </div>
                            @error('bike_image')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                            
                            {{-- <div class="file-upload">
                                <input type="file" name="bike_image2" id="bike_image" />
                                <i class="fa fa-plus"></i>
                            </div>
                            @error('bike_image2')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                            
                            <div class="file-upload">
                                <input type="file" name="bike_image3" id="bike_image3" />
                                <i class="fa fa-plus"></i>
                            </div>
                            @error('bike_image3')
                                <span class="help-block">{{ $message }}</span>
                            @enderror --}}

                          </div>
                          </div>   
                          
                        </div>
                        </div>
                          
                        {{-- <button type="button" class="next-btn next action-button" >Next</button>   --}}
                        <div class="desk_next_btn_sec"> 
                            <button type="button" class="next-btn next action-button">Next</button>  
                        </div>
                        <div class="mob_next_btn_sec">
                            <button type="button" class="next-btn next action-button">Next</button>
                        </div> 
                      </fieldset>

                      <fieldset class="setup-content" id="step-2">
                        <h3>Enter Registration Details</h3>
                        <div class="clearfix"></div>
                        <div class="form-row"> 
                          <div class="form-group col-md-6">
                            <label>Registration Number (First 4 Characters)<small>*Required</small></label> 
                            <input type="text" name="bike_reg_no" id="bike_reg_no" class="form-control" maxlength="4" placeholder="Example MH02" required/>
                          </div> 
                          @error('bike_reg_no')
                            <label class="error text-danger">{{ $message }}</label>
                          @enderror 
    
                          <div class="form-group col-md-6">
                            <label>Registration Number (Last 6 Characters)<small></small></label> 
                            <input type="text" class="form-control" placeholder="Example CL0123" name="bike_reg_no1" maxlength="6" id="bike_reg_no1"/>
                          </div> 
                        </div>
                        <div class="form-row"> 
                          <div class="form-group col-md-6">
                            <label>Registration Date (as mentioned on the RC book)<small>*Required</small></label> 
                            <input type="date" id="bike_reg_date" name="bike_reg_date" class="form-control" placeholder="Select Date" required/>
                          </div>  
                          <div class="form-group col-md-6">
                            <label>Two-wheeler current city<small>*Required</small></label> 
                            <input class="form-control" type="text" name="bike_current_city" maxlength="45" id="bike_current_city" placeholder="Two-wheeler Current City *" aria-label="Two-wheeler Current City " required>
                          </div> 
                        </div>
                        <input type="hidden" name="bike_valuation" id="bike_valuation">
                        <div class="form-row"> 
                          <div class="form-group col-md-12" id="insuranceError">
                            <label><h4>Insurance*    </h4></label>
                            <input type="radio" name="bike_is_insurance" id="IsInsurance11" value="Yes"><label for="yes">Yes</label>
                            <input type="radio" name="bike_is_insurance" id="IsInsurance01" value="No"><label for="no">No</label> 
                          </div> 
                        </div>
                        <div class="form-group" id="InsuranceDeductionRateShow" style="display:none;">
                            <select class="form-control" name="insurance_deduction_rate" id="insurance_deduction_rate">
                            </select>
                        </div> 
                            {{-- <button type="button" class="next-btn nextCheck action-button" id="calculatePrice">Check Price</button>
                            <button type="button" class="action-button previous previous_button pre-btn">Back</button> --}}
                            <div class="desk_next_btn_sec"> 
                                <button type="button" class="action-button next-btn nextCheck calculatePrice">Check Price</button>
                                <button type="button" class="action-button previous previous_button pre-btn">Back</button>
                            </div>
                            <div class="mob_next_btn_sec mob_back_btn">
                                <button type="button" class="action-button next-btn nextCheck calculatePrice">Check Price</button>
                                <button type="button" class="action-button previous previous_button pre-btn">Back</button>
                            </div>
                      </fieldset>  
                      <fieldset>
                        <h4 class="ch_pr_heading"><span>Check Price</span></h4>
                        <div class="clearfix"></div>
                        <div class="form-row row">
                            {{-- <div class="form-group col-md-6"> 
                              <div class="bike-img">
                            </div>
                          </div> --}}
                            <div class="form-group col-md-12">
                              
                                <div class="bike-check-p" id="estimatePrice"> 
                                    <center>
                                        {{-- <h4><span>Bike Name</span> KTM RC 300</h4> --}}
                                        {{-- <h4><span>Estimated Price</span> <i class="fa fa-rupee"></i> <span id="calTotalSellPrice"> 0000</span></h4> --}}
                                        <h4 class="estm_heading"><center><span>Estimated Price: </span> <i class="fa fa-rupee"></i><span id="calTotalSellPrice">0000</span>/-</center></h4>
                                    </center>
                                </div>
                                <div id="olderthan15years" style="display:none;">
                                    <center><span>Bike Registration year older then 15 years. That's why not calculate Estimated Price. Please contact our customer care for details(1000xxxx10).</span></center>
                                </div>
                            </div>
                        </div>
                            {{-- <a href="#" class="action-button next-btn" data-toggle="modal" data-target="#timerModal">Proceed to sell</a>  --}}
                            {{-- <input type="submit" value="Proceed to sell" class="action-button next-btn" id="proceedtosell">
                            <button type="button" class="action-button previous previous_button pre-btn">Edit valuation</button>  --}}
                            <div class="ch_pr_btn col-md-12 desk_next_btn_sec">
                                <button type="button" class="action-button previous previous_button pre-btn">Edit valuation</button>
                                <input type="submit" value="Proceed to sell" class="action-button next-btn" id="proceedtosell"> 
                            </div>

                            <div class="ch_pr_btn mob_next_btn_sec">
                                <button type="button" class="action-button previous previous_button pre-btn">Edit valuation</button>
                                <input type="submit" value="Proceed to sell" class="action-button next-btn" id="proceedtosell"> 
                            </div>
                      </fieldset>  
                    </form>  
                  </section>
                  <!--modal-->
                  <!-- basic modal -->
                  <div class="modal fade" id="timerModal" tabindex="-1" role="dialog" aria-labelledby="timerModal" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body text-center">
                          <div class="timer2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 200 200" preserveAspectRatio="none" style="width:100; height:100; margin:0 auto; display:block;">
                              <circle cx="100" cy="100" r="57" id="pink-halo" fill="none" stroke="#43b99f" stroke-width="10" stroke-dasharray="0, 361" transform="rotate(-90,100,100)" style="margin:0 auto;" />
                              <text id="myTimer" text-anchor="middle" x="100" y="110" style="font-size: 40px; fill:#333;"></text>
                            </svg>
                          </div>
                          <p class="text-center ptb-50">Please Wait as we calculate the price of youe bike.</p>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <!-- End Multi step form -->   
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="sell-step2">
            <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="sell_bike_4easy_title">
                  <h2>Sell a bike in 4 easy steps</h2>
                </div>
              </div>
              <div class='col-md-3'>
                  <div class="step-box">
                  <img src="{{ asset('frontend/images/Sell-16.png')}}"/>
                  <div class="step-no">1</div>
                  <div class="step_no_mob_1">1</div>
                  <h3>Calculate Price</h3>
                  <p>Find the best price for your Bike using our Bike Value Calculator. </p>
                </div>
              </div>
              <div class='col-md-3'>
                  <div class="step-box step-box2">
                  <img src="{{ asset('frontend/images/Sell-17.png')}}"/>
                  <div class="step-no">2</div>
                  <div class="step_no_mob_2">2</div>
                  <h3>Book Appointment</h3>
                  <p>Book a convenient time slot to visit our showroom and get the bike inspected </p>
                </div>
              </div>
              <div class='col-md-3'>
                <div class="step-box">
                  <img src="{{ asset('frontend/images/Sell-15.png')}}"/>
                  <div class="step-no">3</div>
                  <div class="step_no_mob_3">3</div>
                  <h3>Bike Inspection </h3>
                  <p>Get your bike down for an inspection and receive its best price. </p>
                </div>
              </div>
              <div class='col-md-3'>
                  <div class="step-box step-box2">
                  <img src="{{ asset('frontend/images/Sell-18.png')}}"/>
                  <div class="step-no">4</div>
                  <div class="step_no_mob_4">4</div>
                  <h3>Sell Bike</h3>
                  <p>Receive the payment and let us worry about the formalities and procedures for you! </p>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@endif

@endsection

@push('scripts')
    <script src='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
    <script  src="{{ asset('frontend/js/script.js')}}"></script>
    <script  src="{{ asset('frontend/js/formValidation.min.js')}}"></script>

    <script>
        let bikes_by_bike_type = [];
        let bike_brands = [];
        let bikes_by_brand_name = [];
        let bike_models = [];
        let bikes_by_cc = [];
        let bike_ccs = [];
        let bikes_by_year = [];
        let bike_years = [];
        let selected_bike = [];

        function filter_rows_by_bike_type(allbikes, bike_type) {
            var temp_bikes_by_bike_type = [];
            var temp_bike_brands = [];
            for(const bike of allbikes) {
                if(bike.bike_type == bike_type) {
                    temp_bikes_by_bike_type.push(bike);
                    temp_bike_brands.push(bike.brand_name);
                }
            }
            bikes_by_bike_type.length = 0;
            bikes_by_bike_type = temp_bikes_by_bike_type;
            bike_brands.length = 0;
            bike_brands = temp_bike_brands;
        }

        function filter_bike_models_by_brand(brand_name) {
            var temp_bikes_by_brand_name = [];
            var temp_bike_models = [];
            for (const bike of bikes_by_bike_type) {
                if(bike.brand_name == brand_name) {
                    temp_bikes_by_brand_name.push(bike);
                    temp_bike_models.push(bike.model_name);
                }
            }
            bikes_by_brand_name.length = 0;
            bikes_by_brand_name = temp_bikes_by_brand_name;
            bike_models.length = 0;
            bike_models = temp_bike_models;
        }

        function filter_bike_cc_by_model_name (model_name) {
            var temp_bikes_by_cc = [];
            var temp_bike_ccs = [];
            for (const bike of bikes_by_brand_name) {
                if (bike.model_name == model_name) {
                    temp_bikes_by_cc.push(bike);
                    temp_bike_ccs.push(bike.model_cc);
                }
            }

            bikes_by_cc.length = 0;
            bike_ccs.length = 0;
            bikes_by_cc = temp_bikes_by_cc;
            bike_ccs = temp_bike_ccs;
        }
        
        function filter_bike_year_by_cc (bike_cc) {
            var temp_bikes_by_year = [];
            var temp_bike_years = [];
            for (const bike of bikes_by_cc) {
                if(bike.model_cc == bike_cc) {
                    temp_bikes_by_year.push(bike);
                    temp_bike_years.push(bike.bike_year)
                }
            }

            bikes_by_year.length = 0;
            bike_years.length = 0;
            bikes_by_year = temp_bikes_by_year;
            bike_years = temp_bike_years;
        }

        function filter_selected_bike(bike_year) {
            var temp_selected_bike = [];
            for(const bike of bikes_by_year) {
                if(bike.bike_year == bike_year) {
                    temp_selected_bike.push(bike);
                }
            }
            selected_bike.length = 0;
            selected_bike = temp_selected_bike;
        }

        let insurance_deduction_amount = [];
        function filter_rows_by_bike_cc(insurance_deduction_rate, bike_cc) {
            var temp_insurance_deduction_amount = [];
            for(const rate of insurance_deduction_rate) {
                if(rate.insurance_deduction_cc_from <= bike_cc && rate.insurance_deduction_cc_to >= bike_cc) {
                   temp_insurance_deduction_amount.push({
                        id: rate.id,
                        deduction_rate: rate.insurance_deduction_rate
                    });
                }
            }
            insurance_deduction_amount.length = 0;
            insurance_deduction_amount = temp_insurance_deduction_amount;
        }

        $(function(){
            let buyBikeDetails = "{{ $buyBikeDetails }}";
            let buyBikeInfo = JSON.parse(buyBikeDetails.replace(/&quot;/g,'"'));
            // console.log(buyBikeInfo);
            $("#bike_type").change(function(){
                var bike_type = $("#bike_type").val();
                console.log(bike_type);
                filter_rows_by_bike_type(buyBikeInfo, bike_type);
                
                // $.unique(bike_brands);
                var unique_bike_brands = bike_brands.filter(function(itm, i, bike_brands) {
                    return i == bike_brands.indexOf(itm);
                });

                $("#bike_modal_id").val('');
                $("#bike_category").empty().append('<option selected="selected">Select an option</option>');
                $("#model_name").empty().append('<option selected="selected">Select an option</option>');
                $("#bike_cc").empty().append('<option selected="selected">Select an option</option>');
                $("#bike_year").empty().append('<option selected="selected">Select an option</option>');
                
                $.each(unique_bike_brands, function(index, value) {
                    $("#bike_category").append('<option value="'+value+'">'+value+'</option>');
                });
                $('#box_cart_cal').hide();

                // console.log("bike brands: ", bike_brands);
                // console.log("All Bikes: ", buyBikeInfo);
                // console.log("Bike type: ", bike_type);
                // console.log("All Bikes by biketypes: ", bikes_by_bike_type);
            });

            $("#bike_category").change(function(){
                $('#box_cart_cal').hide();
                var brand_name = $("#bike_category").val();
                filter_bike_models_by_brand(brand_name);
                // $.unique(bike_models);
                var unique_bike_models = bike_models.filter(function(itm, i, bike_models) {
                    return i == bike_models.indexOf(itm);
                });
                $("#bike_modal_id").val('');
                $("#model_name").empty().append('<option selected="selected">Select an option</option>');
                $("#bike_cc").empty().append('<option selected="selected">Select an option</option>');
                $("#bike_year").empty().append('<option selected="selected">Select an option</option>');
                $.each(unique_bike_models, function(index, value) {
                    $("#model_name").append('<option value="'+value+'">'+value+'</option>');
                });
            });

            $("#model_name").change(function(){
                $('#box_cart_cal').hide();
                var model_name = $("#model_name").val();
                filter_bike_cc_by_model_name(model_name);
                // $.unique(bike_ccs);
                var unique_bike_ccs = bike_ccs.filter(function(itm, i, bike_ccs) {
                    return i == bike_ccs.indexOf(itm);
                });
                $("#bike_modal_id").val('');
                $("#bike_cc").empty().append('<option selected="selected">Select an option</option>');
                $("#bike_year").empty().append('<option selected="selected">Select an option</option>');
                $.each(unique_bike_ccs, function(index, value) {
                    $("#bike_cc").append('<option value="'+value+'">'+value+'</option>');
                });
            });

            $("#bike_cc").change(function(){
                $('#box_cart_cal').hide();
                var bike_cc = $("#bike_cc").val();
                filter_bike_year_by_cc(bike_cc);
                // $.unique(bike_years);
                var unique_bike_years = bike_years.filter(function(itm, i, bike_years) {
                    return i == bike_years.indexOf(itm);
                });
                $("#bike_modal_id").val('');
                $("#bike_year").empty().append('<option selected="selected">Select an option</option>');
                
                $.each(unique_bike_years, function(index, value) {
                    $("#bike_year").append('<option value="'+value+'">'+value+'</option>');
                });
            });

            $("#bike_year").change(function(){
                $('#box_cart_cal').hide();
                var bike_year = $("#bike_year").val();
                filter_selected_bike(bike_year);
                console.log("I am called");
                $("#bike_modal_id").val('');
                $("#bike_modal_id").val(selected_bike[0].id);
                
            });
            $("#km_deduction_km").change(function(){
                $('#box_cart_cal').hide();
            });

            $("#owner_deduction_owner_no").change(function(){
                $('#box_cart_cal').hide();
            });

            $("#insurance_deduction_rate").change(function(){
                $('#box_cart_cal').hide();
            });
        });

        // $('#bike_reg_date').datepicker({
        //     endDate: 'today',
        //     format:'yyyy-mm-dd',
        //     // viewMode: 'months',
        //     // minViewMode: 'months'
        // });
        // is Insurance yes
        $("input:radio[name='bike_is_insurance']").change(function(){
            var IsInsurance = $(this).val();
            $('#box_cart_cal').hide();
            // console.log(IsInsurance);
            if (IsInsurance == 'No') {
                var bike_cc = $("#bike_cc").val();
                var insurance_deduction_rate = @json($InsuranceDeductionRate);
                filter_rows_by_bike_cc(insurance_deduction_rate, bike_cc);
                // $('#InsuranceDeductionRateShow').show();
                $('#insurance_deduction_rate').prop('required',true);
                $("#insurance_deduction_rate").empty().append('<option value="">Select Insurance *</option>');
                
                $.each(insurance_deduction_amount, function(index, value) {
                    $("#insurance_deduction_rate").append('<option selected="selected" data-insuranceprice="'+value.deduction_rate+'" value="'+value.id+'">'+bike_cc+' CC</option>');
                });
                console.log(insurance_deduction_amount);
                // $('#InsuranceDeductionRateShow').show();
                // $('#insurance_deduction_rate').prop('required',true);
                // $("#insurance_deduction_rate").empty();
                // $("#insurance_deduction_rate").append('<option value="">Select Insurance *</option>');
                // $("#insurance_deduction_rate").append('@if (!$InsuranceDeductionRate->isEmpty()) @foreach ($InsuranceDeductionRate as $insurance) <option data-insuranceprice="{{$insurance->insurance_deduction_rate}}" value="{{$insurance->id}}">{{ $insurance->insurance_deduction_cc_from }} To {{$insurance->insurance_deduction_cc_to }} CC</option> @endforeach @endif');
            } else {
                // $('#InsuranceDeductionRateShow').hide();
                $("#insurance_deduction_rate").prop('selectedIndex',0);
                $('#insurance_deduction_rate').prop('required',false);
            }
        });

        // RC book is the name of the seller
        $("input:radio[name='bike_rc_book']").change(function(){
            $('#box_cart_cal').hide();
            var IsRCBook = $(this).val();
            if (IsRCBook == 'No') {
                $(".errorShowIsRCBook").show();
                $('.IsRCBook').text("* We will need the actual owner as per the RC book to complete the sell process. Payment will be done at owner's bank account only.");
                $(".displayCheckbox").show();
                $('#checkbox').prop('required',true);
                $('input').prop('disabled',true);
                $('select').prop('disabled',true);
                $('input[name=bike_rc_book]').prop('disabled',false);
                $('input[name=checkbox]').prop('disabled',false);
                
            } else {
                $(".errorShowIsRCBook").hide();
                $(".displayCheckbox").hide();
                $('#checkbox').prop('required',false);
                $('input').prop('disabled',false);
                $('select').prop('disabled',false);
            }
        });

        $("input:checkbox[name='checkbox']").change(function(){
            if($("input:checkbox[name='checkbox']").is(':checked')){
                $('input').prop('disabled',false);
                $('select').prop('disabled',false);
            }else{
                $('input').prop('disabled',true);
                $('select').prop('disabled',true);
                $('input[name=bike_rc_book]').prop('disabled',false);
                $('input[name=checkbox]').prop('disabled',false);
            }
            
        });

       
        
    </script>

    <script>
        $(".calculatePrice").click(function(){
            var bike_rc_book = $("input:radio[name='bike_rc_book']:checked").val()
            var bike_type = $("#bike_type").val();
            var bike_category = $("#bike_category").val();
            var model_name = $("#model_name").val();
            var bike_cc = $("#bike_cc").val();
            var bike_year = $("#bike_year").val();
            var km_deduction_km = $("#km_deduction_km").val();
            var owner_deduction_owner_no = $("#owner_deduction_owner_no").val();
            var bike_is_insurance = $("input:radio[name='bike_is_insurance']:checked").val();
            var bike_reg_no = $("#bike_reg_no").val();
            var bike_reg_no1 = $("#bike_reg_no1").val();
            var bike_reg_date = $("#bike_reg_date").val();
            
            
            var bike_color = $("#bike_color").val();
            var bike_current_city = $("#bike_current_city").val();

            var base_price = selected_bike[0].base_price;
            // var dtToday = new Date();            
            // var month = dtToday.getMonth() + 1;
            // var day = dtToday.getDate();
            // var year = dtToday.getFullYear();            
            // var today = year + '-' + month + '-' + day;

            // var date1 = new Date(bike_reg_date);
            // var date2 = new Date(today);
            // var yearsDiff =  date2.getFullYear() - date1.getFullYear();
            // var months =(yearsDiff * 12) + (date2.getMonth() - date1.getMonth());
            // console.log('Total Months = '+months);
            
            // var bike_age_deduction_months = months / bike_age_deduction_time;
            // var bike_age_deduction_months_int = parseInt(bike_age_deduction_months);
            // // console.log('Total Months Int = '+bike_age_deduction_months_int);
            // if (bike_age_deduction_months_int != 0) {
            //     var deduction_variable =  ((100 - bike_age_deduction_rate)/100);
            //     // console.log('deduction_variable = '+deduction_variable);

            //     var deduction_variable_pow = Math.pow(deduction_variable, bike_age_deduction_months_int);
            //     // console.log('deduction_variable_pow = '+deduction_variable_pow);

            //     var deducted_price = base_price * deduction_variable_pow;

            //     // console.log(deducted_price);
            // }else{
            //     var deducted_price = base_price;
            // }
            
        

            var bike_reg_date_new = new Date(bike_reg_date);
            var today = new Date();
            var bike_reg_year_cal = Math.floor((today-bike_reg_date_new) / (365.25 * 24 * 60 * 60 * 1000));
            // console.log(bike_reg_year_cal);
            
            if (bike_is_insurance == 'No'){
                var insurance_deduction_rate = $("#insurance_deduction_rate").val();

                var insuranceprice = $('#insurance_deduction_rate').find(':selected').data('insuranceprice');

                
                var ownerrate = $('#owner_deduction_owner_no').find(':selected').data('ownerrate');
                var kmrate = $('#km_deduction_km').find(':selected').data('kmrate');

                if (bike_reg_year_cal > 15 || bike_reg_year_cal < 0) {
                    $('#olderthan15years').show();
                    $('#proceedtosell').hide();
                    $('#estimatePrice').hide();
                }else{
                    var estimated_price_year = base_price - (base_price * kmrate / 100) - ownerrate - insuranceprice;
                    var estimated_price = Math.round(estimated_price_year);
                    // console.log('estimated_price_year = '+estimated_price_year);
                    // console.log('estimated_price = '+estimated_price);
                    // var deducting_price = base_price-deducted_price;
                    // console.log('base_price = '+base_price);
                    // console.log('deducting_price = '+deducting_price);
                    // console.log('deducted_price = '+deducted_price);
                    // console.log('estimated_price = '+estimated_price_year);
                    $("#calTotalSellPrice").text(estimated_price + '.00');
                    $("#bike_valuation").val(estimated_price);
                }
            }else{
                // var base_price = selected_bike[0].base_price;
                var ownerrate = $('#owner_deduction_owner_no').find(':selected').data('ownerrate');
                var kmrate = $('#km_deduction_km').find(':selected').data('kmrate');
                if (bike_reg_year_cal > 15 || bike_reg_year_cal < 0) {
                    $('#olderthan15years').show();
                    $('#proceedtosell').hide();
                    $('#estimatePrice').hide();
                }else{
                    var estimated_price_year = base_price - (base_price * kmrate / 100) - ownerrate;
                    var estimated_price = Math.round(estimated_price_year);
                    // console.log('estimated_price_year = '+estimated_price_year);
                    // console.log('estimated_price = '+estimated_price);
                    // var deducting_price = base_price-deducted_price;
                    // console.log('base_price = '+base_price);
                    // console.log('deducting_price = '+deducting_price);
                    // console.log('deducted_price = '+deducted_price);
                    // console.log('estimated_price = '+estimated_price_year);
                    $("#calTotalSellPrice").text(estimated_price + '.00');
                    $("#bike_valuation").val(estimated_price);
                }
            }

            
        });
        
    </script>
    <script>        
        $("#resetCookies").click(function(){
            $.ajax({
                type: "GET",
                url: '{{ route('resetCookies') }}',
                success: function(){
                    window.location = '{{ route('sell-bike.index') }}';
                }
            });
        });
    </script>
    <script>
        
        $("#bike_year").change(function(){
            var selected_bike_year = $(this).val();
            var startMonth = '01';
            var endMonth = 12;
            var startDay = '01';
            var endDay = 31;
            var maxDate = selected_bike_year + '-' + endMonth + '-' + endDay;
            var minDate = selected_bike_year + '-' + startMonth + '-' + startDay;
            $('#bike_reg_date').attr('min', minDate);
            $('#bike_reg_date').attr('max', maxDate);
        });

        // $("#bike_reg_date").change(function(){
        //     var bike_reg_date = $(this).val();

        //     var dtToday = new Date();            
        //     var month = dtToday.getMonth() + 1;
        //     var day = dtToday.getDate();
        //     var year = dtToday.getFullYear();            
        //     var today = year + '-' + month + '-' + day;

        //     var date1 = new Date(bike_reg_date);
        //     var date2 = new Date(today);
        //     var yearsDiff =  date2.getFullYear() - date1.getFullYear();
        //     var months =(yearsDiff * 12) + (date2.getMonth() - date1.getMonth());
        //     console.log('Total Months = '+months);
            
        //     var bike_age_deduction_months = months / bike_age_deduction_time;
        //     var bike_age_deduction_months_int = parseInt(bike_age_deduction_months);
        //     console.log('Total Months Int = '+bike_age_deduction_months_int);
        //     if (bike_age_deduction_months_int != 0) {
        //         var deduction_variable =  ((100 - bike_age_deduction_rate)/100);
        //         console.log('deduction_variable = '+deduction_variable);

        //         var deduction_variable_pow = Math.pow(deduction_variable, bike_age_deduction_months_int);
        //         console.log('deduction_variable_pow = '+deduction_variable_pow);

        //         // var deducted_price = base_price * deduction_variable_pow;

        //         // console.log(deducted_price);
        //     }
            
        // });
    </script>
@endpush