@extends ('Backend.layout.layout')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary pb-0">
        <div class="row m-0">
          <div class="col-4">
            <h4 class="card-title ">Tipos de subasta</h4>            
          </div>
          <div class="col-md-5 offset-md-3 text-right">
            <a class="btn btn-primary btn-sm" href="{{ route('tipo_subastas.create') }}">
              Crear
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <tr class="">
                <th width="20%">Nombre</th>
                <th width="10%">País</th>
                <th width="10%">Fecha inicio</th>
                <th width="10%">Hora inicio</th>
                <th width="10%">Fecha fin</th>
                <th width="10%">Hora fin</th>
                <th width="10%" class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse($tiposSubasta as $tipoSubasta)
              <tr>
                <td>{{ $tipoSubasta->descripcion }}</td>   
                <td>{{ $tipoSubasta->pais->desc }}</td>             
                <td>{{ $tipoSubasta->fecha_inicio->format('d-m-Y') }}</td>
                <td>{{ $tipoSubasta->fecha_inicio->format('H:i') }}</td>
                <td>{{ $tipoSubasta->fecha_fin->format('d-m-Y') }}</td>
                <td>{{ $tipoSubasta->fecha_fin->format('H:i') }}</td>
                <td class="td-actions text-center">
                  {{-- <button class="btn btn-primary"
                    data-target="#editarTipoSubasta{{ $tipoSubasta->id }}"
                    data-toggle="modal"
                    title="Editar" 
                  > --}}
                  <a class="btn btn-primary" title="Editar" href="{{ route('tipo_subastas.edit', $tipoSubasta->id) }}">
                    <i class="material-icons">edit</i>
                  </a>
                  <button class="btn btn-primary" 
                    data-target="#eliminarTipoSubasta{{ $tipoSubasta->id }}"
                    data-toggle="modal"
                    title="Eliminar" 
                  >
                    <i class="material-icons">delete_forever</i>
                  </button>
                </td>
              </tr>
               <!-- Modal Editar TipoSubasta -->
              @include('Backend.parametrizar.subasta.component.editTipoSubasta')
              <!-- End Modal Editar TipoSubasta -->
             
              <!-- Modal Eliminar TipoSubasta -->
              @include('Backend.parametrizar.subasta.component.deleteTipoSubasta')
              <!-- End Modal Eliminar TipoSubasta -->
              @empty
                <td class="text-center"colspan="6">
                  <h3>No hay tipos de subasta registrados</h3>
                </td>
              @endforelse
            </tbody>
          </table>
          {{ $tiposSubasta->links() }}
        </div>
      </div>
    </div>
  </div>
</div>



@endsection

@push('scripts')
<script>
  $(function(){

  })
</script>
@endpush
