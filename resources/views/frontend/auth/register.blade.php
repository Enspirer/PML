@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@push('after-styles')
    <link href="{{ url('css/register.css') }}" rel="stylesheet">
@endpush

@section('content')

<form>
    <div class="container-fluid p-0 banner login">
        <div class="container">
            <div class="row justify-content-center" style="padding-top: 8rem;">
                <div class="col-10">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <h3 class="text-white text-center mb-2">Create your account.</h3>

                            <div class="mb-4">
                                <label for="first_name" class="form-label text-white mb-0 me-3 form-label">First Name</label>
                                <input type="text" class="form-control text-white" name="first_name" id="first_name">
                            </div>

                            <div class="mb-4">
                                <label for="last_name" class="form-label text-white mb-0 me-3 form-label">Last Name</label>
                                <input type="text" class="form-control text-white" name="last_name" id="last_name">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label text-white mb-0 me-3 form-label">Email Address</label>
                                <input type="text" class="form-control text-white" value="" name="email" id="email">
                            </div>
                        </div>

                        <div class="col-2 text-center">
                            <div class="vertical"></div>
                        </div>

                        <div class="col-5">
                            <h3 class="text-white text-center bottom"></h3>
                            <div class="mb-2">
                                <label for="password" class="form-label text-white mb-0 me-3 form-label">Password</label>
                                <input type="password" class="form-control text-white" id="password" name="password" aria-describedby="password">
                            </div>

                            <div class="mb-2">
                                <label for="password" class="form-label text-white mb-0 me-3 form-label">Confirm Password</label>
                                <input type="password" class="form-control text-white" id="confirm_password" name="confirm_password" aria-describedby="password">
                            </div>

                            <div class="mb-2 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                <label class="form-check-label text-white" for="exampleCheck1" style="font-size: 0.9rem; color: #747272">I agree to the Terms of Use/Privacy Policy</label>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-6">
                                    <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" style="transform: scale(0.77); -webkit-transform: scale(0.77); transform-origin: 0 0; -webkit-transform-origin: 0 0; padding-top: 2rem"></div>
                                </div>

                                <div class="col-6 text-end">
                                    <button type="submit" class="btn register-btn w-50">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif


    <script>
        $('#first_name').focus(function() {
            $(this).siblings('label').addClass('click-input');
        });

        $('#first_name').focusout(function() {
            if($(this).val() == '' ) {
                $(this).siblings('label').removeClass('click-input');
            }
        });

        $('#last_name').focus(function() {
            $(this).siblings('label').addClass('click-input');
        });
        $('#last_name').focusout(function() {
            if($(this).val() == '' ) {
                $(this).siblings('label').removeClass('click-input');
            }
        });

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

        $('#confirm_password').focus(function() {
            $(this).siblings('label').addClass('click-input');
        });
        $('#confirm_password').focusout(function() {
            if($(this).val() == '' ) {
                $(this).siblings('label').removeClass('click-input');
            }
        });
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>
@endpush
