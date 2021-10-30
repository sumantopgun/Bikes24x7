@extends('superadmin.layout')
@section('title', 'KM Deduction Rate Create')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <center><h4 class="card-title">Create KM Deduction Rate</h4></center>
                    
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.km-deduction-rate.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="km_deduction_km_from">Deduction KM From</label>
                            <input type="number" class="form-control" id="km_deduction_km_from" name="km_deduction_km_from" value="{{ old('km_deduction_km_from') }}" placeholder="Deduction KM From" required>
                        </div>
                        @error('km_deduction_km_from')
                            <label class="error text-danger">{{ $message }}</label> <br>
                        @enderror

                        <div class="form-group">
                            <label for="km_deduction_km_to">Deduction KM To</label>
                            <input type="number" class="form-control" id="km_deduction_km_to" name="km_deduction_km_to" value="{{ old('km_deduction_km_to') }}" placeholder="Deduction KM To" required>
                        </div>
                        @error('km_deduction_km_to')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="km_deduction_rate">Deduction Rate (%)</label>
                            <input type="text" class="form-control" id="km_deduction_rate" name="km_deduction_rate" value="{{ old('km_deduction_rate') }}" placeholder="Deduction Rate" required>
                        </div>
                        @error('km_deduction_rate')
                            <label class="error text-danger">{{ $message }}</label> <br>
                        @enderror
                        

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
