<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CaretakerSeeder::class,
            RegionSeeder::class,
            ProfessionSeeder::class,
            JobOfferSeeder::class,
            TransactionSeeder::class,
            CaretakerProfessionSeeder::class,
            CaretakerRegionSeeder::class,
            ReviewUserSeeder::class,
            ReviewCaretakerSeeder::class,
        ]);
    }
}
