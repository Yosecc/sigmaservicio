@extends('Backend.layout.layout')

@section('content')
<div class="col-md-12">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-header card-header-primary d-flex justify-content-between align-items-center">
      <div>
        <h4 class="card-title">Certificado {{ $certificado->numero_certificado }}</h4>
        <p class="card-category">Código QR y datos registrados</p>
      </div>
      <a href="{{ route('certificados.edit', $certificado->id) }}" class="btn btn-white btn-link">
        <i class="material-icons">edit</i> Editar
      </a>
    </div>
    <div class="card-body">
      <input id="mostra_vista" value="certificados" hidden disabled>

      <div class="row">
        <div class="col-md-7">
          <table class="table">
            <tr><th>Número</th><td>{{ $certificado->numero_certificado }}</td></tr>
            <tr><th>Tipo</th><td>{{ $certificado->tipo_texto }}</td></tr>
            @if($certificado->nombre_titular)
              <tr><th>Nombre de la persona</th><td>{{ $certificado->nombre_titular }}</td></tr>
            @endif
            @if($certificado->documento_identidad)
              <tr><th>Documento de identidad</th><td>{{ $certificado->documento_identidad }}</td></tr>
            @endif
            @if($certificado->nombre_cliente)
              <tr><th>Nombre del cliente</th><td>{{ $certificado->nombre_cliente }}</td></tr>
            @endif
            @if($certificado->nombre_empresa)
              <tr><th>Nombre de la empresa</th><td>{{ $certificado->nombre_empresa }}</td></tr>
            @endif
            @if($certificado->nombre_certificacion)
              <tr><th>Curso</th><td>{{ $certificado->nombre_certificacion }}</td></tr>
            @endif
            @if($certificado->domicilio)
              <tr><th>Domicilio</th><td>{{ $certificado->domicilio }}</td></tr>
            @endif
            @if($certificado->equipo_tipo)
              <tr><th>Tipo de equipo</th><td>{{ $certificado->equipo_tipo }}</td></tr>
            @endif
            @if($certificado->equipo_marca)
              <tr><th>Marca</th><td>{{ $certificado->equipo_marca }}</td></tr>
            @endif
            @if($certificado->equipo_modelo)
              <tr><th>Modelo</th><td>{{ $certificado->equipo_modelo }}</td></tr>
            @endif
            @if($certificado->equipo_serial)
              <tr><th>Serial</th><td>{{ $certificado->equipo_serial }}</td></tr>
            @endif
            @if($certificado->codigo_interno)
              <tr><th>Código interno</th><td>{{ $certificado->codigo_interno }}</td></tr>
            @endif
            @if($certificado->capacidad_certificada)
              <tr><th>Capacidad certificada</th><td>{{ $certificado->capacidad_certificada }}</td></tr>
            @endif
            @if($certificado->normas_aplicadas)
              <tr><th>Normas aplicadas</th><td>{{ $certificado->normas_aplicadas }}</td></tr>
            @endif
            @if($certificado->lugar_inspeccion)
              <tr><th>Lugar de inspección</th><td>{{ $certificado->lugar_inspeccion }}</td></tr>
            @endif
            <tr><th>Fecha de creación</th><td>{{ $certificado->fecha_emision->format('d/m/Y') }}</td></tr>
            <tr>
              <th>Fecha de vencimiento</th>
              <td>{{ $certificado->fecha_vencimiento ? $certificado->fecha_vencimiento->format('d/m/Y') : 'No aplica' }}</td>
            </tr>
            <tr>
              <th>Estado</th>
              <td>
                <span class="badge badge-{{ $certificado->estado_actual === 'vigente' ? 'success' : ($certificado->estado_actual === 'vencido' ? 'warning' : 'danger') }}">
                  {{ $certificado->estado_texto }}
                </span>
              </td>
            </tr>
            @if($certificado->observaciones)
              <tr><th>Observaciones</th><td>{{ $certificado->observaciones }}</td></tr>
            @endif
          </table>
        </div>

        <div class="col-md-5 text-center">
          <div class="bg-white p-3 d-inline-block">
            {!! QrCode::size(280)->margin(2)->errorCorrection('H')->generate(route('certificados.verificar', $certificado->token)) !!}
          </div>
          <p class="mt-3 mb-1"><strong>URL de validación</strong></p>
          <a href="{{ route('certificados.verificar', $certificado->token) }}" target="_blank" style="word-break: break-all;">
            {{ route('certificados.verificar', $certificado->token) }}
          </a>
          <div class="mt-3">
            <a href="{{ route('certificados.qr', $certificado->id) }}" class="btn btn-primary">
              <i class="material-icons">file_download</i> Descargar QR
            </a>
            <a href="{{ route('certificados.verificar', $certificado->token) }}" target="_blank" class="btn btn-secondary">
              <i class="material-icons">open_in_new</i> Verificar
            </a>
          </div>
        </div>
      </div>

      <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
  </div>
</div>
@endsection
