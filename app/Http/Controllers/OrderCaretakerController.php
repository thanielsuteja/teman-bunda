<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\Job_offer;
use App\Models\User;
use App\Models\Transaction;

class OrderCaretakerController extends Controller
{
    public function showPageOrder()
    {
        $jobOffers = Auth::user()->Caretaker->JobOffers()->with('User')->orderBy('created_at', 'desc')->get();

        return view('caretaker.order', ['jobOffers' => $jobOffers]);
    }

    public function showPageDetailOrder($id)
    {
        $jobOffer = Job_offer::with('User')->find($id);

        return view('caretaker.detail-order', ['jobOffer' => $jobOffer]);
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
            'notification_type' => 'Permintaan Perubahan Gaji',
            'content' => 'Caregiver '.$user->nama_depan.' '.$user->nama_belakang.' meminta perubahan gaji baru',
            'user_id' => $jobOffer->user_id,
            'caretaker_id' => null,
            'url' => route('order-info', $jobOffer->job_id)
        ]);

        return redirect()->route('caretaker.order');
    }

    public function rejectedStatusOrder($id)
    {
        $jobOffer = Job_offer::find($id);
        $jobOffer->update([
            'job_status' => 'ditolak'
        ]);

        $user = Auth::user();

        Notification::create([
            'notification_type' => 'Penawaran Kerja Ditolak',
            'content' => 'Penawaran kerja untuk '.$user->nama_depan.' '.$user->nama_belakang.' telah ditolak. Mungkin Caregiver belum cocok.',
            'user_id' => $jobOffer->user_id,
            'caretaker_id' => null,
            'url' => route('order-info', $jobOffer->job_id)
        ]);

        return redirect()->route('caretaker.order');
    }

    public function approvedStatusOrder($id)
    {
        $jobOffer = Job_offer::find($id);

        $jobOffer->update([
            'job_status' => 'diterima',
        ]);
        $caretaker = $jobOffer->Caretaker;

        $user = User::find($jobOffer->user_id);

        $transaction = Transaction::create([
            'transaction_status' => 'menunggu',
            'job_id' => $jobOffer->job_id,
            'transaction_amount' => $jobOffer->estimasi_biaya,
            'transaction_due' => date('Y-m-d', strtotime('+1 days')),
            'bank_account' => $caretaker->bank_account,
            'virtual_account' => $user->virtual_account,
        ]);

        $user = Auth::user();

        Notification::create([
            'notification_type' => 'Lakukan Pembayaran',
            'content' => 'Penawaran kerja untuk '.$user->nama_depan.' '.$user->nama_belakang.' telah diterima. Segera lakukan pembayaran.',
            'user_id' => $jobOffer->user_id,
            'caretaker_id' => null,
            'url' => route('info-transaksi', $transaction->transaction_id),
        ]);

        return redirect()->route('caretaker.order');
    }
}
