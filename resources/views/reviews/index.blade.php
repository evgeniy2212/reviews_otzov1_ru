@extends('layouts.app')

@section('modal_forms')
    @include('includes.modal.complainModal')
@endsection

@section('content')
    <div class="container">
        <div class="content-place">
            <div class="create-review-button">
                <span>
                    {{ \Illuminate\Support\Str::upper(__('service/index.reviews.write_new')) }}
                </span>
                <div class="col-sm-4 col-md-3 col-lg-2">
                    @guest()
                        <a role="button" href="{{ route('test-creation-review', ['review_item' => $slug]) }}" class="createReviewButton" id="cancelButton">
                            @lang('service/index.start')
                        </a>
                    @else
                        <a role="button" href="{{ route('create-review', ['review_item' => $slug]) }}" class="createReviewButton" id="cancelButton">
                            @lang('service/index.start')
                        </a>
                    @endguest

                </div>
            </div>
            <div class="review-items">
                @if($reviews->count())
                    <div class="d-flex justify-content-center exist-review-title">
                            <span>
                               {{ empty($search) ? '' : "\"$search\"" }} @lang('service/index.reviews.existing')
                            </span>
                    </div>
                    @if(!empty($avgRating))
                        <div class="d-flex justify-content-center">
                            <div class="middle-rating-star" data-rate-value="5" style="width: 91.6406px; height: 33px; position: relative; cursor: default; user-select: none;">
                                <div class="rate-base-layer" style="width: 100%; height: 33px; overflow: hidden; position: absolute; top: 0px; display: block; white-space: nowrap;">
                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                </div>
                                <div class="rate-select-layer" style="width: {!! $starPercent !!}%; height: 33px; overflow: hidden; position: absolute; top: 0px; display: block; white-space: nowrap;">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="review-filters">
                        @foreach($filters as $filter)
                            <div class="col-sm-6 col-md-3 d-md-flex justify-content-md-around">
                                <div>
                                    <label for="country">
                                        {!! $filter->format_name !!}
                                    </label>
                                </div>
                                <div class="review-filters__select-wrap">
                                    <select class="select filter-select"
                                            id="filter-{!! $filter->slug !!}"
                                            name="{!! $filter->slug !!}">
                                        <option value="" selected>{!! \App\Services\DataService::getFilterLang('All') !!}</option>
                                        @foreach($filter->filter_values as $value)
                                            <option value="{!! $value->slug !!}"
                                                {{ (array_key_exists($filter->slug, $paginateParams) && $paginateParams[$filter->slug] === $value->slug)
                                                    ? 'selected'
                                                    : ''}}>
                                                {!! \App\Services\DataService::getFilterLang($value->format_value) !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                        @if(!empty($showCongratulation))
                            <div class="col-sm-6 col-md-5 col-lg-4 d-md-flex justify-content-md-around">
                                <div>
                                    <label>
                                        @lang('service/index.reviews.select_category')
                                    </label>
                                </div>
                                <div class="review-filters__select-wrap">
                                    <select class="select filter-select"
                                            id="filter-{!! \App\Models\ReviewFilter::CONTENT_TYPE_FILTER !!}"
                                            name="{!! \App\Models\ReviewFilter::CONTENT_TYPE_FILTER !!}">
                                        @foreach(\App\Models\ReviewFilter::CONTENT_TYPES as $content_type)
                                            <option value="{!! $content_type !!}"
                                                {{ (array_key_exists(\App\Models\ReviewFilter::CONTENT_TYPE_FILTER, $paginateParams) && $paginateParams[\App\Models\ReviewFilter::CONTENT_TYPE_FILTER] === $content_type)
                                                    ? 'selected'
                                                    : ''}}>
                                                {!! \App\Services\DataService::getFilterLang($content_type) !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="d-flex justify-content-center exist-review-title">
                            <span>
                                @lang('service/index.reviews.empty_search_result')
                            </span>
                    </div>
                @endif
                @forelse($reviews as $review)
                    @if(class_basename($review) != 'Review')
                        @include('reviews.single_congratulation')
                    @else
                        @include('reviews.single_review')
                    @endif
                @empty

                @endforelse
                @if($reviews->total() > $reviews->count())
                      <div class="pagination-container">
                              {{ $reviews->appends($paginateParams)->links() }}
                      </div>
                @endif
            </div>
        </div>
    </div>
@endsection
