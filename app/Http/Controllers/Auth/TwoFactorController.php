<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\TwoFactorCode;
use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.twoFactor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'integer|required',
        ]);
        $user = auth()->user();
        if($request->input('two_factor_code') == $user->two_factor_code)
//        if($request->input('two_factor_code') == 1111)
        {
            $user->resetTwoFactorCode();
//            return redirect()->route('admin.home');
            return redirect()->route('admin.contacts.index');
        }
        return redirect()->back()
            ->withErrors(['two_factor_code' =>
                'The two factor code you have entered does not match']);
    }

    public function resend()
    {
        $user = auth()->user();
        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode());
        return redirect()->back()->withMessage('Two factor code was sent again.');
    }
}
