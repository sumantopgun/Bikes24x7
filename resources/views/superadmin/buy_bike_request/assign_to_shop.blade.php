@extends('superadmin.layout')
@section('title', 'Sale Product Create')
@push('style')
<link rel="stylesheet" href="{{ asset('admin_template/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />
@endpush
@section('content')
    <div class="content-wrapper">
        <form method="POST" action="{{ route('superadmin.assign_to_shop_submit') }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="workshop_assign_id" id="workshop_assign_id" value="{{$works_done->id}}" hidden>

        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="bike_name">Bike Name</label>
                                <input type="text" class="form-control" id="bike_name" name="bike_name" placeholder="Bike Name" value="{{ optional($works_done->bike_details)->brand_name.' '.optional($works_done->bike_details)->model_name.' '.optional($works_done->bike_details)->model_cc.' '.optional($works_done->bike_details)->bike_year }}" required>
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
                                            <option value="{{$key}}"> {{$category}}</option>
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
                                    <option value="">Select Brand First</option>
                                </select>
                            </div>
                            @error('model_id')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                                <label for="shop_id">Showroom Name</label>
                                <select class="form-control" name="shop_id" required>
                                    <option value="">Select Showroom</option>
                                    @if (!$showrooms->isEmpty())
                                        @foreach ($showrooms as $shop)
                                            <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                        @endforeach                
                                    @endif
                                </select>
                            </div>
                            @error('shop_id')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_year">Bike Year</label>
                                <input type="text" class="form-control" id="bike_year" name="bike_year" placeholder="Bike Year" value="{{ optional($works_done->bike_details)->bike_year }}" required>
                            </div>
                            @error('bike_year')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                                <label for="bike_description">Description</label>
                                <textarea class="form-control" required id="bike_description" name="bike_description" rows="3">{{ old('bike_description') }}</textarea>
                            </div>
                            @error('bike_description')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_regn_no">Registration No.</label>
                                    <input type="text" class="form-control" id="bike_regn_no" name="bike_regn_no" placeholder="Registration No" value="{{ old('bike_regn_no') }}" required>
                            </div>
                            @error('bike_regn_no')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_reg_date">Registration Date</label>
                                    <input type="date" class="form-control" id="bike_reg_date" name="bike_reg_date" value="{{ optional($works_done->bike_buy_requests)->bike_buy_reg_date }}" required>
                            </div>
                            @error('bike_reg_date')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_regn_branch">Registration RTO</label>
                                    <input type="text" class="form-control" id="bike_regn_branch" name="bike_regn_branch" placeholder="Registration RTO" value="{{ old('bike_regn_branch') }}" required>
                            </div>
                            @error('bike_regn_branch')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_chassis_no">Chassis No.</label>
                                    <input type="text" class="form-control" id="bike_chassis_no" name="bike_chassis_no" placeholder="Chassis No" value="{{ old('bike_chassis_no') }}" required>
                            </div>
                            @error('bike_chassis_no')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_engine_no">Engine No.</label>
                                    <input type="text" class="form-control" id="bike_engine_no" name="bike_engine_no" placeholder="Engine No" value="{{ old('bike_engine_no') }}" required>
                            </div>
                            @error('bike_engine_no')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="number_of_owners">Number of Owners</label>
                                <input type="number" class="form-control" id="number_of_owners" name="number_of_owners" placeholder="Number of owners" value="{{ optional($works_done->bike_buy_requests)->bike_buy_no_of_owners }}" required>
                            </div>
                            @error('number_of_owners')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="total_kilometers">Total Kilometers</label>
                                <input type="number" class="form-control" id="total_kilometers" name="total_kilometers" placeholder="Total Kilometers" value="{{ optional($works_done->bike_buy_requests)->bike_buy_no_of_km }}" required>
                            </div>
                            @error('total_kilometers')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            

                            <div class="form-group row">
                                <label for="bike_color">Bike Color</label>
                                <input type="text" class="form-control" id="bike_color" name="bike_color" placeholder="Bike Color" value="{{ optional($works_done->bike_buy_requests)->bike_buy_color }}" required>
                            </div>
                            @error('bike_color')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_quantity">Quantity</label>
                                <input type="number" class="form-control" id="bike_quantity" name="bike_quantity" placeholder="Bike Quantity" value="{{ '1' }}" readonly>
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
                                    <input type="number" class="form-control" id="bike_new_price" name="bike_new_price" placeholder="Bike Cost Price" value="{{ optional($works_done->bike_buy_requests)->bike_buy_agreed_bike_price + optional($works_done->workshop_works_cost)->bike_inspection_total_deductions }}" required>
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
                                    <input type="number" class="form-control" id="bike_sell_price" name="bike_sell_price" placeholder="Sale Price" value="{{ old('bike_sell_price') }}" required>
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
                                    <input type="text" class="form-control" id="bike_on_road_price" name="bike_on_road_price" placeholder="On Road Price" value="{{ old('bike_on_road_price') }}" required>
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
                                <input type="number" class="form-control" id="bike_discount" name="bike_discount" value="{{ old('bike_discount') }}" placeholder="Discount">
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
                                            <option value="{{$offer->id}}">{{$offer->offer_name}}</option>
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
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                </div>
                            @error('bike_warranty')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_refurbished">Refurbished</label>
                                <select class="form-control" name="bike_refurbished" id="bike_refurbished" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                </div>
                            @error('bike_refurbished')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_rc">Registration Certificate</label>
                                <select class="form-control" name="bike_rc" id="bike_rc" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            @error('bike_rc')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror

                            <div class="form-group row">
                                <label for="bike_insurance">Insurance</label>
                                <select class="form-control" name="bike_insurance" id="bike_insurance" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            @error('bike_insurance')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_finance_available">Finance Available</label>
                                <select class="form-control" name="bike_finance_available" id="bike_finance_available" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            @error('bike_finance_available')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
        
                            <div class="form-group row">
                                <label for="bike_rto_city">RTO City</label>
                                <input type="text" class="form-control" id="bike_rto_city" name="bike_rto_city" placeholder="RTO City" value="{{ old('bike_rto_city') }}" required>
                            </div>
                            @error('bike_rto_city')
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
                        <label for="bike_rto_state">RTO State</label>
                        <input type="text" class="form-control" id="bike_rto_state" name="bike_rto_state" placeholder="RTO State" value="{{ old('bike_rto_state') }}" required>
                    </div>
                    @error('bike_rto_state')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_transmission_type">Transmission Type</label>
                        <select class="form-control" name="bike_transmission_type" id="bike_transmission_type" required>
                            <option value="">Select Type</option>
                            <option value="automatic">Automatic</option>
                            <option value="gear">Gear</option>
                        </select>
                        </div>
                    @error('bike_transmission_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_fuel_type">Fuel Type</label>
                        <select class="form-control" name="bike_fuel_type" id="bike_fuel_type" required>
                            <option value="">Select Fuel Type</option>
                            <option value="petrol">Petrol</option>
                            <option value="diesel">Diesel</option>
                            <option value="electric">Electric</option>
                        </select>
                        </div>
                    @error('bike_fuel_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_abs">Anti-lock Braking System</label>
                        <select class="form-control" name="bike_abs" id="bike_abs" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        </div>
                    @error('bike_abs')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_ignition_type">Ignition Type</label>
                        <select class="form-control" name="bike_ignition_type" id="bike_ignition_type" required>
                            <option value="">Select Ignition Type</option>
                            <option value="kickstart">Kickstart</option>
                            <option value="electric start">Electric Start</option>
                            <option value="both">Both</option>
                        </select>
                        </div>
                    @error('bike_ignition_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_rear_break_type">Brake System - Rear</label>
                        <select class="form-control" name="bike_rear_break_type" id="bike_rear_break_type" required>
                            <option value="">Select Type</option>
                            <option value="drum">Drum</option>
                            <option value="disc">Disc</option>
                        </select>
                        </div>
                    @error('bike_rear_break_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_front_break_type">Brake System - Front</label>
                        <select class="form-control" name="bike_front_break_type" id="bike_front_break_type" required>
                            <option value="">Select Type</option>
                            <option value="drum">Drum</option>
                            <option value="disc">Disc</option>
                        </select>
                        </div>
                    @error('bike_front_break_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_odometer">Odometer</label>
                        <select class="form-control" name="bike_odometer" id="bike_odometer" required>
                            <option value="">Select Type</option>
                            <option value="digital">Digital</option>
                            <option value="analog">Analog</option>
                        </select>
                        </div>
                    @error('bike_odometer')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_engine_condition">Engine Condition</label>
                        <input type="text" class="form-control" id="bike_engine_condition" name="bike_engine_condition" placeholder="Engine Condition" value="{{ old('bike_engine_condition') }}" maxlength="50" required>
                    </div>
                    @error('bike_engine_condition')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_clutch_condition">Clutch Condition</label>
                        <input type="text" class="form-control" id="bike_clutch_condition" name="bike_clutch_condition" placeholder="Clutch Condition" value="{{ old('bike_clutch_condition') }}" maxlength="50" required>
                    </div>
                    @error('bike_clutch_condition')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_gear_box">Gear Box</label>
                        <input type="text" class="form-control" id="bike_gear_box" name="bike_gear_box" placeholder="Gear Box" value="{{ old('bike_gear_box') }}" maxlength="50" required>
                    </div>
                    @error('bike_gear_box')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_no_of_cylinders">No. of cylinders</label>
                        <input type="number" class="form-control" id="bike_no_of_cylinders" name="bike_no_of_cylinders" placeholder="No. of cylinders" value="{{ old('bike_no_of_cylinders') }}" required>
                    </div>
                    @error('bike_no_of_cylinders')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_chain_sprocket">Chain Sprocket</label>
                        <input type="text" class="form-control" id="bike_chain_sprocket" name="bike_chain_sprocket" placeholder="Chain Sprocket" value="{{ old('bike_chain_sprocket') }}" maxlength="50" required>
                    </div>
                    @error('bike_chain_sprocket')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_rear_suspension">Suspension - Rear</label>
                        <input type="text" class="form-control" id="bike_rear_suspension" name="bike_rear_suspension" placeholder="Suspension - Rear" value="{{ old('bike_rear_suspension') }}" maxlength="50" required>
                    </div>
                    @error('bike_rear_suspension')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_front_suspension">Suspension - Front</label>
                        <input type="text" class="form-control" id="bike_front_suspension" name="bike_front_suspension" placeholder="Suspension - Front" value="{{ old('bike_front_suspension') }}" maxlength="50" required>
                    </div>
                    @error('bike_front_suspension')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_tyre_condition">Tyre Condition</label>
                        <input type="text" class="form-control" id="bike_tyre_condition" name="bike_tyre_condition" placeholder="Tyre Condition" value="{{ old('bike_tyre_condition') }}" maxlength="50" required>
                    </div>
                    @error('bike_tyre_condition')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_electrical">Electricals</label>
                        <input type="text" class="form-control" id="bike_electrical" name="bike_electrical" placeholder="Electricals" value="{{ old('bike_electrical') }}" maxlength="50" required>
                    </div>
                    @error('bike_electrical')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    
                    <div class="form-group row">
                        <label for="bike_paint">Paint</label>
                        <select class="form-control" name="bike_paint" id="bike_paint" required>
                            <option value="">Select Type</option>
                            <option value="original">Original</option>
                            <option value="partially repainted">Partially Repainted</option>
                            <option value="fully repainted">Fully Repainted</option>
                        </select>
                        </div>
                    @error('bike_paint')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_battery_condition">Battery Condition</label>
                        <input type="text" class="form-control" id="bike_battery_condition" name="bike_battery_condition" placeholder="Battery Condition" value="{{ old('bike_battery_condition') }}" maxlength="50" required>
                    </div>
                    @error('bike_battery_condition')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror


                    <div class="form-group row">
                        <label for="bike_show_type">Show Type</label>
                        <select class="form-control" name="bike_show_type" id="bike_show_type">
                          <option value="normal">Normal</option>
                          <option value="top_selling">Top Selling</option>
                          {{-- <option value="new">New</option> --}}
                        </select>
                      </div>
                    @error('bike_show_type')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group row">
                        <label for="bike_certified_by">Certified By</label>
                        <input type="text" class="form-control" id="bike_certified_by" name="bike_certified_by" readonly value="{{ 'Bikes24x7' }}">
                    </div>
                    @error('bike_certified_by')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    {{-- <div class="form-group row">
                        <label>Certificate (only .pdf)</label>
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
                        <label>Main Image *</label>
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
                        <label>Image Gallary</label>
                        <input type="file" name="bike_gallary[]" class="form-control-file" multiple>
                        
                    </div>
                    @error('bike_gallary')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    
                    
                </div>
            </div>
        </div>
        </div>
        <div class="form-group">
           <center><button type="submit" class="btn btn-success mr-2">Submit</button></center> 
        </div>
    </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/js/file-upload.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript">
        $('#category_id').change(function(){
        var categoryID = $(this).val();    
        if(categoryID){
            $.ajax({
               type:"GET",
               url:"{{ route('superadmin.getmodels') }}?category_id="+categoryID,
               success:function(res){               
                if(res){
                    $("#model_id").empty();
                    $("#model_id").append('<option value="">Select Model</option>');
                    $.each(res,function(key,value){
                        // $("#model_id").append('<option value="'+key+'">'+value+'</option>');
                        $("#model_id").append('<option value="'+value.id+'">'+value.model_name+' - '+value.model_cc+'CC</option>');
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