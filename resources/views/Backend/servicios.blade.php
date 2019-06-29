@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tours</h4>


                  <a href="{{ route('formservicio')}}" class="card-category">
                  
                    <i class="material-icons">add_to_queue</i>
                
                   Agregar Servicio</a>

                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <input id="mostra_vista" value="servicios" hidden disabled>
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          Nombre
                        </th>
                        <th>
                          Costo
                        </th>
                        <th>
                          Categoria
                        </th>
                        <th>
                        Fecha Publicación
                        </th>
												<th>
													Acciones
												</th>
                      </tr></thead>
                      <tbody>

                        @foreach($servicios as $servicio)
                        <tr>
                          <td>
                              {{ $servicio->titulo_servicio }}
                          </td>
                          <td>
                            {{ $servicio->monto }}
                          </td>
                          <td>
                             {{ $servicio->nombre_categoria }}
                          </td>
                          <td>
                            {{ $servicio->created_at}}
                          </td>
                          <td class="td-actions">
                            <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscarservicio',['id'=>$servicio->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Editar">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('eliminarservicio',['id'=>$servicio->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Remover">
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
