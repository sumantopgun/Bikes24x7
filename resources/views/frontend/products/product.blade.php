@if ($products->isEmpty())
    <div class="alert alert-success" role="alert">
        {{ 'Product not founds' }}
    </div>
@endif

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
                                    <h5 class="price-text-color"><i class="fa fa-rupee"></i>{{ $product->bike_sell_price - $product->bike_sell_price * $product->offers->offer_amount / 100 }}/-<span class="text-through"> <i class="fa fa-rupee"></i>{{ $product->bike_sell_price }}/-</span></h5>
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

       