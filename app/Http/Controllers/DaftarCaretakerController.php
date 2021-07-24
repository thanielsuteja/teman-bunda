<?php

namespace App\Http\Controllers;

use App\Models\Caretaker;
use App\Models\Region_caretaker_relation;
use App\Models\Profession_caretaker_relation;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

    public function registerCaretaker(Request $request)
    {
        $rules = [
            'tipe'                  =>  'required|string',
            'pendidikan'            =>  'required|string',
            'NIK'                   =>  'required|numeric|digits:16',
            'tarif'                 =>  'required|numeric|digits:5',
            'kode_bank'             =>  'required|numeric|digits:3',
            'rekening'              =>  'required|numeric|digits_between:10,16',
            'perkenalan_diri'       =>  'required|string|max:255',
            'ijazah'                =>  'mimes:jpeg,jpg,png',
            'vaksin'                =>  'mimes:jpeg,jpg,png',
            'psikotes'              =>  'mimes:jpeg,jpg,png',
            'skck'                  =>  'mimes:jpeg,jpg,png',
        ];

        $messages = [
            'required'              =>  ':attribute wajib diisi',
            'digits'                =>  ':attribute harus diisi sebanyak :digits digit',
            'max'                   =>  ':attribute maksimal :max karakter',
            'digits_between'        =>  'Jumlah digit pada rekening salah',
            'mimes'                 =>  'Mohon hanya file extension .jpg, .jpeg, dan .png'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $caretaker = Caretaker::create([
            'user_id'                       => Auth::id(),
            'edukasi'                       => $request->pendidikan,
            'tipe_caretaker'                => $request->tipe,
            'NIK'                           => $request->NIK,
            'cost_per_hour'                 => $request->tarif,
            'kode_bank'                     => $request->kode_bank,
            'bank_account'                  => $request->rekening,
            'deskripsi_caretaker'           => $request->perkenalan_diri,
            'pengawasan_kamera'             => $request->pengawasan_kamera ?? 0,
            'takut_anjing'                  => $request->takut_anjing ?? 1,
        ]);
        foreach ($request->profession_id as $profession_id) {
            Profession_caretaker_relation::create([
                'caretaker_id'                  => $caretaker->caretaker_id,
                'profession_id'                 => $profession_id,
            ]);
        }
        foreach ($request->kecamatan_id as $kecamatan_id) {
            $district = District::where('id', $kecamatan_id)->first();
            $region = Region::where('region_name', $district->name)->first();

            Region_caretaker_relation::create([
                'caretaker_id'                  => $caretaker->caretaker_id,
                'region_id'                     => $region->region_id,
            ]);
        }

        if ($request->hasFile('vaksin')) {
            $request->vaksin->store('vaksin', 'public');
            Caretaker::where('caretaker_id', $caretaker->caretaker_id)->update([
                'dokumen_vaksin_path'           => $request->vaksin->hashName(),
            ]);
        }
        if ($request->hasFile('psikotes')) {
            $request->psikotes->store('psikotes', 'public');
            Caretaker::where('caretaker_id', $caretaker->caretaker_id)->update([
                'dokumen_psikotes_path'         => $request->psikotes->hashName(),
            ]);
        }
        if ($request->hasFile('ijazah')) {
            $request->ijazah->store('ijazah', 'public');
            Caretaker::where('caretaker_id', $caretaker->caretaker_id)->update([
                'dokumen_ijazah_path'           => $request->ijazah->hashName(),
            ]);
        }
        if ($request->hasFile('skck')) {
            $request->skck->store('skck', 'public');
            Caretaker::where('caretaker_id', $caretaker->caretaker_id)->update([
                'dokumen_skck_path'             => $request->skck->hashName(),
            ]);
        }

        return redirect()->route('menunggu-verifikasi');
    }

    public function showTungguVerifikasi()
    {
        return view('user.menunggu-verifikasi');
    }
}
