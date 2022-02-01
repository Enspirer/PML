@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@push('after-styles')
<link href="{{ url('css/contact_us.css') }}" rel="stylesheet">
@endpush

@section('content')
@if ( session()->has('message') )



<div class="thank-wrapper" style="min-height:480px;margin-top:200px;">
    <div class="container"
        style="background-color: #c6e4ee; padding-top:5px; border-radius: 50px 50px; text-align:center;">

        <h1 style="margin-top:60px;" class="display-4">Thank You!</h1><br>
        <p class="lead">
        <h4>We appreciate you contacting us. One of our member will get back in touch with you soon!<br><br> Have a
            great day!</h4>
        </p>
        <hr><br>
        <p class="lead">
            <a class="btn btn-success btn-md mb-5" href="{{url('/')}}" role="button">Go to Home Page</a>
        </p>
    </div>
</div>



@else

<div class="container-fluid banner contact-banner" style="margin-top: 6rem;">
    <div class="row justify-content-center xs-pl-0 contact-wrapper-sm" style="padding-top: 9rem;gap:30px;">
        <div class="col-5 contact-form col-xs-90precent col-tab-50">
            <form action="{{route('frontend.contact_us.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <h5 class="fw-bold">Let Us Call You!</h5>
                <h6 class="mb-4">To help you choose your property</h6>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-6 col-xs-12 ">
                            <input type="text" class="form-control rounded-0" name="name" id="name"
                                placeholder="Your Name" required>
                        </div>

                        <div class="col-6 input-group col-xs-12 xs-mt-15">
                            <div class="input-group-prepend">
                                <select class="form-select" aria-label="country_code" id="country_code"
                                    name="agent_type" required>
                                    <option value="+94">+94</option>
                                    <option value="+95">+95</option>
                                </select>
                            </div>
                            <input type="text" class="form-control rounded-0" name="phone" id="phone"
                                placeholder="Your Number" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Your Email"
                        required>
                </div>

                <div class="mb-3">
                    <textarea class="form-control rounded-0" name="message" rows="5"
                        placeholder="Tell us about desired property" required></textarea>
                </div>

                <div>
                    <p class="mb-1">Consent</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                        <label class="form-check-label ms-2" for="flexCheckDefault">
                            Acceptance * <br>
                            I would like to receive information & updates from Trace Solutions in relation to my
                            enquiry.
                            I understand that Trace will never share my information.
                        </label>
                    </div>
                </div>


                <div class="row align-items-center">
                    <div class="col-6 col-xs-12">
                        <div class="g-recaptcha" data-callback="checked"
                            data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"
                            style="transform: scale(0.80); -webkit-transform: scale(0.80); transform-origin: 0 0; -webkit-transform-origin: 0 0; padding-top: 2rem">
                        </div>
                    </div>

                    <div class="col-6 text-end col-xs-12 contact-submit">
                        <button type="submit" class="submit_btn btn submit-btn w-75" disabled>Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-5 contact-form col-xs-90precent col-tab-50 details-card-area">
            <div class="contact-details-wrapper">

                <div class="contact-card">
                    <h2>Contact Us</h2>
                    <p>
                        <span class="contact-icon-wrapper">
                            <i class="fas fa-phone-alt mr-2" style="color: #0F9D58; font-size: 23px"></i>
                            <i class="fab fa-whatsapp ml-2" style="color: #0F9D58; font-size: 27px"></i>
                        </span>
                        : +94 778669990
                    </p>
                    <p>
                        <span class="contact-icon-wrapper">
                            <i class="fas fa-envelope" style="color: #0F9D58; font-size: 23px"></i>
                        </span>

                        : hello@propertymarketlive.com
                    </p>
                </div>


                <div class="other-contact-wrapper">
                    <div class="other-card">
                        <img src="{{ url('img/frontend/contact_us/call.png') }}" alt="call">
                        <div class="other-txt">
                            <h5>Support</h5>
                            <p>support@tallentor.com</p>
                        </div>
                    </div>
                    <div class="other-card">
                        <img src="{{ url('img/frontend/contact_us/Group695.png') }}" alt="call">
                        <div class="other-txt">
                            <h5>Support</h5>
                            <p>support@tallentor.com</p>
                        </div>
                    </div>
                    <div class="other-card">
                        <img src="{{ url('img/frontend/contact_us/credit-card.png') }}" alt="call">
                        <div class="other-txt">
                            <h5>Support</h5>
                            <p>support@tallentor.com</p>
                        </div>
                    </div>
                    <div class="other-card">
                        <img src="{{ url('img/frontend/contact_us/Group694.png') }}" alt="call">
                        <div class="other-txt">
                            <h5>Support</h5>
                            <p>support@tallentor.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="our-offices">
        <div class="row offices-row">
            <div class="col-md-4 col-xs-12">
                <div class="office-card">
                    <div class="map-part-top">
                        <img class="map" src="https://tallentor.com/theme_light/assets/contact/uk.png" alt="">
                    </div>
                    <div class="office-card-txt-wrapper">
                        <h3>United Kingdom</h3>
                        <div class="office-contact">
                            <i class="fa fa-map-marker"></i>
                            <div class="office-contact-txt">
                                <p>Enspirer International, 35, Melbourne Avenue, London, W13 9BX, United Kingdom</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fas fa-phone-alt"></i>
                            <div class="office-contact-txt">
                                <p>+44 7741 025138</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fa fa-envelope"></i>
                            <div class="office-contact-txt">
                                <p>uk@enspirer.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="office-card">
                    <div class="map-part-top">
                        <img class="map" src="https://tallentor.com/theme_light/assets/contact/uk.png" alt="">
                    </div>
                    <div class="office-card-txt-wrapper">
                    <h3>Sri Lanka</h3>
                        <div class="office-contact">
                            <i class="fa fa-map-marker"></i>
                            <div class="office-contact-txt">
                                <p>558/ 3B Pitipana Town, Homagama, 10206 Sri lanka</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fas fa-phone-alt"></i>
                            <div class="office-contact-txt">
                                <p>+94 0778669990</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fa fa-envelope"></i>
                            <div class="office-contact-txt">
                                <p>hello@tallentor.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="office-card">
                    <div class="map-part-top">
                        <img class="map" src="https://tallentor.com/theme_light/assets/contact/uk.png" alt="">
                    </div>
                    <div class="office-card-txt-wrapper">
                        <h3>Australia</h3>
                        <div class="office-contact">
                            <i class="fa fa-map-marker"></i>
                            <div class="office-contact-txt">
                                <p>19 Koombahla Court, Rowville, Victoria 3178, Australia</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fas fa-phone-alt"></i>
                            <div class="office-contact-txt">
                                <p>+61 435 975 999</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fa fa-envelope"></i>
                            <div class="office-contact-txt">
                                <p>info@tallentor.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row offices-row">
            <div class="col-md-4 col-xs-12">
                <div class="office-card">
                    <div class="map-part-top">
                        <img class="map" src="https://tallentor.com/theme_light/assets/contact/uk.png" alt="">
                    </div>
                    <div class="office-card-txt-wrapper">
                        <h3>France</h3>
                        <div class="office-contact">
                            <i class="fa fa-map-marker"></i>
                            <div class="office-contact-txt">
                                <p>61 Rue Saint Blaise 75020 Paris</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fas fa-phone-alt"></i>
                            <div class="office-contact-txt">
                                <p>+33 6 52 30 02 55</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fa fa-envelope"></i>
                            <div class="office-contact-txt">
                                <p>france@tallentor.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="office-card">
                    <div class="map-part-top">
                        <img class="map" src="https://tallentor.com/theme_light/assets/contact/uk.png" alt="">
                    </div>
                    <div class="office-card-txt-wrapper">
                    <h3>United Arab Emirates</h3>
                        <div class="office-contact">
                            <i class="fa fa-map-marker"></i>
                            <div class="office-contact-txt">
                                <p>No - 512 Al Zahra Building Al Nabaa Sharjah UAE</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fas fa-phone-alt"></i>
                            <div class="office-contact-txt">
                                <p>+971 568694803</p>
                            </div>
                        </div>
                        <div class="office-contact">
                        <i class="fa fa-envelope"></i>
                            <div class="office-contact-txt">
                                <p>uae@tallentor.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="office-card">
                    <div class="map-part-top">
                        <img class="map" src="https://tallentor.com/theme_light/assets/contact/uk.png" alt="">
                    </div>
                    <div class="office-card-txt-wrapper">
                        <h3>Malaysia</h3>
                        <div class="office-contact">
                            <i class="fa fa-map-marker"></i>
                            <div class="office-contact-txt">
                                <p>A 15-03 Tropicana Avenue, NO.12 Persiaran Tropicana, Tropicana Golf & Country resort, PJU3 Petaling Jaya 47410, Selangor, Malaysia.</p>
                            </div>
                        </div>
                        <!-- <div class="office-contact">
                        <i class="fas fa-phone-alt"></i>
                            <div class="office-contact-txt">
                                <p>+61 435 975 999</p>
                            </div>
                        </div> -->
                        <div class="office-contact">
                        <i class="fa fa-envelope"></i>
                            <div class="office-contact-txt">
                                <p>malaysia@tallentor.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid p-0">
    <div id="map" style="height: 500px; width: 100%"></div>
