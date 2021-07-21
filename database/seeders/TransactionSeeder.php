<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'transaction_status'    => 'terbayar',
            'job_id'                => '1',
            'transaction_amount'   => '700000',
            'transaction_due'       => '2021-07-14',
            'payment_date'          => '2021-07-12',
            'bank_account'          => '6041067006'
        ]);

        Transaction::create([
            'transaction_status'    => 'terbayar',
            'job_id'                => '2',
            'transaction_amount'   => '1200000',
            'transaction_due'       => '2021-05-01',
            'payment_date'          => '2021-05-02',
            'bank_account'          => '6041055002'
        ]);
    }
}
