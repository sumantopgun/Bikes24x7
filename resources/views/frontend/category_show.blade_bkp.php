@extends('frontend.layout')
@section('title', 'Category')
@push('style')
    <link rel="stylesheet" href="{{ asset('frontend_template/css/listing.css')}}" />
@endpush
@section('content')
<div class="top_banner">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">Category</a></li>
                </ul>
            </div>
            <h1>Category - {{ $category->category_name }}</h1>
        </div>
    </div>
    <img src="{{ asset('frontend_template/shop.jpg')}}" class="img-fluid" alt="">
</div>
<!-- /top_banner -->
    <div id="stick_here"></div>		
    <div class="toolbox elemento_stick">
        <div class="container">
        <ul class="clearfix">
            <li>
                <div class="sort_select">
                    <select name="sort" id="sort">
                            <option value="popularity" selected="selected">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to</option>
                    </select>
                </div>
            </li>
            {{-- <li>
                <a href="#"><i class="ti-view-grid"></i></a>
                <a href="#"><i class="ti-view-list"></i></a>
            </li> --}}
            <li>
                <a href="#0" class="open_filters">
                    <i class="ti-filter"></i><span>Filters</span>
                </a>
            </li>
        </ul>
        </div>
    </div>
    <!-- /toolbox -->
    
    <div class="container margin_30">
    
    <div class="row">
        <aside class="col-lg-3" id="sidebar_fixed">
            <div class="filter_col">
                <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                <div class="filter_type version_2">
                    <h4><a href="#filter_1" data-toggle="collapse" class="opened">Models</a></h4>
                    <div class="collapse show" id="filter_1">
                        <ul>
                            @foreach ($category->models as $model)
                                <li>
                                    <label class="container_check">{{ $model->model_name }} <small></small>
                                        <input type="checkbox" name="model" value="{{ $model->id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>
                    <!-- /filter_type -->
                </div>
                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_2" data-toggle="collapse" class="opened">Model Type</a></h4>
                    <div class="collapse show" id="filter_2">
                        <ul>
                            @foreach ($category->models->unique('model_type') as $model)
                                <li>
                                    <label class="container_check">{{ $model->model_type }} <small></small>
                                        <input type="checkbox" name="modeltype" value="{{ $model->id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                {{-- <div class="filter_type version_2">
                    <h4><a href="#filter_3" data-toggle="collapse" class="closed">Brands</a></h4>
                    <div class="collapse" id="filter_3">
                        <ul>
                            <li>
                                <label class="container_check">Adidas <small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Nike <small>08</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Vans <small>05</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Puma <small>18</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <!-- /filter_type -->
                {{-- <div class="filter_type version_2">
                    <h4><a href="#filter_4" data-toggle="collapse" class="closed">Price</a></h4>
                    <div class="collapse" id="filter_4">
                        <ul>
                            <li>
                                <label class="container_check">$0 — $50<small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$50 — $100<small>08</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$100 — $150<small>05</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$150 — $200<small>18</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <!-- /filter_type -->
                <div class="buttons">
                    <a href="#0" class="btn_1" id="findBtn">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
                </div>
            </div>
        </aside>
        <!-- /col -->
        @if ($category)
        <div class="col-lg-9">
            <div class="row small-gutters">
                @foreach ($category->SellProducts as $product)
                    <div class="col-6 col-md-4">
                        <div class="grid_item">
                            @if ($product->offers)
                                @if($product->offers->offer_end_date >= today()->format('Y-m-d') || $product->offers->offer_start_date===Null)
                                    <span class="ribbon off">{{ $product->offers->offer_amount }} {{ $product->offers->offer_type=='percentage' ? '%' : ''}} off</span>
                                @endif
                            @endif
                            <figure>
                                <a href="{{ route('product-details', $product->id) }}">
                                    <img class="img-fluid lazy" src="{{asset('storage/'.$product->bike_image)}}" data-src="{{asset('storage/'.$product->bike_image)}}" alt="">
                                </a>
                                @if ($product->offers)
                                    @if ($product->offers->offer_end_date >= today()->format('Y-m-d'))
                                        <div data-countdown="{{ $product->offers->offer_end_date }}" class="countdown"></div>
                                    @endif                            
                                @endif
                            </figure>
                            <a href="{{ route('product-details', $product->id) }}">
                                <h3>{{ $product->bike_name }}</h3>
                            </a>
                            <div class="price_box">
                                @if ($product->offers)
                                    @if ($product->offers->offer_end_date >= today()->format('Y-m-d') || $product->offers->offer_start_date===Null)
                                        @if ($product->offers->offer_type=='percentage')
                                            <span class="new_price">Rs. {{ $product->bike_sell_price - $product->bike_sell_price * $product->offers->offer_amount / 100 }}</span>
                                        @else
                                            <span class="new_price">Rs. {{ $product->bike_sell_price - $product->offers->offer_amount }}</span>
                                        @endif
                                    @else
                                        <span class="new_price">Rs. {{ $product->bike_sell_price }}</span>
                                    @endif
                                @else
                                    <span class="new_price">Rs. {{ $product->bike_sell_price }}</span>
                                @endif
                                <span class="old_price">Rs. {{ $product->bike_sell_price }}</span>
                            </div>
                            {{-- <ul>
                                <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul> --}}
                        </div>
                        <!-- /grid_item -->
                    </div>
                @endforeach
                <!-- /col -->	
                
            </div>
            <!-- /row -->
            {{-- <div class="pagination__wrapper">
                <ul class="pagination">
                    <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
                    <li>
                        <a href="#0" class="active">1</a>
                    </li>
                    <li>
                        <a href="#0">2</a>
                    </li>
                    <li>
                        <a href="#0">3</a>
                    </li>
                    <li>
                        <a href="#0">4</a>
                    </li>
                    <li><a href="#0" class="next" title="next page">&#10095;</a></li>
                </ul>
            </div> --}}
        </div>
        @endif

        <div class="col-lg-9" id="productData">
        </div>

        <!-- /col -->
    </div>
    <!-- /row -->			
        
</div>
@endsection
@push('scripts')
    <script src="{{ asset('frontend_template/js/sticky_sidebar.min.js')}}"></script>
    <script src="{{ asset('frontend_template/js/specific_listing.js')}}"></script>
     
   
@endpush