@extends('backend.layouts.app')

@section('title', __('Create New'))

@section('content')

<form action="{{route('admin.property.store')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
    <div class="row">
        <div class="col-7">  
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="name" class="form-label mb-2 required">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" required>
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
                            
                                    <input class="form-control w-100" autoComplete="on" name="agent_user_id" list="agent_user_id" required/> 

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
                                            <option value="{{$type->id}}"> {{$type->property_type_name}} </option>
                                        @endforeach
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label mb-2 mt-3 required">Description <span class="text-danger">*</span></label>
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
                                    <label>Area/location <span class="text-danger">*</span></label>
                                    <select name="area" class="form-control custom-select" id="area" required>

                                    </select>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="states" class="form-label mb-0 mt-4">State/Province/Region <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="states" id="states" aria-describedby="states" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="postal_code" class="form-label mb-0 mt-4">Zip/Postal Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="postal_code" id="postal_code" aria-describedby="postal_code" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="address_line_one" class="form-label mb-0 mt-4">Address Line 1 <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address_line_one" id="address_line_one" aria-describedby="address_line_one" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="address_line_two" class="form-label mb-0 mt-4">Address Line 2 <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address_line_two" id="address_line_two" aria-describedby="address_line_two" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label mb-2 mt-4 required">Price Options <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="validate" id="validate" required>
                                        <option value="Full">Full Property</option>
                                        <option value="Perches">Per Perches</option>
                                        <option value="Acres">Per Acres</option>
                                        <option value="Hectares">Per Hectares</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-2 mt-3">
                                    <div class="form-group form-validate-div divFrmFull" style="display:none">
                                        <label class="form-label mb-2 mt-2">Full Property Count <span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" id="full_property" name="full_property" placeholder="Full Property Count" > 
                                    </div>
                                    <div class="form-group form-validate-div divFrmPerches" style="display:none">
                                        <label class="form-label mb-2 mt-2">Perches Count <span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" id="perches" name="perches" placeholder="Perches Count" > 
                                    </div>
                                    <div class="form-group form-validate-div divFrmAcres" style="display:none">
                                        <label class="form-label mb-2 mt-2">Acres Count <span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" id="acres" name="acres" placeholder="Acres Count" > 
                                    </div>
                                    <div  class="form-group form-validate-div divFrmHectares" style="display:none">
                                        <label class="form-label mb-2 mt-2">Hectares Count <span class="text-danger">*</span></label>
                                        <input type="number" step="any" class="form-control" id="hectares" name="hectares" placeholder="Hectares Count" > 
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group form-validate-div divFrmFull" style="display:none">
                                    <label for="price" class="form-label mb-2 mt-3">Price of Full Property<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_full_property" id="price_full_property" aria-describedby="price_full_property" placeholder="$">
                                    <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                        Please enter property price in US currency
                                    </div>
                                </div> 
                                <div class="form-group form-validate-div divFrmPerches" style="display:none">
                                    <label for="price" class="form-label mb-2 mt-3">Price Per Perches<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_perches" id="price_perches" aria-describedby="price_perches" placeholder="$">
                                    <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                        Please enter property price in US currency
                                    </div>
                                </div> 
                                <div class="form-group form-validate-div divFrmAcres" style="display:none">
                                    <label for="price" class="form-label mb-2 mt-3">Price Per Acres<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_acres" id="price_acres" aria-describedby="price_acres" placeholder="$">
                                    <div id="passwordHelpBlock" class="form-text text-info fw-bolder">
                                        Please enter property price in US currency
                                    </div>
                                </div> 
                                <div class="form-group form-validate-div divFrmHectares" style="display:none">
                                    <label for="price" class="form-label mb-2 mt-3">Price Per Hectares<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_hectares" id="price_hectares" aria-describedby="price_hectares" placeholder="$">
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
                                        <option value="For Sale">For Sale</option>
                                        <option value="For Rent">For Rent</option>
                                    </select>
                                </div>  
                            </div> -->
                            <div class="col-6">
                                <div>
                                    <label for="city" class="form-label mb-2 mt-3">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" id="city" aria-describedby="city" required>
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
                                    <label class="mb-2 mt-2">Multiple Images
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
                <!-- <button type="submit" class="btn btn-success pull-right">Create New</button><br> -->
                
                <br>            
        </div>

        <div class="col-5 p-1">                
            <div class="card">
                <div class="card-body">
                    <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Panaroma Status</label>
                                    <select class="form-control custom-select" id="panaromal_status" name="panaromal_status" onchange="panaromas(this);">
                                        <option value="no_any" selected>No Any</option> 
                                        <option value="google_panaroma">Google Panaroma</option>   
                                        <option value="panaromal_images">Panaromal Images</option>                                
                                    </select>
                                </div>  

                                <div class="form-group mt-2" id="google_panaroma" style="display: none;">
                                    <label for="google_panaroma" class="form-label mb-2">Google Panaroma</label>
                                    <textarea class="form-control" rows="4" name="google_panaroma"></textarea>                                    
                                </div> 

                                <div class="form-group mt-2" id="panaromal_images" style="display: none;">
                                    <label class="mb-2 mt-2">Panaroma Images</label>
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
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                        <div class="row">
                            <div class="col-12">

                                <div class="form-group">
                                    <label for="video" class="form-label mb-2">Video ( Youtube Link )</label>
                                    <input type="text" class="form-control" name="video">                                   
                                </div> 

                                <div class="form-group mt-2">
                                    <label class="mb-2 mt-2">Flow Plan</label>
                                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                        </div>
                                        <div class="form-control file-amount">Choose File</div>
                                        <input type="hidden" name="flow_plan" class="selected-files" >
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div> 

                            </div>                            
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="promoted" class="form-label mb-2">Promoted <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" aria-label="promoted" id="promoted" name="promoted" required>
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled" selected>Disabled</option>
                                    </select>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div>
                                    <label for="premium" class="form-label mb-2">Premium Listing <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" aria-label="premium" id="premium" name="premium" required>
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled" selected>Disabled</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div>
                                    <label for="featured" class="form-label mb-2">Featured <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" aria-label="featured" id="featured" name="featured" required>
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled" selected>Disabled</option>
                                    </select>
                                </div>  
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label>Admin Approval <span class="text-danger">*</span></label>
                            <select class="form-control" name="admin_approval" required>
                                <option value="Approved">Approve</option>   
                                <option value="Disapproved">Disapprove</option> 
                                <option value="Pending">Pending</option>                               
                            </select>
                        </div>

                        <div class="mt-5 text-center">
                            <a href="{{route('admin.property.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                            <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Create</button>
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
            
            document.querySelector('#perches').required = false;
            document.querySelector('#price_perches').required = false;
            document.querySelector('#acres').required = false;
            document.querySelector('#price_acres').required = false;
            document.querySelector('#hectares').required = false;
            document.querySelector('#price_hectares').required = false;

        }
       
        if($(this).val() == 'Perches') {
            $('#perches').prop('required', true);
            $('#price_perches').prop('required', true);

            document.querySelector('#full_property').required = false;
            document.querySelector('#price_full_property').required = false;
            document.querySelector('#acres').required = false;
            document.querySelector('#price_acres').required = false;
            document.querySelector('#hectares').required = false;
            document.querySelector('#price_hectares').required = false;

            // $('#full_property').removeAttr('required');

            // $('#acres').removeAttr('required');

            // $('#hectares').removeAttr('required');
        }

        if($(this).val() == 'Acres') {
            $('#acres').prop('required', true);
            $('#price_acres').prop('required', true);

            document.querySelector('#full_property').required = false;
            document.querySelector('#price_full_property').required = false;
            document.querySelector('#perches').required = false;
            document.querySelector('#price_perches').required = false;
            document.querySelector('#hectares').required = false;
            document.querySelector('#price_hectares').required = false;

            // $('#full_property').removeAttr('required');

            // $('#perches').removeAttr('required');

            // $('#hectares').removeAttr('required');
        }

        if($(this).val() == 'Hectares') {
            $('#hectares').prop('required', true);
            $('#price_hectares').prop('required', true);

            document.querySelector('#acres').required = false;
            document.querySelector('#price_acres').required = false;
            document.querySelector('#full_property').required = false;
            document.querySelector('#price_full_property').required = false;
            document.querySelector('#perches').required = false;
            document.querySelector('#price_perches').required = false;

            // $('#acres').removeAttr('required');

            // $('#full_property').removeAttr('required');

            // $('#perches').removeAttr('required');
        }
    })
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


    <script>
        function panaromas(that) {
            if (that.value == 'google_panaroma') {
                document.getElementById("google_panaroma").style.display = "block";
                document.getElementById("panaromal_images").style.display = "none";
            }else if(that.value == 'panaromal_images') {
                document.getElementById("panaromal_images").style.display = "block";
                document.getElementById("google_panaroma").style.display = "none";
            } else {
                document.getElementById("panaromal_images").style.display = "none";
                document.getElementById("google_panaroma").style.display = "none";
            }

        }
    </script> 


@endsection