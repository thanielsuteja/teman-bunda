<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job_offer;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job_offer::create([
            'job_status' => 'menunggu',
            'user_id' => '1',
            'caretaker_id' => '1',
            'judul_pekerjaan' => 'Mengantar ke Sekolah',
            'deskripsi_pekerjaan' => 'Deskripsi untuk Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah Sekolah',
            'tanggal_masuk' => '2021-07-01',
            'tanggal_berakhir' => '2021-07-03',
            'jam_masuk' => '08:00:00',
            'jam_berakhir' => '16:00:00',
            'wd_1' => '1',
            'wd_2' => '1',
            'wd_3' => '1',
            'wd_4' => '1',
            'wd_5' => '1',
            'wd_6' => '0',
            'wd_7' => '0',
            'estimasi_biaya' => '500000',
        ]);

        Job_offer::create([
            'job_status' => 'selesai',
            'user_id' => '1',
            'caretaker_id' => '2',
            'judul_pekerjaan' => 'Menemani Anak Belajar Mat',
            'deskripsi_pekerjaan' => 'Dibutuhkan seorang terpelajar yang menguasai matematika dasar untuk membantu anak mengerjakan pekerjaan rumah. Sang anak merupakan siswa Sekolah Dasar IPEKA.',
            'tanggal_masuk' => '2021-05-01',
            'tanggal_berakhir' => '2021-05-29',
            'jam_masuk' => '17:30:00',
            'jam_berakhir' => '19:00:00',
            'wd_1' => '1',
            'wd_2' => '1',
            'wd_3' => '1',
            'wd_4' => '1',
            'wd_5' => '1',
            'wd_6' => '0',
            'wd_7' => '0',
            'estimasi_biaya' => '1200000',
        ]);
    }
}
