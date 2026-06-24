<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificado extends Model
{
    use SoftDeletes;

    protected $table = 'certificados';

    protected $fillable = [
        'numero_certificado',
        'token',
        'tipo_certificado',
        'nombre_titular',
        'nombre_cliente',
        'nombre_empresa',
        'domicilio',
        'equipo_tipo',
        'equipo_marca',
        'equipo_modelo',
        'equipo_serial',
        'codigo_interno',
        'capacidad_certificada',
        'normas_aplicadas',
        'lugar_inspeccion',
        'documento_identidad',
        'nombre_certificacion',
        'institucion_emisora',
        'fecha_emision',
        'fecha_vencimiento',
        'estado',
        'observaciones',
        'creado_por',
        'actualizado_por',
    ];

    protected $dates = [
        'fecha_emision',
        'fecha_vencimiento',
        'deleted_at',
    ];

    public function creador()
    {
        return $this->belongsTo('App\User', 'creado_por');
    }

    public function actualizador()
    {
        return $this->belongsTo('App\User', 'actualizado_por');
    }

    public function getEstadoActualAttribute()
    {
        if ($this->estado === 'anulado') {
            return 'anulado';
        }

        if ($this->fecha_vencimiento && $this->fecha_vencimiento->lt(Carbon::today())) {
            return 'vencido';
        }

        return $this->estado;
    }

    public function getEstadoTextoAttribute()
    {
        return ucfirst($this->estado_actual);
    }

    public function getEsValidoAttribute()
    {
        return $this->estado_actual === 'vigente';
    }

    public function getNombrePrincipalAttribute()
    {
        return $this->tipo_certificado === 'empresa'
            ? ($this->nombre_cliente ?: $this->nombre_empresa)
            : $this->nombre_titular;
    }

    public function getTipoTextoAttribute()
    {
        return $this->tipo_certificado === 'empresa' ? 'Empresa / equipo' : 'Persona';
    }
}
