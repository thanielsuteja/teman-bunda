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
            'nama_depan' => 'Thaniel',
            'nama_belakang' => 'Suteja',
            'password' => bcrypt('12345678'),
            'tanggal_lahir' => '2000-07-20',
            'jenis_kelamin' => 'laki-laki',
            'nomor_telepon' => '081208120128',
            'email' => 'thaniel@mail.com',
            'alamat' => 'Jl. Rawa Pening',
            'provinsi' => 'DKI JAKARTA',
            'kabupaten' => 'KOTA JAKARTA PUSAT',
            'kecamatan' => 'SENEN',
            'kelurahan' => 'SENEN',
            'dokumen_ktp_path' => asset('xxduqwLCgfVEtgOi5fiUokRfCUTH0nSc2KcqASzD.png'),
            'virtual_account' => '100000000000000',
        ]);

        User::create([
            'nama_depan' => 'Baharudin',
            'nama_belakang' => 'Ongkowidjaya',
            'password' => bcrypt('12345678'),
            'tanggal_lahir' => '1995-02-02',
            'jenis_kelamin' => 'laki-laki',
            'nomor_telepon' => '081278461115',
            'email' => 'baharudin@mail.com',
            'alamat' => 'Jl. Perunggu Timur',
            'provinsi' => 'DKI JAKARTA',
            'kabupaten' => 'KOTA JAKARTA PUSAT',
            'kecamatan' => 'GAMBIR',
            'kelurahan' => 'CIDENG',
            'dokumen_ktp_path' => asset('jbFRhQY2IOH7EZFwLLggMuAU7U0flu9QKc4fH1hA.png'),
            'profile_img_path' => asset('QtZJ52FNKZPij4LmqcFGU8GOON4Vd6VMcLaSUku8.jpg'),
            'virtual_account' => '110000000000000',
            'created_at' => '2020-07-11 16:12:05'
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
            'dokumen_ktp_path' => asset('3JIBFxDnmueBJQNxEfMes96JHTa01SBzx4brUGCO.png'),
            'virtual_account' => '111000000000000',
            'created_at' => '2019-06-01 16:12:05'
        ]);

        User::create([
            'nama_depan' => 'Admin',
            'nama_belakang' => 'Admin',
            'password' => bcrypt('admin123'),
            'tanggal_lahir' => '2000-02-02',
            'jenis_kelamin' => 'perempuan',
            'nomor_telepon' => '081111111111',
            'email' => 'admin@mail.com',
            'alamat' => 'Admin',
            'provinsi' => 'ADMIN',
            'kabupaten' => 'ADMIN',
            'kecamatan' => 'ADMIN',
            'kelurahan' => 'ADMIN',
            'dokumen_ktp_path' => asset('3JIBFxDnmueBJQNxEfMes96JHTa01SBzx4brUGCO.png'),
            'virtual_account' => '111100000000000',
        ]);

    }
}
