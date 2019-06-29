<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    protected $table = "combustible";

	// Modelos
    public function vehiculos(){
    	return $this->hasMany('App\Vehiculo', 'id_combustible');
    }
}
