<nav class="navbar navbar-expand-lg navbar-light fixed-top hidden-xs">
    <div class="container position-relative">
        <a class="navbar-brand text-white position-absolute" href="{{ route('frontend.index') }}">
            <img src="{{ url('logo.gif') }}" alt="" class="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-4 border-end">
                    <a class="nav-link fw-bold p-0 {{ Request::segment(1) == '' ? 'active' : null }}"
                        aria-current="page" href="{{ route('frontend.index') }}">Home</a>
                </li>
                <li class="nav-item px-4 border-end">
                    <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'for-sale' ? 'active' : null }}"
                        href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'sale', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">For
                        Sale</a>
                </li>
                <li class="nav-item px-4 border-end">
                    <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'for-rent' ? 'active' : null }}"
                        href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'rent', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">For
                        Rent</a>
                </li>

                @if(App\Models\PropertyType::where('id',get_settings('menu_type_1'))->first() != null)
                <li class="nav-item px-4 border-end">
                    <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'new-development' ? 'active' : null }}"
                        href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', App\Models\PropertyType::where('id',get_settings('menu_type_1'))->first()->id, 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">{{App\Models\PropertyType::where('id',get_settings('menu_type_1'))->first()->property_type_name}}</a>
                </li>
                @endif
                @if(App\Models\PropertyType::where('id',get_settings('menu_type_2'))->first() != null)
                <li class="nav-item px-4 border-end">
                    <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'new-development' ? 'active' : null }}"
                        href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', App\Models\PropertyType::where('id',get_settings('menu_type_2'))->first()->id, 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">{{App\Models\PropertyType::where('id',get_settings('menu_type_2'))->first()->property_type_name}}</a>
                </li>
                @endif
                @if(App\Models\PropertyType::where('id',get_settings('menu_type_3'))->first() != null)
                <li class="nav-item px-4 border-end">
                    <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'new-development' ? 'active' : null }}"
                        href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', App\Models\PropertyType::where('id',get_settings('menu_type_3'))->first()->id, 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">{{App\Models\PropertyType::where('id',get_settings('menu_type_3'))->first()->property_type_name}}</a>
                </li>
                @endif

                <!-- <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'lands' ? 'active' : null }}" href="{{ route('frontend.lands') }}">Lands</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'new-development' ? 'active' : null }}" href="{{ route('frontend.new_development') }}">New Development</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'finance' ? 'active' : null }}" href="#">Finance</a>
        </li> -->

                <li class="nav-item px-4 border-end">
                    <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'find-agent' ? 'active' : null }}"
                        href="{{ route('frontend.find-agent', ['country','area', 'agent_type', 'agent_name'] )}}">Agents</a>
                </li>

                <li class="nav-item ps-4 pe-0">
                    <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'contact-us' ? 'active' : null }}"
                        href="{{ route('frontend.contact_us') }}">Contact Us</a>
                </li>
            </ul>

            @auth
            <div class="log-reg position-absolute" style="top: -4.1rem">
                <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end text-white wishlist-border-none"
                    href="{{url('favourites')}}"><i class="far fa-heart me-2"></i> Wish List</a>

                <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end text-white"
                    href="{{url('user_notifications')}}"><i class="far fa-bell me-2"></i> Notifications
                    ({{App\Models\Notifications::where('user_id',auth()->user()->id)->where('status','Pending')->get()->count()}})</a>

                <!-- <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end" href="{{ route('frontend.auth.login') }}"><i class="far fa-heart me-2"></i> Second List</a> -->

                <a onclick="showHideDiv()" class="nav-link dropdown-toggle d-inline-block ps-4 mb-4"
                    href="{{route('frontend.auth.login')}}" id="navbarDropdownMenuLink" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ url('img/frontend/user.jpg') }}" class="rounded-circle"
                        style="height: 50px; width: 50px; margin-right: 1.4rem;"> <span
                        class="text-white fw-bold user-name">{{auth()->user()->first_name}}</span>
                </a>
                <div id="drop-menu" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('frontend.user.dashboard') }}">My Account</a>
                    <!-- <a class="dropdown-item" href="">My Settings</a> -->
                    <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}" style="border-bottom: none">Log
                        Out</a>
                </div>

                <!-- User Dropdown -->
                <!-- <div class="dropdown-container">
                    <div class="dropdown-toggle click-dropdown">
                        DropDown Menu
                    </div>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="#">DropDown Menu Item 1</a></li>
                            <li><a href="#">DropDown Menu Item 2</a></li>
                            <li><a href="#">DropDown Menu Item 3</a></li>
                            <li><a href="#">DropDown Menu Item 4</a></li>
                        </ul>
                    </div>
                </div> -->



                <!-- <a class="add-property-btn fw-bold d-inline-block border px-4 text-decoration-none"
                    href="{{ route('frontend.pre_listing') }}">Add Property</a> -->

                <a class="add-property-btn fw-bold d-inline-block border px-4 text-decoration-none" href=""
                    data-toggle="modal" data-target="#addPropertyPopup">Add Property</a>

            </div>

            <!-- <select name="" id="" class="position-absolute me-3" style="top: -2.9rem; right: 20rem;">
                <option value="">Select Your Country</option>
            </select> -->
            @else

            <div class="log-reg position-absolute">
                <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end"
                    style="border-right:0px!important;" href="{{ route('frontend.favourite_cookie_properties') }}"><i
                        class="far fa-heart me-2"></i> Wish List</a>
                <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end text-white"
                    href="{{route('frontend.auth.login')}}"><i class="far fa-bell me-2"></i> Notifications</a>

                <!-- <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end" href="{{ route('frontend.auth.login') }}"><i class="far fa-heart me-2"></i> Second List</a> -->

                <a class="register fw-bold d-inline-block border px-4 text-decoration-none"
                    href="{{ route('frontend.auth.login') }}">Login</a>

                <a class="register fw-bold d-inline-block border px-4 text-decoration-none"
                    href="{{ route('frontend.auth.register') }}">Register</a>

                <a class="add-property-btn fw-bold d-inline-block border px-4 text-decoration-none"
                    href="{{ route('frontend.auth.login') }}">Add Property</a>

            </div>

            @endauth


            @if(isset(get_country_cookie(request())->country_id))

            <form action="{{route('frontend.country_change')}}" method="post">
                {{csrf_field()}}

                <select name="countries_list" class="position-absolute me-3" onchange="this.form.submit()">
                    <option value="" selected disabled>Select Your Country</option>

                    @foreach($tpr_countries as $tpr_country)
                    <option value="{{ $tpr_country->country_id }}"
                        {{ get_country_cookie(request())->country_id == $tpr_country->country_id ? "selected" : "" }}>
                        {{ $tpr_country->country_name }}</option>
                    @endforeach

                </select>

            </form>
            @else

            <form action="{{route('frontend.country_change')}}" method="post" class="filter-form">
                {{csrf_field()}}

                <select name="countries_list" class="position-absolute me-3" onchange="this.form.submit()">
                    <option value="" selected disabled>Select Your Country</option>

                    @foreach($tpr_countries as $tpr_country)
                    <option value="{{ $tpr_country->country_id }}">{{ $tpr_country->country_name }}</option>
                    @endforeach

                </select>

            </form>
            @endif


        </div>
    </div>
</nav>



<!-- mobile navigation -->
<div id="mySidenav" class="sidenav visible-xs">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <ul class="nav nav-tabs mobile-tab-list" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active mobile-nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link mobile-nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mobile-nav-tab" id="home" role="tabpanel" aria-labelledby="home-tab">
            <a href="{{ route('frontend.index') }}">Home</a>
            <a
                href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'sale', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">For
                Sale</a>
            <a
                href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'rent', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">For
                Rent</a>
            @if(App\Models\PropertyType::where('id',get_settings('menu_type_1'))->first() != null)
            <a
                href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', App\Models\PropertyType::where('id',get_settings('menu_type_1'))->first()->id, 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">{{App\Models\PropertyType::where('id',get_settings('menu_type_1'))->first()->property_type_name}}</a>
            @endif
            @if(App\Models\PropertyType::where('id',get_settings('menu_type_2'))->first() != null)
            <a
                href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', App\Models\PropertyType::where('id',get_settings('menu_type_2'))->first()->id, 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">{{App\Models\PropertyType::where('id',get_settings('menu_type_2'))->first()->property_type_name}}</a>
            @endif
            @if(App\Models\PropertyType::where('id',get_settings('menu_type_3'))->first() != null)
            <a
                href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'transaction_type', App\Models\PropertyType::where('id',get_settings('menu_type_3'))->first()->id, 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city', 'long', 'lat', 'area_coordinator'] )}}">{{App\Models\PropertyType::where('id',get_settings('menu_type_3'))->first()->property_type_name}}</a>
            @endif
            <a href="{{ route('frontend.find-agent', ['country','area', 'agent_type', 'agent_name'] )}}">Agents</a>
            <a href="{{ route('frontend.contact_us') }}">Contact Us</a>
        </div>


        <div class="tab-pane fade profile-nav mobile-nav-tab" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">

            @if(isset(get_country_cookie(request())->country_id))

            <form action="{{route('frontend.country_change')}}" method="post" style="margin-bottom:25px;">
                {{csrf_field()}}

                <select name="countries_list" class="position-absolute me-3 mobile-country-list" onchange="this.form.submit()">
                    <option value="" selected disabled>Select Your Country</option>

                    @foreach($tpr_countries as $tpr_country)
                    <option value="{{ $tpr_country->country_id }}"
                        {{ get_country_cookie(request())->country_id == $tpr_country->country_id ? "selected" : "" }}>
                        {{ $tpr_country->country_name }}</option>
                    @endforeach

                </select>

            </form>
            @else

            <form action="{{route('frontend.country_change')}}" method="post" class="filter-form" style="margin-bottom:25px;">
                {{csrf_field()}}

                <select name="countries_list" class="position-absolute me-3 mobile-country-list" onchange="this.form.submit()">
                    <option value="" selected disabled>Select Your Country</option>

                    @foreach($tpr_countries as $tpr_country)
                    <option value="{{ $tpr_country->country_id }}">{{ $tpr_country->country_name }}</option>
                    @endforeach

                </select>

            </form>

            @endif

            @auth

            <a class="wishlist wishlist-border-none fw-bold d-inline-block px-4 text-decoration-none border-start border-end mobiile-wish-list-btn"
                href="{{url('favourites')}}"><i class="far fa-heart me-2"></i> Wish List</a>





            <!-- <a class="add-property-btn fw-bold d-inline-block border px-4 text-decoration-none"
                    href="{{ route('frontend.pre_listing') }}">Add Property</a> -->
            <a class="add-property-btn fw-bold d-inline-block border px-4 text-decoration-none" href=""
                data-toggle="modal" data-target="#addPropertyPopup">Add Property</a>

            @else

            <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end mobiile-wish-list-btn wishlist-border-none"
                href="{{route('frontend.favourite_cookie_properties')}}"><i class="far fa-heart me-2"></i> Wish List</a>




            <a class="register fw-bold d-inline-block border px-4 text-decoration-none"
                href="{{ route('frontend.auth.login') }}">Login</a>

            <a class="register fw-bold d-inline-block border px-4 text-decoration-none"
                href="{{ route('frontend.auth.register') }}">Register</a>


            <a class="add-property-btn fw-bold d-inline-block border px-4 text-decoration-none"
                href="{{ route('frontend.auth.login') }}">Add Property</a>

            @endauth

        </div>

    </div>

</div>

<div class="top-row-wrapper visible-xs">
    <span style="font-size:30px;cursor:pointer" class="mobile-menu-toggle" onclick="openNav()">&#9776;</span>
    <div class="mobile-logo-wrapper">
        <a href="{{ route('frontend.index') }}">
            <img class="mobile-logo" src="{{ url('logo.gif') }}" alt="">
        </a>
    </div>

    <!-- notifications -->
    @auth
    <a style="position:relative;border:0px !important; padding-left:0px !important; padding-right:0px !important;"
        class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end mobile-bell-area"
        href="{{url('user_notifications')}}"><i class="far fa-bell me-2 mobile-bell-icon"></i><span
            class="mobile-noti-counter">({{App\Models\Notifications::where('user_id',auth()->user()->id)->where('status','Pending')->get()->count()}})</span></a>
    @else
    <a style="position:relative;border:0px !important; padding-left:0px !important; padding-right:0px !important;"
        class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end mobile-bell-area"
        href="{{route('frontend.auth.login')}}"><i class="far fa-bell me-2 mobile-bell-icon"></i></a>
    @endauth

    @auth
    <!-- user login styles -->
    <div  class="profile-wrapper">
        <a onclick="showHideDivMobile()" class="nav-link dropdown-toggle d-inline-block ps-4 mb-4 mobile-profile"
            href="{{route('frontend.auth.login')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="{{ url('img/frontend/user.jpg') }}" class="rounded-circle"
                style="height: 50px; width: 50px; margin-right: 1.4rem;">

        </a>
        <div id="drop-menu-mobile" class="dropdown-menu mobile-drop-menu" aria-labelledby="navbarDropdownMenuLink" >
            <a class="dropdown-item" href="{{ route('frontend.user.dashboard') }}">My Account</a>
            <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}" style="border-bottom: none">Log
                Out</a>
        </div>
        <!-- end of user login styles -->
    </div>

    @endauth
</div>