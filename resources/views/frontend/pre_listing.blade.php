@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/individual-agent.css') }}" rel="stylesheet">
<link href="{{ url('css/pre_listing.css') }}" rel="stylesheet">
@endpush

@section('content')


<style>
    
    .ui-w-80 {
        width: 80px !important;
        height: auto;
    }
    .btn-default {
        border-color: rgba(24,28,33,0.1);
        background: rgba(0,0,0,0);
        color: #4E5155;
    }
    label.btn {
        margin-bottom: 0;
    }
    .btn-outline-primary {
        border-color: #26B4FF;
        background: transparent;
        color: #26B4FF;
    }
    .btn {
        cursor: pointer;
    }
    .text-light {
        color: #babbbc !important;
    }
    .btn-facebook {
        border-color: rgba(0,0,0,0);
        background: #3B5998;
        color: #fff;
    }
    .btn-instagram {
        border-color: rgba(0,0,0,0);
        background: #000;
        color: #fff;
    }
    .card {
        background-clip: padding-box;
        box-shadow: 0 1px 4px rgba(24,28,33,0.012);
    }
    .row-bordered {
        overflow: hidden;
    }
    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }
    .account-settings-links .list-group-item.active {
        font-weight: bold !important;
    }
    html:not(.dark-style) .account-settings-links .list-group-item.active {
        background: transparent !important;
    }
    .account-settings-multiselect ~ .select2-container {
        width: 100% !important;
    }
    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .light-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }
    .material-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
    .material-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }
    .dark-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }
    .dark-style .account-settings-links .list-group-item.active {
        color: #fff !important;
    }
    .light-style .account-settings-links .list-group-item.active {
        color: #4E5155 !important;
    }
    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24,28,33,0.03) !important;
    }
</style>    

@if ( session()->has('message') )

    <div style="background: #e8eeef;">
        <div class="container user-settings" style="margin-top:6rem;">
            <div class="row justify-content-between">
                
                <div class="col-12 ps-4 pb-5" style="padding-top: 3rem; background-color: #F5F9FA">
                    <div class="row justify-content-between mt-4">

                        <div class="container-fluid jumbotron text-center" style="background-color: #c6e4ee; border-radius: 15px 50px;">
                        <h1 style="margin-top:60px;" class="display-5">Successfully Created!</h1><br>
                            <!-- <p class="lead"><h3>Your request is sent. One of our member will get back in touch with you soon!<br><br> Have a great day!</h3></p> -->
                            <hr><br>    
                            <p class="lead">
                                <a class="btn btn-success btn-md" href="{{url('/')}}" role="button">Go Back to Home Page</a>
                            </p>
                            <br>
                        </div>

                    </div>                
                </div>                
            </div>
        </div>
    </div>


@else

                                        
                                    

