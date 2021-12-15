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
                                        <option value="{{ $agent->id }}">{{ $agent->name }} - {{ $agent->email }}</option>
                                    @endforeach
                                    </datalist>   
                            
                                    <input class="form-control w-100" autoComplete="on" value="{{ App\Models\AgentRequest::where('id',$property->user_id)->first()->id }}" name="agent_user_id" list="agent_user_id" required/> 

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
                                    <label>Area/location</label>
                                    <select name="area" class="form-control custom-select" id="area" required>
        
                                    </select>
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <label for="price" class="form-label mb-2 mt-3">Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price" id="price" aria-describedby="price" value="{{ $property->price }}" required placeholder="$">
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


@endsection
