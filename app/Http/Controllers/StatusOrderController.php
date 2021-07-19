<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caretaker;
use App\Models\Job_offer;
use Illuminate\Support\Facades\Auth;

class StatusOrderController extends Controller
{
    public function showOrder () {
        $job = Job_offer::where('user_id', Auth::user()->user_id)->get(); 

        return view('user.order', ['job_offer' => $job]);
    }
}
