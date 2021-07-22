<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHome(){
        return view('homepage');
    }

    public function showUserHome() {
        return view('user.home');
    }

    public function showCaretakerHome()
    {
        return view('caretaker.home');
    }
}
