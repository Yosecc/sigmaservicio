<div class="row">
  <div class="col p-0">
    <h3>Comodidad</h3>
  </div>
</div>
<div class="row">          
  <div class="col form-group">
    <label for="aire_acondicionado"><strong>Aire acondicionado:</strong></label>
    <select name="aire_acondicionado" id="aire_acondicionado" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->aire_acondicionado == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col form-group">
    <label for="control_distancia"><strong>Control a distancia:</strong></label>
    <select name="control_distancia" id="control_distancia" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->control_distancia == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col form-group">
    <label for="nav_satelite"><strong>Navegación por satélite:</strong></label>
    <select name="nav_satelite" id="nav_satelite" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->nav_satelite == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col form-group">
    <label for="volante_multifuncional"><strong>Volante multifuncional:</strong></label>
    <select name="volante_multifuncional" id="volante_multifuncional" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->volante_multifuncional == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col form-group">
    <label for="direccion_asistida"><strong>Dirección asistida:</strong></label>
    <select name="direccion_asistida" id="direccion_asistida" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->direccion_asistida == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
 
</div>
{{-- Quinta fila --}}
<div class="row">
   <div class="col form-group">
    <label for="interfal_bluetooth"><strong>Interfaz  Bluetooth:</strong></label>
    <select name="interfal_bluetooth" id="interfal_bluetooth" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->interfal_bluetooth == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>  
  <div class="col form-group">
    <label for="elevalunas_electrico"><strong>Elevalunas eléctrico:</strong></label>
    <select name="elevalunas_electrico" id="elevalunas_electrico" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->elevalunas_electrico == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col form-group">
    <label for="retrovisores_exteriores_calefactables"><strong>Retrovisores calefactables:</strong></label>
    <select name="retrovisores_exteriores_calefactables" id="retrovisores_exteriores_calefactables" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->retrovisores_exteriores_calefactables == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col form-group">
    <label for="retrovisores_exteriores_electricos"><strong>Retrovisores eléctricos:</strong></label>
    <select name="retrovisores_exteriores_electricos" id="retrovisores_exteriores_electricos" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->retrovisores_exteriores_electricos == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
</div>

<div class="row">
  <div class="col p-0">
    <h3>Acabado</h3>
  </div>
</div>
<div class="row">  
  <div class="col-md-2 form-group">
    <label for="tapiceria"><strong>Tapicería:</strong></label>
    <input type="text" class="form-control" name="tapiceria" id="tapiceria" placeholder="Ingrese tapicería" required value="{{ $vehiculo->tapiceria ?? "" }}">
  </div>
  <div class="col-md-2 form-group">
    <label for="volante_cuero"><strong>Volante de cuero:</strong></label>
    <select name="volante_cuero" id="volante_cuero" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->volante_cuero == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col-md-2 form-group">
    <label for="pintura_metalizada"><strong>Pintura metalizada:</strong></label>
    <select name="pintura_metalizada" id="pintura_metalizada" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->pintura_metalizada == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>          
</div>

<div class="row">
  <div class="col p-0">
    <h3>Ruedas y neumáticos</h3>
  </div>
</div>
<div class="row">  
  <div class="col-md-2 form-group">
    <label for="llantas_aleacion"><strong>Llantas de aleación:</strong></label>
    <select name="llantas_aleacion" id="llantas_aleacion" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->llantas_aleacion == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>      
</div>