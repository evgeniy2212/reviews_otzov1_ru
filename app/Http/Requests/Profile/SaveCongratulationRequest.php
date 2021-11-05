<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCongratulationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'video' => [
                'mimetypes:video/mp4'
            ],
            'name' => [
                'required',
            ],
            'second_name' => [
                'required',
            ]
        ];

        if(request()->is_private){
            $rules = array_merge($rules, [
                'name' => [
                    'required',
                    Rule::exists('users', 'name'),
                ],
                'second_name' => [
                    'required',
                    Rule::exists('users', 'last_name'),
                ]
            ]);
        }

        return $rules;
    }
}
