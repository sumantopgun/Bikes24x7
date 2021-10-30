@extends('superadmin.layout')
@section('title', 'Bike Buyed List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bike assign to workshop</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$paidBike->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Registration Number</th>
                            <th>Buying Price</th>
                            <th>Total Amount Paid</th>
                            <th>Buying Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paidBike as $buyed)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($buyed->sell_bike_details)->brand_name.' '.optional($buyed->sell_bike_details)->model_name.' '.optional($buyed->sell_bike_details)->model_cc.' '.optional($buyed->sell_bike_details)->bike_year }}</td>
                                
                                <td>{{ $buyed->bike_buy_reg_no ?? 'N/A' }}</td>

                                <td>Rs. {{ $buyed->bike_buy_agreed_bike_price ?? 'N/A' }}</td>
                                
                                <td>Rs. {{ $buyed->tatal_amount_paid ?? 'N/A' }}</td>

                                <td>@if($buyed->bike_buy_request_status == 'requested') {{ 'Requested' }} @elseif($buyed->bike_buy_request_status == 'inspected') {{ 'Bike Inspected' }} @elseif($buyed->bike_buy_request_status == 'doc_found') {{ 'Documents Found' }} @elseif($buyed->bike_buy_request_status == 'account_details_requested') {{ 'Account Details Submitted' }} @elseif($buyed->bike_buy_request_status == 'advance_paid') {{ 'Advance Paid' }} @elseif($buyed->bike_buy_request_status == 'paid') {{ 'Paid' }} @endif</td>
                                    
                                <td><button type="button" class="btn btn-primary btn-sm" onclick="workshopAssign({{$buyed->id}})">Assign to Workshop</button></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>

            <!-- Modal Start -->
            <div class="modal fade" id="workshopAssignId" tabindex="-1" role="dialog" aria-labelledby="workshopAssignId-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.bike_assign_to_workshop') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="workshopAssignId-2">Assign to Workshop</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="text" name="workshop_assign_bike_buy_id" id="workshop_assign_bike_buy_id" hidden>

                        <div class="form-group">
                            <select class="form-control" name="workshop_city" id="workshop_city" required>
                            <option value="">Select City *</option>
                                @if (!$workshops->isEmpty())
                                    @foreach ($workshops->unique('city_id') as $city)
                                        <option value="{{$city->city_id}}">{{ $city->city->city_name }}</option>
                                    @endforeach                
                                @endif
                            </select>
                        </div>
                        @error('workshop_city')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <select class="form-control" name="workshop_assign_workshop_id" id="workshop_assign_workshop_id" required>
                            <option value="">Select Workshop *</option>
                            </select>
                        </div>
                        @error('workshop_assign_workshop_id')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- Modal Ends -->
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No bike assign to workshop list found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>
    <script>
        let workshops_location = [];
        function filter_rows_by_workshop_city(workshops, city_id) {
            var temp_workshops_location = [];
            for(const workshop of workshops) {
                if(workshop.city_id == city_id) {
                    temp_workshops_location.push({
                        id: workshop.id,
                        name: workshop.shop_name,
                        location: workshop.shop_location
                    });
                }
            }
            workshops_location.length = 0;
            workshops_location = temp_workshops_location;
        }

        $(function(){
            var workshops = @json($workshops);
            // console.log(workshops);
            $("#workshop_city").change(function(){
                var city_id = $("#workshop_city").val();
                filter_rows_by_workshop_city(workshops, city_id);
                console.log(workshops_location);

                $("#workshop_assign_workshop_id").empty().append('<option selected="selected" value="">Select workshop *</option>');
                
                $.each(workshops_location, function(index, value) {
                    $("#workshop_assign_workshop_id").append('<option value="'+value.id+'">'+value.name+' , '+value.location+'</option>');
                });
            });
        });
        
    </script>
    <script>
        function workshopAssign(id){
            $('#workshop_assign_bike_buy_id').val(id);
            $('#workshopAssignId').modal('show');
        }
    </script>
@endpush