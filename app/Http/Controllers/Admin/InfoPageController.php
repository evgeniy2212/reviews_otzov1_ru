<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceInfo;
use App\Services\ServiceInfoService;
use Illuminate\Http\Request;

class InfoPageController extends Controller
{
    public function index($slug){
        $content = ServiceInfoService::getInfoValueByName($slug);

        return view('admin.info_page', compact('content', 'slug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->input() as $key => $contact){
            if(ServiceInfo::firstWhere('name', $key)){
                ServiceInfo::firstWhere('name', $key)
                    ->update(
                        [
                            app('laravellocalization')->getCurrentLocale() => [
                                'value' => $contact,
                            ]
                        ]
                    );
            }
        }

        return redirect()->back();
    }
}
