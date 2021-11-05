@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            @foreach(\App\Models\BannerCategory::FILTERS as $filterName => $filters)
                <div class="col-md-4 d-flex flex-row justify-content-around">
                    <div>
                        {{--<label for="bannerFilter">--}}
                            {!! \App\Services\DataService::getFilterLang($filterName) !!}
                        {{--</label>--}}
                    </div>
                    <div>
                        <select class="select filter-select"
                                id="bannerFilter-{!! $filterName !!}"
                                name="{!! $filterName !!}">
                            @foreach($filters as $key => $value)
                                <option value="{!! $key !!}"
                                        {{ (array_key_exists($filterName, $paginateParams) && $paginateParams[$filterName] === $key)
                                            ? 'selected'
                                            : ''}}>
                                    {!! \App\Services\DataService::getFilterLang($key) !!}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>
        @forelse($banners as $banner)
            @include('admin.includes.single_banner', ['body' => optional($banner)->body])
        @empty
            <span>Ad is EMPTY.</span>
        @endforelse
        @if($banners->total() > $banners->count())
              <div class="pagination-container">
                    {{ $banners->appends($paginateParams)->links() }}
              </div>
        @endif
    </div>
@endsection
