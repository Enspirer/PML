<div class="container-fluid home-search" style="padding-top: 8.5rem; padding-bottom: 2rem; background-color: #e6e9eb">
    <div class="container main-menu-helper">
        <form action="{{route('frontend.property.search')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row justify-content-center">

                <div class="left-toggle hidden-xs">
                    <!-- <div class="btn-group left-toggle-btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary left-menu-btn">Left</button>
                        <button type="button" class="btn btn-secondary left-menu-btn">Middle</button>
                        <button type="button" class="btn btn-secondary left-menu-btn">Right</button>
                    </div> -->

                    <div class="btn-group btn-group-toggle left-toggle-btn-group" data-toggle="buttons">
                        <label class="btn btn-secondary left-menu-btn">
                            <input type="radio" name="sale" id="trans_sale" checked> Sale
                        </label>
                        <label class="btn btn-secondary left-menu-btn">
                            <input type="radio" name="rent" id="trans_rent"> Rent
                        </label>
                        <!-- <label class="btn btn-secondary left-menu-btn">
                            <input type="radio" name="trans_type"> Lands
                        </label> -->
                    </div>

                </div>
                <div class="col-8 mobile-search tab-search">

                    <div class="input-group">

                        <!-- search area wrapping only for mobile -->
                        <div class="search-area-wrapper">
                            <div class="search-wrapper">

                                <input type="text" id="search" name="search_keyword" class="form-control p-4 rounded-0" aria-label="search" placeholder="Search">

                                <!-- <div id="search-result"></div> -->

                            </div>


                            @if(Request::segment(1) == 'search_result_filter')
                            <input type="hidden" name="transaction_type" value="{{$transaction_type}}">
                            @else
                            <input type="hidden" name="transaction_type" value="transaction_type">
                            @endif

                            <button type="submit" class="btn text-white rounded-0 px-4"
                                style="background-color : #35495E; height:50px;border:0;"><i
                                    class="fas fa-search"></i></button>
                        </div>
                        <!--end of search area wrapping only for mobile -->

                        <button type="button" class="btn text-white rounded-0 border-start"
                            style="background-color : #35495E;height:50px;border:0;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><span class="hidden-xs">Filter</span>
                            <img src="{{ url('img/frontend/index/filter.png') }}" alt="" class="ms-3 mobile-margin-zero"
                                style="height: 1rem;">
                        </button>
                    </div>
                </div>


                <div class="left-toggle visible-xs">
                    <!-- <div class="btn-group left-toggle-btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary left-menu-btn">Left</button>
                        <button type="button" class="btn btn-secondary left-menu-btn">Middle</button>
                        <button type="button" class="btn btn-secondary left-menu-btn">Right</button>
                    </div> -->

                    <div class="btn-group btn-group-toggle left-toggle-btn-group" data-toggle="buttons">
                        <label class="btn btn-secondary left-menu-btn">
                            <input type="radio" name="sale" id="trans_sale"> Sale
                        </label>
                        <label class="btn btn-secondary left-menu-btn">
                            <input type="radio" name="rent" id="trans_rent"> Rent
                        </label>
                        <!-- <label class="btn btn-secondary left-menu-btn">
                            <input type="radio" name="trans_type"> Lands
                        </label> -->
                    </div>

                </div>
                <div class="my-menu">
                    <!-- <button type="button" class="btn text-white rounded-0 border-start" style="background-color : #35495E; height:50px;"             
                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                    >Main Menu
                        <i class="fas fa-bars"></i>
                        </button> -->

                    <button type="button" onclick="mainMenuFunction()" class="btn text-white rounded-0 border-start"
                        style="background-color : #35495E; height:50px;">Main Menu
                        <i class="fas fa-bars" disabled></i>
                    </button>
                    <!-- main menu content -->
                    <div id="contentMenu" class="main-menu-content" style="display:none;">
                        <div class="main-menu-inner ">
                            <button type="button" id="closeMainMenu" onclick="closeMenu()"><i
                                    class="fas fa-times"></i></button>
                            <div class="menu-content-wrapper hidden-xs">
                                <div class="menu-icon-card-row">

                                    @if(count(App\Models\Category::where('status','Enabled')->orderBy('order','ASC')->where('is_feature',1)->get()) != 0)
                                        @foreach(App\Models\Category::where('status','Enabled')->orderBy('order','ASC')->where('is_feature',1)->get() as $industry)
                                            <a class="menu-icon-card" href="{{route('frontend.homeloan',$industry->id)}}">
                                                <div>
                                                <img class="menu-card-img" src="{{ uploaded_asset($industry->icon) }}" alt="">

                                                    <p style="text-align:center; padding-top:5px;">{{$industry->name}}</p>
                                                </div>

                                            </a>
                                        @endforeach
                                    @endif

                                    <!-- <a class="menu-icon-card" href="">
                                        <div>
                                        <img src="{{ url('img/frontend/index/house.png') }}" alt="" style="width:100%;">

                                            <p>Construction</p>
                                        </div>
                                    </a>


                                    <a class="menu-icon-card" href="">
                                        <div>
                                        <img src="{{ url('img/frontend/index/livingroom.png') }}" alt="" style="width:100%;">

                                            <p>Interior Designs</p>
                                        </div>
                                    </a>

                                    <a class="menu-icon-card" href="">
                                        <div>
                                        <img src="{{ url('img/frontend/index/mortgage.png') }}" alt="" style="width:100%;">

                                            <p>Insurance</p>
                                        </div>
                                    </a>

                                    <a class="menu-icon-card" href="">
                                        <div>
                                        <img src="{{ url('img/frontend/index/compass.png') }}" alt="" style="width:100%;">

                                            <p>Vaastu</p>
                                        </div>
                                    </a> -->
                                </div>

                            </div>

                            <!-- mobile main menu -->
                            <div class="menu-content-wrapper visible-xs">
                                <div class="mobile-menu-icon-card-wrapper">

                                    @if(count(App\Models\Category::where('status','Enabled')->orderBy('order','ASC')->where('is_feature',1)->get()) != 0)
                                        @foreach(App\Models\Category::where('status','Enabled')->orderBy('order','ASC')->where('is_feature',1)->get() as $industry)
                                            <a class="menu-icon-card" href="{{route('frontend.homeloan',$industry->id)}}">
                                                <div class="mobile-menu-item">
                                                <img class="menu-card-img" src="{{ uploaded_asset($industry->icon) }}" alt="">

                                                    <p style="text-align:center; padding-top:5px;color:#fff;">{{$industry->name}}</p>
                                                </div>

                                            </a>
                                        @endforeach
                                    @endif

                                    <!-- <a class="menu-icon-card" href="">
                                        <div>
                                        <img src="{{ url('img/frontend/index/house.png') }}" alt="" style="width:100%;">

                                            <p>Construction</p>
                                        </div>
                                    </a>


                                    <a class="menu-icon-card" href="">
                                        <div>
                                        <img src="{{ url('img/frontend/index/livingroom.png') }}" alt="" style="width:100%;">

                                            <p>Interior Designs</p>
                                        </div>
                                    </a>

                                    <a class="menu-icon-card" href="">
                                        <div>
                                        <img src="{{ url('img/frontend/index/mortgage.png') }}" alt="" style="width:100%;">

                                            <p>Insurance</p>
                                        </div>
                                    </a>

                                    <a class="menu-icon-card" href="">
                                        <div>
                                        <img src="{{ url('img/frontend/index/compass.png') }}" alt="" style="width:100%;">

                                            <p>Vaastu</p>
                                        </div>
                                    </a> -->
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </form>

    </div>
</div>


