@extends('superadmin.layout')
@section('title', 'Rto Document Edit')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Rto Document</h4>
                    <form method="POST" class="forms-sample" action="{{ route('superadmin.rto-document.update', $rtoDoc->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="rto_document_services_name" value="{{ $rtoDoc->rto_document_services_name ?? '' }}">
                        <div class="form-group">
                            <label for="rto_document_file_name">Document Name</label>
                            <input type="text" class="form-control" id="rto_document_file_name" name="rto_document_file_name" placeholder="Document Name" value="{{ $rtoDoc->rto_document_file_name ?? '' }}" required>
                        </div>
                        @error('rto_document_file_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label for="rto_document_file">Document</label>
                            <input type="file" class="form-control" id="rto_document_file" name="rto_document_file">
                        </div>
                        @error('rto_document_file')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror

                        <button type="submit" class="btn btn-success mr-2">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
