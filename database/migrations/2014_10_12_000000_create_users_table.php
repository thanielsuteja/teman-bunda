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
            $table->string('nama');
            $table->string('peran_user');
            $table->string('password');
            $table->string('no_telepon')->unique();
            $table->string('email')->unique();
            $table->text('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->timestamp('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->bigInteger('virtual_account');
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
