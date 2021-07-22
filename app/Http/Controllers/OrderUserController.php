<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caretaker;
use App\Models\Job_offer;
use App\Models\Notification;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class OrderUserController extends Controller
{
    public function showOrder () {
        $job = Job_offer::where('user_id', Auth::user()->user_id)->orderBy('created_at','desc')->get(); 

        return view('user.order', ['job_offer' => $job]);
    }

    public function showOrderInfo ($id) {
        $job = Job_offer::find($id);
        $transaction = Transaction::where('job_id', $id)->first();
        
        return view('user.order-info', ['job' => $job, 'transaction' => $transaction]);
    }

    public function updateGaji($id, Request $request)
    {
        $temp = Job_offer::find($id)->estimasi_biaya;

        Job_offer::find($id)->update([
            'estimasi_biaya' => $request->gaji_baru,
            'permintaan_gaji_baru' => null,
            'job_status' => 'menunggu',
        ]);

        $job = Job_offer::find($id);
        $user = User::find($job->user_id);

        Notification::create([
            'notification_type' => 'Permintaan Perubahan Gaji Diterima',
            'content' => 'Pengguna '.$user->nama_depan.' telah mengizinkan perubahan gaji dari Rp'.number_format($temp,2,",",".").' menjadi Rp'.number_format($job->estimasi_biaya,2,",",".").".",
            'user_id' => null,
            'caretaker_id' => $job->caretaker_id,
            'url' => route('caretaker.detail-order', $job->job_id)
        ]);

        return redirect("/user/order-info/$id");
    }
    
    public function batalkanOrder($id)
    {
        Job_offer::where('job_id', $id)->update([
            'job_status' => 'dibatalkan',
        ]);

        $job = Job_offer::find($id);
        
        Notification::create([
            'notification_type' => 'Penawaran Kerja Dibatalkan',
            'content' => 'Oh tidak! Penawaran kerja untuk judul \''.$job->judul_pekerjaan.'\' telah dibatalkan. Yang sabar ya :(',
            'user_id' => null,
            'caretaker_id' => $job->caretaker_id,
            'url' => route('caretaker.detail-order', $job->job_id)
        ]);

        return redirect("/user/order-info/$id");
    }

    public function selesaikanOrder($id)
    {
        Job_offer::where('job_id', $id)->update([
            'job_status' => 'selesai',
        ]);

        $job = Job_offer::find($id);

        Notification::create([
            'notification_type' => 'Pekerjaanmu Sudah Selesai',
            'content' => 'Yey! Pekerjaan untuk judul \''.$job->judul_pekerjaan.'\' telah selesai. Team Teman Bunda akan segera mengirim uang ke rekeningmu',
            'user_id' => null,
            'caretaker_id' => $job->caretaker_id,
            'url' => route('caretaker.review', $job->job_id)
        ]);

        return redirect("/user/review/$id");
    }
}
