<form method="POST" action="{{ route('admin.banners.update', ['banner' => $banner->id]) }}" enctype="multipart/form-data" novalidate="" id="adminBannerForm{{ $banner->id }}" style="width: 100%">
    @method('PATCH')
    @csrf
    <div class="singleBanner"
         id="banner-{{ $banner->id }}">
        <div class="singleBannerInfo">
            <div>
                <span>@lang('service/admin.banner_user_name', ['name' => $banner->user->full_name])</span>
            </div>
            <div class="singleBannerDatepicker">
                <div style="white-space:nowrap">
                <span class="create-review-label text-center">
                    @lang('service/profile.from')
                </span>
                </div>
                <div>
                    <input type="text"
                           class="form-control input datepicker"
                           name="from"changePassForm
                           required
                           value="{{ \Carbon\Carbon::parse($banner->from)->format('m/d/Y') }}"
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
                           value="{{ \Carbon\Carbon::parse($banner->to)->format('m/d/Y') }}"
                           autocomplete="off">
                </div>
            </div>
        </div>
        <div class="singleBannerImageContent">
            <div class="bannerImagePreview">
                <div>
                    <div>
                        <span class="create-review-label">
                            @lang('service/profile.banner_type')
                        </span>
                    </div>
                    <select class="select"
                            id="bannerType-{{ $banner->id }}"
                            data-banner-id="{{ $banner->id }}"
                            required>
                        <option {{ !empty($body) ?: 'selected' }} value="{!! \App\Models\Banner::TYPE_IMAGE !!}">
                            {!!  __('service/index.type_image') !!}
                        </option>
                        <option {{ !empty($body) ? 'selected' : '' }} value="{!! \App\Models\Banner::TYPE_TEXT !!}">
                            {!! __('service/index.type_text') !!}
                        </option>
                    </select>
                </div>
                <div class="w-100"
                     id="uploadBannerContainer"
                     style="{{ !empty($body) ? 'display: none;' : '' }}">
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
                <div>
                    <div>
                        <span class="create-review-label">
                            @lang('service/profile.banner_category')
                        </span>
                    </div>
                    <select class="select"
                            id="bannerCategory"
                            name="banner_category_id"
                            required>
                        <option disabled selected value="">{!! $banner->category->title !!}</option>
                        @foreach($bannerCategories as $id => $category)
                            <option value="{{ $id }}">{!! $category !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="bannerImagePreviewContainer">
                    <div id="bannerTextPreview"
                         style="{{ !empty($body) ?: 'display: none;' }}">
                        <textarea name="body"
                                  type="text"
                                  id="review-text"
                                  placeholder="{{ empty($body) ? __('service/index.review_text_placeholder') : '' }}">{!! $body !!}</textarea>
                    </div>
                    <div id="bannerImagePreview"
                         style="{{ !empty($body) ? 'display: none;' : '' }}">
                        <img id="blah"
                             src="{{ $banner->getImageUrl() }}"
                             alt="your image" />
                    </div>
                    <input id="title"
                           type="text"
                           class="form-control input"
                           name="title"
                           maxlength="35"
                           placeholder="@lang('service/profile.banner_title')"
                           value="{{ $banner->title }}"
                           style="{{ !empty($body) ? 'display: none;' : '' }}"
                           autocomplete="off">
                    <input id="link"
                           type="text"
                           class="form-control input"
                           name="link"
                           maxlength="200"
                           placeholder="@lang('service/profile.banner_link')"
                           value="{{ $banner->link }}"
                           style="{{ !empty($body) ? 'display: none;' : '' }}"
                           autocomplete="off">
            </div>
        </div>
        <div class="singleBannerControl">
            <div class="checkbox-item">
                <input type="checkbox"
                       class="custom-checkbox"
                       id="banner_publish_{{ $banner->id }}"
                       name="is_published"
                       {{ $banner->is_published ? 'checked' : '' }}>
                <label for="banner_publish_{{ $banner->id }}">@lang('service/profile.banner_published')</label>
            </div>
            <button type="submit"
                    id="bannerPublishButton{{ $banner->id }}"
                    class="otherButton">
                @lang('service/admin.update')
            </button>
        </div>
    </div>
</form>
<script>
    window.banner_types = {
        image: '{{ \App\Models\Banner::TYPE_IMAGE }}',
        text: '{{ \App\Models\Banner::TYPE_TEXT }}',
    };
</script>
