<div id="contacto" class="contact prlx_parent p-0">

	<div class="contact_background prlx" style="background-image: url('{{ asset('frontend/images/bg3.jpg') }}');"></div>

	<div class="contact_shapes"><img src="{{ asset('frontend/images/contact_shape.png') }}" alt=""></div>
	<div class="" style="width: 100%; height: 100%; position: absolute; background: rgba(0,0,0,.4); "></div>
	<div class="container py-5">
		
		<div class="row pt-5">
			<div class="col-lg-6 offset-lg-3 text-center section_title contact_title">
				<h2  style="color:white; font-weight: bold; ">Contáctanos</h2>

			</div>
		</div>
		
		<div class="row pb-5">
			<div class="col-lg-10 offset-lg-1 text-center contact_text">
				<div class="row">
					<div class="col-lg-6 text-left text-white">
						<h3 class="text-white">Panamá:</h3>
						<ul>
							<li><b>Teléfono:</b> (507)3905455</li>
							<li><b>Celular:</b> 68254912</li>
							<li><b>Correos:</b> sigmaserviciopanama@gmail.com</li>
							<li><b>Dirección:</b> Esta sera Provisional ya que este mes me estaré mudando.
							<br>Via Centenario, Altamira Gardens FN-204.</li>
						</ul>

					</div>
					<div class="col-lg-6 text-right text-white mt-4">
						<h3 class="text-white">Venezuela:</h3>
						<ul>
							<li><b>Local:</b> 58-264-8087469 / +58-264-9350728</li>
							<li><b>Teléfono:</b> (0058) 264-8087469/ 264-9350728</li>
							<li><b>Celular:</b> (0058) 424-6160198</li>
							<li><b>Correo:</b> sigmaservicio@gmail.com</li>
							<li><b>Dirección: </b>Carretera H, Centro comercial Paraíso, Local Planta Alta.</li>
						</ul>	
					</div>
				</div>
				<div class="button contact_button">
					<a href="" data-toggle="modal" data-target="#modalContacto" class="d-flex flex-row align-items-center justify-content-center">Contacto<img src="{{ asset('frontend/images/arrow_right.svg') }}" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade modal-style " id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContacto" aria-hidden="true">
  <div class="modal-dialog col-6" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{ asset('frontend/images/check.gif') }}" class="img-fluid gif-check" id="check2" style="display: none" alt="">
      	<form action="" id="contact-form">
      		{{ csrf_field() }}
			<div class="row " id="cont-form2">
				<div class="form-group col-12">
					<label for="nombre" >Nombre</label>
					<input type="text" class="form-control " name="nombre" id="nombre-contact" placeholder="Ej. Jhon Smit">

						<div class="invalid-feedback invalid-nombre">

						</div>

				</div>
				<div class="form-group col-12">
					<label for="telefono" >Teléfono</label>
					<input type="text" class="form-control " name="telefono" id="telefono-contact" placeholder="Ej. 00055500">

						<div class="invalid-feedback invalid-telefono">

						</div>

				</div>
				<div class="form-group col-12">
					<label for="email" >Correo Electrónico</label>
					<input type="text" class="form-control" name="email" id="email-contact" placeholder="example@mail.com">

						<div class="invalid-feedback invalid-email">

						</div>

				</div>
				<div class="form-group col-12">
					<label for="mensaje" >Mensaje</label>
					<textarea name="mensaje" id="mensaje-contact" class="form-control "></textarea>

						<div class="invalid-feedback invalid-mensaje">

						</div>

				</div>
				{{-- <div class="form-group col-12">
					<label for="servicio" >Servicio</label>
					<select name="servicio" class="form-control {{ $errors->has('servicio') ? 'is-invalid' : '' }}" >
						<option value="">Seleccione</option>
						@foreach ($categorias as $categoria)
						@foreach ($categoria->servicio as $servicio)
							<option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
						@endforeach
					@endforeach
					</select>
					@if ($errors->has('servicio'))
						<div class="invalid-feedback">
						{{ $errors->first('servicio') }}
						</div>
					@endif
				</div> --}}
			</div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary submit-e">Enviar</button>
      <img src="{{ asset('frontend/images/loading.gif') }}" class="img-fluid gif-loading col-3" id="loading2" style="display: none" alt="">
    </form>
      </div>

    </div>
  </div>
</div>