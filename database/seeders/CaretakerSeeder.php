<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Caretaker;

class CaretakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caretaker::create([
            'caretaker_status' => 1,
            'approved' => 'approved',
            'user_id' => '2',
            'kode_bank' => '130',
            'bank_account' => '6041067006',
            'cost_per_hour' => '20000',
            'edukasi' => 'SMA',
            'religi' => 'Islam',
            'tinggi' => '170',
            'berat' => '62',
            'deskripsi_caretaker' => 'Saya suka makan babi ayam kecap otak semur tapi dulu pernah bekerja di Hanyang Unversity sebagai seorang professor Administrasi dan Manajemen. Namun saya kembali ke Indonesia setelah diceraikan oleh suami saya lelaki yang tidak bertanggung jawab. Nyatanya, saya sudah memberikan kepada seporsi harta yang saya kumpulkan di Indonesia. Jadi begitulah bagaimana saya berakhir bekerja sebagai pengasuh Caretaker.',
            'pengawasan_kamera' => 1,
            'takut_anjing' => 0,
            'NIK' => '3171033009000003',
        ]);

        Caretaker::create([
            'caretaker_status' => 1,
            'approved' => 'approved',
            'user_id' => '3',
            'kode_bank' => '130',
            'bank_account' => '6041055002',
            'cost_per_hour' => '18000',
            'edukasi' => 'SMA',
            'religi' => 'Islam',
            'tinggi' => '154',
            'berat' => '46',
            'deskripsi_caretaker' => 'Dulu pernah bekerja di Hongkong, dan Malaysia. Bekerja sebagai pengasuh bayi selama 5 tahun. Tidak hanya itu, saya juga berpengalaman dalam mengasuh lansia.',
            'pengawasan_kamera' => 0,
            'takut_anjing' => 1,
            'NIK' => '3171033009000055',
        ]);
    }
}
