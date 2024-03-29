<div class="home" id="home">
		<div class="hero_slider_container slider_prlx">
			<div class="owl-carousel owl-theme hero_slider">

				@foreach ($slider as $item)
				<div class="owl-item main_slider_item">
					<div class="main_slider_item_bg" style="background-image:url('{{ Helper::imgValidate($item->imagen) }}')"></div>
					<div class="" style="width: 100%; height: 100%; position: absolute; background: rgba(0,0,0,.4); "></div>
					<div class="container">
						<div class="row">
							<div class="col slider_content_col">
								<div class="main_slider_content text-white col-12" style="width: 100%">
									<h1>{{ $item->titulo }}</h1>
									{{-- <h1>a <span>modern</span> website?</h1> --}}
									{!! $item->texto !!}
									<br>
									{{-- <div class="button discover_button"> --}}
										{{-- <a href="#" class="btn btn-primary border-0 mt-5" style="border-radius: 0px;background: #2A2865">
											<p class="pt-2">Solicita tu Cotización</p>
										</a> --}}
										<button type="button" class="btn btn-primary border-0 mt-5 p-3" style="border-radius: 0px;background: #2A2865" data-toggle="modal" data-target="#exampleModal">
										 Solicita tu Cotización
										</button>
										{{-- <a href="#" class="d-flex flex-row align-items-center justify-content-center">Solicita tu Cotización<img src="{{ asset('frontend/images/arrow_right.svg') }}" alt=""></a> --}}
									{{-- </div> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
	
			</div>

			<!-- Slider Dots -->

			<div class="main_slider_dots">
				<div class="container">
					<div class="row">
						<div class="col">
							<ul id="main_slider_custom_dots" class="main_slider_custom_dots">
								@foreach ($slider as $key => $item)
								<li class="main_slider_custom_dot @if($key == 0) active @endif">0{{ $key }}.</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>		
			</div>

			<!-- Slider Dots -->

			<div class="main_slider_nav_left main_slider_nav">
				<i class="fas fa-chevron-left trans_300"></i>
			</div>

			<div class="main_slider_nav_right main_slider_nav">
				<i class="fas fa-chevron-right trans_300"></i>
			</div>

		</div>
	</div>

	<div class="home_social_container d-flex flex-row justify-content-end align-items-center">
		<ul class="home_social">
			{{-- <li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li> --}}
			@isset ($twitter)<li><a href="{{ $twitter }}"><i class="fab fa-twitter trans_300"></i></a></li>@endisset
			@isset ($facebook)<li><a href="{{ $facebook }}"><i class="fab fa-facebook-f trans_300"></i></a></li>@endisset
			{{--  https://www.facebook.com/SIGMA-SA-109147023255336/--}}
			@isset ($instagram)<li><a href="{{ $instagram }}"><i class="fab fa-instagram trans_300"></i></a></li> @endisset
			{{-- https://www.instagram.com/sigma_s.a/ --}}
			{{-- <li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li> --}}
			{{-- <li><a href="#"><i class="fab fa-behance trans_300"></i></a></li> --}}
			{{-- <li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li> --}}
		</ul>
	</div>



<div class="modal fade modal-style" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Solicitud de Cotización</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('form_cotizacion') }}" method="post" name="form_cotizacion" id="form_cotizacion" >
      {{ csrf_field() }}
      <div class="modal-body">
      	<img src="{{ asset('frontend/images/check.gif') }}" class="img-fluid gif-check" id="check" style="display: none" alt="">
        <div class="row" id="cont-form">
        	<div class="form-group col-12">
        		<label for="nombre_empresa" >Nombre de la Empresa</label>
        		<input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" placeholder="Ej. Sigma c.a" required="">

        			<div class="invalid-feedback">

      				</div>

        	</div>
        	<div class="form-group col-12">
        		<label for="telefono" >Teléfono</label>
        		<input type="text" class="form-control " name="telefono" id="telefono" required="" placeholder="Ej. 00055500">

        			<div class="invalid-feedback">

      				</div>

        	</div>
        	<div class="form-group col-12">
        		<label for="email" >Correo Electrónico</label>
        		<input type="text" class="form-control " name="email" id="email" required="" placeholder="example@mail.com">

        			<div class="invalid-feedback">

      				</div>

        	</div>
        	<div class="form-group col-12">
        		<label for="servicio" >Servicio</label>
        		<select name="servicio" class="form-control " required="" >
        			<option value="">Seleccione</option>
        			@foreach ($categorias as $categoria)
					@foreach ($categoria->servicio as $servicio)
						<option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
					@endforeach
				@endforeach
        		</select>

        			<div class="invalid-feedback">

      				</div>

        	</div>
        </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
		<div class="g-recaptcha" data-callback="validateCapchat" data-sitekey="6Lf7UNYkAAAAAAwTebQ7ZFA6wCweHfp2Yi8J8xWA"></div>
        <input type="submit" class="btn btn-primary submit-e recap" name="enviar" value="Guardar">
        <img src="{{ asset('frontend/images/loading.gif') }}" class="img-fluid gif-loading col-3" id="loading" style="display: none" alt="">
        </form>
      </div>
    </div>
  </div>
</div>
