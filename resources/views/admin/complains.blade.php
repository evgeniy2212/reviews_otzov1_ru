@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters" style="justify-content: space-around;">
            <div class="adminFilterItem">
                <div>
                    <a class="admin-complain {{ (array_key_exists('is_new', $paginateParams) && $paginateParams['is_new'] === '1')
                        ? 'active'
                        : ''}}"
                       href="{{ route('admin.complains.index', ['is_new' => 1]) }}">
                        @lang('service/index.new') ({!! $newReviewsCnt !!})
                    </a>
                </div>
            </div>
            <div class="adminFilterItem">
                <div>
                    <a class="admin-complain {{ (array_key_exists('is_new', $paginateParams) && $paginateParams['is_new'] === '0')
                                            ? 'active'
                                            : ''}}"
                       href="{{ route('admin.complains.index', ['is_new' => 0]) }}">
                        @lang('service/index.processed') ({!! $processedReviewsCnt !!})
                    </a>
                </div>
            </div>
            <div class="adminFilterItem">
                <div>
                    <a class="admin-complain {{ ((array_key_exists('is_new', $paginateParams) && $paginateParams['is_new'] === 'NULL') || !array_key_exists('is_new', $paginateParams))
                                            ? 'active'
                                            : ''}}"
                       href="{{ route('admin.complains.index', ['is_new' => null]) }}">
                        @lang('service/index.all') ({!! $allReviewsCnt !!})
                    </a>
                </div>
            </div>
        </div>
        @forelse($reviews as $review)
            @switch(get_class($review))
                @case(\App\Models\UserCongratulation::class)
                    @include('admin.includes.single_complain_congratulation')
                    @break
                @default()
                    @include('admin.includes.single_complain_review')
            @endswitch
        @empty
            <span>@lang('service/admin.empty_complains')</span>
        @endforelse
        @if($reviews->total() > $reviews->count())
            <div class="pagination-container">
                {{ $reviews->appends($paginateParams)->links() }}
            </div>
        @endif
    </div>
@endsection
