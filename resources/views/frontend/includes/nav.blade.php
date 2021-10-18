<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container position-relative">
    <a class="navbar-brand text-white position-absolute" href="{{ route('frontend.index') }}"><img src="{{ url('img/frontend/logo.png') }}" alt="" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 active" aria-current="page" href="{{ route('frontend.index') }}">Home</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="{{ route('frontend.for_sale') }}">For Sale</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="#">For Rent</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="{{ route('frontend.lands') }}">Lands</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="{{ route('frontend.new_development') }}">New Development</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="#">Finance</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="#">Agents</a>
        </li>
        <li class="nav-item ps-4 pe-0">
          <a class="nav-link fw-bold p-0" href="#">Contact Us</a>
        </li>

        <div class="log-reg position-absolute">
            <a class="wishlist fw-bold d-inline-block px-4 text-decoration-none border-start border-end" href=""><i class="far fa-heart me-2"></i> Wish List</a>


            @auth
                <a class="nav-link dropdown-toggle d-inline-block ps-4" href="{{route('frontend.auth.login')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ url('img/frontend/user.png') }}" class="rounded-circle me-2" style="height: 50px; width: 50px"> <span class="text-white fw-bold user-name">{{auth()->user()->first_name}}</span>
                  </a>
                  <div class="dropdown-menu text-light" aria-labelledby="navbarDropdownMenuLink" style="background-color: #4195E1">
                    <a class="dropdown-item text-light" href="">My Account</a>
                    <a class="dropdown-item text-light" href="">My Settings</a>
                    <a class="dropdown-item text-light" href="">Log Out</a>
                  </div>
            @else
                <a class="login fw-bold d-inline-block px-4 text-decoration-none" href="{{ route('frontend.auth.login') }}">Login</a>

                <a class="register fw-bold d-inline-block border px-4 text-decoration-none" href="{{ route('frontend.auth.register') }}">Register</a>
            @endauth

            
        </div>
        
        <select name="" id="" class="position-absolute me-3">
            <option value="">Select Your Country</option>
        </select>
    </div>
  </div>
</nav>