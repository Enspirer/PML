@extends('frontend.layouts.app')

@section('title', 'My Properties')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

<div style="background: #e8eeef;">
        <div class="container user-settings" style="margin-top:6rem;">
            <div class="row justify-content-between">
                <div class="col-4 left col-xs-12" style="background-color: #E8EEEF">
                    <div class="row">
                        <div class="col-12">
                            @include('frontend.includes.profile-settings-links')
                        </div>
                    </div>
                </div>

                <div class="col-8 ps-4 right pb-5 col-xs-12" style="padding-top: 3rem; background-color: #F5F9FA">                 


                    <div class="row justify-content-between">
                        <div class="col-12 p-0">
                            <div class="row align-items-center">
                                <div class="col-6 ps-4">
                                    <h4 class="fs-4 fw-bolder user-settings-head">My Properties</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">


                                @if(count($properties) == 0)
                                    @include('frontend.includes.not_found',[
                                        'not_found_title' => 'My properties not found',
                                        'not_found_description' => 'Please add properties',
                                        'not_found_button_caption' => null
                                    ])
                                @else


                                    @foreach($properties as $property)

                                        @if($property->admin_approval == 'Approved')
                                            <div class="row align-items-center justify-content-between mb-4 border py-3">
                                                <div class="col-6">
                                                    
                                                        <img src="{{ uploaded_asset($property->feature_image_id)}}" class="w-100" alt="..." style="height: 250px; object-fit:cover;">
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="card-title mb-2">{{ $property->name }}</h5>
                                                        @if($property->beds == null)
                                                        @else
                                                            <p class="card-text mt-3 mb-2">{{ $property['beds'] }} Bed Semidetached house</p>
                                                        @endif                                            
                                                    <p class="card-text mb-2">Property Type : {{ App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                                    
                                                    <p class="mb-0 d-inline-block px-2 py-1 text-light mb-3" style="font-size: 0.8rem; background: #4195e1; border-radius: 7px;">{{ get_currency(request() ,$property->price)}}</p>
                                                    

                                                    <div class="row mt-4">
                                                        <div class="col-10">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <a href="{{ route('frontend.for_sale_single', $property->id) }}" class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                                                </div>
                                                                <div class="col-3">
                                                                    <a href="{{ route('frontend.user.my_properties-edit', $property->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                                </div>
                                                                <div class="col-3 ps-1">
                                                                    <a href="{{ route('frontend.user.my_properties-delete', $property->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ff2c4b"><i class="fas fa-trash"></i></a>
                                                                </div>
                                                                @if($property->sold_request == 'Sold')
                                                                    <div class="col-3 ps-1">
                                                                        <button class="btn px-4 rounded-0 text-light py-1 btn-success">Sold</button>
                                                                    </div>
                                                                @elseif($property->sold_request == 'Pending')
                                                                    <div class="col-3 ps-1">
                                                                        <a href="{{ route('frontend.user.my_pending_status', $property->id) }}" class="btn px-4 rounded-0 py-1 btn-warning my_pending_status" data-bs-toggle="modal" data-bs-target="#my_pending_status_Modal">Pending</a>
                                                                    </div>
                                                                @else
                                                                    <div class="col-3 ps-1">
                                                                        <a href="{{ route('frontend.user.my_sold_status', $property->id) }}" class="btn px-4 rounded-0 py-1 text-light btn-secondary my_sold_status" data-bs-toggle="modal" data-bs-target="#my_sold_status_Modal">Sell</a>
                                                                    </div>
                                                                @endif
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        

                                        @elseif($property->admin_approval == 'Pending')
                                            <div class="row align-items-center justify-content-between mb-4 border py-3" style="background: #f0f0f0;">
                                                <div class="col-6 pen-dis">
                                                    <img src="{{ uploaded_asset($property->feature_image_id)}}" class="w-100" alt="..." style="height: 250px; object-fit:cover;">
                                                </div>
                                                <div class="col-5">
                                                    <div class="clearfix">
                                                        <div class="float-start pen-dis">
                                                            <h5 class="card-title">{{ $property->name }}</h5>
                                                        </div>
                                                        <div class="float-end">
                                                            <button class="position-relative bg-warning border-0 rounded px-2 py-1 text-light" style="top: -1.5rem; cursor: default;">Pending</button>
                                                        </div>
                                                    </div>
                                                    <!-- <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached honse</p> -->
                                                    @if($property->beds == null)
                                                    @else
                                                        <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached house</p>
                                                    @endif  
                                                    <p class="card-text pen-dis">Property Type : {{App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                                    <p class="mt-1 text-info pen-dis">$ {{ $property['price'] }}</p>

                                                    <div class="row mt-4 pen-dis">
                                                        <div class="col-9">
                                                            <div class="row justify-content-center">
                                                                <!-- <div class="col-4">
                                                                    <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                                                </div> -->
                                                                <div class="col-4">
                                                                    <a href="{{ route('frontend.user.my_properties-edit', $property->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                                </div>
                                                                <div class="col-4 ps-1">
                                                                    <a href="{{ route('frontend.user.my_properties-delete', $property->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ff2c4b"><i class="fas fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @elseif($property->admin_approval == 'Disapproved')
                                            <div class="row align-items-center justify-content-between mb-4 border py-3" style="background: #f0f0f0;">
                                                <div class="col-6 pen-dis">
                                                        <img src="{{ uploaded_asset($property->feature_image_id)}}" class="w-100" alt="..." style="height: 250px; object-fit:cover;">
                                                </div>
                                                <div class="col-5">
                                                    <div class="clearfix">
                                                        <div class="float-start pen-dis">
                                                            <h5 class="card-title mb-3">{{ $property->name }}</h5>
                                                        </div>
                                                        <div class="float-end">
                                                            <button class="position-relative bg-danger border-0 rounded px-2 py-1 text-light" style="top: -1.5rem; cursor: default;">Dispproved</button>
                                                        </div>
                                                    </div>
                                                    @if($property->beds == null)
                                                    @else
                                                        <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached house</p>
                                                    @endif 
                                                    <p class="card-text pen-dis">Property Type : {{App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                                    <p class="mt-1 text-info pen-dis">$ {{ $property['price'] }}</p>

                                                    <div class="row mt-4 pen-dis">
                                                        <div class="col-9">
                                                            <div class="row justify-content-center">
                                                                <!-- <div class="col-4">
                                                                    <button class="btn px-3 rounded-0 text-light py-1" style="background-color: #4195E1">View</button>
                                                                </div> -->
                                                                <!-- <div class="col-4">
                                                                    <a href="{{ route('frontend.user.my_properties-edit', $property->id) }}" class="btn px-3 rounded-0 text-light py-1" type="button" style="background-color: #4195E1">Edit</a>
                                                                </div> -->
                                                                <div class="col-4 ps-1">
                                                                    <a href="{{ route('frontend.user.my_properties-delete', $property->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ff2c4b"><i class="fas fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    

                                        @else
                                            <div class="row align-items-center justify-content-between mb-4 border py-3" style="background: #f0f0f0;">
                                                <div class="col-6 pen-dis">
                                                    <img src="{{ uploaded_asset($property->feature_image_id)}}" class="w-100" alt="..." style="height: 250px; object-fit:cover;">
                                                </div>
                                                <div class="col-5">
                                                    <div class="clearfix">
                                                        <div class="float-start pen-dis">
                                                            <h5 class="card-title">{{ $property->name }}</h5>
                                                        </div>
                                                        <div class="float-end">
                                                            <button class="position-relative bg-warning border-0 rounded px-2 py-1 text-light" style="top: -1.5rem; cursor: default;">Pending</button>
                                                        </div>
                                                    </div>
                                                    @if($property->beds == null)
                                                    @else
                                                        <p class="card-text mt-3 mb-1 pen-dis">{{ $property['beds'] }} Bed Semidetached house</p>
                                                    @endif 
                                                    <p class="card-text pen-dis">Property Type : {{ App\Models\PropertyType::where('id', $property->property_type)->first()->property_type_name }}</p>
                                                    <p class="mt-1 text-info pen-dis">$ {{ $property['price'] }}</p>

                                                    <div class="row mt-4 pen-dis">
                                                        <div class="col-9">
                                                            <div class="row justify-content-center">
                                                                <div class="col-4 ps-1">
                                                                    <a href="{{ route('frontend.user.my_properties-delete', $property->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #ff2c4b"><i class="fas fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif    
                            </div>
                        </div>
                    </div>

                   

                </div>

            </div>
        </div>

        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Property</h5>
                        <button type="button" class="btn-close mt-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete this property?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="my_pending_status_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cancel Request</h5>
                        <button type="button" class="btn-close mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to cancel this property sold request?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="my_sold_status_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sold Property</h5>
                        <button type="button" class="btn-close mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to send this property sold request to admin?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="" class="btn btn-success">Send</a>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
@endsection


@push('after-scripts')
    <script>
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
    <script>
        $('.my_sold_status').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
    <script>
        $('.my_pending_status').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
@endpush
