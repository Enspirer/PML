@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@push('after-styles')
    <link href="{{ url('css/contact_us.css') }}" rel="stylesheet">
@endpush

@section('content')

  

<div class="container" style="padding:180px 50px 150px 50px">

    <h3 class="mb-5">Marketing Services</h3>

    {!! get_settings('marketing_services_content') !!}
        
</div>



@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif

    
@endpush

