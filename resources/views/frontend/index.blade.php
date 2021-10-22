@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container-fluid home-search" style="padding-top: 8.5rem; padding-bottom: 2rem; background-color: #e6e9eb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9">
                    <form>
                        <div class="input-group">
                            <input type="text" name="search_keyword" class="form-control p-4 rounded-0" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search">

                            <button type="submit" class="btn text-white rounded-0 px-4" style="background-color : #35495E;"><i class="fas fa-search"></i></button>

                            <button type="button" class="btn text-white rounded-0 border-start" style="background-color : #35495E;">Filter<img src="{{ url('img/frontend/index/filter.png') }}" alt="" class="ms-3" style="height: 1rem;"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container index" style="margin-top: 2rem;">
        <div class="row">

            <div class="col-3 left">
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/location-pin.png') }}" alt="" class="me-3">Find a Land</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/house.png') }}" alt="" class="me-3">Build Your House</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/livingroom.png') }}" alt="" class="me-3">Interior Designs</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/mortgage.png') }}" alt="" class="me-3">Mortgages</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/compass.png') }}" alt="" class="me-3">Vaastu</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/compass.png') }}" alt="" class="me-3">Vaastu</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/compass.png') }}" alt="" class="me-3">Vaastu</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/compass.png') }}" alt="" class="me-3">Vaastu</a>
            </div>

            <div class="col-6 center">             
                @if($latest_post != null)
                    <div class="row scroll-box">

                        <div class="article d-none">
                            <div class="col-12 mb-3" style="padding-right: 8px;">
                                <img src="{{ uploaded_asset($latest_post->feature_image) }}" alt="" class="img-fluid w-100 main-image" style="object-fit: cover; height: 20rem;">
                            </div>

                            <div class="col-12 mb-3" style="padding-right: 8px;">
                                <h5 class="fw-bold title"  style="font-size: 1.15rem;">{{$latest_post->title}}</h5>                               
                            </div>                            

                            <div class="col-12 description" style="padding-right: 8px;">
                                <div style="font-size: 0.9rem; color: #666666;">{!! $latest_post->article !!}</div>
                            </div>
                        </div>
                    
                        <div class="video d-none">
                            <div class="col-12 mb-3" style="padding-right: 8px; height: 20rem;">

                                <input type="hidden" value="{{ preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $latest_post->youtube, $default_match) }}" />
                                
                                <iframe style="height:20rem" class="img-fluid w-100" id="youtube_player" src="https://www.youtube.com/embed/{{ $default_match[0] }}?rel=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>

                            <div class="col-12 mb-3" style="padding-right: 8px;">
                                <h5 class="fw-bold title" style="font-size: 1.15rem;">{{$latest_post->title}}</h5>
                            </div>
                            
                            <div class="col-12 description" style="padding-right: 8px;">
                                <div style="font-size: 0.9rem; color: #666666;">{!! $latest_post->description !!}</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-3 right">
                @if(count($posts) != 0)
                    @foreach($posts as $key => $post)
                        @if($post->type != 'youtube')
                            <div class="row mb-3 article">
                                <div class="col-6 pe-0">
                                    <img src="{{ uploaded_asset($post->feature_image) }}"  alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                                </div>
                                <div class="col-6">
                                    <h6 class="fw-bolder aa" style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">{{ $post->title }}</h6>
                                    <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        <div class="paragraph" style="color: #666666;">{!! $post->article !!}</div>
                                    </div>
                                    <!-- <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p> -->
                                </div>
                            </div>
                        @else

                            <div class="row mb-3 video">

                                <input type="hidden" value="{{ preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $post->youtube, $matches) }}" />

                                <input type="hidden" class="video-value" value="{{ $matches[0] }}" />

                                <div class="col-6 pe-0">
                                    <img src="{{ uploaded_asset($post->feature_image) }}"  alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                                </div>
                                <div class="col-6">
                                    <h6 class="fw-bolder aa" style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">{{ $post->title }}</h6>
                                    <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        <div class="paragraph" style="font-size: 0.8rem; color: #666666;">{!! $post->description !!}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>


    <div class="properties" style="margin-top: 3rem;">
        <div class="container">
            <div class="row mt-5 mb-4">
                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/1.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/2.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/3.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/ad_1.png') }}" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/4.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/5.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/6.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/ad_2.png') }}" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 4rem;">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/5.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/4.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/3.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/2.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                <div class="card custom-shadow">
                        <img src="{{ url('img/frontend/index/1.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">$450, 000</h5>
                            <p>4 Bed Semidetached house</p>
                            <p>541, Rosewood place,</p>
                            <p>Colombo, Sri Lanka</p>
                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>


    <div class="container social" style="margin-top: 5rem; margin-bottom: 3rem;">
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-1 text-center">
                <a href="#" target="_blank"><i class="fab fa-facebook-square"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-3 fb">
                <div class="card" style="height: 25rem;">
                    <img src="{{ url('img/frontend/index/social_1.png') }}" class="img-fluid w-100" alt="..." style="object-fit: cover; height: 13rem;">
                    <div class="card-body p-2">
                        <p class="card-text mb-1" style="font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                        
                        <div class="row justify-content-between mt-3 align-items-center">
                            <div class="col-7">
                                <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                            </div>
                            <div class="col-5 text-end">
                                <img src="{{ url('img/frontend/index/fb_color.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         
            <div class="col-3 twitter">
                <div class="card" style="height: 25rem;">
                    <img src="{{ url('img/frontend/index/social_2.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                    <div class="card-body p-2">
                        <p class="card-text mb-1" style="font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                        
                        <div class="row justify-content-between mt-3 align-items-center">
                            <div class="col-7">
                                <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                            </div>
                            <div class="col-5 text-end">
                                <img src="{{ url('img/frontend/index/twitter_color.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="col-3">
                <div class="card" style="height: 25rem;">
                    <img src="{{ url('img/frontend/index/social_3.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                    <div class="card-body p-2">
                        <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 5; /* number of lines to show */-webkit-box-orient: vertical;height: 115px; font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>
                        
                        <div class="row justify-content-between mt-3 align-items-center">
                            <div class="col-7">
                                <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                            </div>
                            <div class="col-5 text-end">
                                <a href="#" style="color: #0F9D58; font-size: 1.1rem;">Blogs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card" style="height: 25rem;">
                    <img src="{{ url('img/frontend/index/social_4.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                    <div class="card-body p-2">
                        <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 5; /* number of lines to show */-webkit-box-orient: vertical;height: 115px; font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment #SHIBARMY  ⚠followers only giveaway⚠ #BTC  #ETH #Giveaway #ADA</p>

                        <div class="row justify-content-between mt-3 align-items-center">
                            <div class="col-7">
                                <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p>
                            </div>
                            <div class="col-5 text-end">
                                <a href="#" style="color: #FF0000; font-size: 1.1rem;">News</a>
                            </div>
                        </div>
                    </div>
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
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        }
      });
    </script>


    <script>
      $(document).ready(function(){

            let post_type = '<?php echo $latest_post->type; ?>';

            if(post_type != 'youtube') {
                $('.article').removeClass('d-none');
            } else {
                $('.video').removeClass('d-none');
            }


            $('.right .article').on('click',function(){
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

            $('.right .video').on('click',function(){

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
