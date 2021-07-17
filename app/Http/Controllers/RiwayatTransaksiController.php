<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class RiwayatTransaksiController extends Controller
{
    public function showTransaksi() {
        $transaction = Transaction::get();

        return view('user.transaksi', ['transaction' => $transaction]);
    }
}
