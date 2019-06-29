@extends ('Backend.layout.layout')

@section('content')
<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title "><b>marcas</b></h3>


                  <a href="{{ route('admin.marca.create')}}" class="card-category pl-2">
                    <i class="fas fa-plus-circle"></i> Agregar marcas
                  </a>

                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <input id="mostra_vista" value="servicios" hidden disabled>
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                         Titulo
                        </th>
                        <th>
                          Posicion
                        </th>
                        <th>
                          Publico
                        </th>
                        <th>
                          Acciones
                        </th>
                      </tr></thead>
                      <tbody>

                        @foreach($marcas as $marca)
                        <tr>
                          <td>
                              {{ $marca->titulo }}
                          </td>
                          <td>
                          {{ $marca->posicion }}
                          </td>
                          <td>
                            @if ($marca->publico == 1)
                              Activo
                            @else
                              Inactivo
                            @endif
                           
                          </td>
                          <td class="td-actions">
                            <div class="btn-group">
                            <a href="{{ route('admin.marca.edit',$marca->id) }}" title="Editar" class="p-2 btn btn-primary">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('admin.marca.show',$marca->id) }}" title="Visualizar" class="p-2 btn btn-primary">
                              <i class="fas fa-eye"></i>
                            </a>
                            <a title="Eliminar" class="p-2  btn btn-primary" onclick="event.preventDefault();
                    document.getElementById ('{{'delete_form'.$marca->id}}').submit();">
                              <i class="fas fa-times"></i>
                            </a>
                    <form id="{{'delete_form'.$marca->id}}" action="{{ route('admin.marca.destroy', ['id' => $marca->id]) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}</form>
                            </div>
                           
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