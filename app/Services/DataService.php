<?php

namespace App\Services;

use App\Models\Review;
use App\Models\User;
use App\Models\UserCongratulation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;

class DataService {
    public static function getDataYearsFilter() {
        $years = collect([]);
        $filterYears = collect([]);
        $currentYear = Carbon::now();
        $years->push(Carbon::createFromFormat('m-d-Y', optional(Review::oldest()->first())->created_at)->format('Y-m-d'));
        $years->push(Carbon::createFromFormat('m-d-Y', optional(UserCongratulation::oldest()->first())->created_at)->format('Y-m-d'));
        $years->push(Carbon::parse(optional(User::oldest()->first())->created_at)->format('Y-m-d'));
        $diffYears = $currentYear->diffInYears($years->min()) + 1;
        $minYear = Carbon::parse($years->min())->format('Y');
        for($i=0; $i<=$diffYears;$i++){
            $minYearData = $minYear++;
            $filterYears->push($minYearData);
        }

        return $filterYears;
    }

    public static function getFilterLang(string $attribute, array $items = [])
    {
        return Lang::has("service/index.filter." . mb_strtolower($attribute))
            ? __("service/index.filter." . mb_strtolower($attribute), $items)
            : $attribute;
    }

    public static function getLangByKey(string $attribute, array $items = [])
    {
        return Lang::has("service/index." . mb_strtolower($attribute))
            ? __("service/index." . mb_strtolower($attribute), $items)
            : $attribute;
    }
}
