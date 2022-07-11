<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PromoTableSeeder::class,
            TechnologyTableSeeder::class,
            SpecializationsTableSeeder::class,
            UserTableSeeder::class,
            PromoSeeder::class,
        ]);
    }
}
