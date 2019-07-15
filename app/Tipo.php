<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = "tipo";

    public function vehiculos(){
    	return $this->hasMany('App\Vehiculo', 'id_tipo');
    }
}
