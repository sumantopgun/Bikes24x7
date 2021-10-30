@extends('workshop_admin.layout')
@section('title', 'Product Create')
@push('style')
<link rel="stylesheet" href="{{ asset('admin_template/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />
@endpush
@section('content')
    <div class="content-wrapper">
        <form method="POST" action="{{ route('workshop.assign_to_shop_submit') }}" enctype="multipart/form-data">
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
                                <label for="category_id">Category</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                  <option value="">Select Category</option>
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
                                    <option value="">Select Category First</option>
                                </select>
                            </div>
                            @error('model_id')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                                <label for="shop_id">Shop Name</label>
                                <select class="form-control" name="shop_id" required>
                                    <option value="">Select Shop</option>
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
                                <label for="bike_reg_date">Registration Date</label>
                                    <input type="date" class="form-control" id="bike_reg_date" name="bike_reg_date" value="{{ optional($works_done->bike_buy_requests)->bike_buy_reg_date }}" required>
                            </div>
                            @error('bike_reg_date')
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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group row">
                        <label for="bike_quantity">Quantity</label>
                        <input type="number" class="form-control" id="bike_quantity" name="bike_quantity" placeholder="Bike Quantity" value="{{ '1' }}" readonly>
                    </div>
                    @error('bike_quantity')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror

                    <div class="form-group row">
                        <label for="bike_new_price">Bike Price</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Rs.</span>
                          </div>
                          <input type="number" class="form-control" id="bike_new_price" name="bike_new_price" placeholder="Bike Price" value="{{ optional($works_done->bike_buy_requests)->bike_buy_agreed_bike_price + optional($works_done->workshop_works_cost)->bike_inspection_total_deductions }}" required>
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
                        <label for="bike_discount">Discount</label>
                        <input type="number" class="form-control" id="bike_discount" name="bike_discount" value="{{ old('bike_discount') }}" placeholder="Discount">
                    </div>
                    @error('bike_discount')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
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
                        <label for="bike_show_type">Show Type</label>
                        <select class="form-control" name="bike_show_type" id="bike_show_type">
                          <option value="normal">Normal</option>
                          <option value="top_selling">Top Selling</option>
                          <option value="new">New</option>
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
                    <div class="form-group row">
                        <label>Certificate (only .pdf)</label>
                        <input type="file" name="bike_certificate" class="file-upload-default" required>
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Certificate">
                            <div class="input-group-append">
                            <button class="file-upload-browse btn btn-info" type="button">Upload</button>                          
                            </div>
                        </div>
                    </div>
                    @error('bike_certificate')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group row">
                        <label>Image</label>
                        <input type="file" name="bike_image" class="file-upload-default" required>
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
                        <input type="file" name="bike_gallary[]" class="form-control-file" multiple required>
                        
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
               url:"{{ route('workshop.getmodels') }}?category_id="+categoryID,
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

       $('#bike_year').datepicker({
           format:'yyyy',
           viewMode: 'years',
           minViewMode: 'years'
       });

       $('#datepicker-popup').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
        });
    </script>
@endpush