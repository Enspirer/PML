@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/for_sale.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container index" style="margin-top: 9rem;">
        <div class="row">
            <div class="col-12">
                <p><a href="" class="text-decoration-none text-dark fw-bold">Property Market Live</a> > <a href="" class="text-decoration-none text-dark fw-bold">For Sale</a> > <a href="" class="text-decoration-none text-dark fw-bold">Sri Lanka Rent</a></p>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row" style="margin-bottom: 3rem;">
            <div class="col-9">
                
                <h4>Property for sale in <span class="fw-bold">Sri Lanka</span></h4>
                    
                <div class="row align-items-center">
                    <div class="col-6">
                        <p>2648 units available</p>
                    </div>

                    <div class="col-6">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <p style="color: black;">
                                    <i class="fas fa-sort-amount-down"></i>
                                    Sort By:
                                    <select name="" class="border-0" style="color: #FF0000">
                                        <option value="most_recent">Most Recent</option>
                                    </select>
                                </p>
                            </div>

                            <div class="col-6 text-end">
                                <div class="input-group">
                                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Filters" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
        
                                    <button type="button" class="btn text-white" style="background-color : #35495E; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><img src="{{ url('img/frontend/index/filter.png') }}" alt="" style="height: 1rem;"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 align-items-center btn-filters">
                    <div class="col-2">
                        <button class="btn bg-white border px-3">All Rooms</button>
                    </div>
                    <div class="col-2">
                        <button class="btn bg-white border px-3">1 bedroom</button>
                    </div>
                    <div class="col-2">
                        <button class="btn bg-white border px-3">2 bedrooms</button>
                    </div>
                    <div class="col-2">
                        <button class="btn bg-white border px-3">3 bedrooms</button>
                    </div>
                    <div class="col-2">
                        <button class="btn bg-white border px-3">4 bedrooms</button>
                    </div>
                </div>

                <div class="row mt-5 featured_properties">
                    <div class="col-4">
                        <div class="card custom-shadow position-relative">
                            <a href="{{ route('frontend.for_sale_single') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/frontend/for_sale/1.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                <div class="card-body mt-2">
                                    <div class="row mb-2">
                                        <div class="col-10">
                                            <h5 class="fw-bold">$450, 000</h5>
                                        </div>
                                        <div class="col-1">
                                            <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                        </div>
                                    </div>
                                    
                                    <h6 class="fw-bold mb-2">4 Bed Semidetached house</h6>
                                    <p>541, Rosewood place,</p>
                                    <p class="mb-1">Colombo, Sri Lanka</p>
                                    <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                                </div>

                                <div class="position-absolute apart-avail">
                                    <button class="btn fw-bold me-3">APARTMENT</button>
                                    <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                </div>


                                <div class="row align-items-center prom-logo position-absolute">
                                    <div class="col-6">
                                        <div class="py-1 ps-3" style="background-color: #FF0000;">
                                            <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <img src="{{ url('img/frontend/for_sale/almond.png') }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card custom-shadow position-relative">
                            <img src="{{ url('img/frontend/for_sale/1.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                            <div class="card-body mt-2">
                                <div class="row mb-2">
                                    <div class="col-10">
                                        <h5 class="fw-bold">$450, 000</h5>
                                    </div>
                                    <div class="col-1">
                                        <button class="far fa-heart border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to favorite" style="color: #F60331; background-color: white;"></button>
                                    </div>
                                </div>
                                
                                <h6 class="fw-bold mb-2">4 Bed Semidetached house</h6>
                                <p>541, Rosewood place,</p>
                                <p class="mb-1">Colombo, Sri Lanka</p>
                                <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                            </div>

                            <div class="position-absolute apart-avail">
                                <button class="btn fw-bold me-3">APARTMENT</button>
                                <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                            </div>


                            <div class="row align-items-center prom-logo position-absolute">
                                <div class="col-6">
                                    <div class="py-1 ps-3" style="background-color: #FF0000;">
                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <img src="{{ url('img/frontend/for_sale/almond.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card custom-shadow position-relative">
                            <img src="{{ url('img/frontend/for_sale/1.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                            <div class="card-body mt-2">
                                <div class="row mb-2">
                                    <div class="col-10">
                                        <h5 class="fw-bold">$450, 000</h5>
                                    </div>
                                    <div class="col-1">
                                        <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                    </div>
                                </div>
                                
                                <h6 class="fw-bold mb-2">4 Bed Semidetached house</h6>
                                <p>541, Rosewood place,</p>
                                <p class="mb-1">Colombo, Sri Lanka</p>
                                <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                            </div>

                            <div class="position-absolute apart-avail">
                                <button class="btn fw-bold me-3">APARTMENT</button>
                                <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                            </div>


                            <div class="row align-items-center prom-logo position-absolute">
                                <div class="col-6">
                                    <div class="py-1 ps-3" style="background-color: #FF0000;">
                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <img src="{{ url('img/frontend/for_sale/almond.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row" style="margin-top: 5rem;">
                    <div class="col-12">
                        <div class="row custom-shadow mb-4 mx-1">
                            <div class="col-6 p-3">
                                <div class="swiper mySwiper2" id="swiper_1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/1.png') }}"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/2.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/3.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/4.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/5.png') }}" />
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>

                                    <div class="position-absolute apart-avail">
                                        <button class="btn fw-bold me-3">APARTMENT</button>
                                        <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                    </div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper mt-2" id="swiper_small_1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/1.png') }}"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/2.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/3.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/4.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/5.png') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 p-3">
                                <div class="row align-items-center mb-4 pt-4">
                                    <div class="col-6">
                                        <div class="py-1 w-75 text-center" style="background-color: #FF0000;">
                                            <p class="text-white">Premium Listing</p>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <img src="{{ url('img/frontend/for_sale/almond.png') }}" alt="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <div class="col-10">
                                                <h4 class="fw-bold">$450, 000</h4>
                                            </div>
                                            <!-- <div class="col-1">
                                                <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                            </div> -->
                                        </div>

                                        <p class="mb-3" style="font-size: 1rem;">3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>

                                        <p class="fw-bold mb-2" style="font-size: 1.1rem; color: black">3 Bed flat for sale</p>
                                        <p style="font-size: 1rem;">541, Rosewood place, Colombo, Sri Lanka</p>

                                        <div class="mt-4">
                                            <p class="mb-3 fw-bold"><i class="fas fa-phone-alt me-3"></i></i>+94 77 700 9990</p>

                                            <p class="mb-3 fw-bold"><i class="fas fa-envelope me-3"></i>info@agentname.com</p>

                                            <p class="mb-3 fw-bold"><i class="fas fa-heart me-3"></i>Save Property</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row custom-shadow mx-1">
                            <div class="col-6 p-3">
                                <div class="swiper mySwiper2" id="swiper_2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/6.png') }}"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/7.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/1.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/2.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/3.png') }}" />
                                        </div>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>

                                    <div class="position-absolute apart-avail">
                                        <button class="btn fw-bold me-3">APARTMENT</button>
                                        <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                    </div>
                                </div>
                                <div thumbsSlider="" class="swiper mySwiper mt-2" id="swiper_small_2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/6.png') }}"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/7.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/1.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/2.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/for_sale/3.png') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 p-3">
                                <div class="row align-items-center mb-4 pt-4">
                                    <div class="col-6">
                                        <div class="py-1 w-75 text-center" style="background-color: #FF0000;">
                                            <p class="text-white">Premium Listing</p>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <img src="{{ url('img/frontend/for_sale/almond.png') }}" alt="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <div class="col-10">
                                                <h4 class="fw-bold">$450, 000</h4>
                                            </div>
                                        </div>

                                        <p class="mb-3" style="font-size: 1rem;">3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>

                                        <p class="fw-bold mb-2" style="font-size: 1.1rem; color: black">3 Bed flat for sale</p>
                                        <p style="font-size: 1rem;">541, Rosewood place, Colombo, Sri Lanka</p>

                                        <div class="mt-4">
                                            <p class="mb-3 fw-bold"><i class="fas fa-phone-alt me-3"></i></i>+94 77 700 9990</p>

                                            <p class="mb-3 fw-bold"><i class="fas fa-envelope me-3"></i>info@agentname.com</p>

                                            <p class="mb-3 fw-bold"><i class="fas fa-heart me-3"></i>Save Property</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="row justify-content-center custom-shadow p-3 mb-4">
                    <div class="col-12 text-center">
                        <a href="#" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid #707070; background-color: #35495E">
                            <div class="row justify-content-center">
                                <div class="col-2 p-0">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="col-7 p-0 text-start">
                                    Create email alert
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                            <div class="row justify-content-center">
                                <div class="col-2 p-0">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="col-7 p-0 text-start">
                                    Save this Search
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ url('img/frontend/for_sale/ad_1.png') }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="#" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ url('img/frontend/for_sale/ad_2.png') }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="#" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-0 custom-shadow">
                        <div class="card">
                            <img src="{{ url('img/frontend/for_sale/ad_3.png') }}" class="img-fluid" alt="..." style="object-fit: cover; height: 25rem;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')

    <script>
      var swiper = new Swiper("#swiper_small_1", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper("#swiper_1", {
        spaceBetween: 10,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
    </script>

    <script>
      var swiper = new Swiper("#swiper_small_2", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper("#swiper_2", {
        spaceBetween: 10,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
    </script>

@endpush