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
            'nama_depan'        => 'Thaniel',
            'nama_belakang'     => 'Suteja',
            'password'          => bcrypt('12345678'),
            'tanggal_lahir'     => '2000-07-20',
            'jenis_kelamin'     => 'laki-laki',
            'nomor_telepon'     => '081208120128',
            'email'             => 'thaniel@mail.com',
            'alamat'            => 'Jl. Rawa Pening',
            'provinsi'          => 'DKI JAKARTA',
            'kabupaten'         => 'KOTA JAKARTA PUSAT',
            'kecamatan'         => 'SENEN',
            'kelurahan'         => 'SENEN',
            'profile_img_path'  => '8fVfIVgapsAyrD4m1dcRMuEtzyAlLeMzyWkkbWBS.jpg',
            'dokumen_ktp_path'  => '4flKFOj0Cw6PsIIJanlCI08INpg5fbwvgEJ9DiPq.png',
            'virtual_account'   => '100000000000000',
        ]);

        User::create([
            'nama_depan'        => 'Baharudin',
            'nama_belakang'     => 'Ongkowidjaya',
            'role'              => 'caretaker',
            'password'          => bcrypt('12345678'),
            'tanggal_lahir'     => '2001-07-20',
            'jenis_kelamin'     => 'laki-laki',
            'nomor_telepon'     => '081278461115',
            'email'             => 'baharudin@mail.com',
            'alamat'            => 'Jl. Perunggu Timur',
            'provinsi'          => 'DKI JAKARTA',
            'kabupaten'         => 'KOTA JAKARTA PUSAT',
            'kecamatan'         => 'GAMBIR',
            'kelurahan'         => 'CIDENG',
            'profile_img_path'  => 'QtZJ52FNKZPij4LmqcFGU8GOON4Vd6VMcLaSUku8.jpg',
            'dokumen_ktp_path'  => '3STukPOFZEsEPCCswWC98L8lmAa8DP8W5y148RIj.png',
            'virtual_account'   => '110000000000000',
            'created_at'        => '2020-07-11 16:12:05'
        ]);

        User::create([
            'nama_depan'        => 'Care',
            'nama_belakang'     => 'Lee',
            'role'              => 'caretaker',
            'password'          => bcrypt('12345678'),
            'tanggal_lahir'     => '1995-07-20',
            'jenis_kelamin'     => 'perempuan',
            'nomor_telepon'     => '081208121215',
            'email'             => 'carelee@mail.com',
            'alamat'            => 'Jl. Being Perunggu',
            'provinsi'          => 'Jawa Tengah',
            'kabupaten'         => 'Kabupaten Semarang',
            'kecamatan'         => 'Alambaka',
            'kelurahan'         => 'Syoerkka',
            'profile_img_path'  => 'EtkMV9vTyHlM31t2CITXSz3UV354MYblkMZ4og14.jpg',
            'dokumen_ktp_path'  => '3JIBFxDnmueBJQNxEfMes96JHTa01SBzx4brUGCO.png',
            'virtual_account'   => '111000000000000',
            'created_at'        => '2019-06-01 16:12:05'
        ]);

        User::create([
            'nama_depan'        => 'Admin',
            'nama_belakang'     => 'Teman Bunda',
            'role'              => 'admin',
            'password'          => bcrypt('123admin123'),
            'tanggal_lahir'     => '2000-02-02',
            'jenis_kelamin'     => 'perempuan',
            'nomor_telepon'     => '081111111111',
            'email'             => 'torbmegadap@admin.com',
            'alamat'            => 'Admin',
            'provinsi'          => 'ADMIN',
            'kabupaten'         => 'ADMIN',
            'kecamatan'         => 'ADMIN',
            'kelurahan'         => 'ADMIN',
            'dokumen_ktp_path'  => '2sHz4nbuTjQNGcGRKjkEvOEOVNvhJrLKXc5ui95f.jpg',
            'virtual_account'   => '111100000000000',
        ]);

    }
}
