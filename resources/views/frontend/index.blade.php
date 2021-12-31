@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/index.css') }}" rel="stylesheet">

<style>
.free_listning {
    top: 0;
    left: 0;
}

.custom-map-control-button {
    background-color: #fff;
    border: 0;
    border-radius: 2px;
    box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
    margin: 10px;
    padding: 0 0.5em;
    font: 400 18px Roboto, Arial, sans-serif;
    overflow: hidden;
    height: 40px;
    cursor: pointer;
}
.custom-map-control-button:hover {
    background: #ebebeb;
}

</style>

<!-- map links -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

<script>
    var mapDiv;

    function initMap() {
        mapDiv = document.getElementById('map');

        var map = new google.maps.Map(mapDiv, {
            center: new google.maps.LatLng(6.9271, 79.8612),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            // styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}] // "Subtle Grayscale" style found on snazzymaps.com

        });
        var marker = [];
        $.ajax({
            type: "GET",
            url: "{{ url('api/map_api')  }}",
            success: function(data) {
                /*map marker and clustering start here*/
                const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
                const place = data;
                    // Add some markers to the map.
                    const markers = place.map((position, i) => {
                            const label = labels[i % labels.length];
                            const marker = new google.maps.Marker({
                            position,
                            label,
                            });

                           console.log(data[i].id);


                            // markers can only be keyboard focusable when they have click listeners
                            // open info window when marker is clicked
                            marker.addListener("click", () => {
                                const infoWindow = new google.maps.InfoWindow({
                                    content: '<div class="card custom-shadow info-card" style="height: 320px;">' +
                                    '<img src="'+ data[i].feature_image +'" alt="" class="img-fluid w-100" style="object-fit: cover;height: 130px;">' +
                                        '<div class="card-body">' +
                                        '<h5 class="fw-bold">'+ data[i].name +'</h5>' +
                                        '<p class="info-price"> Rs.'+ data[i].price + '</p>' +
                                            '<p style="font-size: 12px;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">'+ data[i].description + '</p>' +
                                           
                                        '<p>3<i class="fas fa-bed ms-2 me-3" aria-hidden="true"></i> 5<i class="fas fa-bath ms-2" aria-hidden="true"></i></p>' +
                                           + '</div>' + '</div>',
                                    disableAutoPan: true,
                                });

                            infoWindow.open({
                                anchor: marker,
                                map,
                                shouldFocus: false,
                            });
                            });
                            return marker;
                        });



                        // Add a marker clusterer to manage the markers.
                        const markerCluster = new markerClusterer.MarkerClusterer({ map, markers });

                        /*map marker and clustering ends here*/


                // var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }
        });

        /*ajax end here*/

        /*geolocation code start here*/
        infoWindow = new google.maps.InfoWindow();

        const locationButton = document.createElement("button");

        locationButton.textContent = "Pan to Current Location";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent(`<div class="tooltipContainer">
                        <span class="tooltip" data-tooltip = "Share your Location!" data-tooltip-location = "bottom">
                            <i class="geo-i fas fa-map-marker-alt"></i>
                        </span>
                        <h5 class="geo">Location Found!</h5>
                        <!-- Added for Pulsing Circle -->
                        <div class="circle" style="animation-delay: 0s"></div>
                        <div class="circle" style="animation-delay: 1s"></div>
                        <div class="circle" style="animation-delay: 2s"></div>
                        <div class="circle" style="animation-delay: 3s"></div>
                        <!-- End of Add for Pulsing Circle -->
                    </div>`);
                infoWindow.open(map);
                map.setCenter(pos);
                },
                () => {
                handleLocationError(true, infoWindow, map.getCenter());
                }
            );
            } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
            }
        });


        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
        }



        /*geolocation code ends here*/
            



        
    }



    //google.maps.event.addDomListener(window, 'load', initialize);
</script>




@endpush

@section('content')


@include('frontend.includes.search')

<div id="map"></div>



<!-- <div class="container index" style="margin-top: 2rem;">
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
<!-- </div>
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
    </div>  -->


