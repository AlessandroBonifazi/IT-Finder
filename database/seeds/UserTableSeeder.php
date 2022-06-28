<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $specs=['Front-End Developer', 'Back-End Developer', 'Full-Stack Developer', 'Middle-tier Developer', 'Mobile Developer', 'DevOps Developer', 'Web Design', 'Game Developer', 'Software Developer', 'Data Scientist Developer', 'Security Developer', 'Desktop Developer', 'Graphics Developer', 'Big Data Developer', 'CRM Developer'];


        //
        for($i=0; $i < 10; $i++){
            $user = new User();
            $user->name = $faker->firstName();
            $user->surname = $faker->lastName();
            $user->user_name = $faker->userName();
            $user->email = $faker->email();
            $user->password = $faker->password();
            $user->cv = $faker->realText($maxNbChars = 20, $indexSize = 1);
            $user->location = $faker->city();
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
                "user_id"=> $faker->numberBetween(1,5),
                "content"=>  $faker->realText($maxNbChars = 50, $indexSize = 1),
                "user_name"=> $faker->userName(),
                "email"=> $faker->email(),
            ]);
            // reviews seed
            $user->reviews()->create([
                "user_id"=> $faker->numberBetween(1,5),
                "content"=>  $faker->realText($maxNbChars = 50, $indexSize = 1),
                "user_name"=> $faker->userName(),
                "valutation"=> $faker->numberBetween(1,5),
            ]);
            // specs seed
            $user->specializations()->create([
                "specialization"=>  $faker->randomElement($specs),
            ]);
        }
    }
}
