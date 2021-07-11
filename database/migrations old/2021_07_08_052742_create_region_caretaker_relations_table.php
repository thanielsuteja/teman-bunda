<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionCaretakerRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_caretaker_relations', function (Blueprint $table) {
            $table->foreignId('region_id')->constrained('regions')->onDelete('cascade');
            $table->foreignId('caretaker_id')->constrained('caretakers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region_caretaker_relations');
    }
}
