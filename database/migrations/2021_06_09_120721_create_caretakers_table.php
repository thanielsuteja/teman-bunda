<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaretakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caretakers', function (Blueprint $table) {
            $table->id('caretaker_id');
            $table->foreignId('caretaker_user_id');
            $table->bigInteger('NIK');
            $table->tinyInteger('kode_bank'); //baru
            $table->bigInteger('no_rekening_bank');
            // profesi
            $table->string('daerah');
            // cost per hour
            $table->tinyInteger('umur');
            $table->string('pendidikan_terakhir');
            $table->string('agama');
            $table->smallInteger('tinggi_badan');
            $table->smallInteger('berat_badan');
            $table->string('status_kawin');
            $table->text('deskripsi');
            // prof image
            // ktp
            // dokumen vaksin 
            // ijasah terakhir
            // psiko test
            // akta lahir
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
        Schema::dropIfExists('caretakers');
    }
}
