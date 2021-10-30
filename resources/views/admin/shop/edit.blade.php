@extends('admin.layout')
@section('title', 'Showroom Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Showroom</h4>
                    <form method="POST" class="forms-sample" action="{{ route('admin.shop.update', $shop->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="shop_name">Showroom Name</label>
                            <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Showroom Name" value="{{ $shop->shop_name }}" required>
                        </div>
                        @error('shop_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="shop_location">Location</label>
                            {{-- <input type="text" class="form-control" id="shop_location" name="shop_location" value="{{ $shop->shop_location }}" placeholder="Location" required> --}}
                            <textarea class="form-control" required id="shop_location" name="shop_location" rows="3">{{ $shop->shop_location }}</textarea>
                        </div>
                        @error('shop_location')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="contact_no">Contact No</label>
                            <input type="number" class="form-control" id="contact_no" name="contact_no" value="{{ $shop->contact_no }}" placeholder="Contact No" required>
                        </div>
                        @error('contact_no')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        
                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select class="form-control" name="city_id" required>
                              <option value="">Select City</option>
                                @if (!$cities->isEmpty())
                                    @foreach ($cities as $city)
                                        @if($shop->city_id==$city->id)
                                            <option selected value="{{$city->id}}">{{$city->city_name}}</option>
                                        @elseif($shop->city_id!==$city->id)
                                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                                        @endif
                                    @endforeach                
                                @endif
                            </select>
                        </div>
                        @error('city_id')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        {{-- <div class="form-group">
                            <label for="shop_type">Shop Type</label>
                            <select class="form-control" name="shop_type" required>
                              <option value="">Shop Type</option>
                              <option value="showrooms" {{ $shop->shop_type=='showrooms' ? 'selected' : ''}}>Showrooms</option>
                              <option value="workshop" {{ $shop->shop_type=='workshop' ? 'selected' : ''}}>Workshop</option>
                              <option value="collection_points" {{ $shop->shop_type=='collection_points' ? 'selected' : ''}}>Collection Points</option>
                            </select>
                        </div>
                        @error('shop_type')
                            <label class="error text-danger">{{ $message }}</label><br>
                        @enderror --}}

                        <button type="submit" class="btn btn-success mr-2">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
