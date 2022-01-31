@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@push('after-styles')
    <link href="{{ url('css/login.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid p-0 banner login">
        <div class="container">
            <div class="row justify-content-center mobile-padding-30" style="padding-top: 9rem;">
                <div class="col-10">
                    @include('includes.partials.messages')

                    <div class="row d-flex justify-content-center mobile-login-area">

                        <div class="col-6 col-xs-12 col-tab-12 mt-4">
                            <h3 class="text-white text-center mb-5 mobile-login-title">Reset Password</h3>
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{ html()->form('POST', route('frontend.auth.password.email.post'))->open() }}
                                <div class="mb-3 mt-4">
                                    <label for="email" class="form-label text-white mb-0 me-3 form-label">Email Address</label>                                    
                                    {{ html()->email('email')
                                        ->class('form-control text-white')
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }} 
                                </div>                           
                               
                                <div class="row mb-0 d-flex justify-content-center">
                                   
                                    <div class="col-8 text-start">
                                        <button type="submit" class="btn login-btn w-100">Send Password Reset Link</button>
                                    </div>
                                    <div class="col-4 text-end">
                                        <a href="{{route('frontend.auth.login')}}" type="submit" class="btn login-btn w-100 text-light">Login</a>
                                    </div>
                                </div>
                            {{ html()->form()->close() }}
                            
                        </div>                        
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif

<script>
    $('#email').focus(function() {
        $(this).siblings('label').addClass('click-input');
    });
    $('#email').focusout(function() {
    if($(this).val() == '' ) {
        $(this).siblings('label').removeClass('click-input');
        }
    });
   
    $('#email')
        .each(function(element, i) {
            if ((element.value !== undefined && element.value.length > 0) || $(this).attr('placeholder') !== null) {
                $(this).siblings('label').addClass('click-input');
            } else {
                $(this).siblings('label').removeClass('click-input');
            }
        });
</script>
@endpush
