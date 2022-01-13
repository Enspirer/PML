@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/index.css') }}" rel="stylesheet">
<link href="{{ url('css/post-ad.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="container post-ad-container">
    <div class="row">
        <div class="col-4 col-xs-12 ad-card">
            <div class="ad-card-wrapper">
                <img class="ad-main-img" src="{{ url('img/frontend/post-ad/post-ad1.png') }}" alt="">
                <div class="overlay"></div>
                <div class="btn-wrapper">
                    <div class="ad-card-btn">
                        <a href="{{ route('frontend.pre_listing') }}">Free Property Listing</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-xs-12 ad-card">
            <div class="ad-card-wrapper">
                <img class="ad-main-img" src="{{ url('img/frontend/post-ad/post-ad1.png') }}" alt="">
                <div class="overlay"></div>
                <div class="btn-wrapper">
                    <div class="ad-card-btn">
                        <a href="">Premium Property Listing</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-xs-12 ad-card">
            <div class="ad-card-wrapper">
                <img class="ad-main-img" src="{{ url('img/frontend/post-ad/post-ad1.png') }}" alt="">
                <div class="overlay"></div>
                <div class="btn-wrapper">
                    <div class="ad-card-btn">
                        <a href="{{ route('frontend.user.agent') }}">Become an Agent</a>
                    </div>
                </div>
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