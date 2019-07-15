<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
  protected $table = 'noticias';
  protected $fillable = ['titulo', 'fuente', 'resumen', 'descripcion', 'publico', 'posicion', 'url_multimedia','url_imagen'];
  protected $guarded = ['id'];
}
