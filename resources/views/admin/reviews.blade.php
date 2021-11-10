@extends('profile.index')

@section('modal_forms')
    @include('includes.modal.confirmDeleteLogo')
@endsection

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            @foreach(\App\Models\Review::ADMIN_FILTERS as $filterName => $filters)
                @if(!empty($filters))
                    <div class="adminFilterItem">
                        <div>
                            {{--<label>--}}
                            {!! \Illuminate\Support\Str::upper(\App\Services\DataService::getFilterLang($filterName)) !!}
                            {{--</label>--}}
                        </div>
                        <div>
                            <select class="select"
                                    id="reviewFilter-{!! $filterName !!}"
                                    name="{!! $filterName !!}">
                                @foreach($filters as $key => $value)
                                    <option value="{!! $key !!}"
                                            {{ (array_key_exists($filterName, $paginateParams) && $paginateParams[$filterName] === $key)
                                                ? 'selected'
                                                : ''}}
                                    >
                                        {!! \App\Services\DataService::getFilterLang($key) !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="adminFilterItem adminFilterDatepicker">
                <input type="text"
                       class="form-control input adminReviewdatepicker"
                       name="from"
                       required
                       placeholder="{{ __('service/profile.from') }}"
                       value="{{ empty($paginateParams['from']) ? old('from') : $paginateParams['from'] }}"
                       autocomplete="off">
                <input type="hidden"
                       id="adminDatepickerDifMinRange"
                       value="{{ \App\Services\ReviewService::difToMinRangeDate() }}">
                <input type="text"
                       class="form-control input adminReviewdatepicker"
                       name="to"
                       required
                       value="{{ empty($paginateParams['to']) ? old('to') : $paginateParams['to'] }}"
                       placeholder="{{ __('service/profile.to') }}"
                       autocomplete="off">
                <input type="hidden"
                       id="adminDatepickerDifMaxRange"
                       value="{{ \App\Services\ReviewService::difToMaxRangeDate() }}">
            </div>
            <button class="btn btn-outline-primary my-md-2 adminFilterButton">@lang('service/index.filter')</button>
            <form method="GET"
                  action="{{ route('admin.searchReviews') }}"
                  class="form-inline search-form"
                  novalidate=""
                  id="searchForm">
                <input class="form-control mr-sm-2 input"
                       id="searchCategory"
                       type="text"
                       name="search"
                       placeholder="{!! __('service/index.search') !!}"
                       aria-label="Search"
                       value="{{ isset($paginateParams['search']) ? $paginateParams['search'] : '' }}"
                       required>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">@lang('service/index.go')</button>
            </form>
        </div>
        @forelse($reviews as $review)
            @include('admin.includes.single_review')
        @empty
            <span>@lang('service/index.empty_reviews')</span>
        @endforelse
        @if($reviews->total() > $reviews->count())
            <div class="pagination-container">
                {{ $reviews->appends($paginateParams)->links() }}
            </div>
        @endif
    </div>
@endsection
