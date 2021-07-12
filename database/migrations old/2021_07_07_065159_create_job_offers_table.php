<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Job_offers', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_status'); // menunggu ditolak ubahgaji berlangsung selesai
            $table->foreignId('user_id');
            $table->foreignId('caretaker_id');
            $table->string('judul_pekerjaan');
            $table->string('deskripsi_pekerjaan');
            $table->date('tanggal_masuk');
            $table->date('tanggal_berakhir');
            $table->time('jam_masuk', 0);
            $table->time('jam_berakhir', 0);
            $table->boolean('wd_1');
            $table->boolean('wd_2');
            $table->boolean('wd_3');
            $table->boolean('wd_4');
            $table->boolean('wd_5');
            $table->boolean('wd_6');
            $table->boolean('wd_7');
            $table->integer('estimasi_biaya');
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
        Schema::dropIfExists('Job_offers');
    }
}
