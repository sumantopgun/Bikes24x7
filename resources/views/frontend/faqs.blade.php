@extends('frontend.layout')
@section('title', 'FAQS')
@section('meta_desc', 'Our Bike Value Calculator is a unique calculator which calculates the value of your bike instantly and transparently. If you decide to sell your bike to us, we will handle all the transfer work with no extra charges and transfer the payment to you within one hour after inspection with your approval')
@push('style') 
    <link rel="stylesheet" href="{{ asset('frontend/css/faq.css')}}" type="text/css">
@endpush
@section('content')
<section class="faq_section">
    <div class="faq_top2_sec">
        <div class="container">
            <div class="faq_top_sec col-md-12">
                <div class="faq_top_left_sec col-md-4">
                    <h2>FAQS</h2>
                </div>
                <div class="faq_top_right_sec col-md-8">
                    <div class="wrap">
                        <div class="search">
                          <input type="text" class="searchTerm" placeholder="Search">
                          <button type="submit" class="searchButton">
                            <i class="fa fa-search"></i>
                         </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="faq_middle_1stsec col-md-12">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div> --}}
            <div class="faq_middle_2ndsec col-md-12">
                <div class="faq_topnav">
                    <a class="general_tab">Selling</a>
                    <a class="buy_tab">Buying</a>
                    <a class="finance_tab">Finance</a>
                    <a class="inspection_tab">Inspection</a>
                    <a class="rto_tab">Miscellaneous</a>
                </div>
            </div>
            <div class="faq_middle_3rdsec col-md-12">
                <div class="general_tab_section">
                    <div class="selling_tab_sec">
                        <div class="selling_top_nav">
                            <a class="pre_selling_tab">Pre-Selling</a>
                            <a class="post_selling_tab">Post-Selling</a>
                        </div>
                    </div>
                    <div class="pre_selling_section">
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What makes Bikes24x7 the best place to sell my 2W?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What makes Bikes24x7 the <br>best place to sell my 2W?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Our Bike Value Calculator is a unique calculator which calculates the value of
                                        your bike instantly and transparently. If you decide to sell your bike to us, we
                                        will handle all the transfer work with no extra charges and transfer the
                                        payment to you within one hour after inspection with your approval.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What is the business model of Bikes24x7?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What is the business model<br> of Bikes24x7?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        The purchased bike will first go to the workshop for refurbishing where the
                                        bike will be refurbished to make it feel brand new. The bike will be certified
                                        by our expert teams and insured and will be then sent to our franchises for
                                        sale.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">I want to sell my 2W to Bikes24x7. What is the process?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">I want to sell my 2W to Bikes24x7.<br> What is the process?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        You will be directed to the Bike Value Calculator page where you have to
                                        input the details of your bike to get a fair estimation of your bike. Once you
                                        get the fair estimation of the bike and you want to continue selling to us, you
                                        will book an appointment for a physical bike inspection where our inspector
                                        will further evaluate your bike and give you the final price. If you agree to the
                                        price and if you have all your necessary paperwork required, we will purchase
                                        the bike and transfer the money to you in one hour only. All transfer work will
                                        be taken care of by our inspector, you just need to have all the valid
                                        documents.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What cities does Bikes24x7 have showrooms in?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What cities does Bikes24x7 <br>have showrooms in?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Currently we are only operating in Pune, Maharashtra.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">My 2W is registered outside India - Can you buy this 2W?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">My 2W is registered outside <br>India - Can you buy this 2W?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        You can send in a query to our customer service and we will confirm if it’s
                                        possible to purchase your bike under terms and conditions.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Do you buy 2Ws registered in the name of a company?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Do you buy 2Ws registered <br>in the name of a company?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        As long as you have valid documents of the bike you want to sell, we will
                                        purchase the bike under T&C
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">My 2W is in Pune, but it has a Delhi registration number, can I sell it to Bikes24x7?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">My 2W is in Pune, <br>but it has a Delhi registration number, <br>can I sell it to Bikes24x7?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Yes you can sell it to us. Necessary paperwork will be taken care of by us,
                                        once you provide all documentation to us.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Can I sell my 2W if it is financed from a bank?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Can I sell my 2W if <br>it is financed from a bank?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Yes You can sell your bike under T&C
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What should I do if my bike is registered in someone else's name such as family members?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What should I do if my bike <br>is registered in someone else's <br>name such as family members?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        You can still sell your bike to us but we will need the registered owner’s
                                        documents and signature at the time of transfer and transfer will only be done
                                        at the registered owner’s account.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What documents do I need to sell my used 2W?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What documents do I <br>need to sell my used 2W?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        The documents required are:<br>
                                        1. Registration Certificate (RC Book)<br>
                                        2. Pollution under control (PuC) Certificate<br>
                                        3. Form 28<br>
                                        4. Form 29<br>
                                        5. Form 30<br>
                                        6. Bike Insurance Certificate<br>
                                        7. Government approved identity documents (Aadhaar Card/Pan Card?
                                        Driver’s License)<br>
                                        8. Address Proof (Aadhaar Card/Pan Card? Driver’s License)<br>
                                        9. 2 Passport size photographs
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What factors impact the price of my 2W?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What factors impact <br>the price of my 2W?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        There are various factors depending on the year of purchase, kilometers
                                        driven, number of previous owners, whether you have taken a loan on your
                                        bike or not, etc. When you sell to us, our inspector will walk you through the
                                        process.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How long is the offer you make for my 2W valid?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How long is the offer you <br>make for my 2W valid?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Offer is time sensitive, because the older your bike gets, or the more number
                                        of kilometers you ride, the sale value of your bike will change.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What is a Transaction Closure Period?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What is a Transaction Closure Period?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        One hour after the physical final inspection by our bike and if you have all
                                        necessary documents to proceed with the transaction.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What happens if I am unable to meet with you within the Transaction Closure Period?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What happens if I am unable <br>to meet with you within the <br>Transaction Closure Period?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        You will have to set another calendar date for the reinspection of your bike.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What is a Token Amount and why should I pay it?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What is a Token Amount and <br>why should I pay it?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        There is NO token amount for bike inspection. Our bike inspection services
                                        are FREE of cost. You just have to coordinate with our team to help you make
                                        your transaction as hassle free as possible.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Do you guarantee to buy my bike?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Do you guarantee to <br>buy my bike?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        No, we make NO guarantee that we will buy your two wheeler for reasons
                                        under T&C.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How do you ensure my private information remains confidential?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How do you ensure my private <br>information remains confidential?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        We take our customer’s database very seriously and we do not indulge or
                                        share our database with any third party. Please refer to our T&C.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Can I contact a buyer using Bikes24x7 website?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Can I contact a buyer <br>using Bikes24x7 website?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        We, Bikes24x7 are the buyers of your bike.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post_selling_section">
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What happens to my 2W once I sell it to Bikes24x7?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What happens to my 2W once <br>I sell it to Bikes24x7?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Once you sell your bike to Bikes24x7, it undergoes an entire refurbishing
                                        process. We send it to our in-house mechanics, who check your 2W for all
                                        problems, repair it, and then once it is fully refurbished, we put it up on our
                                        catalogue on our website.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What is Service Charge and is it mandatory?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What is Service Charge and <br>is it mandatory?/span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        We will not charge you for Bike inspection while selling your bike.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How soon can I expect to receive the payment for my 2W once I sell it to you?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How soon can I expect to <br>receive the payment for my 2W <br>once I sell it to you?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Once all the documents are verified, and you are comfortable with the price of
                                        the bike, we will transfer the money to the registered owner (as mentioned on
                                        the RC book) in under one hour.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How long will it take for the payment to be transferred to my account?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How long will it take <br>for the payment to be <br>transferred to my account?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        You will receive the payment within one hour of the final decision.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What if I don't get the amount within the stipulated time?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What if I don't get the amount <br>within the stipulated time?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        If you don’t get the amount within the specified time, our service team will
                                        contact you if we face any technical glitch from our end to keep you assured.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How long will it take for the RC to be transferred from my name?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How long will it take for the <br>RC to be transferred from my name?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Normally it takes 5-10 working days for the vehicle to get transferred in the
                                        RTO.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Where can I check my current RC transfer status?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Where can I check my <br>current RC transfer status?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        You will have to log into <a href="">www.vahan.gov.in</a> You will be able to see all the
                                        details over there.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What happens if there is any mishap with the RC transfer?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What happens if there is any <br>mishap with the RC transfer?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        You can always go to the RTO Authorities to clarify the matter but we will
                                        ensure a smooth process in transaction from our end.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What happens if I cancel the deal after signing the documents?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What happens if I cancel the <br>deal after signing the documents?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        We will refund your complete amount without any cancellation fee.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Whom do I reach out to if I have any queries regarding ownership transfer after selling my 2W?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Whom do I reach out to if<br> I have any queries regarding ownership<br> transfer after selling my 2W?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        You may contact the customer service directly to get an update regarding the
                                        ownership transfer of your bike or log into www.vahan.gov.in to track the
                                        process.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buy_tab_section">
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How would the entire process work for me if I want to buy a 2W?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How would the entire process <br>work for me if I want to buy a 2W?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Visit our bike catalogue, select your bike, pay an advance of Rs. 1000/- as
                                    booking fee (Valid for 3 days only), book an appointment for a test ride and
                                    take your bike home.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What brands do you have available at Bikes24x7?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What brands do you <br>have available at Bikes24x7?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    We deal in all kinds of used two wheelers.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How do I find out how old a particular 2W is?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How do I find out how <br>old a particular 2W is?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    The year of manufacture will be written along with the model on our website.
                                    Please check the bike description page for more details of that bike.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What details about the 2W are listed on the website?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What details about the 2W <br>are listed on the website?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Make, model, year, kilometers driven, etc. You may find the detailed report of
                                    each bike available in the bike description.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How does Bikes24x7 price the 2Ws listed on its platform?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How does Bikes24x7 price the <br>2Ws listed on its platform?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Every bike has a market value depending on various parameters like year of
                                    manufacture, distance travelled, ownership etc. We keep these factors in mind
                                    while pricing each 2W on our website.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Why is it important to choose a certified used 2W?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Why is it important to <br>choose a certified used 2W?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Bikes24x7 certifies each and every bike to ensure the quality of the bike so
                                    that you can ride with pride!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How do I ensure that the preowned 2W I am purchasing from Bikes24x7 is in good condition?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How do I ensure that the preowned<br> 2W I am purchasing from Bikes24x7 <br>is in good condition?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    All our bikes are refurbished and certified by our expert mechanics to ensure
                                    quality of our vehicles.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What additional measures or precautions do I need to take while buying a used 2W?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What additional measures or <br>precautions do I need to take <br>while buying a used 2W?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    If you are buying from us, we will take care of all the necessary procedures
                                    and paperwork to ensure a hassle free experience for you.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Are all your used 2Ws inspected?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Are all your used 2Ws inspected?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What do you check for during the inspection of the vehicle?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What do you check for during <br>the inspection of the vehicle?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    We have a 120+ checkpoint list of different parts of the vehicle. All points are
                                    thoroughly checked and verified which are then insured and certified by our
                                    quality assurance team.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Where do I need to come to test drive the 2W?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Where do I need to come <br>to test drive the 2W?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    At any of our showroom outlets. Currently we are based in Kharadi, Pune.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Do I need to pay for the test drive?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Do I need to pay for the test drive?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    No.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What is a Token amount and why is it required?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What is a Token amount and<br> why is it required?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Rs. 1000/- is taken by us to book your preferred bike for a maximum of 3
                                    days. It is required because we book the 2W for you, so that no other customer
                                    will be able to book that particular 2W during those 3 days.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What if I don't come to inspect the bike in 3 days?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What if I don't come to <br>inspect the bike in 3 days?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    If you fail to come and inspect the bike within 3 days, you will forfeit the
                                    advance booking fee to us and the booking will become null and void.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Is the booking fee refundable?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Is the booking fee refundable?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes. If you visit the showroom within 3 days and do not like the 2 wheeler, we
                                    will refund the money to you within the next hour or two. 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What documents do I need to submit to buy a 2W?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What documents do I need <br>to submit to buy a 2W?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    ID Card, 2 address proof (aadhaar card/ passport/ Driving license),
                                    photographs.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Do you provide finance and loan options?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Do you provide finance and <br>loan options?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Will Bikes24x7 help me in getting a bike loan to fund my purchase?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Will Bikes24x7 help me <br>in getting a bike loan to<br> fund my purchase?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes. Please contact our customer service for more details.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Will the 2W that I buy from Bikes24x7 come with Insurance?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Will the 2W that I <br>buy from Bikes24x7 come <br>with Insurance?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes. We only provide 3rd party insurance.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Does Bikes24x7 provide any warranty on the bikes?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Does Bikes24x7 provide any <br>warranty on the bikes?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes, a 6 months warranty is provided on engine (150cc only) and on the gear
                                    box.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What should I check before paying the final amount and collecting my 2W?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What should I check before <br>paying the final amount <br>and collecting my 2W?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    You will receive a delivery note, invoice receipt and warranty (if provided)
                                    along with the bike papers.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How will the ownership of the 2W be transferred?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How will the ownership <br>of the 2W be transferred?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    We take care of the ownership transfer and paperwork free of cost during
                                    purchase of the bike.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="finance_tab_section">
                    <div class="loan_ins_tab_sec">
                        <div class="loan_ins_top_nav">
                            <a class="loan_tab">Loans</a>
                            <a class="insurance_tab">Insurance</a>
                        </div>
                    </div>
                    <div class="loans_finance_section">
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How do I get a loan?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How do I get a loan?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Visit our showroom or contact our customer service for more details.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Who is eligible for a used 2W loan?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Who is eligible for a used 2W loan?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Depending upon your credibility which can be seen by your CIBIL score, the
                                        bank decides whether to give you a loan or not.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What documents do I need to provide for financing?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What documents do I need <br>to provide for financing?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        To be eligible for a loan, you need to have an Aadhaar Card, PAN card, residential
                                        address, proof of income like salary, ITR Copy, etc and latest 6 months bank
                                        statements.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Can all the 2Ws on the website be financed?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Can all the 2Ws on <br>the website be financed?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Not all vehicles are eligible for finance.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What is the maximum loan amount that I can expect?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What is the maximum loan <br>amount that I can expect?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Depending on the valuation of the vehicle, a maximum of 90% of the
                                        valuation price can be financed.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What are the loan tenure options available?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What are the loan tenure<br> options available?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        12, 18, 24, 30, 36, 48, 60 (all in months)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How is the interest amount calculated?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How is the interest <br>amount calculated?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Depending on the bank, a flat rate of interest on reducing balance is charged.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Am I liable to pay any additional charges?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Am I liable to pay any <br>additional charges?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Processing fees, stamp duty charges are the extra charges which need to be
                                        paid.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How long will it take for my loan to get approved?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How long will it take for <br>my loan to get approved?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        1-2 days maximum; provided all documents are cleared and approved.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Who can I add as the co-applicants for the loan?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Who can I add as the <br>co-applicants for the loan?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Your spouse or any family member can be taken as a co-applicant.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Do I need any guarantors while applying for my loan?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Do I need any guarantors <br>while applying for my loan?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Some banks ask for guarantors. So it depends on the bank.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Can I foreclose my loan before the completion of full tenure?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Can I foreclose my loan before <br>the completion of full tenure?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Yes.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="insurance_finance_section">
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Is it necessary for me to have auto insurance?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Is it necessary for me to <br>have auto insurance?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Yes, it is necessary.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What are the different types of auto insurances available?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What are the different types <br>of auto insurances available?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        1. Comprehensive auto insurance;<br>
                                        2. Comprehensive with zero depreciation auto insurance;<br>
                                        3. Third party auto insurance.<br>
                                        These are the 3 auto insurances available. 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What is covered under a package/comprehensive policy?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What is covered under a <br>package/comprehensive policy?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Everything, as declared by the insurance companies.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What are the different classes of vehicles that can be insured by a motor insurance company?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What are the different classes <br>of vehicles that can be insured by <br>a motor insurance company?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        All kinds of vehicles can be insured by a motor insurance company.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What documents do I need to submit when buying insurance for my vehicle?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What documents do I need <br>to submit when buying insurance <br>for my vehicle?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Registration certificate of the vehicle
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Is there anything in specific that the motor policy does not cover?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Is there anything in specific <br>that the motor policy <br>does not cover?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        The engine and the electric parts of the vehicle are not covered by the motor
                                        policy.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How is the premium calculated?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How is the premium calculated?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Every company has a specific calculator for different cubic capacities (cc).
                                        Depending on the cc, IRDA( Insurance regulatory development authority) has
                                        fixed the formula for calculating the premium for the vehicle depending on the
                                        price of the vehicle.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Can I pay the premium for my auto insurance in installments?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Can I pay the premium for <br>my auto insurance in installments?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        No.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What is a cover note?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What is a cover note?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Cover note is the brief summary of the details of the policy.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What does IDV (insured’s declared value) mean?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What does IDV <br>(insured’s declared value) mean?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Depending on the type of vehicle and the cc of the vehicle, every vehicle has a
                                        specific price value which is defined by the calculator set by the insurance
                                        company.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What is a No Claim Bonus (NCB)?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What is a No Claim <br>Bonus (NCB)?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        If no accident or any type of claims have been taken on the vehicle, then while
                                        renewal of the policy, the insurance company gives you a no claim bonus
                                        which reduces the premium of the vehicle according to the no claim bonus.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Is my NCB discount transferrable?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Is my NCB discount <br>transferrable?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        No, its not.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">If I add accessories to my vehicle during the policy period, are they also covered?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">If I add accessories to my <br>vehicle during the policy period,<br> are they also covered?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        No, accessories are not covered.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">How do I renew my policy?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">How do I renew my policy?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Value of the vehicle which is defined by the insurance company along with no
                                        claim bonus, if any, determines the renewal premium of the policy.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">Do I need to lodge an FIR in case of an accident?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">Do I need to lodge an FIR <br>in case of an accident?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Yes.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="accordion">
                            <div class="card" id="headingOne1">
                                <div class="card-header headingOne">
                                    <h5 class="mb-0">
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                            <span style="color: black;">What documents do I need to submit when I make a claim?</span>
                                        </button>
                                        <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                            <span style="color: black;">What documents do I need to <br>submit when I make a claim?</span>
                                        </button>
                                        <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                            <span class="fa fa-chevron-down pull-right"></span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" >
                                    <div class="card-body">
                                        Your driving License, Your insurance policy, Registration certificate and a
                                        Police FIR.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inspection_tab_section">
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How do I get my Bike evaluated?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How do I get my Bike evaluated?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    You will be directed to the Bike Value Calculator where you have to input the
                                    details of your bike to get a fair estimation of your bike. Once you get the fair
                                    estimation of the bike and you want to continue selling to us, you will book an
                                    appointment for a FREE physical bike inspection where our inspector will
                                    further evaluate your bike and give you the final price. If you agree to the
                                    price and if you have all your necessary paperwork required, we will purchase
                                    the bike and transfer the money to you in one hour only. All transfer work will
                                    be taken care of by our inspector, you just need to have all the valid
                                    documents necessary to proceed the transaction.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What if my 2W is not moving, Can I still get an inspection?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What if my 2W is not moving, <br>Can I still get an inspection?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes you can.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What if I have 2 or more 2Ws to be inspected?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What if I have 2 or more<br> 2Ws to be inspected?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes, we have free inspection for any number of bikes.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Till when are your branches open?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Till when are your branches open?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    We are open on all 7 days from 10am- 8pm.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Can I send my driver to get the inspection done?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Can I send my driver to <br>get the inspection done?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes you can.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Does Bikes24x7 provide home inspection?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Does Bikes24x7 provide <br>home inspection?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes we provide FREE home inspection as well.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Will you charge me for the inspection?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Will you charge me for <br>the inspection?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    No, Bikes24x7 provides free Bike Inspection services.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Do I need to make an appointment to get my bike evaluated?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Do I need to make an appointment <br>to get my bike evaluated?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes, you will have to schedule an appointment with us for bike inspection.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How do I book an appointment?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How do I book an appointment?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    You will be directed to the calendar page for booking your appointment after
                                    you fill the details of your bike on the BVC.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">I cannot find my 2Ws registration state while booking the appointment online, what do I do?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">I cannot find my 2Ws registration <br>state while booking the appointment <br>online, what do I do?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    You will find your registration details on your RC Book.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Can I reschedule my appointment?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Can I reschedule my appointment?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Yes you can. You will be able to reschedule your appointments on your
                                    dashboard.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What should I do in case I have to cancel the appointment? Will I be charged for the cancellation?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What should I do in case I <br>have to cancel the appointment? Will I be <br>charged for the cancellation?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    No you will not be charged for cancellation of appointment.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How much time will it take to get the inspection done?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How much time will it take to <br>get the inspection done?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    30-45 minutes maximum.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What documentation does your inspector need to check at the time of inspection?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What documentation does your <br>inspector need to check at the <br>time of inspection?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    - RC <br>
                                    - PUC (not necessary)<br>
                                    - Insurance<br>
                                    - If loan on the vehicle, then Bank NOC<br>
                                    - Valid ID proof.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">Why is there a difference between the online valuation and the actual price offered at the branch?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">Why is there a difference between <br>the online valuation and the actual <br>price offered at the branch?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    Our BVC gives an approximate value of your bike based on a few parameters.
                                    Further inspection is done by our trusted team of experts who will give you the
                                    precise value looking at the engine condition and various other parameters.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rto_tab_section">
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">My query is not listed, I need further help!</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">My query is not listed, <br>I need further help!</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    You can mail your query to us on (email id) and we’ll respond to you as soon
                                    as possible! 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">How do I get in touch with someone at Bikes24x7?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">How do I get in touch <br>with someone at Bikes24x7?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    You can call us at our customer service number (insert no) or mail us on
                                    (insert mail id) 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card" id="headingOne1">
                            <div class="card-header headingOne">
                                <h5 class="mb-0">
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_desk">
                                        <span style="color: black;">What is ‘my account’? Why do I need to create one?</span>
                                    </button>
                                    <button style="float:left;" class="btn btn-link headingOne for_au tab_mob">
                                        <span style="color: black;">What is ‘my account’? <br>Why do I need to create one?</span>
                                    </button>
                                    <button class="btttn_arow1" style="float:right;border: 0px; margin: 10px;">
                                        <span class="fa fa-chevron-down pull-right"></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" >
                                <div class="card-body">
                                    “My account” is an account you’ll be creating for yourself, to check the
                                    progress tracker of your payment, the appointment date and time and updates
                                    from the customer service.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
    <div class="faq_contact_us_sec">
        <div class="container">
            <div class="faq_con_top_sec col-md-12">
                <span>Didn't get your question answered?<br>Ask us directly!</span>
            </div>
            <div class="faq_con_btn_sec col-md-12">
                <a href="{{ route('contact_us')}}" type="button" class="faq_con_btn gradient-button">Contact Us</a>
            </div>
        </div>
    </div>
    <div class="faq_bottom_image_sec">
        <div class="faq_bottom_image_main_sec">
            <img src="{{ asset('frontend/images/faq.png')}}"/>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(document).on("click","#headingOne1",function(){
	$(this).find('#collapseOne').slideToggle(); 
	$(this).find('.btttn_arow1 span').toggleClass("fa-chevron-down fa-chevron-up");
});

