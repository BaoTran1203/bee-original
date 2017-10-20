<?php

namespace App\Http\Requests;

use App\Rules\OrderProductRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product' => ['required', new OrderProductRule],
            'name' => 'required',
            'email' => ['nullable', 'email'],
            'phone' => 'required',
            'address' => 'required',
            'date' => ['required', 'after:yesterday'],
        ];
    }

    public function messages()
    {
        return [
            'product.required' => ' Please fill the correct Product ID.',
            'name.required' => ' We need to know your name.',
            'email.email' => ' The email in invalid format. Please fill correct.',
            'phone.required' => ' We need to know your phone number.',
            'address.required' => ' We need to know your address.',
            'date.required' => ' We need to know the date.',
            'date.after' => ' The date must not be in the past.',
        ];
    }
}
