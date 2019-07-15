<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public function servicio()
    {
        return $this->hasMany('App\Servicios');
    }
}
