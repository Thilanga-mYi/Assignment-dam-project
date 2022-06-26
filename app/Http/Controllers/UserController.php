<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();
        Session::forget('routes');
        Session::flush();
        return redirect('/login');
    }
}
