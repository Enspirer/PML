@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/index.css') }}" rel="stylesheet">
    <!-- map links -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    




    <script>

        // let map;
        // let marker;

        function initMap() {

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: { lat: -28.024, lng: 140.887 },
            });


                            //change the center of map
            // map.setCenter({ lat: 7.8731, lng: 80.7718 });

            const contentString = ` <div class="card custom-shadow">
                                                        <img src="{{ url('img/frontend/index/1.png') }}" alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">
                                                        <div class="card-body text-center">
                                                            <h5 class="fw-bold">$450, 000</h5>
                                                            <p>4 Bed Semidetached house</p>
                                                            <p>541, Rosewood place,</p>
                                                            <p>Colombo, Sri Lanka</p>
                                                            <p>3<i class="fas fa-bed ms-2 me-3"></i> 5<i class="fas fa-bath ms-2"></i></p>
                                                        </div>
                                                    </div>`;

            const infoWindow = new google.maps.InfoWindow({
                content: contentString,
                disableAutoPan: true,
            });

                    
          
            // //center change event
             // //center change event
            map.addListener("dragend", () => {

                // console.log(map.getCenter().toJSON());
                var bound;
                bound = map.getBounds();

                var southWest = bound.getSouthWest().toJSON();
                var northEast = bound.getNorthEast().toJSON();



                //decode area
                fromLat = southWest.lat;
                toLat = northEast.lat;

                fromLng = southWest.lng;
                toLng = northEast.lng


                // console.log(fromLat);
                // console.log(toLat);
                // console.log(fromLng);
                // console.log(toLng);



                //Get markers data from the backend
                $.ajax({
                    
                    url: "{{ url('api/map_api') }}/"+ fromLat + "/" + toLat + "/" + fromLng + "/" + toLng,
                    success: function(result) {
                            //remove markers everytime reload
                            var subArray = [];
               
                            result.forEach(myFunction);

                            function myFunction(item, index) {
                            
                                subArray = [
                                    {lat: JSON.parse(item.lat), lng: JSON.parse(item.lng)}
                                ];

                                console.log(subArray);

                               
                                        
                        // Create an array of alphabetical characters used to label the markers.
                        const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                        const locations = [{ lat: -31.56391, lng: 147.154312} ,{ lat: -33.718234, lng: 150.363181},{lat: -33.727111,lng: 150.371124}];


                    



                // console.log(locations);
            
             // Add some markers to the map.
             const markers = locations.map((position, i) => {

                const label = labels[i % labels.length];

                const marker = new google.maps.Marker({
                    position,
                    label,
                });
                
         
                // markers can only be keyboard focusable when they have click listeners
                // open info window when marker is clicked
               marker.addListener("click", () => {
                    infoWindow.open({
                        anchor: marker,
                                map,
                                shouldFocus: false,
                    });
                });
                return marker;
            });
                  
          
           
             


           // Add a marker clusterer to manage the markers.
         const markerCluster = new markerClusterer.MarkerClusterer({
        map,
        markers
    });  


                               
                   

        }
                        
                // console.log("after change");
                // console.log(obj);





            }




        });

        //ajax end here

         
    }); //dragend event end here

      

 
   //Geolocation finder -(Your Location)
   const locationButton = document.createElement("button");

locationButton.textContent = "Pan to Current Location";
locationButton.classList.add("custom-map-control-button");
map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
locationButton.addEventListener("click", () => {
// Try HTML5 geolocation.
if (navigator.geolocation) {
   navigator.geolocation.getCurrentPosition(
       (position) => {
       const pos = {
           lat: position.coords.latitude,
           lng: position.coords.longitude,
       };

       infoWindow.setPosition(pos);
       infoWindow.setContent("Location found.");
       infoWindow.open(map);
       map.setCenter(pos);
       },
       () => {
       handleLocationError(true, infoWindow, map.getCenter());
       }
   );
   } else {
   // Browser doesn't support Geolocation
   handleLocationError(false, infoWindow, map.getCenter());
   }
});
    

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                ? "Error: The Geolocation service failed."
                : "Error: Your browser doesn't support geolocation."
            );
        }
 



        }



      

       
           
    </script>
    


    @endpush


    @section('content')

    @include('frontend.includes.search')

    <div id="map" style="height:800px;"></div>

     <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
     <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&amp;callback=initMap" type="text/javascript"></script>
     @endsection

