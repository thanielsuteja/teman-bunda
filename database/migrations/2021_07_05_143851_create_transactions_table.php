<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->string('transaction_status');
            $table->foreignId('job_id');
            $table->integer('transaction_ammount');
            $table->date('transaction_due');
            $table->date('payment_date')->nullable();
            $table->integer('bank_account');
            $table->integer('virtual_account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
