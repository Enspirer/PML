@extends('backend.layouts.app')

@section('title', __('Edit'))

@section('content')

<form action="{{route('admin.property.update')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="row">
        <div class="col-7">  
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="name" class="form-label mb-2 required">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $property->name }}" aria-describedby="name" required>
                                </div> 
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="agent_user_id" class="form-label mb-2 required">Agent User <span class="text-danger">*</span></label>
                                    
                                    <datalist class="form-group w-100" name="agent_user_id" id="agent_user_id" >
                                    @foreach($agents as $agent)
                                        <option value="{{ $agent->user_id }}">{{ $agent->name }} - {{ $agent->email }}</option>
                                    @endforeach
                                    </datalist>   
                            
                                    <input class="form-control w-100" autoComplete="on" value="{{ $property->user_id }}" name="agent_user_id" list="agent_user_id" required/> 

                                </div>  
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div>
                                    <label for="propertyType" class="form-label mb-2 required">Property Type <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" aria-label="propertyType" name="propertyType" id="propertyType" onChange="renderFields()" required>
                                        <option selected disabled value="">Select...</option>                                        
                                        @foreach($property_type as $type)
                                                <option value="{{$type->id}}" {{ $property->property_type == $type->id ? "selected" : "" }}> {{$type->property_type_name}} </option>
                                        @endforeach
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label mb-2 mt-3 required">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="4" name="description" required>{{ $property->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="map" class="form-label mb-2 mt-4 required">Location</label>
                                <div id="map" style="width: 100%; height: 400px;"></div>
                                <input type="hidden" name="lat" id="lat" class="mt-3" value="{{ $property->lat }}">
                                <input type="hidden" name="lng" id="lng" class="mt-3" value="{{ $property->long }}">
                                <input type="hidden" name="map_country" id="map_country" class="mt-3" value="Indonesia">

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
                                            <option value="{{$country->id}}" {{ $country->id == $property->country ? "selected" : "" }}>{{$country->country_name}}</option>  
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="hidden" class="form-control" value="{{ $property->area }}" id="location_received" >
                                
                                <div class="form-group mb-2 mt-3">
                                    <label>Area/location <span class="text-danger">*</span></label>
                                    <select name="area" class="form-control custom-select" id="area" required>
        
                                    </select>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label mb-2 mt-4 required">Price Options <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="validate" id="validate" required>
                                        <option value="Full" {{$property->price_options == 'Full' ? "selected" : ""}}>Full Property</option>
                                        <option value="Perches" {{$property->price_options == 'Perches' ? "selected" : ""}}>Per Perches</option>
                                        <option value="Acres" {{$property->price_options == 'Acres' ? "selected" : ""}}>Per Acres</option>
                                        <option value="Hectares" {{$property->price_options == 'Hectares' ? "selected" : ""}}>Per Hectares</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2 mt-3">
                                    <div class="form-group form-validate-div divFrmFull" style="display:none">
                                        <label class="form-label mb-2 mt-2 required">Full Property Count <span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" value="{{$property->capacity}}" id="full_property" name="full_property" placeholder="Full Property Count" > 
                                    </div>
                                    <div class="form-group form-validate-div divFrmPerches" style="display:none">
                                        <label class="form-label mb-2 mt-2 required">Perches Count <span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" value="{{$property->capacity}}" id="perches" name="perches" placeholder="Perches Count" > 
                                    </div>
                                    <div class="form-group form-validate-div divFrmAcres" style="display:none">
                                        <label class="form-label mb-2 mt-2 required">Acres Count <span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" value="{{$property->capacity}}" id="acres" name="acres" placeholder="Acres Count" > 
                                    </div>
                                    <div class="form-group form-validate-div divFrmHectares" style="display:none">
                                        <label class="form-label mb-2 mt-2 required">Hectares Count <span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" value="{{$property->capacity}}" id="hectares" name="hectares" placeholder="Hectares Count" > 
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group form-validate-div divFrmFull" style="display:none">
                                    <label for="price" class="form-label mb-2 mt-3 required">Price of Full Property<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_full_property" value="{{$property->price}}" id="price_full_property" aria-describedby="price_full_property" placeholder="$">
                                    <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                        Please enter property price in US currency
                                    </div>
                                </div> 
                                <div class="form-group form-validate-div divFrmPerches" style="display:none">
                                    <label for="price" class="form-label mb-2 mt-3 required">Price Per Perches<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_perches" value="{{$property->price}}" id="price_perches" aria-describedby="price_perches" placeholder="$">
                                    <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                        Please enter property price in US currency
                                    </div>
                                </div> 
                                <div class="form-group form-validate-div divFrmAcres" style="display:none">
                                    <label for="price" class="form-label mb-2 mt-3 required">Price Per Acres<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_acres" value="{{$property->price}}" id="price_acres" aria-describedby="price_acres" placeholder="$">
                                    <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                        Please enter property price in US currency
                                    </div>
                                </div> 
                                <div class="form-group form-validate-div divFrmHectares" style="display:none">
                                    <label for="price" class="form-label mb-2 mt-3 required">Price Per Hectares<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_hectares" value="{{$property->price}}" id="price_hectares" aria-describedby="price_hectares" placeholder="$">
                                    <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                        Please enter property price in US currency
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="col-6">
                                <div>
                                    <label for="category" class="form-label mb-2 mt-3">Category <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" aria-label="category" id="category" name="category" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option value="For Sale" {{ $property->main_category == 'For Sale' ? "selected" : "" }}>For Sale</option>
                                        <option value="For Rent" {{ $property->main_category == 'For Rent' ? "selected" : "" }}>For Rent</option>
                                    </select>
                                </div>  
                            </div> -->
                            <div class="col-6">
                                <div>
                                    <label for="city" class="form-label mb-2 mt-3">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" id="city" aria-describedby="city" value="{{ $property->city }}" required>
                                </div>
                            </div>
                        </div>
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
                                        <input type="hidden" name="feature_image" class="selected-files" value="{{ $property->feature_image_id }}">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2 mt-2">Multiple Images
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">Choose File</div>
                                        <input type="hidden" name="multiple_images" class="selected-files" value="{{ $property->image_ids }}">
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
                                    <input type="text" class="form-control" name="meta_description" id="meta-description" value="{{ $property->meta_description }}" aria-describedby="meta-description" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="slug" class="form-label mb-2 mt-3">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug" aria-describedby="slug" value="{{ $property->slug }}" required>
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
                <br>
            
        </div>
        <div class="col-md-5 p-1">                
            <div class="card">
                <div class="card-body">
                    <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="promoted" class="form-label mb-2">Promoted <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" aria-label="promoted" id="promoted" name="promoted" required>
                                        <option value="Enabled" {{ $property->promoted == 'Enabled' ? "selected" : "" }}>Enabled</option>
                                        <option value="Disabled" {{ $property->promoted == 'Disabled' ? "selected" : "" }}>Disabled</option>
                                    </select>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="premium" class="form-label mb-2">Premium Listing <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" aria-label="premium" id="premium" name="premium" required>
                                        <option value="Enabled" {{ $property->premium == 'Enabled' ? "selected" : "" }}>Enabled</option>
                                        <option value="Disabled" {{ $property->premium == 'Disabled' ? "selected" : "" }}>Disabled</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div>
                                    <label for="featured" class="form-label mb-2">Featured <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" aria-label="featured" id="featured" name="featured" required>
                                        <option value="Enabled" {{ $property->featured == 'Enabled' ? "selected" : "" }}>Enabled</option>
                                        <option value="Disabled" {{ $property->featured == 'Disabled' ? "selected" : "" }}>Disabled</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label>Admin Approval <span class="text-danger">*</span></label>
                            <select class="form-control" name="admin_approval" required>
                                <option value="Approved" {{ $property->admin_approval == 'Approved' ? "selected" : "" }}>Approve</option>   
                                <option value="Disapproved" {{ $property->admin_approval == 'Disapproved' ? "selected" : "" }}>Disapprove</option> 
                                <option value="Pending" {{ $property->admin_approval == 'Pending' ? "selected" : "" }}>Pending</option>                              
                            </select>
                        </div>

                        <div class="mt-5 text-center">
                            <input type="hidden" name="hidden_id" value="{{ $property->id }}"/>
                            <a href="{{route('admin.property.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    



