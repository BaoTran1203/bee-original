<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'address' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Address must not be empty',
            'email.required' => 'Email must not be empty',
            'facebook.required' => 'Facebook must not be empty',
            'instagram.required' => 'Instagram must not be empty',
            'phone.required' => 'Phone must not be empty',
        ];
    }
}
