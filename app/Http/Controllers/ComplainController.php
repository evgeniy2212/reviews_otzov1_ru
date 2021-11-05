<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddComplainRequest;
use App\Models\Review;

class ComplainController extends Controller
{
    public function addComplain(AddComplainRequest $request){
        $reviewer = Review::findOrFail($request->review_id)->user;
        $reviewer->is_blocked_cnt = ++$reviewer->is_blocked_cnt;
        $reviewer->save();
        auth()->user()->complains()->attach($request->review_id, ['msg' => $request->msg]);

        return redirect()->back()->withSuccess([__('service/index.complain.success')]);
    }
}
