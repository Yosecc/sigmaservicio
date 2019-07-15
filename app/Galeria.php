<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = "galeria";

    public function vehiculo(){
    	return $this->belongsTo('App\Vehiculo', 'id_vehiculo');
    }
}
