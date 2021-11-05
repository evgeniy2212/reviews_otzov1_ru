<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateBannerRequest;
use App\Models\Banner;
use App\Models\BannerCategory;
use App\Services\BannerService;
use App\Services\ImageService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerFilter = array_intersect_key(request()->all(), BannerCategory::FILTERS);
        $banners = BannerService::getAdminFilteredBanners($bannerFilter);
        $paginateParams = $bannerFilter;
        $bannerCategories = BannerCategory::all()->mapWithKeys(function($item, $key) {
            return [$item->id => $item->title];
        });

        return view('admin.banners', compact('banners', 'paginateParams', 'bannerCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  UpdateBannerRequest  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $request->merge(
            [
                'is_published' => $request->is_published ? 1 : 0
            ]
        );
        if($request->is_published && BannerService::isPublishedMaxBanners()){
            return redirect()->back()->withErrors(['msg' => __('service/admin.max_banners_published', ['count' => Banner::MAX_BANNERS_COUNT])]);
        }

        if($request->body){
            $request->merge(['src' => '']);
        }

        if($request->has('img')){
            $request->merge(['body' => '']);
            $imageInfo = ImageService::updateBanner($request, $banner);
            $request->merge($imageInfo);
        }
        $data = $request->all();
        $data['title'] = $request->title ?? '';
        $banner->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
