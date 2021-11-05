<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\ReviewFilter;
use Carbon\Carbon;

class CommentService {
    public static function getUserFilteredComments($user_id, $filters = [], $sort = '', $search = '', $perPage = 10) {
        $commentFilters = self::getFilterMethod($filters);

        $result = Comment::whereUserId($user_id)
            ->where('body', 'like', "%{$search}%")
            ->when(!empty($commentFilters), function($q) use ($commentFilters){
                foreach ($commentFilters as $filter) {
                    $key = array_key_first($filter);
                    if(!empty($filter)){
                        switch ($key){
                            case 'from':
                                $q->where('created_at', '>=', Carbon::parse($filter['from'])->toDateString());
                                break;
                            case 'to':
                                $q->whereDate('created_at', '<=', Carbon::parse($filter['to'])->toDateString());
                                break;
                            default:
                                $q->where($key, $filter[$key]);
                        }
                    }
                }
            })
//            ->when(!empty($sort), function($q) use($sort_by){
//                $q->orderBy($sort_by);
//            })
            ->when(empty($sort), function($q){
                $q->orderBy('created_at', 'DESC');
            })
            ->paginate($perPage);

        return $result;
    }


    protected static function getSortMethod($sort = ''){
        if($sort){
            switch ($sort){
                case ReviewFilter::SORT_BY_RATING:
                    $sort = ReviewFilter::SORT_BY_RATING;
                    break;
                case ReviewFilter::SORT_BY_ALPHABET:
                    $sort = 'name';
                    break;
            }
        } else {
            $sort = '';
        }

        return $sort;
    }

    protected static function getFilterMethod($filters = []){
        $result = [];
        foreach($filters as $key => $filter){
            $result[] = Comment::PROFILE_FILTERS[$key][$filters[$key]] ?? [$key => $filter];
        }

        return $result;
    }

    public static function difToMinRangeDate(){
        return Carbon::now()->diffInDays(Comment::min('created_at'));
    }

    public static function difToMaxRangeDate(){
        return Carbon::now()->diffInDays(Comment::max('created_at'));
    }
}
