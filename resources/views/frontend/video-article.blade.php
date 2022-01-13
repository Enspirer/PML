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
            <p><a href="/" class="text-decoration-none text-dark fw-bold">Property Market Live</a>
                >
                <a href="#" class="text-decoration-none text-dark fw-bold">
                    Home Loan
                </a>

                > <a href="#" class="text-decoration-none text-dark fw-bold">Article</a>
                > <a href="#" class="text-decoration-none text-dark fw-bold">Property Constructions</a>
            </p>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 2rem;">
    <div class="row">
        <div class="col-8 col-xs-12 col-tab-12 article-main-area">

            <div class="video-article-main-area">
                <!-- <img src="{{ url('img/frontend/article-page/construction-large.png') }}" alt=""> -->
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/imF8_j1P94c"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="col-12 option-bar">
                    <div class="left-side">
                        <span>18,719,690</span>
                        <span>Jun 29, 2014</span>
                    </div>
                    <div class="right-side">
                        <div class="right-side-tile">
                            <span class="option-icon"><i class="far fa-thumbs-up" aria-hidden="true"></i></span>
                            <span class="option-txt">304k</span>
                        </div>
                        <div class="right-side-tile">
                            <span class="option-icon"><i class="far fa-thumbs-down" aria-hidden="true"></i></span>
                            <span class="option-txt">2k</span>
                        </div>
                        <div class="right-side-tile">
                            <span class="option-icon"><i class="fas fa-share" aria-hidden="true"></i></span>
                            <span class="option-txt">SHARE</span>
                        </div>
                        <div class="right-side-tile">
                            <span class="option-icon"><i class="fas fa-save" aria-hidden="true"></i></span>
                            <span class="option-txt">SAVE</span>
                        </div>
                    </div>
                </div>
                <h1>Property Constructions</h1>
                <p class="article-date-time">January 10, 2022 07.32pm</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusamus reiciendis ipsa,
                    voluptatem quia suscipit facere tempore esse aliquid accusantium velit consectetur exercitationem
                    quos a dicta explicabo vero ratione neque?</p>

            </div>

            <!-- house planning category -->
            <div class="video-category-area">
                <h2 class="side-title">House Planning</h2>

                <!-- slider area -->
                <div class="dotted-swiper-container">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card custom-shadow">
                                    <img src="{{ url('img/frontend/video-article-page/houseplan1.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/houseplan2.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/houseplan3.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/houseplan2.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/houseplan3.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                        <!-- <div  class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>


            <!-- Luxury Apartments Category -->
            <div class="video-category-area">
                <h2 class="side-title">Luxury Apartments</h2>

                <!-- slider area -->
                <div class="dotted-swiper-container">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card custom-shadow">
                                    <img src="{{ url('img/frontend/video-article-page/apartment1.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/apartment2.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/apartment3.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/apartment3.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/apartment3.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                        <!-- <div  class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>


                <!-- Real Estate Category -->
                <div class="video-category-area">
                <h2 class="side-title">Real Estate & Myths</h2>

                <!-- slider area -->
                <div class="dotted-swiper-container">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card custom-shadow">
                                    <img src="{{ url('img/frontend/video-article-page/realestate1.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/realestate2.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/realestate3.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/realestate2.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                                    <img src="{{ url('img/frontend/video-article-page/realestate3.png') }}" alt=""
                                        class="img-fluid w-100 card-img-p" style="height: 10rem; object-fit: cover;">
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
                        <!-- <div  class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-4 col-xs-12 col-tab-12">
            <div class="most-viewed-wrapper">
                <h2 class="side-title">Most Viewed</h2>
                <ul class="most-viewed">
                    <li><i class="fas fa-play"></i>
                        <span class="most-viewed-txt">
                            Before You Move In to Your New Home
                        </span>
                    </li>
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
                        <span class="most-viewed-txt">Maintenance Responsibilities</span>
                    </li>
                    <li><i class="fas fa-play"></i> <span class="most-viewed-txt">Before You Move In to Your New
                            Home</span></li>
                </ul>
            </div>

            <div class="trending-wrapper">
                <h2 class="side-title">Trending Now</h2>
                <a href="#" style="text-decoration:none;color:#000;">
                    <div class="trending-card">
                        <img src="{{ url('img/frontend/video-article-page/video1.png') }}" alt="">
                        <div class="trending-card-txt-wrapper">
                            <div class="txt-inner-wrapper">
                                <h3>Interior Designing Guide lines</h3>
                                <h4>Carmelo Benilla Jr</h4>
                                <p class="trending-card-date-time">January 10, 2022</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error asperiores corporis
                                    illo magnam eligendi laborum facere! Dolor necessitatibus quidem suscipit vitae
                                    voluptate quos? Aliquam eligendi nesciunt optio atque id! Tempora!</p>
                            </div>
                            <button type="button" class="trending-more-btn">Read More<i
                                    class="fas fa-chevron-circle-right"></i></button>
                        </div>
                    </div>
                </a>

                <a href="#" style="text-decoration:none;color:#000;">
                    <div class="trending-card">
                        <img src="{{ url('img/frontend/video-article-page/video2.png') }}" alt="">
                        <div class="trending-card-txt-wrapper">
                            <div class="txt-inner-wrapper">
                                <h3>Interior Designing Guide lines</h3>
                                <h4>Carmelo Benilla Jr</h4>
                                <p class="trending-card-date-time">January 10, 2022</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error asperiores corporis
                                    illo magnam eligendi laborum facere! Dolor necessitatibus quidem suscipit vitae
                                    voluptate quos? Aliquam eligendi nesciunt optio atque id! Tempora!</p>
                            </div>
                            <button type="button" class="trending-more-btn">Read More<i
                                    class="fas fa-chevron-circle-right"></i></button>
                        </div>
                    </div>
                </a>

                <a href="#" style="text-decoration:none;color:#000;">
                    <div class="trending-card">
                        <img src="{{ url('img/frontend/video-article-page/video3.png') }}" alt="">
                        <div class="trending-card-txt-wrapper">
                            <div class="txt-inner-wrapper">
                                <h3>Interior Designing Guide lines</h3>
                                <h4>Carmelo Benilla Jr</h4>
                                <p class="trending-card-date-time">January 10, 2022</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error asperiores corporis
                                    illo magnam eligendi laborum facere! Dolor necessitatibus quidem suscipit vitae
                                    voluptate quos? Aliquam eligendi nesciunt optio atque id! Tempora!</p>
                            </div>
                            <button type="button" class="trending-more-btn">Read More<i
                                    class="fas fa-chevron-circle-right"></i></button>
                        </div>
                    </div>
                </a>

                <a href="#" style="text-decoration:none;color:#000;">
                    <div class="trending-card">
                        <img src="{{ url('img/frontend/video-article-page/video4.png') }}" alt="">
                        <div class="trending-card-txt-wrapper">
                            <div class="txt-inner-wrapper">
                                <h3>Interior Designing Guide lines</h3>
                                <h4>Carmelo Benilla Jr</h4>
                                <p class="trending-card-date-time">January 10, 2022</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error asperiores corporis
                                    illo magnam eligendi laborum facere! Dolor necessitatibus quidem suscipit vitae
                                    voluptate quos? Aliquam eligendi nesciunt optio atque id! Tempora!</p>
                            </div>
                            <button type="button" class="trending-more-btn">Read More<i
                                    class="fas fa-chevron-circle-right"></i></button>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>


