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
                      <video class="videoPreview" style="object-fit: cover" controls>
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
            <div class="w-100">
                <div class="col-md-5 offset-md-7 col-lg-4 offset-lg-8">
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
                           href="{{ Request::url() === route('show-congratulation', [$review->id]) ? url()->previous() : route('show-congratulation', [$review->id]) }}"
                           class="otherButton"
                           style="white-space: nowrap; margin-top: 10px; text-decoration: none; color: #1b1e21;"
                           id="showButton-{{ $review->id }}">
                            {{ Request::url() === route('show-congratulation', [$review->id]) ? __('service/index.close') : __('service/index.open') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
