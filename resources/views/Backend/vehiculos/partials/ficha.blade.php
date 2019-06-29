{{-- Especificaciones --}}
<div class="row">
  <div class="col p-0">
    <h2 class="text-center">Especificaciones</h2>
    <h3>Tipo de publicación</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-3 pt-0">
    <h6><strong>Tipo:</strong></h6>
    {{ $vehiculo->tipo->descripcion }}
  </div>
 {{--  <div class="col-md-3">
    <h6><strong>Fecha de inicio:</strong></h6>
    {{ $vehiculo->tipo->id == 3?(new Carbon\Carbon($vehiculo->inicio))->format("Y-m-d"):'No aplica' }}
  </div>
  <div class="col-md-3">
    <h6><strong>Fecha de fin:</strong></h6>
    {{ $vehiculo->tipo->id == 3?(new Carbon\Carbon($vehiculo->fin))->format("Y-m-d"):'No aplica' }}
  </div> --}}
  <div class="col">
    <h6><strong>Tipo de subasta:</strong></h6>
    <ul>
      @forelse ($vehiculo->tiposSubasta as $tipoSubasta)
        <li>
          {{ $tipoSubasta->descripcion }} ({{ $tipoSubasta->pais->desc }}) <b>Duración</b>: {{ $tipoSubasta->fecha_inicio->format('Y-m-d H:i') }} - {{ $tipoSubasta->fecha_fin->format('Y-m-d H:i') }}
        </li>
      @empty
        <li>No Aplica</li>
      @endforelse
    </ul>
  </div>
</div>
<div class="row">
  <div class="col p-0"><h3>Características del vehículo</h3></div>
</div>
<div class="row">
  <div class="col-md-3 ">
    <h6><strong>Marca:</strong></h6>
    {{ $vehiculo->marca->descripcion }}
  </div>
  <div class="col-md-3 ">
    <h6><strong>Modelo:</strong></h6>
    {{ $vehiculo->modelo->descripcion }}
  </div>
  <div class="col-md-3 ">
    <h6><strong>Fecha de matriculación:</strong></h6>
    {{ (new Carbon\Carbon($vehiculo->fecha_matriculacion))->format("Y-m-d") }}
  </div>
  <div class="col-md-3 ">
    <h6><strong>Fecha de ultima_revision:</strong></h6>
    {{ (new Carbon\Carbon($vehiculo->ultima_revision))->format("Y-m-d") }}
  </div>
</div>
{{-- Segunda fila --}}
<div class="row">
  <div class="col-md-2 ">
    <h6><strong>Combustible:</strong></h6>
    {{ $vehiculo->combustible->descripcion }}
  </div>
  <div class="col-md-2 ">
    <h6><strong>Transmision:</strong></h6>
    {{ $vehiculo->transmision->descripcion }}
  </div>
  <div class="col-md-2 ">
    <h6 ><strong>Potencia:</strong></h6>
   {{ $vehiculo->potencia }}
  </div>
  
  <div class="col-md-2 ">
    <h6 ><strong>Kilometraje:</strong></h6>
   {{ $vehiculo->kilometraje }}
  </div>
  <div class="col-md-2 ">
    <h6><strong>Cilindrada:</strong></h6>
    {{ $vehiculo->cilindrada }}
  </div>
  <div class="col-md-2 ">
    <h6 ><strong>Juego de llaves:</strong></h6>
    {{ $vehiculo->juego_llaves }}
  </div>
  
</div>
{{-- Tercera fila --}}
<div class="row">
  
  <div class="col-md-3 ">
    <h6><strong>Número de bastidor:</strong></h6>
    {{ $vehiculo->kilometraje  }}
  </div>
  <div class="col-md-3 ">
    <h6 ><strong>Número de bastidor(abreviado):</strong></h6>
    {{ $vehiculo->numero_bastidor_abreviado }}
  </div>
  <div class="col-md-3 ">
    <h6><strong>Normativa emisiones CO2:</strong></h6>
    {{ $vehiculo->normativa_emisiones_co2 }}
  </div>
  <div class="col-md-3 ">
    <h6><strong>Emisiones de CO2(valor mínimo):</strong></h6>
    {{ $vehiculo->emisiones_co2_valor_minimo }}
  </div>
 
</div>

<div class="row justify-content-center">
  <div class="col ">
    <h6 ><strong>Color interior:</strong></h6>
    {{ $vehiculo->color_interior }}
  </div>
  <div class="col ">
    <h6 ><strong>Tipo de carroceria:</strong></h6>
    {{ $vehiculo->tipo_carroceria }}
  </div>
  <div class="col ">
    <h6 ><strong>Color de carrocería:</strong></h6>
    {{ $vehiculo->color_carroceria }}
  </div>
  <div class="col ">
    <h6 ><strong>Puestos:</strong></h6>
    {{ $vehiculo->numero_puestos }}
  </div>
  <div class="col ">
    <h6 ><strong>Puertas:</strong></h6>
    {{ $vehiculo->puertas }}
  </div>
