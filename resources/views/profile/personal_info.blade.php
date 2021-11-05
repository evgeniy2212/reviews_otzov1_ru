@extends('profile.index')

@section('profile_content')
    <form method="POST" class="personal-form" action="{{ route('updatePersonalInfo') }}" novalidate="" id="personalForm">
        @method('PATCH')
        @csrf
        <div class="personalFormContent">
            <div class="d-flex flex-column justify-content-around">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="col-md-6 mb-2 mb-lg-0">
                        <div class="d-sm-flex align-items-center registerFields">
                            <div class="col-sm-3">
                                <label for="name">
                                    @lang('register.first_name')
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input id="name"
                                       type="text"
                                       class="form-control input"
                                       name="name"
                                       minlength="3"
                                       value="{{ $user_info->name }}"
                                       required
                                       disabled
                                       autocomplete="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 mb-lg-0">
                        <div class="d-sm-flex align-items-center registerFields">
                            <div class="col-md-2">
                                <label for="country">
                                    @lang('register.country')
                                </label>
                            </div>
                            <div class="col-md-4 mb-2 mb-sm-0">
                                <select class="select"
                                        id="selectCountry"
                                        name="country"
                                        disabled
                                        required>
                                    <option disabled selected>{{ $user_info->region->country->country }}</option>
                                    @foreach($countries as $id => $country)
                                        <option value="{{ $id }}">{!! $country !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 text-left text-sm-center">
                                <label for="region_id" id="registerLabel">
                                    {!! $user_info->region->region_naming !!}
                                </label>
                            </div>
                            <div class="col-md-4">
                                <select class="select"
                                        id="selectRegion"
                                        name="region_id"
                                        disabled
                                        required>
                                    <option disabled selected>{!! $user_info->region->region !!}</option>
                                    <option value="1">@lang('service/index.person')</option>
                                    <option value="2">@lang('service/index.company')</option>
                                    <option value="3">@lang('service/index.goods')</option>
                                    <option value="3">@lang('service/index.vacations')</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center">
                    <div class="col-md-6 mb-2 col-sm-0">
                        <div class="d-sm-flex align-items-center registerFields">
                            <div class="col-sm-3">
                                <label for="last_name">
                                    @lang('register.last_name')
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input id="last_name"
                                       type="text"
                                       class="form-control input"
                                       name="last_name"
                                       minlength="3"
                                       value="{{ $user_info->last_name }}"
                                       required
                                       disabled
                                       autocomplete="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 col-sm-0">
                        <div class="d-flex align-items-center registerFields">
                            <div class="col-md-2">
                                <label for="zip_code">
                                    @lang('register.zip_code')
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input id="zip_code"
                                       type="text"
                                       class="form-control input"
                                       name="zip_code"
                                       minlength="3"
                                       value="{{ $user_info->zip_code }}"
                                       required
                                       disabled
                                       autocomplete="zip_code">
                            </div>
                            <div class="col-md-3" style="text-align: right;padding-right: 5px;">
                                <label for="city">
                                    @lang('register.city_town')
                                </label>
                            </div>
                            <div class="col-md-5">
                                <input id="city"
                                       type="text"
                                       class="form-control input"
                                       name="city"
                                       minlength="3"
                                       value="{{ $user_info->city }}"
                                       required
                                       disabled
                                       autocomplete="city">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center mb-2 mb-lg-0">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center registerFields">
                            <div class="col-sm-3 registerLabel">
                                <label for="email">
                                    @lang('register.e-mail') address
                                </label>
                            </div>
                            <div class="col-sm-9">
                                <input id="email"
                                       type="email"
                                       class="form-control input"
                                       name="email"
                                       value="{{ $user_info->email }}"
                                       required
                                       disabled
                                       autocomplete="email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-start mb-2 mb-lg-0">
                    <div class="col-sm-8 col-md-6">
                        <div class="d-flex flex-column">
                            <div class="d-flex registerFields">
                                <div class="col-md-6">
                                    <label for="nickname">
                                        @lang('register.nickname')
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input id="nickname"
                                           type="text"
                                           class="form-control input"
                                           name="nickname"
                                           value="{{ $user_info->nickname }}"
                                           disabled
                                           autocomplete="nickname">
                                </div>
                            </div>
                            <div class="d-flex mb-2 mb-md-0">
                                <span>
                                    @lang('service/message.pseudonim')
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-6">
                        <a role="button" href="{{ route('get-change-password') }}" disabled id="cancelButton">
                            @lang('service/index.change_password')
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group d-flex flex-wrap justify-content-center align-items-center">
            <div class="col-sm-3 mb-3 mb-sm-0">
                <a role="button" id="editProfileButton">
                    @lang('service/index.edit_profile')
                </a>
            </div>
            <div class="col-sm-3 mb-3 mb-sm-0">
                <button type="submit" id="saveButton" class="loginButton submitRegisterButton" disabled>
                    @lang('service/index.save')
                </button>
            </div>
            <div class="col-sm-3">
                <a role="button" href="{{ route('profile-info') }}" id="cancelButton">
                    @lang('service/index.cancel')
                </a>
            </div>
        </div>
    </form>
@endsection
