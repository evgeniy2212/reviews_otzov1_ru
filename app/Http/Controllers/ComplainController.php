<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddComplainRequest;
use App\Models\Complain;

class ComplainController extends Controller
{
    public function addComplain(AddComplainRequest $request){
        $reviewer = $request->model_type::findOrFail($request->model_id)->user;
        $reviewer->is_blocked_cnt = ++$reviewer->is_blocked_cnt;
        $reviewer->save();
        Complain::create(
            [
                'model_type' => $request->model_type,
                'model_id' => $request->model_id,
                'msg' => $request->msg,
                'user_id' => auth()->id()
            ]);

        return redirect()->back()->withSuccess([__('service/index.complain.success')]);
    }
}
