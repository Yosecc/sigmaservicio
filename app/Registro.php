<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Registro extends Authenticatable
{
    protected $table = "registro";

    // Relaciones
    
    public function pais(){
        return $this->belongsTo('App\Paises', 'cod_pais');
    }

    public function pagos(){
    	return $this->hasMany('App\Pagos', 'id_registro');
    }

}
