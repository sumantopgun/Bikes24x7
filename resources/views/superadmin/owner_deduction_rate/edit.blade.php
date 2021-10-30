@extends('superadmin.layout')
@section('title', 'Owner Deduction Rate Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <center><h4 class="card-title">Edit Owner Deduction Rate</h4></center>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.owner-deduction-rate.update', $DeductionRate->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="owner_deduction_owner_no">No Of Owners</label>
                            <input type="text" class="form-control" id="owner_deduction_owner_no" name="owner_deduction_owner_no" placeholder="No Of Owners" value="{{ $DeductionRate->owner_deduction_owner_no }}" readonly>
                        </div>
                        @error('owner_deduction_owner_no')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        

                        <div class="form-group">
                            <label for="owner_deduction_rate">Deduction Rate</label>
                            <input type="number" class="form-control" id="owner_deduction_rate" name="owner_deduction_rate" value="{{ $DeductionRate->owner_deduction_rate }}" placeholder="Deduction Rate" required>
                        </div>
                        @error('owner_deduction_rate')
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
