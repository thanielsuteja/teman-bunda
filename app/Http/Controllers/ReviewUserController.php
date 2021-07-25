<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review_user;
use App\Models\Job_offer;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ReviewUserController extends Controller
{
    public function showUserReviewForm($id)
    {
        $job = Job_offer::where('job_id',$id)->first();

        return view('user.review', ['job' => $job]);
    }

    public function reviewCaretaker(Request $request, $id)
    {

        $rules = [
            'penilaian'             =>  'required',
            'ulasan'                =>  'max:255',
        ];

        $messages = [
            'required'              =>  ':attribute wajib diisi',
            'max'                   =>  ':attribute maksimal :max karakter',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        Review_user::create([
            'job_id'            => $id,
            'review_rating'     => $request->penilaian,
            'review_content'    => $request->ulasan,
        ]);

        $job = Job_offer::find($id);
        $user = User::find($job->user_id);

        Notification::create([
            'notification_type' => 'Kamu Mendapat Ulasan Baru',
            'content' => 'Pengguna ' . $user->nama_depan . ' telah memberikan penilaian sebesar ' . $request->penilaian . ' ★. Jangan lupa untuk menilai dia ya.',
            'user_id' => null,
            'caretaker_id' => $job->caretaker_id,
            'url' => route('caretaker.ulasan-saya'),
        ]);

        return redirect("/user/home-page");
    }
}
