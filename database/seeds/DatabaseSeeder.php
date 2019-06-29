<?php

use Illuminate\Database\Seeder;
use App\Sliders;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(RoleTableSeeder::class);
      $this->call(UserTableSeeder::class);
      $this->call(ComunsTableSeeder::class);
    for ($i=1; $i < 15; $i++) { 
      $slidercreate = new Sliders();

      $slidercreate->titulo = 'prueba'.$i;
      $slidercreate->texto ='prueba'.$i;
      $slidercreate->posicion = $i;
      $slidercreate->imagen ='public/slider/imagenes/prueba4-20190629.jpg';
      $slidercreate->publico = 1;
      $slidercreate->save();

    }
    }
}
