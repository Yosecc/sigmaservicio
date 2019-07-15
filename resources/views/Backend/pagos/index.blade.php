@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Pagos registrados</h4>
      {{-- <a href="{{ route('formusuario')}}" class="card-category">
      <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
        <i class="material-icons">person_add</i>
      </button>
       Agregar pago</a> --}}
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <tr>
              <th width="15%">Id</th>
              <th width="20%">Nombre(s)</th>
              <th width="20%">Apellido(s)</th>
              <th width="10%">Monto</th>
              <th class="text-center">Fecha de creación</th>
  						<th width="10%" class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse($pagos as $pago)
            <tr>
              <td class="id_pago">{{ $pago->id }}</td>
              <td>{{ $pago->registro->nombres }}</td>
              <td>{{ $pago->registro->apellidos }}</td>
              <td class="text-right">{{ number_format($pago->monto, 0, ',', '.') }}</td>
              <td class="text-center">{{ $pago->created_at }}</td>
              <td class="td-actions text-center">
                <button type="button" class="btn btn-primary  btn-sm"          
                  data-original-title="Editar" 
                  data-target="#fichaPago{{ $pago->id }}"
                  data-toggle="modal"
                  title="Ver Ficha" 
                >
                  <i class="material-icons">remove_red_eye</i>
                </button>
              </td>
            </tr>
            <!-- Modal Ficha -->
            @include('Backend.pagos.partials.modalFicha')
            <!-- Fin Modal Ficha -->
            @empty
              <td class="text-center" colspan="5">
                <h3>No hay pagos registrados</h3>
              </td>
            @endforelse
          </tbody>
        </table>
        {{ $pagos->links() }}
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  let id_modal;
  // $(function(){
  //   $('button[title="Ver Ficha"]').on('click', function(e){
  //     id_modal = $(this).data('target');
  //     $(this).children('i.material-icons').toggleClass('text-primary');
  //   });

  //   $('#fichaPago1').on('hide.bs.modal', function(){
  //     // $('button[data-target='++']')
  //     // alert($(this));
  //     alert("algo")
  //   })
  // })
</script>
@endpush
