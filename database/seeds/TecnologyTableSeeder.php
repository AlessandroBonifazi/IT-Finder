<?php

use Illuminate\Database\Seeder;
use App\Tecnology;

class TecnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tecnologies = [
            [
               'name' => 'HTML',  
               'logo' => 'https://icon-library.com/images/icon-html5/icon-html5-7.jpg',   
            ],
            [
                'name' => 'CSS',  
                'logo' => 'https://www.ambrix.net/wp-content/uploads/2019/05/css-118-569410.png',   
            ],
            [
                'name' => 'JS',  
                'logo' => 'https://avatars.githubusercontent.com/u/19951984?v=4',   
            ],
        ];    

        foreach ($tecnologies as $tecnology) {
            $newTecnology = new Tecnology();
            $newTecnology->name = $tecnology['name'];
            $newTecnology->logo = $tecnology['logo'];
            $newTecnology->save();
        }
    }
}
