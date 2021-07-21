<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    //
    public function AllTransactions(){

        $transactions = Transaction::latest()->paginate(5);
        return view('admin.transaction.transactions', compact('transactions') );
    }

    public function FinishTransaction($id)
    {
        $update = Transaction::find($id)->update([
            'transaction_status' => 'terbayar',
            'payment_date' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    
        return Redirect()->route('adm.transactions')->with('success','Payment Finished');
    }

    public function VerifyTransaction($id){

        $update = Transaction::find($id)->update([
            'transaction_status' => 'terverifikasi',
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('adm.transactions')->with('success','Payment Verified');
    }
}
