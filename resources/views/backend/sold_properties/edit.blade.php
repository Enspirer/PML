@extends('backend.layouts.app')

@section('title', __('Approval'))

@section('content')
    
<style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }

      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    </style>

<form action="{{route('admin.sold_properties.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                                                                              
                                <div class="swiper mySwiper" style="height:370px;">
                                    <div class="swiper-wrapper">
                                        @php
                                            $str_arr2 = preg_split ("/\,/", $property->image_ids);
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
                            
                            
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h4 class="mb-0">{{ $property->name}}</h4>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <h5 class="d-inline-block mb-0 py-2 px-4 text-light" style="background-color: #4195E1;">{{ $property_type->property_type_name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 pe-0 align-items-center">
                                <div class="col-12">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 600; width:25%">Location</td>
                                                <td>{{ $property->city}}, {{ App\Models\Country::where('id',$property->country)->first()->country_name }}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Price</td>
                                                <td>{{ $property->price}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Category</td>
                                                <td>{{ $property->main_category}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Meta Description</td>
                                                <td>{{ $property->meta_description}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Slug</td>
                                                <td>{{ $property->slug}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>

                            <div class="row mt-3 pe-0 align-items-center">
                                <div class="col-6">
                                    <table class="table table-hover table-borderless">
                                        <tbody>
                                                @if($property->transaction_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Transaction Type</td>
                                                        <td>{{ $property->transaction_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->zoning_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Zoning Type</td>
                                                        <td>{{ $property->zoning_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->building_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Building Type</td>
                                                        <td>{{ $property->building_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->building_size == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Building Size</td>
                                                        <td>{{ $property->building_size }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->farm_type == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Farm Type</td>
                                                        <td>{{ $property->farm_type }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->beds == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Beds</td>
                                                        <td>{{ $property->beds }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->baths == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Baths</td>
                                                        <td>{{ $property->baths }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->land_size == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Land Size</td>
                                                        <td>{{ $property->land_size }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->number_of_units == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Number Of Units</td>
                                                        <td>{{ $property->number_of_units }}</td>
                                                    </tr>
                                                @endif

                                                @if($property->open_house_only == null)
                                                @else
                                                    <tr>
                                                        <td style="font-weight: 600;">Open House Only</td>
                                                        <td>{{ $property->open_house_only }}</td>
                                                    </tr>
                                                @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-6 pe-0">
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <div class="card">
                                                <div class="text-center mt-2">
                                                    <img src="{{ uploaded_asset($agent_details->photo) }}" class="rounded-circle card-img-top border border-2" alt="..." style="height: 120px; width: 50%; object-fit:cover">
                                                </div>

                                                <div class="card-body">
                                                    <h5 class="card-title text-center">{{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->name }}</h5>
                                                    <p class="card-text mb-0">Email : {{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->email }}</p>
                                                    <p class="card-text mb-0">Phone : {{ App\Models\AgentRequest::where('user_id', $property->user_id)->first()->telephone }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="" >
                            <div class="form-group">
                                <label style="font-weight: 600;" class="ml-2">Description:</label>
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>{{ $property->description}}</td>
                                        </tr>
                                            <tr>
                                                <td style="font-weight: 600;">Property Sold Status :</td>
                                                <td>{{ $property->sold_request}}</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                            <div class="form-group">
                                <label>Admin Approval</label>
                                <select class="form-control" name="sold_request" required>
                                    <option value="Sold" {{ $property->sold_request == 'Sold' ? "selected" : "" }}>Sold</option>   
                                    <option value="Pending" {{ $property->sold_request == 'Pending' ? "selected" : "" }}>Pending</option>                               
                                </select>
                            </div>

                            <div class="mt-5 text-center">
                                <input type="hidden" name="hidden_id" value="{{ $property->id }}"/>
                                <a href="{{route('admin.sold_properties.index')}}" type="button" class="btn rounded-pill text-light px-4 py-2 me-2 btn-primary">Back</a>
                                <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2 btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </form>

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

    

@endpush
