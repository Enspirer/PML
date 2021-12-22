<div class="container search-bar">
    <ul class="nav nav-pills ms-4" id="pills-tab" role="tablist">
        <li class="nav-item text-white rounded-0 fs-6 fs-md-5 ms-1" role="presentation">
            <button class="nav-link text-white rounded-0 active px-5" style="background-color : #83BC3E" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true" data-aos="fade-up" data-aos-duration="500">All</button>
        </li>
        <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
            <button class="nav-link text-white rounded-0" style="background-color : #00C1FB" id="pills-residential-tab" data-bs-toggle="pill" data-bs-target="#pills-residential" type="button" role="tab" aria-controls="pills-residential" aria-selected="true" data-aos="fade-up" data-aos-duration="500">Residential</button>
        </li>
        <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
            <button class="nav-link text-white rounded-0" style="background-color : #83BC3E" id="pills-commercial-tab" data-bs-toggle="pill" data-bs-target="#pills-commercial" type="button" role="tab" aria-controls="pills-commercial" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Commercial</button>
        </li>
        <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
            <button class="nav-link text-white rounded-0" style="background-color : #EB8EB0" id="pills-coming-tab" data-bs-toggle="pill" data-bs-target="#pills-coming" type="button" role="tab" aria-controls="pills-coming" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Coming Soon</button>
        </li>
        <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
            <button class="nav-link text-white rounded-0" style="background-color : #0EA7CE" id="pills-tp_developer-tab" data-bs-toggle="pill" data-bs-target="#pills-tp_developer" type="button" role="tab" aria-controls="pills-tp_developer" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">TP Developer</button>
        </li>
        <li class="nav-item text-white rounded-0 fs-5 ms-1" role="presentation">
            <button class="nav-link text-white rounded-0" style="background-color : #4195E1" id="pills-investments-tab" data-bs-toggle="pill" data-bs-target="#pills-investments" type="button" role="tab" aria-controls="pills-investments" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Investments</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                    {{csrf_field()}}
                    <input type="hidden" name="category_type" value="all">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                        <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-residential" role="tabpanel" aria-labelledby="pills-residential-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                    {{csrf_field()}}
                    <input type="hidden" name="category_type" value="residential" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3 residential" aria-label="search" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <select class="form-select" aria-label="min_price" name="min_price" id="min_price" placeholder="Min Price">
                        <option value="0" selected disabled hidden>Min Price</option>
                        <option value="0">0</option>
                        <option value="25000">25,000</option>
                        <option value="50000">50,000</option>
                        <option value="75000">75,000</option>
                        <option value="100000">100,000</option>
                        <option value="125000">125,000</option>
                        <option value="150000">150,000</option>
                        <option value="175000">175,000</option>
                        <option value="200000">200,000</option>
                        <option value="225000">225,000</option>
                        <option value="250000">250,000</option>
                        <option value="275000">275,000</option>
                        <option value="300000">300,000</option>
                        <option value="325000">325,000</option>
                        <option value="350000">350,000</option>
                        <option value="375000">375,000</option>
                        <option value="400000">400,000</option>
                        <option value="425000">425,000</option>
                        <option value="450000">450,000</option>
                        <option value="475000">475,000</option>
                        <option value="500000">500,000</option>
                        <option value="550000">550,000</option>
                        <option value="600000">600,000</option>
                        <option value="650000">650,000</option>
                        <option value="700000">700,000</option>
                        <option value="750000">750,000</option>
                        <option value="800000">800,000</option>
                        <option value="850000">850,000</option>
                        <option value="900000">900,000</option>
                        <option value="950000">950,000</option>
                        <option value="1000000">1,000,000</option>
                        <option value="1100000">1,100,000</option>
                        <option value="1200000">1,200,000</option>
                        <option value="1300000">1,300,000</option>
                        <option value="1400000">1,400,000</option>
                        <option value="1500000">1,500,000</option>
                        <option value="1600000">1,600,000</option>
                        <option value="1700000">1,700,000</option>
                        <option value="1800000">1,800,000</option>
                        <option value="1900000">1,900,000</option>
                        <option value="2000000">2,000,000</option>
                        <option value="2500000">2,500,000</option>
                        <option value="3000000">3,000,000</option>
                        <option value="3500000">3,500,000</option>
                        <option value="4000000">4,000,000</option>
                        <option value="4500000">4,500,000</option>
                        <option value="5000000">5,000,000</option>
                        <option value="5500000">5,500,000</option>
                        <option value="6000000">6,000,000</option>
                        <option value="6500000">6,500,000</option>
                        <option value="7000000">7,000,000</option>
                        <option value="7500000">7,500,000</option>
                        <option value="10000000">10,000,000</option>
                        <option value="15000000">15,000,000</option>
                        <option value="20000000">20,000,000</option>
                    </select>
                    <select class="form-select" aria-label="min_price" name="min_price" id="min_price" placeholder="Max Price">
                        <option value="0" selected disabled hidden>Max Price</option>
                        <option value="0">0</option>
                        <option value="0">0</option>
                        <option value="25000">25,000</option>
                        <option value="50000">50,000</option>
                        <option value="75000">75,000</option>
                        <option value="100000">100,000</option>
                        <option value="125000">125,000</option>
                        <option value="150000">150,000</option>
                        <option value="175000">175,000</option>
                        <option value="200000">200,000</option>
                        <option value="225000">225,000</option>
                        <option value="250000">250,000</option>
                        <option value="275000">275,000</option>
                        <option value="300000">300,000</option>
                        <option value="325000">325,000</option>
                        <option value="350000">350,000</option>
                        <option value="375000">375,000</option>
                        <option value="400000">400,000</option>
                        <option value="425000">425,000</option>
                        <option value="450000">450,000</option>
                        <option value="475000">475,000</option>
                        <option value="500000">500,000</option>
                        <option value="550000">550,000</option>
                        <option value="600000">600,000</option>
                        <option value="650000">650,000</option>
                        <option value="700000">700,000</option>
                        <option value="750000">750,000</option>
                        <option value="800000">800,000</option>
                        <option value="850000">850,000</option>
                        <option value="900000">900,000</option>
                        <option value="950000">950,000</option>
                        <option value="1000000">1,000,000</option>
                        <option value="1100000">1,100,000</option>
                        <option value="1200000">1,200,000</option>
                        <option value="1300000">1,300,000</option>
                        <option value="1400000">1,400,000</option>
                        <option value="1500000">1,500,000</option>
                        <option value="1600000">1,600,000</option>
                        <option value="1700000">1,700,000</option>
                        <option value="1800000">1,800,000</option>
                        <option value="1900000">1,900,000</option>
                        <option value="2000000">2,000,000</option>
                        <option value="2500000">2,500,000</option>
                        <option value="3000000">3,000,000</option>
                        <option value="3500000">3,500,000</option>
                        <option value="4000000">4,000,000</option>
                        <option value="4500000">4,500,000</option>
                        <option value="5000000">5,000,000</option>
                        <option value="5500000">5,500,000</option>
                        <option value="6000000">6,000,000</option>
                        <option value="6500000">6,500,000</option>
                        <option value="7000000">7,000,000</option>
                        <option value="7500000">7,500,000</option>
                        <option value="10000000">10,000,000</option>
                        <option value="15000000">15,000,000</option>
                        <option value="20000000">20,000,000</option>
                    </select>
                    <select class="form-select" aria-label="beds" name="beds" id="beds">
                        <option value="" selected disabled hidden>Beds</option>
                        <option value="">Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="greater-than-5">5+</option>
                    </select>
                    <select class="form-select" aria-label="baths" name="baths" id="baths">
                        <option value="" selected disabled hidden>Baths</option>
                        <option value="">Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="greater-than-5">5+</option>
                    </select>
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-commercial" role="tabpanel" aria-labelledby="pills-commercial-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                {{csrf_field()}}
                    <input type="hidden" name="category_type" value="commercial" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3 commercial" aria-label="search" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <select class="form-select" aria-label="min_price" name="min_price" id="min_price" placeholder="Min Price">
                        <option value="0" selected disabled hidden>Min Price</option>
                        <option value="0">0</option>
                        <option value="25000">25,000</option>
                        <option value="50000">50,000</option>
                        <option value="75000">75,000</option>
                        <option value="100000">100,000</option>
                        <option value="125000">125,000</option>
                        <option value="150000">150,000</option>
                        <option value="175000">175,000</option>
                        <option value="200000">200,000</option>
                        <option value="225000">225,000</option>
                        <option value="250000">250,000</option>
                        <option value="275000">275,000</option>
                        <option value="300000">300,000</option>
                        <option value="325000">325,000</option>
                        <option value="350000">350,000</option>
                        <option value="375000">375,000</option>
                        <option value="400000">400,000</option>
                        <option value="425000">425,000</option>
                        <option value="450000">450,000</option>
                        <option value="475000">475,000</option>
                        <option value="500000">500,000</option>
                        <option value="550000">550,000</option>
                        <option value="600000">600,000</option>
                        <option value="650000">650,000</option>
                        <option value="700000">700,000</option>
                        <option value="750000">750,000</option>
                        <option value="800000">800,000</option>
                        <option value="850000">850,000</option>
                        <option value="900000">900,000</option>
                        <option value="950000">950,000</option>
                        <option value="1000000">1,000,000</option>
                        <option value="1100000">1,100,000</option>
                        <option value="1200000">1,200,000</option>
                        <option value="1300000">1,300,000</option>
                        <option value="1400000">1,400,000</option>
                        <option value="1500000">1,500,000</option>
                        <option value="1600000">1,600,000</option>
                        <option value="1700000">1,700,000</option>
                        <option value="1800000">1,800,000</option>
                        <option value="1900000">1,900,000</option>
                        <option value="2000000">2,000,000</option>
                        <option value="2500000">2,500,000</option>
                        <option value="3000000">3,000,000</option>
                        <option value="3500000">3,500,000</option>
                        <option value="4000000">4,000,000</option>
                        <option value="4500000">4,500,000</option>
                        <option value="5000000">5,000,000</option>
                        <option value="5500000">5,500,000</option>
                        <option value="6000000">6,000,000</option>
                        <option value="6500000">6,500,000</option>
                        <option value="7000000">7,000,000</option>
                        <option value="7500000">7,500,000</option>
                        <option value="10000000">10,000,000</option>
                        <option value="15000000">15,000,000</option>
                        <option value="20000000">20,000,000</option>
                    </select>
                    <select class="form-select" aria-label="min_price" name="min_price" id="min_price" placeholder="Max Price">
                        <option value="0" selected disabled hidden>Max Price</option>
                        <option value="0">0</option>
                        <option value="0">0</option>
                        <option value="25000">25,000</option>
                        <option value="50000">50,000</option>
                        <option value="75000">75,000</option>
                        <option value="100000">100,000</option>
                        <option value="125000">125,000</option>
                        <option value="150000">150,000</option>
                        <option value="175000">175,000</option>
                        <option value="200000">200,000</option>
                        <option value="225000">225,000</option>
                        <option value="250000">250,000</option>
                        <option value="275000">275,000</option>
                        <option value="300000">300,000</option>
                        <option value="325000">325,000</option>
                        <option value="350000">350,000</option>
                        <option value="375000">375,000</option>
                        <option value="400000">400,000</option>
                        <option value="425000">425,000</option>
                        <option value="450000">450,000</option>
                        <option value="475000">475,000</option>
                        <option value="500000">500,000</option>
                        <option value="550000">550,000</option>
                        <option value="600000">600,000</option>
                        <option value="650000">650,000</option>
                        <option value="700000">700,000</option>
                        <option value="750000">750,000</option>
                        <option value="800000">800,000</option>
                        <option value="850000">850,000</option>
                        <option value="900000">900,000</option>
                        <option value="950000">950,000</option>
                        <option value="1000000">1,000,000</option>
                        <option value="1100000">1,100,000</option>
                        <option value="1200000">1,200,000</option>
                        <option value="1300000">1,300,000</option>
                        <option value="1400000">1,400,000</option>
                        <option value="1500000">1,500,000</option>
                        <option value="1600000">1,600,000</option>
                        <option value="1700000">1,700,000</option>
                        <option value="1800000">1,800,000</option>
                        <option value="1900000">1,900,000</option>
                        <option value="2000000">2,000,000</option>
                        <option value="2500000">2,500,000</option>
                        <option value="3000000">3,000,000</option>
                        <option value="3500000">3,500,000</option>
                        <option value="4000000">4,000,000</option>
                        <option value="4500000">4,500,000</option>
                        <option value="5000000">5,000,000</option>
                        <option value="5500000">5,500,000</option>
                        <option value="6000000">6,000,000</option>
                        <option value="6500000">6,500,000</option>
                        <option value="7000000">7,000,000</option>
                        <option value="7500000">7,500,000</option>
                        <option value="10000000">10,000,000</option>
                        <option value="15000000">15,000,000</option>
                        <option value="20000000">20,000,000</option>
                    </select>
                    <select class="form-select" name="building_size" id="building_size">
                        <option value="" selected disabled hidden>Building Size</option>
                        <option value="" >Any</option>
                        <option value="0-5000">0-5,000 sqft</option>
                        <option value="5001-10000">5,001 - 10,000 sqft</option>
                        <option value="10001-15000">10,001 - 15,000 sqft</option>
                        <option value="15001-20000">15,001 - 20,000 sqft</option>
                        <option value="20001-25000">20,001 - 25,000 sqft</option>
                        <option value="25001-30000">25,001 - 30,000 sqft</option>
                        <option value="30001-35000">30,001 - 35,000 sqft</option>
                        <option value="35001-40000">35,001 - 40,000 sqft</option>
                        <option value="40001-45000">40,001 - 45,000 sqft</option>
                        <option value="45001-50000">45,001 - 50,000 sqft</option>
                        <option value="50001-75000">50,001 - 75,000 sqft</option>
                        <option value="75001-100000">75,001 - 100,000 sqft</option>
                        <option value="100001-150000">100,001 - 150,000 sqft</option>
                        <option value="150001-200000">150,001 - 200,000 sqft</option>
                        <option value="200001-250000">200,001 - 250,000 sqft</option>
                        <option value="250001-0">Over 250,000 sqft</option>

                    </select>
                    <select class="form-select" name="land_size" id="land_size">
                        <option value="" selected disabled hidden>Land Size</option>
                        <option value=" ">Any</option>
                        <option value="1-0">1+ acres</option>
                        <option value="2-0">2+ acres</option>
                        <option value="5-0">5+ acres</option>
                        <option value="10-0">10+ acres</option>
                        <option value="50-0">50+ acres</option>
                        <option value="100-0">100+ acres</option>
                        <option value="200-0">200+ acres</option>
                        <option value="300-0">300+ acres</option>
                        <option value="400-0">400+ acres</option>
                        <option value="500-0">500+ acres</option>
                        <option value="1000-0">1000+ acres</option>
                    </select>
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-coming" role="tabpanel" aria-labelledby="pills-coming-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                {{csrf_field()}}
                    <input type="hidden" name="category_type" value="tp_developer" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>

            <div class="card">
                <div class="card-body">
                    <p>The properties under this section will be subject to reviews and will be showcased only once it has been cleared by TPR.</p>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-tp_developer" role="tabpanel" aria-labelledby="pills-tp_developer-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                {{csrf_field()}}
                    <input type="hidden" name="category_type" value="tp_developer" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-investments" role="tabpanel" aria-labelledby="pills-investments-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                {{csrf_field()}}
                    <input type="hidden" name="category_type" value="investments" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container mini-search-bar">
    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
        <li class="nav-item text-white rounded-0 m-1" role="presentation">
            <button class="nav-link text-white rounded-0 active px-2 py-1" style="background-color : #83BC3E; font-size: 0.9rem;" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true" data-aos="fade-up" data-aos-duration="500">All</button>
        </li>
        <li class="nav-item text-white rounded-0 m-1" role="presentation">
            <button class="nav-link text-white rounded-0 p-1" style="background-color : #00C1FB; font-size: 0.9rem;" id="pills-residential-tab" data-bs-toggle="pill" data-bs-target="#pills-residential" type="button" role="tab" aria-controls="pills-residential" aria-selected="true" data-aos="fade-up" data-aos-duration="500">Residential</button>
        </li>
        <li class="nav-item text-white rounded-0 m-1" role="presentation">
            <button class="nav-link text-white rounded-0 p-1" style="background-color : #83BC3E; font-size: 0.9rem;" id="pills-commercial-tab" data-bs-toggle="pill" data-bs-target="#pills-commercial" type="button" role="tab" aria-controls="pills-commercial" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Commercial</button>
        </li>
        <li class="nav-item text-white rounded-0 m-1" role="presentation">
            <button class="nav-link text-white rounded-0 p-1" style="background-color : #EB8EB0; font-size: 0.9rem;" id="pills-coming-tab" data-bs-toggle="pill" data-bs-target="#pills-coming" type="button" role="tab" aria-controls="pills-coming" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Coming Soon</button>
        </li>
        <li class="nav-item text-white rounded-0 m-1" role="presentation">
            <button class="nav-link text-white rounded-0 p-1" style="background-color : #0EA7CE; font-size: 0.9rem;" id="pills-tp_developer-tab" data-bs-toggle="pill" data-bs-target="#pills-tp_developer" type="button" role="tab" aria-controls="pills-tp_developer" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">TP Developer</button>
        </li>
        <li class="nav-item text-white rounded-0 m-1" role="presentation">
            <button class="nav-link text-white rounded-0 p-1" style="background-color : #4195E1; font-size: 0.9rem;" id="pills-investments-tab" data-bs-toggle="pill" data-bs-target="#pills-investments" type="button" role="tab" aria-controls="pills-investments" aria-selected="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">Investments</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                    {{csrf_field()}}
                    <input type="hidden" name="category_type" value="all">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                        <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i></button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;"><i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-residential" role="tabpanel" aria-labelledby="pills-residential-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                    {{csrf_field()}}
                    <input type="hidden" name="category_type" value="residential" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3 residential" aria-label="search" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>
                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-commercial" role="tabpanel" aria-labelledby="pills-commercial-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                {{csrf_field()}}
                    <input type="hidden" name="category_type" value="commercial" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3 commercial" aria-label="search" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">

                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-coming" role="tabpanel" aria-labelledby="pills-coming-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                {{csrf_field()}}
                    <input type="hidden" name="category_type" value="tp_developer" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-tp_developer" role="tabpanel" aria-labelledby="pills-tp_developer-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                {{csrf_field()}}
                    <input type="hidden" name="category_type" value="tp_developer" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>

        <div class="tab-pane fade" id="pills-investments" role="tabpanel" aria-labelledby="pills-investments-tab">
            <form method="post" action="{{route('frontend.search_result_function')}}">
                <div class="input-group">
                {{csrf_field()}}
                    <input type="hidden" name="category_type" value="investments" class="category">
                    <input type="text" name="search_keyword" class="form-control p-3" aria-label="search" data-bs-toggle="modal" data-bs-target="#exampleModal" placeholder="Search" style="border-top-left-radius: 35px; border-bottom-left-radius: 35px;">
                    <!-- <button class="btn rounded-0 text-white" style="background-color : #F177A3"><i class="bi bi-zoom-in"></i></button> -->
                    <button type="submit" class="btn text-white" style="background-color : #EB8EB0; border-top-right-radius: 35px; border-bottom-right-radius: 35px;"><i class="bi bi-search me-2"></i> Search</button>

                    <button type="button" class="btn rounded-pill ms-3 filter-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color : white; color:#259FBC; font-size: 0.8rem;">Filters <i class="bi bi-filter text-white" style="background-color: #F177A3; border-radius: 50px; padding: 0.3rem; font-size: 1rem;"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>