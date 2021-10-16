@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@push('after-styles')
    <link href="{{ url('css/login.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid p-0 banner login">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 9rem;">
                <div class="col-10">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3 class="text-white text-center mb-2">Login to your account.</h3>
                            {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
                                <div class="mb-3">
                                    <label for="email" class="form-label text-white mb-0 me-3 form-label">Email Address</label>                                    
                                    {{ html()->email('email')
                                        ->class('form-control text-white')
                                        ->attribute('maxlength', 191)
                                        ->required() }}   
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label text-white mb-0 me-3 form-label">Password</label>
                                    {{ html()->password('password')
                                        ->class('form-control text-white')
                                        ->required() }}
                                </div>

                                <div class="row mb-1">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio" id="radio">
                                            <label class="form-check-label text-white" for="flexRadioDefault1">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0 align-items-center">
                                    <div class="col-6">
                                        <a href="{{ route('frontend.auth.password.reset') }}" class="text-decoration-none text-white" style="font-size: 0.9rem;">Forgot Your Password?</a>
                                    </div>

                                    <div class="col-6 text-end">
                                        <button type="submit" class="btn login-btn w-50">Login</button>
                                    </div>
                                </div>
                            {{ html()->form()->close() }}

                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <p class="text-white mb-1" style="font-size: 1rem;">No account? <a href="{{ route('frontend.auth.register') }}" class="text-decoration-none" style="color: #FF7E00; font-size: 1.2rem;">Create one here.</a></p>
                                    
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-1 text-center">
                            <div class="vertical"></div>
                            <div class="p-2">
                                <p class="text-center text-white fw-bold center-or" style="font-size: 1.1rem;">OR</p>
                            </div>
                            <div class="vertical"></div>
                        </div>

                        <div class="col-5">
                            <div class="row justify-content-center mb-4">
                                <div class="col-5">
                                    <a href="" class="text-decoration-none text-dark">
                                        <div class="row align-items-center bg-white p-2">
                                            <div class="col-5 p-0">
                                                <img src="{{ url('img/frontend/login/fb.png') }}" alt="" class="img-fluid" style="height: 2rem;">
                                            </div>
                                            <div class="col-7 p-0">
                                                <p style="font-size: 0.9rem">Facebook</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-5">
                                    <a href="" class="text-decoration-none text-dark">
                                        <div class="row align-items-center bg-white p-2">
                                            <div class="col-5 p-0">
                                                <img src="{{ url('img/frontend/login/google.png') }}" alt="" class="img-fluid" style="height: 2rem;">
                                            </div>
                                            <div class="col-7 p-0">
                                                <p style="font-size: 0.9rem">Google</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
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

        $('#password').focus(function() {
            $(this).siblings('label').addClass('click-input');
        });
        $('#password').focusout(function() {
            if($(this).val() == '' ) {
                $(this).siblings('label').removeClass('click-input');
            }
        });
    </script>
@endpush
