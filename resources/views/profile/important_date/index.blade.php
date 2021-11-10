@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        @include('profile.important_date.add_important_date')
        <div class="profile-important-date-filters">
            @foreach($filters as $filter)
                <div class="col-md-4 mb-3 mb-sm-0 d-sm-flex justify-content-around">
                    <div>
                        <label for="country">
                            {!! $filter->format_name !!}
                        </label>
                    </div>
                    <div>
                        <select class="select filter-select"
                                id="filter-{!! $filter->slug !!}"
                                name="{!! $filter->slug !!}">
                            <option value="" selected>{!! \App\Services\DataService::getFilterLang('All') !!}</option>
                            @foreach($filter->filter_values as $value)
                                //todo change to better solution
                                @if($value->slug !== 'rating')
                                    <option value="{!! $value->slug !!}"
                                        {{ (array_key_exists($filter->slug, $paginateParams) && $paginateParams[$filter->slug] === $value->slug)
                                            ? 'selected'
                                            : ''}}>
                                        {!! \App\Services\DataService::getFilterLang($value->format_value) !!}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="profile-important-date-control">
            <button type="submit"
                    id="deleteImportantDates"
                    disabled
                    class="otherButton">@lang('service/index.delete')</button>
        </div>
        @foreach($importantDates as $importantDate)
            @include('profile.important_date.single_important_date')
        @endforeach
        @if($importantDates->total() > $importantDates->count())
            <div class="pagination-container">
                {{ $importantDates->appends($importantDates)->links() }}
            </div>
        @endif
    </div>
@endsection
