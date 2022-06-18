<?php

namespace App\Services;

use App\Models\Complain;
use App\Models\Review;
use App\Models\UserCongratulation;

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
        $result = self::getComplainModels($isNew);
        return $result->paginate($perPage);
    }

    public static function getReviewComplainsCnt($isNew = null){
        $result = self::getComplainModels($isNew);
        return $result->count();
    }

    protected static function getComplainModels($isNew = null)
    {
        $reviews = Review::whereHas('complains', function ($query) use($isNew) {
            $query->when((!is_null($isNew) && $isNew !== 'NULL'), function($q) use ($isNew){
                $q->whereIsNew($isNew);
            });
        })->get();
        $congratulations = UserCongratulation::whereHas('complains', function ($query) use($isNew) {
            $query->when((!is_null($isNew) && $isNew !== 'NULL'), function($q) use ($isNew){
                $q->whereIsNew($isNew);
            });
        })->get();
        return $reviews->concat($congratulations);
    }
}
