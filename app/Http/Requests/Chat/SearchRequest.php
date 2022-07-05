<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class SearchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'query' => [
                'string',
                'nullable'
            ]
        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        return array_merge($this->request->all(), [
            'query' => request('query'),
        ]);
    }
}
