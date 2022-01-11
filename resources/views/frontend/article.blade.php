@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')
<link href="{{ url('css/index.css') }}" rel="stylesheet">
<link href="{{ url('css/article.css') }}" rel="stylesheet">
@endpush

@section('content')


@include('frontend.includes.search')

<div class="container index" style="margin-top: 2rem;">
    <div class="row">
        <div class="col-12">
            <p><a href="/" class="text-decoration-none text-dark fw-bold">Property Market Live</a>
                >
                <a href="#" class="text-decoration-none text-dark fw-bold">
                    Home Loan
                </a>

                > <a href="#" class="text-decoration-none text-dark fw-bold">Article</a>
                > <a href="#" class="text-decoration-none text-dark fw-bold">Property Constructions</a>
            </p>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 2rem;">
    <div class="row">
        <div class="col-8 col-xs-12 col-tab-12 article-main-area">
            <img src="{{ url('img/frontend/article-page/construction-large.png') }}" alt="">
            <h1>Property Constructions</h1>
            <p class="article-date-time">January 10, 2022 07.32pm</p>
            <h2>Before You Move In to Your New Home</h2>
            <p>Before you go to settlement on your purchase of a newly constructed home, you and your builder will do a
                walk-through to conduct a final inspection.</p>
            <p>This walk-through provides an opportunity to spot items which may need to be corrected or adjusted, learn
                about the way your new home works and ask questions about anything you don’t understand.</p>
            <p>Often, a builder will use the walk-through to educate buyers about:</p>

            <h2>The operation of the house’s components.</h2>
            <p>The buyer’s responsibilities for maintenance and upkeep. Warranty coverage and procedures.
                The larger community in which the home is located. Operation of Home Components When you buy a new
                appliance or piece of equipment, such as a printer or a washing machine, you usually have to read the
                instructions before you understand how to use all of the features. With a new house, you will receive a
                stack of instruction booklets all at once. It helps if someone takes the time to show you how to operate
                all of the kitchen appliances, heating and cooling systems, water heater and other features. Such an
                orientation is particularly useful because people often are so busy during a move that they have trouble
                finding time to carefully read instruction booklets.
            </p>
            <h2>Maintenance Responsibilities</h2>
            <p>Part of your walk-through will be learning about maintenance and upkeep responsibilities. Most new homes
                come with a one-year warranty on workmanship and materials. However, such warranties do not cover
                problems that develop because of failure to perform required maintenance. Many builders provide a
                booklet explaining common upkeep responsibilities of new home owners and how to perform them.</p>
            <p>Should a warranted problem arise after you move in, the builder is likely to have a set of warranty
                service procedures to follow. Except in emergencies, requests for service should be in writing. This
                helps to ensure that everyone clearly understands the service to be performed.</p>
            <p>
                Builder Visits During the Year<br>
                Many builders schedule two visits during the first year &mdash one near the beginning and the other near
                the end &mdash to make necessary adjustments and to perform work of a non-emergency nature. Don’t expect
                a builder to rush out immediately for a problem such as a nail pop in your drywall. Such problems occur
                because of the natural settling of the house and are best addressed in one visit near the end of the
                first year.
            </p>
            <p>Your Inspection Checklist<br>
                Create a checklist when inspecting the house. The list should include everything that needs attention,
                and you and your builder should agree to a timetable for repairs. Builders prefer to remedy problems
                before you move in because it is easier to work in an empty house. Some items may have to be corrected
                after move-in. For instance, if your walk-through is in the winter, your builder may have to delay
                landscaping adjustments until spring.
            </p>
            <p>It is important that you be thorough and observant during the walk-through. Examine all surfaces of
                counters, fixtures, floors and walls for possible damage carefully. Sometimes disputes arise because a
                buyer may discover a gouge in a counter top after move-in, and there is no way to prove whether it was
                caused by the builder’s workers or the buyer’s movers. Many builders ask their buyers to sign a form at
                the walk-through stating that all surfaces have been inspected and that there is no damage other than
                what has been noted on the walk-through checklist.</p>



        </div>
        <div class="col-4 col-xs-12 col-tab-12">
            <div class="most-viewed-wrapper">
                <h2 class="side-title">Most Viewed</h2>
                <ul class="most-viewed">
                    <li><i class="fas fa-play"></i>
                    <span class="most-viewed-txt">
                    Before You Move In to Your New Home
                    </span></li>
                    <li><i class="fas fa-play"></i>
                    <span class="most-viewed-txt">
                    Interior Designing Guide lines
                    </span>
                    </li>
                    <li><i class="fas fa-play"></i>
                    <span class="most-viewed-txt">
                    The operation of the house’s components.
                    </span>
                </li>
                    <li><i class="fas fa-play"></i>
                    <span class="most-viewed-txt">Maintenance Responsibilities</span></li>
                    <li><i class="fas fa-play"></i>  <span class="most-viewed-txt">Before You Move In to Your New Home</span></li>
                </ul>
            </div>

            <div class="trending-wrapper">
                <h2 class="side-title">Trending Now</h2>
                <a href="#" style="text-decoration:none;color:#000;">
                    <div class="trending-card">
                        <img src="{{ url('img/frontend/article-page/trending1.png') }}" alt="">
                        <div class="trending-card-txt-wrapper">
                            <div class="txt-inner-wrapper">
                                <h3>Interior Designing Guide lines</h3>
                                <h4>Carmelo Benilla Jr</h4>
                                <p class="trending-card-date-time">January 10, 2022</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error asperiores corporis illo magnam eligendi laborum facere! Dolor necessitatibus quidem suscipit vitae voluptate quos? Aliquam eligendi nesciunt optio atque id! Tempora!</p>
                            </div>
                            <button type="button" class="trending-more-btn">Read More<i class="fas fa-chevron-circle-right"></i></button>
                        </div>
                    </div>
                </a>

                <a href="#" style="text-decoration:none;color:#000;">
                    <div class="trending-card">
                        <img src="{{ url('img/frontend/article-page/trending2.png') }}" alt="">
                        <div class="trending-card-txt-wrapper">
                            <div class="txt-inner-wrapper">
                                <h3>Interior Designing Guide lines</h3>
                                <h4>Carmelo Benilla Jr</h4>
                                <p class="trending-card-date-time">January 10, 2022</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error asperiores corporis illo magnam eligendi laborum facere! Dolor necessitatibus quidem suscipit vitae voluptate quos? Aliquam eligendi nesciunt optio atque id! Tempora!</p>
                            </div>
                            <button type="button" class="trending-more-btn">Read More<i class="fas fa-chevron-circle-right"></i></button>
                        </div>
                    </div>
                </a>

                <a href="#" style="text-decoration:none;color:#000;">
                    <div class="trending-card">
                        <img src="{{ url('img/frontend/article-page/trending3.png') }}" alt="">
                        <div class="trending-card-txt-wrapper">
                            <div class="txt-inner-wrapper">
                                <h3>Interior Designing Guide lines</h3>
                                <h4>Carmelo Benilla Jr</h4>
                                <p class="trending-card-date-time">January 10, 2022</p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error asperiores corporis illo magnam eligendi laborum facere! Dolor necessitatibus quidem suscipit vitae voluptate quos? Aliquam eligendi nesciunt optio atque id! Tempora!</p>
                            </div>
                            <button type="button" class="trending-more-btn">Read More<i class="fas fa-chevron-circle-right"></i></button>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>




