<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateModerationReviewRequest;
use App\Models\Complain;
use App\Models\GroupByReview;
use App\Models\Review;
use App\Models\ReviewModeration;
use App\Services\ReviewModerationService;
use Illuminate\Http\Request;

class ReviewModerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginateParams = array_intersect_key(request()->all(), Complain::ADMIN_FILTERS);
        $reviews = ReviewModerationService::getFilteredModerationReviews($request->is_new);
        $allReviewsCnt = ReviewModerationService::getModerationReviewsCnt();
        $processedReviewsCnt = ReviewModerationService::getModerationReviewsCnt(false);
        $newReviewsCnt = ReviewModerationService::getModerationReviewsCnt(true);

        return view('admin.moderation_reviews', compact('reviews', 'paginateParams', 'allReviewsCnt', 'processedReviewsCnt', 'newReviewsCnt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateModerationReviewRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateModerationReview(UpdateModerationReviewRequest $request, Review $review)
    {
        if($request->update){
            ReviewModeration::whereReviewId($review->id)
                ->update([
                    'is_new' => 0
                ]);
            GroupByReview::findOrFail($review->review_group_id)
                ->update([
                    'is_published' => true
                ]);
        } else {
            ReviewModeration::whereReviewId($review->id)
                ->update([
                    'is_new' => 0
                ]);
            GroupByReview::findOrFail($review->review_group_id)
                ->update([
                    'is_published' => false
                ]);
        }
//        dd($request->update);
//        Complain::whereReviewId($review->id)->update(['is_new' => 0]);
//        $request->merge(['is_published' => $request->is_blocked ? 0 : 1]);
//        $review->update($request->all());

        return redirect()->back()->withSuccess([__('service/admin.review_updated_successfully')]);
    }
}
