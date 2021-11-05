<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateComplainRequest;
use App\Models\Complain;
use App\Models\Review;
use App\Services\ComplainService;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginateParams = array_intersect_key(request()->all(), Complain::ADMIN_FILTERS);
        $reviews = ComplainService::getFilteredComplains($request->is_new);
        $allReviewsCnt = ComplainService::getReviewComplainsCnt();
        $processedReviewsCnt = ComplainService::getReviewComplainsCnt(false);
        $newReviewsCnt = ComplainService::getReviewComplainsCnt(true);

        return view('admin.complains', compact('reviews', 'paginateParams', 'allReviewsCnt', 'processedReviewsCnt', 'newReviewsCnt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $review->update($request->all());
//
//        return redirect()->back()->withSuccess([__('service/admin.review_updated_successfully')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateComplainReview(UpdateComplainRequest $request, Review $review)
    {
        Complain::whereReviewId($review->id)->update(['is_new' => 0]);
        $request->merge(['is_published' => $request->is_blocked ? 0 : 1]);
        $review->update($request->all());

        return redirect()->back()->withSuccess([__('service/admin.review_updated_successfully')]);
    }
}
