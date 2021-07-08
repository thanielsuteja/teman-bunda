<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view(){
        return view('login');
    }

    public function store(Request $request){
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|alphaNum'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return $credentials;
    }

    public function admstore(Request $request){
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|alphaNum'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        return $credentials;
    }
}
