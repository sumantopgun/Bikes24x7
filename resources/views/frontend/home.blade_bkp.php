@extends('frontend.layout')
@section('title', 'Home')
@section('content')
@if(!$banners->isEmpty())
<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        @foreach ($banners as $banner)
            <div class="owl-slide cover" style="background-image: url({{ asset('storage/'.$banner->img) }});">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center @if($banner->position=='right') justify-content-md-end @else justify-content-md-start @endif">
                            <div class="@if($banner->position=='center') col-lg-12 @else col-lg-6 @endif static">
                                <div class="slide-text owl-slide-animated @if($banner->position=='right') text-right @elseif($banner->position=='center') text-center @endif white">
                                    {!! $banner->banner_text ?? '' !!}
                                    @if ($banner->button_text)
                                        <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{ $banner->btn_link ?? '#' }}" role="button" style="background:{{ $banner->button_bg_color }}; color:{{ $banner->button_text_color }};">{{ $banner->button_text ?? '' }}</a></div>
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div id="icon_drag_mobile"></div>
</div>
@endif
<!--/carousel-->

<ul id="banners_grid" class="clearfix">
    <li>
        <a href="#0" class="img_container">
            <img src="{{ asset('frontend_template/img/bikes/red-white-suzuki-motorcycle.png')}}" data-src="{{ asset('frontend_template/img/bikes/red-white-suzuki-motorcycle.png')}}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>Suzuki Collection</h3>
                <div><span class="btn_1">Shop Now</span></div>
            </div>
        </a>
    </li>
    <li>
        <a href="#0" class="img_container">
            <img src="{{ asset('frontend_template/img/bikes/Classic-500-by-Singh-Customs-3.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/Classic-500-by-Singh-Customs-3.jpg')}}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>Royal Enfield Collection</h3>
                <div><span class="btn_1">Shop Now</span></div>
            </div>
        </a>
    </li>
    <li>
        <a href="#0" class="img_container">
            <img src="{{ asset('frontend_template/img/bikes/41038_Yamaha_r15_v3--002.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/41038_Yamaha_r15_v3--002.jpg')}}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>Yamaha Collection</h3>
                <div><span class="btn_1">Shop Now</span></div>
            </div>
        </a>
    </li>
</ul>
<!--/banners_grid -->
		
<div class="container margin_60_35">
    <div class="main_title">
        <h2>Top Selling</h2>
        <span>Products</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="row small-gutters">
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
                    <span class="ribbon off">-30%</span>
                    <a href="#">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/bajaj-platina-125-dumdar-sawari-102003-695.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/bajaj-platina-125-dumdar-sawari-102003-695.jpg')}}" alt="">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/bajaj-platina-125-dumdar-sawari-102003-695.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/bajaj-platina-125-dumdar-sawari-102003-695.jpg')}}" alt="">
                    </a>
                    <div data-countdown="2020/06/15" class="countdown"></div>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="#">
                    <h3>Bajaj Platina 100</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">Rs. 43,797</span>
                    <span class="old_price">Rs. 54,797</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon off">-30%</span>
                <figure>
                    <a href="#">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/YamahaYZFR15V3.png')}}" data-src="{{ asset('frontend_template/img/bikes/YamahaYZFR15V3.png')}}" alt="">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/YamahaYZFR15V3.png')}}" data-src="{{ asset('frontend_template/img/bikes/YamahaYZFR15V3.png')}}" alt="">
                    </a>
                    <div data-countdown="2020/05/10" class="countdown"></div>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="#">
                    <h3>Yamaha YZF R15 V3</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">1.40 lakh</span>
                    <span class="old_price">1.55 lakh</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon off">-10%</span>
                <figure>
                    <a href="#">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/maxresdefault.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/maxresdefault.jpg')}}" alt="">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/maxresdefault.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/maxresdefault.jpg')}}" alt="">
                    </a>
                    <div data-countdown="2020/05/21" class="countdown"></div>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="#">
                    <h3>Hero Passion Pro 110</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">Rs. 60,190</span>
                    <span class="old_price">Rs. 67,190</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon new">New</span>
                <figure>
                    <a href="#">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/tvscitystarr.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/tvscitystarr.jpg')}}" alt="">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/tvscitystarr.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/tvscitystarr.jpg')}}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="#">
                    <h3>TVS Star City Plus</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">Rs. 62,356</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon new">New</span>
                <figure>
                    <a href="#">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/hero-splendor-plus-3.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/hero-splendor-plus-3.jpg')}}" alt="">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/hero-splendor-plus-3.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/hero-splendor-plus-3.jpg')}}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="#">
                    <h3>Hero Splendor Plus</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">Rs. 55,075</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon new">New</span>
                <figure>
                    <a href="#">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/20200219125702_Hero-Xtreme-160R-side.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/20200219125702_Hero-Xtreme-160R-side.jpg')}}" alt="">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/20200219125702_Hero-Xtreme-160R-side.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/20200219125702_Hero-Xtreme-160R-side.jpg')}}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="#">
                    <h3>Hero Xtreme 160R</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">Rs. 90,000</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon hot">Hot</span>
                <figure>
                    <a href="#">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/24926_4.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/24926_4.jpg')}}" alt="">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/24926_4.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/24926_4.jpg')}}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="#">
                    <h3>Bajaj Pulsar 150</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">Rs. 98,835</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <span class="ribbon hot">Hot</span>
                <figure>
                    <a href="#">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/Classic-500-by-Singh-Customs-3.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/Classic-500-by-Singh-Customs-3.jpg')}}" alt="">
                        <img class="img-fluid lazy" src="{{ asset('frontend_template/img/bikes/Classic-500-by-Singh-Customs-3.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/Classic-500-by-Singh-Customs-3.jpg')}}" alt="">
                    </a>
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="#">
                    <h3>Royal Enfield Classic 350</h3>
                </a>
                <div class="price_box">
                    <span class="new_price">Rs. 1.82 lakh</span>
                </div>
                <ul>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                    <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="featured lazy" data-bg="url({{ asset('frontend_template/img/bikes/wp2708386.jpg')}})">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Want to sell your <br> used bike at the best price?</h3>
                    
                    <div class="feat_text_block">
                        <!-- <div class="price_box">
                            <span class="new_price">Rs. 2.82 lakh</span>
                            <span class="old_price">Rs. 1.92 lakh</span>
                        </div> -->
                        <a class="btn_1" href="#" role="button">Get Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /featured -->


