<div class="row">
  <div class="col p-0">
    <h3>Documentos e historial</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-2 form-group">
    <label for="permiso_circulacion"><strong>Permiso de circulación:</strong></label>
    <select name="permiso_circulacion" id="permiso_circulacion" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->permiso_circulacion == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col-md-2 form-group">
    <label for="certificado_conformidad"><strong>Certificado de conformidad:</strong></label>
    <select name="certificado_conformidad" id="certificado_conformidad" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->certificado_conformidad == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
  <div class="col-md-2 form-group">
    <label for="registro_mantenimiento"><strong>Registro de mantenimiento:</strong></label>
    <select name="registro_mantenimiento" id="registro_mantenimiento" class="form-control" required>
      {{-- <option value="" disabled selected>Seleccione</option> --}}
      <option value="0" selected>No</option>
      <option value="1" {{ empty($vehiculo) ? '':($vehiculo->registro_mantenimiento == 1) ? 'selected':'' }}>Si</option>
    </select>            
  </div>
</div>
{{-- Septima fila --}}
<div class="row">
  <div class="col p-0">
    <h3>Procedencia</h3>
  </div>
</div>        
<div class="row">
  <div class="col-md-2 form-group">
    <label for="lugar_recogida"><strong>Lugar de recogida:</strong></label>
    <select name="lugar_recogida" id="lugar_recogida" class="form-control" required>
      <option value="" disabled selected>Seleccione</option>
      @foreach ($paises as $pais)
        <option value="{{ $pais->id }}" {{ empty($vehiculo) ? '':($vehiculo->lugar_recogida == $pais->id) ? 'selected':'' }}>{{ $pais->desc }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-2 form-group">
    <label for="pais_origen"><strong>País de origen:</strong></label>
    <select name="pais_origen" id="pais_origen" class="form-control" required>
      <option value="" disabled selected>Seleccione</option>
      @foreach ($paises as $pais)
        <option value="{{ $pais->id }}" {{ empty($vehiculo) ? '':($vehiculo->pais_origen == $pais->id) ? 'selected':'' }}>{{ $pais->desc }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-2 form-group">
    <label for="oficina_venta"><strong>Oficina de venta</strong></label>
    <select name="oficina_venta" id="oficina_venta" class="form-control" required>
      <option value="" disabled selected>Seleccione</option>
      @foreach ($paises as $pais)
        <option value="{{ $pais->id }}" {{ empty($vehiculo) ? '':($vehiculo->oficina_venta == $pais->id) ? 'selected':'' }}>{{ $pais->desc }}</option>
      @endforeach
    </select>
  </div>
</div>