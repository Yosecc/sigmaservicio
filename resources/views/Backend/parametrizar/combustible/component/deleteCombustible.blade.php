<div class="modal fade" id="eliminarCombustible{{ $combustible->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminarCombustibleTitle{{ $combustible->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle{{ $combustible->id }}">
          Eliminar combustible
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿ Está seguro de eliminar combustible {{ $combustible->descripcion }} ?
      </div>
      <div class="modal-footer">
        <form action="{{ route('marcas.destroy', $combustible->id) }}" method="post">  
        {{ csrf_field() }}
        {{ method_field('DELETE') }}        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Si</button>
        </form>
      </div>
    </div>
  </div>
</div>