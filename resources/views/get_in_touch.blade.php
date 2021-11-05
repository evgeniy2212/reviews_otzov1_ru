@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('send-touch-info') }}"
          enctype="multipart/form-data"
          novalidate=""
          id="sendTouchInfo">
        @csrf
        <div class="container">
                <div class="get-in-touch-content-place">
                    <div>
                        <div class="get-in-touch-info-place">
                            <div class="col-12 col-md-5 offset-md-1 touch-info-sitename">
                                <span>@lang('service/index.site_name')</span>
                            </div>
                        </div>
                        <div class="get-in-touch-info-place">
                            <div class="col-12 col-sm-6 col-md-5 offset-md-1">
                                <div class="get-in-touch-info-item">
                                    <span>{{ \App\Services\ServiceInfoService::getInfoValueByName('address') }}</span>
                                    <span>Suite {{ \App\Services\ServiceInfoService::getInfoValueByName('suite') }}</span>
                                    <span>{{ \App\Services\ServiceInfoService::getInfoValueByName('city') }}, {{ \App\Services\ServiceInfoService::getInfoValueByName('postal_code') }}</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-5 offset-md-1">
                                <div class="get-in-touch-info-item">
                                    <div style="white-space:nowrap">
                                        <span style="font-weight: bold">Tel.</span> <span>{{ \App\Services\ServiceInfoService::getInfoValueByName('phone') }}</span>
                                    </div>
                                    <div style="white-space:nowrap">
                                        <span style="font-weight: bold">Fax.</span> <span>{{ \App\Services\ServiceInfoService::getInfoValueByName('fax') }}</span>
                                    </div>
                                    <div style="white-space:nowrap">
                                        <span style="font-weight: bold">Email:</span> <span>{{ \App\Services\ServiceInfoService::getInfoValueByName('email') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="touch-info-message-header">
                        <span>@lang('service/index.get_in_touch')</span>
                    </div>
                    <div class="d-md-flex justify-content-md-around">
                        <div class="touch-input-container">
                            <div style="white-space:nowrap">
                                <span class="create-review-label text-center">
                                    @lang('service/index.your_name')
                                </span>
                            </div>
                            <div>
                                <input id="name"
                                       type="text"
                                       class="form-control input"
                                       name="name"
                                       minlength="3"
                                       value="{{ old('name') }}"
                                       required
                                       autocomplete="name">
                            </div>
                        </div>
                        <div class="touch-input-container">
                            <div style="white-space:nowrap">
                            <span class="create-review-label text-center">
                                @lang('service/index.your_email')
                            </span>
                            </div>
                            <div>
                                <input id="email"
                                       type="email"
                                       class="form-control input"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email">
                            </div>
                        </div>
                        <div class="touch-input-container">
                            <div style="white-space:nowrap">
                            <span class="create-review-label text-center">
                                @lang('service/index.your_phone')
                            </span>
                            </div>
                            <div>
                                <input id="phone"
                                       type="text"
                                       class="form-control input"
                                       name="phone"
                                       required
                                       value="{{ old('phone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="touch-info-message">
                        <div class="col-md-8">
                            <textarea name="message"
                                      class="form-control"
                                      type="text"
                                      required
                                      placeholder="{{ __('service/index.touch_text_placeholder') }}">{{ old('message') ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="create-review-buttons">
                        <div class="col-md-2">
                            <button type="submit" class="createReviewButton loginButton submitTouchInfoButton">
                                @lang('service/index.save')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
@endsection
