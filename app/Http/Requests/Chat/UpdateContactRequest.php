<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'   => [
                'string',
            ],
            'last_name'   => [
                'string',
            ],
            'contact_id' => [
                'required',
                Rule::exists('users', 'id')
            ],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'last_name' => 'Last Name should be a string',
            'name' => 'Last Name should be a string',
            'contact_id' => 'You want to update wrong contact'
        ];
    }
}
