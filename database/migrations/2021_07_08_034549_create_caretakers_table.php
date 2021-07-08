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
            $table->string('caretaker_status');
            $table->string('approved');
            $table->foreignId('user_id');
            $table->bigInteger('bank_account');
            $table->bigInteger('kode_bank');
            $table->bigInteger('cost_per_hour');
            $table->tinyInteger('umur'); 
            $table->string('edukasi');
            $table->string('religi');
            $table->tinyInteger('tinggi');
            $table->tinyInteger('berat');
            $table->text('deskripsi_caretaker');
            $table->boolean('pengawasan_kamera');
            $table->boolean('takut_anjing');
            $table->bigInteger('NIK');
            $table->string('dokumen_vaksin_path');
            $table->string('dokumen_ijazah_path');
            $table->string('dokumen_psikotes_path');
            $table->string('dokumen_akta_kelahiran_path');
            $table->decimal('rating_caretaker',38,1)->nullable();
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
