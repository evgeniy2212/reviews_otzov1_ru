<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerCategory;
use App\Http\Requests\Profile\StoreBanner;
use App\Services\ImageService;

class BannerController extends Controller
{
    public function index() {
        $bannerCategories = BannerCategory::all()->pluck('title', 'id');

        return view('profile.banners', compact('bannerCategories'));
    }

    public function save(StoreBanner $request){
        $request->merge(['user_id' => auth()->user()->id]);
        if($request->has('img')){
            $imageInfo = ImageService::uploadBanner($request);
//            $imageInfo = array_merge($imageInfo, ['review_id' => $review->id]);
//            ReviewImage::create($imageInfo);
            $request->merge($imageInfo);
        }
        Banner::create($request->all());

        return redirect()->route('banners')->withSuccess([__('service/profile.banner_request_success')]);
    }
}
