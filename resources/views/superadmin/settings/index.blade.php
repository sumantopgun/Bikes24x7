@extends('superadmin.layout')
@section('title', 'Setting List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <style>
        img.display_logo {
            height: 100px;
            width: 100px;
            border: 1px solid;
            padding: 1px;
            box-shadow: 1px 2px #17c5c0;
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Setting List</h4>
        {{-- <a href="{{route('superadmin.settings.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Setting</a><br><br> --}}
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$settings->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Setting Name</th>
                        <th>Setting Value</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $setting->display_name }}</td>
                            <td>
                                @if ($setting->setting_name == 'header_logo')
                                    <a href="{{asset('storage/'.$setting->setting_value)}}" target="blank"><img class="display_logo" src="{{asset('storage/'.$setting->setting_value)}}" /></a>
                                @elseif ($setting->setting_name == 'footer_logo') 
                                    <a href="{{asset('storage/'.$setting->setting_value)}}" target="blank"><img class="display_logo" src="{{asset('storage/'.$setting->setting_value)}}" /></a>
                                @else
                                    {{ $setting->setting_value }}
                                @endif                                
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-success" href="{{route('superadmin.settings.edit', $setting->id)}}">Edit</a>
                                </div> 
                            </td>                                   
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">No setting found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>

@endpush