<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertGenres extends Migration
{
    private $genres = [
        'Action',
        'Adventure',
        'Fantasy',
        'Psychological',
        'Drama',
        'Comedy',
        'Romance'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('genres')->insert(array_map(
            function ($genre) {
                return array('name' => $genre);
            },
            $this->genres
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('roles')->whereIn('name', $this->genres)->delete();
    }
}
