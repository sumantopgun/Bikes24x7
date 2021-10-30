@extends('superadmin.layout')
@section('title', 'Edit Setting')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Setting</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.settings.update', $setting->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="display_name">Setting Name</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" maxlength="100" value="{{ $setting->display_name }}" required>
                        </div>
                        @error('display_name')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror
                        
                        @if ($setting->setting_name == 'header_logo')
                            <div class="form-group">
                                <label>Header Logo</label>
                                <input type="file" name="header_logo" class="file-upload-default" required="">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Header Logo">
                                    <div class="input-group-append">
                                    <button class="file-upload-browse btn btn-info" type="button">Upload</button>                          
                                    </div>
                                </div>
                            </div>
                        @elseif ($setting->setting_name == 'footer_logo')
                            <div class="form-group">
                                <label>Footer Logo</label>
                                <input type="file" name="footer_logo" class="file-upload-default" required="">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Footer Logo">
                                    <div class="input-group-append">
                                    <button class="file-upload-browse btn btn-info" type="button">Upload</button>                          
                                    </div>
                                </div>
                            </div>
                        @elseif($setting->setting_name == 'bike_age_deduction_rate')
                            <div class="form-group">
                                <label for="bike_age_deduction_rate">Setting Value</label>
                                <input type="text" class="form-control" id="bike_age_deduction_rate" name="bike_age_deduction_rate" value="{{ $setting->setting_value }}" required>
                            </div>
                        @elseif($setting->setting_name == 'bike_age_deduction_time')
                            <div class="form-group">
                                <label for="bike_age_deduction_time">Setting Value</label>
                                <input type="text" class="form-control" id="bike_age_deduction_time" name="bike_age_deduction_time" value="{{ $setting->setting_value }}" required>
                            </div>
                        @endif                        
                        
                        @error('bike_age_deduction_rate')
                            <label class="error text-danger">{{ $message }}</label> <br>
                        @enderror
                        @error('bike_age_deduction_time')
                            <label class="error text-danger">{{ $message }}</label> <br>
                        @enderror

                        @error('header_logo')
                            <label class="error text-danger">{{ $message }}</label> <br>
                        @enderror

                        @error('footer_logo')
                            <label class="error text-danger">{{ $message }}</label> <br>
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