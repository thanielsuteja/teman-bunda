<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class InfoTransaksiController extends Controller
{
    public function showInfoTransaksi($id)
    {
        $transaction = Transaction::where('transaction_id',$id)->first();

        return view('user.transaksi-info', ['transaction' => $transaction]);
    }
}
