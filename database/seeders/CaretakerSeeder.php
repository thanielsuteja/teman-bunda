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
            'approved' => 'accepted',
            'user_id' => '2',
            'kode_bank' => '130',
            'bank_account' => '6041067006',
            'cost_per_hour' => '20000',
            'tipe_caretaker' => 'Umum',
            'edukasi' => 'Sarjana',
            'deskripsi_caretaker' => 'Saya suka makan babi ayam kecap otak semur tapi dulu pernah bekerja di Hanyang Unversity sebagai seorang professor Administrasi dan Manajemen. Namun saya kembali ke Indonesia setelah diceraikan oleh suami saya lelaki yang tidak bertanggung jawab. Nyatanya, saya sudah memberikan kepada seporsi harta yang saya kumpulkan di Indonesia. Jadi begitulah bagaimana saya berakhir bekerja sebagai pengasuh Caretaker.',
            'pengawasan_kamera' => 1,
            'takut_anjing' => 0,
            'dokumen_skck_path' => 'aGGBTFZ2jyf7FBNco6OYIX0egdEGdW2T89HkUsDX.png',
            'dokumen_vaksin_path' => 'Uips9rTumOZqQkkiYdcwvHnqVUhVnavh9cIvFYJJ.png',
            'NIK' => '3171033009000003',
        ]);

        Caretaker::create([
            'caretaker_status' => 1,
            'approved' => 'accepted',
            'user_id' => '3',
            'kode_bank' => '130',
            'bank_account' => '6041055002',
            'cost_per_hour' => '18000',
            'tipe_caretaker' => 'Ibu',
            'edukasi' => 'SMA',
            'deskripsi_caretaker' => 'Dulu pernah bekerja di Hongkong, dan Malaysia. Bekerja sebagai pengasuh bayi selama 5 tahun. Tidak hanya itu, saya juga berpengalaman dalam mengasuh lansia.',
            'pengawasan_kamera' => 0,
            'takut_anjing' => 1,
            'dokumen_ijazah_path' => 'RNg3JrEsAHCzWH0kwQxtQJhxvnFmtMLLzk60oY71.png',
            'dokumen_psikotes_path' => 'lRjSbpTextiJDhgABpcUGfBdhMab1X0WZ1eG1r0N.png',
            'NIK' => '3171033009000055',
        ]);
    }
}
