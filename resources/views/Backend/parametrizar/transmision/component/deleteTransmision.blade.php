<div class="modal fade" id="eliminarTransmision{{ $transmision->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarTransmisionTitle{{ $transmision->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle{{ $transmision->id }}">
          Eliminar transmisión
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿ Está seguro de eliminar transmisión {{ $transmision->descripcion }} ?
      </div>
      <div class="modal-footer">
        <form action="{{ route('transmision.destroy', $transmision->id) }}" method="post">  
        {{ csrf_field() }}
        {{ method_field('DELETE') }}        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Si</button>
        </form>
      </div>
    </div>
  </div>
</div>