<!-- <div class="properties" style="margin-top: 3rem;">
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
                    <a href="{{ get_settings('sidebar_advertiment_link_1') }}" target="_blank">
                        <div class="card custom-shadow">
                            <img src="{{ uploaded_asset(get_settings('sidebar_advertiment_1')) }}" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
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
                    <a href="{{ get_settings('sidebar_advertiment_link_2') }}" target="_blank">
                        <div class="card custom-shadow">
                            <img src="{{ uploaded_asset(get_settings('sidebar_advertiment_2')) }}" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> -->

<div class="properties" style="margin-top: 3rem;">
    <div class="container">
        <h1>Featured Properties</h1>
        <div class="row mt-5 mb-4">

            <div class="col-9">
                <div class="row">
                    @if(count($featured_properties) != 0)
                    @foreach($featured_properties as $key => $featured_prop)
                    <div class="col-4">
                        <div class="card custom-shadow position-relative" style="min-height:307px;  max-height:307px">
                            <a href="{{route('frontend.for_sale_single',$featured_prop->id)}}"
                                style="text-decoration:none">
                                <img src="{{ uploaded_asset($featured_prop->feature_image_id) }}" alt=""
                                    class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @if($featured_prop->listning_type == 'free_listning')
                                        <div class="free_listning position-absolute badge badge-warning p-2 m-2">Free Listning</div>
                                    @endif
                                <div class="card-body text-center">
                                    <h5 class="fw-bold">{{ get_currency(request() ,$featured_prop->price)}}</h5>
                                    @if($featured_prop->beds == null)
                                    @else
                                    <p>{{$featured_prop->beds}} Bed Semidetached house</p>
                                    @endif
                                    <p>{{$featured_prop->name}}</p>
                                    <p>{{$featured_prop->city}},
                                        {{App\Models\Country::where('id',$featured_prop->country)->first()->country_name}}
                                    </p>
                                    <p>
                                        @if($featured_prop->beds != null)
                                        {{$featured_prop->beds}}<i class="fas fa-bed ms-2 me-3"></i>
                                        @endif
                                        @if($featured_prop->baths != null)
                                        {{$featured_prop->baths}}<i class="fas fa-bath ms-2"></i>
                                        @endif
                                    </p>
                                </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    @include('frontend.includes.not_found',[
                    'not_found_title' => 'Featured properties not found',
                    'not_found_button_caption' => null
                    ])
                    @endif
                </div>
            </div>

            <div class="col-3">
                <div class="row">
                    <div class="col-12"><a href="{{ get_settings('sidebar_advertiment_link_1') }}" target="_blank">
                            <div class="sidebar-card"><img width="100%"
                                    src="{{ uploaded_asset(get_settings('sidebar_advertiment_1')) }}" alt="banner"></div>
                        </a></div>

                    <!-- <div class="col-12">
                        <a href="{{ get_settings('sidebar_advertiment_link_1') }}" target="_blank">
                            <div class="sidebar-card">
                                <img width="100%" src="{{ uploaded_asset(get_settings('sidebar_advertiment_1')) }}" alt="banner">
                            </div>
                        </a>
                    </div> -->

                    <!-- <div class="col-12">

                        <div class="col-12">
                            <a href="{{ get_settings('sidebar_advertiment_link_1') }}" target="_blank">
                                <div class="card custom-shadow">
                                    <img src="{{ uploaded_asset(get_settings('sidebar_advertiment_1')) }}" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="{{ get_settings('sidebar_advertiment_link_2') }}" target="_blank">
                                <div class="card custom-shadow">
                                    <img src="{{ uploaded_asset(get_settings('sidebar_advertiment_2')) }}" alt="" class="img-fluid w-100" style="height: 19.2rem; object-fit: cover;">
                                </div>
                            </a>
                        </div> -->
                </div>
            </div>


        </div>
    </div>
</div>

@if(count($latest_properties) != 0)
<div class="container">
<h2 class="sub-topics">Latest New Developments</h2>
</div>

