<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\PersonalInfoRequest;
use App\Models\Country;
use App\Http\Repositories\ProfileRepository;
use App\Http\Controllers\Controller;

class PersonalInfoController extends Controller
{
    /**
     * @var ProfileRepository
     */
    private $profileRepository;

    public function __construct()
    {
        $this->profileRepository = app(ProfileRepository::class);
    }

    public function index(){
        $user_info = $this->profileRepository->getProfileInfo();
        $countries = (new Country())->getCountriesContainRegions();

        return view('profile.personal_info', compact('user_info', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PersonalInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePersonalInfo(PersonalInfoRequest $request)
    {
        $profile = $this->profileRepository->getProfileInfo();
        $personal_info = $request->all();

        $result = $profile->update($personal_info);

        if($result){
            return redirect()->route('profile-info')->withSuccess(['Your profile info was changed.']);
        } else {
            return back()->withErrors(['msg' => 'Updating ERROR!'])->withInput();
        }
    }
}
