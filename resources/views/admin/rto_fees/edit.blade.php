@extends('admin.layout')
@section('title', 'Rto Fees Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit RTO Fees</h4>
                    <form method="POST" class="forms-sample" action="{{ route('admin.rto-fees.update', $rtoFees->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="rto_fees_application_name">Application Name</label>
                            <input type="text" class="form-control" id="rto_fees_application_name" name="rto_fees_application_name" placeholder="Application Name" value="{{ $rtoFees->rto_fees_application_name }}" required>
                        </div>
                        @error('rto_fees_application_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        {{-- <div class="form-group">
                            <label for="rto_fees_application_type">Application Type</label>
                            <input type="text" class="form-control" id="rto_fees_application_type" name="rto_fees_application_type" placeholder="Application Type" value="{{ $rtoFees->rto_fees_application_type }}" required>
                        </div>
                        @error('rto_fees_application_type')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror --}}

                        {{-- <div class="form-group">
                            <label for="rto_fees_vehicle_type">Vehicle Type</label>
                            <select class="form-control" name="rto_fees_vehicle_type" required>
                                <option value="">Vehicle Type</option>
                                <option value="two_wheelers" {{ $rtoFees->rto_fees_vehicle_type=='two_wheelers' ? 'selected' : ''}}>Two Wheelers</option>
                                <option value="four_wheelers" {{ $rtoFees->rto_fees_vehicle_type=='four_wheelers' ? 'selected' : ''}}>Four Wheelers</option>
                                <option value="both" {{ $rtoFees->rto_fees_vehicle_type=='both' ? 'selected' : ''}}>Both</option>
                            </select>
                        </div>
                        @error('rto_fees_vehicle_type')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror --}}

                        <div class="form-group">
                            <label for="rto_fees_amount">Fees Amount</label>
                            <input type="number" class="form-control" id="rto_fees_amount" name="rto_fees_amount" value="{{ $rtoFees->rto_fees_amount }}" placeholder="Fees Amount" required>
                        </div>
                        @error('rto_fees_amount')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        {{-- <div class="form-group">
                            <label class="container_radio" style="display: inline-block; margin-right: 15px;">Within State
                                <input type="radio" name="rto_fees_within_state" {{ $rtoFees->rto_fees_within_state=='1' ? 'checked' : ''}} value="1">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container_radio" style="display: inline-block;">Out of State
                                <input type="radio" name="rto_fees_within_state" {{ $rtoFees->rto_fees_within_state=='0' ? 'checked' : ''}} value="0">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        @error('rto_fees_within_state')
                            <label class="error text-danger">{{ $message }}</label> <br>
                        @enderror --}}

                        <button type="submit" class="btn btn-success mr-2">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
