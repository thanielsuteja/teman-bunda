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
        Schema::create('Caretakers', function (Blueprint $table) {
            $table->id('caretaker_id');
            $table->boolean('caretaker_status');
            $table->string('approved');
            $table->foreignId('user_id');
            $table->string('kode_bank', 3);
            $table->bigInteger('bank_account');
            $table->integer('cost_per_hour');
            $table->tinyInteger('umur'); 
            $table->string('edukasi');
            $table->string('religi');
            $table->smallInteger('tinggi');
            $table->smallInteger('berat');
            $table->text('deskripsi_caretaker');
            $table->boolean('pengawasan_kamera');
            $table->boolean('takut_anjing');
            $table->bigInteger('NIK');
            $table->string('dokumen_vaksin_path')->nullable();
            $table->string('dokumen_ijazah_path')->nullable();
            $table->string('dokumen_psikotes_path')->nullable();
            $table->string('dokumen_akta_kelahiran_path')->nullable();
            $table->decimal('rating_caretaker', $precision = 2, $scale = 1)->nullable();
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
