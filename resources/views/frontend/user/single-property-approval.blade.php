@extends('frontend.layouts.app')

@section('title', 'Single Property Approval')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

<div style="background: #e8eeef;">
        <div class="container user-settings" style="margin-top:6rem;">
            <div class="row justify-content-between">
                <div class="col-4 left" style="background-color: #E8EEEF">
                    <div class="row">
                        <div class="col-12">
                            @include('frontend.includes.profile-settings-links')
                        </div>
                    </div>
                </div>

                <div class="col-8 ps-4 right pb-5" style="padding-top: 3rem; background-color: #F5F9FA">                    

                    <div class="row justify-content-between mb-4">
                        <div class="col-12 p-0">
                            <div class="row align-items-center">
                                <div class="col-6 ps-4">
                                    <!-- <h4 class="fs-4 fw-bolder user-settings-head">Property Approval</h4> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="px-2" id="nav-agent" role="tabpanel" aria-labelledby="nav-agent-tab">
                                <div class="row align-items-center justify-content-between mb-4 border py-3">
                                    
                                    <div class="col-12">
                                        <div class="swiper mySwiper" style="height:370px;">
                                            <div class="swiper-wrapper">
                                                @php
                                                    $str_arr2 = preg_split ("/\,/", $single_approval->image_ids);
                                                @endphp

                                                @foreach($str_arr2 as $key=> $pre)
                                                    <div class="swiper-slide">
                                                        <img src="{{ uploaded_asset($pre) }}" class="d-block w-100" style="height:370px; object-fit:cover;"/>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <h4 class="mb-0">{{ $single_approval->name }}</h4>
                                        </div>
                                        <div class="col-2">
                                            @if($single_approval->promoted == 'Enabled')
                                                <div class="badge badge-danger p-2 m-2">PROMOTED</div>
                                            @endif
                                        </div>                                        
                                        <div class="col-5">
                                            <div class="text-end">
                                                <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #4195E1;">{{ $property_type->property_type_name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2 pe-0 align-items-center">
                                    <div class="col-12">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td style="font-weight: 600;">Location</td>
                                                    <td>{{ $single_approval->city }}, {{ App\Models\Country::where('id',$single_approval->country)->first()->country_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Price</td>
                                                    <td>{{ $single_approval->price }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Meta Description</td>
                                                    <td>{{ $single_approval->meta_description }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600;">Slug</td>
                                                    <td>{{ $single_approval->slug }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mt-5 pe-0 align-items-center">
                                    <div class="col-6">
                                        <table class="table table-hover table-borderless">
                                            <tbody>
                                                @if($single_approval->transaction_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Transaction Type</td>
                                                        <td>{{ $single_approval->transaction_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->zoning_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Zoning Type</td>
                                                        <td>{{ $single_approval->zoning_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->building_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Building Type</td>
                                                        <td>{{ $single_approval->building_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->building_size == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Building Size</td>
                                                        <td>{{ $single_approval->building_size }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->farm_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Farm Type</td>
                                                        <td>{{ $single_approval->farm_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->beds == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Beds</td>
                                                        <td>{{ $single_approval->beds }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->baths == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Baths</td>
                                                        <td>{{ $single_approval->baths }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->land_size == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Land Size</td>
                                                        <td>{{ $single_approval->land_size }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->number_of_units == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Number Of Units</td>
                                                        <td>{{ $single_approval->number_of_units }}</td>
                                                    </tr>
                                                @endif

                                                @if($single_approval->open_house_only == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Open House Only</td>
                                                        <td>{{ $single_approval->open_house_only }}</td>
                                                    </tr>
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-6 pe-0">
                                        <div class="row justify-content-center">
                                            <div class="col-10">
                                            @if($agent_details == null)
                                                <div class="text-center mt-2" style="color:grey">
                                                    <h3>Agent details not found</h3>
                                                </div>
                                            @else
                                                <div class="card">                                                    
                                                        <div class="text-center mt-2">
                                                            <img src="{{ uploaded_asset($agent_details->photo) }}" class="rounded-circle card-img-top border border-2" alt="..." style="height: 7rem; width: 40%; object-fit:cover">
                                                        </div>

                                                    <div class="card-body">
                                                        <h5 class="card-title text-center">{{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->name }}</h5>
                                                        <p class="card-text mb-0 text-center">Email : {{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->email }}</p>
                                                        <p class="card-text mb-0 text-center">Phone : {{ App\Models\AgentRequest::where('user_id', $single_approval->user_id)->first()->telephone }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h6 style="font-weight: 600;" class="mb-3 ms-2">Description:</h6>
                                            <table class="table table-hover table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $single_approval->description}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('frontend.user.single-property-approved') }}" method="POST">
                                {{csrf_field()}}

                                <div class="mt-5 text-center">
                                    <input type="hidden" class="form-control action_value" value="" name="action">
                                    <input type="hidden" class="form-control" value="{{ $single_approval->id }}" name="hid_id">
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 me-2 approve" style="background-color: #4195E1;">Approve</button>
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 disapprove" style="background-color: #FF2C4B;">Disapprove</button>
                                </div>
                            </form>


                    </div> 

                </div>

            </div>
        </div>
    </div> 

@endsection

@push('after-scripts')

<script>
      var swiper = new Swiper(".mySwiper", {
        pagination: {
          el: ".swiper-pagination",
          type: "fraction",
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
</script>

<script>
    $('.approve').click(function() {
        $('.action_value').val('Approved');
    })

    $('.disapprove').click(function() {
        $('.action_value').val('Disapproved');
    })
</script>


@endpush


