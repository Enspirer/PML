@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/for_sale_single.css') }}" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css"> -->


<style>
.btn-pano {
    background: red;
    color: #fff;
    padding: 10px 20px;
    margin-top: 20px;
    display: block;
    width: max-content;
    margin-left: auto;
}

.btn-pano:hover {
    text-decoration: none;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    color: #fff;
}

div#panoModal .modal-dialog {
    max-width: 90%;
}

div#panoModal .modal-content .modal-body {
    padding: 0 !important;
    position: relative;
}


div#panoModal button.close {
    position: absolute;
    right: 5px;
    top: 5px;
    background: #000;
    color: #fff;
    border-radius: 50%;
    width: 30px;
    height: 30px;
}

div#panoModal .modal-content {
    height: 90vh;
    margin-top: 5vh;
    margin-bottom: 5vh;
}

#panoFrame {
    height: 90vh;
    background: #000;
}

div#panoModal .modal-body {
    height: 90vh;
    max-height: unset !important;
    overflow: hidden !important;
}

button.close:hover {
    color: #fff;
}

.free_listning {
    top: 0;
    left: 0;
}
</style>


@endpush

@section('content')





@include('frontend.includes.search')
<div class="container index" style="margin-top: 2rem;">
    <div class="row">
        <div class="col-9 col-xs-12">
            <p><a href="/" class="text-decoration-none text-dark fw-bold">Property Market Live</a>
                >
                <a href="#" class="text-decoration-none text-dark fw-bold">
                    For Sale
                </a>

                > <a href="/home_loan" class="text-decoration-none text-dark fw-bold">Moscow Land</a>
            </p>

        </div>
        <div class="col-3 col-xs-12">
            <div class="topbar-icons">
                <button class="topbar-single-icon" data-bs-toggle="modal" data-bs-target="#watch_list">
                    Watchlist<i class="far fa-eye"></i>
                </button>
                <button type="button" class="topbar-single-icon" data-toggle="modal" data-target="#shareModal">

                    Share <i class="far fa-share-square"></i>
                </button>
            </div>

        </div>
    </div>
</div>


<!--modals-->
<!-- <div id="openModal-about" class="modalDialog">
      <div style="height:80vh;margin-bottom:10vh;margin-top:10vh;"> 
         <a href="" title="Close" class="close">X</a> -->
<!-- iframe -->
<!-- <iframe id="panoFrame" src="" frameborder="0" width="100%" height="100%"></iframe>  -->
<!-- </div>
   </div> -->
<!-- 

<!-- Modal -->
<div class="modal fade" id="panoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
        
      </div> -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- iframe -->
                <iframe id="panoFrame" src="" frameborder="0" width="100%" height="100%"></iframe>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
        </div>
    </div>
</div>

@if ( session()->has('message'))
<div class="" style="background-color: rgb(22 32 44);text-align: center;color: white;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <div
                    style="background-image: url('{{url('img/booking.png')}}');height: 140px;background-repeat: no-repeat;background-position: center;background-size: contain;margin-top: 25px;filter: invert(1);">
                </div>

            </div>
            <div class="col-md-9">
                <h1 class="display-6" style="padding-top: 21px;font-size: 22px;text-align: left">Thanks for Booking!
                </h1><br>
                <p class="lead"></p>

                <h4 style="font-size: 13px;text-align: left">
                    One of our member will get back in touch with you soon.Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Proin dignissim diam in pulvinar porta. Interdum et malesuada fames
                    ac ante ipsum primis in faucibus. One of our member will get back in touch with you soon.
                    Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit.
                </h4> <br>

                <a href="" class="btn btn-primary"
                    style="float: left;background: #16202c;border-color: white;margin-bottom: 20px;">
                    View My Booking
                </a>

                <br>
            </div>
        </div>
    </div>

</div>

@endif



<div class="container index" style="margin-top: 2rem;">
    <div class="row">
        <div class="col-12">
            <p><a href="" class="text-decoration-none text-dark fw-bold">Back to Search Results</a></p>
            <br>
            <h4>{{$property->name}}</h4>
        </div>
    </div>
</div>

