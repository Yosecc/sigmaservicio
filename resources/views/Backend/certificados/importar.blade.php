@extends('Backend.layout.layout')

@section('styles')
  @include('Backend.certificados._styles')
@endsection

@section('content')
<div class="col-md-10">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">Importar certificados desde CSV</h4>
      <p class="card-category">Carga masiva de certificados para personas y empresas.</p>
    </div>
    <div class="card-body">
      <input id="mostra_vista" value="certificados" hidden disabled>

      @if(isset($errors) && $errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      @endif

      @if(session('import_errors'))
        <div class="alert alert-danger">
          <strong>No se importó ningún registro. Corrija estas filas:</strong>
          <ul class="mt-2 mb-0" style="max-height: 300px; overflow-y: auto;">
            @foreach(session('import_errors') as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="alert alert-info">
        <strong>Cómo realizar la importación</strong>
        <ol class="mb-0 mt-2">
          <li>Descargue la plantilla oficial.</li>
          <li>Conserve los encabezados y complete una fila por certificado.</li>
          <li>Use <code>persona</code> o <code>empresa</code> en la columna tipo.</li>
          <li>Guarde el archivo como CSV y súbalo aquí.</li>
        </ol>
      </div>

      <a href="{{ route('certificados.plantilla') }}" class="btn btn-success mb-4">
        <i class="material-icons">file_download</i> Descargar plantilla CSV
      </a>

      <form method="POST" action="{{ route('certificados.importar') }}"
        enctype="multipart/form-data" class="certificado-form" autocomplete="off">
        {{ csrf_field() }}

        <div class="form-group">
          <label>Archivo CSV *</label>
          <input type="file" id="archivo_csv" name="archivo_csv" class="form-control certificado-file"
            accept=".csv,text/csv" required>
          <small class="text-muted">Tamaño máximo: 5 MB. Se aceptan archivos separados por punto y coma o coma.</small>
        </div>

        <div class="text-right">
          <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">
            <i class="material-icons">cloud_upload</i> Importar certificados
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
