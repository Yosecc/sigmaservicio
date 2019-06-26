<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
  	protected $fillable = ['id_solicitante', 'id_servicio', 'id_seccion', 'id_campo', 'valor', 'status'];
  	//protected $guarded = ['id'];
}
