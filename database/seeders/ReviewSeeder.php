<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = DB::table('users')->pluck('id');
        $seriesIds = DB::table('series')->pluck('id');

        DB::table('reviews')->insert([
            'comment' => Str::random(60),
            'score' => rand(0, 10),
            'user_id' => $userIds->random(1)[0],
            'serie_id' => $seriesIds->random(1)[0],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
