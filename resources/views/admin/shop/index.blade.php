@extends('admin.layout')
@section('title', 'Showroom List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Showroom List</h4>
        <a href="{{route('admin.shop.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Showroom</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$shops->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Showroom Id</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Contact No</th>
                        <th>City</th>
                        {{-- <th>Type</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $shop->id ?? 'N/A' }}</td>
                            <td>{{ $shop->shop_name ?? 'N/A' }}</td>
                            <td>{{ $shop->shop_location ?? 'N/A'}}</td>
                            <td>{{ $shop->contact_no ?? 'N/A' }}</td>
                            <td>{{ $shop->city->city_name ?? 'N/A' }}</td>
                            {{-- <td>{{ $shop->shop_type ?? 'N/A' }}</td> --}}
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-success" href="{{route('admin.shop.edit', $shop->id)}}">Edit</a>
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
            <p class="alert alert-info">No Showroom Found.....</p>
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