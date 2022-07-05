<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i = 0; $i < 21; $i++) {
            $review = new Review();
            // specific id      \v/
            $review->user_id = 115;
            $review->content = $faker->realText($maxNbChars = 50, $indexSize = 1);
            $review->user_name = $faker->userName();
            $review->created_at = $faker->dateTime();
            $review->valutation = $faker->numberBetween(1, 5);
            $review->save();
        }
    }
}
