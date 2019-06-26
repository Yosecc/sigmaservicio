{{-- Primera fila --}}
<div class="row">
  <div class="col p-0"><h3>Tipo de publicación</h3></div>
</div>
<div class="row">
  <div class="col-md-2 form-group">
    <label for="tipo"><strong>Tipo:</strong></label>
    <select name="id_tipo" id="tipo" class="form-control" required>
      <option value="" disabled selected>Seleccione</option>
      @foreach ($tipos as $tipo)
        <option value="{{ $tipo->id }}" {{ empty($vehiculo) ? '':($vehiculo->tipo->id == $tipo->id) ? 'selected':'' }}>{{ $tipo->descripcion }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-4 form-group">
    <label for="tipo_subasta"><strong>Tipo Subasta:</strong></label>
    <select multiple name="tipo_subasta[]" id="tipo_subasta" class="form-control"  required 
    {{ empty($vehiculo) ? 'disabled': $vehiculo->tipo->id == 3 ? '' : 'disabled'   }}>
      @foreach ($tiposSubasta as $tipoSubasta)
        <option value="{{ $tipoSubasta->id }}" 
          @php
          if( empty($vehiculo) ){
            echo '';
          }else{
            foreach($vehiculo->tiposSubasta as $tipoSubastaVehiculo){
              echo ($tipoSubastaVehiculo->id == $tipoSubasta->id) ? 'selected' : '';
            }
          } 
          @endphp
        >
          {{ $tipoSubasta->descripcion }} ({{ $tipoSubasta->pais->desc }})
        </option>
      @endforeach
    </select>
  </div>
  {{-- <div class="col-md-2 form-group">
    <label for="inicio"><strong>Fecha de inicio:</strong></label>
    <input type="date" name="inicio" id="inicio" class="form-control" 
      min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" 
      required disabled 
      value="{{ isset($vehiculo) ? (new Carbon\Carbon($vehiculo->inicio))->format("Y-m-d") : "" }}">
  </div>
  <div class="col-md-2 form-group">
    <label for="fin"><strong>Fecha de fin:</strong></label>
    <input type="date" name="fin" id="fin" class="form-control" 
      min="{{ Carbon\Carbon::now()->addDays(1)->format('Y-m-d') }}" 
      required disabled 
      value="{{ isset($vehiculo) ? (new Carbon\Carbon($vehiculo->fin))->format("Y-m-d") : "" }}">
  </div> --}}
</div>
<div class="row">
  <div class="col p-0"><h3>Características del vehículo</h3></div>
</div>
<div class="row">
  <div class="col-md-2 form-group">
    <label for="marca"><strong>Marca:</strong></label>
    <select name="id_marca" id="marca" class="form-control" required>
      <option value="" disabled selected>Seleccione</option>
      @foreach ($marcas as $marca)
        <option value="{{ $marca->id }}" {{ empty($vehiculo) ? '':($vehiculo->marca->id == $marca->id) ? 'selected':'' }}>{{ $marca->descripcion }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-2 form-group">
    <label for="modelo"><strong>Modelo:</strong></label>
    <select name="id_modelo" id="modelo" class="form-control" required>
      <option value="" disabled selected>Seleccione</option>
      @foreach ($modelos as $modelo)
        <option value="{{ $modelo->id }}" {{ empty($vehiculo) ? '':($vehiculo->modelo->id == $modelo->id) ? 'selected':'' }}>{{ $modelo->descripcion }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-2 form-group">
    <label for="combustible"><strong>Combustible:</strong></label>
    <select name="id_combustible" id="combustible" class="form-control" required>
      <option value="" disabled selected>Seleccione</option>
      @foreach ($combustibles as $combustible)
        <option value="{{ $combustible->id }}" {{ empty($vehiculo) ? '':($vehiculo->combustible->id == $combustible->id) ? 'selected':'' }}>{{ $combustible->descripcion }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-2 form-group">
    <label for="transmision"><strong>Transmision:</strong></label>
    <select name="id_transmision" id="transmision" class="form-control" required>
      <option value="" disabled selected>Seleccione</option>
      @foreach ($transmisiones as $transmision)
        <option value="{{ $transmision->id }}" {{ empty($vehiculo) ? '':($vehiculo->transmision->id == $transmision->id) ? 'selected':'' }}>{{ $transmision->descripcion }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-2 form-group">
    <label for="fecha_matriculacion"><strong>Fecha de matriculación:</strong></label>
    <input type="date" name="fecha_matriculacion" id="fecha_matriculacion" class="form-control" 
    required 
    value="{{ isset($vehiculo) ? (new Carbon\Carbon($vehiculo->fecha_matriculacion))->format("Y-m-d") : "" }}">
  </div>
  <div class="col-md-2 form-group">
    <label for="ultima_revision"><strong>Fecha de ultima_revision:</strong></label>
    <input type="date" name="ultima_revision" id="ultima_revision" class="form-control"   
    required 
    value="{{ isset($vehiculo) ? (new Carbon\Carbon($vehiculo->ultima_revision))->format("Y-m-d") : "" }}">
  </div>
</div>
{{-- Segunda fila --}}
<div class="row">
  <div class="col-md-3 form-group">
    <label for="potencia"><strong>Potencia:</strong></label>
    <input type="text" class="form-control" name="potencia" id="potencia" placeholder="Ingrese potencia" required value="{{ $vehiculo->potencia ?? "" }}">
  </div>
  
  <div class="col-md-3 form-group">
    <label for="kilometraje"><strong>Kilometraje:</strong></label>
    <input type="number" class="form-control" name="kilometraje" id="kilometraje" placeholder="Ingrese kilometraje" min="0" required value="{{ $vehiculo->kilometraje ?? ""}}">
  </div>
  <div class="col-md-3 form-group">
    <label for="cilindrada"><strong>Cilindrada:</strong></label>
    <input type="number" class="form-control" name="cilindrada" id="cilindrada" placeholder="Ingrese cilindrada" min="0"required value="{{ $vehiculo->cilindrada ?? ""}}">
  </div>
  <div class="col-md-3 form-group">
    <label for="juego_llaves"><strong>Juego de llaves:</strong></label>
    <input type="number" min="0" class="form-control" name="juego_llaves" id="juego_llaves" placeholder="Ingrese juego de llaves" required value="{{ $vehiculo->juego_llaves ?? ""}}">
  </div>
  
</div>
{{-- Tercera fila --}}
<div class="row">
  
  
  <div class="col-md-3 form-group">
    <label for="numero_bastidor"><strong>Número de bastidor:</strong></label>
    <input type="text" class="form-control" name="numero_bastidor" id="numero_bastidor" placeholder="Ingrese número de bastidor" min="0"required value="{{ $vehiculo->kilometraje ?? "" }}">
  </div>
  <div class="col-md-3 form-group">
    <label for="numero_bastidor_abreviado"><strong>Número de bastidor(abreviado):</strong></label>
    <input type="text" class="form-control" name="numero_bastidor_abreviado" id="numero_bastidor_abreviado" placeholder="Ingrese numero de bastidor abreviado" min="0"required value="{{ $vehiculo->numero_bastidor_abreviado ?? ""}}">
  </div>
  <div class="col-md-3 form-group">
    <label for="normativa_emisiones_co2"><strong>Normativa emisiones CO2:</strong></label>
    <input type="text" class="form-control" name="normativa_emisiones_co2" id="normativa_emisiones_co2" placeholder="Ingrese normativa CO2" required value="{{ $vehiculo->normativa_emisiones_co2 ?? ""}}">
  </div>
  <div class="col-md-3 form-group">
    <label for="emisiones_co2_valor_minimo"><strong>Emisiones de CO2(valor mínimo):</strong></label>
    <input type="text" class="form-control" name="emisiones_co2_valor_minimo" id="emisiones_co2_valor_minimo" placeholder="Valor mínimo emisiones CO2"required value="{{ $vehiculo->emisiones_co2_valor_minimo ?? ""}}">
  </div>
 
</div>

<div class="row justify-content-center">
  <div class="col form-group">
    <label for="color_interior"><strong>Color interior:</strong></label>
    <input type="text" class="form-control" name="color_interior" id="color_interior" placeholder="Ingrese color interior" required  value="{{ $vehiculo->color_interior ?? ""}}">
  </div>
  <div class="col form-group">
    <label for="tipo_carroceria"><strong>Tipo de carroceria:</strong></label>
    <input type="text" class="form-control" name="tipo_carroceria" id="tipo_carroceria" placeholder="Ingrese tipo de carroceria" required value="{{ $vehiculo->tipo_carroceria ?? ""}}">
  </div>
  <div class="col form-group">
    <label for="color_carroceria"><strong>Color de carrocería:</strong></label>
    <input type="text" class="form-control" name="color_carroceria" id="color_carroceria" placeholder="Ingrese color" min="1" required value="{{ $vehiculo->color_carroceria ?? ""}}">
  </div>
  <div class="col form-group">
    <label for="numero_puestos"><strong>Puestos:</strong></label>
    <input type="number" class="form-control" name="numero_puestos" id="numero_puestos" placeholder="Cantidad" min="0" required value="{{ $vehiculo->numero_puestos ?? ""}}">
  </div>
  <div class="col form-group">
    <label for="puertas"><strong>Puertas:</strong></label>
    <input type="number" class="form-control" name="puertas" id="puertas" placeholder="Cantidad" min="1" required value="{{ $vehiculo->puertas ?? ""}}">
  </div>
</div>