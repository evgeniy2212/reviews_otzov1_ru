@extends('profile.index')

@section('profile_review_content')
    <form method="POST" action="{{ route('saveBanner') }}" enctype="multipart/form-data" novalidate="" id="bannerForm">
        @csrf
        <div class="banners">
            <div class="bannerTitle">
                <span>Welcome to the free ad setup</span>
            </div>
            <div class="bannerContent">
                <span>Here is a 10 free box for every one and 1 commercial . Your add will be run here a week (Sunday to Saturday) if you will be selected our system. You can use for any ad: your review, congratulation with university or biurht day, selling product, logo of company, about a servise every type of a ligal add. After sigh up and you will be selected you will recive an email with a code to create here your. All files and photos that were saved on our website for advert will be deleted two weeks after the installation days, including those that were not selected for announcements. If you want someone to see your ad, write their email bellow yours for notification.</span>
            </div>
            <div class="bannerInfo">
                <div>
                    <span class="create-review-label">
                        @lang('service/profile.banner_category')
                    </span>
                </div>
                <div>
                    <select class="select"
                            id="bannerCategory"
                            name="banner_category_id"
                            required>
                        <option disabled selected value="">@lang(trans('service/index.select_item', ['item' => __('service/index.category')]))</option>
                        @foreach($bannerCategories as $id => $category)
                            <option value="{{ $id }}">{!! $category !!}</option>
                        @endforeach
                    </select>
                </div>
                <div style="white-space:nowrap">
                    <span class="create-review-label text-center">
                        @lang('service/profile.banner_another_email')
                    </span>
                </div>
                <div>
                    <input id="email"
                           type="email"
                           class="form-control input"
                           name="email"
                           value="{{ old('email') }}"
                           autocomplete="email">
                </div>
                <div style="white-space:nowrap">
                    <span class="create-review-label text-center">
                        @lang('service/profile.from')
                    </span>
                </div>
                <div>
                    <input type="text"
                           class="form-control input datepicker"
                           name="from"
                           required
                           autocomplete="off">
                </div>
                <div style="white-space:nowrap">
                    <span class="create-review-label text-center">
                        @lang('service/profile.to')
                    </span>
                </div>
                <div>
                    <input type="text"
                           class="form-control input datepicker"
                           name="to"
                           required
                           autocomplete="off">
                </div>
            </div>
            <div class="bannerImageContainer">
                <div class="col-md-3">
                    <label class="bannerFileUpload">
                        <input type="file"
                               id="imgBanner"
                               name="img"
                               class="form-control input"
                               required
                               accept="image/*"/>
                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/profile.upload')</span>
                    </label>
                </div>
                <div class="bannerImagePreviewContainer">
                    <div id="bannerImagePreview">
                        <img id="blah" src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <input id="title"
                           type="text"
                           class="form-control input"
                           name="title"
                           maxlength="35"
                           placeholder="@lang('service/profile.banner_title')"
                           autocomplete="off">
                </div>
            </div>
            <div class="d-flex justify-content-center" style="width: 100%">
                <div class="col-md-3">
                    <button type="submit" id="bannerButton" class="otherButton submitBannerButton">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
