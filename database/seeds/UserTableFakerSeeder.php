<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;


class UserTableFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for($i=0; $i < 5; $i++){
            $user = new User();
            $user->name = $faker->firstName();
            // $user->surname = $faker->lastName();
            // $user->user_name = $faker->user_name;
            $user->email = $faker->email();
            $user->password = $faker->password();
            $user->cv = $faker->realText($maxNbChars = 20, $indexSize = 1);
            $user->location = $faker->city();
            // $user->position = $faker->position;
            $user->job_experience = $faker->numberBetween(1,10);
            $user->save();
            $user->contactInfo()->create([
            "contact_email"=> $faker->email(),
            "phone" => $faker->phone(),
            "linkedin" => $faker->url(),
            "github" => $faker->url(),
            "site" => $faker->url(),
            ]);

        }
    }
}
