<div class="modal fade bd-example-modal-lg" id="modalEstilista" tabindex="-1" role="dialog" aria-labelledby="modalEstilistaExample" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content" style="border-radius: 0px">
      <div class="modal-header" style="background: #000;border-radius:0px">
        <h5 class="modal-title" id="modalEstilistaExample" style="color:#fff">SOLICITAR CITA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#eeeeee">
      	<div class="row">
      		<div class="col-md-6">
	      		<p>Estilistas</p>
		        <select class="form-control border-0" style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.10);border-radius: 0px">
				  <option>Jon Doe</option>
				  <option>Ana Vera</option>
				</select>
	      	</div>
	      	<div class="col-md-6">
	      		<p>Promoción</p>
		        <select class="form-control border-0" style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.10);border-radius: 0px">
				  <option>Promocion #1</option>
				  <option>Promocion #2</option>
				</select>
	      	</div>
      	</div><br>
      	
        <div class="row justify-content-center">
        	<div class="col-md-6">
        		<p>Indique su horario</p>
    				<input class="form-control border-0" id="datetimepickerEstilistas" type="text" placeholder="Seleccione" style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.10);border-radius: 0px;background: #fff">
        	</div>
        </div>
		<p style="font-weight:bold;">Tu información: <span style="color:red;font-size: 25px;margin-top: 6px">*</span></p>

		<div class="row">
			<div class="col-12 col-sm-12 col-md-6">
				<input class="form-control " type="text" placeholder="Nombre" style="background: #fff;border-radius: 0px">
			</div>
			<div class="col-12 col-sm-12 col-md-6">
				<input class="form-control " type="text" placeholder="Telefono" style="background: #fff;border-radius: 0px">
			</div>	
			<div class="col-12 col-sm-12 col-md-12 mt-4">
				<input class="form-control " type="email" placeholder="Email" style="background: #fff;border-radius: 0px">
			</div>		
			<div class="modal-footer col-12 mt-3" align="center">
        		<button type="button" class="btn btn-secondary border-0" data-dismiss="modal" style="border-radius: 0px;">Cancelar</button>
        		<button type="button" class="btn btn-secondary border-0" style="background: #000;border-radius: 0px;">Enviar Solicitud</button>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>