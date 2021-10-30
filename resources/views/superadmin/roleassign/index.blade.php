@extends('superadmin.layout')
@section('title','Role Assign')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/css/bootstrap-toggle.min.css')}}">
    <style>
        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        label.btn.btn-danger.active.toggle-off, label.btn.btn-success.toggle-on {
            padding: 9px;
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Role Assign</h4>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @error('user_type')
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @enderror
        @error('shop_id')
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @enderror
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No.</th>                        
                        <th>Status</th>
                        <th>Role</th>
                        <th>Role Assign</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->user_first_name.' '.$role->user_last_name }}</td>
                            <td>{{ $role->email }}</td>
                            <td>{{ $role->phone }}</td>
                            <td>
                                <input data-id="{{$role->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $role->user_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @if ($role->user_type =='default')
                                    {{'N/A'}}
                                @elseif($role->user_type =='admin')
                                    {{'Admin'}}
                                @elseif($role->user_type =='bike_customer_care')
                                    {{'Sales Customer Care'}}
                                @elseif($role->user_type =='shop')
                                    {{'Online Sales admin'}}
                                @elseif($role->user_type =='shop_seller')
                                    {{'Walkin Sales admin'}}
                                @elseif($role->user_type =='RTO_admin')
                                    {{'RTO Agent'}}
                                @elseif($role->user_type =='rto_customer_care')
                                    {{'RTO Customer Care'}}
                                @elseif($role->user_type =='collection_point')
                                    {{'Collection Point'}}
                                @elseif($role->user_type =='bike_buy_customer_care')
                                    {{'Procurement Customer Care'}}
                                @elseif($role->user_type =='workshop_admin')
                                    {{'Workshop Admin'}}
                                @elseif($role->user_type =='workshop_main')
                                    {{'City admin'}}
                                @elseif($role->user_type =='bike_fees_entry')
                                    {{'BVC Database Entry'}}
                                @endif
                                {{-- {{ $role->user_type =='default' ? 'N/A' : $role->user_type }} --}}
                            </td>
                            {{-- <td><a button class="btn btn-success" href="{{route('superadmin.admin.show', $role->id)}}">Assign</a></td> --}}
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="roleAssign({{$role->id}})">Assign</button></td>
                            
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-success" href="{{route('superadmin.admin.show', $role->id)}}">Details</a>
                                </div> 
                            </td> 
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>

            <!-- Modal Start -->
            <div class="modal fade" id="assignRoleId" tabindex="-1" role="dialog" aria-labelledby="assignRoleId-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.assignrole') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="assignRoleId-2">Role Assign</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="hidden" name="userid" id="userid">
                        <div class="form-group">
                          <select class="form-control" name="user_type" id="userTypeFind" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="bike_customer_care">Sales Customer Care</option>
                            <option value="rto_customer_care">Customer Care for RTO</option>
                            <option value="shop">Online Sales admin</option>
                            <option value="shop_seller">Walkin Sales admin</option>
                            <option value="RTO_admin">RTO Agent</option>
                            <option value="collection_point">Collection Point Admin</option>
                            <option value="bike_buy_customer_care">Procurement Customer Care</option>
                            <option value="workshop_admin">Workshop Admin</option>
                            <option value="workshop_main">City Admin</option>
                            <option value="bike_fees_entry">BVC Database Entry</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="shop_id" id="shopSelectedShow">
                                {{-- <option value="">Select Shop</option>
                                @if (!$shops->isEmpty())
                                    @foreach ($shops->where('shop_type','showrooms') as $shop)
                                        <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                    @endforeach                
                                @endif --}}
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="user_city_assigned" id="user_city_assignedSelectedShow">
                                <option value="">Select City Admin City</option>
                                @if (!$citys->isEmpty())
                                    @foreach ($citys as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}, {{$city->city_state}}</option>
                                    @endforeach                
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="rto_office_id" id="rtoOfficeSelectedShow">
                                <option value="">Select RTO Office</option>
                                @if (!$rtoOffices->isEmpty())
                                    @foreach ($rtoOffices as $office)
                                        <option value="{{$office->id}}">{{$office->rto_office_name}}</option>
                                    @endforeach                
                                @endif
                            </select>
                        </div>

                        
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
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>

    <!-- Sweetalert-->    
    <script src="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/jquery.avgrund/jquery.avgrund.min.js')}}"></script>
    <script src="{{ asset('admin_template/js/alerts.js')}}"></script>
    <script src="{{ asset('admin_template/js/avgrund.js')}}"></script>
    <!-- End Sweetalert-->
    <script src="{{ asset('admin_template/js/bootstrap-toggle.min.js')}}"></script>
    <script>
        
        $(document).ready(function(){
            $('#shopSelectedShow').hide();
            $('#rtoOfficeSelectedShow').hide();
            $('#user_city_assignedSelectedShow').hide();
        });
