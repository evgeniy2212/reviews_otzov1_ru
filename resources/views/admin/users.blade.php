@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters adminFiltersUsers">
            @foreach(\App\Models\User::FILTERS as $filterName => $filters)
                <div class="adminFilterItem">
                    <div>
                        {{--<label for="userFilter">--}}
                            {!! \App\Services\DataService::getFilterLang($filterName) !!}
                        {{--</label>--}}
                    </div>
                    <div>
                        <select class="select admin-filter-select"
                                 id="userFilter-{!! $filterName !!}"
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
            @endforeach
            <form method="GET"
                  action="{{ route('admin.searchUsers') }}"
                  class="form-inline search-form"
                  novalidate=""
                  id="searchForm">
                <input class="form-control mr-sm-2 input"
                       id="searchCategory"
                       type="text"
                       name="search"
                       placeholder="{{ __('service/index.search') }}"
                       aria-label="Search"
                       value="{{ isset($search) ? $search : '' }}"
                       required>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">{{ __('service/index.search') }}</button>
            </form>
        </div>
        @forelse($users as $user)
            @include('admin.includes.single_user')
        @empty
            <span>@lang('service/index.empty_users')</span>
        @endforelse
        @if($users->total() > $users->count())
              <div class="pagination-container">
                    {{ $users->appends($paginateParams)->links() }}
              </div>
        @endif
    </div>
@endsection
