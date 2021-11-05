<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'country' => 'sometimes|required',
            'region' => 'sometimes|required',
            'last_name' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'email' => 'required|email',
        ];
    }
}
