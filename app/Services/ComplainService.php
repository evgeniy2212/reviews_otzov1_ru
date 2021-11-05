<?php

namespace App\Services;

use App\Models\Complain;
use App\Models\Review;

class ComplainService {
    public static function getNewComplains(){
        return Complain::whereIsNew(true)
            ->get();
    }

    public static function getProcessedComplains(){
        return Complain::whereIsNew(false)
            ->get();
    }

    public static function getAllComplains(){
        return Complain::all();
    }

    public static function getFilteredComplains($isNew = null, $perPage = 10){
        return Review::whereHas('complains', function ($query) use($isNew) {
                $query->when((!is_null($isNew) && $isNew !== 'NULL'), function($q) use ($isNew){
                    $q->whereIsNew($isNew);
                });
            })
            ->with(['complains' => function ($q) {
                $q->orderBy('complains.created_at', 'asc');
            }])
            ->paginate($perPage);
    }

    public static function getReviewComplainsCnt($isNew = null){
        return Review::whereHas('complains', function ($query) use($isNew) {
                $query->when((!is_null($isNew) && $isNew !== 'NULL'), function($q) use ($isNew){
                    $q->whereIsNew($isNew);
                });
            })
            ->count();
    }
}
