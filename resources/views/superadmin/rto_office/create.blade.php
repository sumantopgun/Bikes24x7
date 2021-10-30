@extends('superadmin.layout')
@section('title', 'Rto office Create')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Create Rto office</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.rto-office.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="rto_office_name">Rto office Name</label>
                            <input type="text" class="form-control" id="rto_office_name" name="rto_office_name" placeholder="Rto office Name" value="{{ old('rto_office_name') }}" required>
                        </div>
                        @error('rto_office_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="rto_office_location">Location</label>
                            <textarea class="form-control" required id="rto_office_location" name="rto_office_location" rows="3">{{ old('rto_office_location') }}</textarea>
                        </div>
                        @error('rto_office_location')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        <div class="form-group">
                            <label for="rto_contact_no">Contact No</label>
                            <input type="number" class="form-control" id="rto_contact_no" name="rto_contact_no" value="{{ old('rto_contact_no') }}" placeholder="Contact No" required>
                        </div>
                        @error('rto_contact_no')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        
                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select class="form-control" name="city_id" required>
                              <option value="">Select City</option>
                                @if (!$cities->isEmpty())
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                    @endforeach                
                                @endif
                            </select>
                        </div>
                        @error('city_id')
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
