<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Message;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Seeder per messaggi a specifico user id !!!
    public function run(Faker $faker)
    {
        //
        for ($i = 0; $i < 10; $i++) {
            $message = new Message();
            // specific id      \v/
            $message->user_id = 114;
            $message->content = $faker->realText($maxNbChars = 50, $indexSize = 1);
            $message->user_name = $faker->userName();
            $message->email = $faker->email();
            $message->created_at = $faker->dateTime();
            $message->save();
        }
    }
}
