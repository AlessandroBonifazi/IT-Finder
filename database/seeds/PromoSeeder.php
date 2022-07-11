<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Provider\Image;
use App\User;
use App\Promo;
use Carbon\Carbon;

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
            $randomPromoId = $faker->numberBetween(1, 3);
            $endDate = Carbon::now()->addDays(30);
            $user->promos()->attach($randomPromoId, [
                "endDate" => $endDate, // ! be constant with variables names, if all the columns have name in snake_case, then use snake_case for all the new columns too
            ]);
        }
    }
}
