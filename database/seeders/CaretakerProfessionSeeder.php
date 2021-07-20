<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession_caretaker_relation;

class CaretakerProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession_caretaker_relation::create([
            'caretaker_id' => '1',
            'profession_id' => '1',
        ]);
        Profession_caretaker_relation::create([
            'caretaker_id' => '1',
            'profession_id' => '4',
        ]);
        Profession_caretaker_relation::create([
            'caretaker_id' => '2',
            'profession_id' => '1',
        ]);
        Profession_caretaker_relation::create([
            'caretaker_id' => '2',
            'profession_id' => '2',
        ]);
        Profession_caretaker_relation::create([
            'caretaker_id' => '2',
            'profession_id' => '3',
        ]);
    }
}
