@extends('workshop_main.layout')
@section('title', 'Sale Product Edit')
@push('style')
<link rel="stylesheet" href="{{ asset('admin_template/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />
<style>
    .imageThumb {
        max-height: 82px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }
    .pip {
        display: inline-block;
        margin: 10px 10px 0 0;
    }
    .remove {
        display: block;
        background: #444;
        border: 1px solid black;
        color: white;
        text-align: center;
        cursor: pointer;
    }
    .remove:hover {
        background: white;
        color: black;
    }
    select#model_id {
        font-family: 'FontAwesome', 'sans-serif';
    }
</style>
@endpush
@section('content')
    <div class="content-wrapper">
        <form method="POST" action="{{ route('workshop_main.sale.update', $sell->id ) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="bike_name">Bike Name</label>
                                <input type="text" class="form-control" id="bike_name" name="bike_name" placeholder="Bike Name" value="{{ $sell->bike_name }}" required>
                            </div>
                            @error('bike_name')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                                <label for="category_id">Brand</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                  <option value="">Select Brand</option>
                                    @if (!$categories->isEmpty())
                                        @foreach($categories as $key => $category)
                                            {{-- <option value="{{$key}}"> {{$category}}</option> --}}
                                            @if($sell->category_id==$key)
                                                <option selected value="{{$key}}">{{$category}}</option>
                                            @elseif($sell->category_id!==$key)
                                                <option value="{{$key}}">{{$category}}</option>
                                            @endif
                                        @endforeach                
                                    @endif
                                </select>
                            </div>
                            @error('category_id')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                                <label for="model_id">Model & CC</label>
                                <select class="form-control" name="model_id" id="model_id" required>
                                    <option value="{{ $sell->models->id }}">{{ $sell->models->model_name }} - {{ $sell->models->model_cc }}{{'CC'}} &#xf00c;</option>
                                </select>
                            </div>
                            @error('model_id')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            {{-- <div class="form-group row">
                                <label for="model_cc">Model CC</label>
                                <input type="text" class="form-control" id="modelCC" name="model_cc" placeholder="Model CC" value="{{ $sell->models->model_cc }}" required>
                            </div> --}}
                            <div class="form-group row">
                                <label for="shop_id">Showroom Name</label>
                                <select class="form-control" name="shop_id" required>
                                    <option value="">Select Showroom</option>
                                    @if (!$shops->isEmpty())
                                        @foreach ($shops as $shop)
                                            {{-- <option value="{{$sell->id}}">{{$shop->shop_name}}</option> --}}
                                            @if($sell->shop_id==$shop->id)
                                                <option selected value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                            @elseif($sell->shop_id!==$shop->id)
                                                <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                            @endif
                                        @endforeach                
                                    @endif
                                </select>
                            </div>
                            @error('shop_id')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_year">Bike Year</label>
                                <input type="text" class="form-control" id="bike_year" name="bike_year" placeholder="Bike Year" value="{{ $sell->bike_year }}" required>
                            </div>
                            @error('bike_year')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                                <label for="bike_description">Description</label>
                                <textarea class="form-control" required id="bike_description" name="bike_description" rows="3">{{ $sell->bike_description }}</textarea>
                            </div>
                            @error('bike_description')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_regn_no">Registration No.</label>
                                    <input type="text" class="form-control" id="bike_regn_no" name="bike_regn_no" placeholder="Registration No" value="{{ $sell->bike_regn_no ?? 'N/A' }}" required>
                            </div>
                            @error('bike_regn_no')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_reg_date">Registration Date</label>
                                    <input type="date" class="form-control" id="bike_reg_date" value="{{ $sell->bike_reg_date ?? 'N/A' }}" name="bike_reg_date" required>
                            </div>
                            @error('bike_reg_date')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_regn_branch">Registration RTO</label>
                                    <input type="text" class="form-control" id="bike_regn_branch" name="bike_regn_branch" placeholder="Registration RTO" value="{{ $sell->bike_regn_branch ?? 'N/A' }}" required>
                            </div>
                            @error('bike_regn_branch')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_chassis_no">Chassis No.</label>
                                    <input type="text" class="form-control" id="bike_chassis_no" name="bike_chassis_no" placeholder="Chassis No" value="{{ $sell->bike_chassis_no ?? 'N/A' }}" required>
                            </div>
                            @error('bike_chassis_no')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_engine_no">Engine No.</label>
                                    <input type="text" class="form-control" id="bike_engine_no" name="bike_engine_no" placeholder="Engine No" value="{{ $sell->bike_engine_no ?? 'N/A' }}" required>
                            </div>
                            @error('bike_engine_no')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="number_of_owners">Number of Owners</label>
                                <input type="number" class="form-control" id="number_of_owners" name="number_of_owners" value="{{ $sell->number_of_owners ?? 'N/A' }}" required>
                            </div>
                            @error('number_of_owners')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="total_kilometers">Total Kilometers</label>
                                <input type="number" class="form-control" id="total_kilometers" name="total_kilometers" value="{{ $sell->total_kilometers ?? 'N/A' }}" required>
                            </div>
                            @error('total_kilometers')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_color">Bike Color</label>
                                <input type="text" class="form-control" id="bike_color" name="bike_color" placeholder="Bike Color" value="{{ $sell->bike_color ?? 'N/A' }}" required>
                              </div>
                            @error('bike_color')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                                <label for="bike_quantity">Quantity</label>
                                <input type="number" class="form-control" id="bike_quantity" name="bike_quantity" placeholder="Bike Quantity" value="{{ $sell->bike_quantity }}" readonly>
                            </div>
                            @error('bike_quantity')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_new_price">Bike Cost Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">Rs.</span>
                                    </div>
                                    <input type="number" class="form-control" id="bike_new_price" name="bike_new_price" placeholder="Bike Cost Price" value="{{ $sell->bike_new_price }}" required>
                                    <div class="input-group-append">
                                    <span class="input-group-text">.00</span>                            
                                    </div>
                                </div>
                            </div>
                            @error('bike_new_price')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                                <label for="bike_sell_price">Sale Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rs.</span>
                                    </div>
                                    <input type="number" class="form-control" id="bike_sell_price" name="bike_sell_price" placeholder="Sale Price" value="{{ $sell->bike_sell_price }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            @error('bike_sell_price')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_on_road_price">On Road Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rs.</span>
                                    </div>
                                    <input type="text" class="form-control" id="bike_on_road_price" name="bike_on_road_price" placeholder="On Road Price" value="{{ $sell->bike_on_road_price }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            @error('bike_on_road_price')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            {{-- <div class="form-group row">
                                <label for="bike_discount">Discount</label>
                                <input type="number" class="form-control" id="bike_discount" name="bike_discount" placeholder="Discount" value="{{ $sell->bike_discount }}">
                            </div>
                            @error('bike_discount')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror --}}
                            <div class="form-group row">
                                <label for="offer_id">Offer Name</label>
                                <select class="form-control" name="offer_id">
                                    <option value="">Select Offer</option>
                                    @if (!$offers->isEmpty())
                                        @foreach ($offers as $offer)
                                            {{-- <option value="{{$offer->id}}">{{$offer->offer_name}}</option> --}}
                                            @if($sell->offer_id==$offer->id)
                                                <option selected value="{{$offer->id}}">{{$offer->offer_name}}</option>
                                            @elseif($sell->offer_id!==$offer->id)
                                                <option value="{{$offer->id}}">{{$offer->offer_name}}</option>
                                            @endif
                                        @endforeach                
                                    @endif
                                </select>
                            </div>
                            @error('offer_id')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_warranty">Warranty</label>
                                <select class="form-control" name="bike_warranty" id="bike_warranty" required>
                                    <option value="1" {{ optional($sell->bikeDetails)->bike_warranty=='1' ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ optional($sell->bikeDetails)->bike_warranty=='0' ? 'selected' : ''}}>No</option>
                                </select>
                                </div>
                            @error('bike_warranty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_refurbished">Refurbished</label>
                                <select class="form-control" name="bike_refurbished" id="bike_refurbished" required>
                                    <option value="1" {{ optional($sell->bikeDetails)->bike_refurbished=='1' ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ optional($sell->bikeDetails)->bike_refurbished=='0' ? 'selected' : ''}}>No</option>
                                </select>
                                </div>
                            @error('bike_refurbished')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_rc">Registration Certificate</label>
                                <select class="form-control" name="bike_rc" id="bike_rc" required>
                                    <option value="1" {{ optional($sell->bikeDetails)->bike_rc=='1' ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ optional($sell->bikeDetails)->bike_rc=='0' ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            @error('bike_rc')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_insurance">Insurance</label>
                                <select class="form-control" name="bike_insurance" id="bike_insurance" required>
                                    <option value="1" {{ optional($sell->bikeDetails)->bike_insurance=='1' ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ optional($sell->bikeDetails)->bike_insurance=='0' ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            @error('bike_insurance')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_finance_available">Finance Available</label>
                                <select class="form-control" name="bike_finance_available" id="bike_finance_available" required>
                                    <option value="1" {{ optional($sell->bikeDetails)->bike_finance_available=='1' ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{ optional($sell->bikeDetails)->bike_finance_available=='0' ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                            @error('bike_finance_available')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            
        
                            
        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="form-group row">
                        <label for="bike_rto_city">RTO City</label>
                        <input type="text" class="form-control" id="bike_rto_city" name="bike_rto_city" placeholder="RTO City" value="{{ optional($sell->bikeDetails)->bike_rto_city }}" required>
                    </div>
                    @error('bike_rto_city')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_rto_state">RTO State</label>
                        <input type="text" class="form-control" id="bike_rto_state" name="bike_rto_state" placeholder="RTO State" value="{{ optional($sell->bikeDetails)->bike_rto_state }}" required>
                    </div>
                    @error('bike_rto_state')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    
                    <div class="form-group row">
                        <label for="bike_transmission_type">Transmission Type</label>
                        <select class="form-control" name="bike_transmission_type" id="bike_transmission_type" required>
                            <option value="automatic" {{ optional($sell->bikeDetails)->bike_transmission_type=='automatic' ? 'selected' : ''}}>Automatic</option>
                            <option value="gear" {{ optional($sell->bikeDetails)->bike_transmission_type=='gear' ? 'selected' : ''}}>Gear</option>
                        </select>
                        </div>
                    @error('bike_transmission_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    
                    <div class="form-group row">
                        <label for="bike_fuel_type">Fuel Type</label>
                        <select class="form-control" name="bike_fuel_type" id="bike_fuel_type" required>
                            <option value="petrol" {{ optional($sell->bikeDetails)->bike_fuel_type=='petrol' ? 'selected' : ''}}>Petrol</option>
                            <option value="diesel" {{ optional($sell->bikeDetails)->bike_fuel_type=='diesel' ? 'selected' : ''}}>Diesel</option>
                            <option value="electric" {{ optional($sell->bikeDetails)->bike_fuel_type=='electric' ? 'selected' : ''}}>Electric</option>
                        </select>
                        </div>
                    @error('bike_fuel_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_abs">Anti-lock Braking System</label>
                        <select class="form-control" name="bike_abs" id="bike_abs" required>
                            <option value="1" {{ optional($sell->bikeDetails)->bike_abs=='1' ? 'selected' : ''}}>Yes</option>
                            <option value="0" {{ optional($sell->bikeDetails)->bike_abs=='0' ? 'selected' : ''}}>No</option>
                        </select>
                        </div>
                    @error('bike_abs')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_ignition_type">Ignition Type</label>
                        <select class="form-control" name="bike_ignition_type" id="bike_ignition_type" required>
                            <option value="kickstart" {{ optional($sell->bikeDetails)->bike_ignition_type=='kickstart' ? 'selected' : ''}}>Kickstart</option>
                            <option value="electric start" {{ optional($sell->bikeDetails)->bike_ignition_type=='electric start' ? 'selected' : ''}}>Electric Start</option>
                            <option value="both" {{ optional($sell->bikeDetails)->bike_ignition_type=='both' ? 'selected' : ''}}>Both</option>
                        </select>
                        </div>
                    @error('bike_ignition_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_rear_break_type">Brake System - Rear</label>
                        <select class="form-control" name="bike_rear_break_type" id="bike_rear_break_type" required>
                            <option value="drum" {{ optional($sell->bikeDetails)->bike_rear_break_type=='drum' ? 'selected' : ''}}>Drum</option>
                            <option value="disc" {{ optional($sell->bikeDetails)->bike_rear_break_type=='disc' ? 'selected' : ''}}>Disc</option>
                        </select>
                        </div>
                    @error('bike_rear_break_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_front_break_type">Brake System - Front</label>
                        <select class="form-control" name="bike_front_break_type" id="bike_front_break_type" required>
                            <option value="drum" {{ optional($sell->bikeDetails)->bike_front_break_type=='drum' ? 'selected' : ''}}>Drum</option>
                            <option value="disc" {{ optional($sell->bikeDetails)->bike_front_break_type=='disc' ? 'selected' : ''}}>Disc</option>
                        </select>
                        </div>
                    @error('bike_front_break_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_odometer">Odometer</label>
                        <select class="form-control" name="bike_odometer" id="bike_odometer" required>
                            <option value="digital" {{ optional($sell->bikeDetails)->bike_odometer=='digital' ? 'selected' : ''}}>Digital</option>
                            <option value="analog" {{ optional($sell->bikeDetails)->bike_odometer=='analog' ? 'selected' : ''}}>Analog</option>
                        </select>
                        </div>
                    @error('bike_odometer')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_engine_condition">Engine Condition</label>
                        <input type="text" class="form-control" id="bike_engine_condition" name="bike_engine_condition" placeholder="Engine Condition" value="{{ optional($sell->bikeDetails)->bike_engine_condition }}" maxlength="50" required>
                    </div>
                    @error('bike_engine_condition')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_clutch_condition">Clutch Condition</label>
                        <input type="text" class="form-control" id="bike_clutch_condition" name="bike_clutch_condition" placeholder="Clutch Condition" value="{{ optional($sell->bikeDetails)->bike_clutch_condition }}" maxlength="50" required>
                    </div>
                    @error('bike_clutch_condition')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group row">
                        <label for="bike_gear_box">Gear Box</label>
                        <input type="text" class="form-control" id="bike_gear_box" name="bike_gear_box" placeholder="Gear Box" value="{{ optional($sell->bikeDetails)->bike_gear_box }}" maxlength="50" required>
                    </div>
                    @error('bike_gear_box')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_no_of_cylinders">No. of cylinders</label>
                        <input type="number" class="form-control" id="bike_no_of_cylinders" name="bike_no_of_cylinders" placeholder="No. of cylinders" value="{{ optional($sell->bikeDetails)->bike_no_of_cylinders }}" required>
                    </div>
                    @error('bike_no_of_cylinders')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_chain_sprocket">Chain Sprocket</label>
                        <input type="text" class="form-control" id="bike_chain_sprocket" name="bike_chain_sprocket" placeholder="Chain Sprocket" value="{{ optional($sell->bikeDetails)->bike_chain_sprocket }}" maxlength="50" required>
                    </div>
                    @error('bike_chain_sprocket')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_rear_suspension">Suspension - Rear</label>
                        <input type="text" class="form-control" id="bike_rear_suspension" name="bike_rear_suspension" placeholder="Suspension - Rear" value="{{ optional($sell->bikeDetails)->bike_rear_suspension }}" maxlength="50" required>
                    </div>
                    @error('bike_rear_suspension')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_front_suspension">Suspension - Front</label>
                        <input type="text" class="form-control" id="bike_front_suspension" name="bike_front_suspension" placeholder="Suspension - Front" value="{{ optional($sell->bikeDetails)->bike_front_suspension }}" maxlength="50" required>
                    </div>
                    @error('bike_front_suspension')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_tyre_condition">Tyre Condition</label>
                        <input type="text" class="form-control" id="bike_tyre_condition" name="bike_tyre_condition" placeholder="Tyre Condition" value="{{ optional($sell->bikeDetails)->bike_tyre_condition }}" maxlength="50" required>
                    </div>
                    @error('bike_tyre_condition')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_electrical">Electricals</label>
                        <input type="text" class="form-control" id="bike_electrical" name="bike_electrical" placeholder="Electricals" value="{{ optional($sell->bikeDetails)->bike_electrical }}" maxlength="50" required>
                    </div>
                    @error('bike_electrical')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    
                    <div class="form-group row">
                        <label for="bike_paint">Paint</label>
                        <select class="form-control" name="bike_paint" id="bike_paint" required>
                            <option value="original" {{ optional($sell->bikeDetails)->bike_paint=='original' ? 'selected' : ''}}>Original</option>
                            <option value="partially repainted" {{ optional($sell->bikeDetails)->bike_paint=='partially repainted' ? 'selected' : ''}}>Partially Repainted</option>
                            <option value="fully repainted" {{ optional($sell->bikeDetails)->bike_paint=='fully repainted' ? 'selected' : ''}}>Fully Repainted</option>
                        </select>
                        </div>
                    @error('bike_paint')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_battery_condition">Battery Condition</label>
                        <input type="text" class="form-control" id="bike_battery_condition" name="bike_battery_condition" placeholder="Battery Condition" value="{{ optional($sell->bikeDetails)->bike_battery_condition }}" maxlength="50" required>
                    </div>
                    @error('bike_battery_condition')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_show_type">Show Type</label>
                        <select class="form-control" name="bike_show_type" id="bike_show_type">
                          <option value="normal" {{ $sell->bike_show_type=='normal' ? 'selected' : ''}}>Normal</option>
                          <option value="top_selling" {{ $sell->bike_show_type=='top_selling' ? 'selected' : ''}}>Top Selling</option>
                          {{-- <option value="new" {{ $sell->bike_show_type=='new' ? 'selected' : ''}}>New</option> --}}
                        </select>
                      </div>
                    @error('bike_show_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group row">
                        <label for="bike_certified_by">Certified By</label>
                        <input type="text" class="form-control" id="bike_certified_by" name="bike_certified_by" readonly value="{{ $sell->bike_certified_by }}">
                    </div>
                    @error('bike_certified_by')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    {{-- <div class="form-group row">
                        <label>Certificate</label>
                        <input type="file" name="bike_certificate" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Certificate">
                            <div class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>                          
                            </div>
                        </div>
                    </div>
                    @error('bike_certificate')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror --}}
                    <div class="form-group row">
                        <label>Main Image</label>
                        <input type="file" name="bike_image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <div class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>                          
                            </div>
                        </div>
                    </div>
                    @error('bike_image')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label>Image Gallery</label>
                                                
                        @if ($gallaryimg==[Null])
                        <input type="file" name="bike_gallary[]" id="files" class="form-control-file" multiple required>
                            @foreach ($gallaryimg as $item)
                                <input type="hidden" name="prvgallary[]" id="prvgallary" value="{{ $item }}">
                            @endforeach
                        @else
                        <input type="file" name="bike_gallary[]" id="files" class="form-control-file" multiple>
                            @foreach ($gallaryimg as $item)
                                <span class="pip">
                                    <img class="imageThumb" src="{{asset('storage/salegallary/'.$item)}}" title="{{ $item }}">
                                </span>
                                <input type="hidden" name="prvgallary[]" id="prvgallary" value="{{ $item }}">
                            @endforeach
                        @endif
                        
                    </div>

                    @error('bike_gallary')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    
                    
                </div>
            </div>
        </div>
        </div>
        <div class="form-group">
           <center><button type="submit" class="btn btn-success mr-2">Update</button></center> 
        </div>
    </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/js/file-upload.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript">
        // $('#category_id').mouseleave(function(){
        $('#category_id').click(function(){
        var categoryID = $(this).val();    
        if(categoryID){
            $.ajax({
               type:"GET",
               url:"{{ route('workshop_main.getmodels') }}?category_id="+categoryID,
               success:function(res){               
                if(res){
                    // console.log(res);
                    $("#model_id").empty();
                    // $("#model_id").append('<option value="{{ $sell->models->id }}">{{ $sell->models->model_name }} &#xf00c;</option>');
                    $("#model_id").append('<option value="">Select model</option>');
                    $.each(res,function(key,value){
                        // console.log(value.id);
                        $("#model_id").append('<option value="'+value.id+'">'+value.model_name+' - '+value.model_cc+'CC</option>');
                        // $("#modelCC").val(value.model_cc);
                    });
                    
                }else{
                   $("#model_id").empty();
                }
               }
            });
        }else{
            $("#model_id").empty();
        }      
       });

    //    $('#bike_year').datepicker({
    //        format:'yyyy',
    //        viewMode: 'years',
    //        minViewMode: 'years'
    //    });

       $('#datepicker-popup').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
        });
    </script>

    <script>
        $(document).ready(function() {
            
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                var file = e.target;
                $("<span class=\"pip\">" +
                    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>"  +
                    "</span>").insertAfter("#files");
                // $(".remove").click(function(){
                //     $(this).parent(".pip").remove();
                // });
                
                // Old code here
                /*$("<img></img>", {
                    class: "imageThumb",
                    src: e.target.result,
                    title: file.name + " | Click to remove"
                }).insertAfter("#files").click(function(){$(this).remove();});*/
                
                });
                fileReader.readAsDataURL(f);
            }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
        });
    </script>
    
     <script>
        // $(function(){
        //     var dtToday = new Date();
            
        //     var month = dtToday.getMonth() + 1;
        //     var day = dtToday.getDate();
        //     var year = dtToday.getFullYear();
        //     if(month < 10)
        //         month = '0' + month.toString();
        //     if(day < 10)
        //         day = '0' + day.toString();
            
        //     var maxDate = year + '-' + month + '-' + day;
        //     $('#bike_reg_date').attr('max', maxDate);
        // });
        $("#bike_year").change(function(){
            var selected_bike_year = $(this).val();
            var startMonth = '01';
            var endMonth = 12;
            var startDay = '01';
            var endDay = 31;
            var maxDate = selected_bike_year + '-' + endMonth + '-' + endDay;
            var minDate = selected_bike_year + '-' + startMonth + '-' + startDay;
            $('#bike_reg_date').attr('min', minDate);
            $('#bike_reg_date').attr('max', maxDate);
        });
    </script>

    <script>
        $(document).ready(function () {
            var currentDate = new Date();
            $('#bike_year').datepicker({
                format: 'yyyy',
                viewMode: 'years',
                minViewMode: 'years',
                autoclose:true,
                endDate: "currentDate",
                maxDate: currentDate
            }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });
            $('#bike_year').keyup(function () {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9^-]/g, '');
                }
            });
        });
    </script>
@endpush