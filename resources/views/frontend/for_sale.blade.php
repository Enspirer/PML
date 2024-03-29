@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/for_sale.css') }}" rel="stylesheet">
<style>
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
        <div class="col-12">
            <p><a href="{{url('/')}}" class="text-decoration-none text-dark fw-bold">Property Market Live</a>
                >
                <a href="" class="text-decoration-none text-dark fw-bold">
                    @if(ucfirst($transaction_type) == 'Transaction_type')
                    All
                    @else
                    {{ucfirst($transaction_type)}}
                    @endif
                </a>

                > <a class="text-decoration-none text-dark fw-bold">Result</a>
            </p>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row" style="margin-bottom: 3rem;">
        <div class="col-9 col-xs-12 col-tab-12">

            <h4>Properties for
                @if(ucfirst($transaction_type) == 'Transaction_type')
                All
                @else
                {{ucfirst($transaction_type)}}
                @endif

                @if(get_country_cookie(request()) != null)
                in
                <span class="fw-bold">{{get_country_cookie(request())->country_name}}</span>
                @endif
            </h4>


            <!-- mobile most recent and units available and filter area -->
            <div class="visible-xs">

                <div class="mobile-full-bar">
                    <p>{{$count_for_sale}} units available</p>
                    <p style="color: black;">
                        <i class="fas fa-sort-amount-down"></i>
                        Sort By:
                        <select name="" class="border-0" style="color: #FF0000">
                            <option value="most_recent">Most Recent</option>
                        </select>
                    </p>
                </div>

                <div class="input-group mobile-filter">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search"
                        data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Filters"
                        style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">

                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn text-white"
                        style="background-color : #35495E; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><img
                            src="{{ url('img/frontend/index/filter.png') }}" alt="" style="height: 1rem;"></button>
                </div>

            </div>

            <!-- desktop most recent and units available and filter area -->
            <div class="row align-items-center hidden-xs">
                <div class="col-6 col-xs-12">
                    <p>{{$count_for_sale}} units available</p>
                </div>

                <div class="col-6 col-xs-12">
                    <div class="row align-items-center">
                        <div class="col-6 col-xs-12">
                            <p style="color: black;">
                                <i class="fas fa-sort-amount-down"></i>
                                Sort By:
                                <select name="" class="border-0" style="color: #FF0000">
                                    <option value="most_recent">Most Recent</option>
                                </select>
                            </p>
                        </div>

                        <div class="col-6 text-end col-xs-12">
                            <div class="input-group">
                                <input type="text" name="search_keyword" class="form-control p-3" aria-label="search"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Filters"
                                    style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">

                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn text-white"
                                    style="background-color : #35495E; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><img
                                        src="{{ url('img/frontend/index/filter.png') }}" alt=""
                                        style="height: 1rem;"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 align-items-center btn-filters">
                <div class="filter-btn-area-mobile">
                    @if($beds == 'all_beds' || $beds == 'beds')
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', 'all_beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a active-room"
                                style="text-decoration:none">All Rooms</a>
                        </div>
                    @else
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', 'all_beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a"
                                style="text-decoration:none">All Rooms</a>
                        </div>
                    @endif

                    @if($beds == 1)
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', '1', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a active-room" style="text-decoration:none">1
                                bedroom</a>
                        </div>
                    @else
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', '1', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a" style="text-decoration:none">1
                                bedroom</a>
                        </div>
                    @endif

                    @if($beds == 2)
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', '2', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a active-room" style="text-decoration:none">2
                                bedrooms</a>
                        </div>
                    @else
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', '2', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a" style="text-decoration:none">2
                                bedrooms</a>
                        </div>
                    @endif

                    @if($beds == 3)
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', '3', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a active-room" style="text-decoration:none">3
                                bedrooms</a>
                        </div>
                    @else
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', '3', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a" style="text-decoration:none">3
                                bedrooms</a>
                        </div>
                    @endif

                    @if($beds == 4)
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', '4', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a active-room" style="text-decoration:none">4
                                bedrooms</a>
                        </div>
                    @else
                        <div class="single-filter-btn">
                            <a href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', 'property_type', '4', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}"
                                class="btn bg-white border px-3 single-filter-btn-a" style="text-decoration:none">4
                                bedrooms</a>
                        </div>
                    @endif
                   
                </div>
            </div>

            <!-- mobile area -->
            <div class="row justify-content-center custom-shadow p-3 mb-4 visible-xs sale-mobile-area">
                <div class="mobile-p-0">

                    <div class="sale-btns-area">
                        @auth
                        <a data-toggle="modal" data-target="#email_alert_Modal"
                            class="btn py-2 fw-bold text-white rounded-pill tab-full-btn"
                            style="border: 0.5px solid rgb(112, 112, 112);background-color: rgb(53, 73, 94);font-size: 12px;flex:1;">
                            <div class="btn-txt-wrapper">
                                <i class="fas fa-envelope sale-btn-icon"></i>
                                Create email alert
                            </div>
                        </a>

                        @else
                        <a href="{{route('frontend.auth.login')}}"
                            class="btn py-2 fw-bold text-white rounded-pill tab-full-btn"
                            style="border: 0.5px solid rgb(112, 112, 112);background-color: rgb(53, 73, 94);font-size: 12px;flex:1;">
                            <div class="btn-txt-wrapper">
                                <i class="fas fa-envelope sale-btn-icon"></i>
                                Create email alert
                            </div>
                        </a>
                        @endauth

                        <div class="" style="flex:1;">
                            @auth
                            @if(App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first()
                            == null)
                            <form action="{{route('frontend.save_search')}}" method="post"
                                enctype="multipart/form-data">
                                {{csrf_field()}}
                                <button type="submit" class="btn py-2 fw-bold rounded-pill tab-full-btn"
                                    style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 100%;">
                                    <div class="btn-txt-wrapper">
                                        <i class="far fa-heart sale-btn-icon"></i>
                                        Save this Search
                                    </div>
                                </button>
                                <input type="hidden" name="save_url" value="{{ url()->current() }}" />
                            </form>
                            @else
                            <form
                                action="{{route('frontend.save_search_Delete',App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first()->id)}}"
                                method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <button type="submit" class="btn py-2 fw-bold rounded-pill tab-full-btn"
                                    style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 100%; background-color:#F33A6A;">
                                    <div class="btn-txt-wrapper">
                                        <i class="fas fa-heart sale-btn-icon"></i>
                                        Unsave this Search
                                    </div>
                                </button>
                                <input type="hidden" name="prop_hidden_id"
                                    value="{{ App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first()->id }}" />
                            </form>
                            @endif
                            @else

                            <a href="{{route('frontend.auth.login')}}"
                                class="btn py-2 fw-bold rounded-pill tab-full-btn"
                                style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 100%;">
                                <div class="btn-txt-wrapper">
                                    <i class="far fa-heart sale-btn-ico"></i>
                                    Save this Search
                                </div>
                            </a>
                            @endauth
                        </div>


                    </div>







                </div>

            </div>

            <!-- @if($count_for_sale == 0)
                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'Properties Not Found',
                    ])
                @endif     -->

            @if(count($properties_promoted) != 0 )
            <div class="row mt-5 featured_properties">
                @foreach($properties_promoted as $key => $property_pro)
                <div class="col-4 col-xs-12 col-tab-50">
                    <div class="card custom-shadow position-relative" style="min-height: 370px;max-height: 450px;">
                        <a href="{{ route('frontend.for_sale_single',$property_pro->id) }}"
                            class="text-decoration-none text-dark">
                            <img src="{{ uploaded_asset($property_pro->feature_image_id) }}" alt=""
                                class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                @if($property_pro->panaromal_status != 'no_any')
                                    <img class="pano-symbol" src="{{ url('img/360.png') }}" alt="360 logo">
                                @endif
                        </a>

                        <div class="for-sale-card-body-mobile card-body mt-2">
                            <div class="row mb-2">
                                <div class="col-10">
                                    <h5 class="fw-bold">{{ get_currency(request() ,$property_pro->price)}}</h5>
                                </div>
                                <div class="col-1" style="display:flex; justify-content:center;">

                                    @php
                                        if(auth()->user()) {
                                            $favourite = App\Models\Favorite::where('property_id',$property_pro->id)->where('user_id',auth()->user()->id)->first();
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
                                                <input type="hidden" name="prop_hidden_id" value="{{ $property_pro->id }}" />
                                            </form>
                                        @else
                                            <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}"
                                                method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <button class="fas fa-heart border-0"
                                                    style="color: #F60331; background-color: white;"></button>
                                                <input type="hidden" name="prop_hidden_id" value="{{ $favourite->id }}" />
                                            </form>
                                        @endif
                                    @else
                                        @if(is_favorite_cookie($property_pro->id))
                                            <a href="{{url('favourite_cookie_properties/remove',$property_pro->id)}}" class="fas fa-heart border-0" style="text-decoration:none; color:red; border: 1.5px solid; background-color:white;"></a>
                                        @else 
                                            <form action="{{route('frontend.favourite_cookie.store')}}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <input type="hidden" name="cookie_property_id" value="{{ $property_pro->id }}" />
                                                <button type="submit" class="fas fa-heart border-0" style="background-color: white"></button>
                                            </form>
                                        @endif
                                        <!-- <form action="{{route('frontend.auth.login')}}" method="get"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <button type="submit" class="fas fa-heart border-0"
                                                style="background-color: white"></button>
                                        </form> -->
                                    @endauth
                                </div>
                            </div>

                            <h6 class="fw-bold mb-2">{{$property_pro->name}}</h6>
                            <p
                                style="font-size: 11px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">
                                {{$property_pro->description}}</p>
                            <!-- <p>541, Rosewood place,</p> -->
                            <p class="mb-1 mt-1">
                                {{App\Models\Location::where('id',$property_pro->area)->first()->district }},
                                {{App\Models\Country::where('id',$property_pro->country)->first()->country_name }}</p>
                            <p>
                                @if($property_pro->beds != null)
                                {{ $property_pro->beds }}<i class="fas fa-bed ms-2 me-3"></i>
                                @endif
                                @if($property_pro->baths != null)
                                {{ $property_pro->baths }}<i class="fas fa-bath ms-2"></i>
                            </p>
                            @endif
                        </div>

                        <!-- <div class="position-absolute apart-avail">
                                        <button class="btn fw-bold me-3">APARTMENT</button>
                                        <button class="btn fw-bold" style="color: #39B54A">AVAILABLE</button>
                                    </div> -->

                        <div class="row align-items-center prom-logo position-absolute">
                            <div class="col-6">
                                <div class="py-1 ps-3" style="background-color: #FF0000;">
                                    <p class="text-white" style="font-size: 0.7rem;"><img
                                            src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                @if(App\Models\AgentRequest::where('user_id',$property_pro->user_id)->first() != null)
                                <a href="{{route('frontend.individual_agent',App\Models\AgentRequest::where('user_id',$property_pro->user_id)->first()->id)}}"
                                    style="">
                                    <img src="{{ uploaded_asset(App\Models\AgentRequest::where('user_id',$property_pro->user_id)->first()->logo) }}"
                                        width="50%" class="mobile-agent-squre-img" style="object-fit:cover">
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif


            <div class="row" style="margin-top: 5rem;">


                <div class="col-12">
                    @if(count($properties) == 0 )
                        @include('frontend.includes.not_found',[
                            'not_found_title' => 'Properties not found',
                            'not_found_description' => 'Please add properties',
                            'not_found_button_caption' => null
                        ])

                    @else
                        @foreach($properties as $key => $normal)
                            @if($normal['premium'] == 'Enabled')
                                <div class="row custom-shadow mb-4 mx-1">
                                    <div class="col-6 p-3 col-xs-12 mobile-m-0">
                                        <div class="swiper mySwiper2" id="swiper_2{{$normal['id']}}">
                                            <div class="swiper-wrapper">
                                                @php
                                                    $str_arr2 = preg_split ("/\,/", $normal['image_ids']);
                                                @endphp

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
                                        <div thumbsSlider="" class="swiper mySwiper mt-2" id="swiper_small_2{{$normal['id']}}">
                                            <div class="swiper-wrapper">
                                                @foreach($str_arr2 as $key=> $pre)
                                                    <div class="swiper-slide">
                                                        <img src="{{ uploaded_asset($pre) }}" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 p-3 col-xs-12 mobile-p-0">
                                        <div class="row align-items-center mb-4 pt-4">
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="tag-premium">
                                                        <div class="py-1 text-center" style="background-color: #FF0000;">
                                                            <p style="white-space: nowrap;padding:5px 10px;" class="text-white">Premium Listing</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-6 text-end">
                                                @if(App\Models\AgentRequest::where('user_id',$normal['user_id'])->first() != null)
                                                <a href="{{route('frontend.individual_agent',App\Models\AgentRequest::where('user_id',$normal['user_id'])->first()->id)}}"
                                                    style="text-decoration: none">
                                                    <img src="{{ uploaded_asset(App\Models\AgentRequest::where('user_id',$normal['user_id'])->first()->logo) }}"
                                                        width="50%" class="mobile-agent-squre-img" style="object-fit:cover;">
                                                </a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-2">
                                                    <div class="col-10">
                                                        @if($normal['price_options'] == 'Full')
                                                            <a href="{{ route('frontend.for_sale_single',$normal['id']) }}"
                                                                class="text-decoration-none text-dark">
                                                                <h3 class="fw-bold">{{ get_currency(request() ,$normal['price'])}}</h3>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('frontend.for_sale_single',$normal['id']) }}"
                                                                class="text-decoration-none text-dark">
                                                                <h3 class="fw-bold">{{ get_currency(request() ,$normal['price'])}} <span
                                                                        class="fw-normal"
                                                                        style="font-size: 1rem; color: rgb(0, 0, 0, 0.45)">Per
                                                                        Perch</span></h3>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- <p class="mb-2 fw-bold" style="font-size: 1.1rem; color: black">Commercial Land for Sale</p> -->
                                                <a href="{{ route('frontend.for_sale_single',$normal['id']) }}"
                                                    class="text-decoration-none text-dark">
                                                    <p class="mb-2" style="font-size: 1rem; color: black">{{$normal['name']}},
                                                        {{App\Models\Location::where('id',$normal['area'])->first()->district }},
                                                        {{App\Models\Country::where('id',$normal['country'])->first()->country_name }}
                                                    </p>
                                                </a>
                                                <p
                                                    style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                                    {{$normal['description']}}</p>

                                                <p class="mt-3" style="font-size: 1rem;">
                                                    @if($normal['beds'] != null)
                                                    {{$normal['beds']}}<i class="fas fa-bed ms-2 me-3"></i>
                                                    @endif
                                                    @if($normal['beds'] != null)
                                                    {{$normal['baths']}}<i class="fas fa-bath ms-2"></i>
                                                    @endif
                                                </p>

                                                <div class="mt-3">
                                                    @if(App\Models\AgentRequest::where('user_id',$normal['user_id'])->first() != null)
                                                    <p class="mb-3 fw-bold"><i
                                                            class="fas fa-phone-alt me-3"></i></i>{{App\Models\AgentRequest::where('user_id',$normal['user_id'])->first()->telephone}}
                                                    </p>
                                                    <p class="mb-3 fw-bold"><i
                                                            class="fas fa-envelope me-3"></i>{{App\Models\AgentRequest::where('user_id',$normal['user_id'])->first()->email}}
                                                    </p>
                                                    @endif

                                                    <!-- <p class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</p> -->

                                                    @auth
                                                        @php
                                                            if(auth()->user()) {
                                                                $favourite = App\Models\Favorite::where('property_id',$normal['id'])->where('user_id',auth()->user()->id)->first();
                                                            }else{
                                                                $favourite = null;
                                                            }
                                                        @endphp

                                                        @if($favourite == null)
                                                            <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</button>
                                                                <input type="hidden" name="prop_hidden_id" value="{{ $normal['id'] }}" />
                                                            </form>
                                                        @else
                                                            <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}" method="post" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <button type="submit" class="mb-3 fw-bold btn" style="margin-left:-13px; color: rgb(246, 3, 49); background-color: white;"><i class="fas fa-heart me-3"></i>Unsave Property</button>
                                                                <input type="hidden" name="prop_hidden_id" value="{{ $favourite->id }}" />
                                                            </form>
                                                        @endif
                                                    @else
                                                        @if(is_favorite_cookie($normal['id']))
                                                            <a href="{{url('favourite_cookie_properties/remove',$normal['id'])}}" class="mb-3 fw-bold btn" style="margin-left:-13px; text-decoration:none; color:red; background-color:white;"><i class="fas fa-heart me-3"></i>Unsave Property</a>
                                                        @else 
                                                            <form action="{{route('frontend.favourite_cookie.store')}}" method="post" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="cookie_property_id" value="{{ $normal['id'] }}" />
                                                                <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</button>
                                                            </form>
                                                        @endif

                                                        <!-- <a href="{{route('frontend.auth.login')}}">
                                                            <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</button>
                                                        </a> -->
                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else

                                <div class="row custom-shadow mb-4 mx-1">
                                    <div class="col-6 p-3 col-xs-12">
                                        <div class="swiper mySwiper2" id="swiper_2{{$normal['id']}}">
                                            <div class="swiper-wrapper">
                                                @php
                                                $str_arr2 = preg_split ("/\,/", $normal['image_ids']);
                                                @endphp

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
                                        <div thumbsSlider="" class="swiper mySwiper mt-2" id="swiper_small_2{{$normal['id']}}">
                                            <div class="swiper-wrapper">
                                                @foreach($str_arr2 as $key=> $pre)
                                                <div class="swiper-slide">
                                                    <img src="{{ uploaded_asset($pre) }}" />
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 p-3 col-xs-12">
                                        <div class="row align-items-center mb-4 pt-4">
                                            <div class="col-6">

                                            </div>
                                            <div class="col-6 text-end">
                                                @if(App\Models\AgentRequest::where('user_id',$normal['user_id'])->first() != null)
                                                <a href="{{route('frontend.individual_agent',App\Models\AgentRequest::where('user_id',$normal['user_id'])->first()->id)}}"
                                                    style="text-decoration: none">
                                                    <img src="{{ uploaded_asset(App\Models\AgentRequest::where('user_id',$normal['user_id'])->first()->logo) }}"
                                                        width="50%">
                                                </a>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row mb-2">
                                                    <div class="col-10">
                                                        @if($normal['price_options'] == 'Full')
                                                        <a href="{{ route('frontend.for_sale_single',$normal['id']) }}"
                                                            class="text-decoration-none text-dark">
                                                            <h3 class="fw-bold">{{ get_currency(request() ,$normal['price'])}}</h3>
                                                        </a>
                                                        @else
                                                        <a href="{{ route('frontend.for_sale_single',$normal['id']) }}"
                                                            class="text-decoration-none text-dark">
                                                            <h3 class="fw-bold">{{ get_currency(request() ,$normal['price'])}} <span
                                                                    class="fw-normal"
                                                                    style="font-size: 1rem; color: rgb(0, 0, 0, 0.45)">Per
                                                                    Perch</span></h3>
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- <p class="mb-2 fw-bold" style="font-size: 1.1rem; color: black">Commercial Land for Sale</p> -->
                                                <a href="{{ route('frontend.for_sale_single',$normal['id']) }}"
                                                    class="text-decoration-none text-dark">
                                                    <p class="mb-2" style="font-size: 1rem; color: black">{{$normal['name']}},
                                                        {{App\Models\Location::where('id',$normal['area'])->first()->district }},
                                                        {{App\Models\Country::where('id',$normal['country'])->first()->country_name }}
                                                    </p>
                                                </a>
                                                <p
                                                    style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                                    {{$normal['description']}}</p>

                                                <p class="mt-3" style="font-size: 1rem;">
                                                    @if($normal['beds'] != null)
                                                    {{$normal['beds']}}<i class="fas fa-bed ms-2 me-3"></i>
                                                    @endif
                                                    @if($normal['beds'] != null)
                                                    {{$normal['baths']}}<i class="fas fa-bath ms-2"></i>
                                                    @endif
                                                </p>

                                                <div class="mt-3">
                                                    @if(App\Models\AgentRequest::where('user_id',$normal['user_id'])->first() != null)
                                                    <p class="mb-3 fw-bold"><i
                                                            class="fas fa-phone-alt me-3"></i></i>{{App\Models\AgentRequest::where('user_id',$normal['user_id'])->first()->telephone}}
                                                    </p>
                                                    <p class="mb-3 fw-bold"><i
                                                            class="fas fa-envelope me-3"></i>{{App\Models\AgentRequest::where('user_id',$normal['user_id'])->first()->email}}
                                                    </p>
                                                    @endif

                                                    <!-- <p class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</p> -->

                                                    @auth
                                                        @php
                                                            if(auth()->user()) {
                                                                $favourite = App\Models\Favorite::where('property_id',$normal['id'])->where('user_id',auth()->user()->id)->first();
                                                            }else{
                                                                $favourite = null;
                                                            }
                                                        @endphp

                                                        @if($favourite == null)
                                                            <form action="{{route('frontend.propertyFavourite')}}" method="post"
                                                                enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i
                                                                        class="fas fa-heart me-3"></i>Save Property</button>
                                                                <input type="hidden" name="prop_hidden_id" value="{{ $normal['id'] }}" />
                                                            </form>
                                                        @else
                                                            <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}"
                                                                method="post" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <button type="submit" class="mb-3 fw-bold btn"
                                                                    style="margin-left:-13px; color: rgb(246, 3, 49); background-color: white;"><i
                                                                        class="fas fa-heart me-3"></i>Unsave Property</button>
                                                                <input type="hidden" name="prop_hidden_id" value="{{ $favourite->id }}" />
                                                            </form>
                                                        @endif
                                                    @else
                                                        @if(is_favorite_cookie($normal['id']))
                                                            <a href="{{url('favourite_cookie_properties/remove',$normal['id'])}}" class="mb-3 fw-bold btn" style="margin-left:-13px; text-decoration:none; color:red; background-color:white;"><i class="fas fa-heart me-3"></i>Unsave Property</a>
                                                        @else 
                                                            <form action="{{route('frontend.favourite_cookie.store')}}" method="post" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="cookie_property_id" value="{{ $normal['id'] }}" />
                                                                <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</button>
                                                            </form>
                                                        @endif
                                                    @endauth

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        @endforeach

                        <div class="my-md-5">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">{{ $properties->links() }}</li>
                                </ul>
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-3 col-xs-12 col-tab-50 tab-center tab-mb-30">
            <div class="row justify-content-center custom-shadow p-3 mb-4 hidden-xs">
                <div class="col-12 text-center">

                    @auth
                    <a data-toggle="modal" data-target="#email_alert_Modal"
                        class="btn py-2 fw-bold text-white w-100 rounded-pill tab-full-btn"
                        style="border: 0.5px solid rgb(112, 112, 112);background-color: rgb(53, 73, 94);font-size: 12px;width: 230px;">
                        <div class="row justify-content-center">
                            <div class="col-2 p-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="col-7 p-0 text-start">
                                Create email alert
                            </div>
                        </div>
                    </a>

                    @else
                    <a href="{{route('frontend.auth.login')}}"
                        class="btn py-2 fw-bold text-white w-100 rounded-pill tab-full-btn"
                        style="border: 0.5px solid rgb(112, 112, 112);background-color: rgb(53, 73, 94);font-size: 12px;width: 230px;">
                        <div class="row justify-content-center">
                            <div class="col-2 p-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="col-7 p-0 text-start">
                                Create email alert
                            </div>
                        </div>
                    </a>
                    @endauth






                </div>
                <div class="col-12 text-center " style="margin-top: 10px;">


                    @auth
                    @if(App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first()
                    == null)
                    <form action="{{route('frontend.save_search')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <button type="submit" class="btn py-2 fw-bold w-100 rounded-pill tab-full-btn"
                            style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 230px;">
                            <div class="row justify-content-center">
                                <div class="col-2 p-0">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="col-7 p-0 text-start">
                                    Save this Search
                                </div>
                            </div>
                        </button>
                        <input type="hidden" name="save_url" value="{{ url()->current() }}" />
                    </form>
                    @else
                    <form
                        action="{{route('frontend.save_search_Delete',App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first()->id)}}"
                        method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <button type="submit" class="btn py-2 fw-bold w-100 rounded-pill tab-full-btn"
                            style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 230px; background-color:#F33A6A;">
                            <div class="row justify-content-center text-light">
                                <div class="col-2 p-0">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="col-7 p-0 text-start">
                                    Unsave this Search
                                </div>
                            </div>
                        </button>
                        <input type="hidden" name="prop_hidden_id"
                            value="{{ App\Models\UserSearch::where('user_id',auth()->user()->id)->where('url',url()->current())->first()->id }}" />
                    </form>
                    @endif
                    @else

                    <a href="{{route('frontend.auth.login')}}" class="btn py-2 fw-bold w-100 rounded-pill tab-full-btn"
                        style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 230px;">
                        <div class="row justify-content-center">
                            <div class="col-2 p-0">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="col-7 p-0 text-start">
                                Save this Search
                            </div>
                        </div>
                    </a>
                    @endauth

                </div>
            </div>

            <div class="row sidebar-card-area mt-5">
                <div class="col-12 p-0 mb-4 custom-shadow">
                    <div class="card">
                        @if(get_settings('property_page_advertiment_1') != null)
                            <img width="100%" src="{{ url(get_settings('property_page_advertiment_1')) }}" class="img-fluid" alt="..." style="">
                        @else
                            <img width="100%" src="{{ url('img/no-image.jpg') }}" class="img-fluid" alt="..." style="">
                        @endif
                        
                        <div class="card-body text-end">
                            <a href="{{ get_settings('property_page_link_1') }}" target="_blank"
                                class="btn find-out">Find Out More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 p-0 mb-4 custom-shadow">
                    <div class="card">
                        @if(get_settings('property_page_advertiment_2') != null)
                            <img width="100%" src="{{ url(get_settings('property_page_advertiment_2')) }}" class="img-fluid" alt="..." style="">
                        @else
                            <img width="100%" src="{{ url('img/no-image.jpg') }}" class="img-fluid" alt="..." style="">
                        @endif
                        <div class="card-body text-end">
                            <a href="{{ get_settings('property_page_link_2') }}" class="btn find-out"
                                target="_blank">Find Out More</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-0 custom-shadow">
                    <div class="card">
                        @if(get_settings('property_page_advertiment_3') != null)
                            <img width="100%" src="{{ url(get_settings('property_page_advertiment_3')) }}" class="img-fluid" alt="..." style="">
                        @else
                            <img width="100%" src="{{ url('img/no-image.jpg') }}" class="img-fluid" alt="..." style="">
                        @endif
                        <div class="card-body text-end">
                            <a href="{{ get_settings('property_page_link_3') }}" target="_blank"
                                class="btn find-out">Find Out More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(\Session::has('success') )

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary invisible" id="modal-btn" data-toggle="modal"
    data-target="#voteModal"></button>

<div class="modal fade" id="voteModal" tabindex="-1" aria-labelledby="voteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body" style="padding: 3rem">
                <h4 class="text-center">Email Alert Sent Successfully</h4>
                <!-- <h5>Email Alert Sent</h5> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Create Mail Alert Modal -->
<div class="modal fade" id="email_alert_Modal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('frontend.subscribed.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Create Email Alert</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-between">
                        <div>
                            <label for="email" class="form-label mb-2 required">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="email"
                                required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Sumbit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('frontend.includes.search_filter_modal')

@endsection

@push('after-scripts')


<!-- single filter btn change -->
<script>
$(document).ready(function() {
    $('.single-filter-btn-a').click(function() {
        $('.single-filter-btn-a').removeClass("active-room");
        $(this).addClass("active-room");
    });
});
</script>


<script>
if (document.getElementById("modal-btn")) {
    $('#modal-btn').click();
}
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



@if(count($properties) != 0 )
@foreach($properties as $key => $normal)
<script>
var swiper = new Swiper("#swiper_small_2{{$normal['id']}}", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
});
var swiper2 = new Swiper("#swiper_2{{$normal['id']}}", {
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
@endforeach
@endif


@endpush