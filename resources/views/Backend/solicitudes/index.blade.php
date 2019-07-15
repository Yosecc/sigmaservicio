@extends ('Backend.layout.layout')

@section('content')
@php
  use Carbon\Carbon;
@endphp

<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h3 class="card-title "><b>Solicitudes de Reservas </b></h3>

{{-- 
                  <a href="{{ route('servicios.create')}}" class="card-category pl-2">
                    <i class="fas fa-plus-circle"></i> Agregar Servicio
                  </a> --}}

                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <input id="mostra_vista" value="servicios" hidden disabled>
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Pais</th>
                          <th>Reserva</th>
                          <th>Adultos</th>
                          <th>Niños</th>
                          <th>Tour</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($solicitudes as $solicitud)
                        <tr>
                          <td>
                              {{ $solicitud->id }}
                          </td>
                          <td>
                              {{ $solicitud->nombre }}
                          </td>
                          <td>
                              {{ $solicitud->email }}
                          </td>
                          <td>
                              {{ $solicitud->pais }}
                          </td>
                          <td>
                            {{ Carbon::parse($solicitud->desde)->format('d-m-Y') }} AL {{ Carbon::parse($solicitud->hasta)->format('d-m-Y') }}
                          </td>
                          <td>
                             {{ $solicitud->adultos }}
                          </td>
                          <td>
                             {{ $solicitud->ninos }}
                          </td>
                          <td>
                             {{ $solicitud->tour }}
                          </td>
                          
                          {{-- <td class="td-actions">
                            <div class="btn-group">
                            <a href="{{ route('servicios.edit',$solicitud->id) }}" title="Editar" class="p-2 btn btn-primary">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="{{ route('servicios.destroy',$solicitud->id) }}" title="Eliminar" class="p-2  btn btn-primary">
                              <i class="fas fa-times"></i>
                            </a>
                            </div>
                           
                          </td> --}}
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
