<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caretaker;

class CaretakerInfoController extends Controller
{
    public function showCaretakerInfo($id) {
        $caretaker = Caretaker::where('caretaker_id',$id)->first();

        return view('user.caretaker-info', ['care' => $caretaker]);
    }
}
