<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeccionesCampos extends Model
{
  protected $table = 'secciones_campos';
  protected $fillable = ['seccion_id','campo_id','posicion_campo'];
  protected $guarded = ['id'];
}
