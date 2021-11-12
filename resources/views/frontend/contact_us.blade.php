@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@push('after-styles')
    <link href="{{ url('css/contact_us.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid banner" style="margin-top: 6rem;">
        <div class="row justify-content-center" style="padding-top: 3rem; padding-left: 10rem;">
            <div class="col-5 contact-form">
                <form action="">
                    <h5 class="fw-bold">Let Us Call You!</h5>
                    <h6 class="mb-4">To help you choose your property</h6>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control rounded-0" name="name" id="name" placeholder="Your Name" required>
                            </div>

                            <div class="col-6 input-group">
                                <div class="input-group-prepend">
                                    <select class="form-select" aria-label="country_code" id="country_code" name="agent_type" required>
                                        <option value="+94">+94</option>
                                        <option value="+95">+95</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control rounded-0" name="phone" id="phone" placeholder="Your Number" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Your Email" required>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control rounded-0" name="message" rows="5" placeholder="Tell us about desired property" required></textarea>
                    </div>

                    <div>
                        <p class="mb-1">Consent</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label ms-2" for="flexCheckDefault">
                            Acceptance * <br>
                                I would like to receive information & updates from Trace Solutions in relation to my enquiry. 
                                I understand that Trace will never share my information.
                            </label>
                        </div>
                    </div>

                   
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" style="transform: scale(0.80); -webkit-transform: scale(0.80); transform-origin: 0 0; -webkit-transform-origin: 0 0; padding-top: 2rem"></div>
                        </div>

                        <div class="col-6 text-end">
                            <button type="submit" class="btn submit-btn w-75">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div id="map" style="height: 500px; width: 100%"></div>
    </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>


    <script>
        function initMap() {
            let options = {
                zoom: 12,
                center: {lat: 6.904955079710811, lng: 79.86117616105729}
            }

            let map = new google.maps.Map(document.getElementById('map'), options);

            let icon = {
                url: 'img/frontend/contact_us/marker.png',
                scaledSize: { width: 25, height: 35 }
            }

            let marker = new google.maps.Marker({
                position: {lat: 6.904955079710811, lng: 79.86117616105729},
                map:map,
                icon: icon
            });

            let infoWindow = new google.maps.InfoWindow({
                content:    `<div class="row align-items-center">
                                <div class="col-12">
                                    <a href="{{ route('frontend.index') }}"><img src="{{ url('img/frontend/logo.png') }}" class="img-fluid" alt="" style="height: 3rem;"></a>

                                    <p class="text-white mt-2 mb-3" style="font-size: 0.8rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                                    <div class="row">
                                        <div class="col-2 pe-0">
                                            <i class="fas fa-phone-alt text-white"></i>
                                        </div>
                                        <div class="col-10 ps-0">
                                            <p class="text-white mb-3">+94 777000000</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 pe-0">
                                            <i class="fas fa-envelope text-white"></i>
                                        </div>
                                        <div class="col-10 ps-0">
                                            <p class="text-white mb-3">info@propertymarketlive.com</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 pe-0">
                                            <i class="fas fa-map-marker-alt text-white"></i>
                                        </div>
                                        <div class="col-10 ps-0">
                                            <p class="text-white mb-3">123/A, Colombo 05, Sri Lanka.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>`
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });

            infoWindow.open(map, marker);
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap" type="text/javascript"></script>
@endpush