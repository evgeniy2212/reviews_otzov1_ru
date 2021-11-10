@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="profile-congratulation-filters">
            @foreach($filters as $filter)
                <div class="col-md-4 d-flex justify-content-between justify-content-sm-around mb-2 mb-sm-0">
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
        @foreach($congratulations as $congratulation)
            @include('profile.congratulation.single_private_congratulation')
        @endforeach
        @if($congratulations->total() > $congratulations->count())
            <div class="pagination-container">
                {{ $congratulations->appends($paginateParams)->links() }}
            </div>
        @endif
    </div>
@endsection
