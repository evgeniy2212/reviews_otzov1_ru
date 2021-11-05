<header class="header">
    <div class="container-fluid d-flex flex-wrap justify-content-center justify-content-sm-between">
        <div class="header__logo">
            <img src="{{ asset('images/frame.png') }}" height="125px" width="150px"/>
            <div class="d-flex d-sm-none flex-column justify-content-start site-name site-name--mobile">
                <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="site-name__link">@lang('service/index.header_site_name')<span>.com</span></a>
                <p>
                    @lang('service/index.header.tagline')
                </p>
            </div>
        </div>
        <div class="middleHeadContainer d-flex flex-column justify-content-between">
            <div class="middleHeadContainer__logo d-flex justify-content-center justify-content-sm-between align-items-start">
                <div class="d-none d-sm-flex flex-column justify-content-start site-name site-name--desktop">
                    <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="site-name__link">@lang('service/index.header_site_name')<span>.com</span></a>
                    <p>
                        @lang('service/index.header.tagline')
                    </p>
                    {{--<script>--}}
                        {{--setTimeout(function() {--}}
                            {{--var ad = document.querySelector("ins.adsbygoogle"); // создаем переменную с блоком рекламы от гугл--}}
                            {{--var adblock = document.getElementsByClassName('ads'); // создаем переменную с нашим блоком ads--}}
                            {{--if (ad && ad.innerHTML.replace(/\s/g, "").length == 0) { // Если рекламный блок пуст--}}
                                {{--ad.style.cssText = 'display:block !important'; // Делаем его видимым в любом случае--}}
                                {{--for(var i = 0; i < adblock.length; i++) { // Если у нас много блоков с рекламой, проходимся по всем.--}}
                                    {{--(function(index) {--}}
                                        {{--adblock[index].innerHTML = 'Здесь была бы реклама, если бы не adblock и я получил бы лишнию копейку, а так тут просто черный блок с текстом';--}}
                                        {{--adblock[index].style.background = '#000';--}}
                                        {{--adblock[index].style.color = '#fff';--}}
                                        {{--adblock[index].style.padding = '15px';--}}
                                        {{--adblock[index].style.fontSize = '20px';--}}
                                        {{--adblock[index].style.minHeight = '90px';--}}
                                        {{--adblock[index].style.maxWidth = '728px';--}}
                                        {{--adblock[index].style.margin = '15px auto';--}}
                                        {{--adblock[index].className = '';--}}
                                    {{--})(i);--}}
                                {{--}--}}
                            {{--}--}}
                        {{--}, 2000);--}}
                    {{--</script>--}}
                </div>
                @auth
                    @if(auth()->user()->email_verified_at && !auth()->user()->two_factor_code)
                        <div class="d-flex middleHeadContainer__greet">
                            <div style="height: auto; margin-top: 5px">
                                <a href="{{ route('profile-info') }}" style="text-decoration: none;color: black;"><span class="text">@lang('service/index.hello', ['name' => Auth::user()->name])</span></a>
                            </div>
                            <div class="header__user-info d-flex">
                                <div class="user-info d-flex justify-content-between align-items-center">
                                    <div class="message-count">
                                        {{--<div class="bg"></div>--}}
                                        <a href="{{ route('profile-messages') }}">
                                            <div class="bg"></div>
                                            <span class="{{ (auth()->user()->getNewMessagesCount() > 0) ? 'message-accounting' : '' }}">{!! (auth()->user()->getNewMessagesCount() > 0) ? auth()->user()->getNewMessagesCount() : '' !!}</span>
                                        </a>
                                    </div>
                                    <div class="congratulation-img-wrap">
                                        <img id="congratulation-img" src="{{ App\Services\CongratsService::getUserCongratulation(auth()->user()) }}" height="35px" width="30px"/>
                                        @include('includes.popups.congratulation_rules')
                                    </div>
                                </div>
                                <div class="user-activities">
                                    <span>@lang('service/index.reviews'): {{ auth()->user()->reviewsCount }}</span>
                                    <span>@lang('service/index.congratulations'): {{ auth()->user()->congratulationsCount }}</span>
                                    <span>@lang('service/index.replies'): {{ auth()->user()->commentsCount }}</span>
                                    <span>@lang('service/index.finger_marks'): {{ auth()->user()->reaction_count ?? 0 }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="d-md-flex flex-wrap justify-content-between align-items-lg-center align-items-lg-end">
                {{--<div class="d-flex flex-row justify-content-between">--}}
                    {{----}}
                {{--</div>--}}
                <nav class="nav-menu-container">
                    <ul class="nav-menu">
                        @if(auth()->user()
                        && auth()->user()->email_verified_at
                        && !auth()->user()->two_factor_code)
                            <li>
                                <a href="{{ LaravelLocalization::localizeUrl('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    @lang('service/index.sign_out')
                                </a>
                                <form id="logout-form" action="{{ LaravelLocalization::localizeUrl('/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ LaravelLocalization::localizeUrl('/login') }}">@lang('service/index.sign_in')</a>
                            </li>
                            <li class="left-border">
                                <a href="{{ LaravelLocalization::localizeUrl('/register') }}">@lang('service/index.sign_up')</a>
                            </li>
                        @endif
                        <li class="left-border">
                            {{--                                <a href="{{ asset('files/reviews4info.zip') }}" download="reviews4info">Save</a>--}}
                            <a href="{{ route('save-shortcut') }}">@lang('service/index.save')</a>
                        </li>
                        <li class="left-border">
                            <a href="{{ route('share') }}"
                                {{--                                   data-toggle="modal"--}}
                                {{--                                   data-target="#shareModal"--}}
                            >@lang('service/index.share')</a>
                        </li>
                    </ul>
                </nav>
                <div class="header__form-wrap">
                    <div class="header__select-wrap">
{{--                        <select class="form-control select select-lang"--}}
{{--                                id="selectLang"--}}
{{--                                onchange="location = this.value;">--}}
{{--                            @foreach(app('laravellocalization')->getSupportedLocales() as $localeKey => $locale)--}}
{{--                                @if(App::getLocale() === $localeKey)--}}
{{--                                    <option selected>{!! $locale['name'] !!}</option>--}}
{{--                                @else--}}
{{--                                    <option value="{{ LaravelLocalization::getLocalizedURL($localeKey, null, [], false) }}">{!! $locale['name'] !!}</option>--}}
{{--                                    <a href="{{ LaravelLocalization::getLocalizedURL($locale, null, [], true) }}">--}}
{{--                                        {{ $locale }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                            <option selected value="Bosanski">Bosanski</option>--}}
{{--                            <option value="Català">Català</option>--}}
{{--                            <option value="Česky">Česky</option>--}}
{{--                            <option value="Deens">Deens</option>--}}
{{--                            <option value="Deutsche">Deutsche</option>--}}
{{--                            <option value="Eestlane">Eestlane</option>--}}
{{--                            <option value="English">English</option>--}}
{{--                            <option value="Français">Français</option>--}}
{{--                            <option value="Hrvatski">Hrvatski</option>--}}
{{--                            <option value="Íslenska">Íslenska</option>--}}
{{--                            <option value="Latine">Latine</option>--}}
{{--                            <option value="Latvietis">Latvietis</option>--}}
{{--                            <option value="Lëtzebuergesch">Lëtzebuergesch</option>--}}
{{--                            <option value="lietuvių">lietuvių</option>--}}
{{--                            <option value="Magyar">Magyar</option>--}}
{{--                            <option value="Nederlands">Nederlands</option>--}}
{{--                            <option value="Norsk">Norsk</option>--}}
{{--                            <option value="Polskie">Polskie</option>--}}
{{--                            <option value="Română">Română</option>--}}
{{--                            <option value="Romansh">Romansh</option>--}}
{{--                            <option value="Shqiptare">Shqiptare</option>--}}
{{--                            <option value="Slovák">Slovák</option>--}}
{{--                            <option value="Suomalainen">Suomalainen</option>--}}
{{--                            <option value="Svenska">Svenska</option>--}}
{{--                            <option value="Ελληνικά">Ελληνικά</option>--}}
{{--                            <option value="Български">Български</option>--}}
{{--                        </select>--}}
                    </div>
                    <form method="GET"
                          action="{{ route('search') }}"
                          class="form-inline search-form"
                          novalidate=""
                          id="searchForm">
                        <input class="form-control mr-sm-2 input"
                               id="searchCategory"
                               type="text"
                               name="search"
                               placeholder="{{ __('service/index.search') }}"
                               aria-label="Search"
                               value="{{ isset($search) ? $search : '' }}"
                               required>
                        <select class="form-control mr-sm-2 select"
                                id="selectCategory"
                                name="category"
                                required>
                            <option disabled selected>@lang('service/index.head_select')</option>
                            @foreach($reviewCategories as $review_category)
                                <option {{ (isset($search_category) && $search_category == $review_category->slug) ? 'selected' : '' }}
                                        value="{{ $review_category->slug }}">
                                    @lang(trans('service/index.review_naming', ['name' => $review_category->title]))
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-primary mb-2 mb-sm-0" type="submit">@lang('service/index.go')</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="post">
            <div class="slider">
                <div class="slider__wrapper">
                    {{--<div class="slider__item">--}}
                    {{--<div style="height: 120px; background: url(../images/post.jpg) 100% 100% no-repeat; background-size: cover;">1</div>--}}
                    {{--<div style="height: 120px; background-image: url(../images/post.jpg); background-repeat: no-repeat; background-size: cover;">1</div>--}}
                    {{--</div>--}}

                    @foreach(\App\Services\BannerService::getHeadBanners() as $key => $banner)
                        @if(empty(optional($banner)->body))
                            <div class="slider__item">

                                @if(empty($banner->link))
                                    <div class="slider_content" style="height: 150px; background-position: center top; background-image: url('{{ $banner->getImageUrl() }}'); background-size: auto {{ empty($banner->title) ? '150' : '130' }}px;">
                                        <span style="font-size: 0.9rem">{{ empty($banner->title) ? '' : $banner->title }}</span>
                                    </div>
                                @else
                                    <div class="slider_content" style="height: 150px; background-position: center top; background-image: url('{{ $banner->getImageUrl() }}'); background-size: auto {{ empty($banner->title) ? '150' : '130' }}px;">
                                        <a style="font-size: 0.9rem" href="{{ $banner->link }}" target="_blank">{{ empty($banner->title) ? $banner->link : $banner->title }}</a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="slider__item"
                                 id="slider_body{{ $key }}"
                                 data-body="{{ $banner->body }}">
                                <div style="height: 150px;
                                        cursor: pointer;
                                        background-position: center top;
                                        background-size: auto 150px;">
                                        <span class="sliderBody">
                                            {!! $banner->body !!}
                                        </span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{--<div class="slider__item">--}}
                    {{--<div style="height: 120px; background: url(../images/post.jpg) 100% 100% no-repeat; background-size: cover;">2</div>--}}
                    {{--</div>--}}
                </div>
                <a class="slider__control slider__control_left" href="#" role="button"></a>
                <a class="slider__control slider__control_right" href="#" role="button"></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="nav-gradient">
            <ul class="nav-menu navigate">
                <li @if(\Route::current()->getName() == 'home')class="menu-active"@endif>
                    <a href="{{ route('home') }}">@lang('service/index.home')</a>
                </li>
                @foreach($reviewCategories as $review_category)
                    <li @if(str_contains(url()->current(), $review_category->slug) || str_contains(url()->full(), 'category=' . $review_category->slug))
                        class="menu-active"@endif>
                        <a href="{{ route('reviews', $review_category->slug) }}">
                            @lang(trans('service/index.review_naming', ['name' => $review_category->title]))
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</header>
