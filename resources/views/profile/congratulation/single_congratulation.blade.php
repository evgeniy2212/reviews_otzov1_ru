<div class="single-review">
    <div class="single-review-info">
        <div>
            <span>{{ $congratulation->created_at }}</span>
        </div>
    </div>
    <div class="profile-single-review-item">
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
                        <span class="congratulation-text">
                            {{ $congratulation->body }}
                        </span>
                    </p>
                </div>
                <div class="profile-single-congratulation-button">
                        <a type="button"
                           href="{{ route('profile-congratulations.edit', $congratulation->id) }}">
                            @lang('service/index.edit')
                        </a>
                        <a data-toggle="modal"
                           type="button"
                           class="deleteReview"
                           data-review-id="{{ $congratulation->id }}"
                           data-review-is-owner="1"
                           data-review-name="{{ $congratulation->full_name }}"
                           data-type="congratulation"
                           data-action="{{ $congratulation->is_private ? route("delete-private-congratulations", [":is_owner", ":id"]) : route("profile-congratulations.destroy", ":id") }}"
                           data-target="#deleteReviewModal">
                            @lang('service/index.delete')
                        </a>
                    @if($congratulation->is_private)
                        <span style="text-shadow: 0px 0px 4px #ff0000;color: #5800008f;width: 100%">
                            PRIVATE
                        </span>
                    @endif
                </div>
            </div>
    </div>
</div>
