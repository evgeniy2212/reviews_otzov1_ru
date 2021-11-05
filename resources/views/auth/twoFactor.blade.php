@extends('layouts.app')

@section('style_section')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="content-place profile-content-place d-flex flex-column justify-content-center align-items-center">
            <div class="twoFactorForm">
                @if($errors->any())
                    <div class="errorMessage">{!! $errors->first() !!}</div>
                @else
                    <div class="headFormName">@lang('register.two_factor_auth')</div>
                @endif
                {{--@if($errors->has('two_factor_code'))--}}
                {{--<div class="invalid-feedback">--}}
                {{--{{ $errors->first('two_factor_code') }}--}}
                {{--</div>--}}
                {{--@endif--}}
                <p class="text-muted">
                    @lang('register.two_factor_code') <a href="{{ route('verify.resend') }}">@lang('service/index.click_here')</a>.
                </p>
                <form method="POST" action="{{ route('verify.store') }}" novalidate="" id="">
                    @csrf
                    <div class="form-group d-md-flex align-items-md-center">
                        <div class="col-md-3">
                            <label for="email">@lang('service/admin.enter_two_factor_code')</label>
                        </div>
                        <div class="col-md-6">
                            <input id="two_factor_code"
                                   type="text"
                                   class="form-control input"
                                   name="two_factor_code"
                                   required>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <div class="col-md-3">
                            <button type="submit" class="loginButton submitLoginButton">
                                @lang('service/index.verify')
                            </button>
                        </div>
                        <div class="col-md-3">
                            <a role="button" id="cancelButton" href="{{ LaravelLocalization::localizeUrl('/logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                @lang('service/index.cancel')
                            </a>
                            {{--<a role="button" href="{{ route('home') }}" id="cancelButton">--}}
                            {{--Cancel--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
