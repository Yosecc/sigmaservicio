<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
  protected $table = 'servicios';
  protected $fillable = ['titulo_servicio', 'monto', 'descripcion_servicio', 'url_imagen', 'categoria_id'];
  protected $guarded = ['id'];
}
