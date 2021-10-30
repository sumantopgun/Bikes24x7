@extends('frontend.layout')
@section('title', 'RTO Related Documents and Procedures')
@section('rto_services', 'active')
@section('meta_desc', 'Our RTO assistance service will help you with two wheeler registration, transferring the ownership of your vehicle to NOC, driving license, passing, repassing, duplicate RC & loan cancellation.')
@section('meta_keywords', 'bike registration transfer, bike ownership transfer, transfer bike ownership, rc ownership transfer, rto two wheeler registration, rto vehicle ownership transfer')
@section('content')


<div class="main2">
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">RTO Services</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="RTO-area">
        <div class="container">
            <div class="row row-centered">
                <div class="col-md-3 col-sm-4 col-centered">
                    
                    <div class="rto-box">
                    <a href="{{ route('rto-services.show', $rto_transfer='rto-transfer') }}">
                        <img src="{{ asset('frontend/images/rto1.png')}}"/>
                        
                        
                            <h3>RTO Transfer</h3>
                            <p>Required while transferring the ownership of your vehicle under the same RTO jurisdiction.
                            </p>
                            <div class="more-btn">
                                <a href="{{ route('rto-services.show', $rto_transfer='rto-transfer') }}" class="click-btn">Click Here</a>
                            </div>
                        
                    </a>
                   </div>
                    
                </div>
                
                <div class="col-md-3 col-sm-4 col-centered">
                    
                    <div class="rto-box">
                    <a href="{{ route('rto-services.show', $noc='noc') }}">
                        <img src="{{ asset('frontend/images/rto2.png')}}"/>
                        
                        
                            <h3>noc</h3>
                            <p>Required while transferring ownership of your vehicle under the jurisdiction of a different RTO.
                            </p>
                            <div class="more-btn">
                                <a href="{{ route('rto-services.show', $noc='noc') }}" class="click-btn">Click Here</a>
                            </div>
                        
                    </a>
                   </div>
                    
                </div>
                
                <div class="col-md-3 col-sm-4 col-centered">
                    
                    <div class="rto-box">
                    <a href="{{ route('rto-services.show', $license='license') }}">
                        <img src="{{ asset('frontend/images/rto3.png')}}"/>
                        
                       
                            <h3>License</h3>
                            <p>2-wheeler or 4 wheeler driving license services available.</p>
                            <div class="more-btn">
                                <a href="{{ route('rto-services.show', $license='license') }}" class="click-btn">Click Here</a>
                            </div>
                       
                    </a>
                   </div>
                    
                </div>
                
                <div class="col-md-3 col-sm-4 col-centered">
                    
                    <div class="rto-box">
                    <a href="{{ route('rto-services.show', $loan_cancellation='loan-cancellation') }}">
                        <img src="{{ asset('frontend/images/rto4.png')}}"/>
                        
                        
                            <h3>Loan Cancellation</h3>
                            <p>Required if you want to cancel the loan on your vehicle.</p>
                            <div class="more-btn">
                                <a href="{{ route('rto-services.show', $loan_cancellation='loan-cancellation') }}" class="click-btn">Click Here</a>
                            </div>
                       
                    </a>
                   </div>
                    
                </div>
                
                <div class="col-md-3 col-sm-4 col-centered">
                    
                    <div class="rto-box">
                    <a href="{{ route('rto-services.show', $repassing='repassing') }}">
                        <img src="{{ asset('frontend/images/rto5.png')}}"/>
                        
                        
                            <h3>Repassing</h3>
                            <p>Required if your vehicle is 15 years or older from the date of registration
                            </p>
                            <div class="more-btn">
                                <a href="{{ route('rto-services.show', $repassing='repassing') }}" class="click-btn">Click Here</a>
                            </div>
                        
                    </a>
                   </div>
                    
                </div>
                
                <div class="col-md-3 col-sm-4 col-centered">
                    
                   <a href="{{ route('rto-services.show', $passing='passing') }}"> <div class="rto-box">
                    
                        <img src="{{ asset('frontend/images/rto6.png')}}"/>
                        
                        
                            <h3>Passing</h3>
                            <p>Required if your vehicle is being transferred from one state to the other. </p>
                            <div class="more-btn">
                                <a href="{{ route('rto-services.show', $passing='passing') }}" class="click-btn">Click Here</a>
                            </div>
                       
                    
                   </div>
                    
                </div>
                
                <div class="col-md-3 col-sm-4 col-centered">
                    
                    <div class="rto-box">
                    <a href="{{ route('rto-services.show', $duplicate_registration_certificate='duplicate-registration-certificate') }}">
                        <img src="{{ asset('frontend/images/rto7.png')}}"/>
                        
                       
                            <h3>Duplicate RC <small>(REGISTRATION CERTIFICATE)</small></h3>
                            <p>Required if your original RC gets lost, damaged or stolen.</p>
                            <div class="more-btn">
                                <a href="{{ route('rto-services.show', $duplicate_registration_certificate='duplicate-registration-certificate') }}" class="click-btn">Click Here</a>
                            </div>
                        
                    </a>
                   </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    

</div>
    


@endsection

		
	