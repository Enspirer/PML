@extends('backend.layouts.app')

@section('title', __('Property Page Advertisement'))

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="" style="border-style: ridge;border-width: 3px;padding: 20px;">
                <div class="row">
                    <div class="col-3">
                      <img src="{{uploaded_asset($property_details->feature_image_id)}}" style="height:150px; object-fit:cover;" width="100%" alt="">  
                    </div>    
                    <div class="col-9">
                        <p><b>Property Name:</b> {{$property_details->name}}</p>
                        <p><b>Price:</b> $ {{$property_details->price}}</p>
                        <p><b>Property Type:</b> {{ App\Models\PropertyType::where('id',$property_details->property_type)->first()->property_type_name }}</p>
                        <p><b>Listning Type:</b> 
                            @if($property_details->listning_type == 'agent_listning')
                                Agent Listning
                            @else
                                Free Listning
                            @endif            
                        </p>
                    </div>                          
                </div>
                            
            </div>
        </div>  

    </div>

    <div id="map" style="height: 400px; width: 100%; margin-bottom:50px"></div>
    <input type="text" name="lat" id="lat" value="{{$property_details->lat}}" class="mt-3 d-none">
    <input type="text" name="lng" id="lng" value="{{$property_details->long}}" class="mt-3 d-none">


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="shopping-tab" data-toggle="tab" href="#shopping" role="tab" aria-controls="shopping" aria-selected="true">Shopping</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="food-tab" data-toggle="tab" href="#food" role="tab" aria-controls="food" aria-selected="true">Food</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="restaurant-tab" data-toggle="tab" href="#restaurant" role="tab" aria-controls="restaurant" aria-selected="false">Restaurants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="school-tab" data-toggle="tab" href="#school" role="tab" aria-controls="school" aria-selected="true">Schools</a>
        </li>        
        <li class="nav-item">
            <a class="nav-link" id="atm-tab" data-toggle="tab" href="#atm" role="tab" aria-controls="atm" aria-selected="false">ATM</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="hospital-tab" data-toggle="tab" href="#hospital" role="tab" aria-controls="hospital" aria-selected="false">Hospital</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="gym-tab" data-toggle="tab" href="#gym" role="tab" aria-controls="gym" aria-selected="false">GYM</a>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="shopping" role="tabpanel" aria-labelledby="shopping-tab">

            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="shopping" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest Shopping</button>
                </div>
            </form> <br>
            @foreach($near_places as $near_place)
                @if($near_place->type == 'shopping')
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

        <div class="tab-pane fade" id="food" role="tabpanel" aria-labelledby="food-tab">

            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="food" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest Food</button>
                </div>
            </form> <br>
            @foreach($near_places as $near_place)
                @if($near_place->type == 'food')
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

        <div class="tab-pane fade" id="restaurant" role="tabpanel" aria-labelledby="restaurant-tab">

            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="restaurant" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest Restaurants</button>
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

        <div class="tab-pane fade" id="school" role="tabpanel" aria-labelledby="school-tab">
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
        
        <div class="tab-pane fade" id="atm" role="tabpanel" aria-labelledby="atm-tab">
            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="atm" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest ATM</button>
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

        <div class="tab-pane fade" id="hospital" role="tabpanel" aria-labelledby="hospital-tab">
            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="hospital" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest Hospital</button>
                </div>
            </form> <br>
            @foreach($near_places as $near_place)
                @if($near_place->type == 'hospital')
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

        <div class="tab-pane fade" id="gym" role="tabpanel" aria-labelledby="gym-tab">
            <form action="{{route('admin.property.property_nearby_generate')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="gym" name="type">
                <input type="hidden" value="{{$property_details->id}}" name="property_id">
                <div style="">
                    <button type="submit" class="btn btn-primary">Generate Nearest GYM</button>
                </div>
            </form> <br>
            @foreach($near_places as $near_place)
                @if($near_place->type == 'gym')
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






