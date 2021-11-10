<div class="single-congratulation-private {{ $congratulation->is_read ?: 'unread-single-congratulation-private' }}">
    <div class="single-review-info">
        <div>
            <span>{{ $congratulation->created_at }}</span>
        </div>
    </div>
    <div class="profile-single-review-item">
        <div class="w-100 d-flex">
            <div class="w-100 profile-single-review-content">
                <div class="single-review-name">
                    <div class="single-review-logo-name">
                        <span>{{ $congratulation->full_name }}</span>
                        <div class="single-review-user-geoposition">
                            <i>{{ $congratulation->getFullGeoposition() }}</i>
                        </div>
                    </div>
                    <div>
                        <div class="single-review-user-name">
                            <i>{{ $congratulation->user->getUserSign($congratulation->user_sign) }}</i>
                            <div>
                                <img src="{{ App\Services\CongratsService::getUserCongratulation($congratulation->user) }}" height="25px" width="20px"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-single-congratulation">
                    <p>
                        <span class="single-review-holder">
                          @if($congratulation->video)
                            <video class="videoPreview" style="object-fit: cover" controls>
                                <source src="{{ $congratulation->video->getVideoUrl() }}" type="video/mp4">
                                {{--<source src="movie.ogg" type="video/ogg">--}}
                                Your browser does not support the video tag.
                            </video>
                          @else
                            <img src="{{ asset('storage/images/default_img_video.png') }}"
                                 alt="photo"
                                 class="videoPreview">
                          @endif
                          @if($congratulation->image)
                            <img src="{{ $congratulation->image->getResizeImageUrl('congratulations') }}"
                                 alt=""
                                 data-full-size-src="{{ $congratulation->image->getImageUrl() }}"
                                 class="reviewImage previewImage"
                                 style="cursor: pointer;"
                                 id="myImg">
                          @else
                            <img src="{{ asset('storage/images/default_img.png') }}"
                                 alt=""
                                 class="previewImage">
                          @endif
                        </span>
                        @if($congratulation->category)
                            <span class="congratulation-category">{{ $congratulation->category->title }}</span><br>
                        @endif
                        <span class="congratulation-text-wrap">
                          <span class="congratulation-text">
                              {{ $congratulation->body }}
                          </span>
                        </span>
                    </p>
                </div>
                <div class="profile-single-congratulation-button">
                        <a data-toggle="modal"
                           type="button"
                           data-url="{{ route('read-private-congratulation', [$congratulation->id]) }}"
                           data-review-id="{{ $congratulation->id }}"
                           id="profilePrivateCongratulationButton-{{ $congratulation->id }}">
                            @lang('service/index.show')
                        </a>
                        <a data-toggle="modal"
                           type="button"
                           class="deleteReview"
                           data-review-id="{{ $congratulation->id }}"
                           data-review-is-owner="0"
                           data-review-name="{{ $congratulation->full_name }}"
                           data-type="congratulation"
                           data-action="{{ route("delete-private-congratulations", [":is_owner", ":id"]) }}"
                           data-target="#deleteReviewModal">
                            @lang('service/index.delete')
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
