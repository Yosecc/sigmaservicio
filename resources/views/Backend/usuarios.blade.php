@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Administrar Usuarios Registrados</h4>
      <a href="{{ route('formusuario')}}" class="card-category">
      <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
        <i class="material-icons">person_add</i>
      </button>
       Agregar usuario</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <input id="mostra_vista" value="usuarios" hidden disabled>
        <table class="table">
          <thead class=" text-primary">
            <tr>
              <th>
                Usuario
              </th>
              <th>
                Correo Electrónico
              </th>
              <th>
                Rol
              </th>
              <th>
                Fecha Creacion/Modificación
              </th>
  						<th>
  							Acciones
  						</th>
            </tr>
          </thead>
          <tbody>
            @foreach($usuarios as $usuario)
            <tr>
              <td>
                  {{ $usuario->name }}
              </td>
              <td>
                {{ $usuario->email }}
              </td>
              <td>
                 {{ $usuario->description }}
              </td>
              <td>
                {{ $usuario->created_at}}
              </td>
              <td class="td-actions">
                <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscarusuario',['id'=>$usuario->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Editar">
                  <i class="material-icons">edit</i>
                </button>
                <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('eliminarusuario',['id'=>$usuario->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Remover">
                  <i class="material-icons">close</i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



@endsection

@push('scripts')
@endpush
