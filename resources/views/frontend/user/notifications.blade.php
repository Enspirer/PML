@extends('frontend.layouts.app')

@section('title', 'Notifications')

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

                    <div class="row justify-content-between mb-4">
                        <div class="col-8 p-0">
                            <div class="row align-items-center">
                                <div class="col-6 ps-4">
                                    <h4 class="fs-4 fw-bolder user-settings-head mb-3">Notifications</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="px-2" id="nav-properties" role="tabpanel" aria-labelledby="nav-properties-tab">

                            @if(count($notification) == 0)

                                @include('frontend.includes.not_found',[
                                'not_found_title' => 'Notifications not found',
                                'not_found_description' => null,
                                'not_found_button_caption' => null
                                ])

                            @else
                                @foreach($notification as $notify)
                                    @if($notify->status == 'Pending')
                                        <a href="{{route('frontend.user.user_notifications_status',$notify->id)}}" style="text-decoration:none">
                                            <div class="row align-items-center justify-content-between mb-4 border py-3">                                           
                                                <div class="col-12">
                                                    <h5 class="card-title text-dark">{{App\Models\Properties::where('id',$notify->url)->first()->name}} {{ $notify->title }}</h5>
                                                    <h6 class="card-title text-dark mt-3">{{ $notify->description }}</h6>                                               
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <a href="{{route('frontend.user.user_notifications_status_changed',$notify->id)}}" style="text-decoration:none">
                                            <div class="row align-items-center justify-content-between mb-4 border py-3">                                           
                                                <div class="col-12">
                                                    <h5 class="card-title" style="color:#818589">{{App\Models\Properties::where('id',$notify->url)->first()->name}} {{ $notify->title }}</h5>
                                                    <h6 class="card-title mt-3" style="color:#818589">{{ $notify->description }}</h6>                                               
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                        
                                @endforeach                        

                            @endif


                            <div class="modal fade" id="deleteFavorite" tabindex="-1" aria-labelledby="deleteFavoriteLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Property</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete this from favourite properties?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="" class="btn btn-primary">Delete</a>
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
    
   
@endpush
