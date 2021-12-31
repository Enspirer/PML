@extends('frontend.layouts.app')

@section('title', 'Account Information' )

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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Favourite List <i class="fa fa-heart" style="float: right;font-size: 52px;color: #2b3c50;"></i></h5>
                                    <h4>{{ sprintf("%02d",App\Models\Favorite::where('user_id',auth()->user()->id)->get()->count()) }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5>My Bookings <i class="fa fa-bookmark" style="float: right;font-size: 52px;color: #2b3c50;"></i></h5>
                                    <h4>{{ sprintf("%02d",App\Models\Booking::where('user_id',auth()->user()->id)->get()->count()) }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Feedback <i class="fa fa-box" style="float: right;font-size: 52px;color: #2b3c50;"></i></h5>
                                    <h4>{{ sprintf("%02d",App\Models\Feedback::where('user_id',auth()->user()->id)->get()->count()) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div> <br>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    sds
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>


            </div>
        </div>
    </div>


@endsection

