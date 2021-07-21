<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Transaction;
use App\Models\Notification;
use App\Models\Job_offer;

class TransactionController extends Controller
{
    //
    public function AllTransactions(){

        $transactions = Transaction::latest()->paginate(5);
        return view('admin.transaction.transactions', compact('transactions') );
    }

    public function FinishTransaction($id)
    {
        $transaction = Transaction::find($id)->update([
            'transaction_status' => 'terbayar',
            'payment_date' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Job_offer::where('job_id', $transaction->job_id)->update([
            'job_status' => 'berlangsung',
        ]);
    
        return Redirect()->route('adm.transactions')->with('success','Payment Finished');
    }

    public function VerifyTransaction($id){

        $transaction = Transaction::find($id)->update([
            'transaction_status' => 'terverifikasi',
            'updated_at' => Carbon::now()
        ]);

        $job = Job_offer::find($transaction->job_id);

        Notification::create([
            'notification_type' => 'Uang Terkirim ke Rekeningmu',
            'content' => 'Sejumlah Rp'.$transaction->transaction_amount*(95/100).',00 telah dikirim ke rekeningmu.',
            'user_id' => null,
            'caretaker_id' => $job->caretaker_id,
            'url' => route('caretaker.detail-riwayat-transaksi', $transaction->transaction_id),
        ]);

        return Redirect()->route('adm.transactions')->with('success','Payment Verified');
    }
}