<!-- /container -->
		
<div class="bg_gray">
    <div class="container margin_30">
        <div id="brands" class="owl-carousel owl-theme">
            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/yamaha.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/yamaha.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/hero.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/hero.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/royal-enfield.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/royal-enfield.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/bmw.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/bmw.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/bajaj.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/bajaj.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/honda.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/honda.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item --> 

            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/tvs.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/tvs.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item --> 

            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/suzuki.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/suzuki.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item --> 
            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/mahindra.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/mahindra.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item --> 
            <div class="item">
                <a href="#0"><img src="{{ asset('frontend_template/img/bikes/brands/ktm.png')}}" data-src="{{ asset('frontend_template/img/bikes/brands/ktm.png')}}" alt="" class="owl-lazy"></a>
            </div><!-- /item --> 
        </div><!-- /carousel -->
    </div><!-- /container -->
</div>
<!-- /bg_gray -->

<div class="container margin_60_35">
    <div class="main_title">
        <h2>Latest News</h2>
        <span>Blog</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <a class="box_news" href="#">
                <figure>
                    <img src="{{ asset('frontend_template/img/bikes/Ducati-1299-Superleggera-India.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/Ducati-1299-Superleggera-India.jpg')}}" alt="" width="400" height="266" class="lazy">
                    <figcaption><strong>28</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>by Khyati K</li>
                    <li>20.04.2012</li>
                </ul>
                <h4>Ducati 1299 Superleggera recalled</h4>
                <p>Ducati is recalling 97 units of the 2017 1299 Superleggera in the US over a potential issue with the brake pads. The affected models were manufactured between 7 September 2017 and 7 December 2017.....</p>
            </a>
        </div>
        <!-- /box_news -->
        <div class="col-lg-6">
            <a class="box_news" href="#">
                <figure>
                    <img src="{{ asset('frontend_template/img/bikes/P90386409_lowRes_the-bmw-r-18-first-e.jpg')}}" data-src="{{ asset('frontend_template/img/bikes/P90386409_lowRes_the-bmw-r-18-first-e.jpg')}}" alt="" width="400" height="266" class="lazy">
                    <figcaption><strong>01</strong>May</figcaption>
                </figure>
                <ul>
                    <li>By Disha K</li>
                    <li>01.05.2020</li>
                </ul>
                <h4>BMW R18 cruiser bookings open in India ahead of launch</h4>
                <p>BMW Motorrad had globally unveiled the production version of the R18 cruiser last month which took the motorcycle fraternity by storm with its extremely gorgeous looks....</p>
            </a>
        </div>
        <!-- /box_news -->
        <div class="col-lg-6">
            <a class="box_news" href="#">
                <figure>
                    <img src="{{ asset('frontend_template/img/bikes/mt15 xsr155.png')}}" data-src="{{ asset('frontend_template/img/bikes/mt15 xsr155.png')}}" alt="" width="400" height="266" class="lazy">
                    <figcaption><strong>21</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>By By Disha K</li>
                    <li>01.03.2020</li>
                </ul>
                <h4>Yamaha MT 15 vs Yamaha XSR 155: What’s different?</h4>
                <p>The Yamaha XSR 155 is based on the Yamaha MT 15, although with a different flavour altogether. It is sold in South-East Asian markets and should be an interesting proposition if launched in India....</p>
            </a>
        </div>
        <!-- /box_news -->
        <div class="col-lg-6">
            <a class="box_news" href="#">
                <figure>
                    <img src="{{ asset('frontend_template/img/bikes/Coronavirus Pandemic.png')}}" data-src="{{ asset('frontend_template/img/bikes/Coronavirus Pandemic.png')}}" alt="" width="400" height="266" class="lazy">
                    <figcaption><strong>01</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>By Khyati K</li>
                    <li>20.01.2020</li>
                </ul>
                <h4>Coronavirus Pandemic: MV Agusta announces warranty extension</h4>
                <p>Italian two-wheeler manufacturer, MV Agusta has announced a three-month extension of warranty on its motorcycles. MV Agusta said in a statement that the warranty coverage has had very little use during the lockdown period.....</p>
            </a>
        </div>
        <!-- /box_news -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->

@endsection

		
	