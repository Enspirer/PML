@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/index.css') }}" rel="stylesheet">
<link href="{{ url('css/post-ad.css') }}" rel="stylesheet">
@endpush

@section('content')

<!-- <div class="container post-type-container">
    <div class="row">
        <div class="col-4 col-xs-12 post-card">
            <div class="post-card-wrapper">
                <img class="post-main-img" src="{{ url('img/frontend/add-property-page/add-property1.png') }}" alt="">
                <div class="overlay"></div>
                <div class="btn-wrapper">
                    <div class="post-card-btn">
                        <a href="{{ route('frontend.pre_listing') }}">Free Property Listing</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-xs-12 post-card">
            <div class="post-card-wrapper">
                <img class="post-main-img" src="{{ url('img/frontend/add-property-page/add-property2.png') }}" alt="">
                <div class="overlay"></div>
                <div class="btn-wrapper">
                    <div class="post-card-btn">
                        <a href="">Premium Property Listing</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-xs-12 post-card">
            <div class="post-card-wrapper">
                <img class="post-main-img" src="{{ url('img/frontend/add-property-page/add-property3.png') }}" alt="">
                <div class="overlay"></div>
                <div class="btn-wrapper">
                    <div class="post-card-btn">
                        @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
                            <a href="{{ route('frontend.user.agent') }}">Become an Agent</a>
                        @else
                            <a href="{{ route('frontend.user.create-property') }}">Add Property as an Agent</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


<section class="section-add-property" id="section-add-property">
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-0">
        <div class="col add-property-col">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Free Property Listing</h5>
                <img src="{{ url('img/frontend/add-property-page/add-property1.png') }}" class="card-img-top" alt="...">
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
                <div>
                    <a href="{{ route('frontend.pre_listing') }}" class="add-property-btn">Free Property Listing</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col add-property-col">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Premium Property Listing</h5>
                <img src="{{ url('img/frontend/add-property-page/add-property2.png') }}" class="card-img-top" alt="...">
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
                <div>
                    <a href="" class="add-property-btn">Premium Property Listing</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col add-property-col">
            <div class="card">
            <div class="card-body">
            @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
                <h5 class="card-title">Become an Agent</h5>
            @else
                <h5 class="card-title">Add Property as an Agent</h5>
            @endif
                <img src="{{ url('img/frontend/add-property-page/add-property3.png') }}" class="card-img-top" alt="...">
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
                <div>
                    @if(App\Models\AgentRequest::where('user_id',auth()->user()->id)->first() == null)
                        <a href="{{ route('frontend.user.agent') }}" class="add-property-btn">Become an Agent</a>
                    @else
                        <a href="{{ route('frontend.user.create-property') }}" class="add-property-btn">Add Property as an Agent</a>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</section>


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