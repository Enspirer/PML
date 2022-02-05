@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@push('after-styles')

@endpush

@section('content')

<section class="section-about-banner" id="section-about-banner">
    <img src="{{url('img/about-banner.png')}}" alt="">
    <div class="inner-wrapper">
        <div class="banner-content">
            <span class="title">Our Story</span>
            <p class="content">You should take this opportunity to show your communication skills by speaking clearly and concisely in an organized manner. Because there is no right or wrong answer for this question, it is important to appear friendly.</p>
        </div>
    </div>
</section>

<section class="section-about-content" id="section-about-content">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="image-container">
                    <img src="{{url('img/about-meeting.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-5">
                <div class="inner-content">
                <span class="title">ABOUT<span class="title-strong">THE COMPANY.</span></span>
                <p class="content">Tropical Property Realtor is your premium property and real estate listing website featuring exclusive properties from multiple locations around the world. Featuring residential, commercials, investment properties and a host of other real estate opportunities for rent and sale around the world, Tropical Property permits anyone to submit property for sale, property for rent, land sales and any other property ads in key locations such as Sri Lanka, India, Brazil, Indonesia, Thailand and Canada to name a few. </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p class="paragraph">Tropical Property Realtor is your premium property and real estate listing website featuring exclusive properties from multiple locations around the world. Featuring residential, commercials, investment properties and a host of other real estate opportunities for rent and sale around the world, Tropical Property permits anyone to submit property for sale, property for rent, land sales and any other property ads in key locations such as Sri Lanka, India, Brazil, Indonesia, Thailand and Canada to name a few. </p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('after-scripts')

@endpush