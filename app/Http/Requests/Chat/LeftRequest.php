<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class LeftRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'chat_id' => [
                'required',
                Rule::exists('chats', 'id')
            ],
            'message_id' => [
                Rule::exists('chat_messages', 'id')
            ],
        ];
    }
}
