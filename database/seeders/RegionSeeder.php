<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indonesia_districts')->orderBy('city_id')->chunk(1500, function ($districts) {
            DB::table('regions')->insert($districts->map(function ($district) {
                return ['region_name' => $district->name];
            })->toArray());
        });
    }
}
