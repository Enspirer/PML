<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ getBaseURL() }}">
    <meta name="file-base-url" content="{{ getFileBaseURL() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aa4e69f91b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
    </link>

    <link rel="stylesheet" href="{{url('css/aiz-core.css')}}">
    <link rel="stylesheet" href="{{url('css/vendors.css')}}">

    <script>
    var AIZ = AIZ || {};
    AIZ.local = {

        nothing_selected: 'Nothing selected',
        nothing_found: 'Nothing found',
        choose_file: 'Choose file',
        file_selected: 'File selected',
        files_selected: 'Files selected',
        add_more_files: 'Add more files',
        adding_more_files: 'Adding more files',
        drop_files_here_paste_or: 'Drop files here, paste or',
        browse: 'Browse',
        upload_complete: 'Upload complete',
        upload_paused: 'Upload paused',
        resume_upload: 'Resume upload',
        pause_upload: 'Pause upload',
        retry_upload: 'Retry upload',
        cancel_upload: 'Cancel upload',
        uploading: 'Uploading',
        processing: 'Processing',
        complete: 'Complete',
        file: 'File',
        files: 'Files',
    }
    </script>



<script>

var marker = false;
        
function searchAddress() {
    
    const input = document.getElementById("search");
    const search = new google.maps.places.SearchBox(input);
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // Bias the SearchBox results towards current map's viewport.
    // map.addListener("bounds_changed", () => {
    //     input.setBounds(map.getBounds());
    // });
    let markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    search.addListener("places_changed", () => {
        const places = input.getPlaces();

        if (places.length == 0) {
        return;
        }
        // Clear out the old markers.
        markers.forEach((marker) => {
        marker.setMap(null);
        });
        markers = [];
        // For each place, get the icon, name and location.
        const bounds = new google.maps.LatLngBounds();
        places.forEach((place) => {
        if (!place.geometry || !place.geometry.location) {
            console.log("Returned place contains no geometry");
            return;
        }
        const icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25),
        };
        // Create a marker for each place.
        markers.push(
            new google.maps.Marker({
            map,
            icon,
            title: place.name,
            position: place.geometry.location,
            })
        );

        if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
        } else {
            bounds.extend(place.geometry.location);
        }
        });
        map.fitBounds(bounds);
    });

}


</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=searchAddress&libraries=places&v=weekly&channel=2"
type="text/javascript"></script>

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/frontend.css')) }}

    @stack('after-styles')
</head>

<body>
    @include('includes.partials.read-only')

    <div id="app">
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')

        <div>
            @include('includes.partials.messages')
            @yield('content')
        </div><!-- container -->
        @include('frontend.includes.footer')
    </div><!-- #app -->

    
    @if(\Session::has('subscribe'))
    
        <div class="modal fade" id="subModal" tabindex="-1" aria-labelledby="subModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem">
                        <h4 class="text-center">Submitted Successfully!</h4>
                        <!-- <h5>Email Alert Sent</h5> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif    

    <!-- Add Property Popup -->
    <div class="modal fade" id="addPropertyPopup" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <button type="button" class="add-property-close" data-dismiss="modal"><i class="fas fa-times"></i></button> 
                    <h2>Welcome to Property market Live</h2>
                    <div class="row">
                        <div class="img-txt-wrapper">
                            <img src="{{ url('img/frontend/add-property/quality.png') }}" alt="">
                            <h4>Uploading a property is completely <b>free</b>.</h4>
                        </div>
                        <div class="add-property-list-wrapper">
                            <ul class="add-property-list">
                                <li>
                                    <div class="list-icon-wrapper">
                                    <i class="fas fa-chevron-right"></i>
                                    </div>
                                    Complete the fields in the upload form and get your property published for property seekers around the world.</li>
                                    <li>
                                    <div class="list-icon-wrapper">
                                    <i class="fas fa-chevron-right"></i>
                                    </div>
                                    Our team will review and approve your property within 24 hours.</li>
                            </ul>
                        </div>

                    </div>
                    <div class="row">
                        <div class="img-txt-wrapper">
                            <img src="{{ url('img/frontend/add-property/quality-1.png') }}" alt="">
                            <h4><b>Premium</b> property</h4>
                        </div>
                        <div class="add-property-list-wrapper">
                            <ul class="add-property-list">
                                <li>
                                    <div class="list-icon-wrapper">
                                    <i class="fas fa-chevron-right"></i>
                                    </div>
                                    360 Virtual tour or Videos can be uploaded for a better user experience
Please fill up the form and one of our agents will be in touch with you.
</li>
                            </ul>
                        </div>

                    </div>
                    <div class="row">
                        <div class="img-txt-wrapper">
                            <img src="{{ url('img/frontend/add-property/seller.png') }}" alt="">
                            <h4>Become an Agent</h4>
                        </div>
                        <div class="add-property-list-wrapper">
                            <ul class="add-property-list">
                                <li>
                                    <div class="list-icon-wrapper">
                                    <i class="fas fa-chevron-right"></i>
                                    </div>
                                    We are a global marketplace for properties, join our dynamic team of Real Estate professionals to achieve a rewarding career
                                   </li>
                                    
                            </ul>
                        </div>

                    </div>

                    <a href="{{ route('frontend.add-property') }}" class="get-started">Get Started</a>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    <!-- This JS commented because it conflicts other JS files -->
    <!-- {!! script(mix('js/frontend.js')) !!} -->

    <script>       
        $(document).ready(function(){
            $("#subModal").modal();
        });
    </script>

    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("overlay").style.display = "block";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("overlay").style.display = "none";
    }
    </script>

    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

    <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    })
    </script>

    <script src="{{url('js/vendors.js')}}"></script>
    <script src="{{url('js/aiz-core.js')}}"></script>

    <script>
    $(document).ready(function() {
        $('#search-word').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{url('/')}}/api/fetch",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search-result').fadeIn();
                        $('#search-result').html(data);
                    }
                })
            }
        });

        $(document).on('click', 'li', function() {
            $('#search-word').val($(this).text());
            $('#search-result').fadeOut();

        })

    });
    </script>


    <script>
    function showHideDiv() {
        // var srcElement = document.getElementById("navbarDropdownMenuLink");
        // if (srcElement != null) {
        //     if (srcElement.style.display == "block") {
        //         srcElement.style.display = 'none';
        //     }
        //     else {
        //         srcElement.style.display = 'block';
        //     }
        //     return false;
        // }
        var x = document.getElementById("drop-menu");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

    }

    function showHideDivMobile() {
        // var srcElement = document.getElementById("navbarDropdownMenuLink");
        // if (srcElement != null) {
        //     if (srcElement.style.display == "block") {
        //         srcElement.style.display = 'none';
        //     }
        //     else {
        //         srcElement.style.display = 'block';
        //     }
        //     return false;
        // }
        var x = document.getElementById("drop-menu-mobile");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

    }
    </script>

    <!-- Main menu function -->
    <script>
    function mainMenuFunction() {
        var x = document.getElementById("contentMenu");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function closeMenu() {
        var x = document.getElementById("contentMenu");
        if (x.style.display === "block") {
            x.style.display = "none";
        }
    }
    </script>

    @stack('after-scripts')

    @include('includes.partials.ga')
</body>

</html>