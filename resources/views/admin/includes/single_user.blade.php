<form method="POST" action="{{ route('admin.users.update', ['user' => $user->id]) }}" enctype="multipart/form-data" novalidate="" id="adminUserForm{{ $user->id }}" style="width: 100%">
    @method('PATCH')
    @csrf
    <div class="singleUser {{ $user->is_blocked ? 'singleBlockedUser' : '' }}">
        <div class="singleUserControl">
{{--            @if($user->is_blocked_cnt >= \App\Models\User::MAX_BLOCKED_ATTEMPTS)--}}
{{--                <span>@lang('service/admin.blocked_forever')</span>--}}
{{--            @else--}}
                <button type="submit"
                        id="userPublishButton{{ $user->id }}"
                        class="otherButton"
                        name="is_blocked"
                        value="{{ $user->is_blocked ? 0 : 1 }}">
                    @if($user->is_blocked)
                        @lang('service/admin.unhold')
                    @else
                        @lang('service/admin.hold')
                    @endif
                </button>
{{--            @endif--}}
            <a type="button"
               class="otherButton"
               href="{{ route('admin.users_reviews.show', $user->id) }}">@lang('service/admin.user.reviews')</a>
            <a type="button"
               class="otherButton"
               href="{{ route('admin.user_congratulations.show', $user->id) }}">@lang('service/admin.user.congrats')</a>
        </div>
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
</form>

