@extends('superadmin.layout')
@section('title', 'Owner Deduction Rate Create')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <center><h4 class="card-title">Create Owner Deduction Rate</h4></center>
                    
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.owner-deduction-rate.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="owner_deduction_owner_no">No Of Owners</label>
                            <select class="form-control" name="owner_deduction_owner_no" required>
                              <option value="">No Of Owners</option>
                              <option value="First">First</option>
                              <option value="Second">Second</option>
                              <option value="Third">Third</option>
                              <option value="Fourth">Fourth</option>
                              <option value="Fifth">Fifth</option>
                              <option value="Others">Others</option>
                            </select>
                        </div>
                        @error('owner_deduction_owner_no')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror

                        <div class="form-group">
                            <label for="owner_deduction_rate">Deduction Rate</label>
                            <input type="text" class="form-control" id="owner_deduction_rate" name="owner_deduction_rate" value="{{ old('owner_deduction_rate') }}" placeholder="Deduction Rate" required>
                        </div>
                        @error('owner_deduction_rate')
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
