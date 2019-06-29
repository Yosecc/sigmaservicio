<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table = "pagos";

	// Modelos
	
    public function registro(){
    	return $this->belongsTo('App\Registro', 'id_registro');
    }

    public function vehiculo(){
    	return $this->belongsTo('App\Vehiculo', 'id_vehiculo');
    }

    public function formaPago(){
    	return $this->belongsTo('App\FormaPago', 'id_forma_pago');
    }
}
