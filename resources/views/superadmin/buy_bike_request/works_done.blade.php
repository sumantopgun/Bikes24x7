@extends('superadmin.layout')
@section('title', 'Work Done List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Work Done List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$works_done->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Registration No.</th>
                            <th>Customer Buying Cost</th>
                            <th>Working Cost</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($works_done as $work)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($work->bike_details)->brand_name.' '.optional($work->bike_details)->model_name.' '.optional($work->bike_details)->model_cc.' '.optional($work->bike_details)->bike_year }}</td>

                                <td>{{ $work->bike_buy_requests->bike_buy_reg_no ?? 'N/A' }}</td>
                                <td>Rs. {{ $work->bike_buy_requests->bike_buy_agreed_bike_price ?? 'N/A' }}</td>
                                <td>Rs. {{ $work->workshop_works_cost->bike_inspection_total_deductions ?? 'N/A' }}</td>
                                    
                                <td><a href="{{ route('superadmin.assign_to_shop', $work->id ) }}" type="button" class="btn btn-primary btn-sm" >Assign to Showroom</a> 
                                <a href="{{ route('superadmin.bike_works_done_details', $work->id ) }}" type="button" class="btn btn-info btn-sm">Working Details</a></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>

            <!-- Modal Start -->
            {{-- <div class="modal fade" id="workshopToShopId" tabindex="-1" role="dialog" aria-labelledby="workshopToShopId-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.bike_assign_to_workshop') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="workshopToShopId-2">Assign Workshop to Shop</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="text" name="workshop_assign_bike_buy_id" id="workshop_assign_bike_buy_id" hidden>

                        <div class="form-group">
                            <select class="form-control" name="showroom_city" id="showroom_city" required>
                            <option value="">Select City *</option>
                                @if (!$showrooms->isEmpty())
                                    @foreach ($showrooms->unique('city_id') as $city)
                                        <option value="{{$city->city_id}}">{{ $city->city->city_name }}</option>
                                    @endforeach                
                                @endif
                            </select>
                        </div>
                        @error('showroom_city')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <select class="form-control" name="workshop_to_shop_assign_id" id="workshop_to_shop_assign_id" required>
                            <option value="">Select Showroom *</option>
                            </select>
                        </div>
                        @error('workshop_to_shop_assign_id')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id" required>
                            <option value="">Select Category *</option>
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

                        <div class="form-group">
                            <label for="model_id">Model & CC</label>
                            <select class="form-control" name="model_id" id="model_id" required>
                                <option value="">Select Category First</option>
                            </select>
                        </div>
                        @error('model_id')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        
                        </div>
                    </form>
                    </div>
                </div>
            </div> --}}
            <!-- Modal Ends -->
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No work done list found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>

    {{-- <script>
        let showrooms_location = [];
        function filter_rows_by_showroom_city(showrooms, city_id) {
            var temp_showrooms_location = [];
            for(const showroom of showrooms) {
                if(showroom.city_id == city_id) {
                    temp_showrooms_location.push({
                        id: showroom.id,
                        name: showroom.shop_name,
                        location: showroom.shop_location
                    });
                }
            }
            showrooms_location.length = 0;
            showrooms_location = temp_showrooms_location;
        }

        $(function(){
            var showrooms = @json($showrooms);
            // console.log(workshops);
            $("#showroom_city").change(function(){
                var city_id = $("#showroom_city").val();
                filter_rows_by_showroom_city(showrooms, city_id);
                console.log(showrooms_location);

                $("#workshop_to_shop_assign_id").empty().append('<option selected="selected" value="">Select showroom *</option>');
                
                $.each(showrooms_location, function(index, value) {
                    $("#workshop_to_shop_assign_id").append('<option value="'+value.id+'">'+value.name+' , '+value.location+'</option>');
                });
            });
        });
        
    </script>

    <script>
        function workshopToShop(id){
            $('#workshop_assign_bike_buy_id').val(id);
            $('#workshopToShopId').modal('show');
        }

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
    </script> --}}
@endpush