<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }

    public function loginIndex()
    {
        return view('auth.login');
    }
}
