<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campos extends Model
{
  protected $table = 'campos';
  protected $fillable = ['nombre_campo','tipo_campo_id'];
  protected $guarded = ['id'];

  
}
