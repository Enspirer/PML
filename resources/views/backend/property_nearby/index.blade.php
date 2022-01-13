@extends('backend.layouts.app')

@section('title', __('Property Page Advertisement'))

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Schools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Restaurants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">ATM</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="school" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest Schools</button>
                </div>
            </form> <br>
            @foreach($near_places as $near_place)
                    @if($near_place->type == 'school')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{$near_place->icon}}">


                                    </div>
                                    <div class="col-md-5">
                                        <p><b>{{$near_place->name}}</b></p>
                                        <p>{{$near_place->address}}</p>
                                        <b>Longitude :</b> {{$near_place->lng}} / <b>Latitude: </b> {{$near_place->lat}}
                                    </div>
                                    <div class="col-md-6">
                                        <h3>{{$near_place->distance}} KM</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @else

                    @endif
            @endforeach



        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="restaurant" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest Schools</button>
                </div>
            </form> <br>
            @foreach($near_places as $near_place)
                @if($near_place->type == 'restaurant')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{$near_place->icon}}">


                                </div>
                                <div class="col-md-5">
                                    <p><b>{{$near_place->name}}</b></p>
                                    <p>{{$near_place->address}}</p>
                                    <b>Longitude :</b> {{$near_place->lng}} / <b>Latitude: </b> {{$near_place->lat}}
                                </div>
                                <div class="col-md-6">
                                    <h3>{{$near_place->distance}} KM</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @else

                @endif
            @endforeach


        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="atm" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest Schools</button>
                </div>
            </form> <br>
            @foreach($near_places as $near_place)
                @if($near_place->type == 'atm')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{$near_place->icon}}">


                                </div>
                                <div class="col-md-5">
                                    <p><b>{{$near_place->name}}</b></p>
                                    <p>{{$near_place->address}}</p>
                                    <b>Longitude :</b> {{$near_place->lng}} / <b>Latitude: </b> {{$near_place->lat}}
                                </div>
                                <div class="col-md-6">
                                    <h3>{{$near_place->distance}} KM</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @else

                @endif
            @endforeach




        </div>
    </div>


@endsection
