@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/for_sale.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('frontend.includes.search')


    <div class="container index" style="margin-top: 2rem;">
        <div class="row">
            <div class="col-12">
                <p><a href="" class="text-decoration-none text-dark fw-bold">Property Market Live</a>
                    >
                        <a href="" class="text-decoration-none text-dark fw-bold">{{ucfirst($transaction_type)}}</a>

                    > <a href="" class="text-decoration-none text-dark fw-bold">Result</a></p>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row" style="margin-bottom: 3rem;">
            <div class="col-9">
                
                <h4>Property for 
                    @if(ucfirst($transaction_type) == 'Transaction_type')
                        All
                    @else
                        {{ucfirst($transaction_type)}}
                    @endif
                     in <span class="fw-bold">Sri Lanka</span></h4>
                    
                <div class="row align-items-center">
                    <div class="col-6">
                        <p>{{$count_for_sale}} units available</p>
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

                @if($count_for_sale == 0)
                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'Properties Not Found',
                    ])
                @endif    
               
                @if(count($properties_promoted) != 0 )
                    <div class="row mt-5 featured_properties">
                        @foreach($properties_promoted as $key => $property_pro)
                        <div class="col-4">
                            <div class="card custom-shadow position-relative" style="min-height: 370px;max-height: 300px;">
                                <a href="{{ route('frontend.for_sale_single',$property_pro->id) }}" class="text-decoration-none text-dark">
                                    <img src="{{ uploaded_asset($property_pro->feature_image_id) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    <div class="card-body mt-2">
                                        <div class="row mb-2">
                                            <div class="col-10">
                                                <h5 class="fw-bold">${{$property_pro->price}}</h5>
                                            </div>
                                            <div class="col-1">

                                                 @php
                                                    if(auth()->user())
                                                    {
                                                        $favourite = App\Models\Favorite::where('property_id',$property_pro->id)->where('user_id',auth()->user()->id)->first();
                                                    }else{
                                                        $favourite = null;
                                                    }
                                                @endphp

                                                @auth                                                  
                                                    @if($favourite == null)
                                                        <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                            <button type="submit" class="fas fa-heart border-0" style="background-color: white"></button>
                                                            <input type="hidden" name="prop_hidden_id" value="{{ $property_pro->id }}" />
                                                        </form>
                                                    @else
                                                        <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                            <button class="fas fa-heart border-0" style="color: #F60331; background-color: white;"></button>  
                                                            <input type="hidden" name="prop_hidden_id" value="{{ $favourite->id }}" />
                                                        </form>
                                                    @endif
                                                @else
                                                    <form action="{{route('frontend.auth.login')}}" method="get" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                        <button type="submit" class="fas fa-heart border-0" style="background-color: white"></button>
                                                    </form>                                                   
                                                @endauth
                                            </div>
                                        </div>
                                        
                                        <h6 class="fw-bold mb-2">{{$property_pro->name}}</h6>
                                        <p style="font-size: 11px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical;">{{$property_pro->description}}</p>
                                        <!-- <p>541, Rosewood place,</p> -->
                                        <p class="mb-1 mt-1">{{App\Models\Location::where('id',$property_pro->area)->first()->district }}, {{App\Models\Country::where('id',$property_pro->country)->first()->country_name }}</p>
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
                                                <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                            </div>
                                        </div>                                        
                                        <div class="col-6 text-end">
                                            @if(App\Models\AgentRequest::where('user_id',$property_pro->user_id)->first() != null)
                                                <img src="{{ uploaded_asset(App\Models\AgentRequest::where('user_id',$property_pro->user_id)->first()->logo) }}" width="50%" style="object-fit:cover">
                                            @endif
                                        </div>
                                    </div>
                                </a>
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
                            @if($normal->premium == 'Enabled')
                            <div class="row custom-shadow mb-4 mx-1">
                                <div class="col-6 p-3">
                                    <div class="swiper mySwiper2" id="swiper_2{{$normal->id}}">
                                            <div class="swiper-wrapper">
                                                @php
                                                    $str_arr2 = preg_split ("/\,/", $normal->image_ids);
                                                @endphp

                                                @foreach($str_arr2 as $key=> $pre)
                                                    <div class="swiper-slide">
                                                        <img src="{{ uploaded_asset($pre) }}"/>
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
                                    <div thumbsSlider="" class="swiper mySwiper mt-2" id="swiper_small_2{{$normal->id}}">
                                            <div class="swiper-wrapper">
                                                @foreach($str_arr2 as $key=> $pre)
                                                    <div class="swiper-slide">
                                                        <img src="{{ uploaded_asset($pre) }}"/>
                                                    </div>
                                                @endforeach
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
                                                @if(App\Models\AgentRequest::where('user_id',$normal->user_id)->first() != null)
                                                <img src="{{ uploaded_asset(App\Models\AgentRequest::where('user_id',$normal->user_id)->first()->logo) }}" width="50%">
                                                @endif
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mb-2">
                                                <div class="col-10">
                                                    @if($normal->price_options == 'Full')
                                                        <a href="{{ route('frontend.for_sale_single',$normal->id) }}" class="text-decoration-none text-dark">
                                                            <h3 class="fw-bold">${{$normal->price}}</h3>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('frontend.for_sale_single',$normal->id) }}" class="text-decoration-none text-dark">
                                                            <h3 class="fw-bold">${{$normal->price}} <span class="fw-normal" style="font-size: 1rem; color: rgb(0, 0, 0, 0.45)">Per Perch</span></h3>
                                                        </a>
                                                    @endif
                                                </div>                                                
                                            </div>

                                            <!-- <p class="mb-2 fw-bold" style="font-size: 1.1rem; color: black">Commercial Land for Sale</p> -->
                                            <a href="{{ route('frontend.for_sale_single',$normal->id) }}" class="text-decoration-none text-dark">
                                                <p class="mb-2" style="font-size: 1rem; color: black">{{$normal->name}}, {{App\Models\Location::where('id',$normal->area)->first()->district }}, {{App\Models\Country::where('id',$normal->country)->first()->country_name }}</p>
                                            </a>
                                            <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{$normal->description}}</p>

                                            <p class="mt-3" style="font-size: 1rem;">
                                                @if($normal->beds != null)
                                                    {{$normal->beds}}<i class="fas fa-bed ms-2 me-3"></i> 
                                                @endif
                                                @if($normal->beds != null)
                                                    {{$normal->baths}}<i class="fas fa-bath ms-2"></i>
                                                @endif
                                            </p>

                                            <div class="mt-3">
                                                @if(App\Models\AgentRequest::where('user_id',$normal->user_id)->first() != null)
                                                    <p class="mb-3 fw-bold"><i class="fas fa-phone-alt me-3"></i></i>{{App\Models\AgentRequest::where('user_id',$normal->user_id)->first()->telephone}}</p>
                                                    <p class="mb-3 fw-bold"><i class="fas fa-envelope me-3"></i>{{App\Models\AgentRequest::where('user_id',$normal->user_id)->first()->email}}</p>
                                                @endif

                                                <!-- <p class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</p> -->
                                                
                                                @auth
                                                    @php
                                                        if(auth()->user())
                                                        {
                                                            $favourite = App\Models\Favorite::where('property_id',$normal->id)->where('user_id',auth()->user()->id)->first();
                                                        }else{
                                                            $favourite = null;
                                                        }
                                                    @endphp

                                                    @if($favourite == null)
                                                        <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                            <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</button>
                                                            <input type="hidden" name="prop_hidden_id" value="{{ $normal->id }}" />
                                                        </form>
                                                    @else
                                                        <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                            <button type="submit" class="mb-3 fw-bold btn" style="margin-left:-13px; color: rgb(246, 3, 49); background-color: white;"><i class="fas fa-heart me-3"></i>Unsave Property</button>  
                                                            <input type="hidden" name="prop_hidden_id" value="{{ $favourite->id }}" />
                                                        </form>
                                                    @endif
                                                @else
                                                    <a href="{{route('frontend.auth.login')}}">
                                                        <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</button>
                                                    </a>
                                                @endauth                                             
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else

                            <div class="row custom-shadow mb-4 mx-1">
                                <div class="col-6 p-3">
                                    <div class="swiper mySwiper2" id="swiper_2{{$normal->id}}">
                                            <div class="swiper-wrapper">
                                                @php
                                                    $str_arr2 = preg_split ("/\,/", $normal->image_ids);
                                                @endphp

                                                @foreach($str_arr2 as $key=> $pre)
                                                    <div class="swiper-slide">
                                                        <img src="{{ uploaded_asset($pre) }}"/>
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
                                    <div thumbsSlider="" class="swiper mySwiper mt-2" id="swiper_small_2{{$normal->id}}">
                                            <div class="swiper-wrapper">
                                                @foreach($str_arr2 as $key=> $pre)
                                                    <div class="swiper-slide">
                                                        <img src="{{ uploaded_asset($pre) }}"/>
                                                    </div>
                                                @endforeach
                                            </div>
                                    </div>
                                </div>

                                <div class="col-6 p-3">
                                    <div class="row align-items-center mb-4 pt-4">
                                            <div class="col-6">
                                                <!-- <div class="py-1 w-75 text-center" style="background-color: #FF0000;">
                                                    <p class="text-white">Premium Listing</p>
                                                </div> -->
                                            </div>
                                            <div class="col-6 text-end">
                                                @if(App\Models\AgentRequest::where('user_id',$normal->user_id)->first() != null)
                                                <img src="{{ uploaded_asset(App\Models\AgentRequest::where('user_id',$normal->user_id)->first()->logo) }}" width="50%">
                                                @endif
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mb-2">
                                                <div class="col-10">
                                                    @if($normal->price_options == 'Full')
                                                        <a href="{{ route('frontend.for_sale_single',$normal->id) }}" class="text-decoration-none text-dark">
                                                            <h3 class="fw-bold">${{$normal->price}}</h3>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('frontend.for_sale_single',$normal->id) }}" class="text-decoration-none text-dark">
                                                            <h3 class="fw-bold">${{$normal->price}} <span class="fw-normal" style="font-size: 1rem; color: rgb(0, 0, 0, 0.45)">Per Perch</span></h3>
                                                        </a>
                                                    @endif
                                                </div>                                                
                                            </div>

                                            <!-- <p class="mb-2 fw-bold" style="font-size: 1.1rem; color: black">Commercial Land for Sale</p> -->
                                            <a href="{{ route('frontend.for_sale_single',$normal->id) }}" class="text-decoration-none text-dark">
                                                <p class="mb-2" style="font-size: 1rem; color: black">{{$normal->name}}, {{App\Models\Location::where('id',$normal->area)->first()->district }}, {{App\Models\Country::where('id',$normal->country)->first()->country_name }}</p>
                                            </a>
                                            <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{$normal->description}}</p>

                                            <p class="mt-3" style="font-size: 1rem;">
                                                @if($normal->beds != null)
                                                    {{$normal->beds}}<i class="fas fa-bed ms-2 me-3"></i> 
                                                @endif
                                                @if($normal->beds != null)
                                                    {{$normal->baths}}<i class="fas fa-bath ms-2"></i>
                                                @endif
                                            </p>

                                            <div class="mt-3">
                                                @if(App\Models\AgentRequest::where('user_id',$normal->user_id)->first() != null)
                                                    <p class="mb-3 fw-bold"><i class="fas fa-phone-alt me-3"></i></i>{{App\Models\AgentRequest::where('user_id',$normal->user_id)->first()->telephone}}</p>
                                                    <p class="mb-3 fw-bold"><i class="fas fa-envelope me-3"></i>{{App\Models\AgentRequest::where('user_id',$normal->user_id)->first()->email}}</p>
                                                @endif

                                                <!-- <p class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</p> -->
                                                
                                                @auth
                                                    @php
                                                        if(auth()->user())
                                                        {
                                                            $favourite = App\Models\Favorite::where('property_id',$normal->id)->where('user_id',auth()->user()->id)->first();
                                                        }else{
                                                            $favourite = null;
                                                        }
                                                    @endphp

                                                    @if($favourite == null)
                                                        <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                            <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</button>
                                                            <input type="hidden" name="prop_hidden_id" value="{{ $normal->id }}" />
                                                        </form>
                                                    @else
                                                        <form action="{{route('frontend.propertyFavouriteDelete',$favourite->id)}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                            <button type="submit" class="mb-3 fw-bold btn" style="margin-left:-13px; color: rgb(246, 3, 49); background-color: white;"><i class="fas fa-heart me-3"></i>Unsave Property</button>  
                                                            <input type="hidden" name="prop_hidden_id" value="{{ $favourite->id }}" />
                                                        </form>
                                                    @endif
                                                @else
                                                    <a href="{{route('frontend.auth.login')}}">
                                                        <button type="submit" style="margin-left:-13px;" class="mb-3 fw-bold btn"><i class="fas fa-heart me-3"></i>Save Property</button>
                                                    </a>
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

            <div class="col-3">
                <div class="row justify-content-center custom-shadow p-3 mb-4">
                    <div class="col-12 text-center">
                        <a href="#" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 0.5px solid rgb(112, 112, 112);background-color: rgb(53, 73, 94);font-size: 12px;width: 230px !important;">
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
                    <div class="col-12 text-center " style="margin-top: 10px;">
                        <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid rgb(112, 112, 112);font-size: 12px;width: 230px !important;">
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
                            <img src="{{ uploaded_asset(get_settings('property_page_advertiment_1')) }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="{{ get_settings('property_page_link_1') }}" target="_blank" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ uploaded_asset(get_settings('property_page_advertiment_2')) }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="{{ get_settings('property_page_link_2') }}" class="btn find-out" target="_blank">Find Out More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-0 custom-shadow">
                        <div class="card">
                            <img src="{{ uploaded_asset(get_settings('property_page_advertiment_3')) }}" class="img-fluid" alt="..." style="object-fit: cover; height: 25rem;">
                            <div class="card-body text-end">
                                <a href="{{ get_settings('property_page_link_3') }}" target="_blank" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.includes.search_filter_modal')
    
@endsection

@push('after-scripts')



@if(count($properties) != 0 )
@foreach($properties as $key => $normal)
    <script>        
      var swiper = new Swiper("#swiper_small_2{{$normal->id}}", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper("#swiper_2{{$normal->id}}", {
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