@include('frontend.includes.search_filter_modal')

@endsection

@push('after-scripts')

<!-- filter popup script -->
<script>
    // dropdown box changing field
        const renderFields = async () => {
            let value = $('#propertyType').val();

            if(value == '') {


            }
            else {
                let url = '{{url('/')}}/api/get_property_type_details/' + value;

                const res = await fetch(url);
                const data = await res.json();
                const fields = (data[0]['activated_fields']);
                let template = '';
                let first = '';
                let second = '';

                for(let i = 0; i < fields.length; i++) {
                    if(i == 0) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                first = `<div>
                                            <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                            first = `<div>
                                                        <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        first = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                            else {
                                first = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    }

                    else if(i == 1) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                second = `<div>
                                            <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                        second = `<div>
                                                        <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                        <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        second = `<div>
                                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                            else {
                                second = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    }
                    else {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
                                template += `<div class="col-3">
                                            <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                            <select class="form-select" name="${name}" aria-label="${name}" name="${name}" id="${name}">
                                                <option value="">Any</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="greater-than-5">5+</option>
                                            </select>
                                        </div> `
                            }
                            else if (name == 'building_type') {
                                        template += `<div class="col-3">
                                                        <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                        <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                            <option value="">Any</option>
                                                            <option value="house">House</option>
                                                            <option value="row/townhouse">Row / Townhouse</option>
                                                            <option value="apartment">Apartment</option>
                                                            <option value="duplex">Duplex</option>
                                                            <option value="triplex">Triplex</option>
                                                            <option value="fourplex">Fourplex</option>
                                                            <option value="garden-home">Garden Home</option>
                                                            <option value="mobile-home">Mobile Home</option>
                                                            <option value="manufactured-home">Manufactured Home/Mobile</option>
                                                            <option value="special-purpose">Special Purpose</option>
                                                            <option value="residential-commercial-mix">Residential Commercial Mix</option>
                                                            <option value="manufactured-home">Manufactured Home</option>
                                                            <option value="commercial-apartment">Commercial Apartment</option>
                                                            <option value="two-apartment-house">Two Apartment House</option>
                                                            <option value="park-model-mobile-home">Park Model Mobile Home</option>
                                                        </select>
                                                    </div>`
                            }
                            else if (name == 'parking_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="boat-house">Boat House</option>
                                                        <option value="concrete">Concrete</option>
                                                        <option value="heated-garage">Heated Garage</option>
                                                        <option value="attached-garage">Attached Garage</option>
                                                        <option value="integrated-garage">Integrated Garage</option>
                                                        <option value="detached-garage">Detached Garage</option>
                                                        <option value="garage">Garage</option>
                                                        <option value="carport">Carport</option>
                                                        <option value="underground">Underground</option>
                                                        <option value="indoor">Indoor</option>
                                                        <option value="open">Open</option>
                                                        <option value="covered">Covered</option>
                                                        <option value="parking-pad">Parking Pad</option>
                                                        <option value="paved-yard">Paved Yard</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'zoning_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="commercial-retail">Commercial Retail</option>
                                                        <option value="commercial-office">Commercial Office</option>
                                                        <option value="commercial-mixed">Commercial Mixed</option>
                                                        <option value="industrial">Industrial</option>
                                                        <option value="industrial-light">Industrial-Light</option>
                                                        <option value="industrial-medium">Industrial-Medium</option>
                                                        <option value="industrial-heavy">Industrial-Heavy</option>
                                                        <option value="residential-low-density">Residential-Low Density</option>
                                                        <option value="residential-medium-density">Residential - Medium Density</option>
                                                        <option value="residential-high-density">Residential-High Density</option>
                                                        <option value="institutional">Institutional</option>
                                                        <option value="agricultural">Agricultural</option>
                                                        <option value="recreational">Recreational</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>`
                            }
                            else if (name == 'farm_type') {
                                        template += `<div class="col-3">
                                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                                    <select class="form-select" name="${name}" aria-label="${name}" id="${name}">
                                                        <option value="">Any</option>
                                                        <option value="animal">Animal</option>
                                                        <option value="cash-crop">Cash Crop</option>
                                                        <option value="hobby-farm">Hobby Farm</option>
                                                        <option value="market-gardening">Market Gardening</option>
                                                        <option value="nursery">Nursery</option>
                                                        <option value="greenhouse">Greenhouse</option>
                                                        <option value="orchard">Orchard</option>
                                                        <option value="vineyard">Vineyard</option>
                                                        <option value="feed-lot">Feed Lot</option>
                                                        <option value="boarding">Boarding</option>
                                                        <option value="mixed">Mixed</option>
                                                    </select>
                                                </div>`
                            }
                        }
                        else {
                            template += `<div class="col-3">
                                <div>
                                    <label for="${name}" class="form-label mb-0 mt-3">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>
                            </div>`
                        }
                    }
                }
                $('.first-incoming-field').html(first);
                $('.second-incoming-field').html(second);
                $('#incoming_fields').html(template);
            }
        }

        // window.addEventListener('DOMContentLoaded', () => renderFields());

    $('.filter-button').on('click', function(){
            renderFields();
    })

    $('.filter-reset').click(function(){
        $('#filter-form')[0].reset();
    });
</script>

<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
    },
    loop: true,
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
        }
    }
});
</script>


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