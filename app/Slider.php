<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
  protected $table = 'sliders';
  protected $fillable = ['titulo', 'contenido','contenido2', 'publico', 'posicion', 'servicio_id', 'url_imagen'];
  protected $guarded = ['id'];
}
