<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container position-relative">
    <a class="navbar-brand text-white position-absolute" href="{{ route('frontend.index') }}"><img src="{{ url('img/frontend/logo.png') }}" alt="" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0 active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="{{ route('frontend.for_sale') }}">For Sale</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="#">For Rent</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="#">Lands</a>
        </li>
        <li class="nav-item px-4 border-end">
          <a class="nav-link fw-bold p-0" href="#">New Development</a>
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
            <a class="login fw-bold d-inline-block me-4 text-decoration-none" href="{{ route('frontend.auth.login') }}">Login</a>

            <a class="register fw-bold d-inline-block border px-4 text-decoration-none" href="{{ route('frontend.auth.register') }}">Register</a>
        </div>
        
        

        <select name="" id="" class="form-control position-absolute">
            <option value="">Select Country</option>
        </select>
    </div>
  </div>
</nav>