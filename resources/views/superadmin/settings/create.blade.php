@extends('superadmin.layout')
@section('title', 'Setting Create')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Create Setting</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.settings.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="display_name">Display Name</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Display Name" value="{{ old('display_name')}}" required>
                        </div>
                        @error('display_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="setting_name">Setting Name</label>
                            <input type="text" class="form-control" id="setting_name" name="setting_name" placeholder="Setting Name" value="{{ old('setting_name')}}" required>
                        </div>
                        @error('setting_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="setting_value">Setting Value</label>
                            <input type="text" class="form-control" id="setting_value" name="setting_value" placeholder="Setting Value" value="{{ old('setting_value')}}" required>
                        </div>
                        @error('setting_value')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        {{-- <div class="form-group">
                            <label>Image</label>
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
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
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