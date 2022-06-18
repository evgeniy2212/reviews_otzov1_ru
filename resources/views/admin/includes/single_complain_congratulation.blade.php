<div class="single-review {{ $review->is_published ? '' : 'singleBlockedReview' }}">
    <div class="adminSingleReviewInfo">
        <div>
            <span>{{ $review->created_at }}</span>
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
                <div class="profile-single-congratulation">
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
                                <img src="{{ $review->image->getResizeImageUrl('congratulations') }}"
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
                        @if($review->category)
                            <span class="congratulation-category">{{ $review->category->title }}</span><br>
                        @endif
                        <span class="congratulation-text">
                          {{ $review->body }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="adminSingleReviewButton">
                    @method('PATCH')
                    @csrf
                    @if($review->complains->where('pivot.is_new', 1)->count())
                        <form method="POST"
                              action="{{ route('admin.update_complain_review', ['model_id' => $review->id, 'model_type' => get_class($review)]) }}"
                              enctype="multipart/form-data"
                              novalidate=""
                              id="adminReviewForm{{ $review->id }}Block"
                              style="width: 100%">
                            @method('PATCH')
                            @csrf
                            <button type="submit"
                                        id="reviewPublishButton{{ $review->id }}"
                                        class="otherButton"
                                        name="is_blocked"
                                        value="0">
                                @lang('service/admin.complain.block')
                            </button>
                        </form>
                        <form method="POST"
                              action="{{ route('admin.update_complain_review', ['model_id' => $review->id, 'model_type' => get_class($review)]) }}"
                              enctype="multipart/form-data"
                              novalidate=""
                              id="adminReviewForm{{ $review->id }}Unblock"
                              style="width: 100%">
                            @method('PATCH')
                            @csrf
                            <button type="submit"
                                        id="reviewPublishButton{{ $review->id }}"
                                        class="otherButton"
                                        name="is_blocked"
                                        value="1">
                                @lang('service/admin.complain.not_block')
                            </button>
                        </form>
                    @else
                        <form method="POST"
                              action="{{ route('admin.update_complain_review', ['model_id' => $review->id, 'model_type' => get_class($review)]) }}"
                              enctype="multipart/form-data"
                              novalidate=""
                              id="adminReviewForm{{ $review->id }}"
                              style="width: 100%">
                            @method('PATCH')
                            @csrf
                            <button type="submit"
                                    id="reviewPublishButton{{ $review->id }}"
                                    class="otherButton"
                                    name="is_blocked"
                                    value="{{ $review->is_blocked ? 0 : 1 }}">
                                @if(!$review->is_blocked)
                                    @lang('service/admin.complain.block')
                                @else
                                    @lang('service/admin.complain.not_block')
                                @endif
                            </button>
                        </form>
                    @endif
                <a data-toggle="modal"
                   type="button"
                   class="otherButton"
                   id="adminComplaintButton-{{ $review->id }}"
                   data-complains="{{ $review->complains->count() }}">
                    @lang('service/admin.complains') ({!! $review->complains->count() !!})
                </a>
            </div>
        </div>
        <div class="w-100 profile-review-item">
            @foreach($review->complains as $complain)
                <div class="complain" style="display: none">
                    <span>{!! $complain->user->full_name !!}</span>
                    <span>{!! $complain->msg !!}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
