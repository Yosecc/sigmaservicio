<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    protected $table = "formas_pago";

    public function pagos(){
    	return $this->hasMany('App\Pagos', 'id_forma_pago');
    }
}
