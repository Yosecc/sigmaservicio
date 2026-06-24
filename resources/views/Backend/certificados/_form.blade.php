@if(isset($errors) && $errors->any())
  <div class="alert alert-danger">
    <strong>Revise la información ingresada:</strong>
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@php($tipo = old('tipo_certificado', isset($certificado) ? $certificado->tipo_certificado : 'persona'))

<div class="certificado-form">
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label>Tipo de certificado *</label>
      <select name="tipo_certificado" id="tipo_certificado" class="form-control" required>
        <option value="persona" {{ $tipo === 'persona' ? 'selected' : '' }}>Certificado a persona</option>
        <option value="empresa" {{ $tipo === 'empresa' ? 'selected' : '' }}>Certificado a empresa / equipo</option>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Número de certificado *</label>
      <input type="text" name="numero_certificado" class="form-control" required maxlength="100"
        autocomplete="one-time-code" autocapitalize="characters" spellcheck="false"
        value="{{ old('numero_certificado', isset($certificado) ? $certificado->numero_certificado : '') }}">
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Nombre de la empresa *</label>
      <input type="text" name="nombre_empresa" class="form-control" required maxlength="255"
        value="{{ old('nombre_empresa', isset($certificado) ? $certificado->nombre_empresa : '') }}">
    </div>
  </div>
</div>

<div id="campos-persona">
  <h5 class="mt-3">Datos de la persona</h5>
  <div class="row">
    <div class="col-md-5">
      <div class="form-group">
        <label>Nombre completo de la persona *</label>
        <input type="text" name="nombre_titular" class="form-control campo-persona" maxlength="255"
          value="{{ old('nombre_titular', isset($certificado) ? $certificado->nombre_titular : '') }}">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Documento de identidad</label>
        <input type="text" name="documento_identidad" class="form-control" maxlength="100"
          value="{{ old('documento_identidad', isset($certificado) ? $certificado->documento_identidad : '') }}">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Curso *</label>
        <input type="text" name="nombre_certificacion" class="form-control campo-persona" maxlength="255"
          value="{{ old('nombre_certificacion', isset($certificado) ? $certificado->nombre_certificacion : '') }}">
      </div>
    </div>
  </div>
</div>

<div id="campos-empresa">
  <h5 class="mt-3">Datos del cliente y del equipo</h5>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Nombre del cliente *</label>
        <input type="text" name="nombre_cliente" class="form-control campo-empresa" maxlength="255"
          value="{{ old('nombre_cliente', isset($certificado) ? $certificado->nombre_cliente : '') }}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Domicilio</label>
        <input type="text" name="domicilio" class="form-control" maxlength="1000"
          value="{{ old('domicilio', isset($certificado) ? $certificado->domicilio : '') }}">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label>Tipo de equipo</label>
        <input type="text" name="equipo_tipo" class="form-control" maxlength="255"
          value="{{ old('equipo_tipo', isset($certificado) ? $certificado->equipo_tipo : '') }}">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Marca</label>
        <input type="text" name="equipo_marca" class="form-control" maxlength="255"
          value="{{ old('equipo_marca', isset($certificado) ? $certificado->equipo_marca : '') }}">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Modelo</label>
        <input type="text" name="equipo_modelo" class="form-control" maxlength="255"
          value="{{ old('equipo_modelo', isset($certificado) ? $certificado->equipo_modelo : '') }}">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Serial</label>
        <input type="text" name="equipo_serial" class="form-control" maxlength="255"
          value="{{ old('equipo_serial', isset($certificado) ? $certificado->equipo_serial : '') }}">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label>Código interno</label>
        <input type="text" name="codigo_interno" class="form-control" maxlength="255"
          value="{{ old('codigo_interno', isset($certificado) ? $certificado->codigo_interno : '') }}">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Capacidad certificada</label>
        <input type="text" name="capacidad_certificada" class="form-control" maxlength="255"
          value="{{ old('capacidad_certificada', isset($certificado) ? $certificado->capacidad_certificada : '') }}">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Lugar de inspección</label>
        <input type="text" name="lugar_inspeccion" class="form-control" maxlength="255"
          value="{{ old('lugar_inspeccion', isset($certificado) ? $certificado->lugar_inspeccion : '') }}">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Normas aplicadas</label>
        <textarea name="normas_aplicadas" class="form-control" rows="2" maxlength="2000">{{ old('normas_aplicadas', isset($certificado) ? $certificado->normas_aplicadas : '') }}</textarea>
      </div>
    </div>
  </div>
</div>

<h5 class="mt-3">Vigencia</h5>
<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label>Fecha de creación *</label>
      <input type="date" name="fecha_emision" class="form-control" required
        value="{{ old('fecha_emision', isset($certificado) && $certificado->fecha_emision ? $certificado->fecha_emision->format('Y-m-d') : date('Y-m-d')) }}">
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label>Fecha de vencimiento</label>
      <input type="date" name="fecha_vencimiento" class="form-control"
        value="{{ old('fecha_vencimiento', isset($certificado) && $certificado->fecha_vencimiento ? $certificado->fecha_vencimiento->format('Y-m-d') : '') }}">
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label>Estado *</label>
      @php($estado = old('estado', isset($certificado) ? $certificado->estado : 'vigente'))
      <select name="estado" class="form-control" required>
        <option value="vigente" {{ $estado === 'vigente' ? 'selected' : '' }}>Vigente</option>
        <option value="vencido" {{ $estado === 'vencido' ? 'selected' : '' }}>Vencido</option>
        <option value="anulado" {{ $estado === 'anulado' ? 'selected' : '' }}>Anulado</option>
      </select>
    </div>
  </div>
</div>

<div class="form-group">
  <label>Observaciones</label>
  <textarea name="observaciones" class="form-control" rows="4" maxlength="2000">{{ old('observaciones', isset($certificado) ? $certificado->observaciones : '') }}</textarea>
</div>

<div class="text-right">
  <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">
    <i class="material-icons">save</i> Guardar certificado
  </button>
</div>
</div>

@push('scripts')
<script>
  (function () {
    function actualizarTipo() {
      var tipo = document.getElementById('tipo_certificado').value;
      var persona = document.getElementById('campos-persona');
      var empresa = document.getElementById('campos-empresa');

      persona.style.display = tipo === 'persona' ? 'block' : 'none';
      empresa.style.display = tipo === 'empresa' ? 'block' : 'none';

      document.querySelectorAll('.campo-persona').forEach(function (campo) {
        campo.required = tipo === 'persona';
      });
      document.querySelectorAll('.campo-empresa').forEach(function (campo) {
        campo.required = tipo === 'empresa';
      });
    }

    document.getElementById('tipo_certificado').addEventListener('change', actualizarTipo);
    actualizarTipo();
  })();
</script>
@endpush
