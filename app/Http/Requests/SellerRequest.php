<?php

namespace App\Http\Requests;

use App\Rules\DuplicatedIdRule;
use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
        ];
        if ($this->method() === 'POST')
            $rules['image'] = ['required'];
        return $rules;
    }

    public function messages()
    {
        return [
            'id.required' => 'ID must not be empty',
            'id.min' => 'ID must be at least 3 characters',
            'id.max' => 'ID must not be more than 10 characters',
            'title.required' => 'Title must not be empty',
            'title.max' => 'Title must not be more than 255 characters',
            'image.required' => 'Image must be selected',
        ];
    }
}
