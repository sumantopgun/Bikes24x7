@extends('admin.layout')
@section('title', 'Insurance Deduction Rate Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <center><h4 class="card-title">Edit Insurance Deduction Rate</h4></center>
                    
                    <form method="POST" class="forms-sample" action="{{ route('admin.insurance-deduction-rate.update', $DeductionRate->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="insurance_deduction_cc_from">Deduction CC From</label>
                            <input type="number" class="form-control" id="insurance_deduction_cc_from" name="insurance_deduction_cc_from" value="{{ $DeductionRate->insurance_deduction_cc_from }}" placeholder="Deduction CC From" required>
                        </div>
                        @error('insurance_deduction_cc_from')
                            <label class="error text-danger">{{ $message }}</label> <br>
                        @enderror
                        

                        <div class="form-group">
                            <label for="insurance_deduction_cc_to">Deduction CC To</label>
                            <input type="number" class="form-control" id="insurance_deduction_cc_to" name="insurance_deduction_cc_to" value="{{ $DeductionRate->insurance_deduction_cc_to }}" placeholder="Deduction CC To" required>
                        </div>
                        @error('insurance_deduction_cc_to')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="insurance_deduction_rate">Deduction Rate</label>
                            <input type="text" class="form-control" id="insurance_deduction_rate" name="insurance_deduction_rate" value="{{ $DeductionRate->insurance_deduction_rate }}" placeholder="Deduction Rate" required>
                        </div>
                        @error('insurance_deduction_rate')
                            <label class="error text-danger">{{ $message }}</label> <br>
                        @enderror

                        <button type="submit" class="btn btn-success mr-2">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
