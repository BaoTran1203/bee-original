<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $incrementing = false;
}
