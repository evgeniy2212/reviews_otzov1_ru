<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddComplainRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'msg' => 'required',
            'review_id' => 'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'msg' => trans('service/index.complain.msg')
        ];
    }
}
