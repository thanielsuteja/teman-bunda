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
        $transaction = Transaction::find($id);
        $transaction->update([
            'transaction_status' => 'terbayar',
            'payment_date' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $job = Job_offer::find($transaction->job_id);

        $job->update([
            'job_status' => 'berlangsung',
        ]);

        Notification::create([
            'notification_type' => 'Pembayaran Berhasil',
            'content' => 'Pembayaran untuk judul \''.$job->judul_pekerjaan.'\' telah berhasil. Jangan lupa untuk menekan \'Selesai\' apabila sudah selesai',
            'user_id' => $job->user_id,
            'caretaker_id' => null,
            'url' => route('order-info', $job->job_id)
        ]);

        Notification::create([
            'notification_type' => 'Pengguna Telah Melakukan Pembayaran',
            'content' => 'Order untuk judul \''.$job->judul_pekerjaan.'\' terverifikasi. Periksa ulang informasi waktu dan tempat Order',
            'user_id' => null,
            'caretaker_id' => $job->caretaker_id,
            'url' => route('caretaker.detail-order', $job->job_id)
        ]);
    
        return Redirect()->route('adm.transactions')->with('success','Payment Finished');
    }

    public function VerifyTransaction($id){

        $transaction = Transaction::find($id);

        $transaction->update([
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
