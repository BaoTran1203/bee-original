<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    const PAGE = 100;
    const VIEW_PATH = 'admin.pages.logs.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $logs = Log::orderBy('created_at', 'desc')->paginate(self::PAGE);
        return view(self::VIEW_PATH . 'index', compact('logs'));
    }
}
