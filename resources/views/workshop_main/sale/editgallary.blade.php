@extends('workshop_main.layout')
@section('title', 'Bike Sales List')
@push('style')
    
    <style>
        @media only screen and (max-width:992px){
            .lightGallery .image-tile img {
                max-width: 100% !important;
                width: 100% !important;
            }
        }
        .lightGallery .image-tile img {
            /* max-width: 100%; */
            width: 200px;
            height: 200px;
        }        
        
    </style>
    
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row grid-margin">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <center>
                <h4 class="card-title">{{ $sell->bike_name }}</h4>
                <p class="card-text">
                    Product Gallery
                </p><hr>
            </center>
            @if ($gallaryimg==[Null])
                <div class="alert alert-success" role="alert">
                    <h4>Image not found</h4>
                </div>
            @else
                <div id="lightgallery" class="row lightGallery">
                
                    @foreach ($gallaryimg as $image)
                        <span>
                            <a href="{{ asset('storage/salegallary/'.$image) }}" class="image-tile"><img src="{{ asset('storage/salegallary/'.$image) }}" alt="image"></a><br>
                            <center>
                                <a href="{!! route('workshop_main.deleteimage', [$sell->id,$image]) !!}" class='btn btn-default btn-xs btn-outline-primary' onclick="return confirm('Are you sure?')">Delete</a>
                            </center>
                            
                        </span>
                        
                        
                    @endforeach
                </div>
            @endif
            <center><br>
                <a href="{{ route('workshop_main.sale.index') }}" type="button" class="btn btn-success mr-2">Back</a>
            </center>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    {{-- <script src="{{ asset('admin_template/node_modules/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{ asset('admin_template/js/light-gallery.js')}}"></script> --}}

@endpush