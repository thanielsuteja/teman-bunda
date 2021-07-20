<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review_caretaker;

class ReviewCaretakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review_caretaker::create([
            'job_id' => '1',
            'review_rating' => '5',
            'review_content' => 'Kerja sama dia nyaman banget. Anak penurut',
        ]);
        Review_caretaker::create([
            'job_id' => '2',
            'review_rating' => '5',
            'review_content' => 'Anak cukup pandai dan bisa langsung belajar dengan cepat',
        ]);
    }
}