<div class="light-style flex-grow-1 container-p-y" style="margin:150px 50px 0pc 50px">
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif  
    <div class="card overflow-hidden" style="min-height:440px;">   
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 mt-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <!-- <a class="list-group-item list-group-item-action active" data-toggle="list" href="#user_details">User Details</a> -->
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#property_details">Property Details</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#panaromal_details">Panaromal Details</a>
        </div>
        </div>
        <div class="col-md-9">
            <form action="{{route('frontend.pre_listing.store')}}" method="post" enctype="multipart/form-data">                    
            {{csrf_field()}}
                <div class="tab-content">
                    <!-- <div class="tab-pane fade active show" id="user_details">
                        <div class="card-body">
                        
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>First Name <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" required/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Last Name <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email Address <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" name="email" id="email" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Password <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="password" name="password" required/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Confirm Password <span style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" required/>
                                    </div>
                                </div>
                            </div>                         
                              
                        </div>
                    </div> -->
                    <div class="tab-pane fade active show" id="property_details">
                        <div class="card-body">
                    
                                    
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <label for="name" class="form-label mb-0 required">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" aria-describedby="name" required>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div>
                                        <label for="propertyType" class="form-label mb-0 required">Property Type</label>
                                        <select class="form-select" aria-label="propertyType" name="propertyType" id="propertyType" onChange="renderFields()"  required>
                                            <option selected disabled value="">Choose...</option>
                                        @foreach($property_type as $type)
                                            <option value="{{$type->id}}"> {{$type->property_type_name}} </option>
                                        @endforeach

                                        </select>
                                    </div>  
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label mb-0 mt-4 required">Description</label>
                                    <textarea class="form-control" rows="4" name="description" required></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label for="map" class="form-label mb-2 mt-4 required">Map Location</label>
                                    <div id="map" style="width: 100%; height: 400px;"></div>
                                    <input type="hidden" name="lat" id="lat" class="mt-3" required>
                                    <input type="hidden" name="lng" id="lng" class="mt-3" required>
                                    <input type="hidden" name="map_country" id="map_country" class="mt-3" required>

                                    @error('lat')
                                        <div class="alert alert-danger">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                                        
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <input id="search" class="form-control" type="text" placeholder="Search" />
                                        </div>
                                    </div>
                                                        
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label mb-2 mt-3">Country <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="country" name="country" required>
                                            <option value="" selected disabled>Select...</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>  
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-2 mt-3">
                                        <label>Area/location</label>
                                        <select name="area" class="form-control custom-select" id="area" required>

                                        </select>
                                    </div> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <label for="price" class="form-label mb-0 mt-4">Price</label>
                                        <input type="number" class="form-control" name="price" id="price" aria-describedby="price" required placeholder="$">
                                        <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                             Please enter property price in US currency
                                         </div>
                                     </div>  
                                </div>
                            </div>

                            <div class="row">                                    
                                <div class="col-6">
                                    <div>
                                        <label for="city" class="form-label mb-2 mt-3">City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" id="city" aria-describedby="city" required>
                                    </div>
                                </div>
                            </div>
                                    

                            <h4 class="mt-4">More About Property</h4>
                            <h6 class="mb-3" style="color: #5e6871">Tell us more about the agent</h6>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-2 mt-4">Feature Image
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="feature_image" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-2 mt-2">Multiple Images (Maximum 3 Images)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="multiple_images" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> 
                                </div>
                            </div>                       
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <label for="meta-description" class="form-label mb-2 mt-3">Meta Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="1" name="meta_description" id="meta-description" aria-describedby="meta-description" required></textarea>
                                     </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <label for="slug" class="form-label mb-2 mt-3">Slug <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slug" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                         <label for="transaction-type" class="form-label mb-2 mt-3">Transaction Type <span class="text-danger">*</span></label>
                                         <select class="form-select" aria-label="transaction_type" name="transaction_type" id="transaction_type" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option value="sale">For sale</option>
                                            <option value="rent">For rent</option>
                                        </select>
                                    </div>
                                 </div>

                                <div class="col-6 first-incoming-field">                                        
                                </div>
                             </div>
                            <div class="row" id="incoming_fields">
                            </div>

                                    
                        </div>
                    </div>
                    <div class="tab-pane fade" id="panaromal_details">
                        <div class="card-body">         
                            
                            <div style="border:1px solid red; text-align:center" class="mb-4 p-1">
                                <h6 style="color:red" class="mb-2 mt-1">Alert!</h6><h6 class="mb-1" style="font-size:15px;"> If You Want To Enable Panaroma Call This Number +94 778669990.</h6>
                            </div>
                                    
                            <!-- <div class="row">
                                <div class="col-12">
                                    <div>
                                        <label for="google_panaroma" class="form-label mb-2">Google Panaroma</label>
                                        <textarea class="form-control" rows="4" name="google_panaroma"></textarea>                                    
                                    </div>  
                                </div>                            
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="mb-2 mt-2">Panaromal Images</label>
                                        <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                            </div>
                                            <div class="form-control file-amount">Choose File</div>
                                            <input type="hidden" name="panaromal_images" class="selected-files" >
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                    </div> 
                                </div>
                            </div>  -->
                                                            
                        </div>
                        
                    </div>
                    
                </div>
                <div class="mt-4" align="right" style="margin:0px 25px 25px 0px">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>
        </div>
      </div>
    </div>

 
  </div>





