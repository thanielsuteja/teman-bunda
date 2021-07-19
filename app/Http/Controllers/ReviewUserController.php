<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review_user;
use App\Models\Job_offer;

class ReviewUserController extends Controller
{
    public function showUserReviewForm($id) {
        $job = Job_offer::where('job_id', $id)->first();

        return view('user.review', ['job' => $job]);
    }

    public function reviewCaretaker(Request $request) {
        Review_user::create([
            'job_id' => $request->job_id,
            'review_rating' => $request->penilaian,
            'review_content' => $request->ulasan,
        ]);

        return redirect("/user/home-page");
    }
}
