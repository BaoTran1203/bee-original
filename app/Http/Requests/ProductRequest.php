<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'id' => ['required', 'min:3', 'max:10'],
            'title' => ['required', 'max:255'],
            'price' => ['required', 'numeric', 'min:10000'],
        ];
        if ($this->method() === 'POST')
            $rules['image'] = ['required'];
        return $rules;
    }

    public function messages()
    {
        return [
            'id.required' => 'Id must not be empty',
            'id.min' => 'Id must be at least 3 characters',
            'id.max' => 'Id must not be more than 10 characters',
            'title.required' => 'Product name must not be empty',
            'title.max' => 'Product name must not be more than 255 characters',
            'price.required' => 'Price must not be empty',
            'price.numeric' => 'The price must be numeric',
            'price.min' => 'The price value must be more than 10.000 VND',
            'image.required' => 'Image must be selected',
        ];
    }
}
