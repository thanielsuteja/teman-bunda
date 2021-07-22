<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransaksiCaretakerController extends Controller
{
    public function showPageRiwayatTransaksi()
    {
        $job = Auth::user()->Caretaker->JobOffers()->with('Transaction', 'User')->has('Transaction')->whereIn('job_status', ['diterima', 'selesai', 'berlangsung'])->orderBy('created_at', 'desc')->get();

        return view('caretaker.riwayat-transaksi', ['job' => $job]);
    }

    public function showPageDetailRiwayatTransaksi($id)
    {
        $transaction = Transaction::with('JobOffer.User')->find($id);

        return view('caretaker.detail-riwayat-transaksi', ['transaction' => $transaction]);
    }
}
