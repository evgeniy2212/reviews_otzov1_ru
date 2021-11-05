<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\BannerCategory;
use App\Models\Review;
use Carbon\Carbon;

class BannerService {

    public static function getAdminFilteredBanners($filter = [], $allLocaleBanners = false, $perPage = 5) {
        $bannerFilter = self::getFilterMethod($filter);

        $result = Banner::when(!empty($bannerFilter), function($q) use ($bannerFilter){
                $key = key($bannerFilter);
                $q->where($key, $bannerFilter[$key]);
            })
            ->when(!$allLocaleBanners, function($q){
                $q->whereLocale(app('laravellocalization')->getCurrentLocale());
            })
            ->paginate($perPage);

        return $result;
    }

    protected static function getFilterMethod($filters = []){
        $key = array_key_first($filters);
        return $key
            ? BannerCategory::FILTERS[$key][$filters[$key]]
            : $key;
    }

    public static function getHeadBanners(){
        $bannerInfo = ['title', 'src', 'to', 'from', 'link', 'body'];
        return Banner::select($bannerInfo)
            ->where('is_published', true)
            ->where('from', '<=', Carbon::now()->setTime(0,0)->format('Y-m-d H:i:s'))
            ->where('to', '>=', Carbon::now()->setTime(0,0, 0)->format('Y-m-d H:i:s'))
            ->whereLocale(app('laravellocalization')->getCurrentLocale())
//            ->orWhereHas('user', function ($query) {
//                $query->where('is_admin', true);
//            })
            ->get();
    }

    public static function isPublishedMaxBanners(){
        return self::getHeadBanners()->count() >= Banner::MAX_BANNERS_COUNT;
    }
}
