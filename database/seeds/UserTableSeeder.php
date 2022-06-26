<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\User;
use App\Message;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $position=['Front-End', 'Back-End', 'Full-Stack', 'Developer', 'App Developer', 'Web Design'];


        //
        for($i=0; $i < 2; $i++){
            $user = new User();
            $user->name = $faker->firstName();
            $user->surname = $faker->lastName();
            $user->user_name = $faker->userName();
            $user->email = $faker->email();
            $user->password = $faker->password();
            $user->cv = $faker->realText($maxNbChars = 20, $indexSize = 1);
            $user->location = $faker->city();
            $user->position = $faker->randomElement($position);
            $user->job_experience = $faker->numberBetween(1,10);
            $user->save();
            // contact seed
            $user->contactInfo()->create([
            "contact_email"=> $faker->email(),
            "phone" => $faker->phoneNumber(),
            "linkedin" => $faker->url(),
            "github" => $faker->url(),
            "site" => $faker->url(),
            ]);
            // message seed
            $user->messages()->create([
                "user_id"=> $faker->numberBetween(1,2),
                "content"=>  $faker->realText($maxNbChars = 50, $indexSize = 1),
                "user_name"=> $faker->userName(),
                "email"=> $faker->email(),
            ]);
        }
    }
}
