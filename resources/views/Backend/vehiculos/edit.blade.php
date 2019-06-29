@extends ('Backend.layout.layout')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <div class="row align-items-center">
        <div class="col-3 col-md-3">
          <h4 class="card-title ">
            <i class="fa fa-plus"></i>
            <i class="fa fa-car"></i>
            Editar vehículo #{{ $vehiculo->id }}
          </h4>          
        </div>
        <div class="col">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav- text-black">
              <a class="nav-link active text-black" id="especificaciones-tab" data-toggle="tab" href="#especificaciones" role="tab" aria-controls="especificaciones" aria-selected="true">Especificaciones</a>
            </li>
            <li class="nav- text-black">
              <a class="nav-link" id="equipamiento-tab" data-toggle="tab" href="#equipamiento" role="tab" aria-controls="equipamiento" aria-selected="false">Equipamiento</a>
            </li>
            <li class="nav- text-black">
              <a class="nav-link" id="otros-tab" data-toggle="tab" href="#otros" role="tab" aria-controls="otros" aria-selected="false">Otros</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" id="fotos-tab" data-toggle="tab" href="#fotos" role="tab" aria-controls="fotos" aria-selected="false">Fotos</a>
            </li> --}}
         </ul>          
        </div>
      </div>      
    </div>

    <div class="card-body">
      <form class="container-fluid" method="post" action="{{ route('vehiculos.update',$vehiculo->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

         <!-- Tab panes -->
        <div class="row">
          <div class="col">
            <div class="tab-content">
              <div class="tab-pane active" id="especificaciones" role="tabpanel" aria-labelledby="especificaciones-tab">
                @include('Backend.vehiculos.partials.pestañas.especificaciones')
              </div>
              <div class="tab-pane" id="equipamiento" role="tabpanel" aria-labelledby="equipamiento-tab">
                @include('Backend.vehiculos.partials.pestañas.equipamiento')
              </div>
              <div class="tab-pane" id="otros" role="tabpanel" aria-labelledby="otros-tab">
                @include('Backend.vehiculos.partials.pestañas.otros')
              </div>
      {{--         <div class="tab-pane" id="fotos" role="tabpanel" aria-labelledby="fotos-tab">
                Fotos
              </div> --}}
            </div> 
          </div>
        </div>       
        <div class="row">
          <div class="col p-0">
            <input type="submit" value="Guardar" class="btn btn-primary">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(function(){
    // Habilita/Deshabilita fecha inicio/fin
    $('#tipo').change(function(event) {
      if( $(this).val() == 3 ) 
        $('#tipo_subasta, #inicio, #fin').attr('disabled', false);
      else 
        $('#tipo_subasta, #inicio, #fin').attr('disabled', true).val("");
        $('#tipo_subasta').val(null).trigger('change');
    });

    $('#tipo_subasta').select2({
      placeholder: 'Seleccione tipo(s) de subasta'
    });
  })
</script>
@endpush
