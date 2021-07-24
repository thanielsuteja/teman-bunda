<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('password');
            $table->string('role');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('nomor_telepon',16)->unique();
            $table->string('email',100)->unique();
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('profile_img_path')->nullable();
            $table->string('dokumen_ktp_path');
            $table->bigInteger('virtual_account');
            $table->decimal('rating_user', 2, 1);
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
        Schema::dropIfExists('users');
    }
}
