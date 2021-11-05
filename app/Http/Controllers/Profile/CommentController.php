<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $commentFilter = array_intersect_key(request()->all(), Comment::PROFILE_FILTERS);
        $comments = CommentService::getUserFilteredComments($user_id, $commentFilter);
        $paginateParams = $commentFilter;

        return view('profile.comments', compact('comments', 'paginateParams'));
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
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());

        return redirect()->back()->withSuccess([__('service/profile.item_update_successfully', ['name' => 'Comment'])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return back(301)->withSuccess([__('service/profile.item_delete_successfully', ['name' => 'Comment'])]);
    }

    public function search(Request $request) {
        $user_id = auth()->user()->id;
        $commentFilter = array_intersect_key(request()->all(), Comment::PROFILE_FILTERS);
        $comments = CommentService::getUserFilteredComments($user_id, $commentFilter, '', $request->search);
        $paginateParams = array_merge($commentFilter, ['search' => $request->search]);

        return view('profile.comments', compact('comments', 'paginateParams'));
    }
}
