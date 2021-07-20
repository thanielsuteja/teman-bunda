<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use Illuminate\Http\Request;
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

    // public function registerCaretaker(Request $request) {
    //     Caretaker::create([
    //         'edukasi'                       => $request->,
    //         'religi'                        => $request->,
    //         'tinggi'                        => $request->,
    //         'berat'                         => $request->,
    //         'NIK'                           => $request->,
    //         'cost_per_hour'                 => $request->,
    //         'kode_bank'                     => $request->,
    //         'bank_account'                  => $request->,
    //         'dokumen_vaksin_path'           => $request->,
    //         'dokumen_psikotes_path'         => $request->,
    //         'dokumen_ijazah_path'           => $request->,
    //         'dokumen_akta_kelahiran_path'   => $request->,
    //     ]);
    // }
}
