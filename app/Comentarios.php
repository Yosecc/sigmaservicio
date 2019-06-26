<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
  protected $table = 'comentarios';
  protected $fillable = ['nombre','procedencia','contenido','url_imagen'];
  protected $guarded = ['id'];
}
