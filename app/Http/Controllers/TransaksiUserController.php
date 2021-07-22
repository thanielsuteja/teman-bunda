<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransaksiUserController extends Controller
{
    public function showTransaksi() {
        $transaction = Transaction::get();

        return view('user.transaksi', ['transaction' => $transaction]);
    }

    public function showInfoTransaksi($id)
    {
        $transaction = Transaction::where('transaction_id',$id)->first();

        return view('user.transaksi-info', ['transaction' => $transaction]);
    }
}
