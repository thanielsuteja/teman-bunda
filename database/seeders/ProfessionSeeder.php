<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession::create([
            'profession_name' => 'Bayi',
            'profession_desc' => '0-3 tahun',
        ]);
        Profession::create([
            'profession_name' => 'Anak-anak',
            'profession_desc' => '3-7 tahun',
        ]);
        Profession::create([
            'profession_name' => 'Anak SD',
            'profession_desc' => '7-13 tahun',
        ]);
        Profession::create([
            'profession_name' => 'Lansia',
            'profession_desc' => '60 tahun ke atas',
        ]);
    }
}
