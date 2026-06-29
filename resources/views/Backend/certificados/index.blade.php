@extends('Backend.layout.layout')

@section('content')
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Certificados QR</h4>
      <div class="card-category">
        <a href="{{ route('certificados.create') }}" class="text-white mr-3">
          <i class="fas fa-plus-circle"></i> Registrar certificado
        </a>
        <a href="{{ route('certificados.importar.form') }}" class="text-white">
          <i class="fas fa-file-import"></i> Importar CSV
        </a>
      </div>
    </div>
    <div class="card-body">
      <input id="mostra_vista" value="certificados" hidden disabled>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <form method="GET" action="{{ route('certificados.index') }}" class="row mb-4">
        <div class="col-md-4">
          <label>Buscar</label>
          <input type="text" name="q" class="form-control"
            value="{{ request('q') }}"
            placeholder="Número, titular del certificado, documento o certificación">
        </div>
        <div class="col-md-2">
          <label>Estado</label>
          <select name="estado" class="form-control">
            <option value="">Todos</option>
            <option value="vigente" {{ request('estado') === 'vigente' ? 'selected' : '' }}>Vigente</option>
            <option value="vencido" {{ request('estado') === 'vencido' ? 'selected' : '' }}>Vencido</option>
            <option value="anulado" {{ request('estado') === 'anulado' ? 'selected' : '' }}>Anulado</option>
          </select>
        </div>
        <div class="col-md-2">
          <label>Certificación desde</label>
          <input type="date" name="desde" class="form-control" value="{{ request('desde') }}">
        </div>
        <div class="col-md-2">
          <label>Certificación hasta</label>
          <input type="date" name="hasta" class="form-control" value="{{ request('hasta') }}">
        </div>
        <div class="col-md-2 d-flex align-items-end">
          <button class="btn btn-primary mr-2" type="submit">
            <i class="fas fa-search"></i>
          </button>
          <a href="{{ route('certificados.index') }}" class="btn btn-secondary" title="Limpiar filtros">
            <i class="fas fa-eraser"></i>
          </a>
        </div>
      </form>

      <div class="table-responsive">
        <table class="table">
          <thead class="text-primary">
            <tr>
              <th>Número</th>
              <th>Tipo</th>
              <th>Titular / cliente</th>
              <th>Empresa / detalle</th>
              <th>Fecha de certificación</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse($certificados as $certificado)
              <tr>
                <td>{{ $certificado->numero_certificado }}</td>
                <td>{{ $certificado->tipo_texto }}</td>
                <td>{{ $certificado->nombre_principal }}</td>
                <td>
                  {{ $certificado->nombre_empresa }}
                  @if($certificado->tipo_certificado === 'persona' && $certificado->nombre_certificacion)
                    <br><small>{{ $certificado->nombre_certificacion }}</small>
                  @elseif($certificado->tipo_certificado === 'empresa' && $certificado->equipo_tipo)
                    <br><small>{{ $certificado->equipo_tipo }}</small>
                  @endif
                </td>
                <td>{{ $certificado->fecha_emision->format('d/m/Y') }}</td>
                <td>
                  <span class="badge badge-{{ $certificado->estado_actual === 'vigente' ? 'success' : ($certificado->estado_actual === 'vencido' ? 'warning' : 'danger') }}">
                    {{ $certificado->estado_texto }}
                  </span>
                </td>
                <td class="td-actions">
                  <a href="{{ route('certificados.show', $certificado->id) }}" class="btn btn-primary" title="Ver y descargar QR">
                    <i class="material-icons">qr_code</i>
                  </a>
                  <a href="{{ route('certificados.qr', $certificado->id) }}" class="btn btn-primary" title="Descargar QR">
                    <i class="material-icons">file_download</i>
                  </a>
                  <a href="{{ route('certificados.edit', $certificado->id) }}" class="btn btn-primary" title="Editar">
                    <i class="material-icons">edit</i>
                  </a>
                  <a href="{{ route('certificados.verificar', $certificado->token) }}" target="_blank" class="btn btn-primary" title="Abrir verificación pública">
                    <i class="material-icons">open_in_new</i>
                  </a>
                  <form method="POST" action="{{ route('certificados.destroy', $certificado->id) }}"
                    class="d-inline"
                    onsubmit="return confirm('¿Está seguro de eliminar el certificado {{ addslashes($certificado->numero_certificado) }}? El código QR dejará de ser válido.');">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger" title="Eliminar">
                      <i class="material-icons">delete_forever</i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center">No se encontraron certificados.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{ $certificados->appends(request()->query())->links() }}
    </div>
  </div>
</div>
@endsection
