@extends('frontend.layout')
@section('title', 'About Us')
@section('meta_desc', 'Bikes24x7 is Pune’s best pre-owned two wheeler dealer. With over 30 years experience in the two wheeler industry, Bikes24x7 has made a name for it’s reliable service, and customer friendly approach')
@push('style') 
    <link rel="stylesheet" href="{{ asset('frontend/css/about_us.css')}}" type="text/css">
@endpush
@section('content')
<section class="aboutus_section">
    <div class="about_us_top2_sec">
        <div class="container">
            <div class="about_top_sec col-md-12">
                <div class="col-md-6 about_top_left_sec">
                    <img src="{{ asset('frontend/images/about_us1.png')}}" />
                </div>
                <div class="col-md-6 about_top_right_sec">
                    <h2>About Us</h2>
                    <p>Bikes24x7 is Pune’s best pre-owned two wheeler dealer. With over 30 years experience in the two wheeler industry, Bikes24x7 has made a name for it’s reliable service, and customer friendly approach.</p>
                    <p>Bikes 24x7 is founded and led by Krishi Khandelwal and his two daughters and co-founders Khyati and Disha Khandelwal who strive for transparency, consistency, and high quality. With this in mind, while selling, we at Bikes 24x7 use only the most accurate calculator to determine the true value of your old two wheeler to ensure you get the best deal possible. While buying, We ensure that all our bikes are refurbished in-house so you can purchase a two wheeler that looks new and feels new. All transactions with us are hassle-free since we take care of all the paperwork required by transaction. We know how important your first bike is to you, so visit us today, and ride with pride forever after!</p>
                </div>
            </div>
            <div class="about_us_second_sec col-md-12">
                <div class="col-md-4 about_us_second_sec_1st">
                    <h2>Our Mission</h2>
                    <p>Bikes24x7 is working relentlessly to solve the problems of our customers during two wheeler trasactions. We recognise the struggles you face and strive to provide an effective framework for buying, selling and RTO problems to make your lives easier and hassle-free</p>
                </div>
                <div class="col-md-4 about_us_second_sec_2nd">
                    <h2>Our Vision</h2>
                    <p>Our vision is to re-establish the pre-owned two wheeler industry and demolish the stigma by ensuring that every user is proud of owning a second hand two-wheeler. We hope to reduce the amount of stress and hassle that is associated with a pre-owned two wheeler and make the process as smooth as possible for the benefit of our customers.</p>
                </div>
                <div class="col-md-4 about_us_second_sec_3rd">
                    <h2>Our Approach</h2>
                    <p>We listen to you because What you need matters the most to us, which is why we strive to provide high quality vehicles. <br>Our key to success is tranparency. <br>Our employees are welcoming and trained to provide you the best service possible. <br>Our team of machanics always maintain the highest industry standard while refurbishing all the two-wheelers in our stores. <br>And finally, our website is catered to help you everu step of the way. All our vehicles are insured and all the paperwork is done by us, at no extra cost.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="about_us_3rd_sec">
        <div class="container">
            <div class="about_us_3rd_sec_header">
                <h2>Our Services</h2>
            </div>
            <div class="about_us_3rd_sec_bottom col-md-12">
                <div class="col-md-4 about_3rd_sec_1st_col">
                    <img src="{{ asset('frontend/images/about_service1.png')}}" />
                    <h4>BUY BIKE</h4>
                    <p>Select a bike of your choice <br>to take home today!</p>
                </div>
                <div class="col-md-4 about_3rd_sec_2nd_col">
                    <img src="{{ asset('frontend/images/about_service2.png')}}" />
                    <h4>SELL BIKE</h4>
                    <p>Sell your bike hassle-free<br>within an hour</p>
                </div>
                <div class="col-md-4 about_3rd_sec_3rd_col">
                    <img src="{{ asset('frontend/images/about_service1.png')}}" />
                    <h4>RTO SERVICES</h4>
                    <p>We provide assistance with all<br>RTO related procedures</p>
                </div>
            </div>
        </div>
    </div>
    <div class="about_us_4th_main_sec">
        <div class="about_us_4th_sec">
            <div class="container">
                <div class="about_us_4th_sec_header">
                    <h2>Gallery</h2>
                </div>
                <div id="carousel-picks" class="carousel-picks owl-carousel owl-theme" >  
                    <div class="item">
                        <div class="about_gallery_col-item">
                            <div class="about_gallery_photo">
                                <img src="{{ asset('frontend/images/about_gallery1.png')}}" class="img-responsive" alt="a" />
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="about_gallery_col-item">
                            <div class="about_gallery_photo">
                                <img src="{{ asset('frontend/images/about_gallery2.png')}}" class="img-responsive" alt="a" />
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="about_gallery_col-item">
                            <div class="about_gallery_photo">
                                <img src="{{ asset('frontend/images/about_gallery3.png')}}" class="img-responsive" alt="a" />
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="about_gallery_col-item">
                            <div class="about_gallery_photo">
                                <img src="{{ asset('frontend/images/about_gallery2.png')}}" class="img-responsive" alt="a" />
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="about_gallery_col-item">
                            <div class="about_gallery_photo">
                                <img src="{{ asset('frontend/images/about_gallery1.png')}}" class="img-responsive" alt="a" />
                            </div>
                        </div>
                    </div>
                           
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    
@endpush