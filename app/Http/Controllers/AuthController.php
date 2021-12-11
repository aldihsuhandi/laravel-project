<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'gender' => 'required',
            'address' => 'required|min:10',
            'email' => 'required|unique:users,email',
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
            return redirect('/');
        }

        return view('auth.login')->with('email', $email)->with('invalid', true);
    }
}
