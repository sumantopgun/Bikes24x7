@extends('workshop_main.layout')
@section('title', 'Customer View')
@section('content')
    <div class="content-wrapper">
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
                                <input type="email" class="form-control" id="exampleInputEmail2" disabled value="{{ $customer->email }}">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" disabled value="{{ $customer->phone }}">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Basic Information</h4>
                <form class="forms-sample">
                    <div class="form-group">
                    <label for="exampleInputName1">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" disabled value="{{ $customer->user_first_name.' '.$customer->user_last_name }}">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail3">City</label>
                    <input type="text" class="form-control" id="exampleInputEmail3" disabled value="{{ $customer->user_city ?? "N/A"}}">
                    </div>
                    <div class="form-group">
                        <label for="Locality">Locality</label>
                        <input type="text" class="form-control" id="Locality" disabled value="{{ $customer->user_locality ?? "N/A"}}">
                    </div>
                    <div class="form-group">
                        <label for="Pincode">Pincode</label>
                        <input type="text" class="form-control" id="Pincode" disabled value="{{ $customer->user_pincode ?? "N/A"}}">
                    </div>
                    <div class="form-group">
                        <label for="Country">Country</label>
                        <input type="text" class="form-control" id="Country" disabled value="{{ $customer->user_country ?? "N/A"}}">
                    </div>
                    <div class="form-group">
                        <label for="user_type">Role</label>
                        <input type="text" class="form-control" id="user_type" disabled value="{{ $customer->user_type}}">
                    </div>
                    <div class="form-group">
                        <label for="user_updated_by">Updated By</label>
                        <input type="text" class="form-control" id="user_updated_by" disabled value="@if($updatedByName){{ $updatedByName->user_first_name.' '.$updatedByName->user_last_name }}@else{{ 'N/A' }}@endif">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection