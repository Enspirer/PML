<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container position-relative">
    <a class="navbar-brand text-white position-absolute" href="{{ route('frontend.index') }}">
        <img src="{{ url('logo.gif') }}" alt="" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == '' ? 'active' : null }}" aria-current="page" href="{{ route('frontend.index') }}">Home</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'for-sale' ? 'active' : null }}" href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'sale', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city'] )}}">For Sale</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'for-rent' ? 'active' : null }}" href="{{ route('frontend.for_sale', ['key_name', 'min_price', 'max_price', 'rent', 'property_type', 'beds', 'baths', 'land_size', 'listed_since', 'building_type', 'open_house', 'zoning_type', 'units', 'building_size', 'farm_type', 'parking_type', 'city'] )}}">For Rent</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'lands' ? 'active' : null }}" href="{{ route('frontend.lands') }}">Lands</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'new-development' ? 'active' : null }}" href="{{ route('frontend.new_development') }}">New Development</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'finance' ? 'active' : null }}" href="#">Finance</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'agents' ? 'active' : null }}" href="{{ route('frontend.agents') }}">Agents</a>
        </li>
        <li class="nav-item ps-4 pe-0">
          <a class="nav-link fw-bold p-0 {{ Request::segment(1) == 'contact-us' ? 'active' : null }}" href="{{ route('frontend.contact_us') }}">Contact Us</a>
        </li>
      </ul>

        @auth
            <div class="log-reg position-absolute" style="top: -4.1rem">
                <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end text-white" href="{{url('favourites')}}"><i class="far fa-heart me-2"></i> Wish List</a>

                <a class="nav-link dropdown-toggle d-inline-block ps-4 mb-4" href="{{route('frontend.auth.login')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ url('img/frontend/user.jpg') }}" class="rounded-circle" style="height: 50px; width: 50px; margin-right: 1.4rem;"> <span class="text-white fw-bold user-name">{{auth()->user()->first_name}}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('frontend.user.dashboard') }}">My Account</a>
                  <a class="dropdown-item" href="">My Settings</a>
                  <!-- <a class="dropdown-item" href="">My Notification Settings</a> -->
                  <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}" style="border-bottom: none">Log Out</a>
                </div>
            </div>

            <select name="" id="" class="position-absolute me-3" style="top: -2.9rem; right: 20rem;">
                <option value="">Select Your Country</option>
            </select>
        @else

            <div class="log-reg position-absolute">
                <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end" href="{{ route('frontend.auth.login') }}"><i class="far fa-heart me-2"></i> Wish List</a>
                
                <a class="login fw-bold d-inline-block px-4 text-decoration-none" href="{{ route('frontend.auth.login') }}">Login</a>

                <a class="register fw-bold d-inline-block border px-4 text-decoration-none" href="{{ route('frontend.auth.register') }}">Register</a>
            </div>

            <select name="" id="" class="position-absolute me-3">
                <option value="">Select Your Country</option>
            </select>
        @endauth
    </div>
  </div>
</nav>