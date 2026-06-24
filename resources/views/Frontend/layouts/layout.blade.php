<!DOCTYPE html>
<html lang="es">
<head>
<title>@isset ($title) {{ $title }} @endisset</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<meta name="google-site-verification" content="PcmIZMfk6ar146c25-6FkufLyJ7oaMn42Ku0Gj2UQQ0" />
@yield('meta')
	<meta http-equiv="Content-Type" content="text/html; ISO-8859-1">
	<meta NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
	<meta NAME="AUTHOR" CONTENT="@isset ($title) {{ $title }} @endisset">
	<meta NAME="DESCRIPTION" CONTENT="@isset ($title) {{ $title }} @endisset">
	<meta NAME="KEYWORDS" CONTENT="">
	<meta NAME="Resource-type" CONTENT="Homepage">
	<meta NAME="Revisit-after" CONTENT="2 days">
	<meta NAME="robots" content="ALL">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.ico') }}">
	<meta property="og:site_name" content="@isset ($title) {{ $title }} @endisset">
	<meta property="og:type" content="website" /> 
	<meta property="og:updated_time" content="1440432930" /> 
	<meta property="og:title" content="@isset ($title) {{ $title }} @endisset" /> 
	<meta property="og:description" content="@isset ($descripcion) {{ $descripcion }} @endisset" /> 
	<meta property="og:image" itemprop="image" content="{{ asset('frontend/images/icon.png') }}"> 
	<meta property="og:url" content="@isset ($meta_url) {{ $meta_url }} @endisset"/>
	<meta name="twitter:card" content="summary">
	<meta name="twitter:url" contnet="@isset ($meta_url) {{ $meta_url }} @endisset">
	<meta name="twitter:title" content="@isset ($title) {{ $title }} @endisset">
	<meta name="twitter:description" content="@isset ($descripcion) {{ $descripcion }} @endisset">
	<meta name="twitter:image" content="{{ asset('frontend/images/icon.png') }}">

	
{{-- <script src="https://kit.fontawesome.com/415e46850c.js"></script> --}}

<style>
	.nav_items li{
		margin-left: 15px !important;
	}
</style>
</head>

