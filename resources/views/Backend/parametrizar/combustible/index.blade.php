@extends ('Backend.layout.layout')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <div class="row">
          <div class="col">
            <h4 class="card-title ">Combustibles</h4>            
          </div>
          <div class="col-md-5">
            <form class="row" action="{{ route('combustibles.store') }}" method="post" autocomplete="off">
              {{ csrf_field() }}
              <div class="col">
                <input
                  name="descripcion" 
                  type="text" 
                  class="form-control" 
                  placeholder="Ingrese el combustible de vehiculo" 
                  required
                  style="color: white !important;" 
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
              @forelse($combustibles as $combustible)
              <tr>
                <td>{{ $combustible->descripcion }}</td>                
                <td>{{ $combustible->created_at->format('d-m-Y') }}</td>
                <td class="td-actions text-center">
                  <button class="btn btn-primary"
                    data-target="#editarCombustible{{ $combustible->id }}"
                    data-toggle="modal"
                    title="Editar"
                  >
                    <i class="material-icons">edit</i>
                  </button>
                  <button class="btn btn-primary" 
                    data-target="#eliminarCombustible{{ $combustible->id }}"
                    data-toggle="modal"
                    title="Eliminar"
                  >
                    <i class="material-icons">delete_forever</i>
                  </button>
                </td>
              </tr>
               <!-- Modal Editar Combustible -->
              @include('Backend.parametrizar.combustible.component.editCombustible')
              <!-- End Modal Editar Combustible -->

              <!-- Modal Eliminar Combustible -->
              @include('Backend.parametrizar.combustible.component.deleteCombustible')
              <!-- End Modal Eliminar Combustible -->
              @empty
                <td class="text-center"colspan="3">
                  <h3>No hay combustibles registrados</h3>
                </td>
              @endforelse
            </tbody>
          </table>
          {{ $combustibles->links() }}
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
