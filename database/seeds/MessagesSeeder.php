<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;
use App\User;
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
        for ($i = 0; $i < 5; $i++) {
            $message = new Message();
            $message->user_id = 205;
            $message->content = $faker->realText($maxNbChars = 50, $indexSize = 1);
            $message->user_name = $faker->userName();
            $message->email = $faker->email();
            $message->created_at = $faker->dateTime();
            $message->save();
        }
    }
}
