<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Bikes 24X7</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
        <!-- Header--> 
        <header class="web-header">
            <div class="header-fixed">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('frontend/images/logo.png')}}" alt="" /></a>
                            </div>
                        </div>
                            
                        <div class="col-md-9">
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
                                            <li class="active"><a href="catalogue.html">Buy Bike</a></li>
                                            <li><a href="sell.html">Sell Bike</a></li>
                                            <li><a href="RTO-services.html">RTO Services</a></li>
                                            <li><a href="#">Bike Value Calculator</a></li>
                                            <li><a href="contact_us.html">Contact Us</a></li>
                                            
                                        </ul>
                                        
                                    </div>
                                </nav>
                                        
        						<div class="right-nav">
                                	<div class="search-container">
                                      <input type="text" placeholder="Search...">
                                      <div class="search"></div>
                                    </div>
                                    <a href="login.html" class="user-btn"><i class="fa fa-user"></i></a> 
                                </div>
        
      						</div>
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
                            <a href="index.html"><img src="{{ asset('frontend/images/logo.png')}}" alt="" /></a>
                            </div>
                        </div>
                            
                        <div class="col-md-8 col-xs-6">
                            <div class="top-nav">
                                <div class="right-nav">
                                	<div class="search-container">
                                      <input type="text" placeholder="Search...">
                                      <div class="search"></div>
                                    </div>
                                    <a href="login.html" class="user-btn"><i class="fa fa-user"></i></a> 
                                </div>
                                <label>
                                    <input type='checkbox'>
                                    <span class='menu'>
                                        <span class='hamburger'></span>
                                    </span>
                                    <ul>
                                        <li>
                                            <a href="#">Bike Value Calculator</a>
                                        </li>
                                        <li>
                                            <a href="contact_us.html">Contact Us</a>
                                        </li>
                                    </ul>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="rounded-menu">
                	<ul>
                    	<li class="active"><a href="catalogue.html">BUY</a></li>
                        <li><a href="sell.html">SELL </a></li>
                        <li><a href="RTO-services.html">RTO </a></li>
                    </ul>
                </div>
            </div>
        </header>
        <!--- Mobile Header-->

        <!-- Banner Area-->
        <section class="slider-area">
        	<div id="carousel-example" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example" data-slide-to="1"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <a href="#"><img src="{{ asset('frontend/images/slider1.jpg')}}" class="img-fluid" /></a>
                        <div class="carousel-caption">
                            <h1>Complete Solutions for <br>pre-owned Two Wheeler</h1>
                        </div>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/images/slider2.jpg')}}" class="img-fluid" /></a>
                        <div class="carousel-caption">
                            <h1>Ride with Pride</h1>
                        </div>
                    </div>
                </div>

                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </section>
        
		<!-- Banner Area-->
        <div class="main">
        <!-- Services area-->
        	<section class="section-padding service-sec">
            	<div class="container">
                	<div class="row">
                    <div class="col-md-12">
                        	<div class="sec-title">
                            	<h2>Our Services</h2>
                            </div>
                        </div>
                    	<div class="col-md-4 col-sm-6 text-center">
                            <div class="ser-box">
                                <img src="{{ asset('frontend/images/ser1.png')}}" />
                                <div class="ser-info">
                                <a href="catalogue.html" class="ser-btn">Buy Bike</a>
                                <p>Select A bike of your choice to take home today!</p>
                                </div>
                            </div>
                         </div>
                         
                         <div class="col-md-4 col-sm-6 text-center">
                            <div class="ser-box">
                                <img src="{{ asset('frontend/images/ser2.png')}}" />
                                <div class="ser-info">
                                <a href="sell.html" class="ser-btn">Sell Bike</a>
                                <p>Sell your bike hassle-free within an hour.</p>
                                </div>
                            </div>
                         </div>
                         
                         <div class="col-md-4 col-sm-6 text-center">
                            <div class="ser-box">
                                <img src="{{ asset('frontend/images/ser3.png')}}" />
                                <div class="ser-info">
                                <a href="RTO-services.html" class="ser-btn">RTO Services</a>
                                <p>Assistance with all RTO related documnts and procedures</p>
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
        	<section class="section-padding top-picks-sec">
            	<div class="container">
                	<div class="row">
                        <div class="col-md-12">
                            <div class="sec-title">
                                <h2>Top Picks for you</h2>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
        			
                    	<div id="carousel-picks" class="carousel-picks owl-carousel owl-theme" >
                    
                        
                            <div class="item">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{ asset('frontend/images/product-1.jpg')}}" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h4>
                                                    Honda Activa</h4>
                                                    <p>125CC</p>
                                                <h5 class="price-text-color">
                                                    50,000 Onwards</h5>
                                                    <span class="price-off">15% Off</span>
                                                    
                                            </div>
                                            
                                            <div class="price col-md-6 text-right">
                                                <div class="certified-tag ">
                                                    <img src="{{ asset('frontend/images/certified.png')}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="box-address">
                                        <p><i class="fa fa-map-marker"></i> Kharadi, Pune</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{ asset('frontend/images/product-2.jpg')}}" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h4>
                                                    Suzuki Gixxer</h4>
                                                    <p>125CC</p>
                                                <h5 class="price-text-color">
                                                    70,000 Onwards</h5>
                                                    <span class="price-off">15% Off</span>
                                                    
                                            </div>
                                            
                                            <div class="price col-md-6 text-right">
                                                <div class="certified-tag ">
                                                    <img src="{{ asset('frontend/images/certified.png')}}"/>
                                                    </div>
                                                    
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="box-address">
                                        <p><i class="fa fa-map-marker"></i> Kharadi, Pune</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{ asset('frontend/images/product-3.jpg')}}" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h4>
                                                    Bajaj Pulser</h4>
                                                    <p>125CC</p>
                                                <h5 class="price-text-color">
                                                    90,000 Onwards</h5>
                                                    <span class="price-off">15% Off</span>
                                                    
                                            </div>
                                            
                                            <div class="price col-md-6 text-right">
                                                <div class="certified-tag ">
                                                    <img src="{{ asset('frontend/images/certified.png')}}"/>
                                                    </div>
                                                    
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="box-address">
                                        <p><i class="fa fa-map-marker"></i> Kharadi, Pune</p>
                                    </div>
                                </div>
                            </div>
                               
                            <div class="item">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{ asset('frontend/images/product-1.jpg')}}" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h4>Honda Activa</h4>
                                                <p>125CC</p>
                                                <h5 class="price-text-color">50,000 Onwards</h5>
                                                <span class="price-off">15% Off</span>
                                            </div>
                                            
                                            <div class="price col-md-6 text-right">
                                                <div class="certified-tag ">
                                                    <img src="{{ asset('frontend/images/certified.png')}}"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="box-address">
                                        <p><i class="fa fa-map-marker"></i> Kharadi, Pune</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="item">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="{{ asset('frontend/images/product-2.jpg')}}" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="price col-md-6">
                                                <h4>
                                                    Suzuki Gixxer</h4>
                                                    <p>125CC</p>
                                                <h5 class="price-text-color">
                                                    70,000 Onwards</h5>
                                                <span class="price-off">15% Off</span>
                                                
                                            </div>
                                            
                                            <div class="price col-md-6 text-right">
                                            <div class="certified-tag ">
                                                <img src="{{ asset('frontend/images/certified.png')}}"/>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <div class="box-address">
                                            <p><i class="fa fa-map-marker"></i> Kharadi, Pune</p>
                                        </div>
                                </div>
                            </div>
                                    <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                            	<div class="timer">
                                                	<span>Ends in</span>
                                                    <span id="demo"></span>
                                                </div>
                                                <img src="{{ asset('frontend/images/product-3.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="price col-md-6">
                                                    	
                                                        <h4>
                                                            Bajaj Pulser</h4>
                                                            <p>125CC</p>
                                                        <h5 class="price-text-color">
                                                            90,000 Onwards</h5>
                                                         <span class="price-off">15% Off</span>
                                                         
                                                    </div>
                                                    
                                                    <div class="price col-md-6 text-right">
                                                       <div class="certified-tag ">
                                                         <img src="{{ asset('frontend/images/certified.png')}}"/>
                                                         </div>
                                                         
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="clearfix">
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="box-address">
                                                	<p><i class="fa fa-map-marker"></i> Kharadi, Pune</p>
                                                </div>
                                            
                                        </div>
                                    </div>
                               
                            </div>
                      </div>      
                        
                    </div>
                    
                    </div>
                </div>
                
            </section>
        <!-- Top Picks-->
        
        
        
        <!-- quote-->
        	<section class="quote-area">
            	<div class="container">
                	<div class="row">
                    	<div class="col-md-7">
                        	<div class="quote-text">
                            	<h2>Want to sell your Bike at <br>the best price?</h2>
                                <h3>Check out our bike value Calculator!</h3>
                                <a href="" class="quote-btn">Get a Quote</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                        	<img src="{{ asset('frontend/images/quote.png')}}" class="img-responsive"/>
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
                    	<div class="sec-title">
                            	<h2>Why Choose <span>Bikes24X7</span>?</h2>
                            </div>
                            <p>We provide a hassle free platform where you didn't need to worry about anything.<br>
                            All you have to do is show up, and we will take care of the rest for YOU!</p>
                    </div>
                </div>
                
                <div class="row">
                	<div class="col-md-2 col-xs-4 why-box">
                    <img src="{{ asset('frontend/images/why1.png')}}"/>
                    <p>30+ years of management experience</p>
                    </div>
                    <div class="col-md-2 col-xs-4 why-box">
                    <img src="{{ asset('frontend/images/why2.png')}}"/>
                    <p>Quality <br>Assurance</p>
                    </div>
                    <div class="col-md-2 col-xs-4 why-box">
                    <img src="{{ asset('frontend/images/why3.png')}}"/>
                    <p>Fully <br>Refurbished and certified</p>
                    </div>
                    <div class="col-md-2 col-xs-4 why-box">
                    <img src="{{ asset('frontend/images/why4.png')}}"/>
                    <p>Free 6 months warranty</p>
                    </div>
                    <div class="col-md-2 col-xs-4 why-box">
                    <img src="{{ asset('frontend/images/why5.png')}}"/>
                    <p>Insurance</p>
                    </div>
                    <div class="col-md-2 col-xs-4 why-box">
                    <img src="{{ asset('frontend/images/why6.png')}}"/>
                    <p>Easy <br>Finance</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- why Choose-->
        <!--brands-->
        	<section class="section-padding top-picks-sec">
            	<div class="container">
                	<div class="row">
                    <div class="col-md-12">
                        	<div class="sec-title">
                            	<h2>Browse by Brands</h2>
                            </div>
                        </div>
                    	
                         
                         
                    </div>
                    
                    <div class="row">
        			
                    	<div id="carousel-brand" class="carousel-brand owl-carousel owl-theme" >
                    
                       
                                
                                    <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/brand1.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/brand2.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/brand3.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/brand4.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                     <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/brand1.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/brand2.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/brand3.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-item">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/brand4.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                        </div>
                                    </div>
                      
                    </div>
                </div>
                
            </section>
        <!--brands-->
        
        <!-- News Update-->
        	<section class="section-padding top-picks-sec">
            	<div class="container">
                	<div class="row">
                    <div class="col-md-12">
                        	<div class="sec-title">
                            	<h2>News Updates</h2>
                            </div>
                        </div>
                    	
                         
                         
                    </div>
                    
                    <div class="row">
        			
                    	<div id="carousel-news" class="carousel-news owl-carousel owl-theme" >
                    
                        <!-- Wrapper for slides -->
                        
                                    <div class="item">
                                        <div class="col-item">
                                        	<div class="row">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/news1.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                            <div class="info">
                                            	<h3>Ducati 1299 superleggera recalled</h3>
                                                
                                            </div>
                                            </div>
                                            <div class="info2 clearfix">
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                </p>
                                            </div>
                                            
                                            <p><span class="author">By Super Admin</span>
                                            <span class="date pull-right">25 Aug, 2020</span></p>
                                            
                                        </div>
                                    </div>
                                   <div class="item">
                                        <div class="col-item">
                                        	<div class="row">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/news2.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                            <div class="info">
                                            	<h3>Royal Enfield classic 350 highest selling motorcycle</h3>
                                                
                                            </div>
                                            </div>
                                            <div class="info2 clearfix">
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                </p>
                                            </div>
                                            
                                            <p><span class="author">By Super Admin</span>
                                            <span class="date pull-right">25 Aug, 2020</span></p>
                                            
                                        </div>
                                    </div>
                                    
                                   <div class="item">
                                        <div class="col-item">
                                        	<div class="row">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/news2.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                            <div class="info">
                                            	<h3>Royal Enfield classic 350 highest selling motorcycle</h3>
                                                
                                            </div>
                                            </div>
                                            <div class="info2 clearfix">
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                </p>
                                            </div>
                                            
                                            <p><span class="author">By Super Admin</span>
                                            <span class="date pull-right">25 Aug, 2020</span></p>
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-item">
                                        	<div class="row">
                                            <div class="photo">
                                                <img src="{{ asset('frontend/images/news2.jpg')}}" class="img-responsive" alt="a" />
                                            </div>
                                            
                                            <div class="info">
                                            	<h3>Royal Enfield classic 350 highest selling motorcycle</h3>
                                                
                                            </div>
                                            </div>
                                            <div class="info2 clearfix">
                                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                                </p>
                                            </div>
                                            
                                            <p><span class="author">By Super Admin</span>
                                            <span class="date pull-right">25 Aug, 2020</span></p>
                                            
                                        </div>
                                    </div>
                               
                           
                    </div>
                    
                    </div>
                </div>
                
            </section>
        <!--News Update-->
        <!--footer-->
        	<!-- Footer section -->
			<footer class="footer-section">
				<div class="container">
					<div class="footer-content">						
						<div class="row">
                            <div class="col-md-12 col-sm-12 text-left">
                        	    <a href="index.html"><img src="{{ asset('frontend/images/f-logo.png')}}"/></a>
                                <p class="text-light">A Venture By Ridornament Technologies Pvt Ltd.</p>
                            </div>
							<div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
								<div class="single-footer">
                                	<h5>Quick Links</h5>
									<ul>
                                    	<li><a href="#">Admin Registration</a></li>
                                        <li><a href="catalogue.html">Buy Bike</a></li>
                                        <li><a href="sell.html">Sell Bike</a></li>
                                        <li><a href="RTO-services.html">RTO Assistance</a></li>
                                        <li><a href="#">Bike Value Calculator</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="newupdates.html">Blog Site</a></li>
                                        <li><a href="#">Customer Support</a></li>
                                    </ul>
								</div><!-- .single-footer END -->
							</div>
                            
                            <div class="col-md-3 col-sm-3 col-lg-2 col-xl-2">
								<div class="single-footer">
                                	<h5>Know More</h5>
									<ul>
                                    	<li><a href="about_us.html">About Us</a></li>
                                        <li><a href="#">How we work</a></li>
                                        <li><a href="contact_us.html">Contact Us</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        
                                    </ul>
								</div><!-- .single-footer END -->
							</div>
                            
                            <div class="col-md-3 col-sm-3 col-lg-2 col-xl-2">
								<div class="single-footer">
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
                            
                            <div class="col-md-3 col-sm-3 col-lg-2 col-xl-2">
								<div class="single-footer">
                                	<h5>LEGAL</h5>
									<ul>
                                    	<li><a href="privacypolicy.html">Privacy Policy</a></li>
                                        <li><a href="privacypolicy.html">Terms & Conditions</a></li>
                                    </ul>
								</div><!-- .single-footer END -->
							</div>
							<div class="col-md-12 col-sm-12 col-lg-3 col-xl-3">
								<div class="single-footer text-left">
                                    <h5>Contact Us</h5>
									<p>+91- 9876543210
									<p>Bikeshowroom24@gmail.com</p>
									<p>S, No-20/3, Kharadkar Park, Flyover, near Bharat Petrol Pump,
                                     Mundhwa, Pune , Maharastra-411014</p>
									<ul class="social-icon">
                                    	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>

								</div><!-- .single-footer END -->
							</div>
						</div>
					</div>
				</div>
				<div class="copyright-content">
					<div class="container">
						<div class="back-to-top-group">
							<div class="back-to-top-wraper show-last-pos active back-to-top-center">
								<a href="#" class="btn-2 iocn-btn full-round-btn back-to-top"><i class="fa fa-angle-up"></i></a>
							</div><!-- .back-to-top-wraper END -->
						</div>
						<div class="copyright-text">
							<p><a href="#">Bikes24X7</a> &copy; 2019 All Rights Reserved. |  
							Designed & Developed By<a href="#" target="_blank">  Aetos Technologies</a></p>
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
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = hours + ": "
  + minutes + ": " + seconds ;

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
    </body>
</html>
