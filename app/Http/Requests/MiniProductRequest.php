<?php

namespace App\Http\Requests;

use App\Rules\DuplicatedIdRule;
use Illuminate\Foundation\Http\FormRequest;

class MiniProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'id' => ['required', 'min:3', 'max:10'],
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
            'image.required' => 'Image must be selected',
        ];
    }
}
