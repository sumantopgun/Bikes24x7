@extends('customer.layout')
@section('title', 'My Profile')
@push('style')
  <style>
      span.changeusername {
        border: 2px #cab6e8 solid;
        padding: 5px;
      }
  </style>
@endpush

@section('content')
<div class="content-wrapper">
    <div class="row user-profile">
      <div class="col-lg-4 side-left d-flex align-items-stretch">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body avatar">
                <h4 class="card-title">Info</h4>
                <img src="@if($user->user_profile_pic==null){{asset('storage/profiles/dummy.jpg')}}@else{{asset('storage/'.$user->user_profile_pic)}}@endif" alt="">
                <p class="name">{{ $user->user_first_name.' '.$user->user_last_name }}</p>
                <p class="designation">-  {{ $user->user_type }}  -</p>
                <a class="d-block text-center text-dark" href="#">{{ $user->email }}</a>
                <a class="d-block text-center text-dark" href="#">{{ $user->phone }}</a>
                <br>
                @if ($errors->has('username'))
                  <div class="alert alert-success" role="alert">
                    {{ $errors->first('username') }}
                  </div>
                @endif
                @if (session('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
                <center>
                  <span class="changeusername">{{ $user->username ?? 'N/A' }}</span><br>
                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#usernamechange-2">@if($user->username) Change Username @else Add Username @endif</button>
                </center>
                <!-- Modal Start -->
                <div class="modal fade" id="usernamechange-2" tabindex="-1" role="dialog" aria-labelledby="usernamechange-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="usernamechange-2">Change Username</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="post" action="{{ route('customer.updateusername',$user->id) }}">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            <input id="username" class="form-control" type="text" name="username" placeholder="Enter username" required>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <!-- Modal Ends -->
              </div>
            </div>
          </div>
          <div class="col-12 stretch-card">
            <div class="card">
              <div class="card-body overview">
                
                {{-- <div class="wrapper about-user">
                  <h4 class="card-title mt-4 mb-3">About</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam consectetur ex quod.</p>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 side-right stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
              <h4 class="card-title mb-0">Details</h4>
              <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar">Avatar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Security</a>
                </li>
              </ul>
            </div>
            <div class="wrapper">
              <hr>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
                  
                  <form method="POST" action="{{route('customer.profile.update', $user->id)}}">
                    @csrf
                    @method("PUT")
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                      <label for="usesFirstName">First Name</label>
                      <input type="text" class="form-control" id="usesFirstName" name="user_first_name" required value="{{ $user->user_first_name }}" required>
                      @error('user_first_name')
                        <label class="error mt-2 text-danger">{{ $message }}</label>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="usesLastName">Last Name</label>
                        <input type="text" class="form-control" id="usesLastName" name="user_last_name" required value="{{ $user->user_last_name }}" required>
                        @error('user_last_name')
                            <label class="error mt-2 text-danger">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="userCity">City</label>
                      <input type="text" class="form-control" id="userCity" name="user_city" value="{{ $user->user_city }}">
                      @error('user_city')
                        <label class="error mt-2 text-danger">{{ $message }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="userLocality">Locality</label>
                        <input type="text" class="form-control" id="userLocality" name="user_locality" value="{{ $user->user_locality }}">
                        @error('user_locality')
                          <label class="error mt-2 text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userPincode">Pincode</label>
                        <input class="form-control" maxlength="6" name="user_pincode" id="userPincode" type="number" value="{{ $user->user_pincode }}">
                        @error('user_pincode')
                          <label class="error mt-2 text-danger">{{ $message }}</label>
                        @enderror
                    </div>
                    
                    
                    <div class="form-group mt-5">
                      <button type="submit" class="btn btn-success mr-2">Update</button>
                      
                    </div>
                  </form>
                </div><!-- tab content ends -->
                <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                  <div class="wrapper mb-5 mt-4">
                    <span class="badge badge-warning text-white">Note : </span>
                    <p class="d-inline ml-3 text-muted">Image size is limited to not greater than 1MB .</p>
                  </div>
                  <form method="POST" action="{{route('customer.updatepic',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input type="file" name="user_profile_pic" class="dropify" data-max-file-size="1mb" data-default-file="../../images/faces/face6.jpg"/>
                    @error('user_profile_pic')
                      <label class="error mt-2 text-danger">{{ $message }}</label><br>
                    @enderror
                    <div class="form-group mt-5">
                      <button type="submit" class="btn btn-success mr-2">Update</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                  <form id="form-change-password" role="form" method="POST" action="{{route('customer.changepassword')}}">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                      <label for="change-password">Change password</label>
                      <input type="password" class="form-control" id="current-password" name="current-password" required placeholder="Enter current password">
                    </div>
                    @if ($errors->has('current-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required placeholder="Re-enter Password">
                    </div>
                    <div class="form-group mt-5">
                      <button type="submit" class="btn btn-success mr-2">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection