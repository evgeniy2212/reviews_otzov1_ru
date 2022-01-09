<div class="single-review {{ $review->is_published ? '' : 'singleBlockedReview' }}">
    <div class="adminSingleReviewInfo">
        <div>
            <span>{{ $review->created_at }}</span>
        </div>
        <div>
            <div class="review-stars">
                @for($i=0;$i < 5; $i++)
                    @if($i < $review->rating)
                        &#9733;
                    @else
                        &#9734;
                    @endif
                @endfor
            </div>
        </div>
        <div class="d-flex justify-content-around w-100">
            <div>
                <label for="like-{{ $review->id }}">{{ $review->likes }}</label>
                <input data-review-id="{{ $review->id }}"
                       data-reaction-name="likes"
                       id="like-{{ $review->id }}"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/positive_like.png') }}"
                       @auth @else disabled @endauth/>
            </div>
            <div>
                <input data-review-id="{{ $review->id }}"
                       data-reaction-name="dislikes"
                       id="dislike-{{ $review->id }}"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/negative_like.png') }}"
                       @auth @else disabled @endauth/>
                <label for="dislike-{{ $review->id }}">{{ $review->dislikes }}</label>
            </div>
        </div>
    </div>
    <div class="profile-single-review-item">
        <div class="w-100 d-flex flex-wrap flex-md-nowrap justify-content-center">
            <div class="adminSingleReviewContent">
                <div class="single-review-name">
                    <div>
                        {{ $review->full_name }}
                    </div>
                    <div class="single-review-user-name">
                        <i>{{ $review->user->getUserSign($review->user_sign) }}</i>
                        <div>
                            <img src="{{ App\Services\CongratsService::getUserCongratulation($review->user) }}" height="25px" width="20px"/>
                        </div>
                    </div>
                </div>
                <div class="profile-single-review-review">
                    @if(!optional($review->category_group)->is_published)
                        <span class="moderation-title d-sm-flex align-items-center mt-1">
                            <span class="moderation-text">@lang('service/index.new_group_name')</span>
                            <input id="moderationInput{{ $review->id }}"
                                   data-review-id="{{ $review->id }}"
                                   class="form-control moderation-input"
                                   type="text"
                                   value="{!! optional($review->category_group)->name !!}"
                                   readonly>
                        </span>
                    @endif
                    <p>
                        <span class="single-review-holder">
                          @if($review->video)
                                <video class="videoPreview" style="object-fit: cover" controls>
                                <source src="{{ $review->video->getVideoUrl() }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @else
                                <img src="{{ asset('storage/images/default_img_video.png') }}"
                                     alt="photo"
                                     class="videoPreview">
                            @endif
                            @if($review->image)
                                <img src="{{ $review->image->getResizeImageUrl() }}"
                                     alt=""
                                     data-full-size-src="{{ $review->image->getImageUrl() }}"
                                     class="reviewImage previewImage"
                                     style="cursor: pointer;"
                                     id="myImg">
                            @else
                                <img src="{{ asset('storage/images/default_img.png') }}"
                                     alt=""
                                     class="previewImage">
                            @endif
                        </span>
                        @if($review->characteristics->isNotEmpty())
                            {{ $review->characteristics->pluck('name')->implode(', ') }}
                        @endif
                        {{ $review->review }}
                    </p>
                </div>
            </div>
            <div class="adminSingleReviewButton">
                @method('PATCH')
                @csrf
                @if($review->moderationReviews->where('pivot.is_new', 1)->count())
                    <button type="button"
                            id="reviewEditBtn{{ $review->id }}"
                            data-review-id="{{ $review->id }}"
                            class="otherButton">
                        @lang('service/index.edit')
                    </button>
                    <form method="POST"
                          action="{{ route('admin.update_moderation_review', ['review' => $review->id]) }}"
                          enctype="multipart/form-data"
                          novalidate=""
                          id="adminReviewForm{{ $review->id }}Block"
                          style="width: 100%">
                        @csrf
                        @method('PATCH')
                        <input type="hidden"
                               id="newGroupName{{ $review->id }}"
                               name="new_name"
                               value="">
                        <button type="submit"
                                id="reviewPublishButton{{ $review->id }}"
                                class="otherButton"
                                name="update"
                                value="1">
                            @lang('service/admin.moderation.update')
                        </button>
                    </form>
                    <form method="POST"
                          action="{{ route('admin.update_moderation_review', ['review' => $review->id]) }}"
                          enctype="multipart/form-data"
                          novalidate=""
                          id="adminReviewForm{{ $review->id }}Unblock"
                          style="width: 100%">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            id="reviewPublishButton{{ $review->id }}Unblock"
                            class="otherButton"
                            name="update"
                            value="0">
                            @lang('service/admin.moderation.decline')
                        </button>
                    </form>
                @else
                    <a href="{{ route('show-review', ['review' => $review->id]) }}"
                       type="button"
                       class="otherButton">
                        Show Review
                    </a>
                    {{--                        <form method="POST" action="{{ route('admin.update_moderation_review', ['review' => $review->id]) }}" enctype="multipart/form-data" novalidate="" id="adminReviewForm{{ $review->id }}" style="width: 100%">--}}
                    {{--                            @method('PATCH')--}}
                    {{--                            @csrf--}}
                    {{--                            <button type="submit"--}}
                    {{--                                    id="reviewPublishButton{{ $review->id }}"--}}
                    {{--                                    class="otherButton"--}}
                    {{--                                    name="is_blocked"--}}
                    {{--                                    value="{{ $review->is_blocked ? 0 : 1 }}">--}}
                    {{--                                @if(!$review->is_blocked)--}}
                    {{--                                    @lang('service/admin.complain.block')--}}
                    {{--                                @else--}}
                    {{--                                    @lang('service/admin.complain.not_block')--}}
                    {{--                                @endif--}}
                    {{--                            </button>--}}
                    {{--                        </form>--}}
                @endif
            </div>
        </div>
        <div class="w-100 profile-review-item">
            @foreach($review->complains as $complain)
                <div class="complain" style="display: none">
                    <span>{!! $complain->full_name !!}</span>
                    <span>{!! $complain->pivot->msg !!}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
