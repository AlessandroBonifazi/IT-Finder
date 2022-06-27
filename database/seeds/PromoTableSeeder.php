<?php

use Illuminate\Database\Seeder;
use App\Promo;

class PromoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $promos = [
            [
               'type' => 'gold',
               'duration' => 1,
               'price' => 2.9
            ],
            [
                'type' => 'premium',
                'duration' => 7,
                'price' => 10.9
             ],
             [
                'type' => 'pro',
                'duration' => 30,
                'price' => 30.9
             ],
        ];

        foreach ($promos as $promo) {
            $newPromo = new Promo();
            $newPromo->type = $promo['type'];
            $newPromo->duration = $promo['duration'];
            $newPromo->price = $promo['price'];
            $newPromo->save();
        }
    }
}
