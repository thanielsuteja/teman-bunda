<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job_offer;
use App\Models\Transaction;
use App\Models\Profession;
use App\Models\Notification;
use App\Models\Review_caretaker;
use App\Models\Caretaker;

class CaretakerController extends Controller
{
    public function showPageHome()
    {
        return view('caretaker.home');
    }

    public function showPageProfile()
    {
        $user = Auth::user();
        $professions = Profession::get();

        return view('caretaker.profile', ['user' => $user, 'professions' => $professions]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    }

    public function showPageUlasanSaya()
    {
        $reviews = Auth::user()->Caretaker->JobOffers()->with('ReviewUser', 'User')->has('ReviewUser')->get();

        return view('caretaker.ulasan-saya', ['reviews' => $reviews]);
    }

    public function showPageStatusOrder()
    {
        $jobOffers = Auth::user()->Caretaker->JobOffers()->with('User')->get();

        return view('caretaker.status-order', ['jobOffers' => $jobOffers]);
    }

    public function showPageDetailStatusOrder($id)
    {
        $jobOffer = Job_offer::with('User')->find($id);

        return view('caretaker.detail-status-order', ['jobOffer' => $jobOffer]);
    }

    public function requestSalaryStatusOrder($id, Request $request)
    {
        $jobOffer = Job_offer::find($id);
        $jobOffer->update([
            'job_status' => 'ubah gaji',
            'permintaan_gaji_baru' => $request->price
        ]);

        $user = Auth::user();

        Notification::create([
            'notification_type' => 'ubah-gaji',
            'content' => 'Caregiver '.$user->nama_depan.' '.$user->nama_belakang.' meminta perubahan gaji baru',
            'user_id' => $jobOffer->user_id,
            'caretaker_id' => null,
            'url' => route('order-info', $jobOffer->job_id)
        ]);

        return redirect()->route('caretaker.status-order');
    }

    public function rejectedStatusOrder($id)
    {
        $jobOffer = Job_offer::find($id);
        $jobOffer->update([
            'job_status' => 'ditolak'
        ]);

        return redirect()->route('caretaker.status-order');
    }

    public function approvedStatusOrder($id)
    {
        $jobOffer = Job_offer::find($id);
        $jobOffer->update([
            'job_status' => 'diterima'
        ]);

        return redirect()->route('caretaker.status-order');
    }

    public function showPageRiwayatTransaksi()
    {
        $transactions = Auth::user()->Caretaker->JobOffers()->with('Transaction', 'User')->has('Transaction')->whereIn('job_status', ['diterima', 'selesai', 'berlangsung'])->get();

        return view('caretaker.riwayat-transaksi', ['transactions' => $transactions]);
    }

    public function showPageDetailRiwayatTransaksi($id)
    {
        $transaction = Transaction::with('JobOffer.User')->find($id);

        return view('caretaker.detail-riwayat-transaksi', ['transaction' => $transaction]);
    }

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

        return redirect()->route('caretaker.status-order');
    }

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
}