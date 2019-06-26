<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposCampos extends Model
{
  protected $table = 'tipos_campos';
  protected $fillable = ['tipo_campo','tipo_campo_id'];
  protected $guarded = ['id'];
}
