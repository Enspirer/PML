<section class="container-fluid pt-5 pb-3 text-white" style="background-color: #16202C;">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <a href=""><img src="{{ url('img/frontend/logo.png') }}" alt="" class="logo"></a>
                <p class="text-white mt-3 mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                <p class="text-white mb-3"><i class="fas fa-phone-alt text-white me-3"></i></i>+94 777000000</p>

                <p class="text-white mb-3"><i class="fas fa-envelope text-white me-3"></i>info@propertymarketlive.com</p>

                <p class="text-white mb-3"><i class="fas fa-map-marker-alt text-white me-3"></i>123/A, Colombo 05, Sri Lanka.</p>
            </div>
            <div class="col-3 ps-5">
                <h5 class="fw-bolder mt-2 mb-4">Top Products</h5>
                <a href="" class="mb-3 d-block text-decoration-none no-result-list text-white">Tips for buyers</a>
                <a href="" class="mb-3 d-block text-decoration-none no-result-list text-white">Tips for sellers</a>
                <a href="" class="mb-3 d-block text-decoration-none no-result-list text-white">Commercial Resources</a>
                <a href="" class="mb-3 d-block text-decoration-none no-result-list text-white">Marketing Service</a>
            </div>
            <div class="col-3 ps-5">
                <h5 class="text-white fw-bolder mt-2 mb-4">Newsletter</h5>
                <p class="text-white">You can trust us. we only send promo offers, not a single spam.</p>
                <form>
                    {{csrf_field()}}
                    <div class="input-group mt-4 mb-3 p-1" style="background-color: rgb(255, 254, 252, 0.1); border: 1px solid white; border-radius: 50px">
                        <input type="text" class="form-control border-0" placeholder="Type your Email" aria-label="email" aria-describedby="email" name="email" style="background: border-box; border-radius: 50px; color: white">
                        <button class="btn rounded-0 text-light border-0" type="submit" style="background-color: #F60331; border-radius: 50px!important; font-size: 0.6rem;">SUBSCRIBE</button>
                    </div>
                </form>
            </div>
            <div class="col-3 ps-5">
                <h5 class="fw-bolder mt-2 mb-4">About Us</h5>
                <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
        </div>
    </div>
</section>