<!DOCTYPE html>
<html>
  <head>
    <title>Map API</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        #map {
            height: 80%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .custom-map-control-button {
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            padding: 0 0.5em;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
            height: 40px;
            cursor: pointer;
            }
            .custom-map-control-button:hover {
            background: #ebebeb;
        }
    </style>
    <script>

        let map;
        let marker;
        let locationData = [];

        function initMap() {

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: { lat: 20.5937, lng: 78.9629 },
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

          
                    
               
           
                   locationData = result;

                   locationData = [
                   {lat: '6.928351456700409', lng: '79.85454164303229', name: 'Hitlor', description: 'Lorem ipsum dolor sit amet, consectetur adipiscing… qui officia deserunt mollit anim id est laborum.'},
                       {lat: '6.698717247859398', lng: '80.38935484617542', name: 'Wije', description: 'Ratnapura Aparments'}
                   ];
                        

                   
                   

                                      //change the center of map
            // map.setCenter({ lat: 7.8731, lng: 80.7718 });

            const contentString = ` <div id="content">
                <h2>This is popup content</h2>
            </div>`;

            const infoWindow = new google.maps.InfoWindow({
                content: contentString,
                disableAutoPan: true,
            });

            // Create an array of alphabetical characters used to label the markers.
            const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

            // ----------------------locally add Marks to the map---------------------------
            locationData = [
                {lat: 20.5937, lng: 78.9629},
                {lat: 22.5937, lng: 78.9629}
            ];


         
         
       
          
                // Add some markers to the map.
                const markers = locationData.map((position, i) => {
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
            const markerCluster = new markerClusterer.MarkerClusterer({ map, markers });

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




           
                    

            }

        });


     



        


    });


    
           



        }



        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(
                browserHasGeolocation
                ? "Error: The Geolocation service failed."
                : "Error: Your browser doesn't support geolocation."
            );
        }


           
           
    </script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

  </head>
  <body>
    <div id="map"></div>

  

     <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
     <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&amp;callback=initMap" type="text/javascript"></script>
  </body>
</html>
