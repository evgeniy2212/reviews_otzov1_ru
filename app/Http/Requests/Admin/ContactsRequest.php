<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            'address' => 'required|string',
            'suite' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'fax' => 'required|string'
        ];
    }
}
