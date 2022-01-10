@extends('frontend.layouts.app')

@section('title', 'Favoutite Properties')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
<style>
    .free_listning {
        top: 0;
        left: 1rem;
    }
</style>
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

                    <div class="row justify-content-between mb-4">
                        <div class="col-8 p-0">
                            <div class="row align-items-center">
                                <div class="col-6 ps-4">
                                    <h4 class="fs-4 fw-bolder user-settings-head mb-3">Favourite Properties</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">

                            @if(count($favourite) == 0)

                                @include('frontend.includes.not_found',[
                                    'not_found_title' => 'Favorite Properties not found',
                                    'not_found_description' => 'Favorite item not found.please add Favorite ',
                                    'not_found_button_caption' => 'Explorer Property'
                                ])

                            @else
                                @foreach($property as $prop)
                                    @if(is_favorite($prop->id, auth()->user()->id))
                                        <div class="row align-items-center justify-content-between mb-4 border py-3 position-relative">
                                            <div class="col-6">
                                                <a href="{{ route('frontend.for_sale_single', $prop->id) }}"><img src="{{ uploaded_asset($prop->feature_image_id) }}" style="width:350px; object-fit:cover;" height="210px" class="card-img-top" alt="..."></a>
                                                @if($prop->promoted == 'Enabled')
                                                    <div class="free_listning position-absolute badge badge-danger p-2 m-2">PROMOTED</div>
                                                @endif
                                            </div>
                                            <div class="col-5">
                                                <h5 class="card-title">{{ $prop->name }}</h5>
                                                <h6 class="card-title mt-3">{{ $prop->city }}, {{App\Models\Country::where('id',$prop->country)->first()->country_name }}</h6>

                                                @if($prop->beds == null)
                                                @else
                                                    <p class="card-text mt-3 mb-1">
                                                        {{ $prop->beds }} Bed Semidetached house
                                                    </p>
                                                @endif

                                                <!-- <p class="card-text">Lancaster, claited Kingdom</p> -->
                                                <p class="mt-1 text-info">{{ get_currency(request() ,$prop->price)}}</p>

                                                <div class="row mt-3">
                                                    <div class="col-4">
                                                        <a href="{{ route('frontend.for_sale_single', $prop->id) }}" class="btn px-4 rounded-0 text-light py-1" style="background-color: #4195E1">View</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="hidden" name="hid_id" value="{{ $prop->id }}">
                                                        <a href="{{ route('frontend.user.favourites-delete', $prop->id) }}" class="btn px-4 rounded-0 text-light py-1 delete" data-bs-toggle="modal" data-bs-target="#deleteFavorite" style="background-color: #ff2c4b"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach                        
                            @endif



                            <div class="modal fade" id="deleteFavorite" tabindex="-1" aria-labelledby="deleteFavoriteLabel" aria-hidden="true">
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
        $('.delete').on('click', function() {
            let link = $(this).attr('href');
            $('.modal-footer a').attr('href', link);
        })
    </script>
@endpush
