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
            $user->contactInfo()->create([
            "contact_email"=> $faker->email(),
            "phone" => $faker->phoneNumber(),
            "linkedin" => $faker->url(),
            "github" => $faker->url(),
            "site" => $faker->url(),
            ]);

        }
    }
    // public function run()
    // {


    //     $users = [
    //         [
    //            'name' => 'Lucio',
    //            'surname' => 'Melis',
    //            'user_name' => 'luciolucio',
    //            'email' => 'lucio@lucio.it',
    //            'password' => '12345678',
    //            'cv' => 'userCV',
    //            'location' => 'cagliari',
    //            'position' => 'web dev',
    //            'job_experience' => 3,
    //     ]
    // ];

    //     foreach ($users as $user) {
    //         $newUser = new User();
    //         $newUser->name = $user['name'];
    //         $newUser->surname = $user['surname'];
    //         $newUser->user_name = $user['user_name'];
    //         $newUser->email = $user['email'];
    //         $newUser->password = $user['password'];
    //         $newUser->cv = $user['cv'];
    //         $newUser->location = $user['location'];
    //         $newUser->position = $user['position'];
    //         $newUser->job_experience = $user['job_experience'];
    //         $newUser->save();


    //     }



    // }
}