@endsection

@push('after-scripts')




<!-- youtube script -->
<script>
$(document).ready(function() {

    // if($latest_post->type == null) {
    //     let post_type = null;
    // } else {
    //    
    // }

    //Main post showing
    // if(post_type != 'youtube') {
    //     $('.article').removeClass('d-none');
    // } else {
    //     $('.video').removeClass('d-none');
    // }


    //righside - article click
    $('.right .article').on('click', function() {

        $('.center .video').addClass('d-none');
        $('.center .article').removeClass('d-none');
        let vid = $('.center .video iframe').attr('src');
        $('.center .video iframe').attr('src', vid);
        let image = $(this).find('img').attr('src');
        $(".main-image").attr("src", image);
        let title = $(this).find('h6').text();
        $(".title").text(title);
        let description = $(this).find('.paragraph').text();
        $(".description div").text(description);


    });

    // oe7eVN2azBo

    //rightside - video click
    $('.right .video').on('click', function() {
        $('.center .video').removeClass('d-none');
        $('.center .article').addClass('d-none');
        let link = $(this).find('.video-value').val();
        let video = 'https://www.youtube.com/embed/' + link;
        $('.center .video iframe').attr('src', video);
        let title = $(this).find('h6').text();
        $(".title").text(title);
        let description = $(this).find('.paragraph').text();
        $(".description div").text(description);


    });
});
</script>



@endpush