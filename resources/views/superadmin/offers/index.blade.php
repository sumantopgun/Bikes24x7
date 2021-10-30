@extends('superadmin.layout')
@section('title', 'Offer List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/css/bootstrap-toggle.min.css')}}">
    <style>
        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        label.btn.btn-danger.active.toggle-off, label.btn.btn-success.toggle-on {
            padding: 9px;
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Offer List</h4>
        <a href="{{route('superadmin.offers.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New Offer</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$offers->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id #</th>
                        <th>Offer Name</th>
                        <th>Offer Type</th>
                        <th>Amount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $offer->offer_name }}</td>
                            <td>{{ $offer->offer_type }}</td>
                            <td>{{ $offer->offer_amount }}</td>
                            <td>{{ $offer->offer_start_date ?? 'N/A' }}</td>
                            <td>{{ $offer->offer_end_date ?? 'N/A' }}</td>
                            <td>
                                <input data-id="{{$offer->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $offer->offer_active ? 'checked' : '' }}>
                            </td>                                 
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            </div>
        </div>
        @else
            <p class="alert alert-info">No Offer Found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>

    <script src="{{ asset('admin_template/js/bootstrap-toggle.min.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script>
            $(function() {
              $('.toggle-class').change(function() {
                  var status = $(this).prop('checked') == true ? 1 : 0; 
                  var offer_id = $(this).data('id'); 
                   
                  $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: './offerStatus',
                      data: {'status': status, 'offer_id': offer_id},
                      success: function(data){
                        console.log(data.success)
                        swal(
                            'Good job!',
                            data.success,
                            'success'
                        )
                      }
                  });
              })
            })
    </script>

@endpush