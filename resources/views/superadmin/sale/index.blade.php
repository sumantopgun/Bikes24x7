@extends('superadmin.layout')
@section('title', 'Bike entry for catalogue List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/css/bootstrap-toggle.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
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
        <h4 class="card-title" style="text-align: center;">Bike entry for catalogue List</h4>
        <a href="{{route('superadmin.sale.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Product</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$sales->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Bike Name</th>
                        <th>Model</th>
                        {{-- <th>Registration Date</th> --}}
                        <th>Bike Price</th>
                        <th>Sale Price</th>
                        <th>Image</th>
                        <th>Gallery</th>
                        <th>Catalogue Status</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->bike_name }}</td>
                            <td>{{ $sale->models->model_name }}</td>
                            {{-- <td>{{ $sale->bike_reg_date }}</td> --}}
                            <td>{{ $sale->bike_new_price }}</td>
                            <td>{{ $sale->bike_sell_price }}</td>
                            
                            <td>
                                <a href="{{asset('storage/'.$sale->bike_image)}}" target="blank"><img height="100" width="100" src="{{asset('storage/'.$sale->bike_image)}}" /></a>
                            </td>
                            <td>
                                <a button class="btn btn-primary" href="{{route('superadmin.gallaryedit', $sale->id)}}">Edit Gallery</a>
                            </td>
                            <td>
                                <input data-id="{{$sale->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable" {{ $sale->bike_catalogue_status ? 'checked' : '' }}>
                            </td>
                            <td>{{ $sale->bike_sell_status }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- <a button class="btn btn-outline-primary" href="#">View</a> --}}
                                    <a button class="btn btn-success" href="{{route('superadmin.sale.edit', $sale->id)}}">Edit</a>
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
            <p class="alert alert-info">No products found.....</p>
        @endif
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
              var bike_sells_id = $(this).data('id'); 
               
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: './bikeCatalogueStatus',
                  data: {'status': status, 'bike_sells_id': bike_sells_id},
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