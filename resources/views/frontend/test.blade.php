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
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

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


        const contentString = ` <div id="content">
                <h2>This is popup content</h2>
                <img src="hill.jpg" alt="">
            </div>`;

            const infoWindow = new google.maps.InfoWindow({
                content: contentString,
                disableAutoPan: true,
            });




        var marker = [];


        $.ajax({
            type: "GET",
            url: "{{ url('api/map_api')  }}",
            success: function(data) {
           
        
           
const myArr = JSON.parse(data);
              
            
            
                const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 

const place = [
        {id: 1, lat: -61.56391, lng: 47.154312, bed: "5", bathrrom: "3"},
        {id:2, lat: -63.727111, lng: 50.371124, bed: "4", bathrrom: "2" },
        {id:2, lat: -53.727111, lng: 50.371124, bed: "4", bathrrom: "2" },
    ]



    console.log(myArr);

 // Add some markers to the map.
 const markers = data.map((position, i) => {
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


                // var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }
        });

        // Create an array of alphabetical characters used to label the markers.
     

        
    }



    //google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap">
</script>
