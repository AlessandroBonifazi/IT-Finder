<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Provider\Image;
use App\User;
use App\Promo;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $users = User::all()->random(10);
        foreach ($users as $user) {
            $randomPromoId = $faker->numberBetween(1,3);
            $user->promos()->sync($randomPromoId);
        }
    }
}
