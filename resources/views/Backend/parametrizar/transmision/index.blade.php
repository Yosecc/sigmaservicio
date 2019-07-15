@extends ('Backend.layout.layout')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <div class="row">
          <div class="col-4">
            <h4 class="card-title ">Transmisiones</h4>            
          </div>
          <div class="col-md-5">
            <form class="row" action="{{ route('transmision.store') }}" method="post" autocomplete="off">
              {{ csrf_field() }}
              <div class="col">
                <input
                  name="descripcion" 
                  type="text" 
                  class="form-control" 
                  placeholder="Ingrese la transmisión del vehiculo" 
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
              @forelse($transmisiones as $transmision)
              <tr>
                <td>{{ $transmision->descripcion }}</td>                
                <td>{{ $transmision->created_at->format('d-m-Y') }}</td>
                <td class="td-actions text-center">
                  <button class="btn btn-primary"
                    data-target="#editarTransmision{{ $transmision->id }}"
                    data-toggle="modal"
                    title="Editar"
                  >
                    <i class="material-icons">edit</i>
                  </button>
                  <button class="btn btn-primary" 
                    data-target="#eliminarTransmision{{ $transmision->id }}"
                    data-toggle="modal"
                    title="Eliminar"
                  >
                    <i class="material-icons">delete_forever</i>
                  </button>
                </td>
              </tr>
               <!-- Modal Editar Transmision -->
              @include('Backend.parametrizar.transmision.component.editTransmision')
              <!-- End Modal Editar Transmision -->

              <!-- Modal Eliminar Transmision -->
              @include('Backend.parametrizar.transmision.component.deleteTransmision')
              <!-- End Modal Eliminar Transmision -->
              @empty
                <td colspan=3 class="text-center">
                  <h3>No hay transmisiones registradas</h3>
                </td>
              @endforelse
            </tbody>
          </table>
          {{ $transmisiones->links() }}
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
