<div class="single-review {{ $review->is_published ? '' : 'singleBlockedReview' }}">
    <div class="single-review-info">
        <div>
            <span>{{ $review->created_at }}</span>
        </div>
        <div>
            <div class="review-stars">
                @for($i=1;$i < 6; $i++)
                    @if($i <= $review->rating)
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
            <div class="profile-single-review-content">
                <div class="single-review-name">
                    <div class="single-review-logo-name">
                        <span>{{ $review->full_name }}</span>
                        @if($review->logo->count())
                            <img src="{{ asset($review->logo->first()->getImageUrl()) }}" height="50px" width="50px"/>
                        @endif
                        <div class="single-review-user-geoposition">
                            <i>{{ $review->getFullGeoposition() }}</i>
                        </div>
                    </div>
                    <div>
                        <div class="single-review-user-name">
                            <i>{{ $review->user->getUserSign($review->user_sign) }}</i>
                            <div>
                                <img src="{{ App\Services\CongratsService::getUserCongratulation($review->user) }}" height="25px" width="20px"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-single-review-review">
                    <p>
                        <span class="single-review-holder">
                            @if($review->video)
                                    <video class="videoPreview" style="object-fit: cover" controls>
                                        <source src="{{ $review->video->getVideoUrl() }}" type="video/mp4">
                                        {{--<source src="movie.ogg" type="video/ogg">--}}
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
            <div class="profile-single-review-button {{ $review->is_published ?: 'profile-single-review-blocked' }}">
                @if($review->is_blocked)
                    <span>Review blocked due to complaints.</span>
{{--                @elseif($review->on_moderation)--}}
{{--                    <span>Review on moderation.</span>--}}
                @else
                    <a type="button"
                        href="{{ route('profile-reviews.edit', $review->id) }}">
                        @lang('service/index.edit')
                    </a>
                    <a data-toggle="modal"
                       type="button"
                       id="profileCommentButton-{{ $review->id }}">
                        @lang('service/index.reply')
                    </a>
                    <a data-toggle="modal"
                       type="button"
                       class="deleteReview"
                       data-review-id="{{ $review->id }}"
                       data-review-name="{{ $review->full_name }}"
                       data-action="{{ route("profile-reviews.destroy", ":id") }}"
                       data-type="review"
                       data-target="#deleteReviewModal">
                        @lang('service/index.delete')
                    </a>
                @endif
            </div>
        </div>
        @if($review->is_blocked)
            <div class="profile-complain-btn">
                <a type="button"
                   class="otherButton"
                   id="profileComplaintButton-{{ $review->id }}"
                   data-complains="{{ $review->complains->count() }}">
                    Complains ({!! $review->complains->count() !!})
                </a>
            </div>
        @endif
        <div class="w-100 profile-review-item">
            @foreach($review->complains as $complain)
                <div class="complain" style="display: none">
                    <span>{!! $complain->full_name !!}</span>
                    <span>{!! $complain->msg !!}</span>
                </div>
            @endforeach
            @foreach($review->comments as $comment)
                <div class="comment" style="display: none">
                    <span>{!! $comment->body !!}</span>
                    <div class="d-flex justify-content-around w-25 flex-shrink-0">
                        <div>
                            <label for="comment-like-{!! $comment->id !!}">{!! $comment->likes !!}</label>
                            <input id="comment-like-{!! $comment->id !!}"
                                   class="comment-like-reaction"
                                   type="image"
                                   data-comment-id="{!! $comment->id !!}"
                                   data-reaction-name="likes"
                                   src="{{ asset('images/positive_like.png') }}"
                                   @auth @else disabled @endauth/>
                        </div>
                        <div>
                            <input id="comment-dislike-{!! $comment->id !!}"
                                   class="comment-like-reaction"
                                   type="image"
                                   data-comment-id="{!! $comment->id !!}"
                                   data-reaction-name="dislikes"
                                   src="{{ asset('images/negative_like.png') }}"
                                   @auth @else disabled @endauth/>
                            <label for="comment-dislike-{!! $comment->id !!}">{!! $comment->dislikes !!}</label>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="comment-example" style="display: none">
                    <span></span>
                    <div class="d-flex justify-content-around w-25 flex-shrink-0">
                        <div>
                            <label for="comment-like"></label>
                            <input id="comment-like"
                                   class="comment-like-reaction"
                                   type="image"
                                   data-review-id=""
                                   data-reaction-name="likes"
                                   src="{{ asset('images/positive_like.png') }}"
                                   @auth @else disabled @endauth/>
                        </div>
                        <div>
                            <input id="comment-dislike"
                                   class="comment-like-reaction"
                                   type="image"
                                   data-review-id=""
                                   data-reaction-name="dislikes"
                                   src="{{ asset('images/negative_like.png') }}"
                                   @auth @else disabled @endauth/>
                            <label for="comment-like"></label>
                        </div>
                    </div>
                </div>
            <div class="review-textarea flex-wrap" data-review-id="{{ $review->id }}">
                <div class="col-12 col-md-9 mb-3 mb-md-0">
                        <textarea name="review"
                                  type="text"
                                  id="review-text"
                                  placeholder="@lang('service/index.review_text_placeholder')"></textarea>
                </div>
                <div class="col-12 col-md-3">
                    <button class="otherButton" id="addCommentButton-{{ $review->id }}">
                        @lang('service/index.add_comment')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
