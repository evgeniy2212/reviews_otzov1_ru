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
        <div class="w-100 d-flex">
            <div class="adminSingleReviewContent">
                <div class="single-review-name">
                    <div class="single-review-logo-name">
                        <span>{{ $review->full_name }}</span>
                        @if($review->logo->count())
                            <img src="{{ asset($review->logo->first()->getImageUrl()) }}" height="50px" width="50px"/>
                        @endif
                    </div>
                    <div class="single-review-user-name">
                        <i>{{ $review->user->getUserSign($review->user_sign) }}</i>
                        <div>
                            <img src="{{ App\Services\CongratsService::getUserCongratulation($review->user) }}" height="25px" width="20px"/>
                        </div>
                    </div>
                </div>
                <div class="profile-single-review-review">
                    @if($review->characteristics->isNotEmpty())
                        <span>{{ $review->characteristics->pluck('name')->implode(', ') }}</span>
                    @endif
                    <p>
                        <span class="single-review-holder">
                            @if($review->video)
                                <video class="videoPreview" style="object-fit: cover" controls>
                                <source src="{{ $review->video->getVideoUrl() }}" type="video/mp4">
                                {{--<source src="movie.ogg" type="video/ogg">--}}
                                Your browser does not support the video tag.
                            </video>
                            @endif
                            @if($review->image)
                                <img src="{{ $review->image->getResizeImageUrl() }}"
                                     alt=""
                                     data-full-size-src="{{ $review->image->getImageUrl() }}"
                                     class="reviewImage previewImage"
                                     style="cursor: pointer;"
                                     id="myImg">
                            @endif
                        </span>
                        {{ $review->review }}
                    </p>
                </div>
            </div>
            <div class="adminSingleReviewButton">
                <form method="POST" action="{{ route('admin.reviews.update', ['review' => $review->id]) }}" enctype="multipart/form-data" novalidate="" id="adminReviewForm{{ $review->id }}" style="width: 100%">
                    @method('PATCH')
                    @csrf
                    <button type="submit"
                            id="reviewPublishButton{{ $review->id }}"
                            class="otherButton"
                            name="is_published"
                            value="{{ $review->is_published ? 0 : 1 }}">
                        @if($review->is_published)
                            @lang('service/admin.hold')
                        @else
                            @lang('service/admin.unhold')
                        @endif
                    </button>
                </form>
                <a data-toggle="modal"
                   type="button"
                   class="otherButton"
                   data-close="{!! __('service/index.close') !!}"
                   data-reply="{!! __('service/index.reply') !!}"
                   id="profileCommentButton-{{ $review->id }}">
                    @lang('service/index.reply')
                </a>
            </div>
        </div>
        <div class="w-100 profile-review-item">
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
            <div class="review-textarea" data-review-id="{{ $review->id }}">
                <div class="col-12 col-md-9">
                        <textarea name="review"
                                  type="text"
                                  id="review-text"
                                  placeholder="@lang('service/index.review_text_placeholder')"></textarea>
                </div>
                <div class="col-12 col-md-3">
                    <button class="otherButton" id="addCommentButton-{{ $review->id }}">
                        {{ __('service/admin.add_item', ['item' => __('service/index.comment')]) }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
