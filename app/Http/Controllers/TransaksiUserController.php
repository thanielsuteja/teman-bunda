<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Job_offer;
use Illuminate\Queue\Events\JobFailed;

class TransaksiUserController extends Controller
{
    public function showTransaksi() {
        // $transaction = Transaction::where('transaction_id',);

        $jobs = Auth::user()->JobOffers()->with('Transaction','Caretaker')->has('Transaction')->orderBy('created_at', 'desc')->get();

        return view('user.transaksi', ['job' => $jobs]);
    }

    public function showInfoTransaksi($id)
    {
        $transaction = Transaction::where('transaction_id',$id)->first();

        return view('user.transaksi-info', ['transaction' => $transaction]);
    }
}
