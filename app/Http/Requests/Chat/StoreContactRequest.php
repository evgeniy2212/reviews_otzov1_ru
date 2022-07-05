<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreContactRequest extends FormRequest
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
            'email'   => [
                'string',
                Rule::exists('users', 'email')
                    ->whereNotNull('email_verified_at')
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
            'email' => 'Enter correct email please!',
            'last_name' => 'Last Name should be a string',
            'name' => 'Last Name should be a string',
        ];
    }
}
