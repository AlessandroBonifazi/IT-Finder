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
    public function run()
    {
        //
        $users = User::all()->random(30);
        $randomPromoId = random_int(1,3);
        foreach ($users as $user) {
            $user->promos()->sync($randomPromoId);
        }
    }
}
