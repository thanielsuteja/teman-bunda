<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionCaretakerRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession_caretaker_relations', function (Blueprint $table) {
            $table->foreignId('profession_id')->references('profession_id')->on('professions')->onDelete('cascade');
            $table->foreignId('caretaker_id')->references('caretaker_id')->on('caretakers')->onDelete('cascade');
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
        Schema::dropIfExists('profession_caretaker_relations');
    }
}
