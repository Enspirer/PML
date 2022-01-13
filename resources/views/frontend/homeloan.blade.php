@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/index.css') }}" rel="stylesheet">
<link href="{{ url('css/homeloan.css') }}" rel="stylesheet">
@endpush

@section('content')


@include('frontend.includes.search')

<div class="container index" style="margin-top: 2rem;">
        <div class="row">
            <div class="col-12">
                <p><a href="{{url('/')}}" class="text-decoration-none text-dark fw-bold">Property Market Live</a>
                    >
                        <a class="text-decoration-none text-dark fw-bold">
                            Main Menu
                        </a>

                    > <a class="text-decoration-none text-dark fw-bold">{{$category->name}}</a></p>
            </div>
        </div>
</div>

<div class="container" style="margin-top: 2rem;">
    <div class="row">

        <div class="col-3 left col-xs-12">

            @if(count($categories) != 0)
                @foreach($categories as $cat)
                    @if($cat->id == $category->id)
                        <a href="{{route('frontend.homeloan',$cat->id)}}" class="btn link-btn w-100 mb-3 main-menu-links active-menu"><img src="{{ uploaded_asset($cat->icon) }}" alt="" class="me-3">{{$cat->name}}</a>
                    @else
                        <a href="{{route('frontend.homeloan',$cat->id)}}" class="btn link-btn w-100 mb-3 main-menu-links"><img src="{{ uploaded_asset($cat->icon) }}" alt="" class="me-3">{{$cat->name}}</a>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="col-6 center col-xs-12">

            @if($default_youtube_posts != null)
                <div class="row scroll-box">

                 <input type="hidden" value="{{ preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $default_youtube_posts->youtube, $defaultmatch) }}" />

                    
                    <!-- use video here -->
                    <div class="video">
                        <div class="col-12 mb-3" style="padding-right: 8px; height: 20rem;">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $defaultmatch[0] }}?rel=0"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>

                        <div class="col-12 mb-3" style="padding-right: 8px;">
                            <h5 class="fw-bold title" style="font-size: 1.15rem;">{{$default_youtube_posts->title}}</h5>
                        </div>

                        <div class="col-12 option-bar">
                            <div class="left-side">
                                <span>18,719,690</span>
                                <span>{{ $default_youtube_posts->created_at->format('M d Y') }}</span>
                            </div>
                            <div class="right-side">
                                <div class="right-side-tile">
                                    <span class="option-icon"><i class="far fa-thumbs-up"></i></span>
                                    <span class="option-txt">304k</span>
                                </div>
                                <div class="right-side-tile">
                                    <span class="option-icon"><i class="far fa-thumbs-down"></i></span>
                                    <span class="option-txt">2k</span>
                                </div>
                                <div class="right-side-tile">
                                    <span class="option-icon"><i class="fas fa-share"></i></span>
                                    <span class="option-txt">SHARE</span>
                                </div>
                                <div class="right-side-tile">
                                    <span class="option-icon"><i class="fas fa-save"></i></span>
                                    <span class="option-txt">SAVE</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 description" style="padding-right: 8px;">
                            <div style="font-size: 0.9rem; color: #666666;">{{$default_youtube_posts->description}}</div>
                        </div>
                    </div>
                </div>
            @else
                @include('frontend.includes.not_found',[
                    'not_found_title' => 'Youtube Videos Not Found',
                    'not_found_description' => null,
                    'not_found_button_caption' => null
                ])
            @endif
        </div>
        <div class="col-3 right col-xs-12">
            

            @if(count($youtube_posts) != 0)
                @foreach($youtube_posts as $key => $youtube_post)

                <input type="hidden" value="{{ preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $youtube_post->youtube, $matches) }}" />

                <input type="hidden" id="videos_value" class="video-value" value="{{ $matches[0] }}" />

                <!-- video here -->
                <div class="row mb-3 video">
                    <div class="col-6 pe-0">
                        <img src="{{ uploaded_asset($youtube_post->feature_image) }}" alt="" class="img-fluid w-100"
                            style="height: 5rem; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <h6 class="fw-bolder aa"
                            style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                            {{$youtube_post->title}}</h6>
                        <div
                            style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                            <div class="paragraph" style="font-size: 0.8rem; color: #666666;">{{$youtube_post->description}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif

            <!-- <div class="row mb-3 video">
                <div class="col-6 pe-0">
                    <img src="{{ url('img/frontend/home-loan/homeloan3.jpg') }}" alt="" class="img-fluid w-100"
                        style="height: 5rem; object-fit: cover;">
                </div>
                <div class="col-6">
                    <h6 class="fw-bolder aa"
                        style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                        youtube title</h6>
                    <div
                        style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                        <div class="paragraph" style="font-size: 0.8rem; color: #666666;">post description</div>
                    </div>
                </div>
            </div>

            
            <div class="row mb-3 video">
                <div class="col-6 pe-0">
                    <img src="{{ url('img/frontend/home-loan/homeloan3.jpg') }}" alt="" class="img-fluid w-100"
                        style="height: 5rem; object-fit: cover;">
                </div>
                <div class="col-6">
                    <h6 class="fw-bolder aa"
                        style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">
                        youtube title</h6>
                    <div
                        style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                        <div class="paragraph" style="font-size: 0.8rem; color: #666666;">post description</div>
                    </div>
                </div>
            </div> -->

        </div>

    </div>
</div>



@if(count($trending_posts) != 0)
<div class="container slider-container" style="margin-top: 4rem;">
    <h2 style="margin-bottom:25px !important;">Trending Now</h2>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

                @foreach($trending_posts as $trending)
                    <div class="swiper-slide">
                        <div class="card custom-shadow">
                            <a href="{{route('frontend.article',$trending->id)}}" style="text-decoration:none">
                                <img src="{{ uploaded_asset($trending->feature_image) }}" alt="" class="img-fluid w-100"
                                    style="height: 10rem; object-fit: cover;">
                            </a>
                            <div class="card-body text-center">
                                <h5 style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;" class="mb-1 fw-bold">{{$trending->title}}</h5>
                                <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;" >{{$trending->description}}</p>
                                <!-- <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p> -->
                            </div>
                        </div>
                    </div>
                @endforeach
           
            
        </div>
        <div  class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

@endif


<!-- fullsize area -->
<div class="container" style="margin-top: 3rem;">
    <div class="row">
        <div class="col-9 col-xs-12 col-tab-12">

            @if(count($article_posts) == 0)
                @include('frontend.includes.not_found',[
                    'not_found_title' => 'Articles Not Found',
                    'not_found_description' => null,
                    'not_found_button_caption' => null
                ])
            @else
                @foreach($article_posts as $article)
                    @if($article->feature_image == null)
                        <!-- card only have text -->
                        <a href="{{route('frontend.article',$article->id)}}" style="text-decoration:none; color:black">
                            <div class="property-detail-card-wrapper">
                                <div class="p-d-icon-wrapper">
                                <i class="fas fa-ellipsis-v"></i>
                                </div>
                                <h3>{{$article->title}}</h3>
                                <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{!!$article->description!!}</p>
                                <div class="property-card-meta-details">
                                    {{ $article->created_at->format('M d Y') }}
                                </div>
                            </div>
                        </a>
                    @else
                        <!-- card with image or video -->
                        <a href="{{route('frontend.article',$article->id)}}" style="text-decoration:none; color:black">
                            <div class="property-detail-card-wrapper">
                                <div class="p-d-icon-wrapper">
                                <i class="fas fa-ellipsis-v"></i>
                                </div>
                                <h3>{{$article->title}}</h3>
                                <div class="p-d-inner-wrapper">
                                    <img src="{{ uploaded_asset($article->feature_image) }}" alt="">
                                    <div class="p-d-inner-txt-wrapper">
                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{!!$article->description!!}</p>
                                        <div class="property-card-meta-details">
                                            {{ $article->created_at->format('M d Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            @endif

        </div>
        
        <div class="col-3 col-xs-12 col-tab-12 side-area" style="height:900px;">
            <div class="sidebar-card" style="height:430px;">
                <img src="{{ url('img/frontend/index/ad_1.png') }}" alt="">
            </div>
            <div class="sidebar-card">
                <img src="{{ url('img/frontend/index/ad_2.png') }}" alt="">
            </div>
        </div>
    </div>
</div>


</div>

@endsection

@push('after-scripts')

<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 20,
    loop: false,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },

        576: {
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        }
    },
});
</script>


<!-- youtube script -->
    <script>
      $(document).ready(function(){

            $('.right .video').on('click',function(){

                // let link = $(this).find('.video-value').val();
                let link = $('#videos_value').val();
                // console.log(link);
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