@extends('admin.layout')
@section('title', 'Rto Document Create')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Create Rto Document</h4>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form method="POST" class="forms-sample" action="{{ route('admin.rto-document.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="rto_document_services_name" value="{{ 'rc_transfer' }}">

                        <div class="form-group">
                            <label for="rto_document_file_name">Document Name</label>
                            <input type="text" class="form-control" id="rto_document_file_name" name="rto_document_file_name" placeholder="Document Name" value="{{ old('rto_document_file_name') }}" required>
                        </div>
                        @error('rto_document_file_name')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        
                        <div class="form-group">
                            <label for="rto_document_file">Document</label>
                            <input type="file" class="form-control" id="rto_document_file" name="rto_document_file" required>
                        </div>
                        @error('rto_document_file')
                            <label class="error text-danger">{{ $message }}</label>
                        @enderror
                        

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
