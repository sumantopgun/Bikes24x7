@extends('workshop_main.layout')
@section('title', 'Edit Brand')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Brand</h4>
                    <form method="POST" class="forms-sample" action="{{ route('workshop_main.categories.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="category_name">Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}" required>
                        </div>
                        @error('category_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="category_description">Description</label>
                            <textarea class="form-control" required id="category_description" name="category_description" rows="3">{{ $category->category_description }}</textarea>
                        </div>
                        @error('category_description')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        {{-- <div class="form-group">
                            <label>Image</label>
                            <a target="blank" href="{{asset('storage/'.$category->category_image)}}"><img height="100" width="100" style="float:right; border-radius:50%;" src="{{asset('storage/'.$category->category_image)}}" /></a>
                            <input type="file" name="category_image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <div class="input-group-append">
                                <button class="file-upload-browse btn btn-info" type="button">Upload</button>                          
                                </div>
                            </div>
                        </div>
                        @error('category_image')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror --}}
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