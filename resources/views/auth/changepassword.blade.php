@extends('profile.index')

@section('profile_content')
    <form class="form-horizontal change-pass-form" method="POST" novalidate="" id="changePassForm" action="{{ route('change-password') }}">
        @csrf
        <div class="form-group d-flex flex-wrap align-items-center registerFields">
            <div class="col-sm-4 col-md-2 offset-sm-1">
                <label for="new-password">@lang('register.current_password')</label>
            </div>
            <div class="col-sm-6">
                <input id="current-password"
                       type="password"
                       class="form-control input"
                       name="current-password"
                       value="{{ old('current-password') }}"
                       required>
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center registerFields">
            <div class="col-sm-4 col-md-2 offset-sm-1">
                <label for="new-password">@lang('register.new_password')</label>
            </div>
            <div class="col-sm-6">
                <div id="password-rules" style="display: none;">
                    <input id="Length" type="checkbox" class="custom-checkbox"><label for="Length">@lang('password.rule_1')</label>
                    <input id="UpperCase" type="checkbox" class="custom-checkbox"><label for="Length">@lang('password.rule_2')</label>
                    <input id="LowerCase" type="checkbox" class="custom-checkbox"><label for="Length">@lang('password.rule_3')</label>
                    <input id="Numbers" type="checkbox" class="custom-checkbox"><label for="Length">@lang('password.rule_4')</label>
                    <input id="Symbols" type="checkbox" class="custom-checkbox"><label for="Length">@lang('password.rule_5')</label>
                </div>
                <input id="new-password"
                       type="password"
                       class="form-control input"
                       name="new-password"
                       required>
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center registerFields mb-3">
            <div class="col-sm-4 col-md-2 offset-sm-1">
                <label for="new-password-confirm">@lang('register.confirm_password')</label>
            </div>
            <div class="col-sm-6">
                <input id="new-password-confirm"
                       type="password"
                       class="form-control input"
                       name="new-password_confirmation"
                       required>
            </div>
        </div>
        <div class="form-group d-flex justify-content-center align-items-center">
            <div class="col-md-3">
                <button type="submit" class="loginButton submitChangePassButton">
                    @lang('service/index.save')
                </button>
            </div>
            <div class="col-md-3">
                <a role="button" href="{{ route('profile-info') }}" id="cancelButton">
                    @lang('service/index.cancel')
                </a>
            </div>
        </div>
    </form>
@endsection
