@extends ('Backend.layout.layout')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <div class="row">
          <div class="col-4">
            <h4 class="card-title ">Marcas</h4>            
          </div>
          <div class="col-md-5">
            <form class="row" action="{{ route('marcas.store') }}" method="post" autocomplete="off">
              {{ csrf_field() }}
              <div class="col">
                <input
                  name="descripcion" 
                  type="text" 
                  class="form-control" 
                  placeholder="Ingrese la marca de vehiculo" 
                  required
                   
                >
              </div>
              <div class="col-md-2">
                <button class="btn btn-secondary btn-sm">Crear</button>                
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <tr class="">
                <th width="40%">Nombre</th>
                <th width="40%">Fecha de creación</th>
                <th width="20%" class="text-center">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @forelse($marcas as $marca)
              <tr>
                <td>{{ $marca->descripcion }}</td>                
                <td>{{ $marca->created_at->format('d-m-Y') }}</td>
                <td class="td-actions text-center">
                  <button class="btn btn-primary"
                    data-target="#editarMarca{{ $marca->id }}"
                    data-toggle="modal"
                    title="Editar"
                  >
                    <i class="material-icons">edit</i>
                  </button>
                  <button class="btn btn-primary" 
                    data-target="#eliminarMarca{{ $marca->id }}"
                    data-toggle="modal"
                    title="Eliminar"
                  >
                    <i class="material-icons">delete_forever</i>
                  </button>
                </td>
              </tr>
               <!-- Modal Editar Marca -->
              @include('Backend.parametrizar.marca.component.editMarca')
              <!-- End Modal Editar Marca -->

              <!-- Modal Eliminar Marca -->
              @include('Backend.parametrizar.marca.component.deleteMarca')
              <!-- End Modal Eliminar Marca -->
              @empty
                <td class="text-center"colspan="3">
                  <h3>No hay marcas registrados</h3>
                </td>
              @endforelse
            </tbody>
          </table>
          {{ $marcas->links() }}
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
