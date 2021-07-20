<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review_user;

class ReviewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review_user::create([
            'job_id' => '1',
            'review_rating' => '5',
            'review_content' => 'Pekerja sangat pandai dalam melakukan tugasnya',
        ]);
        Review_user::create([
            'job_id' => '2',
            'review_rating' => '4',
            'review_content' => 'Caregiver melakukan yang terbaik walau ada sedikit kesalahan',
        ]);
    }
}
