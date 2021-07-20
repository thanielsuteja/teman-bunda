<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region_caretaker_relation;

class CaretakerRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region_caretaker_relation::create([
            'region_id' => '1941',
            'caretaker_id' => '1',
        ]);
        Region_caretaker_relation::create([
            'region_id' => '1942',
            'caretaker_id' => '1',
        ]);
        Region_caretaker_relation::create([
            'region_id' => '1943',
            'caretaker_id' => '1',
        ]);

        Region_caretaker_relation::create([
            'region_id' => '1941',
            'caretaker_id' => '2',
        ]);
        Region_caretaker_relation::create([
            'region_id' => '1944',
            'caretaker_id' => '2',
        ]);
        Region_caretaker_relation::create([
            'region_id' => '1947',
            'caretaker_id' => '2',
        ]);
    }
}
