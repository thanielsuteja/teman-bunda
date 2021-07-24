<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;
use App\Models\Region;
use App\Models\Caretaker;
use App\Models\Region_caretaker_relation;

class CariCaretakerController extends Controller
{
    public function showPageCariCaretaker(Request $request)
    {
        $profesi = Profession::pluck('profession_name', 'profession_id');
        $area = Region::pluck('region_name', 'region_id');

        $caretaker = Caretaker::query();

        if ($request->has('mengasuh')) {
            $caretaker->whereHas('ProfessionCaretakerRelation', function ($query) use ($request) {
                return $query->where('profession_id', $request->mengasuh);
            });
        }

        if ($request->has('area')) {
            $caretaker->whereHas('RegionCaretakerRelation', function ($query) use ($request) {
                return $query->where('region_id', $request->area);
            });
        }
        $caretaker = $caretaker->where('caretaker_status', 1)->where('approved','accepted')->orderBy('updated_at','desc')->get();
        
        if ($request->get('sort') == 'rating-tertinggi') {
            $caretaker = $caretaker->sortByDesc('MeanRating')->values();
        } elseif ($request->get('sort') == 'harga-terendah') {
            $caretaker = $caretaker->sortBy('cost_per_hour')->values();
        } elseif ($request->get('sort') == 'umur-termuda') {
            $caretaker = $caretaker->sortBy('Age')->values();
        } elseif ($request->get('sort') == 'umur-tertua') {
            $caretaker = $caretaker->sortByDesc('Age')->values();
        }

        return view('user.cari-caretaker', ['profesi' => $profesi, 'area' => $area, 'caretaker' => $caretaker]);
    }

    public function showCaretakerInfo($id) {
        $caretaker = Caretaker::where('caretaker_id',$id)->first();

        return view('user.caretaker-info', ['care' => $caretaker]);
    }
}
