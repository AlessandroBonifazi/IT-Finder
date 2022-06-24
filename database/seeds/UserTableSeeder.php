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
    public function run()
    {
        //
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        //     'surname' => Str::random(10),
        //     'location' => Str::random(10),
        //     'position' => Str::random(10),
        //     'cv' => Str::random(10),
        //     'job-experience' => Str::random(10),

        // ]);

        $users = [
            [
               'name' => 'Lucio',  
               'surname' => 'Melis',  
               'user_name' => 'luciolucio',  
               'email' => 'lucio@lucio.it',  
               'password' => '12345678',  
               'cv' => 'userCV',  
               'location' => 'cagliari',  
               'position' => 'web dev',  
               'job_experience' => 3,  
        ]
    ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->surname = $user['surname'];
            $newUser->user_name = $user['user_name'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->cv = $user['cv'];
            $newUser->location = $user['location'];
            $newUser->position = $user['position'];
            $newUser->job_experience = $user['job_experience'];
            $newUser->save();


        }



    }
}