<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header d-flex flex-row justify-content-end align-items-center pr-2">

		<!-- Logo -->
		<div class="logo_container mr-auto">
			<div class="logo col-lg-8 col-9 col-xl-6 ">
				<a href="#">
					<img src="{{ asset('frontend/images/logo.png') }}" class="img-fluid py-4 pl-0 pr-5 p-sm-2"  alt="">
				</a>
			</div>
		</div>

		<!-- Main Navigation -->
		<nav class="main_nav justify-self-end">
			<ul class="nav_items">
				<li class="active"><a href="#home"><span>Inicio</span></a></li>
				<li><a href="#quienes-somos"><span>¿Quiénes Somos?</span></a></li>
				<li><a href="#servicios"><span>Servicios</span></a></li>

				<li><a href="" data-toggle="modal" data-target="#modalSugerencias"><span>Quejas y apelaciones</span></a></li>
		
				<li><a href="#contacto"><span>Contáctos</span></a></li>
				{{-- <li><a href="#"><span>contact</span></a></li> --}}
			</ul>
		</nav>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<span class="hamburger_text">Menu</span>
			<span class="hamburger_icon"></span>
		</div>

	</header>

	<!-- Menu -->

		<!-- Modal -->
		<div class="modal fade modal-style " id="modalSugerencias" tabindex="-1" role="dialog" aria-labelledby="modalSugerencias" aria-hidden="true">
			<div class="modal-dialog col-12 col-sm-6" role="document" >
			<div class="modal-content">
				<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Quejas y apelaciones</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
					<img src="{{ asset('frontend/images/check.gif') }}" class="img-fluid gif-check" id="check2-s" style="display: none" alt="">
					<form action="" method="POST" id="contact-form-sugerencia">
						{{ csrf_field() }}

						<div class="row " id="cont-form2-s">
							
							<div class="form-group col-12">
								
							
							
							<div style="text-align: center; padding: 20px; font-family: Arial, sans-serif;">
                              <h3>¿Tienes una queja, apelación o reclamo?</h3>
                              <p>En SIGMAC Corp trabajamos para ofrecer servicios de la más alta calidad. Si necesitás comunicar alguna situación relacionada con nuestros servicios, podés hacerlo escribiendo a:</p>
                              <p><strong><a href="mailto:calidadsigmacorp@gmail.com">calidadsigmacorp@gmail.com</a></strong></p>
                            
                            </div>
							
							
							<!-- Button trigger modal -->
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" style="color:blue; font-size:11px; background:transparent; border:none;">
                                      También puedes ver los procedimientos para quejas y apelaciones haciendo click aquí. para obtener más información sobre cómo gestionamos estos casos.
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" "style: font-siza:11px;"><strong>Procedimientos para quejas y apelaciones</strong></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p>En SIGMAC Corp, brindamos servicios de la más alta calidad para la satisfacción de
                                                nuestros clientes. Sin embargo, puede suceder que algún aspecto de los servicios no
                                                sea de la satisfacción total del cliente. En esos casos el cliente puede decidir presentar
                                                una apelación, queja o reclamo, según sea el caso.</p>
                                                <br>
                                                
                                                <p><strong>Queja:</strong> insatisfacción, malestar o descontento de un cliente o cualquier otra persona,
                                                en relación con los requisitos del servicio o la gestión del mismo.</p>
                                                <br>
                                                
                                                <p><strong>Reclamo:</strong> Disconformidad generada en el suministro de un servicio o producto y/o la
                                                gestión de venta que se justifica mediante la presentación de evidencia objetiva con el
                                                fin de llegar a un acuerdo.</p>
                                                <br>
                                                
                                                <p><strong>Apelación:</strong> Procedimiento mediante el cual se solicita de manera formal a un ente que
                                                anule, enmiende o corrija los resultados (certificado, informe) o el dictamen de una
                                                actividad por considerarla injusta.</p>
                                                <br>
                                                
                                                <p><strong>SIGMAC Corp, cuenta con un procedimiento para estos casos:</strong>
                                                <br>
                                                Los clientes que deseen o cualquier otra parte interesada que desee presentar una
                                                queja o reclamo, debe hacerlo de manera objetiva, ya sea de forma verbal o por
                                                escrito.</p>
                                                <br>
                                                
                                                <p>Una vez que se recibe la información generada por el cliente o cualquier otra parte
                                                interesada, en relación con un servicio ofrecido en particular, ya sea en el
                                                cumplimiento de especificaciones, tiempos de entrega o documentación relacionada,
                                                inmediatamente se hace acuse de recibo al cliente mediante correo electrónico. El
                                                personal designado de SIGMAC Corp debe utilizar el formulario IZA-RG-07 para
                                                registrar la solicitud.</p>
                                                <br>
                                                
                                                <p>Se analizan todos los componentes relacionados con la prestación del servicio, y se
                                                determina si procede o no. La investigación sobre lo planteado en la queja o apelación
                                                lo hace calidad. Las quejas debe tratarlas la directora de Calidad y las apelaciones debe
                                                tratarlas la directora de calidad y el gerente general, y determinar si el problema es
                                                puntual e inmediatamente se toma la acción correctiva, o si se traduce en un reclamo
                                                con el propósito de investigar la causa raíz, registrándolo en el formulario IZA-RG-05
                                                para darle tratamiento a la No Conformidad y así generar su acción correctiva
                                                correspondiente. Informando al cliente del resultado o avances de este proceso en un
                                                período máximo de una semana. Salvo la queja, el reclamo o apelación por su
                                                naturaleza requiera de mayor tiempo.</p>
                                                <br>
                                                
                                                <p>En el caso de las apelaciones, las investigaciones se realizan con la gerencia general y
                                                pueden involucrar la repetición de la inspección o cualquier actividad técnica para
                                                confirmar el informe de inspección.</p>
                                                <br>
                                                
                                                <p>En el caso de que la apelación fuera procedente, se debe repetir la inspección y volver
                                                a emitir informes y certificados.</p>
                                                <br>
                                                
                                                <p>Se documentan las acciones tomadas, registrando un resumen de dichas acciones en el
                                                numeral 2 del registro IZA-RG-07 dejando evidencia de todo el tratamiento dado a la
                                                queja, reclamo o apelación; dicha información debe ser verificada por la Gerencia
                                                General. Informando al cliente del resultado o avances de este proceso en un período
                                                máximo de una semana. Salvo la queja, el reclamo o apelación por su naturaleza
                                                requiera de mayor tiempo.</p>
                                                <br>
                                                
                                                <p>Se efectúa un seguimiento a las acciones tomadas con el objeto de verificar la
                                                resolución a la situación y la satisfacción del cliente, dando cierre al proceso.</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
			
									<div class="invalid-feedback invalid-mensaje">
			
									</div>
			
							</div>

						</div>
					</div>
						<div class="modal-footer d-flex justify-content-between">
					
					
					</form>
				</div>
		
			</div>
			</div>
		</div>

		<div class="fs_menu_overlay"></div>
		<div class="fs_menu_container">
			<div class="fs_menu_shapes"><img src="{{ asset('frontend/images/menu_shapes.png') }}" alt=""></div>
			<nav class="fs_menu_nav">
				<ul class="fs_menu_list">
					<li class=""><a href="#home"><span>Inicio</span></a></li>
					<li><a href="#quienes-somos"><span>¿Quiénes Somos?</span></a></li>
					<li><a href="#servicios"><span>Servicios</span></a></li>
					{{-- <li><a href="#sugerencias"><span>Reclamos y Sugerencias</span></a></li> --}}
					<li><a href="" data-toggle="modal" data-target="#modalSugerencias"><span>Reclamos y Sugerencias</span></a></li>
					<li><a href="#contacto"><span>Contáctos</span></a></li>
				</ul>
			</nav>
			<div class="fs_social_container d-flex flex-row justify-content-end align-items-center">
				<ul class="fs_social">
					
					@isset ($twitter)<li><a href="{{ $twitter }}"><i class="fab fa-twitter trans_300"></i></a></li>@endisset
			@isset ($facebook)<li><a href="{{ $facebook }}"><i class="fab fa-facebook-f trans_300"></i></a></li>@endisset
			{{--  https://www.facebook.com/SIGMA-SA-109147023255336/--}}
			@isset ($instagram)<li><a href="{{ $instagram }}"><i class="fab fa-instagram trans_300"></i></a></li> @endisset
				</ul>
			</div>
		</div>

		@yield('content')	

		<!-- Footer -->

		<footer class="">
			<div class="container">
				<div class="row  d-flex flex-sm-row flex-column align-items-center">
					<div class="col-sm-2 p-3 cr text-sm-left text-center">
							<img src="{{ asset('frontend/cnalogo.png') }}" class="img-fluid"  alt="">
					</div>
					<div class="col-sm-10 text-sm-right text-center">
						<div class="footer_social_container">
							<ul class="footer_social">
								@isset ($twitter)<li><a href="{{ $twitter }}"><i class="fab fa-twitter trans_300"></i></a></li>@endisset
			@isset ($facebook)<li><a href="{{ $facebook }}"><i class="fab fa-facebook-f trans_300"></i></a></li>@endisset
			{{--  https://www.facebook.com/SIGMA-SA-109147023255336/--}}
			@isset ($instagram)<li><a href="{{ $instagram }}"><i class="fab fa-instagram trans_300"></i></a></li> @endisset
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>

	</div>


{{-- </body> --}}
<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}" ></script>
<script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
@routes
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/progressbar/progressbar.min.js') }}"></script>



<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
	$('.recap').prop('disabled', true)
	var validado = false
function validateCapchat(token){
	

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
			url: 'validate_recaptcha',
			type: "post",
			dataType: "json",
			data: {
				response: token
			},
			success: function(data) {
				
				if(data.success){
					$('.recap').prop('disabled', false)
					validado = true
					setTimeout(function(){
						$('.recap').prop('disabled', true)
						validado = false
					}, 60000)
				}else{
					$('.recap').prop('disabled', true)
					validado = false

				}	
			},
			// error: function(data) {

			// },
		})
}
	function limpiarCampos(){
		$('#nombre-sugerencia').val('')
		$('#telefono-sugerencia').val('')
		$('#email-sugerencia').val('')
		$('#mensaje-sugerencia').val('')
	}

	limpiarCampos()
	$('#contact-form-sugerencia').submit(function(event) {
		event.preventDefault()
		var f = $(this);
		var formData = new FormData(document.getElementById("contact-form-sugerencia"));

		if(validado){
			$.ajax({
				url: 'sugerenciasreclamos',
				type: "post",
				dataType: "json",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$('div[class^="invalid-"').html('')
					$('.form-control').removeClass('is-invalid')
					$('.submit-s').fadeOut(1000)
					$('#loading2-s').fadeIn(1000)
				},
				success: function(data) {
					
					$('#cont-form2-s').fadeOut(1000)
					$('#check2-s').fadeIn(1000);
					$('.submit-s').fadeIn(1000)
					$('#loading2-s').fadeOut(1000)
					limpiarCampos()
					$('.recap').prop('disabled', true)
					validado = false
				},
				error: function(data) {
					if(data.responseJSON == undefined){
						$('#cont-form2-s').fadeOut(1000)
						$('#check2-s').fadeIn(1000);
						$('.submit-s').fadeIn(1000)
						$('#loading2-s').fadeOut(1000)
						limpiarCampos()
						$('.recap').prop('disabled', true)

					validado = false

	

					}else{
						
						$('.submit-s').fadeIn(1000)
						$('#loading2-s').fadeOut(1000)
						error = data.responseJSON.errors
						
						$.each(error, function(key, value) {
								$('#' + key + '-sugerencia').addClass('is-invalid')
								$('.invalid-' + key).html(value)
							});
					}

					
				},
			})
		}
	});
</script>

</body>
</html>
