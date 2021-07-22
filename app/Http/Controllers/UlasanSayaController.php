<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanSayaController extends Controller
{
    public function showPageUlasanSaya()
    {
        $reviews = Auth::user()->Caretaker->JobOffers()->with('ReviewUser', 'User')->has('ReviewUser')->get();

        return view('caretaker.ulasan-saya', ['reviews' => $reviews]);
    }
}
