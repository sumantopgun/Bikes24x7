@extends('superadmin.layout')
@section('title', 'Banner List')
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
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-size: 14px !important;
        }

    </style>
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Banner List</h4>
        <a href="{{route('superadmin.banner.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Banner</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$banners->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Banner Text</th>
                        <th>Priority</th>
                        <th>image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $banner->banner_text !!}</td>
                            <td>{{ $banner->priority }}</td>
                            <td><a href="{{asset('storage/'.$banner->img)}}" target="blank"><img height="100" width="100" src="{{asset('storage/'.$banner->img)}}" /></a></td>
                            <td>
                                <input data-id="{{$banner->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $banner->status ? 'checked' : '' }}>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-outline-primary" href="#">View</a>
                                    <a button class="btn btn-success" href="{{route('superadmin.banner.edit', $banner->id)}}">Edit</a>
                                </div> 
                            </td>                                   
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">No Banner Found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>
    <script src="{{ asset('admin_template/js/bootstrap-toggle.min.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>

    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var banner_id = $(this).data('id'); 
                
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: './bannerChangeStatus',
                    data: {'status': status, 'banner_id': banner_id},
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