$(document).on("click",".general_tab",function(){
	$('.buy_tab_section').hide(); 
	$('.general_tab_section').show();
	$('.sell_tab_section').hide();
	$('.rto_tab_section').hide();
	$('.finance_tab_section').hide();
	$('.inspection_tab_section').hide();
	$('.buy_tab').css("border-bottom","none");
	$('.sell_tab').css("border-bottom","none");
	$('.rto_tab').css("border-bottom","none");
	$('.finance_tab').css("border-bottom","none");
	$('.inspection_tab').css("border-bottom","none");
	$('.general_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".pre_selling_tab",function(){
	$('.post_selling_section').hide(); 
	$('.pre_selling_section').show();
	$('.post_selling_tab').css("border-bottom","none");
	$('.pre_selling_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".post_selling_tab",function(){
	$('.pre_selling_section').hide(); 
	$('.post_selling_section').show();
	$('.pre_selling_tab').css("border-bottom","none");
	$('.post_selling_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".loan_tab",function(){
	$('.insurance_finance_section').hide(); 
	$('.loans_finance_section').show();
	$('.insurance_tab').css("border-bottom","none");
	$('.loan_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".insurance_tab",function(){
	$('.loans_finance_section').hide(); 
	$('.insurance_finance_section').show();
	$('.loan_tab').css("border-bottom","none");
	$('.insurance_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".buy_tab",function(){
	$('.buy_tab_section').show(); 
	$('.general_tab_section').hide();
	$('.sell_tab_section').hide();
	$('.rto_tab_section').hide();
	$('.finance_tab_section').hide();
	$('.inspection_tab_section').hide();
	$('.general_tab').css("border-bottom","none");
	$('.sell_tab').css("border-bottom","none");
	$('.rto_tab').css("border-bottom","none");
	$('.finance_tab').css("border-bottom","none");
	$('.inspection_tab').css("border-bottom","none");
	$('.buy_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".sell_tab",function(){
	$('.buy_tab_section').hide(); 
	$('.general_tab_section').hide();
	$('.sell_tab_section').show();
	$('.rto_tab_section').hide();
	$('.finance_tab_section').hide();
	$('.inspection_tab_section').hide();
	$('.general_tab').css("border-bottom","none");
	$('.rto_tab').css("border-bottom","none");
	$('.buy_tab').css("border-bottom","none");
	$('.finance_tab').css("border-bottom","none");
	$('.inspection_tab').css("border-bottom","none");
	$('.sell_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".rto_tab",function(){
	$('.buy_tab_section').hide(); 
	$('.general_tab_section').hide();
	$('.sell_tab_section').hide();
	$('.rto_tab_section').show();
	$('.finance_tab_section').hide();
	$('.inspection_tab_section').hide();
	$('.general_tab').css("border-bottom","none");
	$('.sell_tab').css("border-bottom","none");
	$('.buy_tab').css("border-bottom","none");
	$('.finance_tab').css("border-bottom","none");
	$('.inspection_tab').css("border-bottom","none");
	$('.rto_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".finance_tab",function(){
	$('.buy_tab_section').hide(); 
	$('.general_tab_section').hide();
	$('.sell_tab_section').hide();
	$('.rto_tab_section').hide();
	$('.finance_tab_section').show();
	$('.inspection_tab_section').hide();
	$('.general_tab').css("border-bottom","none");
	$('.sell_tab').css("border-bottom","none");
	$('.buy_tab').css("border-bottom","none");
	$('.rto_tab').css("border-bottom","none");
	$('.inspection_tab').css("border-bottom","none");
	$('.finance_tab').css("border-bottom","3px solid #FC3");
});
$(document).on("click",".inspection_tab",function(){
	$('.buy_tab_section').hide(); 
	$('.general_tab_section').hide();
	$('.sell_tab_section').hide();
	$('.rto_tab_section').hide();
	$('.finance_tab_section').hide();
	$('.inspection_tab_section').show();
	$('.general_tab').css("border-bottom","none");
	$('.sell_tab').css("border-bottom","none");
	$('.buy_tab').css("border-bottom","none");
	$('.rto_tab').css("border-bottom","none");
	$('.finance_tab').css("border-bottom","none");
	$('.inspection_tab').css("border-bottom","3px solid #FC3");
});
</script>
@endpush