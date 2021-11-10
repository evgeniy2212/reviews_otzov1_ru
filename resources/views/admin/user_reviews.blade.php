@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            @foreach(\App\Models\Review::ADMIN_FILTERS as $filterName => $filters)
                @if(!empty($filters))
                    <div class="col-md-4 d-flex flex-row justify-content-around">
                        <div>
                            {{--<label for="bannerFilter">--}}
                            {!! \Illuminate\Support\Str::upper(\App\Services\DataService::getFilterLang($filterName)) !!}
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
                @endif
            @endforeach
        </div>
        <div class="singleUser">
            <div class="singleUserInfo">
                <div class="singleUserInfoColumn">
                    <div class="singleUserInfoItem">
                        <span class="singleUserInfoItemNaming">@lang('service/admin.user.name')</span> <span>{!! $user->full_name !!}</span>
                    </div>
                    <div class="singleUserInfoItem">
                        <span class="singleUserInfoItemNaming">@lang('service/admin.user.pseudonym')</span> <span>{!! empty($user->nickname) ? ' - ' : $user->nickname !!}</span>
                    </div>
                </div>
                <div class="singleUserInfoColumn">
                    <div class="singleUserInfoItem">
                        <span class="singleUserInfoItemNaming">@lang('service/admin.user.address')</span> <span>{!! $user->full_address !!}</span>
                    </div>
                    <div>
                        <span class="singleUserInfoItemNaming">@lang('service/admin.user.email')</span> <span>{!! $user->email !!}</span>
                    </div>
                </div>
            </div>
        </div>
        @forelse($reviews as $review)
            @include('admin.includes.single_user_review')
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
