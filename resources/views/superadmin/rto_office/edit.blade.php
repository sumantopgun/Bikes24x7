@extends('superadmin.layout')
@section('title', 'Rto office Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Rto office</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.rto-office.update', $rtoOffice->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="rto_office_name">Rto office Name</label>
                            <input type="text" class="form-control" id="rto_office_name" name="rto_office_name" placeholder="Rto office Name" value="{{ $rtoOffice->rto_office_name }}" required>
                        </div>
                        @error('rto_office_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="rto_office_location">Location</label>
                            <textarea class="form-control" required id="rto_office_location" name="rto_office_location" rows="3">{{ $rtoOffice->rto_office_location }}</textarea>
                        </div>
                        @error('rto_office_location')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="rto_contact_no">Contact No</label>
                            <input type="number" class="form-control" id="rto_contact_no" name="rto_contact_no" value="{{ $rtoOffice->rto_contact_no }}" placeholder="Contact No" required>
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
                                        @if($rtoOffice->city_id==$city->id)
                                            <option selected value="{{$city->id}}">{{$city->city_name}}</option>
                                        @elseif($rtoOffice->city_id!==$city->id)
                                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                                        @endif
                                    @endforeach                
                                @endif
                            </select>
                        </div>
                        @error('city_id')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <button type="submit" class="btn btn-success mr-2">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