<div class="container swiper-container" style="margin-top: 4rem;">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            @foreach($latest_properties as $key => $latest_prop)
            <div class="swiper-slide">
                <div class="card custom-shadow position-relative" style="min-height:307px;  max-height:307px">
                    <a href="{{route('frontend.for_sale_single',$latest_prop->id)}}" style="text-decoration:none">
                        <img src="{{ uploaded_asset($latest_prop->feature_image_id) }}" alt="" class="img-fluid w-100"
                            style="height: 10rem; object-fit: cover;">
                            @if($latest_prop->listning_type == 'free_listning')
                                <div class="free_listning position-absolute badge badge-warning p-2 m-2">Free Listning</div>
                            @endif
                            <div class="card-body text-center">
                            <h5 class="fw-bold">{{ get_currency(request() ,$latest_prop->price)}}</h5>
                            @if($latest_prop->beds == null)
                            @else
                            <p>{{$latest_prop->beds}} Bed Semidetached house</p>
                            @endif
                            <p>{{$latest_prop->name}}</p>
                            <p>{{$latest_prop->city}},
                                {{App\Models\Country::where('id',$latest_prop->country)->first()->country_name}}</p>
                            <p>
                                @if($latest_prop->beds != null)
                                {{$latest_prop->beds}}<i class="fas fa-bed ms-2 me-3"></i>
                                @endif
                                @if($latest_prop->baths != null)
                                {{$latest_prop->baths}}<i class="fas fa-bath ms-2"></i>
                                @endif
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
@endif


<!-- <div class="container social" style="margin-top: 5rem; margin-bottom: 3rem;">

    <!-- <div class="row justify-content-center align-items-center mb-5">
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
    </div> -->

    <!-- <div class="row"> -->
        <!-- <div class="col-3 fb">
            <div class="card" style="height: 25rem;">
                <img src="{{ url('img/frontend/index/social_1.png') }}" class="img-fluid w-100" alt="..."
                    style="object-fit: cover; height: 13rem;">
                <div class="card-body p-2">
                    <p class="card-text mb-1" style="font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random
                        people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment
                        #SHIBARMY ⚠followers only giveaway⚠ #BTC #ETH #Giveaway #ADA</p>

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
                <img src="{{ url('img/frontend/index/social_2.png') }}" class="card-img-top" alt="..."
                    style="object-fit: cover; height: 13rem;">
                <div class="card-body p-2">
                    <p class="card-text mb-1" style="font-size: 0.8rem;">We're giving away 100,000,000 $Shib to 5 random
                        people (20,000,000 each)Money bag RocketFollow Me! Gem stoneRetweet and Like. Open handsComment
                        #SHIBARMY ⚠followers only giveaway⚠ #BTC #ETH #Giveaway #ADA</p>

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
        </div> -->

        <!-- <div class="col-3 fb">
                <a href="https://www.facebook.com/tallentor" style="color:black" target="_blank" id="stack_panel">
                    <div class="card" style="height: 26rem;">
                        <img id="facebook_src" src="" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                        <div class="card-body">
                            <p class="card-text mb-1" id="description_fb"></p>
                            
                            <div class="text-right">
                                <img src="{{ url('img/fb_color.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

         
            <div class="col-3 twitter">
                <a href="" style="color:black" target="_blank" class="twitter-link">
                    <div class="card" style="height: 26rem;">
                        <img src="{{ url('img/twitter_large.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                        <div class="card-body">
                            <p class="card-text mb-1" id="description_twitter"></p>
                            
                            <div class="text-right">
                                <img src="{{ url('theme_light/assets/footer/twitter_color.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            @if(count(App\Models\Posts::get()) != 0)
                @foreach(App\Models\Posts::latest()->take(2)->get() as $key => $blog_posts)  
                    <div class="col-3">
                        <div class="card" style="height: 26rem;">
                            <a href="{{url('individual_post',$blog_posts->id)}}" style="color:black; text-decoration:none">
                                <img src="{{ uploaded_asset($blog_posts->feature_image) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                            </a>
                            
                            <div class="card-body p-2">
                                <p class="card-text mb-1"
                                    style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;">
                                    {{$blog_posts->description}}</p>

                                <div class="row justify-content-between mt-3 align-items-center">
                                    <div class="col-6">
                                        <!-- <p style="color: #55ACEE; font-size: 0.8rem">7 minutes ago</p> -->
                                    <!-- </div>
                                    <div class="col-6 text-end">                                       

                                        @if(App\Models\Category::where('id',$blog_posts->category)->first() != null)
                                            <a style="color: #0F9D58; font-size: 1.1rem;">{{App\Models\Category::where('id',$blog_posts->category)->first()->name}}</a>
                                        @else
                                            <p style="color: Red; font-size: 0.8rem;">Category Deleted</p>   
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        

            
 -->

    <!-- </div> 

    
