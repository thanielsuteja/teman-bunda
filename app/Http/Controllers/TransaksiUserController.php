<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransaksiUserController extends Controller
{
    public function showTransaksi() {
        $transaction = Transaction::where('transaction_id',);

        $transactions = Auth::user()->JobOffers->has('Transaction')->orderBy('created_at', 'desc')->get();

        return view('user.transaksi', ['transaction' => $transactions]);
    }

    public function showInfoTransaksi($id)
    {
        $transaction = Transaction::where('transaction_id',$id)->first();

        return view('user.transaksi-info', ['transaction' => $transaction]);
    }
}
