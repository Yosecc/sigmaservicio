@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Usuarios Registrados en la Web</h4>
      {{-- <a href="{{ route('formusuario')}}" class="card-category">
      <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
        <i class="material-icons">person_add</i>
      </button>
       Agregar usuario</a> --}}
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <tr>
              <th >Nombre(s)</th>
              <th >Apellido(s)</th>
              <th width="20%">Número Fiscal</th>
              <th width="20%">Correo Electrónico</th>
  						<th width="10%">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse($usuarios as $usuario)
            <tr>
              <td>{{ $usuario->nombres }}</td>
              <td>{{ $usuario->apellidos }}</td>
              <td>{{ $usuario->numero_fiscal }}</td>
              <td>{{ $usuario->email }}</td>
              <td class="td-actions">
                <button type="button" class="btn btn-white btn-primary btn-link btn-sm"          
                  data-original-title="Editar" 
                  data-target="#fichaUsuario{{ $usuario->id }}"
                  data-toggle="modal"
                  title="Ver Ficha" 
                >
                  <i class="material-icons">remove_red_eye</i>
                </button>
              </td>
            </tr>
            <!-- Modal Ficha -->
            @include('Backend.usuarios.registros.partials.modalFicha')
            <!-- Fin Modal Ficha -->
            @empty
              <td class="text-center" colspan="4">
                <h3>No hay usuarios registrados</h3>
              </td>
            @endforelse
          </tbody>
        </table>
        {{ $usuarios->links() }}
      </div>
    </div>
  </div>
</div>



@endsection

@push('scripts')
@endpush
