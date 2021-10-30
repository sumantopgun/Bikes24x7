@extends('shop.layout')
@section('title', 'Bike Sold')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bike Sold</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$solds->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Customer Name</th>
                        <th>Bike Name</th>
                        <th>Payment Amount</th>
                        <th>Total Amount</th>
                        {{-- <th>Remaining Amount</th> --}}
                        <th>Final Payment Date</th>
                        <th>Bike Status</th>
                        <th>Actions</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solds as $sold)
                        <tr>                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sold->customer->user_first_name ?? 'N/A' }} {{ $sold->customer->user_last_name ?? '' }}</td>
                            <td>{{ $sold->bike_sells->bike_name ?? 'N/A' }}</td>
                            {{-- <td>Rs. {{ $sold->payments->payments_amount ?? 'N/A' }}</td> --}}
                            <td>
                                <?php $amount = 0; ?>
                                @foreach ($sold->payment as $item)
                                   <?php $amount += $item->payments_amount ; 
                                    $amount = 0+$amount;
                                   ?>
                                @endforeach
                                Rs. {{ $amount }}
                            </td>
                            <td>Rs. {{ $sold->total_amount ?? 'N/A' }}</td>
                            {{-- <td>Rs. {{ $sold->remaining_amount ?? 'N/A' }}</td> --}}
                            <td>
                                {{-- {{ $sold->appointments->appointments_date ?? 'N/A' }} & {{ $sold->appointments->appointments_time ?? '' }}                      --}}
                                @forelse($sold->payment->where('final_payment', 1) as $final)
                                    {{ $final->created_at ?? 'N/A' }}
                                @empty
                                    <p>N/A</p>
                                @endforelse
                            </td>
                            <td><div class="badge badge-success badge-fw">{{ $sold->bike_sells->bike_sell_status ?? 'N/A' }}</div></td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-outline-primary" href="{{route('shop.booking.show', $sold->id)}}">Details</a>
                                    <a button class="btn btn-success" href="{{route('shop.bike-sold-invoice', $sold->id)}}">Invoice</a>
                                </div>
                            </td>    
                            <td>
                                @if ($sold->booking_requests_uploaded_invoice)
                                    {{-- <i class="fa fa-download"></i> --}}
                                    <a href="{{ asset('storage/'.$sold->booking_requests_uploaded_invoice) }}" download>
                                        <i style="width: 100%;height: 27px;" class="fa fa-fw fa-download"></i>
                                      </a>
                                @else
                                    <button type="button" class="btn btn-primary btn-sm" onclick="invoiceUpload({{$sold->id}})">Upload Invoice</button>
                                @endif
                                
                            </td>                             
                        </tr>
                    @endforeach   
                </tbody>
                </table>                    
            </div>
            <!-- Modal Start -->
            <div class="modal fade" id="invoiceUploadId" tabindex="-1" role="dialog" aria-labelledby="invoiceUpload-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <form method="POST" class="forms-sample" action="{{ route('shop.bike-sold-invoice-upload') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                            <h5 class="modal-title" id="invoiceUpload-2">Invoice Upload</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <input class="form-control" type="hidden" name="booking_request_id" id="bookingId">  
                                
                                {{-- <label for="uploaded_invoice">Invoice</label> --}}
                                <input id="uploaded_invoice" class="form-control-file" type="file" name="uploaded_invoice">

                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Upload</button>
                            
                            </div>
                        {{-- </form> --}}
                      </div>
                    </div>
                  </div>
                  <!-- Modal Ends -->
            </div>
        </div>
        @else
            <p class="alert alert-info">No Products Sold Found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>
    <script>
        function invoiceUpload(id){
            $('#invoiceUploadId').modal('show');
            $('#bookingId').val(id);
        }
    </script>
@endpush