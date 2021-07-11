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
            $table->boolean('caretaker_status'); //available unavailable
            $table->boolean('approved');
            $table->foreignId('user_id');
            $table->string('kode_bank', 3);
            $table->bigInteger('bank_account');
            $table->integer('cost_per_hour');
            $table->tinyInteger('umur');
            $table->string('edukasi');
            $table->string('religi');
            $table->smallInteger('tinggi');
            $table->smallInteger('berat');
            // $table->string('status_kawin'); //tidak perlu
            $table->text('deskripsi_caretaker');
            $table->boolean('pengawasan_kamera'); //setuju tidaksetuju
            $table->boolean('takut_anjing'); //takut tidaktakut
            $table->bigInteger('NIK');
            $table->string('dokumen_vaksin')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('dokumen_psikotes')->nullable();
            $table->string('akte_lahir')->nullable();
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
        Schema::dropIfExists('Caretakers');
    }
}
