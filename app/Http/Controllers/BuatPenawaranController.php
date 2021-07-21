<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caretaker;
use App\Models\Job_offer;
use App\Models\Notification;

class BuatPenawaranController extends Controller
{
    public function showPenawaranForm($id) {
        $caretaker = Caretaker::where('caretaker_id', $id)->first();
        return view('user.buat-penawaran', ['care' => $caretaker]);
    }

    public function buatPenawaran(Request $request)
    {
        $job = Job_offer::create([
            'user_id' => $request->user_id,
            'caretaker_id' => $request->caretaker_id,
            'judul_pekerjaan' => $request->judul,
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'jam_masuk' => $request->jam_masuk,
            'jam_berakhir' => $request->jam_berakhir,
            'wd_1' => $request->wd_1 ?? 0,
            'wd_2' => $request->wd_2 ?? 0,
            'wd_3' => $request->wd_3 ?? 0,
            'wd_4' => $request->wd_4 ?? 0,
            'wd_5' => $request->wd_5 ?? 0,
            'wd_6' => $request->wd_6 ?? 0,
            'wd_7' => $request->wd_7 ?? 0,
            'estimasi_biaya' => $request->estimasi_biaya,
        ]);
        
        Notification::create([
            'notification_type' => 'Kamu Dapat Penawaran Kerja Baru',
            'content' => 'Yey! Kamu mendapatkan tawaran kerja baru. Buruan cek sekarang!',
            'user_id' => null,
            'caretaker_id' => $request->caretaker_id,
            'url' => route('caretaker.detail-status-order', $job->job_id)
        ]);

        return redirect('/user/home-page');
    }
}
