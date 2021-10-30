@extends('superadmin.layout')
@section('title', 'Booking Refund Done List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <style>
        .hidden{
            display: none;
        }
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            background: url({{ asset('frontend/svg/126.gif')}}) 
        50% 50% no-repeat rgb(249,249,249);
        }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Booking Refund Done List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        
        @if(!$refunds->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Bike Name</th>
                        <th>Shop Name</th>
                        <th>Refunded Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($refunds as $refund)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $refund->customer->user_first_name ?? 'N/A' }} {{ $refund->customer->user_last_name ?? '' }}</td>
                            <td>{{ $refund->bike_sells->bike_name ?? 'N/A' }}</td>
                            <td>{{ $refund->shopName->shop_name ?? 'N/A' }}</td>
                            <td>Rs. {{ $refund->refund_amount ?? 'N/A' }}</td>
                            <td><div class="btn-group" role="group" aria-label="Basic example">
                                
                                {{-- @if (optional($refund->refundDone)->refund_reference_id)
                                    <button type="button" class="btn btn-danger btn-sm" onclick="refundStatus({{ $refund->id }})">Refund Status</button>
                                @endif --}}
                                <a button class="btn btn-success" href="{{route('superadmin.refunddetails', $refund->id)}}">Details</a>
                            </div></td>                          
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            <div class="loader hidden"><img src="{{ asset('frontend/svg/126.gif')}}"></div>
            {{-- refund status model --}}
                <div class="modal fade" id="refundStatusModel" tabindex="-1" role="dialog" aria-labelledby="refundStatusModel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="refundStatusModel-2">Refund Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center><h4 id="refundStatusApi"></h4></center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                {{-- end refund status model --}}
            </div>
        </div>
        @else
            <p class="alert alert-info">Refund done list not found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>
  
    {{-- <script>
        function refundStatus(id){
            var token = $('[name="_token"]').val();
            // alert(token);
            $.ajax({
                type:'GET',
                data:{
                _token:token,
                refund_id:id,
                },
                url: './refund-status',
                beforeSend: function () { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                    $('.loader').removeClass('hidden');
                },
                success: function(result){
                    $('.loader').addClass('hidden');
                    $('#refundStatusModel').modal('show');
                    $('#refundStatusApi').text(result.success);       
                }
            });
        }
    </script> --}}

@endpush