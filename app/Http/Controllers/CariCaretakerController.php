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
        $caretaker = Caretaker::where('caretaker_status', 1)->get();

        return view('user.cari-caretaker', ['profesi' => $profesi, 'area' => $area, 'caretaker' => $caretaker]);
    }
}