<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
            'review_category_id' => 'required|number',
            'category_slug' => 'required|string',
            'rating' => 'required|number|max:5',
            'name' => 'required',
            'last_name' => 'sometimes|required',
            'country' => 'sometimes|required',
            'region_id' => 'required',
            'city' => 'required',
            'email' => 'required|email',
        ];
    }
}
