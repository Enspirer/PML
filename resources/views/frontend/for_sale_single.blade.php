@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/for_sale_single.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('frontend.includes.search')


    <div class="container index" style="margin-top: 2rem;">
        <div class="row">
            <div class="col-12">
                <p><a href="" class="text-decoration-none text-dark fw-bold">Back to Search Results</a></p>
            </div>
        </div>
    </div>

    <div class="container mt-4" style="margin-bottom: 8rem;">
        <div class="row">
            <div class="col-9">              
                <div class="row">
                    <div class="col-9">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @php
                                    $str_arr2 = preg_split ("/\,/", $property->image_ids);
                                @endphp
                                @foreach($str_arr2 as $key=> $pre)
                                    <div class="swiper-slide">
                                        <img src="{{ uploaded_asset($pre) }}"/>
                                    </div>
                                @endforeach
                                <!-- <div class="swiper-slide">
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
                                </div> -->
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                            <div class="position-absolute apart-avail">
                                <button class="btn fw-bold me-3">APARTMENT</button>
                                <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($str_arr2 as $key=> $pre)
                                    <div class="swiper-slide">
                                        <img src="{{ uploaded_asset($pre) }}"/>
                                    </div>
                                @endforeach
                                <!-- <div class="swiper-slide">
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
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-9">
                        <h3 class="fw-bold mt-4 mb-1">${{$property->price}}</h3>

                        <p class="fw-bold" style="font-size: 1.2rem; color: black">
                            @if($property->beds != null)
                                {{$property->beds}} Bed flat for sale
                            @endif
                        </p>

                        <p class="mb-1" style="font-size: 1rem;">{{$property->city}}, {{App\Models\Country::where('id',$property->country)->first()->country_name }}
                        </p>
                        
                    </div>

                    <div class="col-3">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-6">
                                @if($property->beds != null)
                                    <p class="mt-4" style="font-size: 1.3rem;"><i class="fas fa-bed me-3" style="color: rgb(57, 181, 74, 0.7)"></i>{{$property->beds}}</p>
                                @endif
                            </div>
                            <div class="col-6">
                                @if($property->baths != null)
                                    <p class="mt-4" style="font-size: 1.3rem;"><i class="fas fa-bath me-3" style="color: rgb(57, 181, 74, 0.7)"></i>{{$property->baths}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div id="map" style="height: 350px; width: 100%"></div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="row">
                            <div class="features col-8">
                                <div class="custom-shadow pt-4 pb-3 px-3">
                                    <h4 class="fw-bold">Features and Description</h4>
                                    <div class="row mt-2 ms-2" aria-expanded="false">
                                        <div class="col-12">
                                            <ul>
                                                <div class="row">


                                                @if($property->baths == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Baths : {{ $property->baths }}</li>
                                                    </div>
                                                @endif 

                                                @if($property->beds == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Beds : {{ $property->beds }}</li>
                                                    </div>
                                                @endif  
                                                                            
                                                @if($property->parking_type == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Parking Type : {{ $property->parking_type }}</li>
                                                    </div>
                                                @endif 

                                                @if($property->building_type == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Building Type : {{ $property->building_type }}</li>
                                                    </div>
                                                @endif 

                                                @if($property->farm_type == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Farm Type : {{ $property->farm_type }}</li>
                                                    </div>
                                                @endif 

                                                @if($property->open_house_only == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Open House Only : {{ $property->open_house_only }}</li>
                                                    </div>
                                                @endif 

                                                @if($property->number_of_units == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Number of Units : {{ $property->number_of_units }}</li>
                                                    </div>
                                                @endif 

                                                @if($property->land_size == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Land Size : {{ $property->land_size }}</li>
                                                    </div>
                                                @endif 

                                                @if($property->zoning_type == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Zoning Type : {{ $property->zoning_type }}</li>
                                                    </div>                                
                                                @endif 

                                                @if($property->building_size == null)
                                                @else
                                                    <div class="col-6 p-0">
                                                        <li>Building Size : {{ $property->building_size }}</li>
                                                    </div>
                                                @endif 

                                                    <!-- <div class="col-6 p-0">
                                                        <li>Leasehold</li>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <li>Open Plan Design</li>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <li>Studio, 1,2 & 3 Beds</li>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <li>Jewellery Quarter 330m from Station</li>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <li>Luxury Residential Investment</li>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <li>Limited Availability!</li>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <li>View Floor Plans Today</li>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <li>Prices Starting from $450, 000</li>
                                                    </div> -->
                                                </div>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row mt-3 paragraph collapse" id="collapseExample">
                                        <div class="col-12">
                                            <h5 class="fw-bold mb-2">Description</h5>
                                            <p>{{ $property->description }}</p>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center text-center mt-3">
                                        <div class="col-6 p-0">
                                            <i class="fas fa-chevron-down ms-1 collapsed" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size: 1rem; cursor: pointer; color: #666666"></i>
                                            <i class="fas fa-chevron-up ms-1 collapsed" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="display: none; font-size: 1rem; cursor: pointer; color: #666666"></i>
                                            <a role="button" class="collapsed text-decoration-none collapse-button fw-bold" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="font-size: 1rem; color: #666666"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="custom-shadow pt-4 pb-3 px-3 text-center">
                                            <img src="{{ uploaded_asset($agent->photo) }}" alt="" class="img-fluid mb-3" style="object-fit: cover; height: 7rem;">
                                            <h4 class="fw-bold">
                                                @if($agent->agent_type == 'Individual')
                                                    {{ $agent->name }}
                                                @else
                                                    {{ $agent->company_name }}
                                                @endif
                                            </h4>
                                            <h5>{{ $agent->agent_type }} Agents</h5>

                                            <div class="row justify-content-center mt-3">
                                                <div class="col-12 text-center mb-2">
                                                    <a href="tel:{{ $agent->telephone }}" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid #707070; background-color: #35495E">
                                                        <div class="row justify-content-center">
                                                            <div class="col-3 p-0">
                                                                <i class="fas fa-phone-alt"></i>
                                                            </div>
                                                            <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                                {{ $agent->telephone }}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-12 text-center mb-2">
                                                    <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                                        <div class="row justify-content-center">
                                                            <div class="col-3 p-0">
                                                                <i class="fas fa-envelope"></i>
                                                            </div>
                                                            <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                                Send email to agent
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-12 text-center mb-2">
                                                    <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                                        <div class="row justify-content-center">
                                                            <div class="col-3 p-0">
                                                                <i class="far fa-heart"></i>
                                                            </div>
                                                            <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                                Save this Property
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 similar">
                    <div class="col-12">
                        <h5 class="fw-bold">You may also like</h5>

                        <div class="row mt-3">
                            @foreach($random as $ran)
                                <div class="col-4">
                                    <div class="card custom-shadow position-relative" style="min-height: 320px; max-height: 320px;">
                                        <a href="{{ route('frontend.for_sale_single',$ran->id) }}" class="text-decoration-none">
                                            <img src="{{ uploaded_asset($ran->feature_image_id) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                        </a>
                                        <div class="card-body mt-3">
                                            <div class="row mb-2">
                                                <div class="col-10">
                                                    <h5 class="fw-bold">${{$ran->price}}</h5>
                                                </div>
                                                <div class="col-1">
                                                    <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>
                                                </div>
                                            </div>
                                            
                                            <h6 class="fw-bold mb-2">
                                                @if($ran->beds != null)
                                                    {{$ran->beds}} Bed Semidetached house
                                                @endif
                                            </h6>
                                            <!-- <p>541, Rosewood place,</p> -->
                                            <p class="mb-1"> {{$ran->city}}, {{App\Models\Country::where('id',$ran->country)->first()->country_name }}</p>
                                            <p>
                                                @if($ran->beds == null)
                                                @else
                                                    {{ $ran->beds }}<i class="fas fa-bed ms-2 me-3"></i>
                                                @endif
                                                @if($ran->baths == null)
                                                @else
                                                    {{ $ran->baths }}<i class="fas fa-bath ms-2"></i>
                                                @endif
                                            </p>
                                        </div>

                                        <div class="position-absolute apart-avail">
                                            <button class="btn fw-bold me-3">APARTMENT</button>
                                            <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                        </div>

                                        <div class="row align-items-center prom-logo position-absolute">
                                            <div class="col-6">
                                                @if($ran->promoted == 'Enabled')
                                                    <div class="py-1 ps-3" style="background-color: #FF0000;">
                                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                                    </div>
                                                @endif                                                
                                            </div>
                                            <div class="col-6 text-end">
                                                @if(App\Models\AgentRequest::where('user_id',$ran->user_id)->first() != null)
                                                    <img src="{{ uploaded_asset(App\Models\AgentRequest::where('user_id',$ran->user_id)->first()->logo) }}" width="50%" style="object-fit:cover">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- <div class="col-4">
                                <div class="card custom-shadow position-relative">
                                    <img src="{{ url('img/frontend/for_sale/2.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    <div class="card-body mt-3">
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
                                    <img src="{{ url('img/frontend/for_sale/3.png') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    <div class="card-body mt-3">
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
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end mt-3">
                    <div class="col-6 text-end">
                        <a href="" class="text-decoration-underline text-dark">See all residential properties to sell</a>
                    </div>
                </div>
            </div>

                    

            <div class="col-3">
                <div class="row">
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ uploaded_asset(get_settings('sidebar_advertiment_1')) }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="{{ get_settings('sidebar_advertiment_link_1') }}" target="_blank" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ uploaded_asset(get_settings('sidebar_advertiment_2')) }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="{{ get_settings('sidebar_advertiment_link_2') }}" target="_blank" class="btn find-out">Find Out More</a>
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
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        direction: 'vertical'
      });
      var swiper2 = new Swiper(".mySwiper2", {
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
        $('.collapse-button').on('click', function(){
            $(".fas fa-chevron-down").hide();
            $(".fas fa-chevron-up").show();
            
            $(".features i").toggle();
        });
    </script>


    <script>
        function initMap() {
            let options = {
                zoom: 12,
                center: {lat: 6.9271, lng: 79.8612}
            }

            let map = new google.maps.Map(document.getElementById('map'), options);

            let marker = new google.maps.Marker({
                position: {lat: 6.904955079710811, lng: 79.86117616105729},
                map:map
            });

            let infoWindow = new google.maps.InfoWindow({
                content:    `<div class="row align-items-center" style="height: 170px; width: 200px">
                                <div class="col-12">
                                    <img src="{{ url('img/frontend/for_sale/1.png') }}" alt="" class="img-fluid w-100 mb-2" style="height: 98px!important; object-fit: cover!important; border-radius: 13px;">
                                </div>
                                <div class="col-12">
                                    <h5 class="fw-bold mb-1" style="color: #39B54A">$450, 000</h5>
                                    <p class="mb-2" style="font-size: 0.8rem;">541, Rosewood place, colombo, Sri Lanka</p>
                                </div>
                            </div>`
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });

            infoWindow.open(map, marker);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap" type="text/javascript"></script>


@endpush