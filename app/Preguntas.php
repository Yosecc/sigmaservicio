<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
  protected $table = 'preguntas';
  protected $fillable = ['pregunta', 'respuesta', 'publico', 'posicion_pregunta'];
  protected $guarded = ['id'];
}
