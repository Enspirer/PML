@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/individual-agent.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="individual-agent-banner">
    <img src="{{ url('img/frontend/individual-agent/agent-banner.png') }}" alt="agent-banner">
</div>
<div class="container agent-container">
    <!-- agent main area -->
    <div class="agent-main-area">
        <!-- Profile area -->
        <div class="agent-profile-area">
            <div class="row agent-flex-row">
                <div class="profile-pic">
                    <img id="agent-prof" src="{{ url('img/frontend/individual-agent/agent-profile.png') }}"
                        alt="profile pic">
                </div>
                <div class="agent-txt-main">
                    <h1>Almond Property</h1>
                    <p>541, Rosewood place, Colombo, Sri Lanka</p>
                </div>
            </div>
            <div class="row">
                <h5 style="margin-bottom:10px !important;" class="fw-bold title">Homes on Property Market Live</h5>
                <div class="inner-row-wrapper">
                    <div class="property-count-wrapper">
                        <div class="count-box-wrapper">
                            <div class="count-box">
                                <span class="number">17</span>
                                <span class="count-txt">For Sale</span>
                            </div>
                            <div class="count-box">
                                <span class="number">08</span>
                                <span class="count-txt">For Rent</span>
                            </div>
                            <div class="count-box">
                                <span class="number">0</span>
                                <span class="count-txt">Lands</span>
                            </div>
                        </div>
                    </div>
                    <div class="agent-contact-wrapper">
                        <a href="" class="agent-contact-btn">
                            <span class="icon"><i class="fas fa-phone-alt"></i></span>
                            +94 77 125 1542
                        </a>
                        <a href="" class="agent-contact-btn">
                            <span class="icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                            Send email to agent</a>
                    </div>
                </div>

            </div>
            <div class="row">
                <p>You should take this opportunity to show your communication skills by speaking clearly and concisely
                    in an organized manner. Because there is no right or wrong answer for this question, it is important
                    to appear friendly.</p>
            </div>
        </div>


        <!-- Agent Selling list area -->
        <ul class="nav nav-tabs agent-selling-list-area" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                    role="tab" aria-controls="all" aria-selected="true">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="commercial-tab" data-bs-toggle="tab" data-bs-target="#commercial"
                    type="button" role="tab" aria-controls="commercial" aria-selected="false">Commercial</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="residential-tab" data-bs-toggle="tab" data-bs-target="#residential"
                    type="button" role="tab" aria-controls="residential" aria-selected="false">Residential</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="agent-list-wrapper">
            <div class="agent-card">
                <div class="heart-icon-wrapper">
                    <!-- <i class="fas fa-heart"></i> -->
                    <i class="far fa-heart"></i>
                </div>
                <img class="property-img" src="{{ url('img/frontend/individual-agent/property-one.png') }}" alt="property">
                <div class="agent-card-txt-wrapper">
                    <h3>Altezza Residencies</h3>
                    <h4>24M upwards</h4>
                    <h5>541, Rosewood place, Colombo, Sri Lanka</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries.
                    </p>
                </div>
            </div>

            <div class="agent-card">
                <div class="heart-icon-wrapper">
                    <!-- <i class="fas fa-heart"></i> -->
                    <i class="far fa-heart"></i>
                </div>
                <img class="property-img" src="{{ url('img/frontend/individual-agent/property-two.png') }}" alt="property">
                <div class="agent-card-txt-wrapper">
                    <h3>Altezza Residencies</h3>
                    <h4>24M upwards</h4>
                    <h5>541, Rosewood place, Colombo, Sri Lanka</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries.
                    </p>
                </div>
            </div>


            <div class="agent-card">
                <div class="heart-icon-wrapper">
                    <!-- <i class="fas fa-heart"></i> -->
                    <i class="far fa-heart"></i>
                </div>
                <img class="property-img"  src="{{ url('img/frontend/individual-agent/property-three.png') }}" alt="property">
                <div class="agent-card-txt-wrapper">
                    <h3>Altezza Residencies</h3>
                    <h4>24M upwards</h4>
                    <h5>541, Rosewood place, Colombo, Sri Lanka</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries.
                    </p>
                </div>
            </div>
        </div>
            </div>
            <div class="tab-pane fade" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">
                Commercial
            </div>
            <div class="tab-pane fade" id="residential" role="tabpanel" aria-labelledby="residential-tab">
                Residential
            </div>
        </div>


        
    </div>
    <!-- agent sidebar -->
    <div class="agent-side-area">
        <div class="ad-card">
            <img width="100%" src="{{ url('img/frontend/individual-agent/ad-one.png') }}" alt="Ad">
            <div class="ad-btn-wrapper">
                <a href="" class="ad-btn">Find Out More</a>
            </div>
        </div>

        <div class="ad-card">
            <img width="100%" src="{{ url('img/frontend/individual-agent/ad-two.png') }}" alt="Ad">
            <div class="ad-btn-wrapper">
                <a href="" class="ad-btn">Find Out More</a>
            </div>
        </div>
    </div>
</div>



@endsection

@push('after-scripts')

<!-- <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var CountryID = $(this).val();
                // console.log(CountryID);

                    $.ajax({
                        
                        url: "{{url('/')}}/api/findLocationWithCountryID/" + CountryID,

                        method: "GET",
                        dataType: "json",
                        success:function(data) {
                            console.log(data);
                        if(data){
                            $('#area').empty();
                            $('#area').focus;
                            $('#area').append('<option value="" selected disabled>Select...</option>'); 
                            $.each(data, function(key, value){
                                // console.log(value);
                            $('select[name="area"]').append('<option value="'+ value.location_id +'">' + value.location_district+ '</option>');
                            
                        });

                        }else{
                            $('#area').empty();
                        }
                    }
                    });
                
            });
        });
    </script> -->

@endpush