@extends('superadmin.layout')
@section('title', 'Rto Fees Create')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Create RTO Fees</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.rto-fees.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="rto_fees_application_name">Application Name</label>
                            <input type="text" class="form-control" id="rto_fees_application_name" name="rto_fees_application_name" value="{{ old('rto_fees_application_name') }}" placeholder="Application Name" required>
                        </div>
                        @error('rto_fees_application_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="rto_fees_application_type">Application Type</label>
                            <input type="text" class="form-control" id="rto_fees_application_type" name="rto_fees_application_type" value="{{ old('rto_fees_application_type') }}" placeholder="Application Type" required>
                        </div>
                        @error('rto_fees_application_type')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="rto_fees_vehicle_type">Vehicle Type</label>
                            <select class="form-control" name="rto_fees_vehicle_type" required>
                                <option value="">Vehicle Type</option>
                                <option value="two_wheelers">Two Wheelers</option>
                                <option value="four_wheelers">Four Wheelers</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                        @error('rto_fees_vehicle_type')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        
                        <div class="form-group">
                            <label for="rto_fees_amount">Fees Amount</label>
                            <input type="number" class="form-control" id="rto_fees_amount" name="rto_fees_amount" value="{{ old('rto_fees_amount') }}" placeholder="Fees Amount" required>
                        </div>
                        @error('rto_fees_amount')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label class="container_radio" style="display: inline-block; margin-right: 15px;">Within State
                                <input type="radio" name="rto_fees_within_state" checked value="1">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container_radio" style="display: inline-block;">Out of State
                                <input type="radio" name="rto_fees_within_state" value="0">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        @error('rto_fees_within_state')
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
