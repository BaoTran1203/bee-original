<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class DuplicatedIdRule implements Rule
{
    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function passes($attribute, $value)
    {
        return DB::table($this->table)->where('id', $value)->exists();
    }

    public function message()
    {
        return 'ID has been duplicated. Choose another ID.';
    }
}
