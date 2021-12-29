
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google Map server side Markers clustering</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://demo.noxls.net/google-map-clustering-v3//static/plugins/leaflet-sidebar/css/gmaps-sidebar.min.css">
    <link type="text/css" rel="stylesheet" href="https://demo.noxls.net/google-map-clustering-v3//static/css/style.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://demo.noxls.net/google-map-clustering-v3//static/plugins/leaflet-sidebar/js/jquery-sidebar.js"></script>
    <script src="https://demo.noxls.net/google-map-clustering-v3//static/js/jquery.form.js" type="text/javascript"></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-58NHVD8');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<div id="sidebar" class="sidebar collapsed">
    <!-- Nav tabs -->
    <div class="sidebar-tabs">
        <ul role="tablist">
            <li><a href="#home" role="tab"><i class="fa fa-filter"></i></a></li>
        </ul>
    </div>
    <!-- Tab panes -->
    <div class="sidebar-content">
        <!--        <form style="display: block;">-->
        <div class="sidebar-pane" id="home">
            <h1 class="sidebar-header">
                Filter                        <span class="sidebar-close"><i class="fa fa-caret-left"></i></span>
            </h1>
            <div class="panel-body">
                <label>
                    <input checked="checked" onclick="nxIK.chackboxSelectAll(this);
                        checkboxClicked();" type="checkbox" name="check_all" id="check_all" value="-1"> Check All                        </label>
                <div class="checkbox" style="height: 880px; overflow-y: scroll;">
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="2"> 
                        <img src="{{ url('img/frontend/map/icons/2.png') }}" alt="unknown" title="unknown"> unknown</label>
                    <br>
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="3"> 
                        <img src="{{ url('img/frontend/map/icons/3.png') }}" alt="station" title="station"> station                                </label>
                    <br>
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="4"> 
                        <img src="{{ url('img/frontend/map/icons/4.png') }}" alt="port" title="port"> port                                </label>
                    <br>
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="5"> 
                        <img src="{{ url('img/frontend/map/icons/5.png') }}" alt="zb" title="zb"> zb                                </label>
                    <br>
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="14"> 
                        <img src="{{ url('img/frontend/map/icons/14.png') }}" alt="Building" title="Building"> Building                                </label>
                    <br>
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="15"> 
                        <img src="{{ url('img/frontend/map/icons/15.png') }}" alt="Gas Station" title="Gas Station"> Gas Station                                </label>
                    <br>
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="22"> 
                        <img src="{{ url('img/frontend/map/icons/22.png') }}" alt="banc" title="banc"> banc                                </label>
                    <br>
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="23"> 
                        <img src="{{ url('img/frontend/map/icons/22.png') }}" alt="aaa" title="aaa"> aaa                                </label>
                    <br>
                    <label style="margin-right: 9px; margin-bottom: 10px;">
                        <input checked="checked" onclick="checkboxClicked();" type="checkbox" value="24"> 
                        <img src="{{ url('img/frontend/map/icons/22.png') }}" alt="aaa" title="aaa"> aaa                                </label>
                    <br>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<nav class="navbar navbar-inverse navbar-static-top mb0">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://demo.noxls.net/google-map-clustering-v3/">
                Ports Of The World                    </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="navbar-offcanvas offcanvas">
                <ul class="nav navbar-nav">

                    <li ><a href="https://demo.noxls.net/google-map-clustering-v3/add.php">Add Port</a></li>
                </ul>
                <ul class="nav navbar-right">

                    <ul class="nav navbar-nav navbar-right">
                        <li >
                            <a href="https://demo.noxls.net/google-map-clustering-v3/login.php">Login</a></li>
                        <!--button type="button" class="btn btn-success mt10" onclick="window.location='/products/checkout/google-map-clustering'">Purchase Now!</button-->
                        <button type="button" class="btn btn-success mt10" onclick="window.location='https://noxls.net/products/google-map-clustering'">Back to Item</button>
                    </ul>

                </ul>
            </div>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9 col-md-9 map">
            <div class="google-map-canvas" id="nxIK_map"></div>
        </div>
        <div class="col-lg-3" id="list-column">
            <div class="panel panel-primary  ">
                <div class="panel-heading">Latest Added Ports</div>
                <div class="panel-body">
                    <div class="row">
                        <form class="navbar-form navbar-left form-inline"  role="search" action="https://demo.noxls.net/google-map-clustering-v3/manage.php">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="search" class="form-control" width="250" id="search" name="search_text" value="" placeholder="Search text">
                                    <span class="input-group-btn">
                                                    <button class="btn btn-default" id="clear-search-btn" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                                                </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <ul class="list-group">
                    <li class='list-group-item'>
                        <a href="#" class="btn btn-default" id="list-markers-prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a href="#" class="btn btn-default" id="list-markers-next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        <span id="pager-info"></span>
                    </li></ul>
                <ul id="markers-list" class="list-group"></ul>
            </div>
        </div>
    </div>
