@extends('admin.layout')
@section('title', 'Rto Document List')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin_template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.css')}}">
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title" style="text-align: center;">RTO Document List</h4>
        <a href="{{route('admin.rto-document.create')}}" type="button" class="btn btn-primary btn-fw" style="float:right;">Add New RTO Document</a><br><br>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if(!$rtoDocs->isEmpty())
        <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table id="orderlisting" class="table">
                <thead>
                    <tr>
                        <th>SL No #</th>
                        <th>Document Name</th>
                        <th>Document</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rtoDocs as $rtoDoc)
                        <tr id="{{$rtoDoc->id}}">                       
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rtoDoc->rto_document_file_name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{asset('storage/'.$rtoDoc->rto_document_file ?? '#')}}"><img src="{{ asset('frontend/images/form-icon.png')}}"/></a>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a button class="btn btn-success" href="{{route('admin.rto-document.edit', $rtoDoc->id)}}">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="docDelete({{$rtoDoc->id}})">Delete</button>
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
            <p class="alert alert-info">No RTO Document found.....</p>
        @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('admin_template/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin_template/js/data-table.js')}}"></script>
    <!-- Sweetalert-->    
    <script src="{{ asset('admin_template/node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('admin_template/node_modules/jquery.avgrund/jquery.avgrund.min.js')}}"></script>
    <!-- End Sweetalert-->
    <script>
        function docDelete(id){
            // alert(id);
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it! '
            }).then(function () {
                $.ajax({
                    type:'delete',
                    url: './doc-delete/'+id,
                    data:{
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data){
                    console.log(data)
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        $("#"+id+"").remove();
                    },
                    error: function (data) {
                        swal({
                            title: 'Opps...',
                            text: 'Not found',
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });            
            })
        }
    </script>
@endpush