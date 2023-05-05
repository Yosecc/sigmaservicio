<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Comun;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        $comun= Comun::all();

        foreach ($comun as $item) {
            if ($item->name == 'title') {
              $title = $item->content;
            }
            if ($item->name == 'telefono') {
              $telefono = $item->content;
            }
            if ($item->name == 'email') {
              $email = $item->content;
            }
            if ($item->name == 'direccion') {
              $direccion = $item->content;
            }
            if ($item->name == 'ubicacion') {
              $ubicacion = $item->content;
            }
            if ($item->name == 'facebook') {
              $facebook = $item->content;
            }
            if ($item->name == 'twitter') {
              $twitter = $item->content;
            }
            if ($item->name == 'instagram') {
              $instagram = $item->content;
            }
            if ($item->name == 'descripcion') {
              $descripcion = $item->content;
            }
            if ($item->name == 'meta_description') {
              $meta_description = $item->content;
            }
             if ($item->name == 'meta_name') {
              $meta_name = $item->content;
            }
             if ($item->name == 'meta_url') {
              $meta_url = $item->content;
            }
             if ($item->name == 'politica_privacidad') {
              $politica_privacidad = $item->content;
            }

            if ($item->name == 'adress1') {
                $adress1 = $item->content;
              }

              if ($item->name == 'adress2') {
                $adress2 = $item->content;
              }

            
          }
        View::share([   'title'=>$title
                        ,'telefono'=>$telefono
                        ,'email'=>$email
                        ,'direccion'=>$direccion
                        ,'ubicacion'=>$ubicacion
                        ,'facebook'=>$facebook
                        ,'twitter'=>$twitter
                        ,'instagram'=>$instagram
                        ,'descripcion'=>$descripcion
                        ,'meta_description'=>$meta_description
                        ,'meta_name'=>$meta_name
                        ,'meta_url'=>$meta_url
                        ,'politica_privacidad'=>$politica_privacidad
                        ,'adress1'=>$adress1
                        ,'adress2'=>$adress2
                    ]);

                        // dd($adress1);
        //  Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
