@extends('layouts.app')

@section('content')
    <audio
        id="audio"
        src="{{ asset('storage/sounds/keys.mp3') }}">
    </audio>
    <div class="container">
        <div class="content-place home-content-place">
            <div class="home">
                <span class="home-title">
                    @lang('service/home.title') @lang('service/index.site_name')!
                </span>
                <p class="home-main-content home-point-content">
                    @lang('service/home.welcome_you')
                </p>
                <p class="home-main-content home-point-content">
                    @lang('service/home.goal')
                </p>
                <p class="home-main-content home-point-content">
                    @lang('service/home.although')
                </p>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                            @lang('service/home.everything')
                        </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            {!! __('service/home.only_site', ['name' => env('APP_NAME')]) !!}
                        </span>
                    </div>
                </div>
                <div class="home-point" id="test1">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                        <span class="home-point-title">
                            @lang('service/home.review_people')
                        </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            @lang('service/home.can_write')
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                            @lang('service/home.review_companies')
                        </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            {!! __('service/home.can_write_companies', ['name' => env('APP_NAME')]) !!}
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                        @lang('service/home.review_products')
                    </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            @lang('service/home.every_product')
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                            @lang('service/home.review_vacations')
                        </span>
                    <div>
                        <span class="home-point-content home-point-show">
                           @lang('service/home.any_vacation')
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                            @lang('service/home.privacy')
                        </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            @lang('service/home.importance')
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                            @lang('service/home.communication')
                        </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            @lang('service/home.notify_recipient')
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                            @lang('service/home.congratulations')
                        </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            @lang('service/home.reviewing_people')
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                        @lang('service/home.reminders')
                    </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            {!! __('service/home.little_help', ['name' => env('APP_NAME')]) !!}
                        </span>
                        <ul style="margin-bottom: 0.1rem">
                            <li class="home-point-content home-point-show home-list">@lang('service/home.1_week')</li>
                            <li class="home-point-content home-point-show home-list">@lang('service/home.3_days')</li>
                            <li class="home-point-content home-point-show home-list">@lang('service/home.1_day')</li>
                            <li class="home-point-content home-point-show home-list">@lang('service/home.day_of')</li>
                        </ul>
                        <span class="home-point-content home-point-show">@lang('service/home.or_all')</span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                        @lang('service/home.photo')
                    </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            @lang('service/home.no_matter')
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                        @lang('service/home.complain')
                    </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            @lang('service/home.come_across')
                        </span>
                    </div>
                </div>
                <div class="home-point">
                    <img src="{{ asset('storage/images/home_new_image.png') }}" height="30px" width="60px"/>
                    <span class="home-point-title">
                        @lang('service/home.deleting_reviews')
                    </span>
                    <div>
                        <span class="home-point-content home-point-show">
                            @lang('service/home.submissions')
                        </span>
                    </div>
                </div>
                <p class="home-point-content home-point-show">
                    {!! __('service/home.we_hope', ['name' => env('APP_NAME')]) !!}
                </p>
                <p class="home-title">
                    {!! __('service/home.the_team', ['name' => __('service/index.site_name')]) !!}
                </p>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
