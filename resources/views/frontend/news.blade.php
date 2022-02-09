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
        @if(count($trending_news) != 0)
            <div class="row">
                <div class="col marquee">
                    <span class="marquee-head">Trending News</span>
                    <marquee behavior="scroll" direction="left">
                        @foreach($trending_news as $key => $trending)
                            <span class="trending-news"><svg width="8" height="8"><circle cx="4" cy="4" r="4" fill="#35495E" /></svg>  {{$trending->title}}</span>
                        @endforeach
                    </marquee>
                </div>
            </div>
        @endif
    </div>
</section>

<section id="section-news-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                @if(count($property_news) == 0)

                    @include('frontend.includes.not_found',[
                        'not_found_title' => 'News not Found',
                        'not_found_description' => null,
                        'not_found_button_caption' => null
                    ])

                @else
                    <div class="news-list">
                        @foreach($property_news as $key => $pro_news)
                            <div class="single-news">
                                <a href="">
                                    <div class="title">{{$pro_news->title}}</div>
                                    <div class="news-content">
                                        <div class="image">
                                        <img src="{{uploaded_asset($pro_news->feature_image)}}" width="280px" height="170px" style="object-fit:cover" alt="">
                                        </div>
                                        <div class="content">
                                            <div class="news-para" style="overflow: hidden;text-overflow: ellipsis;height: 130px;">{!!$pro_news->description!!}</div>
                                            <div class="date">{{ $pro_news->created_at->format('d M Y') }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        
                    </div>
                @endif

            </div>
            <div class="col-lg-5">
                @if(count($most_viewed_news) != 0)
                    <div class="row">
                        <div class="col">
                            <div class="most-viewed">
                                <div class="title">Most Viewed</div>
                                <ul class="most-viewed-news">
                                    @foreach($most_viewed_news as $key => $most_viewed)
                                        <li><i class="bi bi-caret-right-fill"></i><a href="">{{$most_viewed->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($trending_news) != 0)
                    <div class="row">
                        <div class="col">
                            <div class="trending-now">
                                <div class="title">Trending Now</div>
                                <div class="inner-wrapper">
                                    
                                    @foreach($trending_news as $key => $trending)
                                        <div class="trending-news">
                                            <div class="image">
                                                <img src="{{ uploaded_asset($trending->feature_image) }}" style="height:140px; object-fit:cover;" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="content-title">{{$trending->title}}</div>
                                                <!-- <div class="author">Carmelo Benilla</div> -->
                                                <div class="date">{{ $trending->created_at->format('d M Y') }}</div>
                                                <div class="news-para">{!!$trending->description!!}</div>
                                                <a class="read-more" href="">Read More <ion-icon name="chevron-forward-circle-outline"></ion-icon></a>
                                            </div>
                                        </div>
                                    @endforeach                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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
            <!-- <ul class="pagination">
                <li class="page-item"><a href="" class="page-link">Previous</a></li>
                <li class="page-item"><a href="" class="page-link active">1</a></li>
                <li class="page-item"><a href="" class="page-link">2</a></li>
                <li class="page-item"><a href="" class="page-link">3</a></li>
                <li class="page-item"><a href="" class="page-link">4</a></li>
                <li class="page-item"><a href="" class="page-link">5</a></li>
                <li class="page-item"><a href="" class="page-link">Next</a></li>
            </ul> -->
            <div class="md-5">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">{{ $property_news->links() }}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@endpush