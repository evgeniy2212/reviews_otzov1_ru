<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveReviewRequest;
use App\Models\Country;
use App\Models\Review;
use App\Models\ReviewFilter;
use App\Models\ReviewImage;
use App\Http\Repositories\ReviewFilterRepository;
use App\Models\ReviewVideo;
use App\Services\ImageService;
use App\Services\ReviewService;
use App\Services\VideoService;

class ReviewController extends Controller
{
    protected $half = 9;

    /**
     * @var ReviewFilterRepository
     */
    protected $reviewFilterRepository;

    public function __construct()
    {
        $this->reviewFilterRepository = app(ReviewFilterRepository::class);
    }

    public function index() {
        $filter_alias = ReviewFilter::DATE_FILTER;
        $sort_alias = ReviewFilter::SORT_BY_FILTER;

        $filter = request()->$filter_alias;
        $sort = request()->$sort_alias;
        $user_id = auth()->id();

        $reviews = ReviewService::getUserFilteredReviews($user_id, $filter, $sort);
        $filters = $this->reviewFilterRepository->getAllCategoryFilters();
        $paginateParams = [
            $filter_alias => request()->$filter_alias,
            $sort_alias => request()->$sort_alias,
        ];

        return view('profile.reviews', compact('reviews', 'filters', 'paginateParams'));
    }

    public function edit($review)
    {
        $review = Review::with(['category', 'region', 'characteristics', 'image', 'category_group', 'category_by_review'])
            ->findOrFail($review);
        $categories = ReviewService::getReviewCategoriesBySlug($review->category->slug);
        $countries = (new Country())->getCountriesContainRegions();
        $positiveCharacteristics = $review->category
            ->getCharacteristicsByCategorySlug($review->category->slug, true)
            ->chunk($this->half);
        $negativeCharacteristics = $review->category
            ->getCharacteristicsByCategorySlug($review->category->slug, false)
            ->chunk($this->half);
        $checkedCharacteristics = $review->characteristics->pluck('id');
        $slug = $review->category->slug;
        $controlButtons = ($review->is_published && !$review->complains->count()) ? null : 'presaving';

        return view('reviews.edit', compact(
            'countries',
            'positiveCharacteristics',
            'negativeCharacteristics',
            'review',
            'categories',
            'checkedCharacteristics',
            'slug',
            'controlButtons'
        ));
    }

    public function update(SaveReviewRequest $request, Review $review)
    {
        $request->merge(
            [
                'is_published' => $request->get('is_published', true),
            ]
        );
        $review->update($request->all());
        $review->characteristics()->sync($request->characteristics);

        if($request->get('deletePhotoFlag')){
            ImageService::deleteImage($review);
        }
        if($request->has('img')){
            $imageInfo = ImageService::updateImage($request, $review);
            ReviewImage::updateOrCreate(['review_id' => $review->id], $imageInfo);
        }

        if($request->get('deleteVideoFlag')){
            VideoService::deleteVideo($review);
        }
        if($request->has('video')){
            $videoInfo = VideoService::updateVideo($request, $review);
            ReviewVideo::updateOrCreate(['review_id' => $review->id], $videoInfo);
        }
        $slug = $review->category->slug;

        return $request->redirectToMain
            ? redirect()->route('reviews',['review_item' => $slug])->with(['success_review_creating' => 'Review Created'])
            : redirect()->route('profile-reviews.index');
    }

    public function preupdating(SaveReviewRequest $request, Review $review)
    {
        $request->merge(['is_published' => false]);
        $review->update($request->all());
        $review->characteristics()->sync($request->characteristics);
        if($request->has('img')){
            $imageInfo = ImageService::updateImage($request, $review);
            ReviewImage::updateOrCreate(['review_id' => $review->id], $imageInfo);
        }
        if($request->has('video')){
            $videoInfo = VideoService::updateVideo($request, $review);
            ReviewVideo::updateOrCreate(['review_id' => $review->id], $videoInfo);
        }

        return redirect()->route('presavingShow-review', ['review' => $review->id]);
    }

    public function destroy($review)
    {
        Review::destroy($review);

        return back();
    }
}
