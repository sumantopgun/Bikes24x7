@extends('superadmin.layout')
@section('title', __($title ?: 'Not Found'))
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
        <h4 class="card-title" style="text-align: center;">{{ $title }}</h4>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
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
                        <th>RTO Office Name</th>
                        <th>Office Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $admin->user_first_name.' '.$admin->user_last_name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                            <td>{{ $admin->rtoOffice->rto_office_name ?? 'N/A' }}</td>
                            <td>{{ $admin->rtoOffice->rto_office_location ?? 'N/A' }}</td>
                            <td>
                                <input data-id="{{$admin->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $admin->user_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-outline-primary" href="{{route('superadmin.admin.show', $admin->id)}}">View</a>
                                    <a button class="btn btn-success" href="{{route('superadmin.admin.edit', $admin->id)}}">Edit</a>
                                </div> 
                            </td> 
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
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
    
@endpush



