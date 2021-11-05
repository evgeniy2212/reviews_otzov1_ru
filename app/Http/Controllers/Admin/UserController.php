<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userFilter = array_intersect_key(request()->all(), User::FILTERS);
        $users = UserService::getAdminFilteredUsers($userFilter);
        $paginateParams = $userFilter;

        return view('admin.users', compact('users', 'paginateParams'));
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
        //
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
    public function update(UpdateUserRequest $request, User $user)
    {
        if(!$request->is_blocked){
            $request->merge(['is_blocked_cnt' => 0]);
        }
        $user->update($request->all());

        return redirect()->back()->withSuccess([__('service/admin.user_updated_successfully', ['name' => $user->full_name])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request) {
        $userFilter = array_intersect_key(request()->all(), User::FILTERS);
        $users = UserService::getAdminFilteredUsers($userFilter, $request->search);
        $paginateParams = array_merge($userFilter, ['search' => $request->search]);

        return view('admin.users', compact('users', 'paginateParams'));
    }
}
