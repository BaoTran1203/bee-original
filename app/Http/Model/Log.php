<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    protected $table = 'logs';

    public static function store($action, $module, $module_id)
    {
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->user_name = Auth::user()->name;
        $log->user_email = Auth::user()->email;
        $log->action = $action;
        $log->module = $module;
        $log->module_id = $module_id;
        $log->save();
    }
}
