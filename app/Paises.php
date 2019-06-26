<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = "paises";

    public function usuarios(){
    	return $this->hasMany('App\Registro', 'cod_pais');
    }
}
