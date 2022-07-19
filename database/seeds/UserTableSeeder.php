<?php

use App\User;
use Carbon\Carbon;
use App\Specialization;
use Faker\Provider\Image;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $imgs = "https://picsum.photos/v2/list?limit=100";
        $imgs = json_decode(file_get_contents($imgs), true);

        $teamDatas = [
            [
                "name" => "Gioia",
                "surname" => "Ascari",
                "user_name" => "gioiascari",
                "img_path" =>
                    "https://media-exp2.licdn.com/dms/image/C4D03AQEuzZrF-mIoqA/profile-displayphoto-shrink_800_800/0/1571049815915?e=1663200000&v=beta&t=c2Is8fG4kD3L_lTl3T0XpzCnq6HKWYRJ_ScMvHT0lsI",
                "email" => "gioia.ascari96@gmail.com",
                "password" => "12345678",
                "location" => "Venezia",
                "job_experience" => 1,
                "cv" => 'Ciao sono Gioia del team 3. Sono aperta a qualsaisi posizione lavorativa.
        Sono una persona solare ma nei momenti difficili sono intrattabile. Mi piace imparare ogni giorno cose nuove.',
                "contact_email" => "gioia.ascari96@gmail.com",
                "linkedin" =>
                    "https://www.linkedin.com/in/gioia-ascari-978199196/",
                "phone" => "1234566789",
                "github" => "https://github.com/gioiascari",
                "site" => "/",
                "techs" => [
                    23,
                    32,
                    58,
                    57,
                    72,
                    76,
                    84,
                    95,
                    114,
                    139,
                    166,
                    165,
                    74,
                    4,
                    113,
                ],
                "specializations" => [3, 13],
            ],

            [
                "name" => "Alessandro",
                "surname" => "Bonifazi",
                "user_name" => "ale",
                "img_path" =>
                    "https://media-exp2.licdn.com/dms/image/C4E03AQHIREhCt-0PVQ/profile-displayphoto-shrink_800_800/0/1656463994837?e=1663200000&v=beta&t=HJIN6Dh3Gtprc6ohqdDzEPBRFi5yS52BCr5GMxKGAnc",
                "email" => "alessandrobonifazi21@gmail.com",
                "password" => "12345678",
                "location" => "Roma",
                "job_experience" => 1,
                "cv" =>
                    "Ciao sono Alessandro del team 3. Sono aperto a qualsaisi posizione lavorativa. Mi piace imparare ogni giorno cose nuove.",
                "contact_email" => "alessandrobonifazi21@gmail.com",
                "linkedin" =>
                    "https://www.linkedin.com/in/alessandro-bonifazi-0693b6217/",
                "phone" => "1234566789",
                "github" => "https://github.com/AlessandroBonifazi",
                "site" => "/",
                "techs" => [23, 32, 58, 57, 72, 76, 84, 95, 114, 139, 166, 165],
                "specializations" => [3],
            ],

            [
                "name" => "Mykhaylo",
                "surname" => "Tymofyeyev ",
                "user_name" => "Mykhaylo",
                "img_path" =>
                    "https://media-exp2.licdn.com/dms/image/C4E03AQFch0TTXJFITA/profile-displayphoto-shrink_800_800/0/1655739170035?e=1663200000&v=beta&t=gXVo2djbA5Rlq4oLiD5ruZFdoBfHFtY_00DxTCCCLjc",
                "email" => "mykhaylo.tymofyeyev@gmail.com",
                "password" => "12345678",
                "location" => "Milano",
                "job_experience" => 1,
                "cv" =>
                    "Sono fortemente interessato dello sviluppo web, principalmente lato client. Per costruire conoscenze di base solide ho preso parte ad un corso di FullStack Web Developer proposto da Boolean Careers Italia.",
                "contact_email" => "mykhaylo.tymofyeyev@gmail.com",
                "linkedin" => "https://www.linkedin.com/in/tymofyeyev/",
                "phone" => "1234566789",
                "github" => "https://github.com/sargon17",
                "site" => "https://sargon17.github.io/my-portfolio/",
                "techs" => [23, 32, 58, 57, 72, 76, 84, 95, 114, 139, 166, 165],
                "specializations" => [3],
            ],

            [
                "name" => "Erik",
                "surname" => "Schievenin",
                "user_name" => "Eriksioxx",
                "img_path" =>
                    "https://media-exp2.licdn.com/dms/image/C4E03AQFjzoWfGcmcHw/profile-displayphoto-shrink_200_200/0/1657558728787?e=1663200000&v=beta&t=H5UhFfydXqDORHA9DhAjqGDJiljC3-y2kEPNYQVKJKU",
                "email" => "erik.schievenin@gmail.com",
                "password" => "12345678",
                "location" => "Treviso",
                "job_experience" => 1,
                "cv" =>
                    "Ciao ragazzi, sono Erik del team 3, Sono un ragazzo intraprendente che si è cimentato in diversi campi lavorativi, realizzando negli anni importanti progetti in ambito artistico e multiculturale.",
                "contact_email" => "erik.schievenin@gmail.com",
                "linkedin" =>
                    "https://www.linkedin.com/in/erik-schievenin-8971256b",
                "phone" => "3469607521",
                "github" => "https://github.com/Eriksioxx",
                "site" => "/",
                "techs" => [23, 32, 58, 57, 72, 76, 84, 95, 114, 139, 166, 165],
                "specializations" => [3, 13],
            ],

            [
                "name" => "Robin",
                "surname" => "Costanzo",
                "user_name" => "Rob",
                "img_path" =>
                    "https://media-exp2.licdn.com/dms/image/C4E03AQHLPbL7ghElsA/profile-displayphoto-shrink_800_800/0/1643759733442?e=1663200000&v=beta&t=QnDJp5bWKW2_OevMmjXTFxsdo3ZVyuEXHwZD0dBqDyo",
                "email" => "robin.costanzo@gmail.com",
                "password" => "12345678",
                "location" => "Napoli",
                "job_experience" => 6,
                "cv" =>
                    "Ciao ragazzi, sono Robin del team 3, Sono un ragazzo intraprendente che si è cimentato in diversi campi lavorativi.",
                "contact_email" => "robin.costanzo@gmail.com",
                "linkedin" =>
                    "https://www.linkedin.com/in/robin-costanzo-0502a11b9/",
                "phone" => "3469607521",
                "github" => "https://github.com/Robin9800",
                "site" => "/",
                "techs" => [23, 32, 58, 57, 72, 76, 84, 95, 114, 139, 166, 165],
                "specializations" => [3],
            ],

            [
                "name" => "Antonio",
                "surname" => "Iorio",
                "user_name" => "Dev Antoine",
                "img_path" =>
                    "https://media-exp2.licdn.com/dms/image/C4E03AQEWjb7VtNX91w/profile-displayphoto-shrink_800_800/0/1655661588133?e=1663200000&v=beta&t=rB3XO1T3JLPheAqUinwMySWxMvCGzXweTRDfH5xx73w",
                "email" => "antonio.iorio@gmail.com",
                "password" => "12345678",
                "location" => "Cosenza",
                "job_experience" => 1,
                "cv" =>
                    "Ciao ragazzi, son Antoine del team 3, Son un ragazzo intraprendente che si è cimentato in diversi campi lavorativi.",
                "contact_email" => "antonio.iorio@gmail.com",
                "linkedin" =>
                    "https://www.linkedin.com/in/antonio-iorio-8954bb242/",
                "phone" => "3469607521",
                "github" => "https://github.com/antonioiorio94",
                "site" => "/",
                "techs" => [23, 32, 58, 57, 72, 76, 84, 95, 114, 139, 166, 165],
                "specializations" => [3],
            ],
        ];

        foreach ($teamDatas as $teamData) {
            $teamUser = new User();
            $teamUser->name = $teamData["name"];
            $teamUser->surname = $teamData["surname"];
            $teamUser->user_name = $teamData["user_name"];
            $teamUser->img_path = $teamData["img_path"];
            $teamUser->email = $teamData["email"];
            $teamUser->password = Hash::make($teamData["password"]);
            $teamUser->cv = $teamData["cv"];
            $teamUser->location = $teamData["location"];
            $teamUser->job_experience = $teamData["job_experience"];
            $teamUser->save();

            $teamUser->contactInfo()->create([
                "contact_email" => $teamData["contact_email"],
                "phone" => $teamData["phone"],
                "linkedin" => $teamData["linkedin"],
                "github" => $teamData["github"],
                "site" => $teamData["site"],
            ]);

            $promoId = 3;
            $endDate = Carbon::now()->addDays(30);
            $teamUser->promos()->attach($promoId, [
                "endDate" => $endDate, // ! be constant with variables names, if all the columns have name in snake_case, then use snake_case for all the new columns too
            ]);

            //specializations
            foreach ($teamData["specializations"] as $specialization) {
                $teamUser->specializations()->attach($specialization);
            }
            //techs
            foreach ($teamData["techs"] as $tech) {
                $teamUser->technologies()->attach($tech);
            }
        }
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
