<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dano extends Model
{
    protected $table = "danos";

    public function vehiculo(){
    	return $this->belongsTo('App\Vehiculo', 'id_vehiculo');
    }
}
