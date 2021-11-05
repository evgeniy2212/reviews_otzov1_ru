@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-place d-flex flex-column justify-content-center align-items-center">
            <div class="loginForm">
                @if (session('success'))
                    <div class="successMessage">{!! session('success') !!}</div>
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <div class="col-md-3">
                            <a role="button" href="{{ route('home') }}" id="cancelButton">
                                @lang('service/index.close')
                            </a>
                        </div>
                    </div>
                @elseif(session('status'))
                    <div class="errorMessage">{!! session('status') !!}</div>
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <div class="col-md-3">
                            <a role="button" href="{{ route('home') }}" id="cancelButton">
                                @lang('service/index.close')
                            </a>
                        </div>
                    </div>
                @elseif($errors->any())
                    <div class="errorMessage">{!! $errors->first() !!}</div>
                    <form method="POST" action="{{ route('share-send') }}" novalidate="" id="loginForm">
                        @csrf
                        <div class="form-group d-flex flex-wrap align-items-center">
                            <div class="col-12 col-md-2 col-lg-3 text-left text-md-right">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-md-7 col-lg-6">
                                <input id="email"
                                       type="email"
                                       class="form-control input"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autocomplete="email">
                                <div class="invalid-feedback">@lang('auth.fill_out_email')</div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <div class="col-md-3">
                                <button type="submit" class="rememberButton submitLoginButton">
                                    @lang('service/index.continue')
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="headFormDescription">@lang('service/index.enter_share_info')</div>
                    <form method="POST" action="{{ route('share-send') }}" novalidate="" id="loginForm">
                        @csrf
                        <div class="form-group d-flex flex-wrap align-items-center">
                            <div class="col-12 col-md-2 col-lg-3 text-left text-md-right">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-md-7 col-lg-6">
                                <input id="email"
                                       type="email"
                                       class="form-control input"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autocomplete="email">
                                <div class="invalid-feedback">@lang('auth.fill_out_email')</div>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-wrap align-items-center">
                            <div class="col-12 col-md-7 col-lg-6 offset-md-2 offset-lg-3">
                                        <textarea name="share_message"
                                                  type="text"
                                                  data-placeholder="{{ __('service/index.share.default_message') }}"
                                                  class="share-message"
                                                  id="share_message"
                                                  disabled
                                                  placeholder="@lang('service/index.share.default_message')"></textarea>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="checkbox-item">
                                    <input type="checkbox"
                                           class="custom-checkbox"
                                           id="enable_share_message"
                                           value="1"
                                           name="enable_message">
                                    <label for="enable_share_message">@lang('service/index.share.is_custom_message')</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-wrap align-items-center">
                            <div class="col-12 col-md-2 col-lg-3 text-left text-md-right">
                                <label for="email">@lang('service/index.your_name')</label>
                            </div>
                            <div class="col-12 col-md-7 col-lg-6">
                                <input id="name"
                                       type="text"
                                       class="form-control input"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center">
                            <div class="col-md-3">
                                <button type="submit" class="rememberButton submitLoginButton">
                                    @lang('service/index.send')
                                </button>
                            </div>
                            <div class="col-md-3">
                                <a role="button" href="{{ route('home') }}" id="cancelButton">
                                    @lang('service/index.close')
                                </a>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
