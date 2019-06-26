<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
        for ($i=0; $i < 50; $i++) {
          \DB::table('sliders')->insert(array(
                 'titulo' => $faker->firstNameFemale,
                 'contenido' => $faker->text($maxNbChars = 200),
                 'publico'  => $faker->boolean,
                 'posicion'  => $faker->randomDigit,
                 'created_at' => date('Y-m-d H:m:s'),
                 'updated_at' => date('Y-m-d H:m:s'),
                 'url_imagen' => $faker->imageUrl($width = 640, $height = 480, 'cats')
          ));
        }
    }
}
