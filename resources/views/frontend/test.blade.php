<style>
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #map-canvas {
        height: 100%;
    }

</style>

<div id="map-canvas"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap">
</script>

<script>
    var mapDiv;

    function initMap() {
        mapDiv = document.getElementById('map-canvas');

        var map = new google.maps.Map(mapDiv, {
            center: new google.maps.LatLng(53.3427371467871, -6.25911712396487),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}] // "Subtle Grayscale" style found on snazzymaps.com

        });



        var marker = [];


        $.ajax({
            type: "GET",
            url: "{{ url('api/map_api')  }}",
            success: function(data) {
                var markerCoords = data;
                var markers = [];
                var marker;
                for (var i = 0, len = markerCoords.length; i < len; i++){
                    marker = new google.maps.Marker({position: new google.maps.LatLng(markerCoords[i][0], markerCoords[i][1])});
                    markers.push(marker);
                }
                var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

            }
        });

    }



    //google.maps.event.addDomListener(window, 'load', initialize);
</script>