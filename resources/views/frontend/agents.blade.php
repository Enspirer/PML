@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
    <link href="{{ url('css/agents.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('frontend.includes.search')


    <div class="container index" style="margin-top: 2rem;">
        <div class="row">
            <div class="col-12">
                <p><a href="" class="text-decoration-none text-dark fw-bold">Property Market Live</a> > <a href="" class="text-decoration-none text-dark fw-bold">Agents</a> > <a href="" class="text-decoration-none text-dark fw-bold">Agents in Sri Lanka</a></p>
            </div>
        </div>
    </div>

    <div class="container mt-4" style="margin-bottom: 3rem;">
        <div class="row">
            <div class="col-9">

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="banner">
                            <div class="row" style="padding-top: 4rem; padding-left: 5rem;">
                                <div class="col-6 text-white">
                                    <form action="">
                                        <h4 class="fw-bold mb-3">Find Your Agent</h4>

                                        <div class="mb-4">
                                            <label for="location" class="form-label mb-0">Select Location</label>
                                            <select class="form-select" aria-label="location" id="location" name="location">
                                                <option value="all" selected disabled hidden>All</option>
                                                <option value="">Colombo</option>
                                                <option value="first-time-buyer">Pottuvil</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="agent_type" class="form-label mb-0">Agent Type</label>
                                            <select class="form-select" aria-label="agent_type" id="agent_type" name="agent_type">
                                                <option value="all" selected disabled hidden>All</option>
                                                <option value="">Individual</option>
                                                <option value="first-time-buyer">Company</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="agent_name" class="form-label mb-0">Agent Name</label>
                                            <input type="text" class="form-control text-white" name="agent_name" id="agent_name">
                                        </div>

                                        <div class="mt-5">
                                            <button type="submit" class="btn text-light px-5 py-2 rounded-pill fw-bold" style="background-color: #35495E;">Find Agent</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h4>Agents in <span class="fw-bold">Sri Lanka</span></h4>
                    
                <div class="row align-items-center">
                    <div class="col-6">
                        <p>2648 agents available</p>
                    </div>

                    <div class="col-6">
                        <div class="row align-items-center justify-content-end">
                            <div class="col-6 text-end">
                                <p style="color: black;">
                                    <i class="fas fa-sort-amount-down"></i>
                                    Sort By:
                                    <select name="" class="border-0" style="color: #FF0000">
                                        <option value="most_recent">Most Recent</option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="row mt-5 agents">
                    <div class="col-4 text-center mb-4">
                        <div class="card custom-shadow position-relative">
                            <div class="card-body">
                                <img src="{{ url('img/frontend/agents/logo.png') }}" alt="" class="img-fluid logo mb-3">

                                <h5 class="fw-bold">Almond Property</h5>
                                
                                <h6 class="mb-2">Estate Agents</h6>
                                <p class="fw-bold mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                <p class="mb-1" style="font-size: 0.8rem">Almond Property is an independent, owner-managed lettings and property​ ​management business operated by a team with over 20</p>

                                <hr>

                                <h6 class="fw-bold mb-3" style="font-size: 0.9rem">Homes on Property Market Live</h6>

                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="fw-bold">17</h5>
                                        <p style="font-size: 0.8rem;">For Sale</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">08</h5>
                                        <p style="font-size: 0.8rem;">For Rent</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">00</h5>
                                        <p style="font-size: 0.8rem;">Lands</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-12 text-center mb-2">
                                        <a href="#" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid #707070; background-color: #35495E">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    +94 77 125 1542
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12 text-center mb-2">
                                        <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    Send email to agent
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12">
                                        <a href="#" class="fw-bold text-decoration-underline" style="color: #35495E; font-size: 0.8rem">Show More</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center prom-logo position-absolute">
                                <div class="col-12">
                                    <div class="py-1 px-2" style="background-color: #FF0000;">
                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">FEATURED</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 text-center mb-4">
                        <div class="card custom-shadow position-relative">
                            <div class="card-body">
                                <img src="{{ url('img/frontend/agents/logo.png') }}" alt="" class="img-fluid logo mb-3">

                                <h5 class="fw-bold">Almond Property</h5>
                                
                                <h6 class="mb-2">Estate Agents</h6>
                                <p class="fw-bold mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                <p class="mb-1" style="font-size: 0.8rem">Almond Property is an independent, owner-managed lettings and property​ ​management business operated by a team with over 20</p>

                                <hr>

                                <h6 class="fw-bold mb-3" style="font-size: 0.9rem">Homes on Property Market Live</h6>

                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="fw-bold">17</h5>
                                        <p style="font-size: 0.8rem;">For Sale</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">08</h5>
                                        <p style="font-size: 0.8rem;">For Rent</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">00</h5>
                                        <p style="font-size: 0.8rem;">Lands</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-12 text-center mb-2">
                                        <a href="#" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid #707070; background-color: #35495E">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    +94 77 125 1542
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12 text-center mb-2">
                                        <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    Send email to agent
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12">
                                        <a href="#" class="fw-bold text-decoration-underline" style="color: #35495E; font-size: 0.8rem">Show More</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center prom-logo position-absolute">
                                <div class="col-12">
                                    <div class="py-1 px-2" style="background-color: #FF0000;">
                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">FEATURED</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 text-center mb-4">
                        <div class="card custom-shadow position-relative">
                            <div class="card-body">
                                <img src="{{ url('img/frontend/agents/logo.png') }}" alt="" class="img-fluid logo mb-3">

                                <h5 class="fw-bold">Almond Property</h5>
                                
                                <h6 class="mb-2">Estate Agents</h6>
                                <p class="fw-bold mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                <p class="mb-1" style="font-size: 0.8rem">Almond Property is an independent, owner-managed lettings and property​ ​management business operated by a team with over 20</p>

                                <hr>

                                <h6 class="fw-bold mb-3" style="font-size: 0.9rem">Homes on Property Market Live</h6>

                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="fw-bold">17</h5>
                                        <p style="font-size: 0.8rem;">For Sale</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">08</h5>
                                        <p style="font-size: 0.8rem;">For Rent</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">00</h5>
                                        <p style="font-size: 0.8rem;">Lands</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-12 text-center mb-2">
                                        <a href="#" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid #707070; background-color: #35495E">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    +94 77 125 1542
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12 text-center mb-2">
                                        <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    Send email to agent
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12">
                                        <a href="#" class="fw-bold text-decoration-underline" style="color: #35495E; font-size: 0.8rem">Show More</a>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row align-items-center prom-logo position-absolute">
                                <div class="col-12">
                                    <div class="py-1 px-2" style="background-color: #FF0000;">
                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">PROMOTED</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <div class="col-4 text-center mb-4">
                        <div class="card custom-shadow position-relative">
                            <div class="card-body">
                                <img src="{{ url('img/frontend/agents/agent_1.jpg') }}" alt="" class="img-fluid logo mb-3">

                                <h5 class="fw-bold">Almond Property</h5>
                                
                                <h6 class="mb-2">Estate Agents</h6>
                                <p class="fw-bold mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                <p class="mb-1" style="font-size: 0.8rem">Almond Property is an independent, owner-managed lettings and property​ ​management business operated by a team with over 20</p>

                                <hr>

                                <h6 class="fw-bold mb-3" style="font-size: 0.9rem">Homes on Property Market Live</h6>

                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="fw-bold">17</h5>
                                        <p style="font-size: 0.8rem;">For Sale</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">08</h5>
                                        <p style="font-size: 0.8rem;">For Rent</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">00</h5>
                                        <p style="font-size: 0.8rem;">Lands</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-12 text-center mb-2">
                                        <a href="#" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid #707070; background-color: #35495E">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    +94 77 125 1542
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12 text-center mb-2">
                                        <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    Send email to agent
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12">
                                        <a href="#" class="fw-bold text-decoration-underline" style="color: #35495E; font-size: 0.8rem">Show More</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center prom-logo position-absolute">
                                <div class="col-12">
                                    <div class="py-1 px-2" style="background-color: #FF0000;">
                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">FEATURED</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 text-center mb-4">
                        <div class="card custom-shadow position-relative">
                            <div class="card-body">
                                <img src="{{ url('img/frontend/agents/agent_2.png') }}" alt="" class="img-fluid logo mb-3">

                                <h5 class="fw-bold">Almond Property</h5>
                                
                                <h6 class="mb-2">Estate Agents</h6>
                                <p class="fw-bold mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                <p class="mb-1" style="font-size: 0.8rem">Almond Property is an independent, owner-managed lettings and property​ ​management business operated by a team with over 20</p>

                                <hr>

                                <h6 class="fw-bold mb-3" style="font-size: 0.9rem">Homes on Property Market Live</h6>

                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="fw-bold">17</h5>
                                        <p style="font-size: 0.8rem;">For Sale</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">08</h5>
                                        <p style="font-size: 0.8rem;">For Rent</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">00</h5>
                                        <p style="font-size: 0.8rem;">Lands</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-12 text-center mb-2">
                                        <a href="#" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid #707070; background-color: #35495E">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    +94 77 125 1542
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12 text-center mb-2">
                                        <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    Send email to agent
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12">
                                        <a href="#" class="fw-bold text-decoration-underline" style="color: #35495E; font-size: 0.8rem">Show More</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center prom-logo position-absolute">
                                <div class="col-12">
                                    <div class="py-1 px-2" style="background-color: #FF0000;">
                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">FEATURED</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 text-center mb-4">
                        <div class="card custom-shadow position-relative">
                            <div class="card-body">
                                <img src="{{ url('img/frontend/agents/agent_1.jpg') }}" alt="" class="img-fluid logo mb-3">

                                <h5 class="fw-bold">Almond Property</h5>
                                
                                <h6 class="mb-2">Estate Agents</h6>
                                <p class="fw-bold mb-2 text-dark">541,  Rosewood place, Colombo, Sri Lanka</p>
                                <p class="mb-1" style="font-size: 0.8rem">Almond Property is an independent, owner-managed lettings and property​ ​management business operated by a team with over 20</p>

                                <hr>

                                <h6 class="fw-bold mb-3" style="font-size: 0.9rem">Homes on Property Market Live</h6>

                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="fw-bold">17</h5>
                                        <p style="font-size: 0.8rem;">For Sale</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">08</h5>
                                        <p style="font-size: 0.8rem;">For Rent</p>
                                    </div>

                                    <div class="col-4">
                                        <h5 class="fw-bold">00</h5>
                                        <p style="font-size: 0.8rem;">Lands</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-12 text-center mb-2">
                                        <a href="#" class="btn py-2 fw-bold text-white w-100 rounded-pill" style="border: 1.5px solid #707070; background-color: #35495E">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-phone-alt"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    +94 77 125 1542
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12 text-center mb-2">
                                        <a href="" class="btn py-2 fw-bold w-100 rounded-pill" style="border: 1.5px solid #707070">
                                            <div class="row justify-content-center">
                                                <div class="col-3 p-0">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <div class="col-7 p-0 text-start" style="font-size: 0.9rem;">
                                                    Send email to agent
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-12">
                                        <a href="#" class="fw-bold text-decoration-underline" style="color: #35495E; font-size: 0.8rem">Show More</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center prom-logo position-absolute">
                                <div class="col-12">
                                    <div class="py-1 px-2" style="background-color: #FF0000;">
                                        <p class="text-white" style="font-size: 0.7rem;"><img src="{{ url('img/frontend/for_sale/promoted.png') }}" alt="">FEATURED</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="row">
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ url('img/frontend/for_sale/ad_2.png') }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="#" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-0 mb-4 custom-shadow">
                        <div class="card">
                            <img src="{{ url('img/frontend/for_sale/ad_1.png') }}" class="img-fluid" alt="..." style="object-fit: cover; height: 15rem;">
                            <div class="card-body text-end">
                                <a href="#" class="btn find-out">Find Out More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-0 custom-shadow">
                        <div class="card">
                            <img src="{{ url('img/frontend/for_sale/ad_3.png') }}" class="img-fluid" alt="..." style="object-fit: cover; height: 20rem;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection