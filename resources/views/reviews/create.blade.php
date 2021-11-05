@extends('layouts.app')

@section('script_section')
    <script src="http://lonekorean.github.io/highlight-within-textarea/jquery.highlight-within-textarea.js"></script>
@endsection

@section('style_section')
    <link rel="stylesheet" href="http://lonekorean.github.io/highlight-within-textarea/jquery.highlight-within-textarea.css">
@endsection

@section('modal_forms')
    @include('includes.modal.twentyoneYearAccept')
    @include('includes.modal.emptyReviewNotification')
    @include('includes.modal.errorBadWords')
    @include('includes.modal.testReviewCreation')
@endsection

@section('content')
    <form method="POST" action="{{ route('save-review') }}"
          enctype="multipart/form-data"
          novalidate=""
          id="createReviewForm"
          @guest class="testCreationReview" @endguest>
        @csrf
        <input type="hidden"
               name="review_category_id"
               value="{{ $reviewCategory->id }}">
        <input type="hidden"
               name="category_slug"
               value="{{ $slug }}">
        <input type="hidden"
               name="submitFormAccept"
               id="submitFormAccept"
               data-enable-low-rating="{{ $reviewCategory->enable_low_rating ? 1 : 0 }}"
               value="1">
        <div class="container">
                <div class="review-content-place">
                    <div class="d-flex justify-content-center">
                        <span class="create-review-title">
                            @lang(trans('service/index.create_review_title', ['title' => strtoupper(trim($reviewCategory->title, 's'))]))
                        </span>
                    </div>
                    <div class="rating-container">
                        <span class="create-review-label">
                            @lang('service/index.review_rating_title')
                        </span>
                        <div class="rating" data-rate-value=2>
                            <input type="hidden"
                                   id="rating"
                                   name="rating"
                                   value="2">
                        </div>
                    </div>
                    <div class="d-flex align-items-center review-info-container">
                        @include('reviews.review_inputs.' . $slug)
                    </div>
                    {{--<div class="d-flex">--}}
                        {{--<div class="col-md-4 text-center">--}}
                            {{--<span class="review-character-label">--}}
                                {{--@lang('service/index.review_positive_character')--}}
                            {{--</span>--}}
                        {{--</div>--}}
                        {{--@switch($slug)--}}
                            {{--@case('person')--}}
                                {{--<div class="col-md-4 text-center">--}}
                                        {{--<span class="review-character-label">--}}
                                            {{--@lang('service/index.review_negative_character')--}}
                                        {{--</span>--}}
                                {{--</div>--}}
                            {{--@default--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<div class="form_review_toggle">--}}
                                        {{--<div class="form_review_description">--}}
                                        {{--<span>--}}
                                            {{--Open for communication with reviewer--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="form_review_toggle-item item-1">--}}
                                            {{--<input id="fid-1" type="radio" name="is_communication_enable" value="1" checked>--}}
                                            {{--<label for="fid-1">Yes</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="form_review_toggle-item item-2">--}}
                                            {{--<input id="fid-2" type="radio" name="is_communication_enable" value="0">--}}
                                            {{--<label for="fid-2">No</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4 text-center">--}}
                                    {{--<span class="review-character-label">--}}
                                        {{--@lang('service/index.review_negative_character')--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                        {{--@endswitch--}}
                    {{--</div>--}}
                    <div class="review-characteristics">
                        <div class="col-md-4">
                            <span class="review-character-label">
                                @lang('service/index.review_positive_character')
                            </span>
                            <div class="checkbox-container">
                                @foreach($positiveCharacteristics as $characteristics)
                                    <div class="col-md-6 checkbox-items">
                                        @foreach($characteristics as $characteristic)
                                            <div class="checkbox-item">
                                                <input type="checkbox"
                                                       class="custom-checkbox"
                                                       id="positive-{{ $characteristic->id }}"
                                                       name="characteristics[]"
                                                       value="{{ $characteristic->id }}">
                                                <label for="positive-{{ $characteristic->id }}">{!! $characteristic->name !!}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column">
                            <div class="form_review_toggle">
                                <div class="form_review_description">
                                        <span>
                                            @lang('service/message.communication_reviewer')
                                        </span>
                                </div>
                                <div class="form_review_toggle-item item-1">
                                    <input id="fid-1" type="radio" name="is_communication_enable" value="1" checked>
                                    <label for="fid-1">@lang('service/index.yes')</label>
                                </div>
                                <div class="form_review_toggle-item item-2">
                                    <input id="fid-2" type="radio" name="is_communication_enable" value="0">
                                    <label for="fid-2">@lang('service/index.no')</label>
                                </div>
                            </div>
                            <div class="new-group-creating-container">
                                <input id="new_group"
                                       type="text"
                                       class="form-control input"
                                       name="new_review_group"
                                       minlength="3"
                                       value="{{ old('new_group') }}"
                                       placeholder="@lang('service/index.review_new_group_placeholder')">
                            </div>
                            <div class="text-review-creating-container">
                                <textarea name="review"
                                          class="form-control"
                                          type="text"
                                          id="review-create-text"
                                          required
                                          placeholder="@lang('service/index.review_text_placeholder')"></textarea>
                                <div class="review-upload-files">
                                    @include('includes.loading_animation')
                                    <label class="custom-file-upload">
                                        <input type="file"
                                               id="img"
                                               name="img"
                                               accept="image/*"/>
                                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/index.add_photo')</span>
                                    </label>
                                    <label class="custom-file-upload" title="{{ __('service/index.video_rules') }}">
                                        <input type="file"
                                               name="video"
                                               id="video"
                                               size="100MB"
                                               accept="video/mp4"/>
                                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/index.add_video')</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='progress' id="progressDivId">
                            <div class='progress-bar' id='progressBar'></div>
                            <div class='percent' id='percent'>0%</div>
                        </div>
                        <div class="col-md-4">
                            <span class="review-character-label">
                                @lang('service/index.review_negative_character')
                            </span>
                            <div class="checkbox-container">
                                @foreach($negativeCharacteristics as $characteristics)
                                    <div class="col-md-6 checkbox-items">
                                        @foreach($characteristics as $characteristic)
                                            <div class="checkbox-item">
                                                <input type="checkbox"
                                                       class="custom-checkbox"
                                                       id="negative-{{ $characteristic->id }}"
                                                       name="characteristics[]"
                                                       value="{{ $characteristic->id }}">
                                                <label for="negative-{{ $characteristic->id }}">{!! $characteristic->name !!}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="create-review-name justify-content-center flex-wrap">
                        <div class="col-6 col-sm-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name1"
                                   name="user_sign"
                                   value="{{ \App\Models\User::NAME_SIGN }}"
                                   checked>
                            <label for="name1">{{ auth()->user() ? auth()->user()->full_name : __('service/index.default_nickname')}}</label>
                        </div>
                        <div class="col-6 col-sm-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name2"
                                   name="user_sign"
                                   value="{{ \App\Models\User::NICKNAME_SIGN }}"
                                   @if(auth()->user() && !auth()->user()->nickname) disabled @endif>
                            <label for="name2">{{ empty(auth()->user()->nickname) ? __('service/index.review_nickname') : auth()->user()->nickname }}</label>
                        </div>
                        <div class="col-6 col-sm-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name3"
                                   name="user_sign"
                                   value="{{ \App\Models\User::DEFAULT_SIGN }}">
                            <label for="name3">@lang('service/index.default_nickname')</label>
                        </div>
                    </div>
                    <div class="create-review-buttons flex-wrap">
                        <div class="col-md-2 mb-2 mb-md-0">
                            <button type="submit"
                                    class="createReviewButton loginButton submitReviewButton"
                                    data-action="{{ route('save-review') }}"
                                    @guest disabled @endguest>
                                @lang('service/index.save')
                            </button>
                        </div>
                        <div class="col-md-3 col-lg-2 mb-2 mb-md-0">
                            <button type="submit"
                                    class="createReviewButton loginButton submitReviewButton"
                                    data-action="{{ route('presaving-review') }}"
                                    @guest disabled @endguest>
                                @lang('service/index.view_and_save')
                            </button>
                        </div>
                        <div class="col-md-2">
                            <a role="button"
                               href="{{ route('reviews', ['review_item' => $slug]) }}"
                               class="createReviewButton"
                               id="cancelButton">
                                @lang('service/index.cancel')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </form>
@endsection
