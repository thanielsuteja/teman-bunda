<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_offer;
use App\Models\Review_caretaker;

class ReviewCaretakerController extends Controller
{
    public function showCaretakerReviewForm($id) {
        $job = Job_offer::where('job_id', $id)->first();

        return view('user.review', ['job' => $job]);
    }

    public function reviewUser(Request $request) {
        Review_caretaker::create([
            'job_id' => $request->job_id,
            'review_rating' => $request->penilaian,
            'review_content' => $request->ulasan,
        ]);

        return redirect("/user/home-page");
    }
}
