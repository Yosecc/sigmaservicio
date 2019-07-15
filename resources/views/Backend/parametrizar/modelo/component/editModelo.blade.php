 <div class="modal fade" id="editarModelo{{ $modelo->id }}" tabindex="-1" role="dialog" aria-labelledby="exleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examplealLongTitle">Editar modelo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('modelos.update', $modelo->id) }}" method="post" 
          id="formEditarModelo{{ $modelo->id }}" autocomplete="off">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="row">
            <div class="col-md-9">
              <input type="text" name="descripcion" class="form-control"
                form="formEditarModelo{{ $modelo->id }}"
                required 
                value="{{ $modelo->descripcion }}" 
              >
            </div>
            <div class="col-md-3">
              <button type="submit" class="btn btn-sm btn-primary">Editar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
