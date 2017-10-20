<?php

namespace App\Rules;

use App\Http\Model\Product;
use Illuminate\Contracts\Validation\Rule;

class OrderProductRule implements Rule
{
    public function passes($attribute, $value)
    {
        return Product::where('id', $value)->exists();
    }

    public function message()
    {
        return 'Product ID is not existed. Please check again.';
    }
}