</div>

{{-- Equipamiento --}}
<div class="row">
  <div class="col p-0">
    <h2 class="text-center">Equipamiento</h2>
    <h3>Comodidad</h3>
  </div>
</div>
<div class="row">          
  <div class="col ">
    <h6 ><strong>Aire acondicionado:</strong></h6>
    {{ $vehiculo->aire_acondicionado == 1? "Si":"No" }}            
  </div>
  <div class="col ">
    <h6 ><strong>Control a distancia:</strong></h6>
    {{ $vehiculo->control_distancia == 1? "Si":"No" }}            
  </div>
  <div class="col ">
    <h6 ><strong>Navegación por satélite:</strong></h6>
    {{ $vehiculo->nav_satelite == 1? "Si":"No" }}            
  </div>
  <div class="col ">
    <h6 ><strong>Volante multifuncional:</strong></h6>
    {{ $vehiculo->volante_multifuncional == 1? "Si":"No" }}           
  </div>
  <div class="col ">
    <h6><strong>Dirección asistida:</strong></h6>
    {{ $vehiculo->direccion_asistida == 1? "Si":"No" }}            
  </div>
 
</div>
{{-- Quinta fila --}}
<div class="row">
   <div class="col ">
    <h6><strong>Interfaz  Bluetooth:</strong></h6>
    {{ $vehiculo->interfal_bluetooth == 1? "Si":"No" }}            
  </div>  
  <div class="col ">
    <h6 ><strong>Elevalunas eléctrico:</strong></h6>
    {{ $vehiculo->elevalunas_electrico == 1? "Si":"No" }}            
  </div>
  <div class="col ">
    <h6 ><strong>Retrovisores calefactables:</strong></h6>
    {{ $vehiculo->retrovisores_exteriores_calefactables == 1? "Si":"No" }}        
  </div>
  <div class="col ">
    <h6 ><strong>Retrovisores eléctricos:</strong></h6>
    {{ $vehiculo->retrovisores_exteriores_electricos == 1? "Si":"No" }}
  </div>
</div>

<div class="row">
  <div class="col p-0">
    <h3>Acabado</h3>
  </div>
</div>
<div class="row">  
  <div class="col-md-3 ">
    <h6 ><strong>Tapicería:</strong></h6>
    {{ $vehiculo->tapiceria }}
  </div>
  <div class="col-md-3 ">
    <h6 ><strong>Volante de cuero:</strong></h6>
    {{ $vehiculo->volante_cuero == 1? "Si":"No" }}            
  </div>
  <div class="col-md-3 ">
    <h6><strong>Pintura metalizada:</strong></h6>
    {{ $vehiculo->pintura_metalizada == 1? "Si":"No" }}            
  </div>          
</div>

<div class="row">
  <div class="col p-0">
    <h3>Ruedas y neumáticos</h3>
  </div>
</div>
<div class="row">  
  <div class="col-md-3">
    <h6 ><strong>Llantas de aleación:</strong></h6>
    {{ $vehiculo->llantas_aleacion == 1? "Si":"No" }}            
  </div>      
</div>

{{-- Otros --}}
<div class="row">
  <div class="col p-0">
    <h2 class="text-center">Otros</h2>
    <h3>Documentos e historial</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <h6 for="permiso_circulacion"><strong>Permiso de circulación:</strong></h6>
    {{ $vehiculo->permiso_circulacion == 1 ? 'Si': 'No'}}            
  </div>
  <div class="col-md-3">
    <h6 for="certificado_conformidad"><strong>Certificado de conformidad:</strong></h6>
    {{ $vehiculo->certificado_conformidad == 1 ? 'Si': 'No'}}            
  </div>
  <div class="col-md-3">
    <h6 for="registro_mantenimiento"><strong>Registro de mantenimiento:</strong></h6>
    {{ $vehiculo->registro_mantenimiento == 1 ? 'Si': 'No'}}            
  </div>
</div>
{{-- Septima fila --}}
<div class="row">
  <div class="col p-0">
    <h3>Procedencia</h3>
  </div>
</div>        
<div class="row">
  <div class="col-md-3">
    <h6 ><strong>Lugar de recogida:</strong></h6>
    {{ $vehiculo->lugarRecogida->desc }}
  </div>
  <div class="col-md-3">
    <h6 ><strong>País de origen:</strong></h6>
    {{ $vehiculo->paisOrigen->desc }}
  </div>
  <div class="col-md-3">
    <h6 ><strong>Oficina de venta</strong></h6>
    {{ $vehiculo->oficinaVenta->desc }}
  </div>
</div>