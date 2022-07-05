<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class CreateMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'message'   => [
                'sometimes',
                'string',
            ],
            'is_media' => [
                'boolean',
                'required'
            ],
            'chat_id' => [
                'required',
                Rule::exists('chats', 'id')
            ]
        ];
    }
}
