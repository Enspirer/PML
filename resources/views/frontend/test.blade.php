<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #map {
        height: 500px;
        width: 100%;
    }
    </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- map links -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>



    <script>
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: {
                lat: -28.024,
                lng: 140.887
            },
        });


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

         
         
                    $.ajax({
                        url: "{{ url('api/map_api') }}/"+ fromLat + "/" + toLat + "/" + fromLng + "/" + toLng,
                        success: function(result) {
                            console.log(result);
                        }
                    });
      
      

        

        });




    }
    </script>


    <!--  -->






</head>

<body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script async="" defer=""
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&amp;callback=initMap"
        type="text/javascript"></script>
</body>

</html>