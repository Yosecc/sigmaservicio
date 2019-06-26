<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formatos extends Model
{
  protected $table = 'formatos';
  protected $fillable = ['posicion_seccion','seccion_id','servicio_id'];
  protected $guarded = ['id'];
}
