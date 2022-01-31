<section class="container-fluid pt-5 pb-3 text-white" style="background-color: #16202C;">
    <div class="container">
        <div class="row mobile-footer-row">
            <div class="col-3 col-xs-12 col-tab-6">
                <a href="{{ route('frontend.index') }}"><img src="{{ url('img/frontend/logo.png') }}" alt="" class="logo" style="margin-bottom:30px;"></a>

                <!-- <p class="text-white mt-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> -->

                <div class="row">
                    <div class="col-2 pe-0">
                        <i class="fas fa-phone-alt text-white"></i>
                    </div>
                    <div class="col-10 ps-0">
                        <p class="text-white mb-3"><a class="text-white" href="tel:+94778669990">+94 778669990</a></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 pe-0">
                        <i class="fas fa-envelope text-white"></i>
                    </div>
                    <div class="col-10 ps-0">
                        <p class="text-white mb-3"><a class="text-white" href="mailto:hello@propertymarketlive.com">hello@propertymarketlive.com</a></p>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-2 pe-0">
                        <i class="fas fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="col-10 ps-0">
                        <p class="text-white mb-3">123/A, Colombo 05, Sri Lanka.</p>
                    </div>
                </div> -->
               
            </div>
            <div class="col-3 ps-5 col-xs-12 col-tab-6">
                <h5 class="fw-bolder mt-2" style="margin-bottom:30px !important;">Top Products</h5>
                <a href="{{route('frontend.tips_for_buyers')}}" class="mb-3 d-block text-decoration-none no-result-list text-white">Tips for buyers</a>
                <a href="{{route('frontend.tips_for_sellers')}}" class="mb-3 d-block text-decoration-none no-result-list text-white">Tips for sellers</a>
                <a href="{{route('frontend.commercial_resources')}}" class="mb-3 d-block text-decoration-none no-result-list text-white">Commercial Resources</a>
                <a href="{{route('frontend.marketing_services')}}" class="mb-3 d-block text-decoration-none no-result-list text-white">Marketing Service</a>
            </div>
            <div class="col-3 ps-5 col-xs-12 col-tab-6 footer-news-tab">
                <h5 class="text-white fw-bolder mt-2" style="margin-bottom:30px!important;">Newsletter</h5>
                <p class="text-white">You can trust us. we only send promo offers, not a single spam.</p>
                <form>
                    {{csrf_field()}}
                    <div class="input-group mt-4 mb-3 p-1" style="background-color: rgb(255, 254, 252, 0.1); border: 1px solid white; border-radius: 50px">
                        <input type="text" class="form-control border-0" placeholder="Type your Email" aria-label="email" aria-describedby="email" name="email" style="background: border-box; border-radius: 50px; color: white">
                        <button class="btn rounded-0 text-light border-0" type="submit" style="background-color: #F60331; border-radius: 50px!important; font-size: 0.6rem;">SUBSCRIBE</button>
                    </div>
                </form>
            </div>
            <div class="col-3 ps-5 col-xs-12 col-tab-6">
                <!-- <h5 class="fw-bolder mt-2" style="margin-bottom:30px !important;
                ">About Us</h5> -->
                <!-- <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> -->
                <div class="social-wrapper">
                    <!-- <div class="row">
                    </div> -->
                    <h5 class="fw-bolder mt-2" style="margin-bottom:30px !important;">Social</h5>
                    <div class="social-row" style="margin-bottom:30px;">
                        <div class="icon-wrapper">
                            <a href="https://www.facebook.com/propertymarketlive" target="_blank"><i class="fab fa-facebook-square"></i></a>
                        </div>
                        <div class="icon-wrapper">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        </div>
                        <div class="icon-wrapper">
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="social-row">
                        <div class="icon-wrapper">
                        <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="icon-wrapper">
                        <a href=""><i class="fab fa-linkedin"></i></a>
                        </div>
                        <div class="icon-wrapper">
                            <!-- <a href=""><i class="fab fa-youtube"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <p id="copyright-txt">Copyright &copy; 2022. | Property Market Live. All rights reserved.</p>
        </div>
    </div>
</section>