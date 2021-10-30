@extends('admin.layout')
@section('title', 'Brand List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Brand List</h4>

        <form class="form-inline" method="POST" action="{{route('admin.importSalesCsv')}}" enctype="multipart/form-data">
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

        <a href="{{route('admin.categories.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Brand</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$categories->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Name</th>
                        <th>Description</th>
                        {{-- <th>image</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            {{-- <td><a href="{{asset('storage/'.$category->category_image)}}" target="blank"><img height="100" width="100" src="{{asset('storage/'.$category->category_image)}}" /></a></td> --}}
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- <a button class="btn btn-outline-primary" href="{{route('admin.categories.show', $category->id)}}">View</a> --}}
                                    <a button class="btn btn-success" href="{{route('admin.categories.edit', $category->id)}}">Edit</a>
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
            <p class="alert alert-info">No Brand Found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>

@endpush