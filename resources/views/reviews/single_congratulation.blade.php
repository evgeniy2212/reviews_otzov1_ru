<div class="single-review">
    <div class="single-review-info">
        <div>
            <span>{{ $review->created_at }}</span>
        </div>
    </div>
    <div class="single-review-content">
        <div class="single-review-name">
            <div class="single-review-logo-name">
                <span>{{ $review->full_name }}</span>
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
                      <video class="videoPreview" controls>
                          <source src="{{ $review->video->getVideoUrl() }}" type="video/mp4">
                          <source src="movie.ogg" type="video/ogg">
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
                    {!! $review->body !!}
            </p>
        </div>
    </div>
</div>