</div>
<div class="modal right fade" id="right-sidebar" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-primary">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title facility" id="marker_title"></h4>
            </div>
            <div class="modal-body">
                <div class="mb-1 text-muted" id="marker-date-add"></div>
                <div id="marker-image"></div>
                <div></div>
                <div id="marker-description"></div>
            </div>
            <div class="modal-footer">
                <div id="social-buttons"></div>
            </div>
        </div>
    </div>
</div>
<script lang="javascript">
    var SITE_DOMAIN = 'http://localhost:8000/';
    var HTTP_APP_PATH = 'http://localhost:8000/';
    var ZOOM = 5;
    var MAP_CENTER_LAT = 40.45;
    var MAP_CENTER_LNG = -98.52;
    var MARKERS_CLUSTERIZE_2 = 10;
    var MARKERS_CLUSTERIZE_3 = 50;
    var MARKERS_CLUSTERIZE_4 = 100;
    var MARKERS_CLUSTERIZE_5 = 300;
    var MAP_SETTINGS = {"jsonGetMarkerUrl":"http:\/\/localhost:8000\/api\/test-markers","jsonMarkerUrl":"http:\/\/localhost:8000\/api\/test-markers","jsonGetMarkerInfoUrl":"http:\/\/localhost:8000\/api\/test-markers","jsonMarkerInfoUrl":"http:\/\/localhost:8000\/api\/test-markers","clusterImage":{"src":"http:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/cluster2.png","height":60,"width":60,"offsetH":30,"offsetW":30},"pinImage":{"2":{"type_name":"unknown","src":"http:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/2.png","height":37,"width":32,"offsetH":0,"offsetW":0},"3":{"type_name":"station","src":"https:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/3.png","height":37,"width":32,"offsetH":0,"offsetW":0},"4":{"type_name":"port","src":"https:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/4.png","height":37,"width":32,"offsetH":0,"offsetW":0},"5":{"type_name":"zb","src":"https:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/5.png","height":32,"width":32,"offsetH":0,"offsetW":0},"14":{"type_name":"Building","src":"https:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/14.png","height":37,"width":32,"offsetH":0,"offsetW":0},"15":{"type_name":"Gas Station","src":"https:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/15.png","height":37,"width":32,"offsetH":0,"offsetW":0},"22":{"type_name":"banc","src":"https:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/22.png","height":37,"width":32,"offsetH":0,"offsetW":0},"23":{"type_name":"aaa","src":"https:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/23.","height":0,"width":0,"offsetH":0,"offsetW":0},"24":{"type_name":"aaa","src":"https:\/\/demo.noxls.net\/google-map-clustering-v3\/\/static\/img\/ico\/24.","height":0,"width":0,"offsetH":0,"offsetW":0}},"textErrorMessage":"An error has occured","mapCenterLat":40.45,"mapCenterLon":-98.52,"zoomLevel":5,"min_zoomLevel":1,"max_zoomLevel":21,"alwaysClusteringEnabledWhenZoomLevelLess":2,"map_type_id":"ROADMAP"};
    var LIST_MARKERS_PER_PAGE = 15;
    var MAP_STYLE = [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}];
</script>
<script src="{{url('js/index-normal.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDpIH3JYQy5cayMmoaP1JHpp5jHUwYe0JQ&language=en"></script> 
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<!-- <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&amp;callback=initMap" type="text/javascript"></script> -->
<script type="text/javascript" src="https://demo.noxls.net/google-map-clustering-v3//static/js/mapclustering-normal.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=672501089581601";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<hr>
<div id="footer">
    <div class="container">
        <a href="https://noxls.net"><img src="https://noxls.net/images/logo-small.png"></a> &copy; 2018
    </div>
</div>
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-1398385-23', 'noxls.net');
    ga('send', 'pageview');
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58NHVD8"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</body>
</html>