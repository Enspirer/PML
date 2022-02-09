@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')

@endpush

@section('content')

@include('frontend.includes.search')

<section id="news-heading">
    <div class="container">
        <div class="row">
            <div class="col breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-link">Property Market Live</a>
                <a class="breadcrumb-link active">Hot News</a>
            </div>
        </div>
        <div class="row">
            <div class="col marquee">
                <span class="marquee-head">Trending News</span>
                <marquee behavior="scroll" direction="left">
                    <span class="trending-news"><svg width="8" height="8"><circle cx="4" cy="4" r="4" fill="#35495E" /></svg>  Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                    
                    <span class="trending-news"><svg width="8" height="8"><circle cx="4" cy="4" r="4" fill="#35495E" /></svg>Illum earum doloremque, porro autem voluptates excepturi id? Enim cupiditate earum pariatur corporis molestias officiis. Tenetur explicabo possimus eius deserunt. Magni, at?</span>
                </marquee>
            </div>
        </div>
    </div>
</section>

<section id="section-news-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="news-list">
                    <div class="single-news">
                        <a href="">
                            <div class="title">Price of houses and apartments rise to an all-time high</div>
                            <div class="news-content">
                                <div class="image">
                                    <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="news-para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? </div>
                                    <div class="date">February 7, 2022 8:42 am</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-news">
                        <a href="">
                            <div class="title">Price of houses and apartments rise to an all-time high</div>
                            <div class="news-content">
                                <div class="image">
                                    <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="news-para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? </div>
                                    <div class="date">February 7, 2022 8:42 am</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-news">
                        <a href="">
                            <div class="title">Price of houses and apartments rise to an all-time high</div>
                            <div class="news-content">
                                <div class="image">
                                    <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="news-para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? </div>
                                    <div class="date">February 7, 2022 8:42 am</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-news">
                        <a href="">
                            <div class="title">Price of houses and apartments rise to an all-time high</div>
                            <div class="news-content">
                                <div class="image">
                                    <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="news-para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? </div>
                                    <div class="date">February 7, 2022 8:42 am</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-news">
                        <a href="">
                            <div class="title">Price of houses and apartments rise to an all-time high</div>
                            <div class="news-content">
                                <div class="image">
                                    <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="news-para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? </div>
                                    <div class="date">February 7, 2022 8:42 am</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-news">
                        <a href="">
                            <div class="title">Price of houses and apartments rise to an all-time high</div>
                            <div class="news-content">
                                <div class="image">
                                    <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="news-para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? </div>
                                    <div class="date">February 7, 2022 8:42 am</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-news">
                        <a href="">
                            <div class="title">Price of houses and apartments rise to an all-time high</div>
                            <div class="news-content">
                                <div class="image">
                                    <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="news-para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? </div>
                                    <div class="date">February 7, 2022 8:42 am</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-news">
                        <a href="">
                            <div class="title">Price of houses and apartments rise to an all-time high</div>
                            <div class="news-content">
                                <div class="image">
                                    <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                </div>
                                <div class="content">
                                    <div class="news-para">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Fugit, dolor. Ex at quisquam voluptatem minus sed amet, aut placeat sit eum
                                        deleniti praesentium consequuntur in? Repellat accusantium laboriosam voluptatum
                                        quia? </div>
                                    <div class="date">February 7, 2022 8:42 am</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col">
                        <div class="most-viewed">
                            <div class="title">Most Viewed</div>
                            <ul class="most-viewed-news">
                                <li><i class="bi bi-caret-right-fill"></i><a href="">Lorem ipsum, dolor sit amet</a></li>
                                <li><i class="bi bi-caret-right-fill"></i><a href="">Consectetur adipisicing elit</a></li>
                                <li><i class="bi bi-caret-right-fill"></i><a href="">Libero corrupti ab odio vitae officiis maxime</a></li>
                                <li><i class="bi bi-caret-right-fill"></i><a href="">Laboriosam fuga iure. Repellat ducimus labore</a></li>
                                <li><i class="bi bi-caret-right-fill"></i><a href="">Adipisci quibusdam placeat cumque esse minus sit dolorem</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="trending-now">
                            <div class="title">Trending Now</div>
                            <div class="inner-wrapper">
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                                <div class="trending-news">
                                    <div class="image">
                                        <img src="{{url('img/frontend/news/news-image.png')}}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="content-title">Interior Design Guide lines</div>
                                        <div class="author">Carmelo Benilla</div>
                                        <div class="date">January 10, 2022</div>
                                        <div class="news-para">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Quae incidunt quia totam atque a enim, reiciendis nemo deleniti cumque
                                            beatae ducimus, officiis eligendi eius assumenda at consectetur magni
                                            debitis ea.</div>
                                        <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-pagination">
    <div class="container">
        <div class="row">
            <div class="image">
                <img src="{{url('img/frontend/news/pagination.png')}}" alt="">
            </div>
        </div>
        <div class="row">
            <ul class="pagination">
                <li class="page-item"><a href="" class="page-link">Previous</a></li>
                <li class="page-item"><a href="" class="page-link active">1</a></li>
                <li class="page-item"><a href="" class="page-link">2</a></li>
                <li class="page-item"><a href="" class="page-link">3</a></li>
                <li class="page-item"><a href="" class="page-link">4</a></li>
                <li class="page-item"><a href="" class="page-link">5</a></li>
                <li class="page-item"><a href="" class="page-link">Next</a></li>
            </ul>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@endpush