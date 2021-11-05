<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\UserCongratulation;
use App\Models\User;
use App\Services\UserCongratulationService;
use Illuminate\Http\Request;

class UserCongratulationController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $congratulationFilter = array_intersect_key(request()->all(), Review::ADMIN_FILTERS);
        $congratulations = UserCongratulationService::getUserFilteredCongratulations($user->id, false, $congratulationFilter);
        $paginateParams = $congratulationFilter;

        return view('admin.user_congratulations', compact('congratulations', 'paginateParams', 'user'));
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
        $congratulation = UserCongratulation::findOrFail($id);
        $congratulation->update($request->all());

        return redirect()->back()->withSuccess([__('service/admin.review_updated_successfully')]);
    }
}