</div>  -->


<!-- social section start here -->

<div class="container-fluid social-banner">
    <div class="container social">
        <!-- <div class="row justify-content-center align-items-center mb-5">
            <div class="col-1 text-center">
                <a href="https://www.facebook.com/tallentor" target="_blank"><i class="fab fa-facebook-square"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <div class="col-1 text-center">
                <!-- <a href=""><img src="https://tallentor.com/theme_light/assets/footer/youtube.png" alt="" class="img-fluid"></a> -->
                <!-- <a href=""><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
            <div class="col-1 text-center">
                <a href=""><i class="fab fa-linkedin"></i></a>
            </div>
        </div>  -->
        <h2 class="sub-topic center-topic">Latest from Property Market</h2>

        <div class="row" style="margin-top:30px;">
            <div class="col-4">
                <a href="https://www.facebook.com/tallentor" style="color:black" target="_blank" id="stack_panel">
                    <div class="card" style="height: 27rem;">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftallentor%2F&amp;tabs=timeline&amp;width=340&amp;height=500&amp;small_header=true&amp;adapt_container_width=false&amp;hide_cover=false&amp;show_facepile=false&amp;appId=4531192260303691" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </a>
            </div>


                                        
                    <div class="col-4">
                        <a href="https://tallentor.com/blog/Club" style="color:black">
                            </a><div class="card position-relative" style="height: 27rem;"><a href="https://tallentor.com/blog/Club" style="color:black">
                                
                                    <div class="px-4 py-2" style="-webkit-box-shadow: inset 0.5px 14px -8px rgba(0,0,0,0.75); -moz-box-shadow: inset 0.5px 14px -8px rgba(0,0,0,0.75); box-shadow: inset 0px 0.5px 14px -8px rgba(0,0,0,0.75);">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-center">
                                                <img src="{{ url('img/frontend/index/talk-property.png') }}" alt="" class="img-fluid" style="height:60px;">
                                            </div>
                                        </div>
                                    </div>
                                
                                <img src="{{ url('img/frontend/index/PML-talk.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                                </a><div class="card-body"><a href="https://tallentor.com/blog/Club" style="color:black">
                                    <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 4; -webkit-box-orient: vertical;">When you use an application on your mobile phone or smart devices the application connects to the Internet and sends data to a server. The server then retrieves that data, interprets it, performs the necessary actions and sends it back to your phone. The application then interprets that data and presents you with the information you wanted in a readable way. This is what an API is - all of this happens via API.</p>
                                    
                                    </a><div class="text-right mb-1"><a href="https://tallentor.com/blog/Club" style="color:black">
                                                                                </a><div class="position-absolute read" style="right:20px;"><a href="https://tallentor.com/blog/Club" style="color:black">
                                            </a><a href="https://tallentor.com/blog/Club" style="font-size: 0.8rem; color: #0033FF;">View More</a>
                                        </div>
                                                                            
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                            
                    <div class="col-4">
                        <a href="https://tallentor.com/blog/News" style="color:black">
                            </a><div class="card position-relative" style="height: 27rem;"><a href="https://tallentor.com/blog/News" style="color:black">
                                                                    <div class="px-4 py-2" style="-webkit-box-shadow: inset 0.5px 14px -8px rgba(0,0,0,0.75); -moz-box-shadow: inset 0.5px 14px -8px rgba(0,0,0,0.75); box-shadow: inset 0px 0.5px 14px -8px rgba(0,0,0,0.75);">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-center" style="height:60px;">
                                                <img src="{{ url('img/frontend/index/property-news.png') }}" alt="" class="img-fluid" style="height:40px;margin-top:15px;">
                                            </div>
                                        </div>
                                    </div>

                                
                                <img src="{{ url('img/frontend/index/PML-news.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                                </a><div class="card-body"><a href="https://tallentor.com/blog/News" style="color:black">
                                    <p class="card-text mb-1" style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 4; -webkit-box-orient: vertical;">Our team brought years of analytical and development experience together to bring Tallentor LMS to life. 
