<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_offer;
use App\Models\Review_caretaker;
use App\Models\User;

class ReviewCaretakerController extends Controller
{
    public function showPageReview($id)
    {
        $job = Job_offer::where('job_id', $id)->first();

        return view('caretaker.review', ['job' => $job]);
    }

    public function sendReview($id, Request $request)
    {
        Review_caretaker::create([
            'job_id' => $id,
            'review_rating' => $request->penilaian,
            'review_content' => $request->ulasan,
        ]);

        $job = Job_offer::find($id);
        $user = User::find($job->user_id);

        $user->update([
            'rating_user' => $user->meanRating
        ]);

        return redirect()->route('caretaker.order');
    }
}
