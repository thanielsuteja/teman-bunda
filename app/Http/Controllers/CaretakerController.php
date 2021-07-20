<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job_offer;
use App\Models\Transaction;
use App\Models\Profession;

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
            'estimasi_biaya' => $request->price
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
            'job_status' => 'berlangsung'
        ]);

        return redirect()->route('caretaker.status-order');
    }

    public function showPageRiwayatTransaksi()
    {
        $transactions = Auth::user()->Caretaker->JobOffers()->with('Transaction', 'User')->has('Transaction')->where('job_status', 'diterima')->get();

        return view('caretaker.riwayat-transaksi', ['transactions' => $transactions]);
    }

    public function showPageDetailRiwayatTransaksi($id)
    {
        $transaction = Transaction::with('JobOffer.User')->find($id);

        return view('caretaker.detail-riwayat-transaksi', ['transaction' => $transaction]);
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
        $startDate = date_create('2021-07-14');
        $endDate = date_create('2021-07-15');

        $days = [];
        for ($date = $startDate; $date <= $endDate; $date->modify('+1 day')) {
            $dayNumber = $date->format('N');
            $days[$dayNumber] = $dayNames[$dayNumber] ?? '';
        }

        return $days;
    }

    public function calculateEstimation(Request $request)
    {
        $days = [1, 2];
        $cost = 50000;
        $total = 0;

        $startDate = date_create('2021-07-14');
        $endDate = date_create('2021-07-15');

        for ($date = $startDate; $date <= $endDate; $date->modify('+1 day')) {
            if (in_array($date->format('N'), $days)) {
                $total += $cost;
            }
        }

        return $total;
    }
}
