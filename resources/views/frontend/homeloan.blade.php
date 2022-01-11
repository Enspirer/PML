@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/index.css') }}" rel="stylesheet">
@endpush

@section('content')


    @include('frontend.includes.search')

    <div class="container index" style="margin-top: 2rem;">
        <div class="row">

            <div class="col-3 left">
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/location-pin.png') }}" alt="" class="me-3">Home Loan</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/house.png') }}" alt="" class="me-3">Constructions</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/livingroom.png') }}" alt="" class="me-3">Interior Designs</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/mortgage.png') }}" alt="" class="me-3">Insurance</a>
                <a class="btn link-btn w-100 mb-3"><img src="{{ url('img/frontend/index/compass.png') }}" alt="" class="me-3">Vaastu</a>
            </div>

            <div class="col-6 center">             
                
                    <div class="row scroll-box">

                        <div class="article d-none">
                            <div class="col-12 mb-3" style="padding-right: 8px;">
                                <img src="" alt="" class="img-fluid w-100 main-image" style="object-fit: cover; height: 20rem;">
                            </div>

                            <div class="col-12 mb-3" style="padding-right: 8px;">
                                <h5 class="fw-bold title"  style="font-size: 1.15rem;">latest post title</h5>                               
                            </div>                            

                            <div class="col-12 description" style="padding-right: 8px;">
                                <div style="font-size: 0.9rem; color: #666666;">latest post article</div>
                            </div>
                        </div>
                    
                        <div class="video d-none">
                            <div class="col-12 mb-3" style="padding-right: 8px; height: 20rem;">

                                youtube
                            </div>

                            <div class="col-12 mb-3" style="padding-right: 8px;">
                                <h5 class="fw-bold title" style="font-size: 1.15rem;">latest post title</h5>
                            </div>
                            
                            <div class="col-12 description" style="padding-right: 8px;">
                                <div style="font-size: 0.9rem; color: #666666;">latest post description</div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-3 right">
                            <div class="row mb-3 article">
                                <div class="col-6 pe-0">
                                    <img src=""  alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                                </div>
                                <div class="col-6">
                                    <h6 class="fw-bolder aa" style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">post title</h6>
                                    <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        <div class="paragraph" style="color: #666666;">post article</div>
                                    </div>
                                    <!-- <p style="font-size: 0.7rem;">1.1 M views  2 months ago</p> -->
                                </div>
                            </div>
              

                            <div class="row mb-3 video">

                                youtube

                                <div class="col-6 pe-0">
                                    <img src=""  alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                                </div>
                                <div class="col-6">
                                    <h6 class="fw-bolder aa" style="font-size: 0.75rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">post title</h6>
                                    <div style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        <div class="paragraph" style="font-size: 0.8rem; color: #666666;">post description</div>
                                    </div>
                                </div>
                            </div>
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
                    <a href="#" target="_blank">
                        <div class="card custom-shadow">
                            <img src="" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                        </div>
                    </a>
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
                    <a href="#" target="_blank">
                        <div class="card custom-shadow">
                            <img src="" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 4rem;">
    <h2 style="margin-bottom:15px !important;">Trending Now</h2>
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


    <!-- youtube script -->

@endpush