@extends('frontend.layout')
@section('title', 'News')
@section('meta_desc', 'News')
@push('style') 
    <link rel="stylesheet" href="{{ asset('frontend/css/newupdates.css')}}" type="text/css">
@endpush
@section('content')
<section class="newupdates_sec">
    <div class="newupdates_top2_sec">
        <div class="container">
            <div class="newupdates_header">
                <i class="fa fa-minus" aria-hidden="true" style="font-size: 20px;"></i>
                <i class="fa fa-minus" aria-hidden="true" style="font-size: 20px; margin-left: -4px;"></i>
                <span>  News Updates  </span>
                <i class="fa fa-minus" aria-hidden="true" style="font-size: 20px;"></i>
                <i class="fa fa-minus" aria-hidden="true" style="font-size: 20px; margin-left: -4px;"></i>
            </div>
            @if ($news)
                <div class="newupdates_slider_sec">
                    <div id="carousel-news-update" class="carousel-news-update owl-carousel owl-theme" >
                    <!-- Wrapper for slides -->
                        <?php $count = 0; ?>
                        @foreach ($news as $blog)
                        <?php if($count == 4) break; ?>
                            <div class="item">
                                <div class="col-item">
                                    <div class="row col-md-12">
                                        <div class="col-md-6 news_img_sec">
                                            <img src="{{ asset('storage/'.$blog->image) }}" class="img-responsive')}}" alt="a" />
                                        </div>
                                        <div class="col-md-6 news_text_sec">
                                            <h3>{{ $blog->blog_title }}</h3>
                                            <div class="info_news clearfix">
                                                <p>{{ Str::limit($blog->description, 200) }}
                                                </p>
                                            </div>
                                            <p><span class="author">By {{ $blog->user->user_first_name }} {{ $blog->user->user_last_name }}</span>
                                            <span class="date pull-right">{{ $blog->created_at->format('d/m/Y') }}</span></p>  
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        <?php $count++; ?>
                            
                        @endforeach
                    </div>
                </div>

                <div class="new_update_gallery_sec">
                    @foreach ($news->chunk(3) as $chunk)
                        <div class="new_update_gallery_1st_sec col-md-12">
                            @foreach ($chunk as $item)
                                <div class="col-md-4">
                                    <div class="newgallery1">
                                        <img src="{{ asset('storage/'.$item->image) }}"/>
                                        <h3>{{ $blog->blog_title }}</h3>
                                        <p class="newgallery_desc">{{ Str::limit($blog->description, 200) }}
                                        </p>
                                        <p><span class="newgallery_bottom_1sttext">By {{ $blog->user->user_first_name }} {{ $blog->user->user_last_name }}</span>
                                        <span class="newgallery_bottom_2ndtext">{{ $blog->created_at->format('d/m/Y') }}</span></p> 
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="new_updates_bottom_sec">
        <div class="new_updates_bottomgap__sec">
        </div>
    </div>
</section>
@endsection

@push('scripts')
    
@endpush