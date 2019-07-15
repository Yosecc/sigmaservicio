<?php

use Illuminate\Database\Seeder;
use App\Comun;
class ComunsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comun = new Comun();
        $comun->name = 'politica_privacidad';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'telefono';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'email';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'direccion';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'ubicacion';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'facebook';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'twitter';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'instagram';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'descripcion';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'meta_description';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'meta_name';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'meta_url';
        $comun->id_user = '0';
        $comun->save();

        $comun = new Comun();
        $comun->name = 'title';
        $comun->id_user = '0';
        $comun->save();

         $comun = new Comun();
        $comun->name = 'video';
        $comun->id_user = '0';
        $comun->save();

    }
}
