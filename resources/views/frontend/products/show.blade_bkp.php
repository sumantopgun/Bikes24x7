@extends('frontend.layout')
@section('title', 'Product Details')
@section('meta_desc', 'Product Details')
@section('BuyBike', 'active')
@push('style')

    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css')}}" type="text/css">
    <style>
        .photo.related img {
            height: 186px;
            width: 249px;
        }
    </style>
    
@endpush
@section('content')
    <div class="main2">
        <section class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            @guest
                                <li><a href="{{ route('buy-bike') }}">Buy Bike</a></li>
                            @else
                                @if (Auth::user()->user_type == 'shop_seller')
                                    <li><a href="{{ route('seller.buybike') }}">Buy Bike</a></li>
                                @else
                                    <li><a href="{{ route('buy-bike') }}">Buy Bike</a></li>
                                @endif
                            @endguest
                            
                            <li><a href="#">Product Details</a></li>
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
                                                    <img src="{{asset('storage/'.$product->bike_image)}}" alt="" class="img-responsive">
                                                </div>
                                                @foreach ($gallaryimg as $item)
                                                    <div class="slide">
                                                        <img src="{{asset('storage/salegallary/'.$item)}}" alt="" class="img-responsive">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="product__slider-thmb">
                                                <div class="slide">
                                                    <img src="{{asset('storage/'.$product->bike_image)}}" alt="" class="img-responsive">
                                                </div>
                                                @foreach ($gallaryimg as $itemslide)
                                                    <div class="slide">
                                                        <img src="{{asset('storage/salegallary/'.$itemslide)}}" alt="" class="img-responsive">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <!--/Slider-->
                        </div>
                        <div class="col-md-5">
                            <div class="bike-details">
                                <h2>{{ $product->bike_name ?? 'N/A' }}</h2>
                                <img src="{{ asset('frontend/images/certified.png')}}"  class="certified-img"/>
                                <div class="use-d">
                                    <div class="row">
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size" src="{{ asset('frontend/images/icon5.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">
                                                <p>{{ $product->bike_year ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size icon2_img_rotate" src="{{ asset('frontend/images/icon2.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">   
                                                <p>{{ $product->models->model_cc ?? '' }} CC</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size" src="{{ asset('frontend/images/icon1.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">
                                                <p>{{ $product->total_kilometers ?? 'N/A' }} km</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size" src="{{ asset('frontend/images/icon3.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">
                                                <p>{{ $product->number_of_owners ?? 'N/A' }} Owners</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 img_icon_main_sec">
                                            <div class="col-xs-2 icon_img_sec">
                                                <img class="icon_img_size" src="{{ asset('frontend/images/icon4.svg')}}">
                                            </div>
                                            <div class="col-xs-9 icon_des_sec">
                                                <p>{{ $product->shop->shop_name ?? 'N/A' }}, {{ $product->shop_city->city_name ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                        @if (optional($product->bikeDetails)->bike_finance_available == 1)
                                            <div class="col-xs-6 img_icon_main_sec">
                                                <div class="col-xs-2 icon_img_sec">
                                                    <img class="icon_img_size" src="{{ asset('frontend/images/icon6.svg')}}">
                                                </div>
                                                <div class="col-xs-9 icon_des_sec">
                                                    <p>Finance Available</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                                {{-- <div class="use-d">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <img src="{{ asset('frontend/images/icon1.svg')}}">
                                            <p>{{ $product->total_kilometers ?? 'N/A' }} km</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <img src="{{ asset('frontend/images/icon2.svg')}}" class="icon2_img_rotate">
                                            <p>{{ $product->models->model_cc ?? '' }} CC</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <img src="{{ asset('frontend/images/icon3.svg')}}">
                                            <p>{{ $product->number_of_owners ?? 'N/A' }} Owner</p>
                                        </div>
                                        <div class="col-xs-6">
                                            <img src="{{ asset('frontend/images/icon4.svg')}}">
                                            <p>{{ $product->shop->shop_name ?? 'N/A' }}, {{ $product->shop_city->city_name ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="price-detail">
                                    <span class="bike-price">
                                        @if ($product->offers)
                                            @if ($product->offers->offer_end_date >= today()->format('Y-m-d') || $product->offers->offer_start_date===Null)
                                                @if ($product->offers->offer_type=='percentage')
                                                    @php 
                                                        $price = $product->bike_sell_price - $product->bike_sell_price * $product->offers->offer_amount / 100;
                                                    @endphp
                                                    <i class="fa fa-rupee"></i>{{ $price }}/- <span class="text-through"><i class="fa fa-rupee"></i>{{ $product->bike_sell_price }}/-
                                                    </span>
                                                    
                                                @else
                                                    @php 
                                                        $price = $product->bike_sell_price - $product->offers->offer_amount;
                                                    @endphp
                                                    <i class="fa fa-rupee"></i>{{ $price }}/- <span class="text-through"><i class="fa fa-rupee"></i>{{ $product->bike_sell_price }}/-
                                                    </span>
                                                    
                                                @endif
                                            @else
                                                @php 
                                                    $price = $product->bike_sell_price;
                                                @endphp
                                                <i class="fa fa-rupee"></i>{{ $price }}/-
                                                
                                            @endif
                                        @else
                                            @php 
                                                $price = $product->bike_sell_price;
                                            @endphp
                                            <i class="fa fa-rupee"></i>{{ $price }}/-
                                            
                                        @endif
                                        
                                        
                                    </span>
                                    @if ($product->offers)  
                                        @if($product->offers->offer_end_date >= today()->format('Y-m-d') || $product->offers->offer_start_date===Null)
                                            <span class="price-off3"><i class="fa fa-rupee"></i>{{ $product->offers->offer_amount }}{{ $product->offers->offer_type=='percentage' ? '%' : ''}}/- Off</span>
                                        @endif
                                    @endif

                                    <div class="on_road_price">
                                        <span>On road price:</span>
                                        <span><i class="fa fa-rupee"></i>{{ $product->bike_on_road_price ?? 'N/A' }}/-</span>
                                    </div>

                                    {{-- Book now button --}}
                                    @guest
                                        {{-- <div class="btn_add_to_cart1"> --}}
                                            @if ($product->bike_sell_status=='available')
                                                <a href="{{ route('login' ) }}" class="book-now-btn">Book Now</a>
                                                
                                            @elseif ($product->bike_sell_status=='booked')
                                                <button class="book-now-btn" type="button">Booked</button>
                                            @else
                                                <button class="book-now-btn" type="button">Sold</button>
                                            @endif
                                            
                                        {{-- </div> --}}
                                    @else
                                        @if ($product->shop_id == Auth::user()->user_shop && Auth::user()->user_type == 'shop_seller')
                                            @if ($product->bike_sell_status=='available')
                                                {{-- <a href="{{ route('booking',$product->id ) }}" class="btn_1">Book Now</a> --}}
                                                <a href="" class="book-now-btn" data-toggle="modal" data-target="#booking-model">Book Now</a>
                                                {{-- <a href="#booking-model" id="sign-in" class="book-now-btn"><span>Book Now</span></a> --}}
                                            @elseif ($product->bike_sell_status=='booked')
                                                <button class="book-now-btn" type="button">Booked</button>
                                            @elseif ($product->bike_sell_status=='sold')
                                                <button class="book-now-btn" type="button">Sold</button>
                                            @endif
                                        @elseif(Auth::user()->user_type == 'customer')
                                            @if ($product->bike_sell_status=='available')
                                                {{-- <a href="{{ route('booking',$product->id ) }}" class="btn_1">Book Now</a> --}}
                                                <a href="" class="book-now-btn" data-toggle="modal" data-target="#stepModal">Book Now</a>
                                            @elseif ($product->bike_sell_status=='booked')
                                                <button class="book-now-btn" type="button">Booked</button>
                                            @else
                                                <button class="book-now-btn" type="button">Sold</button>
                                            @endif
                                        @else
                                            <button class="book-now-btn" type="button">Not Allowed</button>
                                        @endif
                                    @endguest
                                    
                                    
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- seler booking Modal -->
        <div class="modal fade" id="booking-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <div class="modal-body">
                        <h3>Payment</h3>
                        <form method="POST" class="forms-sample" action="{{ route('sellerbooking') }}">
                            @csrf
                            <div class="sign-in-wrapper">
                                <input class="form-control" type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    {{-- <label for="remaining_amount">Payment Type</label> --}}
                                    <select class="form-control" name="payment_type" id="payment_type" required>
                                        <option value="">Payment Type</option>
                                        <option value="cash">Cash</option>
                                        <option value="online">Online</option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Submit" class="btn_1 full-width">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /end seler booking Modal -->

        <!-- Step Modal-->
        <!-- Modal -->
        <div class="modal fade" id="stepModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                         <!-- multistep form -->
                        <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <h2 class="fs-title">Get Your Bike In These 4 steps</h2>
                                <div class="step-icon-area row">
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon active">
                                            <img src="{{ asset('frontend/images/step-icn1.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn2.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn3.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn4.png')}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="slot">
                                    <p>Pay ₹1000/- Booking Fee to book your Bike</p>
                                </div>
                                <div>
                                    <input type="button" name="next" class="next-btn next action-button" value="Next" />
                                </div>
                                
                
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Get Your Bike In These 4 steps</h2>
                                <div class="step-icon-area row">
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn1.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon active">
                                            <img src="{{ asset('frontend/images/step-icn2.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn3.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn4.png')}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="slot">
                                    <p>Book An Appointment Slot</p>
                                </div>
                                <span class="note">*Your booking will only be valid for 3 days after you pay the booking fee.</span>
                                <div>
                                    <input type="button" name="previous" class="pre-btn previous action-button" value="Back" />
                                    <input type="button" name="next" class="next-btn next action-button" value="Next" />
                                </div>
                                
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Get Your Bike In These 4 steps</h2>
                                <div class="step-icon-area row">
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn1.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn2.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon active">
                                            <img src="{{ asset('frontend/images/step-icn3.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn4.png')}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="slot">
                                    <p>Visit the showroom to inspect the bike</p>
                                </div>
                                <span class="note">** Failure of visiting the showroom on the mentioned date will result in forfeit of the deposit amount(₹1000/-) and the booking being null and void. </span>
                                <div>
                                    <input type="button" name="previous" class="pre-btn previous action-button" value="Back" />
                                    <input type="button" name="next" class="next-btn next action-button" value="Next" />
                                </div>
                                
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Get Your Bike In These 4 steps</h2>
                                <div class="step-icon-area row">
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn1.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn2.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon">
                                            <img src="{{ asset('frontend/images/step-icn3.png')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="step-icon active">
                                            <img src="{{ asset('frontend/images/step-icn4.png')}}"/>
                                        </div>
                                    </div>
                                </div>

                                <form method="POST" class="forms-sample" action="{{ route('booking') }}">
                                        @csrf
                                    <input class="form-control" type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="slot">
                                        <p>Read and accept all the <a target="blank" href="{{ route('termsconditions') }}">Terms and Conditions</a> carefully</p>
                                    </div>
                                    {{-- {{ route('booking',$product->id ) }} --}}
                                    <input type="checkbox" required> <label>I Agree</label><br>
                                    <input type="button" name="previous" class="pre-btn previous action-button" value="Back" />
                                    <input type="submit" class="next-btn action-button" value="Book" />
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       

        <section class="product_des_section">
            <div class="container">
                <div class="row">
                    <div class="product_des_main_div">
                        <div class="product_des_heading">
                            <h4>Product description</h4>
                        </div>
                        <div class="product_des_body">
                            <p>{{ $product->bike_description ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="more-details">
            <div class="container">
                <div class="row">
                    <div class="more-accordian">
                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading1">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        <span class="more_detail_text">More Details</span>
                                        </a>
                                    </h4>
                                </div>

                                <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                                    <div class="panel-body">
                                        <div class="row more_detail_body">
                                            <div class="more_detail_body_1stsec col-xs-12 col-md-12">
                                                <div class="col-xs-6 col-md-3">
                                                    <img class="more_img_size" src="{{ asset('frontend/images/more_icon1.png')}}">
                                                    <div>
                                                        <span>Refurbished</span>
                                                        <p class="more_body_text_p">{{ optional($product->bikeDetails)->bike_refurbished=='1' ? 'Yes' : 'No'}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <img class="more_img_size" src="{{ asset('frontend/images/more_icon2.png')}}">
                                                    <div>
                                                        <span>Registration Certificate</span>
                                                        <p class="more_body_text_p">{{ optional($product->bikeDetails)->bike_rc=='1' ? 'Yes' : 'No'}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <img class="more_img_size" src="{{ asset('frontend/images/more_icon3.png')}}">
                                                    <div>
                                                        <span>Finance</span>
                                                        <p class="more_body_text_p">{{ optional($product->bikeDetails)->bike_finance_available=='1' ? 'Yes' : 'No'}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <img class="more_img_size" src="{{ asset('frontend/images/more_icon4.png')}}">
                                                    <div>
                                                        <span>RTO State</span>
                                                        <p class="more_body_text_p">{{ $product->bikeDetails->bike_rto_state ?? 'N/A' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="more_detail_body_2ndsec col-xs-12">
                                                <div class="col-xs-6 col-md-3">
                                                    <img class="more_img_size" src="{{ asset('frontend/images/more_icon5.png')}}">
                                                    <div>
                                                        <span>Warranty</span>
                                                        <p class="more_body_text_p">{{ optional($product->bikeDetails)->bike_warranty=='1' ? 'Yes' : 'No'}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <img class="more_img_size" src="{{ asset('frontend/images/more_icon6.png')}}">
                                                    <div>
                                                        <span>Insurance</span>
                                                        <p class="more_body_text_p">{{ optional($product->bikeDetails)->bike_insurance=='1' ? 'Yes' : 'No'}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3 more_last_detail">
                                                    <img class="more_img_size" src="{{ asset('frontend/images/more_icon7.png')}}">
                                                    <div>
                                                        <span>RTO City</span>
                                                        <p class="more_body_text_p">{{ $product->bikeDetails->bike_rto_city ?? 'N/A' }}</p>
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

        <section class="more-details">
            <div class="container">
                <div class="row">
                    <div class="more-tab">
                        <div class="panel with-nav-tabs panel-default">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1default" data-toggle="tab">Specifications</a></li>
                                    <li><a href="#tab2default" data-toggle="tab">Inspection Report Summary</a></li>
                                </ul>
                            </div>

                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1default">
                                        <div class="panel-group panel_group_bike_des" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body bike_des_panel_body">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Body Type</small><p>{{ $product->models->model_type ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Brand</small><p>{{ $product->categories->category_name ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Model Name</small><p>{{ $product->models->model_name ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Fuel Type</small><p>{{ $product->bikeDetails->bike_fuel_type ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Transmission Type</small><p>{{ $product->bikeDetails->bike_transmission_type ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Colour</small><p>{{ $product->bike_color ?? 'N/A'}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Odometer</small><p>{{ $product->bikeDetails->bike_odometer ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Ignition Type</small><p>{{ $product->bikeDetails->bike_ignition_type ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Anti-lock Braking System</small><p>{{ optional($product->bikeDetails)->bike_abs=='1' ? 'Yes' : 'No'}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Break System - Rear</small><p>{{ $product->bikeDetails->bike_rear_break_type ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Break System - Front</small><p>{{ $product->bikeDetails->bike_front_break_type ?? 'N/A' }}</p>
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
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body bike_des_panel_body">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-6">
                                                                <div class="bike-cc">
                                                                <small>Engine Condition</small><p>{{ $product->bikeDetails->bike_engine_condition ?? 'N/A' }}</p>
                                                                </div>
                                                            </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Battery Condition</small><p>{{ $product->bikeDetails->bike_battery_condition ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Clutch Condition</small><p>{{ $product->bikeDetails->bike_clutch_condition ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Gear Box</small><p>{{ $product->bikeDetails->bike_gear_box ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>No. of cylinders</small><p>{{ $product->bikeDetails->bike_no_of_cylinders ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Chain Sprocket</small><p>{{ $product->bikeDetails->bike_chain_sprocket ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Suspension - Rear</small><p>{{ $product->bikeDetails->bike_rear_suspension ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Suspension - Front</small><p>{{ $product->bikeDetails->bike_front_suspension ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Tyre Condition</small><p>{{ $product->bikeDetails->bike_tyre_condition ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Electricals</small><p>{{ $product->bikeDetails->bike_electrical ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Paint</small><p>{{ $product->bikeDetails->bike_paint ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4 col-xs-6">
                                        <div class="bike-cc">
                                        <small>Silencer Mounting</small><p>300 CC</p>
                                        </div>
                                    </div> --}}
                                </div>
                                
                            </div>
                            </div>
                          </div>
                        </div>
                                        </div>

                                    <div class="tab-pane fade" id="tab3default">Default 3</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="buy-bike">
            <div class="container">
                <div class="row">
                    <div class='col-md-12'>
                        <div class="section-title">
                            <h2>Buy a bike in 4 easy steps</h2>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class="step-box">
                            <img src="{{ asset('frontend/images/step1.png')}}"/>
                            <h3>Online Selection</h3>
                            <p>Select a bike from our collection</p>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class="step-box step-box2">
                            <img src="{{ asset('frontend/images/step2.png')}}"/>
                            <h3>Book Appointment</h3>
                            <p>Book a convenient time slot to visit our showroom and inspect the bike</p>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class="step-box">
                            <img src="{{ asset('frontend/images/step3.png')}}"/>
                            <h3>Test Ride</h3>
                            <p>Take the bike for a test ride and come one step closer to owning your own bike</p>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <div class="step-box step-box2">
                            <img src="{{ asset('frontend/images/step4.png')}}"/>
                            <h3>Buy Bike</h3>
                            <p>Make the payment and let us worry about the formalities and procedures for you!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Picks-->
        @if (!$relateds->isEmpty())
            <section class="section-padding similer-bike-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sec-title">
                                <h2>Similar Bikes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div id="carousel-picks2" class="carousel-picks2 owl-carousel owl-theme" >
                                @foreach ($relateds as $related)
                                    <div class="item {{ $related->bike_sell_status }}">
                                        <div class="col-item">
                                                @if ($related->offers)
                                                    @if ($related->offers->offer_end_date >= today()->format('Y-m-d'))
                                                        <span class="timming price-off2">Ends in {{ $related->offers->offer_end_date }}</span>
                                                    @endif 
                                                @endif
                                            
                                            <div class="photo related">
                                                <img src="{{ asset('storage/'.$related->bike_image) }}" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-8">
                                                        <h4>{{ $related->bike_name }}</h4>
                                                        <h5 class="price-text-color">
                                                            @if ($related->offers)
                                                                @if ($related->offers->offer_end_date >= today()->format('Y-m-d') || $related->offers->offer_start_date===Null)
                                                                    @if ($related->offers->offer_type=='percentage')
                                                                        <i class="fa fa-rupee"></i>{{ $related->bike_sell_price - $related->bike_sell_price * $related->offers->offer_amount / 100 }}/- <span class="text-through"><i class="fa fa-rupee"></i>{{ $related->bike_sell_price }}/-
                                                                        </span> 
                                                                        
                                                                    @else
                                                                        <i class="fa fa-rupee"></i>{{ $related->bike_sell_price - $related->offers->offer_amount }}/- <span class="text-through"><i class="fa fa-rupee"></i>{{ $related->bike_sell_price }}/-
                                                                        </span>
                                                                        
                                                                    @endif
                                                                @else
                                                                    <i class="fa fa-rupee"></i>{{ $related->bike_sell_price }}/-
                                                                    
                                                                @endif
                                                            @else
                                                                <i class="fa fa-rupee"></i>{{ $related->bike_sell_price }}/-
                                                                
                                                            @endif
                                                            
                                                        </h5>

                                                        @if ($related->offers)  
                                                            @if($related->offers->offer_end_date >= today()->format('Y-m-d') || $related->offers->offer_start_date===Null)
                                                                <span class="price-off2"><i class="fa fa-rupee"></i>{{ $related->offers->offer_amount }}{{ $related->offers->offer_type=='percentage' ? '%' : ''}}/- Off</span>
                                                            @else
                                                                <br>
                                                            @endif
                                                        @else
                                                            <br>
                                                        @endif
                                                    </div>
                                                    <div class="price col-md-4 text-right">
                                                        <div class="certified-tag ">
                                                            <img src="{{ asset('frontend/images/certified.png')}}"/>
                                                        </div>    
                                                    </div>   
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                            <div class="box-address">
                                                <p><i class="fa fa-map-marker"></i> {{ $related->shop->shop_name ?? 'N/A' }}, {{ $related->shop_city->city_name ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div> 
                        </div>
                    </div>    
                </div> 
            </section>
        @endif
        <!-- Top Picks-->
    </div>

@endsection
@push('scripts')
    {{-- <script src="{{ asset('frontend_template/js/carousel_with_thumbs.js')}}"></script> --}}
    <script src='https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
<script  src="{{ asset('frontend/js/script.js')}}"></script>
<script  src="{{ asset('frontend/js/main_desc.js')}}"></script>
@endpush