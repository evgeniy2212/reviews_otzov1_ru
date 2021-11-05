<?php

namespace App\Services;

use App\Models\ReviewFilter;
use App\Models\UserCongratulation;
use App\Models\UserImportantDate;
use App\Models\UserImportantDateType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserImportantDateService {
    public static function getCategories(){
        return UserImportantDateType::all();
    }

    public static function difToMinRangeDate(){
        return Carbon::now()->diffInDays(UserCongratulation::min('created_at'));
    }

    public static function difToMaxRangeDate(){
        return Carbon::now()->diffInDays(UserCongratulation::max('created_at'));
    }

    public static function getUserFilteredImportantDay($user_id, $filter = '', $sort = '', $search = '', $perPage = 10) {
        $sort_by = self::getSortMethod($sort);

        $result = UserImportantDate::whereUserId($user_id)
            ->where(DB::raw('CONCAT_WS(" ", name)'), 'like', "%{$search}%")
            ->when(!empty($filter), function($q) use ($filter){
                $q->whereYear('created_at', $filter);
            })
            ->when(!empty($sort), function($q) use($sort_by){
                $q->orderBy($sort_by);
            })
            ->when(empty($sort), function($q){
                $q->orderBy('important_date_date', 'DESC');
            })
            ->where(function($q){
                $q->whereIsPublished(true);
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

    static public function getImportantDateTypes()
    {
        return UserImportantDateType::whereIsPublished(true)
            ->get();
    }

}
