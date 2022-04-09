<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seriesIds = DB::table('series')->pluck('id');

        DB::table('episodes')->insert([
            'number' => rand(1, 100),
            'release_date' => Carbon::create('today noon')->subYears(rand(0, 30))->subDays(rand(0, 364)),
            'video_path' => '/media/videos/' . Str::random(6),
            'serie_id' => $seriesIds->random(1)[0],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
