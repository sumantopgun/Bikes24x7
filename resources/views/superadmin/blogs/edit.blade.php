@extends('superadmin.layout')
@section('title', 'Edit Blog')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Blog</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="blog_title">Title</label>
                            <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{ $blog->blog_title }}" required>
                        </div>
                        @error('blog_title')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" required id="description" name="description" rows="3">{{ $blog->description }}</textarea>
                        </div>
                        @error('description')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        <div class="form-group">
                            <label>Image</label>
                            <a target="blank" href="{{asset('storage/'.$blog->image)}}"><img height="100" width="100" style="float:right; border-radius:50%;" src="{{asset('storage/'.$blog->image)}}" /></a>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <div class="input-group-append">
                                <button class="file-upload-browse btn btn-info" type="button">Upload</button>                          
                                </div>
                            </div>
                        </div>
                        @error('image')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror
                        <button type="submit" class="btn btn-success mr-2">Update</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin_template/js/file-upload.js')}}"></script>
@endpush