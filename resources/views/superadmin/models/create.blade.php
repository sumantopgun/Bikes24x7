@extends('superadmin.layout')
@section('title', 'Model Create')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Create Model</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.models.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="model_name">Model</label>
                            <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Model" value="{{ old('model_name') }}" required>
                        </div>
                        @error('model_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="model_cc">CC</label>
                            <input type="text" class="form-control" id="model_cc" name="model_cc" placeholder="CC" value="{{ old('model_cc') }}" required>
                        </div>
                        @error('model_cc')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="model_type">Bike Type</label>
                            <select class="form-control" name="model_type" required>
                              <option value="">Bike Type</option>
                              <option value="Motorcycle">Motorcycle</option>
                              <option value="Scooter">Scooter</option>
                            </select>
                        </div>
                        @error('model_type')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        <div class="form-group">
                            <label for="category_id">Brand Name</label>
                            <select class="form-control" name="category_id" required>
                              <option value="">Brand Name</option>
                                @if (!$categories->isEmpty())
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach                
                                @endif
                            </select>
                        </div>
                        @error('category_id')
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