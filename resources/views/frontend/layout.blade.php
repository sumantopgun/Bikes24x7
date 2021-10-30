<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') - Bikes24x7</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('meta_desc')">
        <meta name="keywords" content="@yield('meta_keywords')">
        <meta name="google-site-verification" content="nGBkcn6680DsomsIXJgOcf1vmse2Bi2xvm_k5lSVsCQ">
        <link rel="shortcut icon" href="{{ asset('logo/favicon.png')}}" />
        <link rel="canonical" href="{{ url()->current() }}/" />
		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-YNQPV96RYK"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-YNQPV96RYK');
        </script>

        <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W8B7G3T');</script>
    <!-- End Google Tag Manager -->

        @stack('style')
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8B7G3T"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!-- Header--> 
        <header class="web-header">
            <div class="header-fixed">
                <div class="container-fluid">
                    <div class="row desk_header">
                        <div class="col-md-3 col-sm-3">
                            @forelse ($setting_value->where('setting_name','header_logo') as $header_logo)
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('storage/'.$header_logo->setting_value) }}" alt="logo" /></a>
                                </div>
                            @empty
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo.png')}}" alt="Logo" /></a>
                                </div>
                            @endforelse
                            
                        </div>
                            
                        <div class="col-md-9 col-sm-9">
                            <div class="top-nav">
                                <nav class="navbar">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        
                                    </div>
                                    <!-- Collection of nav links, forms, and other content for toggling -->
                                    <div id="navbarCollapse" class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li class="@yield('BuyBike')">
												@guest
													<a href="{{ route('buy-bike') }}">Buy Bike</a>
												@else
													@if (Auth::user()->user_type == 'shop_seller')
														<a href="{{ route('seller.buybike') }}">Buy Bike</a>
													@else
														<a href="{{ route('buy-bike') }}">Buy Bike</a>
													@endif
												@endguest
											</li>
                                            <li class="@yield('sellBike')">
												<a href="{{ route('sell-bike.index') }}">Sell Bike</a>
											</li>
                                            <li class="@yield('rto_services')">
												<a href="{{ route('rto-services.index') }}">RTO Services</a>
											</li>
                                            <li >
												<a href="{{ route('sell-bike.index') }}">Bike Value Calculator</a>
											</li>
                                            <li class="@yield('contact_us')">
												<a href="{{ route('contact_us') }}">Contact Us</a>
											</li>
                                            
                                        </ul>
                                        
                                    </div>
                                </nav>

                                <div class="right-nav">
                                    <a style="cursor: pointer;" class="search-btn"><i class="fa fa-search"></i></a>
                                    
                                    @guest
                                        <a href="{{ route('login') }}" class="user-btn"><i class="fa fa-user"></i></a> 
                                    @else
                                        <a class="user-btn" style="cursor: pointer;"><i class="fa fa-user user_dropdown"></i></a> 
                                        <div>
                                            <ul class="user_dropdown_menu">
                                            <li><a href="{{ route('login') }}">Dashboard</a></li><br>
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a></li>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    @endguest
                                    
                                </div>
        
      						</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="search-form-wrapper search-form-wrapper-desk">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2d"><i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                    <input type="text" autocomplete="on" name="desktop_search" id="desktopSearch" class="search form-control" placeholder="Search your Preferences (Ex. Honda Activa)">
                                    
                                    <span class="input-group-addon search-close" id="basic-addon121"><i class="fa fa-times" aria-hidden="true"></i>
                                    </span>
                                    {{-- </span> --}}
                                    <div id="myDesktopResult" class="autocomplete-items">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header-->

        <!--- Mobile Header-->
        <header class="mobile-header">
            <div class="header-fixed">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo.png')}}" alt="Logo" /></a>
                            </div>
                        </div>
                            
                        <div class="col-md-8 col-xs-6">
                            <div class="top-nav">
                                
                                <div class="right-nav">
                                    <a style="cursor: pointer;" class="search-btn"><i class="fa fa-search"></i></a> 
                                    
                                    @guest
                                        <a href="{{ route('login') }}" class="user-btn"><i class="fa fa-user"></i></a> 
                                    @else
                                        <a style="cursor: pointer;" class="user-btn user_dropdown"><i class="fa fa-user"></i></a> 
                                        <div>
                                            <ul class="user_dropdown_menu">
                                            <li><a href="{{ route('login') }}">Dashboard</a></li><br>
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form-mobile').submit();">Logout</a></li>
                                                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    @endguest
                                    
                                </div>

                                <div class="mob_ul_menu">

                                    <input type='checkbox' id="burger-shower">

                                    <span class='menu'>

                                        <label class='hamburger' for="burger-shower"></label>

                                    </span>

                                    <ul>

                                        <li style="padding-bottom: 15px;border-bottom: 2px dashed #d4d0d0;">

                                            <a href="{{ url('/') }}">Home</a>

                                        </li>

                                        <li style="padding-top: 15px;">

                                            @guest

												<a href="{{ route('buy-bike') }}">Bike Catalogue</a>

											@else

												@if (Auth::user()->user_type == 'shop_seller')

													<a href="{{ route('seller.buybike') }}">Bike Catalogue</a>

												@else

													<a href="{{ route('buy-bike') }}">Bike Catalogue</a>

												@endif

											@endguest

                                        </li>

                                        <li>

                                            <a href="{{ route('sell-bike.index') }}">Sell You Bike</a>

                                        </li>

                                        <li>

                                            <a href="{{ route('rto-services.index') }}">RTO services</a>

                                        </li>

                                        <li style="padding-bottom: 15px;border-bottom: 2px dashed #d4d0d0;">

                                            <a href="{{ route('sell-bike.index') }}">Bike Value Calculator</a>

                                        </li>
                                        <li style="padding-top: 15px;">

                                            <a href="{{ route('about_us') }}">About Us</a>

                                        </li>

                                        <li style="padding-bottom: 15px;border-bottom: 2px dashed #d4d0d0;">

                                            <a href="{{ route('contact_us') }}">Contact Us</a>

                                        </li>

                                        <li style="padding-top: 15px;">

                                            <a href="{{ route('faqs') }}">FAQs</a>

                                        </li>

                                        <li>

                                            <a href="{{ route('termsconditions') }}">T&C</a>

                                        </li>

                                        <li>

                                            <a href="{{ route('privacypolicy') }}">Privacy policy</a>

                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="search-form-wrapper">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon2m"><i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="mobile_search" id="mobileSearch" class="search form-control" placeholder="Search your Preferences (Ex. Honda Activa)">                            
                           
                            <span class="input-group-addon search-close" id="basic-addon12"><i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                            {{-- </span> --}}
                            <div id="myMobileResult" class="autocomplete-items"></div>
                        </div>
                    </div>
                
                    <div class="rounded-menu">
                        <ul>
                            <li class="active">
                                @guest
                                    <a href="{{ route('buy-bike') }}">BUY</a>
                                @else
                                    @if (Auth::user()->user_type == 'shop_seller')
                                        <a href="{{ route('seller.buybike') }}">BUY</a>
                                    @else
                                        <a href="{{ route('buy-bike') }}">BUY</a>
                                    @endif
                                @endguest
                            </li>
                            <li><a href="{{ route('sell-bike.index') }}">SELL </a></li>
                            <li><a href="{{ route('rto-services.index') }}">RTO </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--- Mobile Header-->

        @yield('content')
        <!--footer-->
        	<!-- Footer section -->
			<footer class="footer-section">
				<div class="container">
					<div class="footer-content">						
						<div class="row">
                            <div class="col-md-12 col-sm-12 text-left">
                                @forelse ($setting_value->where('setting_name','footer_logo') as $footer_logo)
                                    <a href="{{ url('/') }}"><img height="66" width="300" src="{{ asset('storage/'.$footer_logo->setting_value) }}" alt="Footer Logo"/></a>
                                @empty
                                    <a href="{{ url('/') }}"><img height="66" width="300" src="{{ asset('frontend/images/f-logo.png')}}" alt="Footer Logo"/></a>
                                @endforelse
                        	    
                                <p class="text-light">A Venture by RideOnRent Technologies Pvt. Ltd.</p>
                            </div>
							<div class="col-md-3 col-sm-3 col-lg-2 col-xl-2 col-xs-6 footer_sec_margin">
								<div class="single-footer quick_footer_mob">
                                	<h5>Quick Links</h5>
									<ul>
                                    	<li><a href="{{ route('registration') }}">Admin Registration</a></li>
                                        <li>
											@guest
												<a href="{{ route('buy-bike') }}">Buy Bike</a>
											@else
												@if (Auth::user()->user_type == 'shop_seller')
													<a href="{{ route('seller.buybike') }}">Buy Bike</a>
												@else
													<a href="{{ route('buy-bike') }}">Buy Bike</a>
												@endif
											@endguest
										</li>
                                        <li><a href="{{ route('sell-bike.index') }}">Sell Bike</a></li>
                                        <li><a href="{{ route('rto-services.index') }}">RTO Assistance</a></li>
                                        <li><a href="{{ route('sell-bike.index') }}">Bike Value Calculator</a></li>
                                        <li><a href="{{ route('login') }}">My Account</a></li>
                                        <li><a href="{{ route('news') }}">News</a></li>
                                        {{-- <li><a href="#">Customer Support</a></li> --}}
                                    </ul>
								</div><!-- .single-footer END -->
							</div>
                            
                            <div class="col-md-3 col-sm-3 col-lg-2 col-xl-2 col-xs-6 footer_sec_margin">
								<div class="single-footer know_footer_mob">
                                	<h5>Know More</h5>
									<ul>
                                    	<li><a href="{{ route('about_us') }}">About Us</a></li>
                                        {{-- <li><a href="#">How we work</a></li> --}}
                                        <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
                                        <li><a href="{{ route('faqs') }}">FAQ</a></li>
                                        
                                    </ul>
								</div><!-- .single-footer END -->
							</div>
                            
                            <div class="col-md-3 col-sm-3 col-lg-2 col-xl-2 col-xs-6 footer_sec_margin">
								<div class="single-footer brand_footer_mob">
                                	<h5>By Brands</h5>
									<ul>
                                    	<li><a href="#">Honda Hero</a></li>
                                        <li><a href="#">TVS</a></li>
                                        <li><a href="#">Bajaj </a></li>
                                        <li><a href="#">Yamaha</a></li>
                                        <li><a href="#">Suzuki</a></li>
                                        <li><a href="#">Royal Enfield</a></li>
                                        <li><a href="#">Mahindra </a></li>
                                        
                                        
                                    </ul>
								</div><!-- .single-footer END -->
							</div>
                            
                            <div class="col-md-3 col-sm-3 col-lg-2 col-xl-2 col-xs-6 footer_sec_margin">
								<div class="single-footer legal_footer_mob">
                                	<h5>LEGAL</h5>
									<ul>
                                    	<li><a href="{{ route('privacypolicy') }}">Privacy Policy</a></li>
                                        <li><a href="{{ route('termsconditions') }}">Terms & Conditions</a></li>
                                    </ul>
								</div><!-- .single-footer END -->
							</div>
							<div class="col-md-12 col-sm-12 col-lg-2 col-xl-2 col-xs-6">
								<div class="single-footer text-left">
                                    <h5>Contact Us</h5>
                                    <p><a href="tel:8483893934" style="color:white;">+91- 84838 93934</a></p>
                                    
									<p><a href="mailto:bikeshowroom24@gmail.com" style="color:white;">Bikeshowroom24@gmail.com</a></p>
									<p>S, No-20/3, Kharadkar Park, Flyover, near Bharat Petrol Pump,
                                     Mundhwa, Pune , Maharastra-411014</p>
									<ul class="social-icon">
                                    	<li><a href="https://www.facebook.com/bikes24x7/" target="blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://instagram.com/bikes24x7official?igshid=1slvqoblgby27" target="blank"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://www.linkedin.com/company/bikes24x7" target="blank"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="https://twitter.com/bikes24x7?s=09" target="blank"><i class="fa fa-twitter"></i></a></li>
                                    </ul>

								</div><!-- .single-footer END -->
							</div>
						</div>
					</div>
				</div>
				<div class="copyright-content">
					<div class="container">
						{{-- <div class="back-to-top-group">
							<div class="back-to-top-wraper show-last-pos active back-to-top-center">
								<a onclick="topFunction()" style="cursor: pointer;" id="scrollToTop" class="btn-2 iocn-btn full-round-btn back-to-top"><i class="fa fa-angle-up"></i></a>
							</div><!-- .back-to-top-wraper END -->
						</div> --}}
						<div class="copyright-text">
							<p><a href="{{ url('/') }}">Bikes24X7</a> &copy; 2019 All Rights Reserved.</p>
						</div>
					</div>
				</div>
			</footer><!-- .footer-section END -->
        <!--footer-->
        
        </div>
		<!-- all js here -->
        <script src="{{ asset('frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
    	<script src="{{ asset('frontend/js/owl.carousel.js')}}"></script>
        <script src="{{ asset('frontend/js/main.js')}}"></script>
        <script>
                $(document).ready( 
                    function() {
                $(".search-btn").click(function() {
                    $(".search-form-wrapper").show();
                    $(".navbar-collapse").hide();
                    $(".search-btn").css("opacity","0");
                    $(".rounded-menu").hide();
                    $(".desk_header").hide();
                    $("#desktopSearch").focus();
                    $("#mobileSearch").focus();
                });
        
                
                $(".search-close").click(function() {
                    $(".search-form-wrapper").hide();
                    $(".navbar-collapse").show();
                    $(".search-btn").css("opacity","1");
                    $(".rounded-menu").show();
                     $(".desk_header").show();
                });
            });
        </script>

        <script>
            $('#desktopSearch').on('keyup',function(){
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : "{{ route('productsearch') }}",
                    data:{'search':$value},
                    success:function(data){
                        $('#myDesktopResult').html(data);
                        // console.log(data);
                    }
                });
            })

            $('#mobileSearch').on('keyup',function(){
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : "{{ route('productsearch') }}",
                    data:{'search':$value},
                    success:function(data){
                        $('#myMobileResult').html(data);
                        // console.log(data);
                    }
                });
            })
            // function topFunction() {
            //     document.body.scrollTop = 0;
            //     document.documentElement.scrollTop = 0;
            // }

            $(".user_dropdown").click(function(){
                $(".user_dropdown_menu").toggle();
            });

        </script>
        @stack('scripts')
    </body>
</html>
