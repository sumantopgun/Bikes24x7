@extends('superadmin.layout')
@section('title', 'City Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit City</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.city.update', $city->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="city_name">City</label>
                            <input type="text" class="form-control" id="city_name" name="city_name" value="{{ $city->city_name }}" required>
                        </div>
                        @error('city_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="city_state">State</label>
                            <input type="text" class="form-control" id="city_state" name="city_state" value="{{ $city->city_state }}" required>
                        </div>
                        @error('city_state')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
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