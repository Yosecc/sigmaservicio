<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    public function categoria()
    {
        return $this->belongsTo('App\Categorias', 'categorias_id');
    }
}
