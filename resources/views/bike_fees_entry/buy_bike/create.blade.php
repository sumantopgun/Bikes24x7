@extends('bike_fees_entry.layout')
@section('title', 'Create BVC Base Values')
@push('style')
<link rel="stylesheet" href="{{ asset('admin_template/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <center>
                        <h4 class="card-title">Create BVC Base Values</h4>
                    </center>
                    <form method="POST" class="forms-sample" action="{{ route('bike_fees_entry.bike-fees-entry.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand Name" value="{{ old('brand_name') }}" required>
                        </div>
                        @error('brand_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        <div class="form-group">
                            <label for="model_name">Model Name</label>
                            <input type="text" class="form-control" id="model_name" name="model_name" placeholder="Model Name" value="{{ old('model_name') }}" required>
                        </div>
                        @error('model')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="model_cc">Model CC</label>
                            <input type="text" class="form-control" id="model_cc" name="model_cc" placeholder="Model CC" value="{{ old('model_cc') }}" required>
                        </div>
                        @error('model_cc')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group row">
                            <label for="bike_year">Bike Year</label>
                            <input type="text" class="form-control" id="bike_year" name="bike_year" placeholder="Bike Year" value="{{ old('bike_year') }}" required>
                        </div>
                        @error('bike_year')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        {{-- <div class="form-group">
                            <label for="bike_type">Bike Type</label>
                            <select class="form-control" name="bike_type" required>
                              <option value="">Bike Type</option>
                              <option value="Bike">Bike</option>
                              <option value="Scooty">Scooty</option>
                            </select>
                        </div> --}}
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Bike Type</label>
                          <div class="col-sm-4">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="bike_type" id="bike_type1" value="Motorcycle" required>
                                Motorcycle
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="bike_type" id="bike_type2" value="Scooter" required>
                                Scooter
                              <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                        @error('bike_type')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="base_price">Bike Base Price</label>
                            <input type="number" class="form-control" id="base_price" name="base_price" placeholder="Base Price" value="{{ old('base_price') }}" required>
                        </div>
                        @error('base_price')
                            <label class="error text-danger">{{ $message }}</label>
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
    <script src="{{ asset('admin_template/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    {{-- <script>
        $('#bike_year').datepicker({
           format:'yyyy',
           viewMode: 'years',
           minViewMode: 'years'
       });
    </script> --}}
    <script>
        $(document).ready(function () {
            var currentDate = new Date();
            $('#bike_year').datepicker({
                format: 'yyyy',
                viewMode: 'years',
                minViewMode: 'years',
                autoclose:true,
                endDate: "currentDate",
                maxDate: currentDate
            }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });
            $('#bike_year').keyup(function () {
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9^-]/g, '');
                }
            });
        });
    </script>
@endpush