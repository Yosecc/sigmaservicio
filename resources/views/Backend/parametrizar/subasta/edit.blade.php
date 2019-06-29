@extends ('Backend.layout.layout')

@section('styles')
  <link rel="stylesheet" href="{{ asset('plugins/flatpickr-master/flatpickr.min.css') }}">
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <div class="row m-0">
          <div class="col-4">
            <h4 class="card-title ">Tipos de subasta</h4>            
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('tipo_subastas.update', $tipoSubasta->id) }}" class="container-fluid" method="post" autocomplete="off">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="row">
            <div class="col form-group">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="" style="background-color: white;" required value="{{ $tipoSubasta->descripcion }}">
            </div>
            <div class="col form-group">
              <label for="pais">País</label>
              <select name="pais" id="pais" class="form-control">
                <option value="" disabled selected>Seleccione</option>
                @foreach ($paises as $pais)
                  <option value="{{ $pais->id }}" {{ empty($pais) ? '':($tipoSubasta->pais->id == $pais->id) ? 'selected':'' }}>{{ $pais->desc }}</option>
                @endforeach
              </select>
            </div>
            <div class="col form-group">
              <label for="fecha_inicio">Fecha inicio</label>
              <input type="text" id="fecha_inicio" class="form-control flatpickr flatpickr-input" data-id="datetime" readonly=""  name="fecha_inicio" style="background-color: white;" required value="{{ $tipoSubasta->fecha_inicio }}">
            </div>
            <div class="col form-group">
              <label for="fecha_fin">Fecha Fin</label>
              <input type="text" id="fecha_fin" class="form-control flatpickr flatpickr-input" data-id="datetime" readonly="" name="fecha_fin" style="background-color: white;" required value="{{ $tipoSubasta->fecha_fin }}">
            </div>
          </div>
          <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('plugins/flatpickr-master/flatpickr.min.js') }}"></script>
<script>
  $(function(){
    $(".flatpickr").flatpickr({
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      minDate: "today"
    });
  })
</script>
@endpush
