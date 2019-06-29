<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
     protected $table = "modelos";

     public function vehiculos(){
    	return $this->hasMany('App\Vehiculo', 'id_modelo');
    }
}
