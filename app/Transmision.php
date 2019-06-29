<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transmision extends Model
{
    protected $table = "transmision";

    public function vehiculo(){
    	return $this->hasMany('App\Vehiculo', 'id_transmision');
    }
}
