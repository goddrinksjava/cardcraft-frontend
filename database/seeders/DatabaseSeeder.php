<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeriesSeeder::class,
            UserSeeder::class,
            EpisodeSeeder::class,
            GenreSeeder::class,
            ReviewSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
