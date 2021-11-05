@extends('profile.index')

@section('admin_content')
    <form class="form-horizontal" method="POST" novalidate="" id="contactsForm" action="{{ route('admin.contacts.store') }}">
        @csrf
        <div class="form-group d-flex flex-wrap align-items-center contactsFields">
            <div class="col-sm-3 col-md-2 offset-md-1">
                <label for="address">@lang('service/admin.address')</label>
            </div>
            <div class="col-sm-7 col-md-6">
                <input id="address"
                       type="text"
                       class="form-control input"
                       name="address"
                       minlength="3"
                       value="{{ \App\Services\ServiceInfoService::getInfoValueByName('address') }}"
                       required
                       disabled
                       autocomplete="address">
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center contactsFields">
            <div class="col-sm-3 col-md-2 offset-md-1">
                <label for="suite">@lang('service/admin.suite')</label>
            </div>
            <div class="col-sm-7 col-md-6">
                <input id="suite"
                       type="text"
                       class="form-control input"
                       name="suite"
                       minlength="3"
                       value="{{ \App\Services\ServiceInfoService::getInfoValueByName('suite') }}"
                       required
                       disabled
                       autocomplete="suite">
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center contactsFields">
            <div class="col-sm-3 col-md-2 offset-md-1">
                <label for="city">@lang('service/admin.city')</label>
            </div>
            <div class="col-sm-7 col-md-6">
                <input id="city"
                       type="text"
                       class="form-control input"
                       name="city"
                       minlength="3"
                       value="{{ \App\Services\ServiceInfoService::getInfoValueByName('city') }}"
                       required
                       disabled
                       autocomplete="city">
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center contactsFields">
            <div class="col-sm-3 col-md-2 offset-md-1">
                <label for="postal_code">@lang('service/admin.postal_code')</label>
            </div>
            <div class="col-sm-7 col-md-6">
                <input id="postal_code"
                       type="text"
                       class="form-control input"
                       name="postal_code"
                       minlength="3"
                       value="{{ \App\Services\ServiceInfoService::getInfoValueByName('postal_code') }}"
                       required
                       disabled
                       autocomplete="postal_code">
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center contactsFields">
            <div class="col-sm-3 col-md-2 offset-md-1">
                <label for="phone">@lang('service/admin.phone')</label>
            </div>
            <div class="col-sm-7 col-md-6">
                <input id="phone"
                       type="text"
                       class="form-control input"
                       name="phone"
                       minlength="3"
                       value="{{ \App\Services\ServiceInfoService::getInfoValueByName('phone') }}"
                       required
                       disabled
                       autocomplete="phone">
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center contactsFields">
            <div class="col-sm-3 col-md-2 offset-md-1">
                <label for="fax">@lang('service/admin.fax')</label>
            </div>
            <div class="col-sm-7 col-md-6">
                <input id="fax"
                       type="text"
                       class="form-control input"
                       name="fax"
                       minlength="3"
                       value="{{ \App\Services\ServiceInfoService::getInfoValueByName('fax') }}"
                       required
                       disabled
                       autocomplete="fax">
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center contactsFields">
            <div class="col-sm-3 col-md-2 offset-md-1">
                <label for="email">@lang('service/admin.email')</label>
            </div>
            <div class="col-sm-7 col-md-6">
                <input id="email"
                       type="email"
                       class="form-control input"
                       name="email"
                       minlength="3"
                       value="{{ \App\Services\ServiceInfoService::getInfoValueByName('email') }}"
                       required
                       disabled
                       autocomplete="email">
            </div>
        </div>
        <div class="form-group d-flex flex-wrap justify-content-center align-items-center contacts-btn-holder">
            <div class="col-sm-3">
                <button type="submit" class="otherButton">
                    @lang('service/index.save')
                </button>
            </div>
            <div class="col-sm-3">
                <a role="button" class="otherButton" id="enableInputsButton" data-form="contactsForm">
                    {{ __('service/index.edit_contacts') }}
                </a>
            </div>
            <div class="col-sm-3">
                <a role="button" class="btn-cancel" href="{{ route('admin.contacts.index') }}" id="cancelButton">
                    @lang('service/index.cancel')
                </a>
            </div>
        </div>
    </form>
@endsection
