<!DOCTYPE html>
<html lang="en">
<head>
<title>Sigmaservicio</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}"> 


{{-- <script src="https://kit.fontawesome.com/415e46850c.js"></script> --}}
</head>

<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header d-flex flex-row justify-content-end align-items-center">

		<!-- Logo -->
		<div class="logo_container mr-auto">
			<div class="logo col-lg-12">
				<a href="#">
					<img src="{{ asset('frontend/images/logo.jpg') }}" class="img-fluid"  alt="">
				</a>
			</div>
		</div>

		<!-- Main Navigation -->
		<nav class="main_nav justify-self-end">
			<ul class="nav_items">
				<li class="active"><a href="#home"><span>Inicio</span></a></li>
				<li><a href="#quienes-somos"><span>¿Quiénes Somos?</span></a></li>
				<li><a href="#servicios"><span>Servicios</span></a></li>
				<li><a href="#contacto"><span>Contáctos</span></a></li>
				{{-- <li><a href="#"><span>blog</span></a></li> --}}
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

	<div class="fs_menu_overlay"></div>
	<div class="fs_menu_container">
		<div class="fs_menu_shapes"><img src="{{ asset('frontend/images/menu_shapes.png') }}" alt=""></div>
		<nav class="fs_menu_nav">
			<ul class="fs_menu_list">
				<li class=""><a href="#home"><span>Inicio</span></a></li>
				<li><a href="#quienes-somos"><span>¿Quiénes Somos?</span></a></li>
				<li><a href="#servicios"><span>Productos</span></a></li>
				<li><a href="#contacto"><span>Contáctos</span></a></li>
			</ul>
		</nav>
		<div class="fs_social_container d-flex flex-row justify-content-end align-items-center">
			<ul class="fs_social">
				{{-- <li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li> --}}
				<li><a href="https://www.facebook.com/SIGMA-SA-109147023255336/"><i class="fab fa-facebook-f trans_300"></i></a></li>
				{{-- <li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li> --}}
				<li><a href="https://www.instagram.com/sigma_s.a/"><i class="fab fa-instagram trans_300"></i></a></li>
				{{-- <li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li> --}}
				{{-- <li><a href="#"><i class="fab fa-behance trans_300"></i></a></li> --}}
				{{-- <li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li> --}}
			</ul>
		</div>
	</div>

	@yield('content')	

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row footer_content d-flex flex-sm-row flex-column align-items-center">
				<div class="col-sm-6 cr text-sm-left text-center">
					<p>
						Hecho con <i class="fa fa-heart" aria-hidden="true"></i> por Tifyca</a>
					</p>
				</div>
				<div class="col-sm-6 text-sm-right text-center">
					<div class="footer_social_container">
						<ul class="footer_social">
							{{-- <li><a href="#"><i class="fab fa-pinterest trans_300"></i></a></li> --}}
							<li><a href="https://www.facebook.com/SIGMA-SA-109147023255336/"><i class="fab fa-facebook-f trans_300"></i></a></li>
							{{-- <li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li> --}}
							<li><a href="https://www.instagram.com/sigma_s.a/"><i class="fab fa-instagram trans_300"></i></a></li>
							{{-- <li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li> --}}
							{{-- <li><a href="#"><i class="fab fa-behance trans_300"></i></a></li> --}}
							{{-- <li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li> --}}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>


{{-- </body> --}}

<script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/progressbar/progressbar.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
@routes
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>
</html>