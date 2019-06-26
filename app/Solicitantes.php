<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitantes extends Model
{
    protected $table = 'solicitantes';
  	protected $fillable = ['id_campo', 'valor'];
  	protected $guarded = ['id'];
}
