@extends('admin.layout')
@section('title', 'Banner Edit')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/jquery-asColorPicker/dist/css/asColorPicker.min.css')}}" />
    
    <link rel="stylesheet" href="{{ asset('admin_template/css/style.css')}}">
    <style>
        .note-btn-group.btn-group.note-insert {
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Banner</h4>
                    <form method="POST" class="forms-sample" action="{{ route('admin.banner.update', $banner->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="banner_text">Banner Text</label>
                            <textarea class="form-control" id="banner_texteditor" name="banner_text" rows="3">{{ $banner->banner_text }}</textarea>
                        </div>
                        @error('banner_text')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror    
                        
                        <div class="form-group">
                            <label for="button_text">Button Text</label>
                            <input type="text" maxlength="50" class="form-control" name="button_text" value="{{ $banner->button_text }}">
                        </div>
                        @error('button_text')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="btn_link">Button Link</label>
                            <input type="text" maxlength="50" class="form-control" name="btn_link" value="{{ $banner->btn_link }}">
                        </div>
                        @error('btn_link')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="button_text_color">Button Text Color</label>
                            <input type="text" maxlength="15" class="form-control color-picker" name="button_text_color" value="{{ $banner->button_text_color }}">
                        </div>
                        @error('button_text_color')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="button_bg_color">Button Background Color</label>
                            <input type="text" maxlength="15" class="form-control color-picker" name="button_bg_color" value="{{ $banner->button_bg_color }}">
                        </div>
                        @error('button_bg_color')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="priority">Priority</label>
                            <input type="number" class="form-control" name="priority" value="{{ $banner->priority }}">
                        </div>
                        @error('priority')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="position">Position</label>
                            <select class="form-control" name="position">
                                <option value="left" {{ $banner->position=='left' ? 'selected' : ''}}>Left</option>
                                <option value="right" {{ $banner->position=='right' ? 'selected' : ''}}>Right</option>
                                <option value="center" {{ $banner->position=='center' ? 'selected' : ''}}>Center</option>
                            </select>
                        </div>
                        @error('position')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="img" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Banner Image">
                                <div class="input-group-append">
                                <button class="file-upload-browse btn btn-info" type="button">Upload</button>                          
                                </div>
                            </div>
                        </div>
                        @error('img')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror
                        <a target="blank" href="{{asset('storage/'.$banner->img)}}"><img height="100" width="auto" style="float:right;" src="{{asset('storage/'.$banner->img)}}" /></a>

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
    <script src="{{ asset('admin_template/node_modules/summernote/dist/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
    <script src="{{ asset('admin_template/js/formpickers.js')}}"></script>
    <script>
        /*Summernote editor*/    
        $('#banner_texteditor').summernote({
            height: 200,
            tabsize: 2
        });   

    </script>
@endpush