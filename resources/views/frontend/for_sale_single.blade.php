@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/for_sale_single.css') }}" rel="stylesheet">
@endpush

@section('content')

@if ( session()->has('message'))


    <div class="container" style="background-color: #c6e4ee; margin-bottom:50px; padding:30px; border-radius: 50px 50px; text-align:center;">

        <h1 style="margin-top:150px;" class="display-6">Thanks for Booking!</h1><br>
        <p class="lead"><h4>One of our member will get back in touch with you soon!<br><br> Have a great day!</h4></p>
        <hr><br>    
        <p class="lead">
            <a class="btn btn-info btn-md mb-5" href="{{ url('for-sale/single-property',$property->id) }}" role="button">Go Back to View Property</a>
        </p>
    </div>
  

@else

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
                                                    @auth
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#emailModal" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                                            <div class="row justify-content-center">
                                                                <div class="col-3 p-0">
                                                                    <i class="fas fa-envelope"></i>
                                                                </div>
                                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                                    Send email to agent
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                                            <div class="row justify-content-center">
                                                                <div class="col-3 p-0">
                                                                    <i class="fas fa-envelope"></i>
                                                                </div>
                                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                                    Send email to agent
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endauth
                                                </div>

                                                <div class="col-12 text-center mb-2">
                                                    @auth
                                                        @if($favourite == null)
                                                            <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                                <button type="submit" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-3 p-0">
                                                                            <i class="far fa-heart"></i>
                                                                        </div>
                                                                        <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                                            Save this Property
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="prop_hidden_id" value="{{ $property->id }}" />
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}" method="post" enctype="multipart/form-data">
                                                            {{csrf_field()}}
                                                                <button type="submit" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070; background-color:#F33A6A;">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-3 p-0">
                                                                            <i class="far fa-heart"></i>
                                                                        </div>
                                                                        <div class="col-7 p-0 text-start text-light" style="font-size: 0.9rem;">
                                                                            Unsave this Property
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                                <input type="hidden" name="prop_hidden_id" value="{{ $favourite->id }}" />
                                                            </form>
                                                        @endif
                                                    @else
                                                        <a href="{{route('frontend.auth.login')}}" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                                            <div class="row justify-content-center">
                                                                <div class="col-3 p-0">
                                                                    <i class="far fa-heart"></i>
                                                                </div>
                                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                                    Save this Property
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

    <!-- email modal -->
    
        <div class="modal fade bd-example-modal-lg" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 910px;max-width: 1040px;">
                <div class="modal-content">
                    <form action="{{route('frontend.contact_agent')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contact Agent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <h4>To:</h4>
                                    <div class="row">
                                        <div class="col-4">
                                            
                                            @if($agent->photo != null)
                                                <div class="" >
                                                    <img src="{{ uploaded_asset($agent->photo) }}" width="100%" style="object-fit:cover">
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
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>First Name  <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Last Name  <span style="color: red">*</span></label>
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
                                            <option value="Commercial buyer or leaser">Commercial buyer or leaser</option>
                                            <option value="Land for development">Land for development</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date and Time  <span style="color: red">*</span></label>
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
                                        <label>Preferred method of contact  <span style="color: red">*</span></label>
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
                                        <label>Email  <span style="color: red">*</span></label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number  <span style="color: red">*</span></label>
                                        <input type="number" class="form-control" name="phone_number" required>
                                    </div>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Message  <span style="color: red">*</span></label>
                                        <textarea type="text" rows="3" class="form-control" name="message" required></textarea>
                                    </div>
                                </div>

                            </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>

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
                    <form method="post" action="{{route('frontend.auth.login.post')}}" class="needs-validation">
                        {{csrf_field()}}
                        <div class="input-group has-validation mb-3">
                            <input type="email" name="email" class="form-control form-control-lg sign-in-box shadow-sm" id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp" required>
                            <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="fas fa-envelope fs-5"></i></span>
                            <div class="invalid-feedback">
                                This is a mandatory field and enter email address correctly to continue.
                            </div>
                        </div>

                        <div class="input-group has-validation mb-4">
                            <input type="password" name="password" class="form-control form-control-lg sign-in-box shadow-sm" id="exampleInputPassword1" placeholder="Password" required>
                            <span class="input-group-text shadow-sm" style="background-color: white; border: none; color: #C7C7C7;"><i class="fas fa-lock fs-5" style="padding:1px"></i></span>
                            <div class="invalid-feedback">
                                This is a mandatory field and must be entered to continue.
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="clearfix">
                                <div class="float-start">
                                    <div class="mb-1 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1" style="font-size: 0.9rem;">Remember me</label>
                                    </div>
                                </div>
                                <div class="float-end">
                                    <a href="{{ route('frontend.auth.password.reset') }}" class="text-decoration-none" style="font-size: 0.9rem; color: #77CEEC;">Forgot Password</a>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="individual" value="true">

                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2" style="background-color: #77CEEC; border: 0; border-radius: 0;">Sign In</button>
                    </form>


                    <p class="text-end mt-3">Don't have an account? <a href="{{route('frontend.auth.register')}}" class="text-decoration-none" style="color: #77CEEC;">Sign Up</a></p>

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

@endif