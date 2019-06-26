@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Vehículos Registrados</h4>
      <a href="{{ route('vehiculos.create')}}" class="card-category">
      <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
        {{-- <i class="material-icons">person_add</i> --}}
        <i class="fa fa-plus"></i>
        <i class="fa fa-car"></i>
      </button>
       Agregar vehiculo</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <input id="mostra_vista" value="usuarios" hidden disabled>
        <table class="table">
          <thead class=" text-primary">
            <tr class="text-center">
              <th>#</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Tipo</th>
              <th width="20%">Fecha de matriculación</th>
             {{--  <th>Inicio</th>
              <th>Fin</th> --}}
              <th>Registrado por</th>
              <th>Acciones</th>
             {{--  <th>Correo Electrónico</th>
              <th>Rol</th>
              <th>Fecha Creacion/Modificación</th>
  						<th>Accione</th> --}}
            </tr>
          </thead>
          <tbody>
            @forelse($vehiculos as $vehiculo)
            <tr class="text-center">
              <td>{{ $vehiculo->id }}</td>
              <td>{{ $vehiculo->marca->descripcion }}</td>
              <td>{{ $vehiculo->modelo->descripcion }}</td>
              <td>{{ $vehiculo->tipo->descripcion }}</td>
              <td>
                {{ (new Carbon\Carbon($vehiculo->fecha_matriculacion))->format('d-m-Y') }}
              </td>
              {{-- <td>
                {{ $vehiculo->tipo->id==3?(new Carbon\Carbon($vehiculo->inicio))->format('d-m-Y'):"N/A" }}
              </td>
              <td>
                {{ $vehiculo->tipo->id==3?(new Carbon\Carbon($vehiculo->fin))->format('d-m-Y'):"N/A" }}
              </td> --}}
              <td>{{ $vehiculo->usuario->name }}</td>
              <td class="td-actions">
                <button class="btn btn-primary" 
                  data-target="#verVehiculo{{ $vehiculo->id }}"  
                  data-toggle="modal"
                  title="Detalles"
                >
                  <i class="material-icons">remove_red_eye</i>
                </button>
                <a class="btn btn-primary" title="Galeria" href="{{ route('vehiculos.fotos.index', $vehiculo->id) }}">
                  <i class="material-icons">photo_camera</i>
                </a>
                <a class="btn btn-primary" title="Daños" href="{{ route('vehiculos.daños.index', $vehiculo->id) }}">
                  <i class="material-icons">mood_bad</i>
                </a>
                <a class="btn btn-primary" href="{{ route('vehiculos.edit', $vehiculo->id) }}" title="Editar">
                  <i class="material-icons">edit</i>
                </a>
                <button class="btn btn-primary" 
                    data-target="#eliminarVehiculo{{ $vehiculo->id }}"
                    data-toggle="modal"
                    title="Eliminar"
                  >
                    <i class="material-icons">delete_forever</i>
                  </button>
              </td>
            </tr>
            {{-- Modal Ver Ficha --}}
            <div class="modal fade" id="verVehiculo{{ $vehiculo->id }}" tabindex="-1" role="dialog" aria-labelledby="verVehiculoTitle{{ $vehiculo->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered " role="document" style="max-width: 1000px;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitles{{ $vehiculo->id }}">
                      Ficha vehiculo {{ $vehiculo->id }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      {{-- Ficha de vehiculo --}}
                      @include('Backend.vehiculos.partials.ficha')
                    </div>
                  </div>
                  <div class="modal-footer">       
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                      Cerrar
                    </button>
                  </div>
                </div>
              </div>
            </div>
            {{-- Fin Modal Ver Ficha --}}
            {{-- Modal Eliminar Vehiculo --}}
            <div class="modal fade" id="eliminarVehiculo{{ $vehiculo->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarVehiculoTitle{{ $vehiculo->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle{{ $vehiculo->id }}">
                      Eliminar vehiculo
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ¿ Está seguro de eliminar vehiculo #{{ $vehiculo->id }} ?
                  </div>
                  <div class="modal-footer">
                    <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="post">  
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}        
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Si</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            {{-- Fin Modal Eliminar Vehiculo --}}
            @empty
              <td colspan="2">
                <h3 class="text-center">No hay vehículos registrados</h3>
              </td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



@endsection

@push('scripts')
@endpush
