@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/new_development.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container index" style="margin-top: 9rem;">
        <div class="row">
            <div class="col-12">
                <p><a href="" class="text-decoration-none text-dark fw-bold">Property Market Live</a> > <a href="" class="text-decoration-none text-dark fw-bold">New Development/a> > <a href="" class="text-decoration-none text-dark fw-bold">New Development in Sri Lanka</a></p>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row" style="margin-bottom: 3rem;">
            <div class="col-9">
                
                <h3>New Development in <span class="fw-bold">Sri Lanka</span></h3>
                    
                <div class="row align-items-center">
                    <div class="col-6">
                        <p>2648 units available</p>
                    </div>

                    <div class="col-6 text-end">
                        <p style="color: black;">
                            <i class="fas fa-sort-amount-down"></i>
                            Sort By:
                            <select name="" class="border-0" style="color: #FF0000">
                                <option value="most_recent">Most Recent</option>
                            </select>
                        </p>
                    </div>
                </div>


                <div class="row mt-5 featured_properties">
                    <div class="col-4">
                        <div class="card custom-shadow position-relative">
                            <a href="{{ route('frontend.for_sale_single') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/frontend/new_development/1.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                <div class="card-body mt-3">
                                    <div class="row mb-2">
                                        <div class="col-10">
                                            <h5 class="fw-bold">Rs. 120,000 <span class="fw-normal" style="font-size: 0.9rem; color: rgb(0, 0, 0, 0.45)">Per Perch</span></h5>
                                        </div>
                                        <div class="col-1">
                                            <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                        </div>
                                    </div>
                                    
                                    <h6 class="fw-bold">Commercial Land for Sale</h6>
                                    <p class="mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                    <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis incidunt ut aspernatur, nam magni cum nemo at a beatae tempora!</p>
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
                            <a href="{{ route('frontend.for_sale_single') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/frontend/new_development/2.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                <div class="card-body mt-3">
                                    <div class="row mb-2">
                                        <div class="col-10">
                                            <h5 class="fw-bold">Rs. 120,000 <span class="fw-normal" style="font-size: 0.9rem; color: rgb(0, 0, 0, 0.45)">Per Perch</span></h5>
                                        </div>
                                        <div class="col-1">
                                            <button class="far fa-heart border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to favorite" style="color: #F60331; background-color: white;"></button>
                                        </div>
                                    </div>
                                    
                                    <h6 class="fw-bold">Commercial Land for Sale</h6>
                                    <p class="mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                    <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis incidunt ut aspernatur, nam magni cum nemo at a beatae tempora!</p>
                                </div>

                                <div class="position-absolute apart-avail">
                                    <button class="btn fw-bold me-3">APARTMENT</button>
                                    <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                </div>


                                <div class="row align-items-center prom-logo position-absolute">
                                    <div class="col-6">
                                        <div class="py-1 ps-3" style="background-color: #FF0000;">
                                            <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">FEATURED</p>
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
                            <a href="{{ route('frontend.for_sale_single') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/frontend/new_development/3.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                <div class="card-body mt-3">
                                    <div class="row mb-2">
                                        <div class="col-10">
                                            <h5 class="fw-bold">Rs. 120,000 <span class="fw-normal" style="font-size: 0.9rem; color: rgb(0, 0, 0, 0.45)">Per Perch</span></h5>
                                        </div>
                                        <div class="col-1">
                                            <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                        </div>
                                    </div>
                                    
                                    <h6 class="fw-bold">Commercial Land for Sale</h6>
                                    <p class="mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                    <p class="mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis incidunt ut aspernatur, nam magni cum nemo at a beatae tempora!</p>
                                </div>

                                <div class="position-absolute apart-avail">
                                    <button class="btn fw-bold me-3">APARTMENT</button>
                                    <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                </div>


                                <div class="row align-items-center prom-logo position-absolute">
                                    <div class="col-6">
                                        <div class="py-1 ps-3" style="background-color: #FF0000;">
                                            <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">FEATURED</p>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <img src="{{ url('img/frontend/for_sale/almond.png') }}" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-5 search-bar">
                    <div class="col-12">
                        <form>
                            <div class="input-group">
                            {{csrf_field()}}
                                <select class="form-select" aria-label="location" name="location" id="location" placeholder="Location" style="padding: 1rem">
                                    <option value="all" selected disabled hidden>Location</option>
                                    <option value="pottuvil">Pottuvil</option>
                                    <option value="colombo">Colombo</option>
                                </select>

                                <select class="form-select" aria-label="property_type" name="property_type" id="property_type" placeholder="Property Type">
                                    <option value="0" selected disabled hidden>Property Type</option>
                                    <option value="for_sale">For Sale</option>
                                    <option value="for_rent">For Rent</option>       
                                </select>

                                <select class="form-select" aria-label="project_name" name="project_name" id="project_name" placeholder="Project Name">
                                    <option value="0" selected disabled hidden>Project Name</option>
                                    <option value="commercial">Commercial</option>
                                    <option value="residential">Residential</option>       
                                </select>

                                <select class="form-select" aria-label="project_status" name="project_status" id="project_status" placeholder="Project Status">
                                    <option value="0" selected disabled hidden>Project Status</option>
                                    <option value="for_sale">For Sale</option>
                                    <option value="for_rent">For Rent</option>       
                                </select>

                                <select class="form-select" aria-label="possession_within" name="possession_within" id="possession_within" placeholder="Possession Within">
                                    <option value="0" selected disabled hidden>Possession Within</option>
                                    <option value="for_sale">For Sale</option>
                                    <option value="for_rent">For Rent</option>       
                                </select>

                                <select class="form-select" aria-label="specification" name="specification" id="specification" placeholder="Specification">
                                    <option value="0" selected disabled hidden>Specification</option>
                                    <option value="for_sale">For Sale</option>
                                    <option value="for_rent">For Rent</option>       
                                </select>

                                <button type="submit" class="btn text-white rounded-0" style="background-color : #35495E;">Search</button>
                            </div>
                        </form>
                    </div>
                    
                </div>


                <div class="row mt-5 card_properties">
                    <div class="col-4">
                        <div class="card custom-shadow position-relative">
                            <a href="{{ route('frontend.for_sale_single') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/frontend/new_development/4.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                <div class="card-body mt-3">
                                    <div class="row mb-2">
                                        <div class="col-10">
                                            <h5 class="fw-bold">Chatra Villas</h5>
                                        </div>
                                        <div class="col-1">
                                            <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                        </div>
                                    </div>
                                    
                                    <h6 class="fw-bold mb-2">USD 350,000 Upwards</h6>
                                    <p class="mb-2 text-dark">541, Rosewood place, Colombo, Sri Lanka</p>
                                    <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                                </div>

                                <div class="position-absolute apart-avail">
                                    <button class="btn fw-bold me-3">APARTMENT</button>
                                    <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                </div>


                                <div class="row align-items-center prom-logo position-absolute" style="left: 3rem">
                                    <div class="col-6">
                                        <!-- <div class="py-1 ps-3" style="background-color: #FF0000;">
                                            <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                        </div> -->
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
                            <a href="{{ route('frontend.for_sale_single') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/frontend/new_development/4.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                <div class="card-body mt-3">
                                    <div class="row mb-2">
                                        <div class="col-10">
                                            <h5 class="fw-bold">Rush Reliance</h5>
                                        </div>
                                        <div class="col-1">
                                            <button class="far fa-heart border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to favorite" style="color: #F60331; background-color: white;"></button>
                                        </div>
                                    </div>
                                    
                                    <h6 class="fw-bold mb-2">LKR 20,600 / Sq.ft Upwards</h6>
                                    <p class="mb-2 text-dark">541, Rosewood place, Colombo, Sri Lanka</p>
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
                            <a href="{{ route('frontend.for_sale_single') }}" class="text-decoration-none text-dark">
                                <img src="{{ url('img/frontend/new_development/4.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                <div class="card-body mt-3">
                                    <div class="row mb-2">
                                        <div class="col-10">
                                            <h5 class="fw-bold">GREEN STAR CITY</h5>
                                        </div>
                                        <div class="col-1">
                                            <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                        </div>
                                    </div>
                                    
                                    <h6 class="fw-bold mb-2">USD 350,000 Upwards</h6>
                                    <p class="mb-2 text-dark">541, Rosewood place, Colombo, Sri Lanka</p>
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
                </div>


                <div class="row" style="margin-top: 5rem;">
                    <div class="col-12">
                        <div class="row custom-shadow mb-4 mx-1">
                            <div class="col-6 p-3">
                                <div class="swiper mySwiper2" id="swiper_1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/8.png') }}"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/7.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/6.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/5.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/4.png') }}" />
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
                                            <img src="{{ url('img/frontend/new_development/8.png') }}"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/7.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/6.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/5.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/4.png') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 p-3">
                                <div class="row align-items-center mb-4 pt-2">
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
                                        <div class="row mb-2">
                                            <div class="col-10">
                                                <h3 class="fw-bold">Altezza Residencies</h3>
                                            </div>
                                            <!-- <div class="col-1">
                                                <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                            </div> -->
                                        </div>

                                        <p class="mb-2" style="font-size: 1.3rem; color: black">24M upwards</p>
                                        <p class="mb-2" style="font-size: 1rem; color: black">541, Rosewood place, Colombo, Sri Lanka</p>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni voluptatum quae ipsam, fugit quos ut nobis eum minus laudantium eaque adipisci.</p>

                                        <div class="mt-4">
                                            <p class="mb-3 fs-6"><i class="fas fa-phone-alt me-3"></i></i>+94 77 700 9990</p>

                                            <p class="mb-3 fs-6"><i class="fas fa-envelope me-3"></i>info@agentname.com</p>

                                            <p class="mb-3 fs-6"><i class="fas fa-heart me-3"></i>Save Property</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row custom-shadow mb-4 mx-1">
                            <div class="col-6 p-3">
                                <div class="swiper mySwiper2" id="swiper_2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/1.png') }}"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/2.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/3.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/4.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/5.png') }}" />
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
                                            <img src="{{ url('img/frontend/new_development/1.png') }}"/>
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/2.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/3.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/4.png') }}" />
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{ url('img/frontend/new_development/5.png') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 p-3">
                                <div class="row align-items-center mb-4 pt-2">
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
                                        <div class="row mb-2">
                                            <div class="col-10">
                                                <h3 class="fw-bold">Altezza Residencies</h3>
                                            </div>
                                            <!-- <div class="col-1">
                                                <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                            </div> -->
                                        </div>

                                        <p class="mb-2" style="font-size: 1.3rem; color: black">24M upwards</p>
                                        <p class="mb-2" style="font-size: 1rem; color: black">541, Rosewood place, Colombo, Sri Lanka</p>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni voluptatum quae ipsam, fugit quos ut nobis eum minus laudantium eaque adipisci.</p>

                                        <div class="mt-4">
                                            <p class="mb-3 fs-6"><i class="fas fa-phone-alt me-3"></i></i>+94 77 700 9990</p>

                                            <p class="mb-3 fs-6"><i class="fas fa-envelope me-3"></i>info@agentname.com</p>

                                            <p class="mb-3 fs-6"><i class="fas fa-heart me-3"></i>Save Property</p>
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
                                <div class="col-3 p-0">
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
                                <div class="col-3 p-0">
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
                            <img src="{{ url('img/frontend/for_sale/ad_2.png') }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="#" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ url('img/frontend/for_sale/ad_1.png') }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
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