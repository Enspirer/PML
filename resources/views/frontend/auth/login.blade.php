@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@push('after-styles')
    <link href="{{ url('css/login.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid p-0 banner login">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 11rem;">
                <div class="col-10">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="text-white text-center mb-3">Login to your account.</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="email" class="form-label text-white mb-0 ml-3 form-label">Email Address</label>
                                    <input type="text" class="form-control text-white" value="" name="email" id="email">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label text-white mb-0 ml-3 form-label">Password</label>
                                    <input type="password" class="form-control text-white" id="password" name="password" aria-describedby="password">
                                </div>

                                <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="radio" id="radio">
                                            <label class="form-check-label text-white" for="flexRadioDefault1">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4 align-items-center">
                                    <div class="col-6">
                                        <a href="#" class="text-decoration-none text-white">Forgot Your Password?</a>
                                    </div>

                                    <div class="col-6 text-end">
                                        <button type="submit" class="btn login-btn w-50">Login</button>
                                    </div>
                                </div>
                            </form>

                            <!-- <div class="row align-items-center mt-3">
                                <div class="col-5 pr-0">
                                    <hr class="m-0">
                                </div>
                                <div class="col-2 text-center">
                                    <p class="text-white mb-0">or</p>
                                </div>
                                <div class="col-5 pl-0">
                                    <hr class="m-0">
                                </div>
                            </div> -->

                            <div class="row justify-content-center mt-3">
                                <div class="col-12">
                                    <p class="text-white mb-1" style="font-size: 1rem;">No account? <a href="#" class="text-decoration-none" style="color: #FF7E00; font-size: 1.2rem;">Create one here.</a></p>
                                    
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
