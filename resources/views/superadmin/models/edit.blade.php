@extends('superadmin.layout')
@section('title', 'Model Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Model</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.models.update', $model->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="model_name">Model</label>
                            <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Model" value="{{ $model->model_name }}" required>
                        </div>
                        @error('model_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="model_cc">CC</label>
                            <input type="text" class="form-control" id="model_cc" name="model_cc" placeholder="CC" value="{{ $model->model_cc }}" required>
                        </div>
                        @error('model_cc')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="model_type">Bike Type</label>
                            <select class="form-control" name="model_type" required>
                                <option value="">Bike Type</option>
                                <option value="Motorcycle" {{ $model->model_type=='Motorcycle' ? 'selected' : ''}}>Motorcycle</option>
                                <option value="Scooter" {{ $model->model_type=='Scooter' ? 'selected' : ''}}>Scooter</option>
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
                                    @foreach ($categories as $cate)
                                        @if($model->category_id==$cate->id)
                                            <option selected value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @elseif($model->category_id!==$cate->id)
                                            <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                        @endif
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