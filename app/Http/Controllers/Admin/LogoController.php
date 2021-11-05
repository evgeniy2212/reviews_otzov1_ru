<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Review;
use App\Services\ImageService;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function createLogo(Review $review) {
        return view('admin.create_logo', compact('review'));
    }

    public function save(Request $request, Review $review){
        $reviewIds = ReviewService::getSameLogoReviews($review->category->slug, $review->full_name)->pluck('id');
        $imageInfo = ImageService::uploadLogo($request);
        $request->merge($imageInfo);
        $logo = Logo::create($request->all());
        $logo->reviews()->attach($reviewIds);

        return redirect()->route('admin.reviews.index')->withSuccess([__('service/admin.logo_saved_successfully')]);
    }

    public function edit(Logo $logo)
    {
        $review = $logo->reviews->first();
        return view('admin.edit_logo', compact('logo', 'review'));
    }

    public function update(Request $request, Logo $logo)
    {
        $imageInfo = ImageService::updateLogo($request, $logo);
        $request->merge($imageInfo);
        $logo->update($request->all());

        return redirect()->route('admin.reviews.index')->withSuccess([__('service/admin.logo_updated_successfully')]);
    }

    public function destroy(Logo $id)
    {
        ImageService::deleteLogo($id);
        $result = $id->forceDelete();

        if($result){
            return redirect()->route('admin.reviews.index')
                ->withSuccess([__('service/admin.logo_delete_successfully')]);
        } else {
            return back()->withErrors(['msg' => __('service/admin.logo_delete_error')])
                ->withInput();
        }
    }
}
