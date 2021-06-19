<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;

class RegisterController extends Controller
{
    public function view()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $faker = Faker::create();

        $message = [
            'required' => ':attribute wajib diisi',
            'alpha_num' => ':attribute wajib diisi dengan minimal 1 angka dan 1 huruf',
            'min' => ':attribute harus diisi minimal :min karakter'
        ];

        $request->validate([
            'nama' => 'required|string|max:255',
            // 'nama_belakang' => 'required|string|max:255',
            'password' => 'required|alpha_num|min:8',  //['required','confirmed', Rules\Password::defaults()],
            'no_telepon' => 'required|numeric',
            'email' => 'required|email',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'virtual_account' => $faker->numberBetween(100000000000000,999999999999999)
        ]);

        // event(new Registered($user));

        Auth::login($user);

        return redirect('/dashboard');
    }
}