<script>
    function initMap() {
        let lat = $('#lat').val();
        let lng = $('#lng').val();

        const myLatLng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };

        let options = {
            zoom: 8,
            center: myLatLng
        };

        //custom icons for marker type
        const iconBase = "{{ url('img/frontend/map-icons') }}";
        const icons = {
            //shopping
            shopping: {
                icon: iconBase + "/shopping.png",
            },
            food: {
                icon: iconBase + "/food.png",
            },
            restuarant: {
                icon: iconBase + "/restuarant.png",
            },
            school: {
                icon: iconBase + "/school.png",
            },
            atm: {
                icon: iconBase + "/atm.png",
            },
            hospital: {
                icon: iconBase + "/hospital.png",
            },
            gym: {
                icon: iconBase + "/gym.png",
            }
        };



        const map = new google.maps.Map(document.getElementById("map"), options);

        let marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });





        let markers = [];



        //----------------shopping-----------------------
        $("#shopping").click(function() {

            for (var i = 0; i < markers.length; i++) {

                markers[i].setMap(null);
            }


            // $.ajax ({
            //     type: "GET",
            //     url: 
            //     success: function(data) {

            //     }
            // });

            let shoppingLocations = [{
                    id: 1,
                    lat: 50.9474,
                    lng: 10.7098,
                    type: "shopping"
                },
                {
                    id: 2,
                    lat: 50.5558,
                    lng: 9.6808,
                    type: "shopping"
                }
            ];


            for (var i = 0; i < shoppingLocations.length; i++) {

                var marker = new google.maps.Marker({
                    map: map,
                    position: shoppingLocations[i],
                    icon: icons[shoppingLocations[i].type].icon,
                });

                markers.push(marker);
            }

        })


        //----------------food-----------------------
        $("#food").click(function() {

            for (var i = 0; i < markers.length; i++) {

                markers[i].setMap(null);
            }


            let foodLocations = [{
                    id: 1,
                    lat: 50.8019,
                    lng: 8.7658,
                    type: "food"
                },
                {
                    id: 2,
                    lat: 50.6077,
                    lng: 10.6881,
                    type: "food"
                }
            ];


            for (var i = 0; i < foodLocations.length; i++) {

                var marker = new google.maps.Marker({
                    map: map,
                    position: foodLocations[i],
                    icon: icons[foodLocations[i].type].icon,
                });

                markers.push(marker);
            }


        })


        //----------------restuarant-----------------------
        $("#restuarant").click(function() {

            for (var i = 0; i < markers.length; i++) {

                markers[i].setMap(null);
            }


            let restuarantLocations = [{
                    id: 1,
                    lat: 50.9271,
                    lng: 11.5892,
                    type: "restuarant"
                },
                {
                    id: 2,
                    lat: 50.7508,
                    lng: 9.2692,
                    type: "restuarant"
                }
            ];


            for (var i = 0; i < restuarantLocations.length; i++) {

                var marker = new google.maps.Marker({
                    map: map,
                    position: restuarantLocations[i],
                    icon: icons[restuarantLocations[i].type].icon,
                });

                markers.push(marker);
            }


        })


        //----------------school-----------------------
        $("#school").click(function() {

            for (var i = 0; i < markers.length; i++) {

                markers[i].setMap(null);
            }


            let schoolLocations = [{
                    id: 1,
                    lat: 50.7271,
                    lng: 11.4892,
                    type: "school"
                },
                {
                    id: 2,
                    lat: 50.6508,
                    lng: 9.3692,
                    type: "school"
                }
            ];


            for (var i = 0; i < schoolLocations.length; i++) {

                var marker = new google.maps.Marker({
                    map: map,
                    position: schoolLocations[i],
                    icon: icons[schoolLocations[i].type].icon,
                });

                markers.push(marker);
            }


        })


        //----------------atm-----------------------
        $("#atm").click(function() {

            for (var i = 0; i < markers.length; i++) {

                markers[i].setMap(null);
            }


            let atmLocations = [{
                    id: 1,
                    lat: 50.5271,
                    lng: 11.6892,
                    type: "atm"
                },
                {
                    id: 2,
                    lat: 50.5508,
                    lng: 9.5692,
                    type: "atm"
                }
            ];


            for (var i = 0; i < atmLocations.length; i++) {

                var marker = new google.maps.Marker({
                    map: map,
                    position: atmLocations[i],
                    icon: icons[atmLocations[i].type].icon,
                });

                markers.push(marker);
            }


        })


        //----------------hospital-----------------------
        $("#hospital").click(function() {

            for (var i = 0; i < markers.length; i++) {

                markers[i].setMap(null);
            }


            let hospitalLocations = [{
                    id: 1,
                    lat: 50.5671,
                    lng: 11.5892,
                    type: "hospital"
                },
                {
                    id: 2,
                    lat: 50.5608,
                    lng: 9.3692,
                    type: "hospital"
                }
            ];


            for (var i = 0; i < hospitalLocations.length; i++) {

                var marker = new google.maps.Marker({
                    map: map,
                    position: hospitalLocations[i],
                    icon: icons[hospitalLocations[i].type].icon,
                });

                markers.push(marker);
            }


        })


        //----------------gym-----------------------
        $("#gym").click(function() {

            for (var i = 0; i < markers.length; i++) {

                markers[i].setMap(null);
            }


            let gymLocations = [{
                    id: 1,
                    lat: 50.9671,
                    lng: 10.5892,
                    type: "gym"
                },
                {
                    id: 2,
                    lat: 50.5608,
                    lng: 11.3692,
                    type: "gym"
                }
            ];


            for (var i = 0; i < gymLocations.length; i++) {

                var marker = new google.maps.Marker({
                    map: map,
                    position: gymLocations[i],
                    icon: icons[gymLocations[i].type].icon,
                });

                markers.push(marker);
            }


        })





    }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
    type="text/javascript"></script>

@endsection
