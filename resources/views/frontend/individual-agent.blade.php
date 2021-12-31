@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/individual-agent.css') }}" rel="stylesheet">
<style>
.free_listning {
    top: 0;
    left: 0;
}
</style>
@endpush

@section('content')

<div class="individual-agent-banner">
    <img src="{{ uploaded_asset($agent_details->cover_photo) }}" alt="agent-banner" style="height:550px; object-fit:cover">
</div>
<div class="container agent-container">
    <!-- agent main area -->
    <div class="agent-main-area">
        <!-- Profile area -->
        <div class="agent-profile-area">
            <div class="row agent-flex-row">
                <div class="profile-pic">
                    <img id="agent-prof" src="{{ uploaded_asset($agent_details->photo) }}"
                        alt="profile pic">
                </div>
                <div class="agent-txt-main">
                    <h1>@if($agent_details->company_name == null)
                            {{ $agent_details->name }}
                        @else
                            {{ $agent_details->company_name }}
                        @endif
                    </h1>
                    <p>{{ $agent_details->address }}, {{ App\Models\Country::where('id',$agent_details->country)->first()->country_name }}</p>
                </div>
            </div>
            <div class="row">
                <h5 style="margin-bottom:10px !important;" class="fw-bold title">Homes on Property Market Live</h5>
                <div class="inner-row-wrapper">
                    <div class="property-count-wrapper">
                        <div class="count-box-wrapper">
                            <div class="count-box">
                                <span class="number">{{ App\Models\Properties::where('user_id',$agent_details->user_id)->where('transaction_type','sale')->get()->count() }}</span>
                                <span class="count-txt">For Sale</span>
                            </div>
                            <div class="count-box">
                                <span class="number">{{ App\Models\Properties::where('user_id',$agent_details->user_id)->where('transaction_type','rent')->get()->count() }}</span>
                                <span class="count-txt">For Rent</span>
                            </div>
                            <div class="count-box">
                                <span class="number">{{ App\Models\Properties::where('user_id',$agent_details->user_id)->where('price_options','!=','Full')->get()->count() }}</span>
                                <span class="count-txt">Lands</span>
                            </div>
                        </div>
                    </div>
                    <div class="agent-contact-wrapper">
                        <a href="tel:{{ $agent_details->telephone }}" class="agent-contact-btn" >
                            <span class="icon"><i class="fas fa-phone-alt"></i></span>
                            {{ $agent_details->telephone }}
                        </a>


                        <a href="tel:0767113935" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid rgb(112, 112, 112); background-color: rgb(53, 73, 94); font-size: 14px;"><div class="row justify-content-center"><div class="btn-wrapper"><i aria-hidden="true" class="fas fa-phone-alt"></i> <span style="font-size: 0.9rem;">0767113935</span></div></div></a>


                        <a href="mailto:{{ $agent_details->email }}" class="agent-contact-btn">
                            <span class="icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                            Send email to agent</a>
                    </div>
                </div>

            </div>
            <div class="row">
                <p>{{$agent_details->description_message}}</p>
            </div>
        </div>

        @if(count($all_properties) == 0)
            @include('frontend.includes.not_found',[
                'not_found_title' => 'Properties not found',
                'not_found_description' => 'Please add properties',
                'not_found_button_caption' => null
            ])
        @else

            <!-- Agent Selling list area -->
            <ul class="nav nav-tabs agent-selling-list-area" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                        role="tab" aria-controls="all" aria-selected="true">All</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sale-tab" data-bs-toggle="tab" data-bs-target="#sale"
                        type="button" role="tab" aria-controls="sale" aria-selected="false">Sale</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rent-tab" data-bs-toggle="tab" data-bs-target="#rent"
                        type="button" role="tab" aria-controls="rent" aria-selected="false">Rent</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="agent-list-wrapper">

                        @foreach($all_properties as $key=> $prop)

                            <a href="{{ route('frontend.for_sale_single',$prop->id) }}" class="text-decoration-none text-dark">
                                <div class="agent-card position-relative">
                                    <div class="heart-icon-wrapper">

                                        @php
                                            if(auth()->user())
                                            {
                                                $favourite = App\Models\Favorite::where('property_id',$prop->id)->where('user_id',auth()->user()->id)->first();
                                            }else{
                                                $favourite = null;
                                            }
                                        @endphp

                                        @auth                                                  
                                            @if($favourite == null)
                                                <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                    <button type="submit" class="far fa-heart border-0" style="background-color: white"></button>
                                                    <input type="hidden" name="prop_hidden_id" value="{{ $prop->id }}" />
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
                                                <button type="submit" class="far fa-heart border-0" style="background-color: white"></button>
                                            </form>                                                   
                                        @endauth

                                    </div>
                                    <img class="property-img" src="{{ uploaded_asset($prop->feature_image_id) }}" alt="property" style="object-fit:cover">
                                    @if($prop->listning_type == 'free_listning')
                                        <div class="free_listning position-absolute badge badge-warning p-2 m-2">Free Listning</div>
                                    @endif
                                    <div class="agent-card-txt-wrapper">
                                            <h3>{{$prop->name}}</h3>

                                        @if($prop->price_options == 'Full')
                                            <h4>{{ get_currency(request() ,$prop->price)}}</h4>
                                        @else
                                            <h4>{{ get_currency(request() ,$prop->price)}} <span class="fw-normal" style="font-size: 0.9rem; color: rgb(0, 0, 0, 0.45)">Per Perch</span></h4>
                                        @endif

                                        <h5>{{App\Models\Location::where('id',$prop->area)->first()->district }}, {{App\Models\Country::where('id',$prop->country)->first()->country_name }}</h5>
                                        
                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;">{{$prop->description}} 
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach 
                        
                    </div>
                </div>


                <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                    
                    <div class="agent-list-wrapper">

                        @foreach($sale_properties as $key=> $prop)

                            <a href="{{ route('frontend.for_sale_single',$prop->id) }}" class="text-decoration-none text-dark">
                                <div class="agent-card position-relative">
                                    <div class="heart-icon-wrapper">

                                        @php
                                            if(auth()->user())
                                            {
                                                $favourite = App\Models\Favorite::where('property_id',$prop->id)->where('user_id',auth()->user()->id)->first();
                                            }else{
                                                $favourite = null;
                                            }
                                        @endphp

                                        @auth                                                  
                                            @if($favourite == null)
                                                <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                    <button type="submit" class="far fa-heart border-0" style="background-color: white"></button>
                                                    <input type="hidden" name="prop_hidden_id" value="{{ $prop->id }}" />
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
                                                <button type="submit" class="far fa-heart border-0" style="background-color: white"></button>
                                            </form>                                                   
                                        @endauth

                                    </div>
                                    <img class="property-img" src="{{ uploaded_asset($prop->feature_image_id) }}" alt="property" style="object-fit:cover">
                                    @if($prop->listning_type == 'free_listning')
                                        <div class="free_listning position-absolute badge badge-warning p-2 m-2">Free Listning</div>
                                    @endif
                                    <div class="agent-card-txt-wrapper">
                                            <h3>{{$prop->name}}</h3>

                                        @if($prop->price_options == 'Full')
                                            <h4>{{ get_currency(request() ,$prop->price)}}</h4>
                                        @else
                                            <h4>{{ get_currency(request() ,$prop->price)}} <span class="fw-normal" style="font-size: 0.9rem; color: rgb(0, 0, 0, 0.45)">Per Perch</span></h4>
                                        @endif

                                        <h5>{{App\Models\Location::where('id',$prop->area)->first()->district }}, {{App\Models\Country::where('id',$prop->country)->first()->country_name }}</h5>
                                        
                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;">{{$prop->description}} 
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach 

                    </div>


                </div>




                <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                    
                    <div class="agent-list-wrapper">
                        @foreach($rent_properties as $key=> $prop)

                            <a href="{{ route('frontend.for_sale_single',$prop->id) }}" class="text-decoration-none text-dark">
                                <div class="agent-card position-relative">
                                    <div class="heart-icon-wrapper">

                                        @php
                                            if(auth()->user())
                                            {
                                                $favourite = App\Models\Favorite::where('property_id',$prop->id)->where('user_id',auth()->user()->id)->first();
                                            }else{
                                                $favourite = null;
                                            }
                                        @endphp

                                        @auth                                                  
                                            @if($favourite == null)
                                                <form action="{{route('frontend.propertyFavourite')}}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                    <button type="submit" class="far fa-heart border-0" style="background-color: white"></button>
                                                    <input type="hidden" name="prop_hidden_id" value="{{ $prop->id }}" />
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
                                                <button type="submit" class="far fa-heart border-0" style="background-color: white"></button>
                                            </form>                                                   
                                        @endauth

                                    </div>
                                    <img class="property-img" src="{{ uploaded_asset($prop->feature_image_id) }}" alt="property" style="object-fit:cover">
                                    @if($prop->listning_type == 'free_listning')
                                        <div class="free_listning position-absolute badge badge-warning p-2 m-2">Free Listning</div>
                                    @endif
                                    <div class="agent-card-txt-wrapper">
                                            <h3>{{$prop->name}}</h3>

                                        @if($prop->price_options == 'Full')
                                            <h4>{{ get_currency(request() ,$prop->price)}}</h4>
                                        @else
                                            <h4>{{ get_currency(request() ,$prop->price)}} <span class="fw-normal" style="font-size: 0.9rem; color: rgb(0, 0, 0, 0.45)">Per Perch</span></h4>
                                        @endif

                                        <h5>{{App\Models\Location::where('id',$prop->area)->first()->district }}, {{App\Models\Country::where('id',$prop->country)->first()->country_name }}</h5>
                                        
                                        <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical;">{{$prop->description}} 
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach 
                    </div>

                </div>
            </div>

            @endif


        
    </div>
    <!-- agent sidebar -->
    <div class="agent-side-area">
        <div class="ad-card">
            <img width="100%" src="{{ uploaded_asset(get_settings('solo_agent_advertiment_1')) }}" >
            <div class="ad-btn-wrapper">
                <a href="{{ get_settings('solo_agent_advertiment_link_1') }}" target="_blank" class="ad-btn">Find Out More</a>
            </div>
        </div>

        <div class="ad-card">
            <img width="100%" src="{{ uploaded_asset(get_settings('solo_agent_advertiment_2')) }}" >
            <div class="ad-btn-wrapper">
                <a href="{{ get_settings('solo_agent_advertiment_link_2') }}" target="_blank" class="ad-btn">Find Out More</a>
            </div>
        </div>
    </div>
</div>



@endsection

@push('after-scripts')

<!-- <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var CountryID = $(this).val();
                // console.log(CountryID);

                    $.ajax({
                        
                        url: "{{url('/')}}/api/findLocationWithCountryID/" + CountryID,

                        method: "GET",
                        dataType: "json",
                        success:function(data) {
                            console.log(data);
                        if(data){
                            $('#area').empty();
                            $('#area').focus;
                            $('#area').append('<option value="" selected disabled>Select...</option>'); 
                            $.each(data, function(key, value){
                                // console.log(value);
                            $('select[name="area"]').append('<option value="'+ value.location_id +'">' + value.location_district+ '</option>');
                            
                        });

                        }else{
                            $('#area').empty();
                        }
                    }
                    });
                
            });
        });
    </script> -->

@endpush