Expandability and connectivity with third party systems are the key features of our LMS, and our team is working on further enhancements and will release new versions latest features.</p>
                                    
                                    </a><div class="text-right mb-1"><a href="https://tallentor.com/blog/News" style="color:black">
                                                                                </a>
                                                                                
                                            <div class="position-absolute read" style="right:20px;"><a href="https://tallentor.com/blog/News" style="color:black">
                                            </a><a href="https://tallentor.com/blog/News" style="font-size: 0.8rem; color: #0033FF;">View More</a>
                                        </div>
                                                                            
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                            
     
        </div>
    </div>
</div>



<!-- social section ends here -->




</div>


@include('frontend.includes.search_filter_modal')


@endsection

@push('after-scripts')


<!-- Async script executes immediately and must be after any DOM elements used in callback. -->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap">
</script>



<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    slidePerGroup: 1,
    spaceBetween: 20,
    // spaceBetween: 20,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    }
});
</script>


<script>
$(document).ready(function() {

    let post_type = '<?php 

            if($latest_post != null){   
                echo $latest_post->type; 
            }
            ?>';


    if (post_type != 'youtube') {
        $('.article').removeClass('d-none');
    } else {
        $('.video').removeClass('d-none');
    }


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


<script>
// dropdown box changing field
const renderFields = async () => {
    let value = $('#propertyType').val();

    if (value == '') {


    } else {
        let url = '{{url(' / ')}}/api/get_property_type_details/' + value;

        const res = await fetch(url);
        const data = await res.json();
        const fields = (data[0]['activated_fields']);
        let template = '';
        let first = '';
        let second = '';

        for (let i = 0; i < fields.length; i++) {
            if (i == 0) {
                let name = fields[i].split(' ').join('_').toLowerCase();
                if (name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' ||
                    name == 'zoning_type' || name == 'farm_type') {
                    if (name == 'beds' || name == 'baths') {
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
                    } else if (name == 'building_type') {
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
                    } else if (name == 'parking_type') {
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
                    } else if (name == 'zoning_type') {
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
                    } else if (name == 'farm_type') {
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
                } else {
                    first = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                }
            } else if (i == 1) {
                let name = fields[i].split(' ').join('_').toLowerCase();
                if (name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' ||
                    name == 'zoning_type' || name == 'farm_type') {
                    if (name == 'beds' || name == 'baths') {
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
                    } else if (name == 'building_type') {
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
                    } else if (name == 'parking_type') {
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
                    } else if (name == 'zoning_type') {
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
                    } else if (name == 'farm_type') {
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
                } else {
                    second = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                }
            } else {
                let name = fields[i].split(' ').join('_').toLowerCase();
                if (name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' ||
                    name == 'zoning_type' || name == 'farm_type') {
                    if (name == 'beds' || name == 'baths') {
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
                    } else if (name == 'building_type') {
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
                    } else if (name == 'parking_type') {
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
                    } else if (name == 'zoning_type') {
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
                    } else if (name == 'farm_type') {
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
                } else {
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

$('.filter-button').on('click', function() {
    renderFields();
})

$('.filter-reset').click(function() {
    $('#filter-form')[0].reset();
});
</script>


<script>
    $.get("{{route('facebook_news')}}", function(data, status){
        var backimage_f = JSON.parse(data);
        $("#facebook_src").attr("src",backimage_f.image);
        $("#description_fb").html(backimage_f.title);
        // $("#stack_panel").attr("href",backimage_f.link);
    }).
    fail(function(jqXHR, textStatus, errorThrown) {
        $('.fb').addClass('d-none');
    });
    $.get("{{route('twitter_news')}}", function(data, status){
        var data = JSON.parse(data);
        $(".twitter-link").attr("href", data.link);
        $("#description_twitter").text(data.title);
    }).
    fail(function(jqXHR, textStatus, errorThrown) {
        $('.twitter').addClass('d-none');
    });
</script>

@endpush