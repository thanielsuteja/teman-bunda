<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showPageHome() {
        return view('home-user');
    }

    public function showPageCariCaretaker() {
        return view('cari-caretaker');
    }
}
