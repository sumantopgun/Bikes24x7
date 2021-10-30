@extends('seller.layout')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
  <div class="row grid-margin">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Welcome {{ Auth::user()->user_first_name.' '.Auth::user()->user_last_name }}</h3>
        </div>
      </div>
    </div>
  </div>
  
</div>

@endsection