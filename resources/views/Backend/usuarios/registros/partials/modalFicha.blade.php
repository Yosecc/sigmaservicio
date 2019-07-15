<div class="modal fade" id="fichaUsuario{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ficha de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col text-center">
            <h4><strong>Nombre(s):</strong></h4>
            <p>{{ $usuario->nombres }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Apellido(s):</strong></h4>
            <p>{{ $usuario->apellidos }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Numero Fiscal:</strong></h4>
            <p>{{ $usuario->numero_fiscal }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <h4><strong>País:</strong></h4>
            <p>{{ $usuario->pais->desc }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Correo Electrónico:</strong></h4>
            <p>{{ $usuario->email }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Fecha de registro:</strong></h4>
            <p>{{ $usuario->created_at }}</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>