<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string|min:8'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'min'                   => 'Password minimal 8 karakter'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $credentials = [
            'email'                 => $request->input('email'),
            'password'              => $request->input('password')
        ];

        Auth::attempt($credentials);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            if (Auth::user()->role == 'user') {
                return redirect()->route('user.home');
            } else {
                $caretaker = Auth::user()->Caretaker;
                if ($caretaker->first_login == 1) {
                    $caretaker->update([
                        'first_login' => 0
                    ]);
                    return redirect()->route('mulai-caretaker');
                } else {
                    return redirect()->route('caretaker.home');
                }
            }
        } else { // false
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function showRegisterForm()
    {
        $provinsi = Province::pluck('name', 'id');

        return view('register', ['provinsi' => $provinsi]);
    }

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

    public function register(Request $request)
    {
        $faker = Faker::create();

        $rules = [
            'nama_depan'            =>  'required|string|max:255',
            'nama_belakang'         =>  'required|string|max:255',
            'email'                 =>  'required|email|unique:users,email',
            'password'              =>  'required|min:8|max:20',
            'nomor_telepon'         =>  'required|numeric|min:10|unique:users,nomor_telepon',
            'tanggal_lahir'         =>  'required|date',
            'jenis_kelamin'         =>  'required|string',
            'alamat'                =>  'required',
            'provinsi'              =>  'required',
            'kabupaten'             =>  'required',
            'kecamatan'             =>  'required',
            'kelurahan'             =>  'required',
            'ktp'                   =>  'required|mimes:jpeg,png,jpg',
            'foto_profil'           =>  'mimes:jpeg,png,jpg',
        ];

        $messages = [
            'required'              =>  ':attribute wajib diisi',
            'min'                   =>  ':attribute minimal :min karakter',
            'max'                   =>  ':attribute maksimal :max karakter',
            'unique'                =>  ':attribute sudah digunakan',
            'email'                 =>  'Email belum benar',
            'date'                  =>  'Masukkan tanggal dengan benar',
            'mimes'                 =>  'Mohon hanya file extension .jpg, .jpeg, dan .png'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if ($request->hasFile('ktp')) {

            $request->ktp->store('ktp', 'public');

            $user = User::create([
                'nama_depan'            =>  ucwords(strtolower($request->nama_depan)),
                'nama_belakang'         =>  ucwords(strtolower($request->nama_belakang)),
                'email'                 =>  strtolower($request->email),
                'password'              =>  Hash::make($request->password),
                'nomor_telepon'         =>  $request->nomor_telepon,
                'tanggal_lahir'         =>  $request->tanggal_lahir,
                'jenis_kelamin'         =>  $request->jenis_kelamin,
                'alamat'                =>  $request->alamat,
                'provinsi'              =>  Province::find($request->provinsi)->name,
                'kabupaten'             =>  City::find($request->kabupaten)->name,
                'kecamatan'             =>  District::find($request->kecamatan)->name,
                'kelurahan'             =>  Village::find($request->kelurahan)->name,
                'dokumen_ktp_path'      =>  $request->ktp->hashName(),
                'virtual_account'       =>  $faker->numberBetween(100000000000000, 999999999999999)
            ]);

            if ($request->hasFile('foto_profil')) {
                $request->foto_profil->store('foto_profil', 'public');
                User::where('user_id', $user->user_id)->update([
                    'profile_img_path'      =>  $request->foto_profil->hashName(),
                ]);
            }
        }

        if ($user) {
            Session::flash('success', 'Register berhasil! Silahkan masuk untuk mmengakses Teman Bunda');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('home');
    }
}
