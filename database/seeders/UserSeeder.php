<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_depan' => 'Abang',
            'nama_belakang' => 'Jago',
            'password' => bcrypt('12345678'),
            'tanggal_lahir' => '2000-07-20',
            'jenis_kelamin' => 'laki-laki',
            'nomor_telepon' => '081208120128',
            'email' => 'anjingkita@ajg.com',
            'alamat' => 'Jl. Rawa Pening',
            'provinsi' => 'Jawa Tengah',
            'kabupaten' => 'Kabupaten Semarang',
            'kecamatan' => 'Sempoindah',
            'kelurahan' => 'Adios',
            'dokumen_ktp_path' => asset('storage\ktp\storage\ktp\xxduqwLCgfVEtgOi5fiUokRfCUTH0nSc2KcqASzD.png'),
            'virtual_account' => '100000000000000',
        ]);

        User::create([
            'nama_depan' => 'Admin',
            'nama_belakang' => '123',
            'password' => bcrypt('admin123'),
            'tanggal_lahir' => '1998-07-20',
            'jenis_kelamin' => 'laki-laki',
            'nomor_telepon' => '081208121212',
            'email' => 'admin@mail.com',
            'alamat' => 'Jl. Rawa Perunggu',
            'provinsi' => 'Jawa Tengah',
            'kabupaten' => 'Kabupaten Semarang',
            'kecamatan' => 'Sempoindah',
            'kelurahan' => 'Adios',
            'dokumen_ktp_path' => asset('storage\ktp\storage\ktp\jbFRhQY2IOH7EZFwLLggMuAU7U0flu9QKc4fH1hA.png'),
            'virtual_account' => '100000000100000',
        ]);

        User::create([
            'nama_depan' => 'Care',
            'nama_belakang' => 'Lee',
            'password' => bcrypt('12345678'),
            'tanggal_lahir' => '1995-07-20',
            'jenis_kelamin' => 'perempuan',
            'nomor_telepon' => '081208121215',
            'email' => 'carelee@mail.com',
            'alamat' => 'Jl. Being Perunggu',
            'provinsi' => 'Jawa Tengah',
            'kabupaten' => 'Kabupaten Semarang',
            'kecamatan' => 'Alambaka',
            'kelurahan' => 'Syoerkka',
            'dokumen_ktp_path' => asset('storage\ktp\storage\ktp\3JIBFxDnmueBJQNxEfMes96JHTa01SBzx4brUGCO.png'),
            'virtual_account' => '100000000112345',
        ]);

    }
}
