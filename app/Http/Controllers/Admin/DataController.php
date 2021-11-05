<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCongratulation;
use App\Services\DataService;
use App\Services\ReviewService;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $year = request()->year ?? DataService::getDataYearsFilter()->min();
        for($i=1;$i<=12;$i++){
            if($i == 1){
                $beforeMonthCnt = User::whereYear('created_at', '<=', $year - 1)
                    ->whereMonth('created_at', '<=', 12)
                    ->whereNotNull('email_verified_at')
                    ->count();
                $lastMonthCnt = User::whereYear('created_at', '<=', $year)
                    ->whereMonth('created_at', '<=', $i)
                    ->whereNotNull('email_verified_at')
                    ->count();
                $count = User::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $i)
                    ->whereNotNull('email_verified_at')
                    ->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['users'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];

                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year-1, $i - 1, 'person')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'person')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'person')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['persons'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year-1, $i - 1, 'company')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'company')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'company')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['companies'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year-1, $i - 1, 'goods')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'goods')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'goods')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['goods'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year-1, $i - 1, 'vocations')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'vocations')->count();;
                $count = ReviewService::getReviewByYearMonth($year, $i, 'vocations')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['vacations'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];

                $beforeMonthCnt = UserCongratulation::whereYear('created_at', '<=', $year-1)->whereMonth('created_at', '<=', $i - 1)->count();
                $lastMonthCnt = UserCongratulation::whereYear('created_at', '<=', $year)->whereMonth('created_at', '<=', $i)->count();
                $count = UserCongratulation::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $i)->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['congratulations'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];
            } else {
                $beforeMonthCnt = User::whereYear('created_at', '<=', $year)
                    ->whereMonth('created_at', '<=', $i - 1)
                    ->whereNotNull('email_verified_at')
                    ->count();
                $lastMonthCnt = User::whereYear('created_at', '<=', $year)
                    ->whereMonth('created_at', '<=', $i)
                    ->whereNotNull('email_verified_at')
                    ->count();
                $count = User::whereYear('created_at', '=', $year)
                    ->whereMonth('created_at', '=', $i)
                    ->whereNotNull('email_verified_at')
                    ->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['users'][$i] = [
                        'count' => $count,
                        'percent' => $percent > 100 ? $percent-100 : $percent,
                    ];

                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i - 1, 'person')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'person')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'person')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['persons'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i - 1, 'company')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'company')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'company')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['companies'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i - 1, 'goods')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'goods')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'goods')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['goods'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];
                $beforeMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i - 1, 'vocations')->count();
                $lastMonthCnt = ReviewService::getReviewRangeByYearMonth($year, $i, 'vocations')->count();
                $count = ReviewService::getReviewByYearMonth($year, $i, 'vocations')->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['vacations'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];

                $beforeMonthCnt = UserCongratulation::whereYear('created_at', '<=', $year)->whereMonth('created_at', '<=', $i - 1)->count();
                $lastMonthCnt = UserCongratulation::whereYear('created_at', '<=', $year)->whereMonth('created_at', '<=', $i)->count();
                $count = UserCongratulation::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $i)->count();
                $percent = round(($lastMonthCnt * 100 / ($beforeMonthCnt ? $beforeMonthCnt : 1)), 1);
                $data['congratulations'][$i] = [
                    'count' => $count,
                    'percent' => $percent > 100 ? $percent-100 : $percent,
                ];
            }
        }

        $beforeYearCnt = User::whereYear('created_at', '<=', $year - 1)
            ->whereNotNull('email_verified_at')
            ->count();
        $lastYearCnt = User::whereYear('created_at', '<=', $year)
            ->whereNotNull('email_verified_at')
            ->count();
        $count = User::whereYear('created_at', '=', $year)
            ->whereNotNull('email_verified_at')
            ->count();
        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)), 1);
        $data['users']['total'] = [
            'total_count' => $count,
            'total_percent' => $percent > 100 ? $percent-100 : $percent,
        ];

        $beforeYearCnt = ReviewService::getReviewRangeByYear($year-1, 'person')->count();
        $lastYearCnt = ReviewService::getReviewRangeByYear($year, 'person')->count();
        $count = ReviewService::getReviewByYear($year, 'person')->count();

        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)), 1);
        $data['persons']['total'] = [
            'total_count' => $count,
            'total_percent' => $percent > 100 ? $percent-100 : $percent,
        ];

        $beforeYearCnt = ReviewService::getReviewRangeByYear($year-1, 'company')->count();
        $lastYearCnt = ReviewService::getReviewRangeByYear($year, 'company')->count();
        $count = ReviewService::getReviewByYear($year, 'company')->count();
        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)), 1);
        $data['companies']['total'] = [
            'total_count' => $count,
            'total_percent' => $percent > 100 ? $percent-100 : $percent,
        ];

        $beforeYearCnt = ReviewService::getReviewRangeByYear($year-1, 'goods')->count();
        $lastYearCnt = ReviewService::getReviewRangeByYear($year, 'goods')->count();
        $count = ReviewService::getReviewByYear($year, 'goods')->count();
        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)), 1);
        $data['goods']['total'] = [
            'total_count' => $count,
            'total_percent' => $percent > 100 ? $percent-100 : $percent,
        ];

        $beforeYearCnt = ReviewService::getReviewRangeByYear($year-1, 'vocations')->count();
        $lastYearCnt = ReviewService::getReviewRangeByYear($year, 'vocations')->count();
        $count = ReviewService::getReviewByYear($year, 'vocations')->count();
        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)), 1);
        $data['vacations']['total'] = [
            'total_count' => $count,
            'total_percent' => $percent > 100 ? $percent-100 : $percent,
        ];

        $beforeYearCnt = UserCongratulation::whereYear('created_at', '<=', $year-1)->count();
        $lastYearCnt = UserCongratulation::whereYear('created_at', '<=', $year)->count();
        $count = UserCongratulation::whereYear('created_at', '=', $year)->count();
        $percent = round(($lastYearCnt * 100 / ($beforeYearCnt ? $beforeYearCnt : 1)), 1);

        $data['congratulations']['total'] = [
            'total_count' => $count,
            'total_percent' => $percent > 100 ? $percent-100 : $percent,
        ];

        $currentFilter = [
            'year' => $year
        ];
        return view('admin.data', compact('currentFilter', 'data'));
    }
}
