<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class ProfilUserController extends Controller
{
    public function getKabupaten(Request $request)
    {
        $kabupaten = City::where('province_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($kabupaten);
    }

    public function getKecamatan(Request $request)
    {
        $kecamatan = District::where('city_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($kecamatan);
    }

    public function getKelurahan(Request $request)
    {
        $kelurahan = Village::where('district_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($kelurahan);
    }

    public function showProfile($id)
    {
        $user = User::where('user_id', $id)->first();
        $province = Province::pluck('name', 'id');

        return view('user.profile', ['user' => $user, 'province' => $province]);
    }

    public function simpanAlamat(Request $request, $id)
    {
        $user = User::where('user_id', $id)->first();

        User::find($id)->update([
            'alamat' => $request->alamat, 
            'provinsi' => Province::find($request->provinsi)->name, 
            'kabupaten' => City::find($request->kabupaten)->name,
            'kecamatan' => District::find($request->kecamatan)->name,
            'kelurahan' => Village::find($request->kelurahan)->name,
        ]);

        return redirect("user/profile/$id");
    }

    
    public function updateFotoProfil(Request $request)
    {
        $user = Auth::user();

        $request->profile_img_path->store('foto_profil', 'public');

        $user->update([
            'profile_img_path' => $request->profile_img_path->hashName()
        ]);

        return redirect()->route('user.profile', $user->user_id);
    }
}
