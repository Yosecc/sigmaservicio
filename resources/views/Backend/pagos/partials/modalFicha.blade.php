<div class="modal fade" id="fichaPago{{ $pago->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">
          Ficha de pago  #{{ $pago->id }}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col text-center">
            <h4><strong>Datos del usuario</strong></h4>
          </div>
        </div>
        <hr class="text-center" width="75%" style="height: 2px;">
        <div class="row">
          <div class="col text-center">
            <h4><strong>Nombre(s):</strong></h4>
            <p>{{ $pago->registro->nombres }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Apellido(s):</strong></h4>
            <p>{{ $pago->registro->apellidos }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Numero Fiscal:</strong></h4>
            <p>{{ $pago->registro->numero_fiscal }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <h4><strong>Correo Electrónico:</strong></h4>
            <p>{{ $pago->registro->email }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>País:</strong></h4>
            <p>{{ $pago->registro->pais->desc }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <h4><strong>Datos del pago</strong></h4>
          </div>
        </div>
        <hr class="text-center" width="75%" style="height: 2px;">
        <div class="row">
          <div class="col text-center">
            <h4><strong>Vehículo:</strong></h4>
            <p>{{ $pago->id_vehiculo }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Tipo:</strong></h4>
            <p>{{ $pago->tipo }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Monto:</strong></h4>
            <p>{{ number_format($pago->monto, 0, ',', '.') }}</p>
          </div>
          <div class="col text-center">
            <h4><strong>Forma de pago:</strong></h4>
            <p>{{ $pago->formaPago->descripcion }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <h4><strong>Fecha de pago:</strong></h4>
            <p>{{ $pago->created_at }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 offset-md-1 text-center">
            <h4><strong>Observaciones:</strong></h4>
            <textarea rows="4" readonly class="form-control">{{ $pago->observaciones }}</textarea>
            {{--  <textarea disabled name="observaciones" class="form-control" rows="4" placeholder="Observaciones" required>{{ $caja->observaciones }}</textarea> --}}
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