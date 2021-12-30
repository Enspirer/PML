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
        var marker = [];
        $.ajax({
            type: "GET",
            url: "{{ url('api/map_api')  }}",
            success: function(data) {
                /*map marker and clustering start here*/
                const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
                const place = data;
                    // Add some markers to the map.
                    const markers = place.map((position, i) => {
                            const label = labels[i % labels.length];
                            const marker = new google.maps.Marker({
                            position,
                            label,
                            });

                           console.log(data[i].id);


                            // markers can only be keyboard focusable when they have click listeners
                            // open info window when marker is clicked
                            marker.addListener("click", () => {
                                alert(data[i].id);

                                const infoWindow = new google.maps.InfoWindow({
                                    content: '<div class="card custom-shadow">' +
                                    '<img src="http://propertymarketlive.com/img/frontend/index/1.png" alt="" class="img-fluid w-100" style="height: 5rem; object-fit: cover;">' +
                                        '<div class="card-body text-center">' +
                                        '<h5 class="fw-bold">'+  +'</h5>' +
                                            '<p>'+ data[i].description + '</p>' +
                                        '<p>3<i class="fas fa-bed ms-2 me-3" aria-hidden="true"></i> 5<i class="fas fa-bath ms-2" aria-hidden="true"></i></p>' +
                                           + '</div>' + '</div>',
                                    disableAutoPan: true,
                                });

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

                        /*map marker and clustering ends here*/


                // var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            }
        });

        /*ajax end here*/

        // Create an array of alphabetical characters used to label the markers.
     

        
    }



    //google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap">
</script>
