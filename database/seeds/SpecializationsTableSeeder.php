<?php

use Illuminate\Database\Seeder;

use App\Specialization;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specs = [
            "Front-End Developer",
            "Back-End Developer",
            "Full-Stack Developer",
            "Middle-tier Developer",
            "Mobile Developer",
            "DevOps Developer",
            "Web Design",
            "Game Developer",
            "Software Developer",
            "Data Scientist Developer",
            "Security Developer",
            "Desktop Developer",
            "Graphics Developer",
            "Big Data Developer",
            "CRM Developer",
        ];

        foreach ($specs as $spec) {
            Specialization::create([
                "specialization" => $spec,
            ]);
        }
    }
}
