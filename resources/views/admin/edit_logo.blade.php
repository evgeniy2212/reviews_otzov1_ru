@extends('profile.index')

@section('admin_content')
    <form method="POST" action="{{ route('admin.update_logo', ['logo' => $logo->id]) }}" enctype="multipart/form-data" novalidate="" id="logoForm">
        @method('PATCH')
        @csrf
        <div class="createLogo">
            <div class="createLogoTitle">
                <span>{{ __('service/admin.logo_update', ['item' => $review->full_name, 'same_item' => $review->category->title]) }}</span>
            </div>
            <div class="createLogoImageContainer">
                <div class="createLogoImagePreviewContainer">
                    <div id="createLogoImagePreview">
                        <img id="blah" src="{{ asset($logo->getImageUrl()) }}" alt="your image" />
                    </div>
                    <label class="createLogoFileUpload">
                        <input type="file"
                               id="imgBanner"
                               name="img"
                               class="form-control input"
                               required
                               accept="image/*"/>
                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/profile.upload')</span>
                    </label>
                </div>
            </div>
            <div class="d-flex justify-content-center" style="width: 100%">
                <div class="col-md-3">
                    <button type="submit" id="bannerButton" class="otherButton submitCreateLogoButton">
                        @lang('service/index.save')
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
