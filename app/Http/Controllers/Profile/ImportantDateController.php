<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\ImportantDateRemind;
use App\Models\ReviewFilter;
use App\Http\Repositories\ReviewFilterRepository;
use App\Models\UserImportantDate;
use App\Services\UserImportantDateService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImportantDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $filter_alias = ReviewFilter::DATE_FILTER;
        $sort_alias = ReviewFilter::SORT_BY_FILTER;

        $filter = request()->$filter_alias;
        $sort = request()->$sort_alias;
        $user_id = auth()->id();

        $importantDates = UserImportantDateService::getUserFilteredImportantDay($user_id, $filter, $sort);
        $filters = (new ReviewFilterRepository())->getAllCategoryFilters();
        $paginateParams = [
            $filter_alias => request()->$filter_alias,
            $sort_alias => request()->$sort_alias,
        ];
        $importantDateTypes = UserImportantDateService::getImportantDateTypes();

        return view('profile.important_date.index',
            compact('importantDates', 'importantDateTypes','filters', 'paginateParams'));
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
        $request->merge(['user_id' => auth()->id()]);
        $importantDateDate = Carbon::parse($request->important_date_date);
        $request->offsetSet(
            'important_date_date',
            $importantDateDate->format('Y-m-d H:i:s')
        );
        $importantDate = UserImportantDate::create($request->all());

        foreach($request->important_date_reminds as $dateRemind){
            ImportantDateRemind::create([
                'important_date_remind' => $importantDateDate->subDays($dateRemind)->format('Y-m-d H:i:s'),
                'important_date_id' => $importantDate->id
            ]);
        }

        return redirect(route('profile-important-date.index'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteDates(Request $request)
    {
        UserImportantDate::whereIn('id', $request->dates)->delete();
    }
}