//         $('#email_alerts').DataTable( {

// "scrollCollapse": true,
// "paging":         true,
// "fnDrawCallback": function() {
//     jQuery('.toggle-class').bootstrapToggle();
// }

// } );
    </script>
    <script>
            $(function() {
              $('.toggle-class').change(function() {
                  var status = $(this).prop('checked') == true ? 1 : 0; 
                  var user_id = $(this).data('id'); 
                   
                  $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: './adminChangeStatus',
                      data: {'status': status, 'user_id': user_id},
                      success: function(data){
                        console.log(data.success)
                        swal(
                            'Good job!',
                            data.success,
                            'success'
                        )
                      }
                  });
              })
            })
    </script>
    <script>
        function roleAssign(id){
            // alert(id);
            $('#assignRoleId').modal('show');
            $('#userid').val(id);
        }
        
        $("#userTypeFind").change(function(){
            var usertype = $('[name="user_type"]').val();
            if(usertype=='shop' || usertype=='shop_seller'){
                $("#shopSelectedShow").empty();
                $("#shopSelectedShow").append('<option value="">Select showroom</option>');
                $("#shopSelectedShow").append('@if (!$shops->isEmpty()) @foreach ($shops->where("shop_type","showrooms") as $shop) <option value="{{$shop->id}}">{{ $shop->shop_name}} , {{ $shop->shop_location }}</option> @endforeach @endif');

                $('#shopSelectedShow').prop('required',true);
                $('#shopSelectedShow').show();
            }else if(usertype=='collection_point'){
                $("#shopSelectedShow").empty();
                $("#shopSelectedShow").append('<option value="">Select Collection Point</option>');
                $("#shopSelectedShow").append('@if (!$shops->isEmpty()) @foreach ($shops->where("shop_type","collection_points") as $item) <option value="{{$item->id}}">{{ $item->shop_name }}  , {{ $item->shop_location }}</option> @endforeach @endif');

                $('#shopSelectedShow').prop('required',true);
                $('#shopSelectedShow').show();
            }else if(usertype=='workshop_admin'){
                $("#shopSelectedShow").empty();
                $("#shopSelectedShow").append('<option value="">Select Workshop</option>');
                $("#shopSelectedShow").append('@if (!$shops->isEmpty()) @foreach ($shops->where("shop_type","workshop") as $workshop) <option value="{{$workshop->id}}">{{ $workshop->shop_name }} , {{ $workshop->shop_location }}</option> @endforeach @endif');

                $('#shopSelectedShow').prop('required',true);
                $('#shopSelectedShow').show();
            }else{
                $('#shopSelectedShow').prop('required',false);
                $('#shopSelectedShow').hide();
            }
        });

        $("#userTypeFind").change(function(){
            var usertype = $('[name="user_type"]').val();
            if(usertype=='RTO_admin'){
                $('#rtoOfficeSelectedShow').prop('required',true);
                $('#rtoOfficeSelectedShow').show();
            }else{
                $('#rtoOfficeSelectedShow').prop('required',false);
                $('#rtoOfficeSelectedShow').hide();
            }
        });

        $("#userTypeFind").change(function(){
            var usertype = $('[name="user_type"]').val();
            if(usertype=='workshop_main'){
                $('#user_city_assignedSelectedShow').prop('required',true);
                $('#user_city_assignedSelectedShow').show();
            }else{
                $('#user_city_assignedSelectedShow').prop('required',false);
                $('#user_city_assignedSelectedShow').hide();
            }
        });

    </script>
    
@endpush