</div>

@endif

@endsection

@push('after-scripts')
@if(config('access.captcha.contact'))
@captchaScripts
@endif

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
function checked() {
    $('.submit_btn').removeAttr('disabled');
};
</script>


<script>
function initMap() {
    let options = {
        zoom: 12,
        center: {
            lat: 6.904955079710811,
            lng: 79.86117616105729
        }
    }

    let map = new google.maps.Map(document.getElementById('map'), options);

    let icon = {
        url: 'img/frontend/contact_us/marker.png',
        scaledSize: {
            width: 25,
            height: 35
        }
    }

    let marker = new google.maps.Marker({
        position: {
            lat: 6.904955079710811,
            lng: 79.86117616105729
        },
        map: map,
        icon: icon
    });

    let infoWindow = new google.maps.InfoWindow({
        content: `<div class="row align-items-center">
                                <div class="col-12">
                                    <a href="{{ route('frontend.index') }}"><img src="{{ url('img/frontend/logo.png') }}" class="img-fluid contact-info-logo" alt="" style="height: 3rem;"></a>

                              

                                    <div class="row" style="margin-top:25px;">
                                        <div class="col-2 pe-0">
                                            <i class="fas fa-phone-alt text-white infocard-i"></i>
                                        </div>
                                        <div class="col-10 ps-0">
                                            <p class="text-white mb-3 infocard-p">+94 778669990</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2 pe-0">
                                            <i class="fas fa-envelope text-white infocard-i"></i>
                                        </div>
                                        <div class="col-10 ps-0">
                                            <p class="text-white mb-3 infocard-p">hello@propertymarketlive.com</p>
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

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBj8LhHUJaf2MXpqIQ_MOXs7HkeUXnac&callback=initMap"
    type="text/javascript"></script>
@endpush