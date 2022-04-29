<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimeCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anime_id')->constrained('anime')->restrictOnUpdate()->cascadeOnDelete();
            $table->foreignId('character_id')->constrained()->restrictOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('anime_characters');
    }
}
