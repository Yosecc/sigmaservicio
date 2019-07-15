@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
    <input id="mostra_vista" value="tramites" hidden disabled>
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Trámites:</span>
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#atender" data-toggle="tab">
                            <i class="material-icons">alarm</i> Por Atender
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#proceso" data-toggle="tab">
                            <i class="material-icons">hourglass_empty</i> En Proceso
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#finalizada" data-toggle="tab">
                            <i class="material-icons">done_outline</i> Finalizada
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#rechadaza" data-toggle="tab">
                            <i class="material-icons">thumb_down</i> Rechazada
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="atender">
                          <table class="table">
                              @php
                                $vista1=0;
                            @endphp
                              
                              @foreach($solicitantesdatos as $solicitantesdato)
                              
                              @if($solicitantesdato["status"]=="atender")
                              @php
                                  $vista1=1
                              @endphp                              
                              @endif                                
                              @endforeach
                              @if ($vista1==1)                              
                              <thead class=" text-primary">
                                  <tr><th>
                                    Solicitante
                                  </th>
                                  <th>
                                    Teléfono
                                  </th>
                                  <th>
                                    Correo
                                  </th>
                                  <th>
                                    Tipo Trámite
                                  </th>
                                  <th>
                                    Servicio
                                  </th>
                                  <th>
                                    Estatus
                                  </th>
                                  <th>
                                    Fecha
                                  </th>
                                  <th>
                                    Acción
                                  </th>
                                </tr></thead>
                                
                                <tbody>                       
                                  @foreach($solicitantesdatos as $solicitantesdato)
                                  @if($solicitantesdato["status"]=="atender")
                                  <tr>
                                      <td>
                                          {{ $solicitantesdato["nombres"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["tel_cel"] }}/{{ $solicitantesdato["tel_home"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["correo"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["tipo_tramite"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["servicios"] }}
                                      </td>
                                      <td>
                                      @switch($solicitantesdato["status"])
                                          @case("atender")
                                          Por Atender
                                              @break
                                          @case("proceso")
                                          En Proceso
                                              @break
                                          @case("finalizada")
                                          Finalizada
                                              @break
                                          @case("rechazada")
                                          Rechazada
                                              @break
                                          @default
                                              
                                      @endswitch           
                                      </td>
                                      <td>
                                          {{ $solicitantesdato["fecha"] }}
                                        </td>                          
                                      <td class="td-actions">
                                        <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscartramite',['id_servicio'=>$solicitantesdato['id_servicio'],'id_solicitante'=>$solicitantesdato['id_solicitante']])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Ver Detalles">
                                          <i class="material-icons">visibility</i>
                                        </button>                            
                                      </td>
                                    </tr>
                                  @endif                                
                                  @endforeach                             
                                </tbody>
                                      
                              @else
                              <thead class=" text-primary">
                                  <tr><th>
                                    No Posee Trámites Por Anteder
                                  </th>
                                </tr></thead>
                              @endif         
                          </table>
                        </div>
                        <div class="tab-pane" id="proceso">
                          <table class="table">
                            @php
                                $vista1=0;
                            @endphp
                              
                              @foreach($solicitantesdatos as $solicitantesdato)
                              
                              @if($solicitantesdato["status"]=="proceso")
                              @php
                                  $vista1=1
                              @endphp                              
                              @endif                                
                              @endforeach
                              @if ($vista1==1)                              
                              <thead class=" text-primary">
                                  <tr><th>
                                    Solicitante
                                  </th>
                                  <th>
                                    Teléfono
                                  </th>
                                  <th>
                                    Correo
                                  </th>
                                  <th>
                                    Tipo Trámite
                                  </th>
                                  <th>
                                    Servicio
                                  </th>
                                  <th>
                                    Estatus
                                  </th>
                                  <th>
                                    Fecha
                                  </th>
                                  <th>
                                    Acción
                                  </th>
                                </tr></thead>
                                
                                <tbody>                       
                                  @foreach($solicitantesdatos as $solicitantesdato)
                                  @if($solicitantesdato["status"]=="proceso")
                                  <tr>
                                      <td>
                                          {{ $solicitantesdato["nombres"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["tel_cel"] }}/{{ $solicitantesdato["tel_home"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["correo"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["tipo_tramite"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["servicios"] }}
                                      </td>
                                      <td>
                                      @switch($solicitantesdato["status"])
                                          @case("atender")
                                          Por Atender
                                              @break
                                          @case("proceso")
                                          En Proceso
                                              @break
                                          @case("finalizada")
                                          Finalizada
                                              @break
                                          @case("rechazada")
                                          Rechazada
                                              @break
                                          @default
                                              
                                      @endswitch           
                                      </td>
                                      <td>
                                          {{ $solicitantesdato["fecha"] }}
                                        </td>                          
                                      <td class="td-actions">
                                        <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscartramite',['id_servicio'=>$solicitantesdato['id_servicio'],'id_solicitante'=>$solicitantesdato['id_solicitante']])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Ver Detalles">
                                          <i class="material-icons">visibility</i>
                                        </button>                            
                                      </td>
                                    </tr>
                                  @endif                                
                                  @endforeach                             
                                </tbody>
                                      
                              @else
                              <thead class=" text-primary">
                                  <tr><th>
                                    No Posee Trámites En Proceso
                                  </th>
                                </tr></thead>
                              @endif
                              
                          </table>
                        </div>
                        <div class="tab-pane" id="finalizada">
                          <table class="table">
                              @php
                                $vista1=0;
                            @endphp
                              
                              @foreach($solicitantesdatos as $solicitantesdato)
                              
                              @if($solicitantesdato["status"]=="finalizada")
                              @php
                                  $vista1=1
                              @endphp                              
                              @endif                                
                              @endforeach
                              @if ($vista1==1)                              
                              <thead class=" text-primary">
                                  <tr><th>
                                    Solicitante
                                  </th>
                                  <th>
                                    Teléfono
                                  </th>
                                  <th>
                                    Correo
                                  </th>
                                  <th>
                                    Tipo Trámite
                                  </th>
                                  <th>
                                    Servicio
                                  </th>
                                  <th>
                                    Estatus
                                  </th>
                                  <th>
                                    Fecha
                                  </th>
                                  <th>
                                    Acción
                                  </th>
                                </tr></thead>
                                
                                <tbody>                       
                                  @foreach($solicitantesdatos as $solicitantesdato)
                                  @if($solicitantesdato["status"]=="finalizada")
                                  <tr>
                                      <td>
                                          {{ $solicitantesdato["nombres"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["tel_cel"] }}/{{ $solicitantesdato["tel_home"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["correo"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["tipo_tramite"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["servicios"] }}
                                      </td>
                                      <td>
                                      @switch($solicitantesdato["status"])
                                          @case("atender")
                                          Por Atender
                                              @break
                                          @case("proceso")
                                          En Proceso
                                              @break
                                          @case("finalizada")
                                          Finalizada
                                              @break
                                          @case("rechazada")
                                          Rechazada
                                              @break
                                          @default
                                              
                                      @endswitch           
                                      </td>
                                      <td>
                                          {{ $solicitantesdato["fecha"] }}
                                        </td>                          
                                      <td class="td-actions">
                                        <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscartramite',['id_servicio'=>$solicitantesdato['id_servicio'],'id_solicitante'=>$solicitantesdato['id_solicitante']])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Ver Detalles">
                                          <i class="material-icons">visibility</i>
                                        </button>                            
                                      </td>
                                    </tr>
                                  @endif                                
                                  @endforeach                             
                                </tbody>
                                      
                              @else
                              <thead class=" text-primary">
                                  <tr><th>
                                    No Posee Trámites Finalizados
                                  </th>
                                </tr></thead>
                              @endif 
                          </table>
                        </div>
                        <div class="tab-pane" id="rechadaza">
                            <table class="table">
                                @php
                                $vista1=0;
                            @endphp
                              
                              @foreach($solicitantesdatos as $solicitantesdato)
                              
                              @if($solicitantesdato["status"]=="rechazada")
                              @php
                                  $vista1=1
                              @endphp                              
                              @endif                                
                              @endforeach
                              @if ($vista1==1)                              
                              <thead class=" text-primary">
                                  <tr><th>
                                    Solicitante
                                  </th>
                                  <th>
                                    Teléfono
                                  </th>
                                  <th>
                                    Correo
                                  </th>
                                  <th>
                                    Tipo Trámite
                                  </th>
                                  <th>
                                    Servicio
                                  </th>
                                  <th>
                                    Estatus
                                  </th>
                                  <th>
                                    Fecha
                                  </th>
                                  <th>
                                    Acción
                                  </th>
                                </tr></thead>
                                
                                <tbody>                       
                                  @foreach($solicitantesdatos as $solicitantesdato)
                                  @if($solicitantesdato["status"]=="rechazada")
                                  <tr>
                                      <td>
                                          {{ $solicitantesdato["nombres"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["tel_cel"] }}/{{ $solicitantesdato["tel_home"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["correo"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["tipo_tramite"] }}
                                      </td>
                                      <td>
                                        {{ $solicitantesdato["servicios"] }}
                                      </td>
                                      <td>
                                      @switch($solicitantesdato["status"])
                                          @case("atender")
                                          Por Atender
                                              @break
                                          @case("proceso")
                                          En Proceso
                                              @break
                                          @case("finalizada")
                                          Finalizada
                                              @break
                                          @case("rechazada")
                                          Rechazada
                                              @break
                                          @default
                                              
                                      @endswitch           
                                      </td>
                                      <td>
                                          {{ $solicitantesdato["fecha"] }}
                                        </td>                          
                                      <td class="td-actions">
                                        <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscartramite',['id_servicio'=>$solicitantesdato['id_servicio'],'id_solicitante'=>$solicitantesdato['id_solicitante']])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Ver Detalles">
                                          <i class="material-icons">visibility</i>
                                        </button>                            
                                      </td>
                                    </tr>
                                  @endif                                
                                  @endforeach                             
                                </tbody>
                                      
                              @else
                              <thead class=" text-primary">
                                  <tr><th>
                                    No Posee Trámites Rechazados
                                  </th>
                                </tr></thead>
                              @endif 
                            </table>
                          </div>
                      </div>                  
                </div>
              </div>
            </div>



@endsection

@push('scripts')
@endpush
