<?php

use App\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Faker\Provider\Image;
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
        // $imgs = [
        //     'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60',
        //     "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80",
        //     "https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80",
        //     "https://images.unsplash.com/photo-1599566150163-29194dcaad36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80",
        //     "https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDF8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" ,
        //     "https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" ,
        //     "https://images.unsplash.com/photo-1527980965255-d3b416303d12?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" ,
        //     "https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=761&q=80",
        //     "https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80",
        //     "https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=761&q=80",
        // ];

        $imgs = "https://picsum.photos/v2/list?limit=100";
        $imgs = json_decode(file_get_contents($imgs), true);
        //
        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->name = $faker->firstName();
            $user->surname = $faker->lastName();
            $user->user_name = $faker->userName();
            $user->img_path = $imgs[$i]["download_url"];
            $user->email = $faker->email();
            $user->password = $faker->password();
            $user->cv = $faker->realText($maxNbChars = 200, $indexSize = 1);
            $user->location = $faker->city();
            $user->job_experience = $faker->numberBetween(1, 10);
            $user->save();
            // contact seed
            $user->contactInfo()->create([
                "contact_email" => $faker->email(),
                "phone" => $faker->phoneNumber(),
                "linkedin" => $faker->url(),
                "github" => $faker->url(),
                "site" => $faker->url(),
            ]);
            // message seed
            $user->messages()->create([
                "user_id" => $faker->numberBetween(1, 5),
                "content" => $faker->realText($maxNbChars = 50, $indexSize = 1),
                "user_name" => $faker->userName(),
                "email" => $faker->email(),
            ]);
            // reviews seed
            for ($j = 0; $j < $faker->numberBetween(0, 20); $j++) {
                $user->reviews()->create([
                    "content" => $faker->realText(
                        $maxNbChars = 50,
                        $indexSize = 1
                    ),
                    "user_name" => $faker->userName(),
                    "valutation" => $faker->numberBetween(1, 5),
                    // "email" => $faker->email(),
                ]);
            }

            $specializations = Specialization::all();

            for ($j = 0; $j < $faker->numberBetween(1, 3); $j++) {
                $user->specializations()->attach(
                    $specializations
                        ->random(1)
                        ->pluck("id")
                        ->toArray()
                );
            }
            // technology seed
            $technologies = App\Technology::all();

            $user->technologies()->attach(
                $technologies
                    ->random(rand(1, 20))
                    ->pluck("id")
                    ->toArray()
            );
        }
        // $user->all()->each(function ($user) use ($faker) {
        //     $user->update([
        //         "img_path" => $faker->image("app/public/images/users",
        //             200,
        //             200,
        //             "people",
        //             true,
        //             true
        //         ),
        //     ]);
        // });
    }
}
