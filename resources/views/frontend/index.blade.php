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
    border: 0;
    border-radius: 10px;
    box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
    margin: 10px;
    padding: 0 0.5em;
    font: 400 18px Roboto, Arial, sans-serif;
    overflow: hidden;
    height: 40px;
    cursor: pointer;
    background: #16202c;
    color: white;
}
.custom-map-control-button:hover {
    background: #060a0d;

}

</style>

<!-- map links -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>


<script>
    var mapDiv;

    function initMap() {
        mapDiv = document.getElementById('map');

                @if($default_country == null)
        var map = new google.maps.Map(mapDiv, {
                center: new google.maps.LatLng(6.9271, 79.8612),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP,

                // styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}] // "Subtle Grayscale" style found on snazzymaps.com

            });



        // Add the circle for this city to the map.
        const cityCircle = new google.maps.Circle({
            strokeColor: "#201a4a",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#201a4a",
            fillOpacity: 0.10,
            map,
            center:  new google.maps.LatLng(6.9271, 79.8612),
            radius: Math.sqrt(2714856),

        });
                @else


        var map = new google.maps.Map(mapDiv, {
                center: new google.maps.LatLng({{$default_country->lat}}, {{$default_country->lng}}),
                zoom: 12,
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                // styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}] // "Subtle Grayscale" style found on snazzymaps.com

            });
        const cityCircle = new google.maps.Circle({
            strokeColor: "#201a4a",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#201a4a",
            fillOpacity: 0.10,
            map,
            center:  new google.maps.LatLng(6.9271, 79.8612),
            radius: Math.sqrt(2714856),
        });
                @endif



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

                            content:  '<div class="card custom-shadow info-card" style="height: 320px;">' + '<a href="http://propertymarketlive.com/for-sale/single-property/' +  data[i].id + '">' +
                            '<img src="'+ data[i].feature_image +'" alt="" class="img-fluid w-100" style="object-fit: cover;height: 130px;">' +
                            '<div class="card-body">' +
                            '<h5 class="fw-bold">'+ data[i].name +'</h5>' +
                            '<p class="info-price"> Rs.'+ data[i].price + '</p>' +
                            '<p style="font-size: 12px;overflow: hidden;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">'+ data[i].description + '</p>' +

                            '<p>3<i class="fas fa-bed ms-2 me-3" aria-hidden="true"></i> 5<i class="fas fa-bath ms-2" aria-hidden="true"></i></p>' +
                            + '</div>' + '</a>'+  '</div>',
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

        locationButton.innerHTML = "Pan to Current Location";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);

        marker = new google.maps.Marker({
            shadow: null,
            zIndex: 999,
            map,
            draggable: true,
            label: {
                fontFamily: 'Fontawesome',
                content: '<h2>Hello</h2>'
            }
        });

        locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        $.ajax({
                            type: "GET",
                            url: "{{ url('api/nest_property')  }}/"+position.coords.longitude + "/" + position.coords.latitude ,
                            success: function(data) {
                                infoWindow.setPosition(pos);

                                var resultcontent = '' +
                                    '<div class="" id="map_resoult" style="height: 420px;width: 340px;">' +

                                    '</div>';
                                infoWindow.setContent(resultcontent);

                                setTimeout(function () {
                                    $('#map_resoult').html( data );
                                }, 1000);


                                marker.setPosition(pos);
                                cityCircle.setPosition(pos);

                            }
                        });


                        infoWindow.open({
                            anchor: marker,
                            map,
                            shouldFocus: false,
                        });

                        marker.addListener("click", () => {
                            infoWindow.open({
                                anchor: marker,
                                map,
                                shouldFocus: false,
                            });
                        });

                        map.setCenter(pos);
                        map.setZoom(17);
                        map.panTo(marker.position);
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

        marker.addListener("dragend", e => {
            const pos = {
                lat: marker.getPosition().lat(),
                lng: marker.getPosition().lng(),
            };

            $.ajax({
                type: "GET",
                url: "{{ url('api/nest_property')  }}/"+ marker.getPosition().lng() + "/" +  marker.getPosition().lat() ,
                success: function(data) {
                    infoWindow.setPosition(pos);

                    var resultcontent = '' +
                        '<div class="" id="map_resoult" style="height: 420px;width: 340px;">' +

                        '</div>';
                    infoWindow.setContent(resultcontent);

                    setTimeout(function () {
                        $('#map_resoult').html( data );
                    }, 1000);


                    marker.setPosition(pos);
                    cityCircle.center(pos);

                }
            });

            console.log(pos);


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

<div id="preloader">
  <div id="status">
     <div class="spinner">
      <div class="rect1"></div>
      <div class="rect2"></div>
      <div class="rect3"></div>
      <div class="rect4"></div>
      <div class="rect5"></div>
    </div>
  </div>
</div>

<div id="loadingDiv" class="overlay-loader">
    <div class="loading-overlay">
        <!-- <h2>Loading div</h2> -->
        <div class="first-wrapper">
            <div class="square-loader">
                <div class="square first_square"></div>
                <div class="square second_square"></div>
                <div class="square third_square"></div>
            </div>
        </div>

    </div>
</div>
  

<div class="properties" style="margin-top: 3rem;">
    <div class="container">
        <h1>Featured Properties</h1>
        <div class="row mt-5 mb-4">

            <div class="col-9 col-xs-12 col-tab-12">
                <div class="row">
                    @if(count($featured_properties) != 0)
                        @foreach($featured_properties as $key => $featured_prop)
                            <div class="col-4 col-xs-12 col-tab-50">
                                <div class="card custom-shadow position-relative" style="min-height:307px;  max-height:307px">
                                    <a href="{{route('frontend.for_sale_single',$featured_prop->id)}}"
                                        style="text-decoration:none">
                                        <img src="{{ uploaded_asset($featured_prop->feature_image_id) }}" alt=""
                                            class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                            @if($featured_prop->panaromal_status != 'no_any')
                                                <img class="pano-symbol" src="{{ url('img/360.png') }}" alt="360 logo">
                                            @endif
                                            @if($featured_prop->promoted == 'Enabled')
                                                <div class="free_listning position-absolute badge badge-danger p-2 m-2">PROMOTED</div>
                                            @endif
                                        <div class="card-body text-center">
                                            <h5 class="fw-bold mobile-h5">{{ get_currency(request() ,$featured_prop->price)}}</h5>
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
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @if(json_decode($settings->value) != null)
                            @if(json_decode($settings->value)[0]->properties != null)
                                @php
                                    $properties =  array_slice(json_decode($settings->value)[0]->properties, 0, 6);
                                @endphp
                                @foreach($properties as $prop)
                                    <div class="col-4 col-xs-12 col-tab-50">
                                        <div class="card custom-shadow position-relative" style="min-height:307px;  max-height:307px">
                                            <a href="{{route('frontend.for_sale_single',$prop)}}" style="text-decoration:none">
                                                <img src="{{ uploaded_asset(App\Models\Properties::where('id', $prop)->first()->feature_image_id) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                   
                                                    @if(App\Models\Properties::where('id', $prop)->first()->panaromal_status != 'no_any')
                                                        <img class="pano-symbol" src="{{ url('img/360.png') }}" alt="360 logo">
                                                    @endif
                                                    @if(App\Models\Properties::where('id', $prop)->first()->promoted == 'Enabled')
                                                        <div class="free_listning position-absolute badge badge-danger p-2 m-2">PROMOTED</div>
                                                    @endif
                                                <div class="card-body text-center">
                                                    <h5 class="fw-bold mobile-h5">{{ get_currency(request() ,App\Models\Properties::where('id', $prop)->first()->price)}}</h5>
                                                    @if(App\Models\Properties::where('id', $prop)->first()->beds == null)
                                                    @else
                                                    <p>{{App\Models\Properties::where('id', $prop)->first()->beds}} Bed Semidetached house</p>
                                                    @endif
                                                    <p>{{App\Models\Properties::where('id', $prop)->first()->name}}</p>
                                                    <p>{{App\Models\Properties::where('id', $prop)->first()->city}},
                                                        {{App\Models\Country::where('id',App\Models\Properties::where('id', $prop)->first()->country)->first()->country_name}}
                                                    </p>
                                                    <p>
                                                        @if(App\Models\Properties::where('id', $prop)->first()->beds != null)
                                                        {{App\Models\Properties::where('id', $prop)->first()->beds}}<i class="fas fa-bed ms-2 me-3"></i>
                                                        @endif
                                                        @if(App\Models\Properties::where('id', $prop)->first()->baths != null)
                                                        {{App\Models\Properties::where('id', $prop)->first()->baths}}<i class="fas fa-bath ms-2"></i>
                                                        @endif
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endif
                    @endif
                </div>
            </div>

            <div class="col-3 col-xs-12 sidebar-full-mobile col-tab-12">
                <div class="row">

                    <div class="col-12">
                        <a href="{{ get_settings('sidebar_advertiment_link_1') }}" target="_blank">
                            <div class="sidebar-card">
                                @if(get_settings('sidebar_advertiment_1') != null)
                                    <img width="100%" src="{{ url(get_settings('sidebar_advertiment_1')) }}" alt="banner">
                                @else
                                    <img width="100%" src="{{ url('img/no-image.jpg') }}" alt="banner">
                                @endif
                            </div>
                        </a>
                    </div>

                    <div class="col-12">
                        <a href="{{ get_settings('sidebar_advertiment_link_2') }}" target="_blank">
                            <div class="sidebar-card">
                                @if(get_settings('sidebar_advertiment_2') != null)
                                    <img width="100%" src="{{ url(get_settings('sidebar_advertiment_2')) }}" alt="banner">
                                @else
                                    <img width="100%" src="{{ url('img/no-image.jpg') }}" alt="banner">
                                @endif
                            </div>
                        </a>
                    </div>                    
                   

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
                                    @if($latest_prop->panaromal_status != 'no_any')
                                        <img class="pano-symbol" src="{{ url('img/360.png') }}" alt="360 logo">
                                    @endif
                                    @if($latest_prop->promoted == 'Enabled')
                                        <div class="free_listning position-absolute badge badge-danger p-2 m-2">PROMOTED</div>
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
    @else

        @if(json_decode($settings_latest->value) != null)
        <div class="container">
        <h2 class="sub-topics">Latest New Developments</h2>
        </div>

        <div class="container swiper-container" style="margin-top: 4rem;">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                        
                            @if(json_decode($settings_latest->value)[0]->properties != null)
                                @php
                                    $properties =  array_slice(json_decode($settings_latest->value)[0]->properties, 0, 9);
                                @endphp
                                @foreach($properties as $prop)
                                <div class="swiper-slide">
                                    <div class="card custom-shadow position-relative" style="min-height:307px;  max-height:307px">
                                        <a href="{{route('frontend.for_sale_single',$prop)}}" style="text-decoration:none">
                                            <img src="{{ uploaded_asset(App\Models\Properties::where('id', $prop)->first()->feature_image_id) }}" alt="" class="img-fluid w-100"
                                                style="height: 10rem; object-fit: cover;">
                                                @if(App\Models\Properties::where('id', $prop)->first()->panaromal_status != 'no_any')
                                                    <img class="pano-symbol" src="{{ url('img/360.png') }}" alt="360 logo">
                                                @endif
                                                @if(App\Models\Properties::where('id', $prop)->first()->promoted == 'Enabled')
                                                    <div class="free_listning position-absolute badge badge-danger p-2 m-2">PROMOTED</div>
                                                @endif
                                                <div class="card-body text-center">
                                                <h5 class="fw-bold">{{ get_currency(request() ,App\Models\Properties::where('id', $prop)->first()->price)}}</h5>
                                                @if(App\Models\Properties::where('id', $prop)->first()->beds == null)
                                                @else
                                                <p>{{App\Models\Properties::where('id', $prop)->first()->beds}} Bed Semidetached house</p>
                                                @endif
                                                <p>{{App\Models\Properties::where('id', $prop)->first()->name}}</p>
                                                <p>{{App\Models\Properties::where('id', $prop)->first()->city}},
                                                    {{App\Models\Country::where('id',App\Models\Properties::where('id', $prop)->first()->country)->first()->country_name}}</p>
                                                <p>
                                                    @if(App\Models\Properties::where('id', $prop)->first()->beds != null)
                                                    {{App\Models\Properties::where('id', $prop)->first()->beds}}<i class="fas fa-bed ms-2 me-3"></i>
                                                    @endif
                                                    @if(App\Models\Properties::where('id', $prop)->first()->baths != null)
                                                    {{App\Models\Properties::where('id', $prop)->first()->baths}}<i class="fas fa-bath ms-2"></i>
                                                    @endif
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                    
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        @endif


    @endif

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
                <div class="col-4 col-xs-12 col-tab-50">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fpropertymarketlive&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>

                </div>               

                               
                                

                    <div class="col-4 col-xs-12 col-tab-50">
                        <a href="" style="color:black; text-decoration:none"></a>
                            <div class="card position-relative" style="height: 27rem;"><a href="" style="color:black; text-decoration:none">
                                    
                                    <div class="px-4 py-2" style="-webkit-box-shadow: inset 0.5px 14px -8px rgba(0,0,0,0.75); -moz-box-shadow: inset 0.5px 14px -8px rgba(0,0,0,0.75); box-shadow: inset 0px 0.5px 14px -8px rgba(0,0,0,0.75);">
                                        <div class="row align-items-center">
                                            <div class="col-12 text-center">
                                                <img src="{{ url('img/frontend/index/property-news.png') }}" alt="" class="img-fluid" style="height:60px;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                <img src="{{ url('img/frontend/index/PML-news.png') }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                            </a>
                            <div class="card-body"><a href="" style="color:black; text-decoration:none">
                                <p class="card-text mb-1"
                                    style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        
                                    </a><div class="text-right mb-1"><a href="" style="color:black">
                                                                                </a><div class="position-absolute read" style="right:20px;"><a href="" style="color:black; text-decoration:none">
                                            </a><a href="" style="color:black; text-decoration:none">View More</a>
                                        </div>
                                                                                
                                    </div>
                                </div>
                            </div>
                            
                    </div>

                    @if($property_talk != null)
                        <div class="col-4 col-xs-12 col-tab-50 middle-card">
                            <a href="{{url('property_talk',App\Models\Category::where('id',$property_talk->category)->first()->slug)}}" style="color:black; text-decoration:none"></a>
                                <div class="card position-relative" style="height: 27rem;"><a href="{{url('property_talk',App\Models\Category::where('id',$property_talk->category)->first()->slug)}}" style="color:black; text-decoration:none">
                                        
                                        <div class="px-4 py-2" style="-webkit-box-shadow: inset 0.5px 14px -8px rgba(0,0,0,0.75); -moz-box-shadow: inset 0.5px 14px -8px rgba(0,0,0,0.75); box-shadow: inset 0px 0.5px 14px -8px rgba(0,0,0,0.75);">
                                            <div class="row align-items-center">
                                                <div class="col-12 text-center">
                                                    <img src="{{ url('img/frontend/index/talk-property.png') }}" alt="" class="img-fluid" style="height:60px;">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <img src="{{ uploaded_asset($property_talk->feature_image) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 13rem;">
                                </a>
                                <div class="card-body"><a href="{{url('property_talk',App\Models\Category::where('id',$property_talk->category)->first()->slug)}}" style="color:black; text-decoration:none">
                                    <p class="card-text mb-1"
                                        style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical;">
                                            {{$property_talk->description}}</p>
                                            
                                        </a><div class="text-right mb-1"><a href="{{url('property_talk',App\Models\Category::where('id',$property_talk->category)->first()->slug)}}" style="color:black">
                                                                                    </a><div class="position-absolute read" style="right:20px;"><a href="{{url('property_talk',App\Models\Category::where('id',$property_talk->category)->first()->slug)}}" style="color:black; text-decoration:none">
                                                </a><a href="{{url('property_talk',App\Models\Category::where('id',$property_talk->category)->first()->slug)}}" style="color:black; text-decoration:none">View More</a>
                                            </div>
                                                                                    
                                        </div>
                                    </div>
                                </div>
                                
                        </div>
                    @endif                            
     
        </div>
    </div>
</div>



<!-- social section ends here -->




</div>


@include('frontend.includes.search_filter_modal')


@endsection

@push('after-scripts')


<!-- Async script executes immediately and must be after any DOM elements used in callback. -->

<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap">
</script> -->

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=searchAddress&libraries=places&v=weekly&channel=2"
type="text/javascript"></script>



<script>

var marker = false;
        
function searchAddress() {

    initMap();
    
    const input = document.getElementById("search");
    const search = new google.maps.places.SearchBox(input);
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // Bias the SearchBox results towards current map's viewport.
    // map.addListener("bounds_changed", () => {
    //     input.setBounds(map.getBounds());
    // });
    let markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    search.addListener("places_changed", () => {
        const places = input.getPlaces();

        if (places.length == 0) {
        return;
        }
        // Clear out the old markers.
        markers.forEach((marker) => {
        marker.setMap(null);
        });
        markers = [];
        // For each place, get the icon, name and location.
        const bounds = new google.maps.LatLngBounds();
        places.forEach((place) => {
        if (!place.geometry || !place.geometry.location) {
            console.log("Returned place contains no geometry");
            return;
        }
        const icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25),
        };
        // Create a marker for each place.
        markers.push(
            new google.maps.Marker({
            map,
            icon,
            title: place.name,
            position: place.geometry.location,
            })
        );

        if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
        } else {
            bounds.extend(place.geometry.location);
        }
        });
        map.fitBounds(bounds);
    });

}


</script>

<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    slidePerGroup: 1,
    spaceBetween: 20,
    // spaceBetween: 20,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
    // autoplay: {
    //     delay: 4000,
    //     disableOnInteraction: false,
    // }, 
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        576: {
            slidesPerView: 2,
        },

        768: {
            slidesPerView: 2,
        },

        991: {
            slidesPerView: 3,
        }

    },

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

<script>
    $(document).ready(function() {
        // var $loading = $('#loadingDiv').hide();
        $('#preloader').hide();
    });

    

    // var $loading = $('#loadingDiv').hide();
    // $(document)
    // .ajaxStart(function () {
    //     $loading.show();
    // })
    // .ajaxStop(function () {
    //     $loading.hide();
    // });
</script>

@endpush