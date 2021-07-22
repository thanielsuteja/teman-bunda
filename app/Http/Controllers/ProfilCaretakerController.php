<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use App\Models\Profession_caretaker_relation;
use App\Models\Profession;
use App\Models\User;

class ProfilCaretakerController extends Controller
{
    public function showPageProfile()
    {
        $user = Auth::user();
        $professions = Profession::get();
        $provinces = Province::pluck('name', 'id');

        return view('caretaker.profile', ['user' => $user, 'professions' => $professions, 'provinces' => $provinces]);
    }

    public function updateProfileArea(Request $request)
    {
        $user = Auth::user();

        $user->update([
            'alamat' => $request->alamat,
            'provinsi' => Province::find($request->provinsi)->name,
            'kabupaten' => City::find($request->kabupaten)->name,
            'kecamatan' => District::find($request->kecamatan)->name,
            'kelurahan' => Village::find($request->kelurahan)->name,
        ]);

        return redirect()->route('caretaker.profile');
    }

    public function updateProfileDetail(Request $request)
    {
        $user = Auth::user();
        $caretaker = $user->Caretaker;

        $caretaker->update([
            'cost_per_hour' => $request->cost_per_hour,
            'pengawasan_kamera' => $request->pengawasan_kamera,
            'deskripsi_caretaker' => $request->deskripsi_caretaker,
        ]);

        $caretaker->ProfessionCaretakerRelation()->delete();
        foreach ($request->profession_id as $profession_id) {
            Profession_caretaker_relation::create([
                'profession_id' => $profession_id,
                'caretaker_id' => $caretaker->caretaker_id
            ]);
        }

        return redirect()->route('caretaker.profile');
    }

    public function updateFotoProfil(Request $request)
    {
        $user = Auth::user();

        $request->profile_img_path->store('foto_profil', 'public');

        $user->update([
            'profile_img_path' => $request->profile_img_path->hashName()
        ]);

        return redirect()->route('caretaker.profile');
    }

    public function updateStatusTerbukaUntukPekerjaan(Request $request)
    {
        $user = Auth::user();

        $user->Caretaker->update([
            'caretaker_status' => $user->Caretaker->caretaker_status == 0 ? 1 : 0
        ]);

        return true;
    }

    public function showProfilUser($id)
    {
        $user = User::find($id);

        return view('caretaker.profil-user', ['user' => $user]);
    }
}
