@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="review-filters">
            @foreach($filters as $filter)
                <div class="col-md-4 d-sm-flex justify-content-sm-around">
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
        </div>
        @foreach($reviews as $review)
            @include('profile.single_review')
        @endforeach
        @if($reviews->total() > $reviews->count())
            <div class="pagination-container">
                {{ $reviews->appends($paginateParams)->links() }}
            </div>
        @endif
    </div>
@endsection
