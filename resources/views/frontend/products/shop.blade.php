@extends('frontend.layout')
@section('title', 'Buy Second Hand Two Wheeler')
@section('meta_desc', 'Buy certified and good condition used Bike near Pune. Bike24x7 provides you to select from the option of bike of your choice to take home.')
@section('meta_keywords', 'buy two wheeler, buy used bikes near me, buy second hand two wheeler, buy second hand bikes in pune')
@section('BuyBike', 'active')
@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/chartist.css')}}">
    <style>
        .product-size {
            height: 186px;
            /* width: 249px; */
        }
    </style>
@endpush
@section('content')
    <div class="main2">
        <section class="inner-banner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <h2 class="bene_buy_desk">BENEFITS OF BUYING <br>FROM <span>BIKES24x7</span></h2>
                        <h2 class="bene_buy_mob">BENEFITS OF BUYING FROM <span>BIKES24x7</span></h2>
                    </div>
                    <div class="col-md-6 bene_buy_icon_sec">
                        <div class="row">
                            <div class="col-md-3 col-xs-3 text-center">
                                <img src="{{ asset('frontend/images/inner1.png')}}" class="inner-b-img"/>
                                <p>Fully Refurbished <br>and Certified</p>
                            </div>

                            <div class="col-md-3 col-xs-3 text-center">
                                <img src="{{ asset('frontend/images/inner2.png')}}" class="inner-b-img"/>
                                <p>Free 6 months <br>warranty*</p>
                            </div>
                            <div class="col-md-3 col-xs-3 text-center">
                                <img src="{{ asset('frontend/images/inner3.png')}}" class="inner-b-img"/>
                                <p>Hassle-free RC <br>Transfer</p>
                            </div>
                            <div class="col-md-3 col-xs-3 text-center">
                                <img src="{{ asset('frontend/images/inner4.png')}}" class="inner-b-img"/>
                                <p>EMI options <br>available</p>
                            </div>
                        </div>
                    </div>
     
                    <div class="col-md-2 text-center">
                        <img src="{{ asset('frontend/images/certified2.png')}}" class="img-certified"/>
                        <p><small>*Only upto 150CC and above 2014 model</small></p>
                    </div>
                </div>
            </div>
        </section>
     
        <section class="cat-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>/</li>
                            <li><a href="#">Buy Bike</a></li>
                        </ul>
                        </div>
                    </div>
     
                    <div class="col-md-3 filter_sec">
                        <div class="left-sec web-filter">
                            <h3>Filters</h3>
                            <button class="btn btn-green" id="findBtnDesktop">Apply</button>
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default bike_cat_border_bottom">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                <span>Budget</span>
                                                <span class="fa fa-angle-down pull-right"></span>
                                            </a>
                                        </h4>
                                    </div>
     
                                 <div id="collapseOne" class="panel-collapse collapse in">
                                     <div class="panel-body">
                                     <!-- Area Charts -->
                                         <img src="{{ asset('frontend/images/graph.jpg')}}" class="img-responsive"/>
                                         <div class="row">
                                             <div class="col-sm-12">
                                                 <div id="slider-range"></div>
                                             </div>
                                         </div>
     
                                         <div class="row slider-labels">
                                             <div class="col-xs-6 caption">
                                                 <span id="slider-range-value1"></span>
                                             </div>
     
                                             <div class="col-xs-6 text-right caption">
                                                 <span id="slider-range-value2"></span>
                                             </div>
                                         </div>
     
                                         <div class="row">
                                             <div class="col-sm-12">
                                                 <form class="row min-max-form">
                                                     <div class="col-md-6">
                                                         <small>Min Price</small><br> 
                                                         <input type="text" name="min-value-desktop" readonly value="5000" id="hidden_minimum_price">
                                                     </div>
                                                     <div class="col-md-6">
                                                         <small>Max Price</small><br>
                                                         <input type="text" readonly name="max-value-desktop" value="1000000" id="hidden_maximum_price">
                                                     </div>
                                                     <div class="price_minus_sign"><i class="fa fa-minus" aria-hidden="true"></i></div>
                                                 </form>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
     
                             <div class="panel panel-default bike_cat_border_bottom">
                                 <div class="panel-heading">
                                     <h4 class="panel-title">
                                         <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                             <span>Brand</span>
                                             <span class="fa fa-angle-down pull-right"></span>
                                         </a>
                                     </h4>
                                 </div>
     
                                 <div id="collapseTwo" class="panel-collapse collapse in">
                                     <div class="panel-body">
                                         <div class="brand-search">
                                             <div class="addto-search">
                                                 <form action="#">
                                                     <div class="form-input">
                                                         <button class="search-button"><i class="fa fa-search"></i></button>
                                                         <input class="keyword" type="search" data-search placeholder="Search Brand">
                                                     </div>
                                                 </form>
                                             </div>
     
                                             <div class="addto-playlists">
                                                @if (!$categories->isEmpty())
                                                    <ul>
                                                        @foreach ($categories as $category)
                                                            <li data-filter-item data-filter-name="{{ strtolower($category->category_name) }}">
                                                                <label class="brand-check">{{ $category->category_name }}
                                                                    <input type="checkbox" name="category_id" class="category_id_all" value="{{ $category->id }}">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
     
                             <div class="panel panel-default bike_cat_border_bottom">
                                 <div class="panel-heading">
                                     <h4 class="panel-title">
                                         <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                             <span>Kilometers Driven</span>
                                             <span class="fa fa-angle-down pull-right"></span>
                                         </a>
                                     </h4>
                                 </div>
     
                                 <div id="collapseThree" class="panel-collapse collapse in">
                                     <div class="panel-body bike_cat_border_bottom">
                                         <div class="row">
                                             <div class="col-sm-12">
                                                 <div id="slider-range2"></div>
                                             </div>
                                         </div>
     
                                         <div class="row slider-labels">
                                             <div class="col-xs-6 caption">
                                                 <span id="min_kilometers"></span>
                                             </div>
                                             <div class="col-xs-6 text-right caption">
                                                 <span id="max_kilometers"></span>
                                             </div>
                                         </div>
     
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <form class="row min-max-form text-center">
                                                        <div class="col-md-12 ">
                                                            <small>Max Kms:</small><br>
                                                            <input readonly type="text" name="max_kilometers_hidden" value="105000" id="max_kilometers_hidden">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                     </div>
                                 </div>
     
                            <div class="panel panel-default bike_cat_border_bottom">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                            <span>Model Type</span>
                                            <span class="fa fa-angle-down pull-right"></span>
                                        </a>
                                    </h4>
                                </div>

        <div id="collapseFour" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="addto-playlists">
                    <ul>
                        @foreach ($models->unique('model_type') as $model)
                            <li>
                                <label class="brand-check">{{ $model->model_type }}
                                    <input type="checkbox" name="modeltype" class="modeltype_id_all" value="{{ $model->model_type }}">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

     </div>
     
     <div class="panel panel-default">
       <div class="panel-heading">
         <h4 class="panel-title">
           <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
             <span>Engine Displacement</span>
             <span class="fa fa-angle-down pull-right"></span>
         </a>
     </h4>
     </div>

        <div id="collapseFive" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="addto-playlists">
                    <ul>
                        @foreach ($models->unique('model_cc')->sortBy('model_cc') as $model)
                            <li>
                                <label class="brand-check">{{ $model->model_cc }}
                                <input type="checkbox" name="model_cc" class="models_cc_all" value="{{ $model->model_cc }}">
                                <span class="checkmark"></span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
     </div>
     
     
     {{-- <button class="clear-btn text-center" id="findReset">Clear All</button> --}}
     </div>
     <a href="" class="clear-btn text-center">Clear All</a>
     
     </div>
     </div>
     </div>
     
     <!--mobile filter-->
     
     <div class="m-filter-area">
        <div class="row">
            {{-- <div class="col-xs-6 text-center">
                <a href="#" class="m-short-btn" id="short-by-btn" ><i class="fa fa-list"></i> Sort By</a>
            </div> --}}
            <div class="col-xs-12 text-center">
                <a href="#" class="m-filter-btn"  id="filter-btn"><i class="fa fa-filter"></i> Filter</a>
            </div>
        </div>
     </div>
     <div class="short-by-box" id="short-by-box">
        <form>
     
         <input type="checkbox"><span>Best Deal</span><br>
         <input type="checkbox"><span>Price: Low to High</span><br>
         <input type="checkbox"><span>Price: High to Low</span><br>
         <input type="checkbox"><span>Kms: Low to High</span><br>
         <input type="checkbox"><span>Model: Newest to Oldest</span>
         <button class="btn btn-green">Apply</button>
     </form>
     
     </div>
     <div class="filter-box">
        <div class="left-sec">
            <h3>Filters</h3>
     
     
     
            <div class="panel-group" id="accordion">
             <div class="panel panel-default">
               <div class="panel-heading">
                 <h4 class="panel-title">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                     <span>Budget</span>
                     <span class="fa fa-angle-down pull-right"></span>
                 </a>
             </h4>
         </div>
         <div id="collapseOne" class="panel-collapse collapse in">
             <div class="panel-body">
                 <!-- Area Charts -->
                 <img src="{{ asset('frontend/images/graph.jpg')}}" class="img-responsive"/>
                 <div class="row">
                     <div class="col-sm-12">
                       <div id="slider-range-m"></div>
                   </div>
               </div>
               <div class="row slider-labels">
                 <div class="col-xs-6 caption">
                   <span id="slider-range-value1-mobile"></span>
               </div>
               <div class="col-xs-6 text-right caption">
                  <span id="slider-range-value2-mobile"></span>
              </div>
          </div>
          <div class="row">
             <div class="col-sm-12">
               <form class="row min-max-form">
                   <div class="col-xs-6">
                     <small>Min:</small><br> 
                     <input type="text" name="min-value" value="10000" id="hidden_minimum_price_mob" readonly>
                 </div>
                 <div class="col-xs-6">
                     <small>Max:</small><br>
                     <input type="text" name="max-value" value="105000" id="hidden_maximum_price_mob" readonly>
                 </div>
             </form>
         </div>
     </div>
     
     
     </div>
     </div>
     </div>
     <div class="panel panel-default">
       <div class="panel-heading">
         <h4 class="panel-title">
           <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
             <span>Brand</span>
             <span class="fa fa-angle-down pull-right"></span>
         </a>
     </h4>
     </div>
     <div id="collapseTwo" class="panel-collapse collapse in">
         <div class="panel-body">
             <div class="brand-search">
                 <div class="addto-search">
                     <form action="#">
                         <div class="form-input">
     
                             <button class="search-button"><i class="fa fa-search"></i></button>
                             <input class="keyword" type="search">
                         </div>
                     </form>
                 </div>
                <div class="addto-playlists">
                    @if (!$categories->isEmpty())
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <label class="brand-check">{{ $category->category_name }}
                                        <input type="checkbox" name="category_id" class="category_id_all" value="{{ $category->id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
     </div>
     <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <span>Kilometers Driven</span>
                    <span class="fa fa-angle-down pull-right"></span>
                </a>
            </h4>
        </div>
     <div id="collapseThree" class="panel-collapse collapse in">
         <div class="panel-body">
          <div class="row">
             <div class="col-sm-12">
               <div id="slider-range2-m"></div>
           </div>
       </div>
       <div class="row slider-labels">
         <div class="col-xs-6 caption">
           <span id="min_kilometers_mob"></span>
       </div>
       <div class="col-xs-6 text-right caption">
          <span id="max_kilometers_mob"></span>
      </div>
     </div>
     <div class="row">
         <div class="col-sm-12">
           <form class="row min-max-form text-center">
     
             <div class="col-md-12 ">
                 <small>Max Kms:</small><br>
                 <input type="text" name="max_kilometers_hidden_mobile" value="105000" id="max_kilometers_hidden_mobile" readonly>
             </div>
         </form>
     </div>
     </div>
     
     
     </div>
     </div>
     
     <div class="panel panel-default">
       <div class="panel-heading">
         <h4 class="panel-title">
           <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
             <span>Model Type</span>
             <span class="fa fa-angle-down pull-right"></span>
         </a>
     </h4>
     </div>

        <div id="collapseFour" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="addto-playlists">
                    <ul>
                        @foreach ($models->unique('model_type') as $model)
                            <li>
                                <label class="brand-check">{{ $model->model_type }}
                                    <input type="checkbox" name="modeltype" class="modeltype_id_all" value="{{ $model->model_type }}">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
     </div>
     
     <div class="panel panel-default">
       <div class="panel-heading">
         <h4 class="panel-title">
           <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
             <span>Engine Displacement</span>
             <span class="fa fa-angle-down pull-right"></span>
         </a>
     </h4>
     </div>

        <div id="collapseFive" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="addto-playlists">
                    <ul>
                        @foreach ($models->unique('model_cc') as $model)
                            <li>
                                <label class="brand-check">{{ $model->model_cc }}
                                <input type="checkbox" name="model_cc" class="models_cc_all" value="{{ $model->model_cc }}">
                                <span class="checkmark"></span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
     </div>
     
     <a href="" class="clear-btn col-xs-6">Clear All</a>
     {{-- <a href="" class="btn btn-green col-xs-6">Apply</a> --}}
     <button class="btn btn-green col-xs-6" id="findBtnMobile">Apply</button>
     </div>
     
     </div>
     </div>
     </div>
     @if ($products)
     <div class="col-md-9">
        <div class="right-sec">
            {{-- <div class="row cat_sort_by_sec">
                <div class="col-md-8">
                 <h2>200 Bikes in Pune</h2>
                </div>
                <div class="col-md-4 ">
                    <select class="form-control short-by">
                        <option>Sort by:</option>
                        <option>Best Deal</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Kms: Low to High</option>
                        <option>Model: Newest to Oldest</option>
                    </select>
        
        
                </div>
            </div> --}}
     
        <div class="row" id="updateDiv">
            @foreach ($products as $product)
                <div class="col-md-4">
                    @if ($product->bike_sell_status == 'sold')
                        <span class="notify-badge">Sold</span>
                    @elseif ($product->bike_sell_status == 'booked')
                        <span class="notify-badge">Booked</span>
                    @endif
                    
                    <div class="col-item {{ $product->bike_sell_status }}">                        
                        @if ($product->offers)
                            @if ($product->offers->offer_end_date >= today()->format('Y-m-d'))
                                <span class="timming price-off">Ends in {{ today()->diffInDays($product->offers->offer_end_date) }} Days !</span>
                            @endif 
                            
                        @endif
                        
                        <div class="photo">
                            <a href="{{ route('product-details', $product->id) }}"><img src="{{ asset('storage/'.$product->bike_image )}}" class="img-bike product-size" alt="a" />
                            </a>
                        </div>
                        <div class="bike_catl_info">
                            <div class="row">
                                <div class="price col-md-12">
                                    <h4>
                                        <a href="{{ route('product-details', $product->id) }}"><span class="cat_bike_year">{{ $product->bike_year }}</span> {{ $product->bike_name }}</a>
                                    </h4>
                                    @if ($product->offers)
                                        @if ($product->offers->offer_end_date >= today()->format('Y-m-d') || $product->offers->offer_start_date===Null)
                                            @if ($product->offers->offer_type=='percentage')
                                                <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $product->bike_sell_price - $product->bike_sell_price * $product->offers->offer_amount / 100 }}/- <span class="text-through"> <i class="fa fa-rupee"></i>{{ $product->bike_sell_price }}/-</span></h5>
                                            @else
                                                <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $product->bike_sell_price - $product->offers->offer_amount }}/-<span class="text-through"> <i class="fa fa-rupee"></i>{{ $product->bike_sell_price }}/-</span></h5>
                                            @endif
                                        @else
                                            <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $product->bike_sell_price }}/-</h5>
                                        @endif
                                    @else
                                        <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $product->bike_sell_price }}/-</h5>
                                    @endif
                                    {{-- <h5 class="price-text-color">
                                        <i class="fa fa-rupee"></i>40,000 <span class="text-through"><i class="fa fa-rupee"></i> 45,000</span>
                                    </h5> --}}
                                    @if ($product->offers)
                                        @if($product->offers->offer_end_date >= today()->format('Y-m-d') || $product->offers->offer_start_date===Null)
                                            <span class="price-off2">
                                                <span class="price-off"><i class="fa fa-rupee"></i>{{ $product->offers->offer_amount }}{{ $product->offers->offer_type=='percentage' ? '%' : ''}}/- off</span>
                                            </span>
                                        @endif
                                    @endif
        
                                </div>
                            </div>
        
                            <div class="clearfix">
                            </div>
                        </div>

                        <img src="{{ asset('frontend/images/devider-info.png')}}" class="devider-info"/>
                        <div class="info2 info2_bg_color">
                            <div class="row">
                                <div class="col-md-4 col-xs-4">
                                    <img class="cat_icon_img_size" src="{{ asset('frontend/images/icon1.svg')}}"/>
                                    <p>{{ $product->total_kilometers }} kms</p>
                                </div>

                                <div class="col-md-4 col-xs-4">
                                    <img class="icon2_img_rotate cat_icon_img_size" src="{{ asset('frontend/images/icon2.svg')}}"/>
                                    <p>{{ $product->models->model_cc }} CC</p>
                                </div>
                                <div class="col-md-4 col-xs-4">
                                    <img class="cat_icon_img_size" src="{{ asset('frontend/images/icon3.svg')}}"/>
                                    <p>{{ $product->number_of_owners }} Owner</p>
                                </div>
        
                            </div>
        
                            <div class="clearfix">
                            </div>
                        </div>

                        <div class="box-address">
                            <p><i class="fa fa-map-marker"></i> {{ $product->shop->shop_name ?? 'N/A' }}, {{ $product->shop_city->city_name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
     
     
        </div>
    </div>
    @endif
</div>

    {{-- <div class="row">
        <div class="col-md-12 text-center mt-50">
            <a href="" class="btn-load-more">Load More</a>
        </div>
    </div> --}}
    </div>
</section>
     
</div>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/js/range-slider.js')}}"></script>
    <script src="{{ asset('frontend/js/hs.range-slider.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#short-by-btn').click(function() {
                $('.short-by-box').slideToggle("slow");
                // Alternative animation for example
                // slideToggle("fast");
            });
        });

        $(document).ready(function() {
            $('#filter-btn').click(function() {
                $('.filter-box').slideToggle("slow");
                // Alternative animation for example
                // slideToggle("fast");
            });
        });
    </script>

    <script>
         var test = '';
         
         $( document ).ready(function() {
             
            // Brand Search in frontend
            $('[data-search]').on('keyup', function() {
            var searchVal = $(this).val();
            var filterItems = $('[data-filter-item]');

            if ( searchVal != '' ) {
                filterItems.addClass('hidden');
                $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
            } else {
                filterItems.removeClass('hidden');
            }
        });
            // $('.category-checked').prop('checked', true); // checks it
            // $('.model-checked').prop('checked', true); // checks it
            // $('#price_range').slider({
            //     range:true,
            //     min:5000,
            //     max:100000,
            //     values:[5000, 100000],
            //     step:500,
            //     stop:function(event, ui)
            //     {
            //         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            //         $('#hidden_minimum_price').val(ui.values[0]);
            //         $('#hidden_maximum_price').val(ui.values[1]);
            //     }
            // });
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '',
                data: "category=all",
                success: function (response) {
                    test = response;
                }
            });
           
        });

        $(function () {
            $('#findBtnDesktop').click(function(){
                // console.log('category');
                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();
                // console.log(minimum_price);
                var category = [];
                $('.category_id_all').each(function(){
                    if($(this).is(":checked")){
                        category.push($(this).val());
                    }
                });
                console.log(category);
                var modeltype = [];
                $('.modeltype_id_all').each(function(){
                    if($(this).is(":checked")){
                        modeltype.push($(this).val());
                    }
                });
                // var models = [];
                // $('.models_id_all').each(function(){
                //     if($(this).is(":checked")){
                //         models.push($(this).val());
                //     }
                // });
                var maximum_kilometers = $('#max_kilometers_hidden').val();

                var modelcc = [];
                $('.models_cc_all').each(function(){
                    if($(this).is(":checked")){
                        modelcc.push($(this).val());
                    }
                });
                FinalCategory  = category.toString();
                FinalModelType  = modeltype.toString();
                // FinalModel  = models.toString();
                FinalModelCC  = modelcc.toString();
                // console.log(FinalModel);
                if(category.length || modeltype.length || maximum_kilometers.length || modelcc.length || minimum_price.length || maximum_price.length!=0){
                $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '',
                        //data: "category=" + FinalCategory, "modeltype=" + FinalModelType,
                        data: {minimum_price:minimum_price, maximum_price:maximum_price,category: FinalCategory, modeltype: FinalModelType, maximum_kilometers: maximum_kilometers, modelcc:FinalModelCC},
                        success: function (response) {
                            // console.log(response);
                            $('#updateDiv').html(response);
                        }
                    });
                }else{
                    $('#updateDiv').html(test);
                }
            });

            // filter for mobile
            $('#findBtnMobile').click(function(){
                // console.log('category');
                var minimum_price = $('#hidden_minimum_price_mob').val();
                var maximum_price = $('#hidden_maximum_price_mob').val();
                // console.log(minimum_price);
                var category = [];
                $('.category_id_all').each(function(){
                    if($(this).is(":checked")){
                        category.push($(this).val());
                    }
                });
                console.log(category);
                var modeltype = [];
                $('.modeltype_id_all').each(function(){
                    if($(this).is(":checked")){
                        modeltype.push($(this).val());
                    }
                });

                var maximum_kilometers = $('#max_kilometers_hidden_mobile').val();

                var modelcc = [];
                $('.models_cc_all').each(function(){
                    if($(this).is(":checked")){
                        modelcc.push($(this).val());
                    }
                });
                FinalCategory  = category.toString();
                FinalModelType  = modeltype.toString();
                // FinalModel  = models.toString();
                FinalModelCC  = modelcc.toString();
                // console.log(FinalModel);
                if(category.length || modeltype.length || maximum_kilometers.length || modelcc.length || minimum_price.length || maximum_price.length!=0){
                $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '',
                        //data: "category=" + FinalCategory, "modeltype=" + FinalModelType,
                        data: {minimum_price:minimum_price, maximum_price:maximum_price,category: FinalCategory, modeltype: FinalModelType, maximum_kilometers: maximum_kilometers, modelcc:FinalModelCC},
                        success: function (response) {
                            // console.log(response);
                            $('#updateDiv').html(response);
                        }
                    });
                }else{
                    $('#updateDiv').html(test);
                }
            });
            // End filter for mobile


            //filter reset for desktop
            $('#findReset').click(function(){
                $('.checkbox').prop('checked', false); // Unchecks it
                $('#hidden_minimum_price').val('10000');
                $('#hidden_maximum_price').val('105000');
                // $('#price_show').text('5000 - 100000');
                // $('#slider-range').slider({
                //     range:true,
                //     min:10000,
                //     max:100000,
                //     values:[5000, 100000],
                // });
                
                $.ajax({
                type: 'get',
                dataType: 'html',
                url: '',
                data: "category=all",
                success: function (response) {
                        //console.log(response);
                    //$('#updateDiv').html(response);
                    $('#updateDiv').html(response);
                }
            });
            });
        });


        
     </script>
   
@endpush