<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;
use App\Models\Region;
use App\Models\Caretaker;

class CariCaretakerController extends Controller
{
    public function showPageCariCaretaker() {
        $profesi = Profession::pluck('profession_name','profession_id');
        $area = Region::pluck('region_name', 'region_id');
        $caretaker = Caretaker::get();

        // return $caretaker->first()->JobOffers()->get();

        return view('user.cari-caretaker', ['profesi' => $profesi, 'area' => $area, 'caretaker' => $caretaker]);
    }

    public function showCaretakerInfo($id) {
        $caretaker = Caretaker::where('caretaker_id',$id)->get();

        return view('user.caretaker-info', ['caretaker' => $caretaker]);
    }
}
