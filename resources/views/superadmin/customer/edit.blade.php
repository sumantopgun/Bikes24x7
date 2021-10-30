@extends('superadmin.layout')
@section('title', 'Customer Edit')
@section('content')
    <div class="content-wrapper">
        <form method="POST" action="{{route('superadmin.customer.update',$customer->id)}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Image</h4>
                        <a href="@if($customer->user_profile_pic==null){{asset('storage/profiles/dummy.jpg')}}@else{{asset('storage/'.$customer->user_profile_pic)}}@endif"><img src="@if($customer->user_profile_pic==null){{asset('storage/profiles/dummy.jpg')}}@else{{asset('storage/'.$customer->user_profile_pic)}}@endif" height="200" width="200" alt=""></a>
                    </div>
                </div>
                </div>
                <div class="col-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-title">Secure Information</h4>
                            <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" disabled name="email" value="{{ $customer->email }}">
                            </div>
                            </div>
                            @error('email')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                            <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone No.</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone" id="phone" disabled value="{{ $customer->phone }}">
                            </div>
                            </div>
                            @error('phone')
                                <label class="error text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Basic Information</h4>
                <div class="forms-sample">
                    <div class="form-group">
                    <label for="exampleInputName1q1">First Name</label>
                    <input type="text" class="form-control" id="exampleInputNa1me1" name="user_first_name" value="{{ $customer->user_first_name }}">
                    </div>
                    @error('user_first_name')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group">
                    <label for="exampleInputNamqqde11">Last Name</label>
                    <input type="text" class="form-control" id="exampleInput2Name1" name="user_last_name" value="{{ $customer->user_last_name }}">
                    </div>
                    @error('user_last_name')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group">
                    <label for="exampleInputEmail3">City</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" name="user_city" value="{{ $customer->user_city }}">
                    </div>
                    @error('user_city')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group">
                        <label for="Locality">Locality</label>
                        <input type="text" class="form-control" id="Locality" name="user_locality" value="{{ $customer->user_locality }}">
                    </div>
                    @error('user_locality')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group">
                        <label for="Pincode">Pincode</label>
                        <input type="number" class="form-control" id="Pincode" name="user_pincode" value="{{ $customer->user_pincode }}">
                    </div>
                    @error('user_pincode')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group">
                        <label for="Country">Country</label>
                        <input type="text" class="form-control" id="Country" name="user_country" disabled value="{{ $customer->user_country}}">
                    </div>
                    @error('user_country')
                        <label class="error text-danger">{{ $message }}</label>
                    @enderror
                    <div class="form-group">
                        <label for="my-input">Image</label>
                        <input id="my-input" class="form-control-file" type="file" name="user_profile_pic">
                    </div>
                    @error('user_profile_pic')
                        <label class="error text-danger">{{ $message }}</label><br>
                    @enderror
                </div>
            </div>
        </div>
        </div>
        <div class="form-group">
           <center><button type="submit" class="btn btn-success mr-2">Update</button></center> 
        </div>
    </div>
    </form>
    </div>
@endsection