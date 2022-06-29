<?php

use Illuminate\Database\Seeder;
use App\Technology;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $technologies = [
            [
                "name" => "HTML",
                "logo" =>
                    "https://icon-library.com/images/icon-html5/icon-html5-7.jpg",
            ],
            [
                "name" => "CSS",
                "logo" =>
                    "https://www.ambrix.net/wp-content/uploads/2019/05/css-118-569410.png",
            ],
            [
                "name" => "JS",
                "logo" =>
                    "https://avatars.githubusercontent.com/u/19951984?v=4",
            ],
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology["name"];
            $newTechnology->logo = $technology["logo"];
            $newTechnology->save();
        }
    }
}
