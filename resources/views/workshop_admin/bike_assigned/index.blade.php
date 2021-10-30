@extends('workshop_admin.layout')
@section('title', 'Bike Assigned List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Bike Assigned List</h4><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$assigned->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Bike Name</th>
                            <th>Registration No.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assigned as $assign)
                            <tr>                       
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ optional($assign->bike_details)->brand_name.' '.optional($assign->bike_details)->model_name.' '.optional($assign->bike_details)->model_cc.' '.optional($assign->bike_details)->bike_year }}</td>

                                <td>{{ $assign->bike_buy_requests->bike_buy_reg_no ?? 'N/A' }}</td>
                                    
                                <td><button type="button" class="btn btn-primary btn-sm" onclick="isReceived({{$assign->id}})">Bike is Received</button></td>                            
                            </tr>
                        @endforeach   
                    </tbody>
                </table>                    
            </div>

            <!-- Modal Start -->
            <div class="modal fade" id="bikeReceivedId" tabindex="-1" role="dialog" aria-labelledby="bikeReceivedId-2" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST" class="forms-sample" action="{{ route('workshop.bike-assigned.store') }}">
                        @csrf
                        <div class="modal-header">
                        <h5 class="modal-title" id="bikeReceivedId-2">Bike is Received</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <input class="form-control" type="text" name="workshop_work_assign_id" id="workshop_work_assign_id" hidden>

                        <div class="form-group">
                            <select class="form-control" name="is_bike_received" id="is_bike_received" required>
                                <option value="">Please Select *</option>
                                <option value="Yes">Yes</option>
                                {{-- <option value="No">No</option> --}}
                            </select>
                        </div>
                        @error('is_bike_received')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- Modal Ends -->
           
            </div>
        </div>
        @else
            <p class="alert alert-info">No assigned list found.....</p>
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
        function isReceived(id){
            $('#workshop_work_assign_id').val(id);
            $('#bikeReceivedId').modal('show');
        }
    </script>
@endpush