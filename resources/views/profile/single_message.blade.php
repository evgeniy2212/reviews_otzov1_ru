<div class="single-review {{ $review->isHasUnreadMessages() ? 'unread-profile-messages' : '' }}">
    <div class="single-review-info">
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
            <div class="like-container-right">
                <label for="like-{{ $review->id }}">{{ $review->likes }}</label>
                <input data-review-id="{{ $review->id }}"
                       data-reaction-name="likes"
                       id="like-{{ $review->id }}"
                       class="like-reaction"
                       type="image"
                       src="{{ asset('images/positive_like.png') }}"
                       @auth @else disabled @endauth/>
            </div>
            <div class="like-container-left">
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
        <div class="w-100 d-flex profile-single-review-item__inner" style="height: 100%">
            <div class="profile-single-review-content">
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
                    @if($review->characteristics->isNotEmpty())
                        <span>{{ $review->characteristics->pluck('name')->implode(', ') }}</span>
                    @endif
                    <span>
                {{ $review->review }}
            </span>
                </div>
            </div>
            <div class="profile-single-review-button">
                <a data-toggle="modal"
                   type="button"
                   data-review-id="{{ $review->id }}"
                   id="profileMessageButton-{{ $review->id }}">
                    @lang('service/index.reply')
                </a>
                <a data-toggle="modal"
                   type="button"
                   class="deleteMessage"
                   data-review-id="{{ $review->id }}"
                   data-action="{{ route("delete-profile-message", ":id") }}"
                   data-type="review"
                   data-target="#deleteMessageModal">
                    @lang('service/index.delete')
                </a>
            </div>
        </div>
        <div class="w-100 profile-review-item">
            @foreach($review->messages as $key => $message)
                @if($key === $review->messages->keys()->last())
                    <div class="visible-message" data-is-read-messages="">
                        <span class="sender-name">{!! $message->from()->first()->full_name !!}: </span>
                        <span>{!! $message->message !!}</span>
                    </div>
                @endif
                <div class="message" data-is-read-messages="" style="display: none">
                    <span class="sender-name">{!! $message->from()->first()->full_name !!}: </span>
                    <span>{!! $message->message !!}</span>
                </div>
            @endforeach
                <div class="message-example" data-sender-name="{{ auth()->user()->full_name }}" style="display: none">
                    <span class="sender-name"></span>
                    <span class="message-response"></span>
                </div>
            <div class="review-textarea flex-wrap" data-review-id="{{ $review->id }}">
                <div class="col-md-9 mb-2 mb-md-0">
                        <textarea name="review"
                                  type="text"
                                  id="review-text"
                                  placeholder="@lang('service/index.review_text_placeholder')"></textarea>
                </div>
                <div class="col-md-3">
                    <button class="otherButton" id="sendProfileReviewMessageButton-{{ $review->id }}">
                        @lang('service/index.send_mail')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
