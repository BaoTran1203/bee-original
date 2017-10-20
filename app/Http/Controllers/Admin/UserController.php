<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const PAGE = 10;
    const VIEW_PATH = 'admin.pages.users.';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->level != 1)
            return view('admin.pages.permission');

        $users = User::paginate(self::PAGE);
        return view(self::VIEW_PATH . 'index', compact('users'));
    }
}