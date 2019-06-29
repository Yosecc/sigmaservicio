<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secciones extends Model
{
  protected $table = 'secciones';
  protected $fillable = ['nombre_seccion'];
  protected $guarded = ['id'];
}
