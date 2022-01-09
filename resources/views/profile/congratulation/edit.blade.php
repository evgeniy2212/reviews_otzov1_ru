@extends('profile.index')

@section('profile_review_content')
    <form method="POST" action="{{ route('profile-congratulations.update', $congratulation->id) }}" enctype="multipart/form-data" novalidate="" id="congratulationForm">
        @method('PATCH')
        @csrf
        <input type="hidden"
               name="deletePhotoFlag"
               id="deletePhotoFlag"
               value="0">
        <input type="hidden"
               name="deleteVideoFlag"
               id="deleteVideoFlag"
               value="0">
        <div class="congratulationTitle">
            <span>@lang('service/profile.congratulation.create.title')</span>
        </div>
        <div class="congratulation-info-container">
            @include('profile.congratulation.user_info_inputs')
        </div>
        <div class="congratulation-info-container">
            @include('profile.congratulation.congratulation_info_inputs')
        </div>
        <div class="create-congratulation-media">
            <div class="congratulationContentContainer">
                <textarea name="body"
                          class="form-control"
                          type="text"
                          required
                          placeholder="{{ empty($congratulation->body) ? __('service/index.review_text_placeholder') : '' }}">{!! $congratulation->body !!}</textarea>
                <div class="congratulationContentUpload">
                    <label class="create-congratulation-image">
                        <input type="file"
                               id="imgCongratulation"
                               name="img"
                               class="form-control input"
                               data-src=""
                               accept="image/*"/>
                        <i class="fa fa-cloud-upload"></i>
                        <span data-placeholder="{{ __('service/profile.congratulation.create.add_image') }}">
                            @lang('service/profile.congratulation.create.add_image')
                        </span>
                    </label>
                    @include('includes.loading_animation_congratulation')
                    <label class="create-congratulation-image">
                        <input type="file"
                               id="videoCongratulation"
                               name="video"
                               size="100MB"
                               accept="video/mp4"
                               data-default-description="{{ __('service/profile.congratulation.create.add_video') }}">
                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/profile.congratulation.create.add_video')</span>
                    </label>
                    <i class="videoRules">@lang('service/index.video_rules')</i>
                    <label class="create-congratulation-image">
                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/profile.congratulation.create.add_default_image')</span>
                        <input type="button"
                               style="opacity: 0;z-index: -10;max-width: 0;max-height: 0;"
                               id="imgDefaultCongratulation"
                               name="img_default">
                        <input type="hidden"
                               id="imgDefaultCongratulationValue"
                               name="img_default">
                    </label>
                </div>
            </div>
            <div class="congratulationDefaultImagesContainer">
                <div class="congratulationDefaultImages">
                    @foreach($defaultImages as $defaultImage)
                        <div class="congratulationDefaultImagePreview" id="{{ $defaultImage->id }}">
                            <img src="{{ asset($defaultImage->getImageUrl()) }}"
                                 data-imageid="{{ $defaultImage->id }}"
                                 alt="{{ $defaultImage->name }}" />
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center w-100">
                    <div class="col-md-3">
                        <a type="button" id="imgDefaultCongratulationSave" class="otherButton">
                            @lang('service/index.save')
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a type="button" id="imgDefaultCongratulationClose" class="otherButton">
                            @lang('service/index.cancel')
                        </a>
                    </div>
                </div>
            </div>
            <div class="congratulationControlContainer">
                <div class="congratulationImagePreviewContainer">
                    <div id="congratulationImagePreview">
                        <img id="blah"
                             src="{{ empty($congratulation->image) ? asset('images/default_banner.png') : $congratulation->image->getResizeImageUrl('congratulations') }}"
                             data-src="{{ asset('images/default_banner.png') }}"
                             data-default-src="{{ empty($congratulation->image) ? asset('images/default_banner.png') : $congratulation->image->getResizeImageUrl('congratulations') }}"
                             alt="your image" />
                    </div>
                    <button class="delete-button"
                            type="button"
                            id="deleteCongratImg"
                            data-default-description="{{ __('service/profile.congratulation.create.add_image') }}"
                            data-default-src="{{ asset('images/default_banner.png') }}">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
                <div class="congratulationImagePreviewContainer">
                    <div class="videoContainer">
                        @if($congratulation->video)
                            <video class="videoPreview" style="object-fit: cover" controls>
                                <source src="{{ $congratulation->video->getVideoUrl() }}" type="video/mp4">
                                {{--<source src="movie.ogg" type="video/ogg">--}}
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('storage/images/default_img_video.png') }}"
                                 alt="video"
                                 class="videoPreview">
                        @endif
                    </div>
                    <button class="delete-button"
                            type="button"
                            id="deleteCongratVideo"
                            data-default-description="{{ __('service/profile.congratulation.create.add_video') }}"
                            data-default-src="{{ asset('storage/images/default_img_video.png') }}">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="create-congratulation-name">
            <div class="col-6 col-sm-4">
                <input type="radio"
                       class="custom-radio"
                       id="name1"
                       name="user_sign"
                       {{ $congratulation->user_sign == \App\Models\User::NAME_SIGN ? 'checked' : '' }}
                       value="{{ \App\Models\User::NAME_SIGN }}"
                       checked>
                <label for="name1">{{ auth()->user()->full_name }}</label>
            </div>
            <div class="col-6 col-sm-4">
                <input type="radio"
                       class="custom-radio"
                       id="name2"
                       name="user_sign"
                       {{ $congratulation->user_sign == \App\Models\User::NICKNAME_SIGN ? 'checked' : '' }}
                       value="{{ \App\Models\User::NICKNAME_SIGN }}"
                       @empty(auth()->user()->nickname) disabled @endempty>
                <label for="name2">{{ empty(auth()->user()->nickname) ? __('service/index.review_nickname') : auth()->user()->nickname }}</label>
            </div>
            <div class="col-6 col-smd-4">
                <input type="radio"
                       class="custom-radio"
                       id="name3"
                       name="user_sign"
                       {{ $congratulation->user_sign == \App\Models\User::DEFAULT_SIGN ? 'checked' : '' }}
                       value="{{ \App\Models\User::DEFAULT_SIGN }}">
                <label for="name3">@lang('service/index.default_nickname')</label>
            </div>
        </div>
        <div class="d-flex justify-content-center" style="width: 100%">
            <div class="col-md-3">
                <button type="submit" id="congratulationButton" class="otherButton submitCongratulationButton">
                    @lang('service/index.publish')
                </button>
            </div>
            <div class="col-md-3">
                <a role="button" href="{{ route('profile-congratulations.create') }}" class="otherButton">
                    @lang('service/index.cancel')
                </a>
            </div>
        </div>
    </form>
@endsection

@section('modal_forms')
    @include('includes.modal.errorUserExisting')
@endsection
