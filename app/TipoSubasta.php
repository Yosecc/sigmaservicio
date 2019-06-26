<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TipoSubasta extends Model
{
    protected $table = "tipo_subastas";

	public function getFechaInicioAttribute($value){
		return new Carbon($value);
	}
	public function getFechaFinAttribute($value){
		return new Carbon($value);
	}

    public function vehiculos(){
    	return $this->belongsToMany('App\Vehiculo', 'subasta_vehiculo');
    }

    public function pais(){
    	return $this->belongsTo('App\Paises');
    }
}