@endif

@endsection


@push('after-scripts')


<script>

// dropdown box changing field
const renderFields = async () => {
    let value = $('#propertyType').val();


    let url = '{{url('/')}}/api/get_property_type_details/' + value;
    const res = await fetch(url);
    const data = await res.json();
    const fields = (data[0]['activated_fields']);
    let template = '';
    let first = '';

    for(let i = 0; i < fields.length; i++) {
        if(i == 0) {
            let name = fields[i].split(' ').join('_').toLowerCase();
            if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                if(name == 'beds' || name == 'baths') {
                    first = `<div>
                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                        <input type="number" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" min="1" max="100" required>
                    </div>`
                }
                else if (name == 'building_type') {
                                first = `<div>
                                            <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                <option value="">Select</option>
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
                                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                            <option value="">Select</option>
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
                                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                            <option value="">Select</option>
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
                                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                            <option value="">Select</option>
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
                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                        <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" required>
                    </div>`
                }
        }
        else {
            let name = fields[i].split(' ').join('_').toLowerCase();
            if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                if(name == 'beds' || name == 'baths') {
                    template += `<div class="col-6">
                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                        <input type="number" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" min="1" max="100" required>
                    </div>`
                }
                else if (name == 'building_type') {
                            template += `<div class="col-6">
                                            <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                                <option value="">Select</option>
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
                            template += `<div class="col-6">
                                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                            <option value="">Select</option>
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
                            template += `<div class="col-6">
                                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                            <option value="">Select</option>
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
                            template += `<div class="col-6">
                                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                                        <select class="form-select" aria-label="${name}" id="${name}" name="${name}" required>
                                            <option value="">Select</option>
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
                template += `<div class="col-6">
                    <div>
                        <label for="${name}" class="form-label mb-2 mt-4">${fields[i]}</label>
                        <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" required>
                    </div>
                </div>`
            }
        }
    }
    $('.first-incoming-field').html(first);
    $('#incoming_fields').html(template);
}



// window.addEventListener('DOMContentLoaded', () => renderFields());

$('#propertyType').change(function() {
    renderFields();
});


$( "#name" ).change(function() {
    let name = $(this).val().split(' ').join('-').toLowerCase();
    

    $('#slug').val(name);
});

</script>

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
                $('#area').append('<option value="" selected disabled>-- Select Here --</option>'); 
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

    var marker = false;
            
    function initMap() {

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5,
            center: { lat: -28.024, lng: 140.887 },
        });

        const geocoder = new google.maps.Geocoder();
        const infowindow = new google.maps.InfoWindow();

        google.maps.event.addListener(map, 'click', function(event) {                
            
            var clickedLocation = event.latLng;
            

            

            if(marker === false){
                //Create the marker.
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true 
                });

                google.maps.event.addListener(marker, 'dragend', function(event){
                
                    geocodeLatLng(geocoder, map, infowindow);
                });
            } else{

                marker.setPosition(clickedLocation);
            }

            geocodeLatLng(geocoder, map, infowindow);
        });


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



function markerLocation(){

    var currentLocation = marker.getPosition();

    document.getElementById('lat').value = currentLocation.lat(); //latitude
    document.getElementById('lng').value = currentLocation.lng(); //longitude 
}


function geocodeLatLng(geocoder, map, infowindow) {
    var clickedLocation = event.latLng;

    var currentLocation = marker.getPosition();

    geocoder
        .geocode({ location: currentLocation })
        .then((response) => {
        if (response.results[0]) {
            // map.setZoom(5);
            let marker = new google.maps.Marker({
            position: clickedLocation,
            map: map,
            draggable: true,
            add : response.results[0].formatted_address
            });
            infowindow.setContent(response.results[0].formatted_address);
            infowindow.open(map, marker);

            var output = marker.add.split(/[,]+/).pop();
            $('#map_country').val(output);

            markerLocation();

        } else {
            window.alert("No results found");
        }
        })
        .catch((e) => window.alert("Geocoder failed due to: " + e));
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap&libraries=places&v=weekly&channel=2"
type="text/javascript"></script>



@endpush