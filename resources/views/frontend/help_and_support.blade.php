@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')

@endpush

@section('content')

<section class="section-search-bar" id="section-search-bar">
    <div class="container">
        <div class="row">
            <span class="help-center"><a href=""><i class="bi bi-question-circle-fill"></i> HelpCenter</a></span>
        </div>
        <div class="row">
            <span class="title">Hello, How can we help ?</span>
            <div class="search-bar">
                <div class="inner-content">
                    <input type="search" id="helpAndSupportSearchBar" placeholder="Ask a question...">
                    <label for="helpAndSupportSearchBar"><i class="bi bi-search"></i></label>
                    <button type="button" class="search-btn">Search</button>
                </div>
            </div>
            
        </div>
    </div>
    <div class="dotted-background"></div>
</section>

<section class="section-category-slider" id="section-category-slider">
    <div class="container">
        <div class="row">
            <p>or choose a category to quickly find the help you need</p>
        </div>
        <div class="row">
            <div class="slider-container">
            <div class="splide">
                <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="inner-content">
                                    <img class="black-icon" src="{{url('img/frontend/help-and-support/flag-black.png')}}" alt="">
                                    <img class="green-icon" src="{{url('img/frontend/help-and-support/flag-green.png')}}" alt="">
                                    <span class="slide-text">Getting Started</span>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="inner-content">
                                    <img class="black-icon" src="{{url('img/frontend/help-and-support/price-tag-black.png')}}" alt="">
                                    <img class="green-icon" src="{{url('img/frontend/help-and-support/price-tag-green.png')}}" alt="">
                                    <span class="slide-text">Price &amp; Plans</span>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="inner-content">
                                    <img class="black-icon" src="{{url('img/frontend/help-and-support/shopping-bag-black.png')}}" alt="">
                                    <img class="green-icon" src="{{url('img/frontend/help-and-support/shopping-bag-green.png')}}" alt="">
                                    <span class="slide-text">Sales Question</span>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="inner-content">
                                    <img class="black-icon" src="{{url('img/frontend/help-and-support/guide-black.png')}}" alt="">
                                    <img class="green-icon" src="{{url('img/frontend/help-and-support/guide-green.png')}}" alt="">
                                    <span class="slide-text">Usage Guides</span>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="inner-content">
                                    <img class="black-icon" src="{{url('img/frontend/help-and-support/info-black.png')}}" alt="">
                                    <img class="green-icon" src="{{url('img/frontend/help-and-support/info-green.png')}}" alt="">
                                    <span class="slide-text">Information</span>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<section class="section-accordion" id="section-accordion">
    <div class="accordion-container">
        <div class="price-and-plans">
            <div class="row">
                <div class="header-section">
                    <span class="title">Pricing Plans</span>
                    <p class="content">Tropical Property Realtor is your premium property and real estate listing
                        website
                        featuring exclusive properties from multiple locations around the</p>
                </div>
            </div>
            <div class="row">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Accordion Item #1
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                                body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                                body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                body. Nothing more exciting happening here in terms of content, but just filling up the
                                space to make it look, at least at first glance, a bit more representative of how this
                                would
                                look in a real-world application.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-contact" id="section-contact">
    <div class="container">
        <div class="row">
            <div class="header-section">
                <span class="title">You still have a question ?</span>
                <p class="content">If you cannot find answer to your question in our FAQ, you can always contact us. We will answer to you shortly !</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="contact-box ms-auto">                    
                    <a href="tel:+94777000000"><i class="bi bi-telephone-fill"></i><span class="contact">+94 777000000</span></a>
                    <span class="text">We are always happy to help.</span>
                </div>
                
            </div>
            <div class="col">
                <div class="contact-box">                    
                    <a href="mailto:info@propertymarketlive.com"><i class="bi bi-envelope-fill"></i><span class="contact">info@propertymarketlive.com</span></a>
                    <span class="text">The best way to get answer faster.</span>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="dotted-background"></div>
</section>

@endsection

@push('after-scripts')

<script>
    // Slider
    var splide = new Splide( '.splide', {
    perPage: 3,
    fixedWidth : '25%',
    pagination: false,
    rewind : true,
    breakpoints: {
    991: {
      perPage: 3,
      fixedWidth : false,
    },
    767: {
      perPage: 2,
      fixedWidth : false,
      arrows: false,
    },
  },
} );

    splide.mount();
</script>

@endpush
