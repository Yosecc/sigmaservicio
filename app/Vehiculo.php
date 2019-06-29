<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = "vehiculo";

    protected $fillable = [
		'fecha_matriculacion', 'id_tipo', 'inicio', 'fin', 'id_marca', 'id_modelo', 'id_combustible', 'normativa_emisiones_co2', 'emisiones_co2_valor_minimo', 'potencia', 'cilindrada', 'tipo_carroceria', 'puertas', 'numero_puestos', 'numero_bastidor', 'numero_bastidor_abreviado', 'juego_llaves', 'id_transmision', 'color_carroceria', 'color_interior', 'aire_acondicionado', 'control_distancia', 'nav_satelite', 'tapiceria', 'direccion_asistida', 'elevalunas_electrico', 'volante_multifuncional', 'retrovisores_exteriores_calefactables', 'retrovisores_exteriores_electricos', 'interfal_bluetooth', 'volante_cuero', 'llantas_aleacion', 'pintura_metalizada', 'permiso_circulacion', 'certificado_conformidad', 'registro_mantenimiento', 'ultima_revision', 'lugar_recogida', 'pais_origen', 'oficina_venta', 'kilometraje', 'id_usuario'
    ];

    public function scopeRelaciones($query){
        return $query->with(
            'pagos','marca:id,descripcion','modelo:id,descripcion',
            'transmision:id,descripcion','tipo:id,descripcion', 'paisOrigen:id,desc',
            'combustible:id,descripcion', 'lugarRecogida:id,desc', 'oficinaVenta:id,desc',
            'usuario', 'tiposSubasta.pais:id,desc'
        );
    }

	// Modelos
    public function fotos(){
        return $this->hasMany('App\Galeria', 'id_vehiculo');
    }

    public function daño(){
        return $this->hasOne('App\Dano', 'id_vehiculo');
    }

    public function pagos(){
        return $this->hasMany('App\Pagos', 'id_vehiculo');
    }
    
    public function marca(){
        return $this->belongsTo('App\Marca', 'id_marca');
    }

    public function modelo(){
        return $this->belongsTo('App\Modelo', 'id_modelo');
    } 

    public function transmision(){
        return $this->belongsTo('App\Transmision', 'id_transmision');
    }
    
    public function tipo(){
        return $this->belongsTo('App\Tipo', 'id_tipo');
    }

    public function combustible(){
        return $this->belongsTo('App\Combustible', 'id_combustible');
    }

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario');
    }

    public function lugarRecogida(){
        return $this->belongsTo('App\Paises', 'lugar_recogida');
    }

    public function paisOrigen(){
        return $this->belongsTo('App\Paises', 'pais_origen');
    }

    public function oficinaVenta(){
        return $this->belongsTo('App\Paises', 'oficina_venta');
    }

    public function tiposSubasta(){
        return $this->belongsToMany('App\TipoSubasta', 'subasta_vehiculo');
    }
}
