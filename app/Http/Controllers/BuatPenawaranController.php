<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Caretaker;
use App\Models\Job_offer;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;

class BuatPenawaranController extends Controller
{
    public function getDaysFromBetweenDate(Request $request)
    {
        $dayNames = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu',
        ];
        $startDate = date_create($request->tanggal_masuk);
        $endDate = date_create($request->tanggal_berakhir);

        $days = [];
        for ($date = $startDate; $date <= $endDate; $date->modify('+1 day')) {
            $dayNumber = $date->format('N');
            $days[$dayNumber] = $dayNames[$dayNumber] ?? '';
        }

        return $days;
    }

    public function calculateEstimation(Request $request)
    {
        $caretaker = Caretaker::find($request->caretaker_id);
        $days = $request->days ?? [];
        $cost = $caretaker->cost_per_hour;
        $total = 0;

        $startDate = date_create($request->tanggal_masuk);
        $endDate = date_create($request->tanggal_berakhir);
        $hour = abs(strtotime($request->jam_berakhir) - strtotime($request->jam_masuk)) / 3600;

        for ($date = $startDate; $date <= $endDate; $date->modify('+1 day')) {
            if (in_array($date->format('N'), $days)) {
                $total += ($cost * $hour);
            }
        }

        return $total;
    }

    public function showPenawaranForm($id) {
        $caretaker = Caretaker::where('caretaker_id', $id)->first();
        return view('user.buat-penawaran', ['care' => $caretaker]);
    }

    public function buatPenawaran(Request $request)
    {
        $rules = [
            'judul'                     =>  'required|string|max:50',
            'deskripsi_pekerjaan'       =>  'required|string',
            'tanggal_masuk'             =>  'required|date|after:tomorrow',
            'tanggal_berakhir'          =>  'required|date|after:tanggal_masuk',
            'jam_masuk'                 =>  'required',
            'jam_berakhir'              =>  'required',
            'estimasi_biaya'            =>  'required|numeric',
        ];

        $messages = [
            'required'                  =>  ':attribute wajib diisi',
            'date'                      =>  'Masukkan tanggal dengan benar',
            'tanggal_masuk.after'       =>  'Tanggal masuk harus setelah besok',
            'tanggal_berakhir.after'    =>  'Tanggal berakhir harus setelah tanggal masuk',
            'numeric'                   =>  'Hanya masukkan angka',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $job = Job_offer::create([
            'user_id'                   =>  $request->user_id,
            'caretaker_id'              =>  $request->caretaker_id,
            'judul_pekerjaan'           =>  $request->judul,
            'deskripsi_pekerjaan'       =>  $request->deskripsi_pekerjaan,
            'tanggal_masuk'             =>  $request->tanggal_masuk,
            'tanggal_berakhir'          =>  $request->tanggal_berakhir,
            'jam_masuk'                 =>  $request->jam_masuk,
            'jam_berakhir'              =>  $request->jam_berakhir,
            'wd_1'                      =>  $request->wd_1 ?? 0,
            'wd_2'                      =>  $request->wd_2 ?? 0,
            'wd_3'                      =>  $request->wd_3 ?? 0,
            'wd_4'                      =>  $request->wd_4 ?? 0,
            'wd_5'                      =>  $request->wd_5 ?? 0,
            'wd_6'                      =>  $request->wd_6 ?? 0,
            'wd_7'                      =>  $request->wd_7 ?? 0,
            'estimasi_biaya'            =>  $request->estimasi_biaya,
        ]);
        
        Notification::create([
            'notification_type' => 'Kamu Dapat Penawaran Kerja Baru',
            'content' => 'Yey! Kamu mendapatkan tawaran kerja baru. Buruan cek sekarang!',
            'user_id' => null,
            'caretaker_id' => $request->caretaker_id,
            'url' => route('caretaker.detail-order', $job->job_id)
        ]);


        if ($job) {
            Session::flash('success', 'Penawaran telah sukses dibuat');
            return redirect('/user/order');
        } else {
            Session::flash('error', 'Pembuatan penawaran kerja gagal. Silahkan coba beberapa saat lagi.');
            return redirect('/user/order');
        }
    }
}
