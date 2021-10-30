@extends('frontend.layout')
@section('title', 'Buy and Sell Second Hand Bikes in Pune')
@section('meta_desc', 'Good condition pre owned two wheelers in Pune. You can buy or resell your used old bike at best price with Bikes24x7. A Complete solution for pre-owned two wheelers.')
@section('meta_keywords', 'pre owned two wheelers in pune, buy second hand bike in pune, buy and sell bikes near me, sell second hand bike, two wheeler buy and sale, resell bike')
@push('style')
    <style>
    .top-sell {
        height: 186px;
        width: 249px;
    }
    .carousel-inner>.item>a>img, .carousel-inner>.item>img {
        height: 540px;
    }
    </style>
@endpush
@section('content')
    <!-- Banner Area-->
    @if(!$banners->isEmpty())
    <section class="slider-area">
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                {{-- <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example" data-slide-to="1"></li> --}}
                @foreach ($banners as $slide)
					<li data-target="#carousel-example" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
				@endforeach
            </ol>

            <div class="carousel-inner">
                @foreach ($banners as $banner)
                    <div class="item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset('storage/'.$banner->img) }}" class="img-fluid" alt="Banner Image" />
                        <div class="carousel-caption">
                            <h1>{!! $banner->banner_text ?? '' !!}</h1>
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <span class="fa fa-angle-right"></span>
            </a>
        </div>
    </section>
    @endif
    <!-- End Banner Area-->

    <div class="main">
    <!-- Services area-->
        <section class="section-padding service-sec">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                        <div class="service-title">
                            <h2>Our Services</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 text-center">
                        <div class="ser-box">
                            <img src="{{ asset('frontend/images/ser1.png')}}" alt="Buy Bike" />
                            <div class="ser-info">
                                @guest
                                    <a class="ser-btn" href="{{ route('buy-bike') }}">Buy Bike</a>
                                @else
                                    @if (Auth::user()->user_type == 'shop_seller')
                                        <a class="ser-btn" href="{{ route('seller.buybike') }}">Buy Bike</a>
                                    @else
                                        <a class="ser-btn" href="{{ route('buy-bike') }}">Buy Bike</a>
                                    @endif
                                @endguest
                            {{-- <a href="catalogue.html" class="ser-btn">Buy Bike</a> --}}
                            <p>Select A bike of your choice to take home today!</p>
                            </div>
                        </div>
                     </div>
                     
                     <div class="col-md-4 col-sm-6 text-center">
                        <div class="ser-box">
                            <img class="sell_img_ser" src="{{ asset('frontend/images/ser2.png')}}" alt="Sell your bike hassle-free within an hour" />
                            <div class="ser-info">
                            <a href="{{ route('sell-bike.index') }}" class="ser-btn">Sell Bike</a>
                            <p class="sell_bike_info_desk">Sell your bike hassle-free within an hour.</p>
                            <p class="sell_bike_info_mob">Sell your bike <br>hassle-free within <br>an hour.</p>
                            </div>
                        </div>
                     </div>
                     
                     <div class="col-md-4 col-sm-6 text-center">
                        <div class="ser-box">
                            <img src="{{ asset('frontend/images/ser3.png')}}" alt="RTO Assistance" />
                            <div class="ser-info">
                            <a href="{{ route('rto-services.index') }}" class="ser-btn">RTO Assistance</a>
                            <p>Assistance with all RTO related documents and procedures</p>
                            </div>
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-md-6 col-md-offset-3">
                         <div class="divider">
                        
                        </div>
                     </div>
                </div>
            </div>
        </section>
    <!-- Services area-->
    
    <!-- Top Picks-->
    @if(!$sales->isEmpty())
        <section class="section-padding top-picks-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="top_picks_title">
                            <h2>Top Picks for you</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div id="carousel-picks" class="carousel-picks owl-carousel owl-theme" >
                        @foreach ($sales as $sale)
                            <div class="item">
                                @if ($sale->bike_sell_status == 'sold')
                                    <span class="notify-badge">Sold</span>
                                @elseif ($sale->bike_sell_status == 'booked')
                                    <span class="notify-badge">Booked</span>
                                @endif
                                <div class="col-item {{ $sale->bike_sell_status }}">
                                    <div class="photo">
                                        @if ($sale->offers)
                                            <div class="timer">
                                                
                                                @if ($sale->offers->offer_end_date >= today()->format('Y-m-d'))
                                                <span>Ends in</span>
                                                    <span class="countdown1">{{ $sale->offers->offer_end_date }}</span>
                                                @endif  

                                                {{-- <span data-countdown="{{ $sale->offers->offer_end_date }}" class="countdown1">{{ $sale->offers->offer_end_date }}</span> --}}
                                            </div>
                                        @endif
                                        <a href="{{ route('product-details', $sale->id) }}"><img src="{{ asset('storage/'.$sale->bike_image) }}" class="img-responsive top-sell" alt="Product Details" /></a>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-8 col-sm-8 col-xs-8">
                                                <h4><span class="top_year_italic">{{ $sale->bike_year ?? ''}}</span> {{ $sale->bike_name }}</h4>
                                                {{-- <p>{{ $sale->models->model_cc }}CC</p> --}}
                                                {{-- <h5 class="price-text-color">50,000 Onwards</h5> --}}
                                                @if ($sale->offers)
                                                    @if ($sale->offers->offer_end_date >= today()->format('Y-m-d') || $sale->offers->offer_start_date===Null)
                                                        @if ($sale->offers->offer_type=='percentage')
                                                            <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $sale->bike_sell_price - $sale->bike_sell_price * $sale->offers->offer_amount / 100 }}/-</h5>
                                                        @else
                                                            <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $sale->bike_sell_price - $sale->offers->offer_amount }}/-</h5>
                                                        @endif
                                                    @else
                                                        <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $sale->bike_sell_price }}/-</h5>
                                                    @endif
                                                @else
                                                    <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $sale->bike_sell_price }}/-</h5>
                                                @endif

                                                @if ($sale->offers)
                                                    @if($sale->offers->offer_end_date >= today()->format('Y-m-d') || $sale->offers->offer_start_date===Null)
                                                        <span class="price-off"><i class="fa fa-rupee"></i>{{ $sale->offers->offer_amount }}{{ $sale->offers->offer_type=='percentage' ? '%' : ''}}/- off</span>
                                                    @else
                                                        <br>
                                                    @endif
                                                @else
                                                    <br>
                                                @endif
                                                
                                            </div>
                                            
                                            <div class="price col-md-4 text-right">
                                                <div class="certified-tag ">
                                                    <img src="{{ asset('frontend/images/certified.png')}}" alt="certified" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="box-address">
                                        <p><i class="fa fa-map-marker"></i> {{ $sale->shop->shop_name ?? 'N/A' }}, {{ $sale->shop_city->city_name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>      
                    
            </div>
        </section>
    @endif
    <!-- Top Picks-->
    
    
    
    <!-- quote-->
        <section class="quote-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="quote-text">
                            <h2 class="want_sell_desk">Want to sell your bike at <br>the best price?</h2>
                            <h2 class="want_sell_mob">Want to sell your bike at the best price?</h2>
                            <h3 class="check_cal_desk">Check out our Bike Value Calculator</h3>
                            <a href="{{ route('sell-bike.index') }}" class="quote-btn quote_btn_desk">Get Quote</a>
                        </div>
                    </div>
                    <div class="col-md-5 quote_img_sec">
                        <img src="{{ asset('frontend/images/quote.png')}}" class="img-responsive" alt="Get Quote" />
                        <div class="quote_text_btn_mob">
                            <div class="quote-text">
                                <h3 class="check_cal_mob">Check out our Bike Value Calculator</h3>
                                <a href="{{ route('sell-bike.index') }}" class="quote-btn quote_btn_mob">Get Quote</a>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </section>
    <!--Quote-->
    <!-- why Choose-->
    <section class="why-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="why_choose_title">
                        <h2>Why Choose <span>Bikes24X7</span>?</h2>
                    </div>
                    <p class="why_text_bottom">We provide a hassle free platform where you don't need to worry about anything.<br>
                    All you have to do is show up, and we will take care of the rest for YOU!</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-2 col-xs-4 why-box">
                <img src="{{ asset('frontend/images/why1.png')}}" alt="30+ years of Management Experience" />
                <p>30+ years of Management Experience</p>
                </div>
                <div class="col-md-2 col-xs-4 why-box">
                <img src="{{ asset('frontend/images/why2.png')}}" alt="Quality Assurance" />
                <p>Quality <br>Assurance</p>
                </div>
                <div class="col-md-2 col-xs-4 why-box">
                <img src="{{ asset('frontend/images/why3.png')}}" alt="Insurance Available"/>
                <p>Insurance <br>Available</p>
                </div>
                <div class="col-md-2 col-xs-4 why-box">
                <img src="{{ asset('frontend/images/why4.png')}}" alt="Free 6 Months Warranty"/>
                <p>Free 6 Months Warranty</p>
                </div>
                <div class="col-md-2 col-xs-4 why-box">
                <img src="{{ asset('frontend/images/why5.png')}}" alt="Fully Refurbished and Certified"/>
                <p>Fully <br>Refurbished and Certified</p>
                </div>
                <div class="col-md-2 col-xs-4 why-box">
                <img src="{{ asset('frontend/images/why6.png')}}" alt="Easy Finance"/>
                <p>Easy <br>Finance</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- why Choose-->
    <!--brands-->
        <section class="section-padding top-picks-sec-brand">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand_title">
                            <h2>Browse by Brands</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                
                    <div id="carousel-brand" class="carousel-brand owl-carousel owl-theme" >
                        <div class="item">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('frontend/images/brand1.jpg')}}" class="img-responsive" alt="brand 1" />
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('frontend/images/brand2.jpg')}}" class="img-responsive" alt="brand2" />
                                </div>
                                
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('frontend/images/brand3.jpg')}}" class="img-responsive" alt="brand3" />
                                </div>
                                
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('frontend/images/brand4.jpg')}}" class="img-responsive" alt="brand4" />
                                </div>
                                
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('frontend/images/brand1.jpg')}}" class="img-responsive" alt="brand1" />
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('frontend/images/brand2.jpg')}}" class="img-responsive" alt="brand2" />
                                </div>
                                
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('frontend/images/brand3.jpg')}}" class="img-responsive" alt="brand3" />
                                </div>
                                
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="{{ asset('frontend/images/brand4.jpg')}}" class="img-responsive" alt="brand4" />
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--brands-->
    
    <!-- News Update-->
        <section class="section-padding top-picks-sec-newsupdate">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="news_update_title">
                            <h2>News Updates</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div id="carousel-news" class="carousel-news owl-carousel owl-theme" >
                        <!-- Wrapper for slides -->
                        @foreach ($blogs as $blog)
                            <div class="item">
                                <div class="col-item">
                                    <div class="row">
                                        <div class="photo">
                                            <img src="{{ asset('storage/'.$blog->image) }}" class="img-responsive" alt="Blog Image" />
                                        </div>
                                    
                                        <div class="info">
                                            <p>{{ $blog->blog_title }}</p>
                                        </div>
                                    </div>
                                    <div class="info2 clearfix">
                                        <p>{{ Str::limit($blog->description, 200) }}</p>
                                    </div>
                                    
                                    <p><span class="author">By {{ $blog->user->user_first_name }} {{ $blog->user->user_last_name }}</span>
                                    <span class="date pull-right">{{ $blog->created_at->format('d/m/Y') }}</span></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    <!--News Update-->
    <section class="bottom_space_main_sec">
        <div class="bottom_space_inner_sec">
            <h3 hidden>Blank</h3>
        </div>
    </section>

@endsection

		
	