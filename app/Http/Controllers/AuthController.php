<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }

    public function loginIndex(Request $request)
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'gender' => 'required',
            'address' => 'required|min:10',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6',
            'confirm' => 'required|same:password',
            'check' => 'required'
        ];

        $request->validate($rules);

        $user = new User();
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 1;
        $user->save();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $request->validate($rules);

        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            if ($remember == true) {
                $time = 60 * 5;
                Cookie::queue('email', $email, $time);
            }
            return redirect('/');
        }

        return view('auth.login')->with('invalid', true);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
