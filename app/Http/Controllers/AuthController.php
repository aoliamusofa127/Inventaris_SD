<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function AuthLogin(Request $request)
    {
        Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();

            return redirect('/dashboard')->with('message', 'login berhasil');
        } else {
            return back()->withErrors(['errors' => 'Username atau password tidak valid'])->withInput();
        }
    }
    public function Logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('message', 'berhasil keluar');
    }
}
