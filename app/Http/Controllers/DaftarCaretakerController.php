<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use App\Models\Region_caretaker_relation;
use App\Models\Profession_caretaker_relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;

class DaftarCaretakerController extends Controller
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

    public function showCaretakerRegisterForm()
    {
        $provinsi = Province::pluck('name', 'id');

        return view('user.daftar-caretaker', ['provinsi' => $provinsi]);
    }

    public function registerCaretaker(Request $request) {

        Auth::user()->update([
            'role' => 'caretaker',
        ]);

        $caretaker = Caretaker::create([
            'edukasi'                       => $request->pendidikan,
            'tipe_caretaker'                => $request->tipe,
            'NIK'                           => $request->NIK,
            'cost_per_hour'                 => $request->tarif,
            'kode_bank'                     => $request->kode_bank,
            'bank_account'                  => $request->rekening,
            'deskripsi_caretaker'           => $request->perkenalan_diri,
            'pengawasan_kamera'             => $request->pengawasan_kamera,
            'takut_anjing'                  => $request->takut_anjing,
            'dokumen_vaksin_path'           => $request->vaksin,
            'dokumen_psikotes_path'         => $request->psikotes,
            'dokumen_ijazah_path'           => $request->ijazah,
            'dokumen_skck_path'             => $request->skck,
        ]);
        
        foreach ($request->profession_id as $profession_id) {
            Profession_caretaker_relation::create([
                'caretaker_id'                  => $caretaker->caretaker_id,
                'profession_id'                 => $profession_id,
            ]);
        }

        foreach ($request->kecamatan_id as $kecamatan_id) {
            Region_caretaker_relation::create([
                'caretaker_id'                  => $caretaker->caretaker_id,
                'region_id'                     => $kecamatan_id,
            ]);
        }

        return redirect()->route('');
    }

    public function showTungguVerifikasi()
    {
        return view('user.menunggu-verifikasi');
    }
}
