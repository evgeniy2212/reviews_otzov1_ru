<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveReviewRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-0-9]+$/u',
            'last_name' => 'sometimes|required|alpha',
            'country' => 'sometimes|required',
            'region_id' => 'sometimes|required',
            'review_category_id' => 'sometimes|required',
            'category_by_review_id' => 'sometimes|required',
            'country_id' => 'sometimes|required',
            'city' => 'sometimes|required',
            'video' => 'mimetypes:video/mp4'
        ];
    }
}
