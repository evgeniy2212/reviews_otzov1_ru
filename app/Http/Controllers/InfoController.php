<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetInTouchRequest;
use App\Http\Requests\ShareRequest;
use App\Mail\ShareMail;
use App\Models\BadWord;
use App\Notifications\GetInTouch;
use App\Models\User;
use App\Services\ServiceInfoService;
use Illuminate\Support\Facades\Mail;

class InfoController extends Controller
{
    public function termOfService(){
        return view('term_of_service');
    }

    public function privacyPolicy(){
        $content = ServiceInfoService::getInfoValueByName('privacy_policy');

        return view('privacy_policy', compact('content'));
    }

    public function getInTouch(){
        return view('get_in_touch');
    }

    public function termOfConditions(){
        return view('term_of_conditions');
    }

    public function saveShortcutInstruction(){
        return view('saveShortcutInstruction');
    }

    public function sendTouchInfo(GetInTouchRequest $request){
        User::whereIsAdmin(true)->first()->notify(new GetInTouch(
            $request->name,
            $request->phone,
            $request->email,
            $request->message
        ));

        return redirect()->route('home');
    }

    public function shareSend(ShareRequest $request){
        $message = $request->enable_message
            ? $request->share_message
            : __('service/index.share.default_message');
        Mail::to($request->email)
            ->send(new ShareMail(
                $request->email,
                $request->name,
                $message
            ));

        return redirect()->route('home');
    }

    public function share(){
        return view('includes.shareForm');
    }

    public function getBadWords(){
        return BadWord::all()
            ->where('locale', app('laravellocalization')->getCurrentLocale())
            ->pluck('word');
    }
}
