@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/index.css') }}" rel="stylesheet">
<link href="{{ url('css/article.css') }}" rel="stylesheet">
@endpush

@section('content')


@include('frontend.includes.search')

<div class="container index" style="margin-top: 2rem;">
    <div class="row">
        <div class="col-12">
            <p><a href="{{url('/')}}" class="text-decoration-none text-dark fw-bold">Property Market Live</a>
                >
                <a href="{{route('frontend.homeloan',$category->id)}}" class="text-decoration-none text-dark fw-bold">
                    {{$category->name}}
                </a>

                > <a class="text-decoration-none text-dark fw-bold">Article</a>
                > <a class="text-decoration-none text-dark fw-bold">{{$post_details->title}}</a>
            </p>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 2rem;">
    <div class="row">
        <div class="col-8 col-xs-12 col-tab-12 article-main-area">
            @if($post_details->feature_image != null)
                <img src="{{ uploaded_asset($post_details->feature_image) }}" alt="">
            @endif
            <h1>{{$post_details->title}}</h1>
            <p class="article-date-time">{{ $post_details->created_at->format('M d Y') }}</p>
            
            <p>{!!$post_details->article!!}</p>

        </div>
        <div class="col-4 col-xs-12 col-tab-12">
            <div class="most-viewed-wrapper">
                <h2 class="side-title">Most Viewed</h2>
                <ul class="most-viewed">
                    <li><i class="fas fa-play"></i>
                    <span class="most-viewed-txt">
                    Before You Move In to Your New Home
                    </span></li>
                    <li><i class="fas fa-play"></i>
                    <span class="most-viewed-txt">
                    Interior Designing Guide lines
                    </span>
                    </li>
                    <li><i class="fas fa-play"></i>
                    <span class="most-viewed-txt">
                    The operation of the house’s components.
                    </span>
                </li>
                    <li><i class="fas fa-play"></i>
                    <span class="most-viewed-txt">Maintenance Responsibilities</span></li>
                    <li><i class="fas fa-play"></i>  <span class="most-viewed-txt">Before You Move In to Your New Home</span></li>
                </ul>
            </div>

            <div class="trending-wrapper">
                <h2 class="side-title">Trending Now</h2>

                @if(count($trending_posts) == 0)                
                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'Posts Not Found',
                        'not_found_description' => null,
                        'not_found_button_caption' => null
                    ])
                @else
                    @foreach($trending_posts as $trending)
                        <a href="{{route('frontend.article',$trending->id)}}" style="text-decoration:none;color:#000;">
                            <div class="trending-card">
                                <img src="{{ uploaded_asset($trending->feature_image) }}" alt="">
                                <div class="trending-card-txt-wrapper">
                                    <div class="txt-inner-wrapper">
                                        <h3 style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{$trending->title}}</h3>
                                        <p class="trending-card-date-time">{{ $trending->created_at->format('M d Y') }}</p>
                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{$trending->description}}</p>
                                    </div>
                                    <button type="button" class="trending-more-btn">Read More<i class="fas fa-chevron-circle-right"></i></button>
                                </div>
                            </div>
                        </a>                
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>




@endsection

@push('after-scripts')




<!-- youtube script -->
<script>
$(document).ready(function() {

    // if($latest_post->type == null) {
    //     let post_type = null;
    // } else {
    //    
    // }

    //Main post showing
    // if(post_type != 'youtube') {
    //     $('.article').removeClass('d-none');
    // } else {
    //     $('.video').removeClass('d-none');
    // }


    //righside - article click
    $('.right .article').on('click', function() {

        $('.center .video').addClass('d-none');
        $('.center .article').removeClass('d-none');
        let vid = $('.center .video iframe').attr('src');
        $('.center .video iframe').attr('src', vid);
        let image = $(this).find('img').attr('src');
        $(".main-image").attr("src", image);
        let title = $(this).find('h6').text();
        $(".title").text(title);
        let description = $(this).find('.paragraph').text();
        $(".description div").text(description);


    });

    // oe7eVN2azBo

    //rightside - video click
    $('.right .video').on('click', function() {
        $('.center .video').removeClass('d-none');
        $('.center .article').addClass('d-none');
        let link = $(this).find('.video-value').val();
        let video = 'https://www.youtube.com/embed/' + link;
        $('.center .video iframe').attr('src', video);
        let title = $(this).find('h6').text();
        $(".title").text(title);
        let description = $(this).find('.paragraph').text();
        $(".description div").text(description);


    });
});
</script>



@endpush