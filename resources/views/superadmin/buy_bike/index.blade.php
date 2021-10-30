@extends('superadmin.layout')
@section('title', 'BVC Bike Base Prices')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">BVC Bike Base Prices</h4>

        <form class="form-inline" method="POST" action="{{route('superadmin.importcsv')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
              <input type="file" class="form-control" name="import_csv" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Import CSV</button>
        </form>
        <span class="text-warning">*Upload only CSV file</span>
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif

        <a href="{{route('superadmin.buy-bikes.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Fees</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$bikes->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Brand Name</th>
                        <th>Model Name</th>
                        <th>CC</th>
                        <th>Year</th>
                        <th>Bike Type</th>
                        <th>Base Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bikes as $bike)
                        <tr id="{{$bike->id}}">                 
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bike->brand_name }}</td>
                            <td>{{ $bike->model_name }}</td>
                            <td>{{ $bike->model_cc }}</td>
                            <td>{{ $bike->bike_year }}</td>
                            <td>{{ $bike->bike_type }}</td>
                            <td>Rs. {{ $bike->base_price }}</td>  
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- <a button class="btn btn-outline-primary" href="#">View</a> --}}
                                    <a button class="btn btn-success" href="{{route('superadmin.buy-bikes.edit', $bike->id)}}">Edit</a>
                                    {{-- <a button class="btn btn-danger" href="{{route('superadmin.buy-bikes.edit', $bike->id)}}">Delete</a> --}}
                                    <button type="button" class="btn btn-danger btn-sm" onclick="feeDelete({{$bike->id}})">Delete</button>
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
            <p class="alert alert-info">No Fees Found.....</p>
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
    <!-- End Sweetalert-->
    <script>
        function feeDelete(id){
            // alert(id);
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it! '
            }).then(function () {
                $.ajax({
                    type:'delete',
                    url: './delete/'+id,
                    data:{
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data){
                    console.log(data)
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        $("#"+id+"").remove();
                    },
                    error: function (data) {
                        swal({
                            title: 'Opps...',
                            text: 'Not found',
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });            
            })
        }
    </script>

@endpush