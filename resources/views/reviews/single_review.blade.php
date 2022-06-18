<div class="single-review">
    <div class="single-review-info">
        <span class="single-review-info__date">{{ $review->created_at }}</span>
        <div class="review-stars">
            @for($i=1;$i < 6; $i++)
                @if($i <= $review->rating)
                    &#9733;
                @else
                    &#9734;
                @endif
            @endfor
        </div>
        <div class="d-flex justify-content-around w-100">
            <div class="like-container-right">
                <label for="like-{{ $review->id }}">{{ $review->likes }}</label>
                <input data-review-id="{{ $review->id }}"
                       data-reaction-name="likes"
                       data-reaction-href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::localizeUrl('/register') }}"
                       id="like-{{ $review->id }}"
                       class="like-reaction {{ \Illuminate\Support\Facades\Auth::check() ? '' : 'only-auth' }}"
                       type="image"
                       src="{{ asset('images/positive_like.png') }}"/>
            </div>
            <div class="like-container-left">
                <input data-review-id="{{ $review->id }}"
                       data-reaction-name="dislikes"
                       data-reaction-href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::localizeUrl('/register') }}"
                       id="dislike-{{ $review->id }}"
                       class="like-reaction {{ \Illuminate\Support\Facades\Auth::check() ? '' : 'only-auth' }}"
                       type="image"
                       src="{{ asset('images/negative_like.png') }}"/>
                <label for="dislike-{{ $review->id }}">{{ $review->dislikes }}</label>
            </div>
        </div>
    </div>
    <div class="single-review-content">
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
        <div class="single-review-review">
            <p>
                <span class="single-review-holder">
                    @if($review->video)
                        <video class="videoPreview"
                               style="object-fit: cover"
                               controls>
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
                    {{ $review->characteristics->pluck('name')->implode(', ') }}<br>
                @endif
                {{ $review->review }}
            </p>
            <div class="w-100">
                @foreach($review->comments as $comment)
                    <div class="comment" style="display: none">
                        <span>{!! $comment->body !!}</span>
                        <div class="d-flex justify-content-around comment__inner">
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
                    <div class="d-flex justify-content-around comment__inner">
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
                @auth()
                    <div class="review-textarea flex-wrap" data-review-id="{{ $review->id }}">
                        <div class="col-12 col-md-8 mb-2 mb-md-0">
                            <textarea name="review"
                                      type="text"
                                      id="review-text"
                                      placeholder="@lang('service/index.review_text_placeholder')"
                                      style="overflow:hidden"></textarea>
                        </div>
                        <div class="col-12 col-md-4 comment-buttons">
                            <button class="otherButton"
                                    id="addCommentButton-{{ $review->id }}"
                                    data-close="{!! __('service/index.close') !!}"
                                    data-show-comments="{!! __('service/index.reviews.show_comments') !!}">
                                @lang('service/index.add_comment')
                            </button>
                            @if(auth()->user()->id !== $review->user_id && $review->is_communication_enable)
                                <button class="otherButton"
                                        id="sendReviewMessageButton-{{ $review->id }}"
                                        data-tooltip="{!! __('service/index.send_private_message') !!}">
                                    @lang('service/index.send_mail')
                                </button>
                            @endauth
                        </div>
                    </div>
                @else
                        <div class="review-textarea" id="review-for-guest" data-review-id="{{ $review->id }}">
                            <div class="col-md-9">
                                <p style="color: #dc3545">@lang('service/message.log_into_account')</p>
                            </div>
                        </div>
                @endauth
                <div class="col-md-5 offset-md-7">
                    <button class="otherButton" style="white-space: nowrap"
                            id="commentButton-{{ $review->id }}"
                            data-close="{!! __('service/index.close') !!}"
                            data-show-comments="{!! __('service/index.reviews.show_comments') !!}"
                            data-comments="{{ $review->comments->count() }}">
                        @lang('service/index.reviews.show_comments') ({!! $review->comments->count() !!})
                    </button>
                </div>
                <div class="col-md-5 offset-md-7">
                    @auth()
                        <a type="button"
                           href=""
                           data-toggle="modal"
                           class="otherButton" style="white-space: nowrap; margin-top: 10px; text-decoration: none; color: #1b1e21;"
                           id="complainButton-{{ $review->id }}"
                           data-review-model-id="{{ $review->id }}"
                           data-review-model-type="{{ get_class($review) }}"
                           data-tooltip="{{ __('service/index.complain_message') }}"
                           data-target="#complainModal">@lang('service/index.complain')</a>
                    @else
                        <a type="button"
                           href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::localizeUrl('/register') }}"
                           class="otherButton"
                           style="white-space: nowrap; margin-top: 10px; text-decoration: none; color: #1b1e21;"
                           data-tooltip="{{ __('service/index.complain_message') }}"
                           id="complainButton-{{ $review->id }}">@lang('service/index.complain')</a>
                    @endauth
                </div>
                <div class="col-md-5 offset-md-7 col-lg-4 offset-lg-8">
                    @auth()
                        <a type="button"
                           href="{{ Request::url() === route('show-review', [$review->id]) ? url()->previous() : route('show-review', [$review->id]) }}"
                           class="otherButton"
                           style="white-space: nowrap; margin-top: 10px; text-decoration: none; color: #1b1e21;"
                           id="showButton-{{ $review->id }}">
                            {{ Request::url() === route('show-review', [$review->id]) ? __('service/index.close') : __('service/index.open') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