<br><br>

    <script>

        // dropdown box changing field
        const renderFields = async (value = <?php echo json_encode ($property->property_type ) ?>) => {

        let type = value;

        let property = <?php echo json_encode ($property) ?>


        let url = "{{url('/')}}/api/get_property_type_details/" + type;
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
                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                            <input type="number" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" min="1" max="100" value="${property[name]}" required >
                        </div>`
                    }
                    else if (name == 'building_type') {
                                    first = `<div>
                                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}" name="${name}" value="${property[name]}" required >
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
                                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" id="${name}" name="${name}" value="${property[name]}" required >
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
                                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" id="${name}" name="${name}" value="${property[name]}" required >
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
                                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" id="${name}" name="${name}" value="${property[name]}" required >
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
                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                            <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" value="${property[name]}" required >
                        </div>`
                    }
            }
            else {
                let name = fields[i].split(' ').join('_').toLowerCase();
                if(name == 'beds' || name == 'baths' || name == 'building_type' || name == 'parking_type' || name == 'zoning_type' || name == 'farm_type') {
                    if(name == 'beds' || name == 'baths') {
                        template += `<div class="col-6">
                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                            <input type="number" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" min="1" max="100" value="${property[name]}" required >
                        </div>`
                    }
                    else if (name == 'building_type') {
                                template += `<div class="col-6">
                                                <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                                <select class="form-select" aria-label="${name}" id="${name}" name="${name}" value="${property[name]}" required>
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
                                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" id="${name}" name="${name}" value="${property[name]}" required >
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
                                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" id="${name}" name="${name}" value="${property[name]}" required >
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
                                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                                            <select class="form-select" aria-label="${name}" id="${name}" name="${name}" value="${property[name]}" required >
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
                            <label for="${name}" class="form-label mb-0 mt-4 required">${fields[i]}</label>
                            <input type="text" class="form-control" name="${name}" id="${name}" aria-describedby="${name}" value="${property[name]}" required >
                        </div>
                    </div>`
                }
            }
        }
        $('.first-incoming-field').html(first);
        $('#incoming_fields').html(template);
        incomingFieldsValue();
        }




        $( "#name" ).change(function() {
        let name = $(this).val().split(' ').join('-').toLowerCase();


        $('#slug').val(name);
        });



        $(document).ready(function() {
        let property_type = <?php echo json_encode ($property->property_type ) ?>

        $('#propertyType option').each(function(i){
            if($(this).val() == property_type) {
                $(this).attr('selected', 'selected');
            }
        });


        let main_category = <?php echo json_encode ($property->main_category ) ?>

        $('#category option').each(function(i){
            if($(this).val() == main_category) {
                $(this).attr('selected', 'selected');
            }
        });


        let transaction_type = <?php echo json_encode ($property->transaction_type ) ?>

        $('#transaction_type option').each(function(i){
            if($(this).val() == transaction_type) {
                $(this).attr('selected', 'selected');
            }
        });

        renderFields();
        });



        function incomingFieldsValue() {

        let zoning_type = <?php echo json_encode ($property->zoning_type ) ?>

        $('#zoning_type option').each(function(i){
            if($(this).val() == zoning_type) {
                $(this).attr('selected', 'selected');
            }
        });


        let parking_type = <?php echo json_encode ($property->parking_type ) ?>

        $('#parking_type option').each(function(i){
            if($(this).val() == parking_type) {
                $(this).attr('selected', 'selected');
            }
        });

        let farm_type = <?php echo json_encode ($property->farm_type ) ?>

        $('#farm_type option').each(function(i){
            if($(this).val() == farm_type) {
                $(this).attr('selected', 'selected');
            }
        });

        let building_type = <?php echo json_encode ($property->building_type ) ?>

        $('#building_type option').each(function(i){
            if($(this).val() == building_type) {
                $(this).attr('selected', 'selected');
            }
        });


        };


        $('#propertyType').change(function() {
        renderFields($('#propertyType').val());
        });

    </script>





<script>
         
            $(document).ready(function() {
                $('#country').on('change', function() {
                    var CountryID = $(this).val();
                    // console.log(CountryID);

                        $.ajax({
                            
                            url: "{{url('/')}}/admin/findLocWithCountryID/" + CountryID,
                            method: "GET",
                            dataType: "json",
                            success:function(data) {
                                // console.log(data);
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

            $(document).ready(function() {
                // $('#category').on('change', function() {

                    var CountryID = $('#country').val();
                    // console.log(CountryID);
                    var LocID = $('#location_received').val();
                    // console.log(LocID);
                    

                        $.ajax({
                            
                            url: "{{url('/')}}/admin/findLocWithCountryID/" + CountryID,
                            method: "GET",
                            dataType: "json",
                            success:function(data) {
                                // console.log(data);
                            if(data){
                                $('#area').empty();
                                $('#area').focus;
                                // $('#area').append('<option value="" selected disabled>-- Select Sub Category --</option>'); 
                                $.each(data, function(key, value){
                                    // console.log(value);
                                    if(LocID == value.location_id){                                       
                                        $('#area').append('<option value="'+ value.location_id +'">' + value.location_district+ '</option>');
                                    }
                                    
                                    // $('select[name="area"]').append('<option value="'+ value.location_id +'">' + value.location_district+ '</option>');
                                                                       
                                
                                });

                            }else{
                                $('#area').empty();
                            }
                        }
                        });
                    
                // });
            });

        </script>



<script>
    $(function() {
        $( "#validate" ).change(function() {  
            validate();
        });
        function validate() {
            $('.form-validate-div').hide();
            var divKey = $( "#validate option:selected" ).val();                
            $('.divFrm'+divKey).show();

        }       
        validate();
    });

    $('#validate').change(function() {

        if($(this).val() == 'Full') {
            $('#full_property').prop('required', true);
            $('#price_full_property').prop('required', true);

            $('#perches').prop('required', false);

            $('#acres').prop('required', false);

            $('#hectares').prop('required', false);
        }

        if($(this).val() == 'Perches') {
            $('#perches').prop('required', true);
            $('#price_perches').prop('required', true);

            $('#full_property').prop('required', false);

            $('#acres').prop('required', false);

            $('#hectares').prop('required', false);
        }

        if($(this).val() == 'Acres') {
            $('#acres').prop('required', true);
            $('#price_acres').prop('required', true);

            $('#full_property').prop('required', false);

            $('#perches').prop('required', false);

            $('#hectares').prop('required', false);
        }

        if($(this).val() == 'Hectares') {
            $('#hectares').prop('required', true);
            $('#price_hectares').prop('required', true);

            $('#acres').prop('required', false);

            $('#full_property').prop('required', false);

            $('#perches').prop('required', false);
        }
    })
</script>


<script>

        var marker = false;

        let lat = $('#lat').val();
        let lng = $('#lng').val();
        // console.log(lat, lng)
                
        function initMap() {

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 5,
                center: { lat: parseFloat(lat), lng: parseFloat(lng) },
            });

            const geocoder = new google.maps.Geocoder();
            const infowindow = new google.maps.InfoWindow();


            google.maps.event.addDomListener(map, 'click', function(event) {                
                
                var clickedLocation = event.latLng;
                

                if(marker === false){
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: { lat: parseFloat(lat), lng: parseFloat(lng) },
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


@endsection
