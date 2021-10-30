@extends('admin.layout')
{{-- @extends( $layout ) --}}
@section('title', 'Blog List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Blog List</h4>
        <a href="{{route('admin.blogs.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Blog</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$blogs->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->blog_title }}</td>
                            <td>{{ Str::limit($blog->description, 100) }}</td>
                            <td><a href="{{asset('storage/'.$blog->image)}}" target="blank"><img height="100" width="100" src="{{asset('storage/'.$blog->image)}}" /></a></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- <a button class="btn btn-outline-primary" href="{{route('admin.categories.show', $blog->id)}}">View</a> --}}
                                    <a button class="btn btn-success" href="{{route('admin.blogs.edit', $blog->id)}}">Edit</a>
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
            <p class="alert alert-info">No Blogs Found.....</p>
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