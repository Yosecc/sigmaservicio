<div class="modal fade" id="eliminarModelo{{ $modelo->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarModeloTitle{{ $modelo->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle{{ $modelo->id }}">
          Eliminar modelo
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿ Está seguro de eliminar modelo {{ $modelo->descripcion }} ?
      </div>
      <div class="modal-footer">
        <form action="{{ route('modelos.destroy', $modelo->id) }}" method="post">  
        {{ csrf_field() }}
        {{ method_field('DELETE') }}        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Si</button>
        </form>
      </div>
    </div>
  </div>
</div>