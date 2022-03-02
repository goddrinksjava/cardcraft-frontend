<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')->insert([
            'title' => Str::random(15),
            'synopsis' => Str::random(200),
            'release_date' => Carbon::create('today noon')->subYears(rand(0, 30))->subDays(rand(0, 364)),
            'score' => (rand(0, 1000) / 100),
            'poster_pic_path' => '/media/images/' . Str::random(6),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
