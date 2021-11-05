@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place d-md-flex flex-md-column justify-content-md-center align-items-md-center">
            <div class="loginForm">
                @if($errors->any())
                    <div class="errorMessage">{!! $errors->first() !!}</div>
                @else
                    <div class="headFormName">{{ __('Reset Password') }}</div>
                @endif
                <form method="POST" action="{{ route('password.update') }}" novalidate="" id="loginForm">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group d-md-flex align-items-md-center">
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
                        </div>
                    </div>
                    <div class="form-group d-md-flex align-items-md-center">
                        <div class="col-md-3">
                            <label for="password">@lang('service/index.password_enter')</label>
                        </div>
                        <div class="col-md-6">
                            <input id="password"
                                   type="password"
                                   class="form-control input"
                                   name="password"
                                   required autocomplete="current-password">
                        </div>
                    </div>
                    <div class="form-group d-md-flex align-items-md-center">
                        <div class="col-md-3">
                            <label for="password-confirm">@lang('register.confirm_password')</label>
                        </div>
                        <div class="col-md-6">
                            <input id="password-confirm"
                                   type="password"
                                   class="form-control input"
                                   name="password_confirmation"
                                   required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <div class="col-md-6">
                            <button type="submit" name="remember" value="1" class="rememberButton submitLoginButton">
                                @lang('service/index.reset_password')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
