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

    public function VerifyTransaction(Request $request ,$id){

        $update = Transaction::find($id)->update([
            'transaction_status' => $request->transaction_status,
            'payment_date' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('adm.transactions')->with('success','Payment Verified');
    }
}
