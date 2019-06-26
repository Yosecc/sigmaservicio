@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Preguntas Frecuentes</h4>
                  <a href="{{ route('formpregunta')}}" class="card-category">
                  <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
                    <i class="material-icons">not_listed_location</i>
                  </button>
                   Agregar Pregunta Frecuente</a>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <input id="mostra_vista" value="preguntas" hidden disabled>
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>
                          Pregunta
                        </th>
                        <th>
                          Público
                        </th>
                        <th>
                          Posición
                        </th>
                        <th>
                        Fecha Publicación
                        </th>
												<th>
													Acciones
												</th>
                      </tr></thead>
                      <tbody>

                        @foreach($preguntas as $pregunta)
                        <tr>
                          <td>
                              {{ $pregunta->pregunta }}
                          </td>
                          <td>
                            {{ $pregunta->publico}}
                          </td>
                          <td>
                            {{ $pregunta->posicion_pregunta}}
                          </td>
                          <td>
                            {{ $pregunta->updated_at}}
                          </td>
                          <td class="td-actions">
                            <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscarpregunta',['id'=>$pregunta->id])}}'"  class="btn btn-white btn-link btn-sm" data-original-title="Editar">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('eliminarpregunta',['id'=>$pregunta->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Remover">
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
