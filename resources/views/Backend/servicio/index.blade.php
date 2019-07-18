@extends ('Backend.layout.layout')

@section('content')
<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title "><b>Servicios</b></h3>


                  <a href="{{ route('admin.servicio.create')}}" class="card-category pl-2">
                    <i class="fas fa-plus-circle"></i> Agregar servicio
                  </a>

                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <input id="mostra_vista" value="servicios" hidden disabled>
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                         Título
                        </th>
                        <th>
                         Categoría
                        </th>
                        <th>
                          Posición
                        </th>
                        <th>
                          Público
                        </th>
                        <th>
                          Acciones
                        </th>
                      </tr></thead>
                      <tbody>

                        @foreach($servicios as $servicio)
                        <tr>
                          <td>
                            {{ $servicio->nombre }}
                          </td>
                          <td>
                          {{ $servicio->categoria->titulo }}
                          </td>
                          <td>
                          {{ $servicio->posicion }}
                          </td>
                          <td>
                            @if ($servicio->publico == 1)
                              Activo
                            @else
                              Inactivo
                            @endif
                           
                          </td>
                          <td class="td-actions">
                            <div class="btn-group">
                            <a href="{{ route('admin.servicio.edit',$servicio->id) }}" title="Editar" class="p-2 btn btn-primary">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('admin.servicio.show',$servicio->id) }}" title="Visualizar" class="p-2 btn btn-primary">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a title="Eliminar" class="p-2  btn btn-primary" onclick="event.preventDefault();
                    document.getElementById ('{{'delete_form'.$servicio->id}}').submit();">
                              <i class="fas fa-times"></i>
                            </a>
                    
                            </div>
                            <form id="{{'delete_form'.$servicio->id}}" action="{{ route('admin.servicio.destroy', ['id' => $servicio->id]) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}</form>
                           
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