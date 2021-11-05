<?php

namespace App\Services;

use App\Models\Review;

class ReviewModerationService {
    public static function getNewModerationReviews(){
        return Review::whereHas('moderationReviews', function ($query) {
            $query->where('is_new', true);
        })->get();
    }

    public static function getProcessedModerationReviews(){
        return Review::whereHas('moderationReviews', function ($query) {
            $query->where('is_new', false);
        })->get();
    }

    public static function getAllModerationReviews(){
        return Review::has('moderationReviews');
    }

    public static function getFilteredModerationReviews($isNew = null, $perPage = 10){
        return Review::whereHas('moderationReviews', function ($query) use($isNew) {
                $query->when((!is_null($isNew) && $isNew !== 'NULL'), function($q) use ($isNew){
                    $q->whereIsNew($isNew);
                });
            })
            ->orderBy('created_at', 'asc')
//            ->with(['moderationReviews' => function ($q) {
//                $q->orderBy('moderationReviews.created_at', 'asc');
//            }])
            ->paginate($perPage);
    }

    public static function getModerationReviewsCnt($isNew = null){
        return Review::whereHas('moderationReviews', function ($query) use($isNew) {
                $query->when((!is_null($isNew) && $isNew !== 'NULL'), function($q) use ($isNew){
                    $q->whereIsNew($isNew);
                });
            })
            ->count();
    }
}
