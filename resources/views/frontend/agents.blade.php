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

    <div class="container mt-4 find-agent-full-color" style="margin-bottom: 3rem;">
        <div class="row">
            <div class="col-9 col-xs-12 col-tab-12">

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="banner">
                            <div class="row mobile-find-agent-area" style="padding-top: 3rem; padding-left: 5rem;">
                                <div class="col-6 text-white col-xs-12">
                                <form class="find-agent-form" action="{{route('frontend.find-agent.store')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                        <h4 class="fw-bold mb-3">Find Your Agent</h4>

                                        <div class="form-mb">
                                            <label for="country" class="form-label mb-0">Select Country</label>
                                            <select class="form-select" aria-label="country" id="country" name="country" required>
                                                <option value="" selected disabled>Select...</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->country_name}}</option>  
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-mb">
                                            <label for="area" class="form-label mb-0">Select Area/Location</label>
                                            <select class="form-select" aria-label="area" id="area" name="area" required>
                                            <option value="" selected disabled>Select...</option>
                                                
                                            </select>
                                        </div>

                                        <div class="form-mb">
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
                    <div class="col-6 col-xs-12">
                        <p>{{$count_for_sale}} agents available</p>
                    </div>

                    <div class="col-6 col-xs-12">
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
                            <div class="col-4 text-center mb-4 col-xs-12 col-tab-50">
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
                                                <a href="{{route('frontend.individual_agent',$agent->id)}}" class="fw-bold agent-show-more-btn rounded-pill"><i style="padding-right:5px;" class="fas fa-chevron-circle-right"></i>Show More</a>
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
            

            <div class="col-3 col-xs-12 col-tab-12">
                <div class="row sidebar-card-area">
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

    @include('frontend.includes.search_filter_modal')


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
<script>
    // dropdown box changing field
        const renderFields = async () => {
            let value = $('#propertyType').val();

            if(value == '') {
                

            } 
            else {
                let url = '{{url('/')}}/api/get_property_type_details/' + value;

                const res = await fetch(url);
                const data = await res.json();
                const fields = (data[0]['activated_fields']);
                let template = '';
                let first = '';
                let second = '';

                for(let i = 0; i < fields.length; i++) {
                    if(i == 0) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
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
                            }
                            else if (name == 'building_type') {
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
                            }
                            else if (name == 'parking_type') {
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
                            }
                            else if (name == 'zoning_type') {
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
                            }
                            else if (name == 'farm_type') {
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
                        }
                            else {
                                first = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    } 

                    else if(i == 1) {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
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
                            }
                            else if (name == 'building_type') {
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
                            }
                            else if (name == 'parking_type') {
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
                            }
                            else if (name == 'zoning_type') {
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
                            }
                            else if (name == 'farm_type') {
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
                        }
                            else {
                                second = `<div>
                                    <label for="${name}" class="form-label mb-0">${fields[i]}</label>
                                    <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}">
                                </div>`
                            }
                    }
                    else {
                        let name = fields[i].split(' ').join('_').toLowerCase();
                        if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                            if(name == 'beds' || name == 'baths') {
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
                            }
                            else if (name == 'building_type') {
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
                            }
                            else if (name == 'parking_type') {
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
                            }
                            else if (name == 'zoning_type') {
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
                            }
                            else if (name == 'farm_type') {
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
                        }
                        else {
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

    $('.filter-button').on('click', function(){
            renderFields();
    })

    $('.filter-reset').click(function(){
        $('#filter-form')[0].reset();
    });
</script>

@endpush