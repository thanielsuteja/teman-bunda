<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_offer;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InfoOrderController extends Controller
{
    public function showOrderInfo ($id) {
        $job = Job_offer::where('job_id', $id)->first();
        
        return view('user.order-info', ['job' => $job]);
    }

    public function updateGaji($id, Request $request)
    {
        $temp = Job_offer::find($id)->permintaan_gaji_baru;

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
            'url' => route('caretaker.detail-status-order', $job->job_id)
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
            'url' => route('caretaker.detail-status-order', $job->job_id)
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
