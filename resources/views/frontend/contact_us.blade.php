@extends('frontend.layout')
@section('title', 'Contact Us')
@section('meta_desc', 'We know how important your first bike is to you, we help you to find your dream vehicle. Contact us at Bikeshowroom24@gmail.com or simply give us a call on +91- 84838 93934.')
@section('meta_keywords', 'contact us, call us at, visit us')
@section('contact_us', 'active')
@push('style') 
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css')}}" type="text/css">
    <style>
        .mapSize{
            width: 510px;
            height: 380px;
        }
        @media only screen and (max-width: 992px) {
            .mapSize{
                width: 100%;
                height: auto;
            }
        }
    </style>
@endpush
@section('content')
<section class="contact_us_sec">
    <div class="con_top2_sec">
        <div class="container">
            <div class="contact_us_header">
                <i class="fa fa-minus" aria-hidden="true" style="font-size: 20px;"></i>
                <i class="fa fa-minus" aria-hidden="true" style="font-size: 20px; margin-left: -4px;"></i>
                <span> Contact Us </span>
                <i class="fa fa-minus" aria-hidden="true" style="font-size: 20px;"></i>
                <i class="fa fa-minus" aria-hidden="true" style="font-size: 20px; margin-left: -4px;"></i>
            </div>
            <div class="contact_us_main_sec col-md-12">
                <div class="contact_us_top_img_sec">
                    <img src="{{ asset('frontend/images/contact.svg')}}"/>
                </div>
                <div class="contact_us_bottom_sec col-md-12">
                    <div class="contact_us_bottom_form_sec col-md-6">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form action="{{ route('query_send') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Your Name" value="{{ old('name') }}" name="name" required>
                                @error('name')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Your Email Address" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phno">Mobile Number *</label>
                                <input type="number" class="form-control" id="phno" placeholder="Enter Your Mobile Number" name="phno" value="{{ old('phno') }}" required>
                                @error('phno')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject *</label>
                                <select class="form-control" name="subject" id="subject" required>
                                    <option value="">Select an option</option>
                                    <option value="I want to buy a bike">I want to buy a bike</option>
                                    <option value="I want to sell a bike">I want to sell a bike</option>
                                    <option value="others">Other</option>
                                </select>
                                @error('subject')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                            <div id="sellDetails">
                                <div class="form-group">
                                    <label for="sell_brand">Brand Name *</label>
                                    <input type="text" class="form-control" id="sell_brand" placeholder="Enter Brand Name" value="{{ old('sell_brand') }}" name="sell_brand">
                                    @error('sell_brand')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sell_model">Model Name *</label>
                                    <input type="text" class="form-control" id="sell_model" placeholder="Enter Model Name" value="{{ old('sell_model') }}" name="sell_model">
                                    @error('sell_model')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sell_year">Bike Year *</label>
                                    <input type="month" class="form-control" id="sell_year" placeholder="Enter Bike Year" value="{{ old('sell_year') }}" name="sell_year">
                                    @error('sell_year')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kilometers">Kilometers Run (KM) *</label>
                                    <input type="text" class="form-control" id="kilometers" placeholder="Kilometers Run (KM)" value="{{ old('kilometers') }}" name="kilometers">
                                    @error('kilometers')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="estimated_price">Estimated Price *</label>
                                    <input type="number" class="form-control" id="estimated_price" placeholder="Estimated Price" value="{{ old('estimated_price') }}" name="estimated_price">
                                    @error('estimated_price')
                                        <label class="error text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group" id="otherSubjectShow">
                                <label for="other_subject">Other Subject *</label>
                                <input type="text" class="form-control" id="other_subject" placeholder="Enter Other Subject" name="other_subject">
                                @error('other_subject')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="query">Query *</label>
                                <textarea class="form-control" rows="5" id="query" name="querymsg" placeholder="Enter Your Query" required>{{ old('querymsg') }}</textarea>
                                @error('querymsg')
                                    <label class="error text-danger">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="con_submit_sec">
                                <button type="submit" class="contact_submit_btn">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="contact_us_bottom_address_sec col-md-6">
                        <div class="con_map_image">
                            {{-- <img src="{{ asset('frontend/images/contact_map.png')}}"/> --}}
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1891.4044284067215!2d73.93355274080199!3d18.537537890028013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c18042288295%3A0x37f9c4e66ef3f089!2sBikes24x7!5e0!3m2!1sen!2sin!4v1609253758122!5m2!1sen!2sin" class="mapSize" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="con_address_sec">
                            <p>S-no, 20/3, Kharadhar Park, Flyover, near Bharat <br>Petrol Pump, Mundhwa, Pune, Maharashtra 411014</p>
                            <h4>www.bikes24x7.com</h4>
                            <h4>+91-84838 93934</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="con_social_sec">
        <div class="con_social_icon_sec">
            <div class="container">
                <div class="con_social_text">
                    <span>Connect With Us</span>
                </div>
                <div class="con_social_icon">
                    <a target="blank" href="https://instagram.com/bikes24x7official?igshid=1slvqoblgby27"><img src="{{ asset('frontend/images/soial_insta1.png')}}" alt="Instagram" title="Instagram"/></a>
                    <a target="blank" href="https://www.facebook.com/bikes24x7/"><img src="{{ asset('frontend/images/soial_fb1.png')}}" alt="facebook" title="facebook"/></a>
                    {{-- <img src="{{ asset('frontend/images/soial_wh1.png')}}"/> --}}
                    <a href="https://twitter.com/bikes24x7?s=09" target="blank"><img src="{{ asset('frontend/images/soial_twitter1.png')}}" alt="twitter" title="twitter"/></a>
                    <a href="https://www.linkedin.com/company/bikes24x7" target="blank"><img src="{{ asset('frontend/images/soial_last.png')}}" alt="linkedin" title="linkedin"/></a>
                    {{-- <a href="http://"><img src="{{ asset('frontend/images/youtube_img.png')}}"/></a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $('#otherSubjectShow').hide();
    $('#sellDetails').hide();

    $("#subject").change(function(){
        var subject = $('[name="subject"]').val();
        if(subject=='others'){
            $('#other_subject').prop('required',true);
            $('#otherSubjectShow').show();
            $('#sellDetails').hide();
            $('#sell_brand').prop('required',false);
            $('#sell_model').prop('required',false);
            $('#sell_year').prop('required',false);
            $('#kilometers').prop('required',false);
            $('#estimated_price').prop('required',false);
        }else if (subject=='I want to sell a bike'){
            $('#sell_brand').prop('required',true);
            $('#sell_model').prop('required',true);
            $('#sell_year').prop('required',true);
            $('#kilometers').prop('required',true);
            $('#estimated_price').prop('required',true);
            $('#sellDetails').show();
            $('#other_subject').prop('required',false);
            $('#otherSubjectShow').hide();
        }else{
            $('#other_subject').prop('required',false);
            $('#sell_brand').prop('required',false);
            $('#sell_model').prop('required',false);
            $('#sell_year').prop('required',false);
            $('#kilometers').prop('required',false);
            $('#estimated_price').prop('required',false);
            $('#otherSubjectShow').hide();
            $('#sellDetails').hide();
        }
    });
</script>
    
@endpush