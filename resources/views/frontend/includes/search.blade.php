<div class="container-fluid home-search" style="padding-top: 8.5rem; padding-bottom: 2rem; background-color: #e6e9eb">
    <div class="container">
        <form action="{{route('frontend.property.search')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="row justify-content-center">
                
                <div class="left-toggle">
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
                            <input type="radio" name="trans_type"> Land
                        </label> -->
                    </div>

                </div>
                <div class="col-8">
                    
                        <div class="input-group">
                            
                            <div class="search-wrapper">

                                <input type="text" id="search-word" name="search_keyword" class="form-control p-4 rounded-0" aria-label="search"
                                 placeholder="Search">

                                <div id="search-result"></div>

                            </div>
                            

                            @if(Request::segment(1) == 'search_result_filter')
                            <input type="hidden" name="transaction_type" value="{{$transaction_type}}">
                            @else
                            <input type="hidden" name="transaction_type" value="transaction_type">
                            @endif

                            <button type="submit" class="btn text-white rounded-0 px-4"
                                style="background-color : #35495E; height:50px;border:0;"><i class="fas fa-search"></i></button>

                            <button type="button" class="btn text-white rounded-0 border-start"
                                style="background-color : #35495E;height:50px;border:0;" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Filter
                                <img src="{{ url('img/frontend/index/filter.png') }}"
                                    alt="" class="ms-3" style="height: 1rem;">
                                </button>
                        </div>
                </div>

                <div class="my-menu">
                    <button type="button" class="btn text-white rounded-0 border-start" style="background-color : #35495E; height:50px;"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">Main Menu
                        <i class="fas fa-bars"></i>
                        </button>
                </div>
            </div>
        </form>

    </div>
</div>