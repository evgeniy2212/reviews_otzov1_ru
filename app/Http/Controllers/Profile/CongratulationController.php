<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\SaveCongratulationRequest;
use App\Models\DefaultImage;
use App\Models\ReviewFilter;
use App\Models\User;
use App\Models\UserCongratulation;
use App\Http\Repositories\ReviewFilterRepository;
use App\Services\UserCongratulationService;
use Illuminate\Http\Request;

class CongratulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter_alias = ReviewFilter::DATE_FILTER;
        $sort_alias = ReviewFilter::SORT_BY_FILTER;

        $filter = request()->$filter_alias;
        $sort = request()->$sort_alias;
        $user_id = auth()->user()->id;
        $congratulations = UserCongratulationService::getUserFilteredCongratulations($user_id, false, $filter, $sort);
        $filters = (new ReviewFilterRepository())->getAllCategoryFilters();
        $paginateParams = [
            $filter_alias => request()->$filter_alias,
            $sort_alias => request()->$sort_alias,
        ];

        return view('profile.congratulation.index', compact('congratulations', 'filters', 'paginateParams'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPrivate()
    {
        $filter_alias = ReviewFilter::DATE_FILTER;
        $sort_alias = ReviewFilter::SORT_BY_FILTER;

        $filter = request()->$filter_alias;
        $sort = request()->$sort_alias;
        $user_id = auth()->user()->id;
        $congratulations = UserCongratulationService::getUserFilteredCongratulations(null, true, $filter, $sort);
        $filters = (new ReviewFilterRepository())->getAllCategoryFilters();
        $paginateParams = [
            $filter_alias => request()->$filter_alias,
            $sort_alias => request()->$sort_alias,
        ];

        return view('profile.congratulation.indexPrivate', compact('congratulations', 'filters', 'paginateParams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $countries = UserCongratulationService::getCountries();
        $categories = UserCongratulationService::getCategories();
        $defaultImages = DefaultImage::all();

        return view('profile.congratulation.create', compact(
            'countries',
            'categories',
            'defaultImages'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SaveCongratulationRequest  $request
     */
    public function store(SaveCongratulationRequest $request)
    {
        UserCongratulationService::createCongratulation($request);

        return  redirect()->back()->withSuccess([__('service/profile.congratulation.request_success')]);
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

    public function edit($congratulation)
    {
        $congratulation = UserCongratulation::with(['category', 'region', 'image', 'video'])
            ->findOrFail($congratulation);
        $countries = UserCongratulationService::getCountries();
        $categories = UserCongratulationService::getCategories();
        $defaultImages = DefaultImage::all();

        return view('profile.congratulation.edit', compact(
            'countries',
            'congratulation',
            'categories',
            'defaultImages'
        ));
    }

    public function update(SaveCongratulationRequest $request, UserCongratulation $congratulation)
    {
        UserCongratulationService::updateCongratulation($request, $congratulation);

        return redirect()->route('profile-congratulations.edit', $congratulation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserCongratulation  $congratulation
     */
    public function destroy(UserCongratulation $congratulation)
    {
        $congratulation->image()->delete();
        $congratulation->delete();

        return  redirect()->back()->withSuccess([__('service/profile.congratulation.delete_success')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param bool $is_owner
     * @param  UserCongratulation  $congratulation
     */
    public function destroyPrivate(bool $is_owner, UserCongratulation $congratulation)
    {
        $is_owner
            ? $congratulation->deleted_by_from = auth()->id()
            : $congratulation->deleted_by_to = auth()->id();
        $congratulation->save();

        return  redirect()->back()->withSuccess([__('service/profile.congratulation.delete_success')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param  UserCongratulation  $congratulation
     */
    public function readPrivate(UserCongratulation $congratulation)
    {
        $congratulation->update(['is_read' => true]);
    }

    /**
     * @param Request $request
     */
    public function checkUser(Request $request)
    {
        if($request->name && $request->last_name){
            $user = User::activeUsers()->where('name', $request->name)
                ->where('last_name', $request->last_name)
                ->first();
            return response()->json(['is_exist' => !is_null($user)]);
        }

        return response()->json(['is_exist' => false]);
    }
}
