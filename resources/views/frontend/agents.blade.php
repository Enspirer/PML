@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/agents.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('frontend.includes.search')


    <div class="container index" style="margin-top: 2rem;">
        <div class="row">
            <div class="col-12">
                @if($selected_country == 'country')
                    <p><a class="text-decoration-none text-dark fw-bold">Property Market Live</a> > <a class="text-decoration-none text-dark fw-bold">All Agents</a></p>
                @else                   
                    <p><a class="text-decoration-none text-dark fw-bold">Property Market Live</a> > <a class="text-decoration-none text-dark fw-bold">Agents in {{App\Models\Country::where('id',$selected_country)->first()->country_name }}</a></p>
                @endif           
            </div>
        </div>
    </div>

    <div class="container mt-4" style="margin-bottom: 3rem;">
        <div class="row">
            <div class="col-9">

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="banner">
                            <div class="row" style="padding-top: 3rem; padding-left: 5rem;">
                                <div class="col-6 text-white">
                                <form action="{{route('frontend.find-agent.store')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <h4 class="fw-bold mb-3">Find Your Agent</h4>

                                        <div class="mb-4">
                                            <label for="country" class="form-label mb-0">Select Country</label>
                                            <select class="form-select" aria-label="country" id="country" name="country" required>
                                                <option value="" selected disabled>Select...</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country_name}}</option>  
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="area" class="form-label mb-0">Select Area/Location</label>
                                            <select class="form-select" aria-label="area" id="area" name="area" required>
                                            <option value="" selected disabled>Select...</option>
                                                
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="agent_type" class="form-label mb-0">Agent Type</label>
                                            <select class="form-select" aria-label="agent_type" id="agent_type" name="agent_type" required>
                                                <option value="" selected disabled>Select...</option>
                                                <option value="Company">Company</option>
                                                <option value="Individual">Individual</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="agent_name" class="form-label mb-0">Agent Name</label>
                                            <input type="text" class="form-control text-white" name="agent_name" id="agent_name" >
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit" class="btn text-light px-5 py-2 rounded-pill fw-bold" style="background-color: #35495E;">Find Agent</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @if($selected_country == 'country')
                    <h4 class="mt-4">All Agents</h4>
                @else
                    <h4 class="mt-4">Agents in <span class="fw-bold">{{App\Models\Country::where('id',$selected_country)->first()->country_name }}</span></h4>
                @endif
                    
                <div class="row align-items-center">
                    <div class="col-6">
                        <p>{{$count_for_sale}} agents available</p>
                    </div>

                    <div class="col-6">
                        <div class="row align-items-center justify-content-end">
                            <div class="col-6 text-end">
                                <p style="color: black;">
                                    <i class="fas fa-sort-amount-down"></i>
                                    Sort By:
                                    <select name="" class="border-0" style="color: #FF0000">
                                        <option value="most_recent">Most Recent</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row mt-5 agents">
                    
                    @if(count($agents) <= 0)
                        @include('frontend.includes.not_found',[
                            'not_found_title' => 'Agents not Found'
                        ])
                    @else

                        @foreach($agents as $agent)
                            <div class="col-4 text-center mb-4">
                                <div class="card custom-shadow position-relative" style="max-height:550px; min-height:550px;">
                                    <div class="card-body">
                                        <img src="{{ uploaded_asset($agent->logo) }}" width="40%" style="border-radius: 50%;" alt="" class="img-fluid logo mb-3">

                                        <h5 class="fw-bold">{{ $agent->name }}</h5>
                                        
                                        <h6 class="mb-2">{{ $agent->agent_type }} Agents</h6>
                                        <p class="fw-bold mb-2 text-dark">{{ $agent->address }}, {{App\Models\Country::where('id',$agent->country)->first()->country_name }}</p>
                                        <p class="mb-1" style="font-size: 0.8rem; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{$agent->description_message}}</p>

                                        <hr>

                                        <h6 class="fw-bold mb-3" style="font-size: 0.9rem">Homes on Property Market Live</h6>

                                        <div class="row">
                                            <div class="col-4">
                                                <h5 class="fw-bold">{{ App\Models\Properties::where('user_id',$agent->user_id)->where('transaction_type','sale')->get()->count() }}</h5>
                                                <p style="font-size: 0.8rem;">For Sale</p>
                                            </div>

                                            <div class="col-4">
                                                <h5 class="fw-bold">{{ App\Models\Properties::where('user_id',$agent->user_id)->where('transaction_type','rent')->get()->count() }}</h5>
                                                <p style="font-size: 0.8rem;">For Rent</p>
                                            </div>

                                            <div class="col-4">
                                                <h5 class="fw-bold">{{ App\Models\Properties::where('user_id',$agent->user_id)->where('price_options','!=','Full')->get()->count() }}</h5>
                                                <p style="font-size: 0.8rem;">Lands</p>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row justify-content-center">
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
                                                <a href="mailto:{{ $agent->email }}" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
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

                                            <div class="col-12">
                                                <a href="#" class="fw-bold text-decoration-underline" style="color: #35495E; font-size: 0.8rem">Show More</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="row align-items-center prom-logo position-absolute">
                                        <div class="col-12">
                                            <div class="py-1 px-2" style="background-color: #FF0000;">
                                                <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
                
            </div>
            

            <div class="col-3">
                <div class="row">
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ uploaded_asset(get_settings('agents_page_advertiment_1')) }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="{{ get_settings('agents_page_link_1') }}" target="_blank" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ uploaded_asset(get_settings('agents_page_advertiment_2')) }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="{{ get_settings('agents_page_link_2') }}" target="_blank" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-0 custom-shadow">
                        <div class="card">
                            <img src="{{ uploaded_asset(get_settings('agents_page_advertiment_3')) }}" class="img-fluid" alt="..." style="object-fit: cover; height: 20rem;">
                            <div class="card-body text-end">
                                <a href="{{ get_settings('agents_page_link_3') }}" target="_blank" class="btn find-out">Find Out More</a>
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
    </script>

@endpush