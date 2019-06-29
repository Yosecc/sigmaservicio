@extends ('Backend.layout.layout')

@section('content')
@php
  use Carbon\Carbon;
@endphp

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title "><b>Tours</b></h3>


                  <a href="{{ route('servicios.create')}}" class="card-category pl-2">
                    <i class="fas fa-plus-circle"></i> Agregar Servicio
                  </a>

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
                          Fechas disponibles
                        </th>
                        <th>
                          Horario
                        </th>
                        <th>
                          Estado
                        </th>
                        <th>
                          Acciones
                        </th>
                      </tr></thead>
                      <tbody>

                        @foreach($tours as $tour)
                        <tr>
                          <td>
                              {{ $tour->nombre }}
                          </td>
                          <td>
                            {{ Carbon::parse($tour->fechaDesde)->format('d-m-Y') }} AL {{ Carbon::parse($tour->fechaHasta)->format('d-m-Y') }}
                          </td>
                          <td>
                             {{ $tour->horarioDesde }} - {{ $tour->horarioHasta }}
                          </td>
                          <td>
                            @if ($tour->estado == 1)
                              Activo
                            @elseif($tour->estado == 2)
                              Inactivo
                            @endif
                           
                          </td>
                          <td class="td-actions">
                            <div class="btn-group">
                            <a href="{{ route('servicios.edit',$tour->id) }}" title="Editar" class="p-2 btn btn-primary">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('servicios.destroy',$tour->id) }}" title="Eliminar" class="p-2  btn btn-primary">
                              <i class="fas fa-times"></i>
                            </a>
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

@push('scripts')
@endpush
