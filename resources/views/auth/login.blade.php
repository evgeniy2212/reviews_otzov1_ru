@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place profile-content-place d-flex flex-column justify-content-center align-items-center">
            <div class="loginForm">
                @if($errors->any())
                    <div class="errorMessage">{!! $errors->first() !!}</div>
                @else
                    <div class="headFormName">@lang('service/index.welcome')</div>
                @endif
                <form method="POST" action="{{ route('login') }}" novalidate="" id="loginForm">
                    @csrf
                    <div class="form-group d-md-flex flex-md-wrap align-items-md-center">
                        <div class="col-md-3">
                            <label for="email">@lang('service/index.email_enter')</label>
                        </div>
                        <div class="col-md-6">
                            <input id="email"
                                   type="email"
                                   class="form-control input"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required autocomplete="email">

                            {{--<div class="invalid-feedback">Please fill out this field.</div>--}}
                            {{--@error('email')--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $message }}</strong>--}}
                            {{--</span>--}}
                            {{--@enderror--}}
                        </div>
                    </div>

                    <div class="form-group d-md-flex flex-md-wrap align-items-md-center">
                        <div class="col-md-3">
                            <label for="password">@lang('service/index.password_enter')</label>
                        </div>
                        <div class="col-md-6">
                            <input id="password"
                                   type="password"
                                   class="form-control input"
                                   name="password"
                                   required autocomplete="current-password">

                            {{--@error('password')--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $message }}</strong>--}}
                            {{--</span>--}}
                            {{--@enderror--}}
                        </div>
                        <div class="col-md-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('service/index.forgot_password_question') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="d-sm-flex justify-content-sm-center">
                        <div class="col-sm-6">
                            {!! NoCaptcha::renderJs('en') !!}
                            {!! NoCaptcha::display(['data-size' => 'normal']) !!}
                        </div>
                    </div>
                    <div class="form-group d-flex flex-wrap justify-content-center align-items-center profile-btn-holder">
                        <div class="col-12 col-sm-3">
                            <button type="submit" class="loginButton submitLoginButton">
                                @lang('service/index.sign_in')
                            </button>
                        </div>
                        <div class="col-12 col-sm-6">
                            <button type="submit" name="remember" value="1" class="rememberButton submitLoginButton">
                                @lang('service/index.sign_in_and_remember')
                            </button>
                        </div>
                        <div class="col-12 col-sm-3">
                            <a role="button" href="{{ route('home') }}" id="cancelButton">
                                @lang('service/index.cancel')
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="create-account" id="createAccount">
                <a role="button" class="create-account__link" href="{{ LaravelLocalization::localizeUrl('/register') }}">
                    @lang('register.create_account')
                </a>
            </div>
        </div>
    </div>
@endsection