<div class="container mt-4" style="margin-bottom: 8rem;">
    <div class="row">
        <div class="col-9 col-xs-12 col-tab-12">
            <div class="row">
                <div class="col-9 col-xs-12 mobile-swiper-area">
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper">

                            @php
                            $str_arr2 = preg_split ("/\,/", $property->image_ids);
                            $flow_plan = preg_split ("/\,/", $property->flow_plan);
                            @endphp

                            @if($property->panaromal_images)
                            @php
                            $pano_arry = preg_split ("/\,/", $property->panaromal_images);
                            @endphp
                            @else
                            @php
                            $pano_arry = null;
                            @endphp
                            @endif

                            @if($property->panaromal_status == 'panaromal_images')
                            @if($pano_arry)
                            @foreach($pano_arry as $panoarray)
                            <div class="swiper-slide">
                                <a href="#" data-toggle="modal" data-target="#panoModal"
                                    onclick="changePanaroma('{{ $panoarray }}')">
                                    <div class="pano-wrapper">
                                        <img src="{{ uploaded_asset($panoarray) }}" />
                                        <img class="pano-symbol" src="{{ url('img/360.png') }}" alt="360 logo">
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @endif
                            @endif

                            @foreach($str_arr2 as $key=> $pre)
                            <div class="swiper-slide">
                                <img src="{{ uploaded_asset($pre) }}" />

                            </div>
                            @endforeach


                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                        <div class="position-absolute apart-avail">
                            <button class="btn fw-bold me-3">APARTMENT</button>
                            <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                        </div>

                    </div>
                    <div class="option-bar">
                        <div class="option-list-wrapper">
                            <ul class="option-list hidden-xs">
                                
                                @if($property->google_panaroma != null || $property->panaromal_images != null)
                                    <li class="last-item">
                                        <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                            onclick="virtualActive()"><i class="fas fa-redo-alt"
                                            aria-hidden="true"></i>360</a>
                                    </li>
                                @else
                                    <li class="last-item">
                                        <i class="fas fa-redo-alt" aria-hidden="true"></i>360
                                    </li>
                                @endif 


                                <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="photoActive()"><i class="fas fa-camera"
                                            aria-hidden="true"></i>Photo</a>
                                </li>

                                @if($property->video != null)
                                <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="videoActive()"><i class="fas fa-video" aria-hidden="true"></i>Video</a>
                                </li>
                                @else
                                <li class="last-item">
                                    <i class="fas fa-video" aria-hidden="true"></i>Video
                                </li>
                                @endif


                                <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="directionActive()"><i class="fas fa-directions"
                                            aria-hidden="true"></i>Map</a>
                                </li>


                                @if($property->flow_plan != null)
                                <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="flowPlanActive()"><i class="far fa-map"></i>Flow Plan</a>
                                </li>
                                @else
                                <li class="last-item">
                                    <i class="far fa-map"></i>Flow Plan
                                </li>
                                @endif

                                <!-- <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="virtualActive()"><i class="fas fa-redo-alt" aria-hidden="true"></i>360</a>
                                </li> -->


                                <!-- <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="photoActive()"><i class="fas fa-camera" aria-hidden="true"></i>Photo</a>
                                </li> -->





                                <!-- <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="flowPlanActive()"><i class="far fa-map"></i>Flow Plan</a>
                                </li> -->







                            </ul>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="threesixtyModal" tabindex="-1" aria-labelledby="three_sixtyModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="three_sixtyModalLabel">Google Panaroma</h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                {!!$property->google_panaroma!!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Image gallery popup -->
                <div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content lightgallery-content">
                            <div class="modal-body light-gallery-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="light-gallery-close" aria-hidden="true">&times;</span>
                                </button>
                                <!-- image slider -->
                                <!--
                        We will make a slider with stylized thumbnails using CSS3
                        The markup is very simple:
                        Radio Inputs
                        Labels with thumbnails to detect click event
                        Main Image
                        -->
                                <!-- <div class="cont">


                                    <div class="demo-gallery">
                                        <ul id="lightgallery">
                                            @foreach($str_arr2 as $key=> $pre)
                                            <li data-responsive="{{ uploaded_asset($pre) }}"
                                                data-src="{{ uploaded_asset($pre) }}" data-sub-html="">
                                                <a href="">
                                                    <img class="img-responsive" src="{{ uploaded_asset($pre) }}">
                                                    <div class="demo-gallery-poster">
                                                        <img
                                                            src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                                                    </div>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <span class="small">Click on any of the images to see lightGallery</span>
                                    </div>
                                </div> -->


                            </div>
                            <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div> -->
                        </div>
                    </div>
                </div>



                <!-- All Property Model -->
                <div class="modal fade" id="all_property_model" tabindex="-1" aria-labelledby="all_property_model"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <button type="button" class="all-modal-close" data-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times-circle"></i></button>
                            <!-- <div class="modal-header">
                                <h5 class="modal-title" id="videoModalLabel">All</h5>
                             
                            </div> -->
                            <div class="modal-body text-center">

                                <div class="tab-content" id="myTabContent">
                                    <!-- 360 tab -->
                                    <div class="tab-pane fade active show" id="virtual" role="tabpanel" aria-labelledby="virtual-tab">
                                        
                                        @if($property->panaromal_status != 'panaromal_images')
                                    
                                            {!!$property->google_panaroma!!}

                                        @else                                          
                                        
                                            <div class="row">
                                                <div class="col-8">
                                                        Panaromal Main Image
                                                </div>
                                                <div class="col-4">
                                                    @if($property->panaromal_status == 'panaromal_images')
                                                        @if($pano_arry)
                                                            @foreach($pano_arry as $panoarray)
                                                                <div class="pano-wrapper">
                                                                    <img class="photoModalSwiperImg mt-3" src="{{ uploaded_asset($panoarray) }}" />
                                                                    <img class="pano-symbol" src="{{ url('img/360.png') }}" alt="360 logo">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>                                            

                                        @endif
                                    
                                    
                                    </div>

                                    <!-- photo tab -->
                                    <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">

                                        <!-- <div class="cont">
                                            <div class="demo-gallery">
                                                <ul id="lightgallery">
                                                    @foreach($str_arr2 as $key=> $pre)
                                                    <li data-responsive="{{ uploaded_asset($pre) }}"
                                                        data-src="{{ uploaded_asset($pre) }}" data-sub-html="">
                                                        <a href="">
                                                            <img class="img-responsive"
                                                                src="{{ uploaded_asset($pre) }}">
                                                            <div class="demo-gallery-poster">
                                                                <img
                                                                    src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                                                            </div>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <span class="small">Click on any of the images to see
                                                    lightGallery</span>
                                            </div>
                                        </div> -->


                                        <div class="row">
                                            <div class="col-9 col-xs-12 mobile-swiper-area">
                                                <div class="swiper modalSwiper2 photoModalSwiper">
                                                    <div class="swiper-wrapper">
                                                        @php
                                                            $str_arr2 = preg_split ("/\,/", $property->image_ids);
                                                        @endphp

                                                        @if($property->panaromal_images)
                                                            @php
                                                                $pano_arry = preg_split ("/\,/", $property->panaromal_images);
                                                            @endphp
                                                        @else
                                                            @php
                                                                $pano_arry = null;
                                                            @endphp
                                                        @endif

                                                        

                                                        @foreach($str_arr2 as $key=> $pre)
                                                        <div class="swiper-slide">
                                                            <img class="photoModalSwiperImg"
                                                                src="{{ uploaded_asset($pre) }}" />

                                                        </div>
                                                        @endforeach


                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>

                                                    <div class="position-absolute apart-avail">
                                                        <button class="btn fw-bold me-3">APARTMENT</button>
                                                        <button class="btn fw-bold"
                                                            style="color: #39B54A">AVAILABLE</button>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-3 col-xs-12">
                                                <div thumbsSlider="" class="swiper modalSwiper photoModalThumbSlider">
                                                    <div class="swiper-wrapper">
                                                        
                                                        @foreach($str_arr2 as $key=> $pre)
                                                        <div class="swiper-slide">
                                                            <img class="photoModalSwiperThumb"
                                                                src="{{ uploaded_asset($pre) }}" />

                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>


                                        </div>




                                    </div>

                                    <!-- video tab -->
                                    <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">

                                        @if($property->video != null)

                                        <input type="hidden"
                                            value="{{ preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $property->video, $default_match) }}" />

                                        <iframe width="100%" height="500"
                                            src="https://www.youtube.com/embed/{{ $default_match[0] }}?rel=0"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>

                                        @endif

                                    </div>

                                    <!-- map tab -->
                                    <div class="tab-pane fade" id="all-map" role="tabpanel"
                                        aria-labelledby="all-map-tab">

                                        <div class="location">
                                            <div id="map2" style="height: 70vh; width: 100%;"></div>
                                            <input type="text" name="lat" id="lat2" value="{{$property->lat}}"
                                                class="mt-3 d-none">
                                            <input type="text" name="lng" id="lng2" value="{{$property->long}}"
                                                class="mt-3 d-none">
                                        </div>

                                    </div>


                                    <!-- flow plan tab -->
                                    <div class="tab-pane fade" id="flow-plan" role="tabpanel"
                                        aria-labelledby="flow-plan-tab">


                                        @if($property->flow_plan != null)

                                        <div class="row">
                                            <div class="col-9 col-xs-12 mobile-swiper-area">
                                                <div class="swiper modalflowSwiper2 photoModalSwiper">
                                                    <div class="swiper-wrapper">

                                                        @foreach($flow_plan as $key=> $flow)
                                                        <div class="swiper-slide">
                                                            <img class="photoModalSwiperImg" src="{{ uploaded_asset($flow) }}" />

                                                        </div>
                                                        @endforeach

                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>

                                                    <div class="position-absolute apart-avail">
                                                        <button class="btn fw-bold me-3">APARTMENT</button>
                                                        <button class="btn fw-bold"
                                                            style="color: #39B54A">AVAILABLE</button>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-3 col-xs-12">
                                                <div thumbsSlider="" class="swiper modalflowSwiper photoModalThumbSlider">
                                                    <div class="swiper-wrapper">

                                                        @foreach($flow_plan as $key=> $flow)
                                                        <div class="swiper-slide">
                                                            <img class="photoModalSwiperThumb" src="{{ uploaded_asset($flow) }}" />

                                                        </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        @endif



                                    </div>


                                </div>




                            </div>
                            <div class="modal-footer">
                                <ul class="nav nav-tabs all-nav-tabs" id="myTab" role="tablist">


                                    <!--------- 360 ------------>
                                   
                                    @if($property->google_panaroma != null || $property->panaromal_images != null)
                                        <li class="nav-item all-nav-item" role="presentation">
                                            <button class="nav-link all-btn active" id="virtual-tab" data-bs-toggle="tab"
                                                data-bs-target="#virtual" type="button" role="tab" aria-controls="virtual"
                                                aria-selected="false"><i class="fas fa-redo-alt all-modal-i"
                                                    aria-hidden="true"></i>360<sup>0</sup></button>
                                        </li>
                                    @else
                                        <li class="nav-item all-nav-item" role="presentation">
                                            <button class="nav-link inactive" id="virtual-tab" type="button" role="tab"><i
                                                    class="fas fa-redo-alt all-modal-i"
                                                    aria-hidden="true"></i>360<sup>0</sup></button>
                                        </li>
                                    @endif

                                  
                                    <!-- photo -->
                                    <li class="nav-item all-nav-item" role="presentation">
                                        <button class="nav-link all-btn" id="photo-tab" data-bs-toggle="tab"
                                            data-bs-target="#photo" type="button" role="tab" aria-controls="photo"
                                            aria-selected="false"><i class="fas fa-camera all-modal-i"
                                                aria-hidden="true"></i>Photo</button>
                                    </li>


                                    @if($property->video != null)
                                    <!-------video------------>
                                    <li class="nav-item all-nav-item" role="presentation">
                                        <button class="nav-link all-btn" id="video-tab" data-bs-toggle="tab"
                                            data-bs-target="#video" type="button" role="tab" aria-controls="video"
                                            aria-selected="false"><i class="fas fa-video all-modal-i"
                                                aria-hidden="true"></i>Video</button>
                                    </li>
                                    @else
                                    <li class="nav-item all-nav-item" role="presentation">
                                        <button class="nav-link inactive" id="video-tab" type="button" role="tab"
                                            aria-controls="video" aria-selected="false"><i
                                                class="fas fa-video all-modal-i" aria-hidden="true"></i>Video</button>
                                    </li>

                                    @endif





                                    <!------------- direction  ---------->
                                    <li class="nav-item all-nav-item" role="presentation">
                                        <button class="nav-link all-btn" id="all-map-tab" data-bs-toggle="tab"
                                            data-bs-target="#all-map" type="button" role="tab" aria-controls="all-map"
                                            aria-selected="false"><i class="fas fa-directions all-modal-i"
                                                aria-hidden="true"></i>Map</button>
                                    </li>



                                    @if($property->flow_plan != null)
                                    <!---------- flow plan------------>
                                    <li class="nav-item all-nav-item" role="presentation">
                                        <button class="nav-link all-btn" id="flow-plan-tab" data-bs-toggle="tab"
                                            data-bs-target="#flow-plan" type="button" role="tab"
                                            aria-controls="flow-plan-tab" aria-selected="false"><i
                                                class="far fa-map all-modal-i" aria-hidden="true"></i>Flow Plan</button>
                                    </li>
                                    @else
                                    <li class="nav-item all-nav-item" role="presentation">
                                        <button class="nav-link inactive" id="flow-plan-tab" type="button" role="tab"
                                            aria-controls="flow-plan-tab" aria-selected="false"><i
                                                class="far fa-map all-modal-i" aria-hidden="true"></i>Flow Plan</button>
                                    </li>
                                    @endif


                                </ul>
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-3 col-xs-12 mobile-height-fix">
                    <div thumbsSlider="" class="swiper mySwiper mobile-option-list-helper">
                        <div class="swiper-wrapper">
                            @if($property->panaromal_status == 'panaromal_images')
                            @if($pano_arry)
                            @foreach($pano_arry as $panoarray)
                            <div class="swiper-slide">
                                <img src="{{ uploaded_asset($panoarray) }}" />
                            </div>
                            @endforeach
                            @endif
                            @endif

                            @foreach($str_arr2 as $key=> $pre)
                            <div class="swiper-slide">
                                <img src="{{ uploaded_asset($pre) }}" />

                            </div>
                            @endforeach

                        </div>

                        <!-- mobile option list -->
                        <div class="option-list-wrapper">
                            <ul class="option-list-mobile visible-xs">

                                @if($property->google_panaroma != null || $property->panaromal_images != null)
                                    <li class="last-item">
                                        <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                            onclick="virtualActive()"><i class="fas fa-redo-alt"
                                            aria-hidden="true"></i>360</a>
                                    </li>
                                @else
                                    <li class="last-item">
                                        <i class="fas fa-redo-alt" aria-hidden="true"></i>360
                                    </li>
                                @endif 


                                <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="photoActive()"><i class="fas fa-camera"
                                            aria-hidden="true"></i>Photo</a>
                                </li>

                                @if($property->video != null)
                                <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="videoActive()"><i class="fas fa-video" aria-hidden="true"></i>Video</a>
                                </li>
                                @else
                                <li class="last-item">
                                    <i class="fas fa-video" aria-hidden="true"></i>Video
                                </li>
                                @endif


                                <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="directionActive()"><i class="fas fa-directions"
                                            aria-hidden="true"></i>Direction</a>
                                </li>


                                @if($property->flow_plan != null)
                                <li class="last-item">
                                    <a href="#" data-toggle="modal" data-target="#all_property_model" class="option-btn"
                                        onclick="flowPlanActive()"><i class="far fa-map"></i>Flow Plan</a>
                                </li>
                                @else
                                <li class="last-item">
                                    <i class="far fa-map"></i>Flow Plan
                                </li>
                                @endif


                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-9">
                <a class="btn-pano" href="#openModal-about">360<sup>0</sup> View</a>
            </div> -->

            <div class="row">
                <div class="col-9">
                    <h3 class="fw-bold mt-4 mb-1">{{ get_currency(request() ,$property->price)}}</h3>

                    <p class="fw-bold" style="font-size: 1.2rem; color: black">
                        @if($property->beds != null)
                        {{$property->beds}} Bed flat for {{$property->transaction_type}}
                        @endif
                    </p>

                    <p class="mb-1" style="font-size: 1rem;">{{$property->city}},
                        {{App\Models\Country::where('id',$property->country)->first()->country_name }}
                    </p>


                </div>

                <div class="col-3">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-6">
                            @if($property->beds != null)
                            <p class="mt-4" style="font-size: 1.3rem;"><i class="fas fa-bed me-3"
                                    style="color: rgb(57, 181, 74, 0.7)"></i>{{$property->beds}}</p>
                            @endif
                        </div>
                        <div class="col-6">
                            @if($property->baths != null)
                            <p class="mt-4" style="font-size: 1.3rem;"><i class="fas fa-bath me-3"
                                    style="color: rgb(57, 181, 74, 0.7)"></i>{{$property->baths}}</p>
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

            <!-- <div class="row">
                    <div class="col-12">
                        <div id="map" style="height: 350px; width: 100%"></div>
                    </div>
                </div> -->


            <div class="row">
                <div class="col-12">
                    <h5 style="padding-bottom:15px;">Nearby Place</h5>
                    <div id="near-cat-list" class="map-search-category-bar">
                        <button type="button" id="shopping" class="near-cat-btn">Shopping</button>
                        <button type="button" id="food" class="near-cat-btn">Food</button>
                        <button type="button" id="restuarant" class="near-cat-btn">Restaurant</button>
                        <button type="button" id="school" class="near-cat-btn">School</button>
                        <button type="button" id="atm" class="near-cat-btn">ATM</button>
                        <button type="button" id="hospital" class="near-cat-btn">Hospital</button>
                        <button type="button" id="gym" class="near-cat-btn">Gym</button>
                    </div>
                    <div id="map" style="height: 400px; width: 100%"></div>
                    <input type="text" name="lat" id="lat" value="{{$property->lat}}" class="mt-3 d-none">
                    <input type="text" name="lng" id="lng" value="{{$property->long}}" class="mt-3 d-none">
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="row">
                        <div class="features col-8 col-xs-12 col-tab-12">
                            <div class="custom-shadow pt-4 pb-3 px-3" style="padding: 25px !important;">
                                <h4 class="fw-bold">Features and Description</h4>
                                <div class="row mt-2 ms-2" aria-expanded="false">
                                    <div class="col-12">
                                        <ul class="feature-list">
                                            <div class="row">


                                                @if($property->baths == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Baths : {{ $property->baths }}</li>
                                                </div>
                                                @endif

                                                @if($property->beds == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Beds : {{ $property->beds }}</li>
                                                </div>
                                                @endif

                                                @if($property->parking_type == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Parking Type :
                                                        {{ $property->parking_type }}</li>
                                                </div>
                                                @endif

                                                @if($property->building_type == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Building Type :
                                                        {{ $property->building_type }}</li>
                                                </div>
                                                @endif

                                                @if($property->farm_type == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Farm Type :
                                                        {{ $property->farm_type }}</li>
                                                </div>
                                                @endif

                                                @if($property->open_house_only == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Open House Only :
                                                        {{ $property->open_house_only }}</li>
                                                </div>
                                                @endif

                                                @if($property->number_of_units == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Number of Units :
                                                        {{ $property->number_of_units }}</li>
                                                </div>
                                                @endif

                                                @if($property->land_size == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Land Size :
                                                        {{ $property->land_size }}</li>
                                                </div>
                                                @endif

                                                @if($property->zoning_type == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Zoning Type :
                                                        {{ $property->zoning_type }}</li>
                                                </div>
                                                @endif

                                                @if($property->building_size == null)
                                                @else
                                                <div class="col-6 p-0">
                                                    <li><i class="fas fa-circle"></i>Building Size :
                                                        {{ $property->building_size }}</li>
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

                                <div class="row mt-3" id="collapseExample">
                                    <div class="col-12">
                                        <h5 class="fw-bold mb-2">Description</h5>
                                        <div id="profile-description">
                                            <div class="text show-more-height">
                                                <p>{{ $property->description }}</p>
                                            </div>
                                            <div class="show-more">(Show More)</div>
                                        </div>

                                        <!-- <div id="profile-description">
                                            <p class="text show-more-height">{{ $property->description }}</p>
                                            <div class="show-more">(Show More)</div>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="row justify-content-center text-center mt-3">
                                    <div class="col-6 p-0">

                                        <!-- <i class="fas fa-chevron-down ms-1 collapsed" data-bs-toggle="collapse"
                                            href="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample"
                                            style="font-size: 1rem; cursor: pointer; color: #666666"></i>

                                        <i class="fas fa-chevron-up ms-1 collapsed" data-bs-toggle="collapse"
                                            href="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample"
                                            style="display: none; font-size: 1rem; cursor: pointer; color: #666666"></i>

                                            
                                        <a role="button" class="collapsed text-decoration-none collapse-button fw-bold"
                                            data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample" style="font-size: 1rem; color: #666666"></a> -->
                                        <!-- <div class="show-more">(Show More)</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 
                        <div id="profile-description">
            <div class="text show-more-height">
                Some random text 
                <br /><br />
                At Cobalt we help people and businesses throughout the world realize their full potential. <br />
                We make this simple mission come to life every day through our passion to create technologies <br><br>and develop products that touch just about every kind of customer.
            </div>
            <div class="show-more">(Show More)</div>
</div>  -->

                        <div class="col-4 col-xs-12 col-tab-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="custom-shadow pt-4 pb-3 px-3 text-center">
                                        <a href="{{route('frontend.individual_agent',$agent->id)}}">
                                            <img src="{{ uploaded_asset($agent->photo) }}" alt="" class="img-fluid mb-3"
                                                style="object-fit: cover;height: 7rem; width:7rem; border-radius: 50%;margin-top: 30px;">
                                        </a>
                                        <p class="fw-bold">
                                            @if($agent->agent_type == 'Individual')
                                            {{ $agent->name }}
                                            @else
                                            {{ $agent->company_name }}
                                            @endif
                                        </p>
                                        <p>{{ $agent->agent_type }} Agents</p>

                                        <div class="row justify-content-center mt-3 tab-agent-details">
                                            <div class="col-12 text-center mb-2">
                                                <a href="tel:{{ $agent->telephone }}"
                                                    class="btn py-2 fw-bold text-white w-100 rounded-pill tab-btn-width"
                                                    style="border: 1.5px solid rgb(112, 112, 112);background-color: rgb(53, 73, 94);font-size: 14px;">
                                                    <div class="row justify-content-center">
                                                        <!-- <div class="col-3 p-0">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                        <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                            {{ $agent->telephone }}
                                                        </div> -->
                                                        <div class="btn-wrapper">
                                                            <i class="fas fa-phone-alt"></i>
                                                            <span
                                                                style="font-size: 0.9rem;">{{ $agent->telephone }}</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-12 text-center mb-2">
                                                @auth
                                                <a href="" data-bs-toggle="modal" data-bs-target="#emailModal"
                                                    class="btn py-2 fw-bold w-100 rounded-pill tab-btn-width"
                                                    style="border: 1.5px solid #707070">
                                                    <div class="row justify-content-center">
                                                        <!-- <div class="col-3 p-0">
                                                         
                                                        </div>
                                                        <div class="col-7 p-0 text-start" >
                                                          
                                                        </div> -->
                                                        <div class="btn-wrapper">
                                                            <i class="fas fa-envelope"></i><span
                                                                style="font-size: 0.9rem;">Send email to agent</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                @else
                                                <a href="" data-bs-toggle="modal" data-bs-target="#loginModal"
                                                    class="btn py-2 fw-bold w-100 rounded-pill tab-btn-width"
                                                    style="border: 1.5px solid #707070">
                                                    <div class="row justify-content-center">
                                                        <!-- <div class="col-3 p-0">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                        <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                            Send email to agent
                                                        </div> -->
                                                        <div class="btn-wrapper">
                                                            <i class="fas fa-envelope"></i><span
                                                                style="font-size: 0.9rem;">Send email to agent</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endauth
                                            </div>

                                            @auth
                                            @if($watch_list == null)
                                            <div class="col-12 text-center mb-2">
                                                <button type="submit" data-bs-toggle="modal"
                                                    data-bs-target="#watch_list"
                                                    class="btn py-2 fw-bold w-100 rounded-pill"
                                                    style="border: 1.5px solid #707070">
                                                    <div class="row justify-content-center">
                                                        <div class="btn-wrapper">
                                                            <i class="fas fa-list"></i><span
                                                                style="font-size: 0.9rem;">Watch Listing</span>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                            @else
                                            <div class="col-12 text-center mb-2">
                                                <button type="submit" data-bs-toggle="modal"
                                                    data-bs-target="#watch_list_change"
                                                    class="btn py-2 fw-bold w-100 rounded-pill"
                                                    style="border: 1.5px solid #707070; background-color:#28a3b3;">
                                                    <div class="row justify-content-center">
                                                        <div class="btn-wrapper">
                                                            <i class="fas fa-list text-light"></i><span
                                                                class="text-light" style="font-size: 0.9rem;">Watch
                                                                Listing</span>
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                            @endif
                                            @else
                                            <div class="col-12 text-center mb-2">
                                                <a href="{{route('frontend.auth.login')}}"
                                                    class="btn py-2 fw-bold w-100 rounded-pill"
                                                    style="border: 1.5px solid #707070">
                                                    <div class="row justify-content-center">
                                                        <div class="btn-wrapper">
                                                            <i class="fas fa-list"></i><span
                                                                style="font-size: 0.9rem;">Watch Listing</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @endauth



                                            <div class="col-12 text-center mb-2">
                                                @auth
                                                @if($favourite == null)
                                                <form action="{{route('frontend.propertyFavourite')}}" method="post"
                                                    enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn py-2 fw-bold w-100 rounded-pill"
                                                        style="border: 1.5px solid #707070">
                                                        <div class="row justify-content-center">
                                                            <!-- <div class="col-3 p-0">
                                                                <i class="far fa-heart"></i>
                                                            </div>
                                                            <div class="col-7 p-0 text-start"
                                                                style="font-size: 0.9rem;">
                                                                Save this Property
                                                            </div> -->
                                                            <div class="btn-wrapper">
                                                                <i class="far fa-heart"></i><span
                                                                    style="font-size: 0.9rem;">Save this Property</span>
                                                            </div>

                                                        </div>
                                                        <input type="hidden" name="prop_hidden_id"
                                                            value="{{ $property->id }}" />
                                                    </button>
                                                </form>
                                                @else
                                                <form
                                                    action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}"
                                                    method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn py-2 fw-bold w-100 rounded-pill"
                                                        style="border: 1.5px solid #707070; background-color:#F33A6A;">
                                                        <div class="row justify-content-center">
                                                            <!-- <div class="col-3 p-0">
                                                                <i class="far fa-heart"></i>
                                                            </div>
                                                            <div class="col-7 p-0 text-start text-light"
                                                                style="font-size: 0.9rem;">
                                                                Unsave this Property
                                                            </div> -->
                                                            <div class="btn-wrapper">
                                                                <i class="far fa-heart text-light"></i><span
                                                                    style="font-size: 0.9rem;" class="text-light">Save
                                                                    this Property</span>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <input type="hidden" name="prop_hidden_id"
                                                        value="{{ $favourite->id }}" />
                                                </form>
                                                @endif
                                                @else
                                                <a href="{{route('frontend.auth.login')}}"
                                                    class="btn py-2 fw-bold w-100 rounded-pill"
                                                    style="border: 1.5px solid #707070">
                                                    <div class="row justify-content-center">
                                                        <!-- <div class="col-3 p-0">
                                                            <i class="far fa-heart"></i>
                                                        </div>
                                                        <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                            Save this Property
                                                        </div> -->
                                                        <div class="btn-wrapper">
                                                            <i class="far fa-heart"></i><span
                                                                style="font-size: 0.9rem;">Save this Property</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endauth

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
                    <!-- you may like desktop version -->
                    <div class="row mt-3">
                        @foreach($random as $ran)
                        <div class="col-4 col-xs-12 col-tab-50">
                            <div class="card custom-shadow position-relative"
                                style="min-height: 320px; max-height: 320px;">
                                <a href="{{ route('frontend.for_sale_single',$ran->id) }}" class="text-decoration-none">
                                    <img src="{{ uploaded_asset($ran->feature_image_id) }}" alt=""
                                        class="img-fluid w-100" style="height: 10rem; object-fit: cover;">

                                </a>
                                <div class="card-body mt-3">
                                    <div class="row mb-2">
                                        <div class="col-10">
                                            <h5 class="fw-bold">{{ get_currency(request() ,$ran->price)}}</h5>
                                        </div>
                                        <div style="display:flex;justify-content:center;" class="col-1">

                                            @php
                                            if(auth()->user())
                                            {
                                            $favourite =
                                            App\Models\Favorite::where('property_id',$ran->id)->where('user_id',auth()->user()->id)->first();
                                            }else{
                                            $favourite = null;
                                            }
                                            @endphp

                                            @auth
                                            @if($favourite == null)
                                            <form action="{{route('frontend.propertyFavourite')}}" method="post"
                                                enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <button type="submit" class="fas fa-heart border-0"
                                                    style="background-color: white"></button>
                                                <input type="hidden" name="prop_hidden_id" value="{{ $ran->id }}" />
                                            </form>
                                            @else
                                            <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}"
                                                method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <button class="fas fa-heart border-0"
                                                    style="color: #F60331; background-color: white;"></button>
                                                <input type="hidden" name="prop_hidden_id"
                                                    value="{{ $favourite->id }}" />
                                            </form>
                                            @endif
                                            @else
                                            <form action="{{route('frontend.auth.login')}}" method="get"
                                                enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <button type="submit" class="fas fa-heart border-0"
                                                    style="background-color: white"></button>
                                            </form>
                                            @endauth
                                        </div>
                                    </div>

                                    <h6 class="fw-bold mb-2">
                                        @if($ran->beds != null)
                                        {{$ran->beds}} Bed Semidetached house
                                        @endif
                                    </h6>
                                    <!-- <p>541, Rosewood place,</p> -->
                                    <p class="mb-1"> {{$ran->city}},
                                        {{App\Models\Country::where('id',$ran->country)->first()->country_name }}</p>
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

                                <!-- <div class="position-absolute apart-avail">
                                    <button class="btn fw-bold me-3">APARTMENT</button>
                                    <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                </div> -->

                                <div class="row align-items-center prom-logo position-absolute">
                                    <div class="col-6">
                                        @if($ran->promoted == 'Enabled')
                                        <div class="py-1 ps-3" style="background-color: #FF0000;">
                                            <p class="text-white" style="font-size: 0.7rem;"><img
                                                    src="{{ url('img/frontend/for_sale/promoted.png') }}"
                                                    alt="">PROMOTED</p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-6 text-end">
                                        @if(App\Models\AgentRequest::where('user_id',$ran->user_id)->first() != null)
                                        <a
                                            href="{{route('frontend.individual_agent',App\Models\AgentRequest::where('user_id',$ran->user_id)->first()->id)}}">
                                            <img src="{{ uploaded_asset(App\Models\AgentRequest::where('user_id',$ran->user_id)->first()->logo) }}"
                                                width="50px" height="50px" style="object-fit:cover">
                                        </a>
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
                    <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'sale', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city'] )}}"
                        class="text-decoration-underline text-dark">See all for sale properties.</a>
                </div>
            </div>
        </div>



        <div class="col-3 col-xs-12 col-tab-12 relative-sidebar">
            <div class="row sidebar-card-area">
                <div class="col-12 p-0 mb-4 custom-shadow">
                    <div class="card">
                        <img src="{{ uploaded_asset(get_settings('solo_property_advertiment_1')) }}" class="img-fluid"
                            alt="..." style="object-fit: cover; height: 15rem;">
                        <div class="card-body text-end">
                            <a href="{{ get_settings('solo_property_advertiment_link_1') }}" target="_blank"
                                class="btn find-out">Find Out More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 mb-4 custom-shadow">
                    <div class="card">
                        <img src="{{ uploaded_asset(get_settings('solo_property_advertiment_2')) }}" class="img-fluid"
                            alt="..." style="object-fit: cover; height: 15rem;">
                        <div class="card-body text-end">
                            <a href="{{ get_settings('solo_property_advertiment_link_2') }}" target="_blank"
                                class="btn find-out">Find Out More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- email modal -->

<div class="modal fade bd-example-modal-lg" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog email-modal-dialog" style="width: 910px;max-width: 1040px;">
        <div class="modal-content">
            <form action="{{route('frontend.contact_agent')}}" method="post">
                {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact Agent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body contact-agent">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <h4>To:</h4>
                                <div class="row">
                                    <div class="col-4">

                                        @if($agent->photo != null)
                                        <div class="">
                                            <img src="{{ uploaded_asset($agent->photo) }}" width="100%"
                                                style="object-fit:cover">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-8 align-middle">
                                        <label><b>Name:</b></label> {{$agent->name}} <br>
                                        <label><b>Phone Number:</b></label> {{$agent->telephone}} <br>
                                        <label><b>Address:</b></label> {{$agent->address}} <br>
                                        <label><b>Country:</b></label> {{$agent->country}} <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">


                            </div>
                            <div class="col-md-6">

                            </div>


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>First Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Last Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="last_name" required>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Im a <span style="color: red">*</span></label>
                                        <select class="form-control" name="im_resident" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="First Time Buyer">First Time Buyer</option>
                                            <option value="No Preference">No Preference</option>
                                            <option value="Repeat Buyer">Repeat Buyer</option>
                                            <option value="Seller">Seller</option>
                                            <option value="Residential Investor">Residential Investor</option>
                                            <option value="Commercial Investor">Commercial Investor</option>
                                            <option value="Commercial buyer or leaser">Commercial buyer or leaser
                                            </option>
                                            <option value="Land for development">Land for development</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date and Time <span style="color: red">*</span></label>
                                        <input type="datetime-local" class="form-control" name="time" required>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <input type="hidden" name="agent_id" value="{{$agent->id}}">
                            <input type="hidden" name="property_id" value="{{$property->id}}">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Preferred method of contact <span style="color: red">*</span></label>
                                        <select class="form-control" name="contact_method" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="Email">Email</option>
                                            <option value="Phone">Phone</option>
                                            <option value="Text">Text</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number <span style="color: red">*</span></label>
                                        <input type="number" class="form-control" name="phone_number" required>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message <span style="color: red">*</span></label>
                                        <textarea type="text" rows="3" class="form-control" name="message"
                                            required></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>







                </div>
                <div class="modal-footer contact-agent">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- share modal -->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Share this Listing</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>

                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <div class="share-options-wrapper">
                    <div class="share-option">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('for-sale/single-property') }}&quote=Check%20is%20property%20:{{ url('for-sale/single-property',$property->id) }}"
                            style="color:black"><i class="fab fa-facebook-square"></i></a>
                    </div>
                    <div class="share-option">
                        <a href="http://twitter.com/home?status=Check%20this%20property%20{{ url('for-sale/single-property',$property->id) }}"
                            style="color:black"> <i class="fab fa-twitter"></i></a>
                    </div>
                    <div class="share-option">
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('frontend.auth.login.post')}}"
                    class="needs-validation send-to-agent-form">
                    {{csrf_field()}}
                    <div class="input-group has-validation mb-3">
                        <input type="email" name="email" class="form-control form-control-lg sign-in-box shadow-sm"
                            id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp" required>
                        <span class="input-group-text shadow-sm"
                            style="background-color: white; border: none; color: #C7C7C7;"><i
                                class="fas fa-envelope fs-5"></i></span>
                        <div class="invalid-feedback">
                            This is a mandatory field and enter email address correctly to continue.
                        </div>
                    </div>

                    <div class="input-group has-validation mb-4">
                        <input type="password" name="password"
                            class="form-control form-control-lg sign-in-box shadow-sm" id="exampleInputPassword1"
                            placeholder="Password" required>
                        <span class="input-group-text shadow-sm"
                            style="background-color: white; border: none; color: #C7C7C7;"><i class="fas fa-lock fs-5"
                                style="padding:1px"></i></span>
                        <div class="invalid-feedback">
                            This is a mandatory field and must be entered to continue.
                        </div>
                    </div>

                    <div class="row mt-1" style="padding-left:10px;">
                        <div class="clearfix">
                            <div class="float-start">
                                <div class="mb-1 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1"
                                        style="font-size: 0.9rem;">Remember me</label>
                                </div>
                            </div>
                            <div class="float-end">
                                <a href="{{ route('frontend.auth.password.reset') }}" class="text-decoration-none"
                                    style="font-size: 0.9rem; color: #77CEEC;">Forgot Password</a>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="individual" value="true">

                    <button type="submit" class="btn btn-primary w-100 mt-3 py-2"
                        style="background-color: #77CEEC; border: 0; border-radius: 0;">Sign In</button>
                </form>


                <p class="text-end mt-3 bottom-p">Don't have an account? <a href="{{route('frontend.auth.register')}}"
                        class="text-decoration-none" style="color: #77CEEC;">Sign Up</a></p>

            </div>
        </div>
    </div>
</div>

@if($watch_list == null)

<div class="modal fade" id="watch_list" tabindex="-1" aria-labelledby="watch_listModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="watch_listModalLabel">Watch Listing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('frontend.watch_listing')}}">
                    {{csrf_field()}}

                    <p>Watch this listing. Receive notification when it is sold.</p>

                    <div class="form-check mb-3">
                        <input class="form-check-input" name="watch_listing" type="checkbox" value="watch_listing"
                            id="watch_listing">
                        <label class="form-check-label" for="watch_listing">
                            Watch Listing
                        </label>
                    </div>

                    <p>Watch this community. Receive updates on Detached homes in {{$property->city}} -
                        {{App\Models\Country::where('id',$property->country)->first()->country_name }}</p>

                    <div class="form-check">
                        <input class="form-check-input" name="new_list" type="checkbox" value="{{$property->city}}"
                            id="new_list">
                        <label class="form-check-label" for="new_list">
                            New Listing
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="sold_list" type="checkbox" value="{{$property->city}}"
                            id="sold_list">
                        <label class="form-check-label" for="sold_list">
                            Sold Listing
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="de_list" type="checkbox" value="{{$property->city}}"
                            id="de_list">
                        <label class="form-check-label" for="de_list">
                            Delisted Listing
                        </label>
                    </div>

                    <input type="hidden" name="pro_hidden_id" value="{{ $property->id }}" />

                    <button type="submit" class="btn btn-primary w-100 mt-3 py-2"
                        style="background-color: #77CEEC; border: 0; border-radius: 0;">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
@else


<div class="modal fade" id="watch_list_change" tabindex="-1" aria-labelledby="watch_list_changeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="watch_list_changeModalLabel">Watch Listing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('frontend.change_watch_listing')}}">
                    {{csrf_field()}}

                    <p>Watch this listing. Receive notification when it is sold.</p>

                    <div class="form-check mb-3">
                        @if($watch_list->watch_list == null)
                        <input class="form-check-input" name="watch_listing" type="checkbox" value="watch_listing"
                            id="watch_listing">
                        @else
                        <input class="form-check-input" name="watch_listing" type="checkbox" value="watch_listing"
                            id="watch_listing" checked>
                        @endif
                        <label class="form-check-label" for="watch_listing">
                            Watch Listing
                        </label>
                    </div>


                    <p>Watch this listing. Receive notification when it is sold. Watch this community. Receive updates
                        on Detached homes in {{$property->city}} -
                        {{App\Models\Country::where('id',$property->country)->first()->country_name }}</p>


                    <div class="form-check">
                        @if($watch_list->new_list == null)
                        <input class="form-check-input" name="new_list" type="checkbox" value="{{$property->city}}"
                            id="new_list">
                        @else
                        <input class="form-check-input" name="new_list" type="checkbox" value="{{$property->city}}"
                            id="new_list" checked>
                        @endif
                        <label class="form-check-label" for="new_list">
                            New Listing
                        </label>
                    </div>
                    <div class="form-check">
                        @if($watch_list->sold_list == null)
                        <input class="form-check-input" name="sold_list" type="checkbox" value="{{$property->city}}"
                            id="sold_list">
                        @else
                        <input class="form-check-input" name="sold_list" type="checkbox" value="{{$property->city}}"
                            id="sold_list" checked>
                        @endif
                        <label class="form-check-label" for="sold_list">
                            Sold Listing
                        </label>
                    </div>
                    <div class="form-check">
                        @if($watch_list->de_list == null)
                        <input class="form-check-input" name="de_list" type="checkbox" value="{{$property->city}}"
                            id="de_list">
                        @else
                        <input class="form-check-input" name="de_list" type="checkbox" value="{{$property->city}}"
                            id="de_list" checked>
                        @endif
                        <label class="form-check-label" for="de_list">
                            Delisted Listing
                        </label>
                    </div>

                    <input type="hidden" name="pro_hidden_id" value="{{ $property->id }}" />
                    <input type="hidden" name="watch_list" value="{{ $watch_list->id }}" />

                    <button type="submit" class="btn btn-primary w-100 mt-3 py-2"
                        style="background-color: #77CEEC; border: 0; border-radius: 0;">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>




@endif


@include('frontend.includes.search_filter_modal')

@endsection


@push('before-scripts')

@endpush


@push('after-scripts')


<!-- external scripts -->
<script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script>
lightGallery(document.getElementById('lightgallery'))
</script>

<script>
lightGallery(document.getElementById('lightgallery_flow'))
</script>

<script>
function changePanaroma(panaromalId) {

    let panoURL = "{{url('/')}}/pano/" + panaromalId;

    document.getElementById("panoFrame").src = panoURL;

    // $("#panoFrame")

}
</script>


<!-- near cat btn change -->
<script>
$(document).ready(function() {
    $('.near-cat-btn').click(function() {
        $('.near-cat-btn').removeClass("active-cat-btn");
        $(this).addClass("active-cat-btn");
    });
});
</script>

<script>
function photoActive() {

    //---------all btn active class remove---------------
    //select all buttons in all popup
    virtualbtn = document.querySelector("#virtual-tab");
    photobtn = document.querySelector("#photo-tab");
    videobtn = document.querySelector("#video-tab");
    directionbtn = document.querySelector("#all-map-tab");
    flowplanbtn = document.querySelector("#flow-plan-tab");


    //remove active class from all buttons in all popup
    virtualbtn.classList.remove("active");
    photobtn.classList.add("active");
    videobtn.classList.remove("active");
    directionbtn.classList.remove("active");
    flowplanbtn.classList.remove("active");


    //--------tab panes active show classes remove---------

    //-----photo active-----
    //select photo tab pane in all popup
    virtualTab = document.querySelector("#virtual");
    photoTab = document.querySelector("#photo");
    videoTab = document.querySelector("#video");
    directionTab = document.querySelector("#all-map");
    flowplanTab = document.querySelector("#flow-plan");



    //remove active and show classes from all tab panes in all popup
    virtualTab.classList.remove("active", "show");
    photoTab.classList.add("active", "show");
    videoTab.classList.remove("active", "show");
    directionTab.classList.remove("active", "show");
    flowplanTab.classList.remove("active", "show");


}


function videoActive() {

    //---------all btn active class remove---------------
    //select all buttons in all popup
    virtualbtn = document.querySelector("#virtual-tab");
    photobtn = document.querySelector("#photo-tab");
    videobtn = document.querySelector("#video-tab");
    directionbtn = document.querySelector("#all-map-tab");
    flowplanbtn = document.querySelector("#flow-plan-tab");


    //remove active class from all buttons in all popup
    virtualbtn.classList.remove("active");
    photobtn.classList.remove("active");
    videobtn.classList.add("active");
    directionbtn.classList.remove("active");
    flowplanbtn.classList.remove("active");


    //--------tab panes active show classes remove---------

    //-----photo active-----
    //select photo tab pane in all popup
    virtualTab = document.querySelector("#virtual");
    photoTab = document.querySelector("#photo");
    videoTab = document.querySelector("#video");
    directionTab = document.querySelector("#all-map");
    flowplanTab = document.querySelector("#flow-plan");



    //remove active and show classes from all tab panes in all popup
    virtualTab.classList.remove("active", "show");
    photoTab.classList.remove("active", "show");
    videoTab.classList.add("active", "show");
    directionTab.classList.remove("active", "show");
    flowplanTab.classList.remove("active", "show");


}


function virtualActive() {

    //---------all btn active class remove---------------
    //select all buttons in all popup
    virtualbtn = document.querySelector("#virtual-tab");
    photobtn = document.querySelector("#photo-tab");
    videobtn = document.querySelector("#video-tab");
    directionbtn = document.querySelector("#all-map-tab");
    flowplanbtn = document.querySelector("#flow-plan-tab");


    //remove active class from all buttons in all popup
    virtualbtn.classList.add("active");
    photobtn.classList.remove("active");
    videobtn.classList.remove("active");
    directionbtn.classList.remove("active");
    flowplanbtn.classList.remove("active");


    //--------tab panes active show classes remove---------

    //-----photo active-----
    //select photo tab pane in all popup
    virtualTab = document.querySelector("#virtual");
    photoTab = document.querySelector("#photo");
    videoTab = document.querySelector("#video");
    directionTab = document.querySelector("#all-map");
    flowplanTab = document.querySelector("#flow-plan");



    //remove active and show classes from all tab panes in all popup
    virtualTab.classList.add("active", "show");
    photoTab.classList.remove("active", "show");
    videoTab.classList.remove("active", "show");
    directionTab.classList.remove("active", "show");
    flowplanTab.classList.remove("active", "show");


}

function directionActive() {
    //---------all btn active class remove---------------
    //select all buttons in all popup
    virtualbtn = document.querySelector("#virtual-tab");
    photobtn = document.querySelector("#photo-tab");
    videobtn = document.querySelector("#video-tab");
    directionbtn = document.querySelector("#all-map-tab");
    flowplanbtn = document.querySelector("#flow-plan-tab");


    //remove active class from all buttons in all popup
    virtualbtn.classList.remove("active");
    photobtn.classList.remove("active");
    videobtn.classList.remove("active");
    directionbtn.classList.add("active");
    flowplanbtn.classList.remove("active");


    //--------tab panes active show classes remove---------

    //-----photo active-----
    //select photo tab pane in all popup
    virtualTab = document.querySelector("#virtual");
    photoTab = document.querySelector("#photo");
    videoTab = document.querySelector("#video");
    directionTab = document.querySelector("#all-map");
    flowplanTab = document.querySelector("#flow-plan");



    //remove active and show classes from all tab panes in all popup
    virtualTab.classList.remove("active", "show");
    photoTab.classList.remove("active", "show");
    videoTab.classList.remove("active", "show");
    directionTab.classList.add("active", "show");
    flowplanTab.classList.remove("active", "show");
}


function flowPlanActive() {
    //---------all btn active class remove---------------
    //select all buttons in all popup
    virtualbtn = document.querySelector("#virtual-tab");
    photobtn = document.querySelector("#photo-tab");
    videobtn = document.querySelector("#video-tab");
    directionbtn = document.querySelector("#all-map-tab");
    flowplanbtn = document.querySelector("#flow-plan-tab");


    //remove active class from all buttons in all popup
    virtualbtn.classList.remove("active");
    photobtn.classList.remove("active");
    videobtn.classList.remove("active");
    directionbtn.classList.remove("active");
    flowplanbtn.classList.add("active");


    //--------tab panes active show classes remove---------

    //-----photo active-----
    //select photo tab pane in all popup
    virtualTab = document.querySelector("#virtual");
    photoTab = document.querySelector("#photo");
    videoTab = document.querySelector("#video");
    directionTab = document.querySelector("#all-map");
    flowplanTab = document.querySelector("#flow-plan");



    //remove active and show classes from all tab panes in all popup
    virtualTab.classList.remove("active", "show");
    photoTab.classList.remove("active", "show");
    videoTab.classList.remove("active", "show");
    directionTab.classList.remove("active", "show");
    flowplanTab.classList.add("active", "show");
}
</script>


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
var swiper = new Swiper(".modalSwiper", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    direction: 'vertical'
});
var swiper2 = new Swiper(".modalSwiper2", {
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
var swiper = new Swiper(".modalflowSwiper", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    direction: 'vertical'
});
var swiper2 = new Swiper(".modalflowSwiper2", {
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
$(".show-more").click(function() {
    if ($(".text").hasClass("show-more-height")) {
        $(this).text("(Show Less)");
    } else {
        $(this).text("(Show More)");
    }

    $(".text").toggleClass("show-more-height");
});
</script>


<!-- <script>
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

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap" type="text/javascript"></script> -->

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
function initMaptwo() {
    let lat = $('#lat2').val();
    let lng = $('#lng2').val();

    const myLatLng = {
        lat: parseFloat(lat),
        lng: parseFloat(lng)
    };

    let options = {
        zoom: 8,
        center: myLatLng
    };

    const map = new google.maps.Map(document.getElementById("map2"), options);


    let marker = new google.maps.Marker({
        position: myLatLng,
        map: map
    });

}
</script>

<script>
function initMap() {

    initMaptwo();

    let lat = $('#lat').val();
    let lng = $('#lng').val();

    const myLatLng = {
        lat: parseFloat(lat),
        lng: parseFloat(lng)
    };

    let options = {
        zoom: 8,
        center: myLatLng
    };

    //custom icons for marker type
    const iconBase = "{{ url('img/frontend/map-icons') }}";
    const icons = {
        //shopping
        shopping: {
            icon: iconBase + "/shopping.png",
        },
        food: {
            icon: iconBase + "/food.png",
        },
        restuarant: {
            icon: iconBase + "/restuarant.png",
        },
        school: {
            icon: iconBase + "/school.png",
        },
        atm: {
            icon: iconBase + "/atm.png",
        },
        hospital: {
            icon: iconBase + "/hospital.png",
        },
        gym: {
            icon: iconBase + "/gym.png",
        }
    };



    const map = new google.maps.Map(document.getElementById("map"), options);

    let marker = new google.maps.Marker({
        position: myLatLng,
        map: map
    });





    let markers = [];



    //----------------shopping-----------------------
    $("#shopping").click(function() {

        for (var i = 0; i < markers.length; i++) {

            markers[i].setMap(null);
        }


        // $.ajax ({
        //     type: "GET",
        //     url: 
        //     success: function(data) {

        //     }
        // });

        let shoppingLocations = [{
                id: 1,
                lat: 50.9474,
                lng: 10.7098,
                type: "shopping"
            },
            {
                id: 2,
                lat: 50.5558,
                lng: 9.6808,
                type: "shopping"
            }
        ];


        for (var i = 0; i < shoppingLocations.length; i++) {

            var marker = new google.maps.Marker({
                map: map,
                position: shoppingLocations[i],
                icon: icons[shoppingLocations[i].type].icon,
            });

            markers.push(marker);
        }

    })


    //----------------food-----------------------
    $("#food").click(function() {

        for (var i = 0; i < markers.length; i++) {

            markers[i].setMap(null);
        }


        let foodLocations = [{
                id: 1,
                lat: 50.8019,
                lng: 8.7658,
                type: "food"
            },
            {
                id: 2,
                lat: 50.6077,
                lng: 10.6881,
                type: "food"
            }
        ];


        for (var i = 0; i < foodLocations.length; i++) {

            var marker = new google.maps.Marker({
                map: map,
                position: foodLocations[i],
                icon: icons[foodLocations[i].type].icon,
            });

            markers.push(marker);
        }


    })


    //----------------restuarant-----------------------
    $("#restuarant").click(function() {

        for (var i = 0; i < markers.length; i++) {

            markers[i].setMap(null);
        }


        let restuarantLocations = [{
                id: 1,
                lat: 50.9271,
                lng: 11.5892,
                type: "restuarant"
            },
            {
                id: 2,
                lat: 50.7508,
                lng: 9.2692,
                type: "restuarant"
            }
        ];


        for (var i = 0; i < restuarantLocations.length; i++) {

            var marker = new google.maps.Marker({
                map: map,
                position: restuarantLocations[i],
                icon: icons[restuarantLocations[i].type].icon,
            });

            markers.push(marker);
        }


    })


    //----------------school-----------------------
    $("#school").click(function() {

        for (var i = 0; i < markers.length; i++) {

            markers[i].setMap(null);
        }


        let schoolLocations = [{
                id: 1,
                lat: 50.7271,
                lng: 11.4892,
                type: "school"
            },
            {
                id: 2,
                lat: 50.6508,
                lng: 9.3692,
                type: "school"
            }
        ];


        for (var i = 0; i < schoolLocations.length; i++) {

            var marker = new google.maps.Marker({
                map: map,
                position: schoolLocations[i],
                icon: icons[schoolLocations[i].type].icon,
            });

            markers.push(marker);
        }


    })


    //----------------atm-----------------------
    $("#atm").click(function() {

        for (var i = 0; i < markers.length; i++) {

            markers[i].setMap(null);
        }


        let atmLocations = [{
                id: 1,
                lat: 50.5271,
                lng: 11.6892,
                type: "atm"
            },
            {
                id: 2,
                lat: 50.5508,
                lng: 9.5692,
                type: "atm"
            }
        ];


        for (var i = 0; i < atmLocations.length; i++) {

            var marker = new google.maps.Marker({
                map: map,
                position: atmLocations[i],
                icon: icons[atmLocations[i].type].icon,
            });

            markers.push(marker);
        }


    })


    //----------------hospital-----------------------
    $("#hospital").click(function() {

        for (var i = 0; i < markers.length; i++) {

            markers[i].setMap(null);
        }


        let hospitalLocations = [{
                id: 1,
                lat: 50.5671,
                lng: 11.5892,
                type: "hospital"
            },
            {
                id: 2,
                lat: 50.5608,
                lng: 9.3692,
                type: "hospital"
            }
        ];


        for (var i = 0; i < hospitalLocations.length; i++) {

            var marker = new google.maps.Marker({
                map: map,
                position: hospitalLocations[i],
                icon: icons[hospitalLocations[i].type].icon,
            });

            markers.push(marker);
        }


    })


    //----------------gym-----------------------
    $("#gym").click(function() {

        for (var i = 0; i < markers.length; i++) {

            markers[i].setMap(null);
        }


        let gymLocations = [{
                id: 1,
                lat: 50.9671,
                lng: 10.5892,
                type: "gym"
            },
            {
                id: 2,
                lat: 50.5608,
                lng: 11.3692,
                type: "gym"
            }
        ];


        for (var i = 0; i < gymLocations.length; i++) {

            var marker = new google.maps.Marker({
                map: map,
                position: gymLocations[i],
                icon: icons[gymLocations[i].type].icon,
            });

            markers.push(marker);
        }

    })

}
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
    type="text/javascript"></script>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("fullslider-slides");
    var dots = document.getElementsByClassName("fullslider-slide-thumbnail");
    var captionText = document.getElementById("fullslider-caption");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    console.log(slideIndex);

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        // slides[i].style.display = "inline";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    // slides[slideIndex-1].style.display = "inline";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
}
</script>
@endpush