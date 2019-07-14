<div class="home">
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
										<a href="#" class="btn btn-primary border-0 mt-5" style="border-radius: 0px;background: #2A2865">
											<p class="pt-2">Solicita tu Cotización</p>
										</a>
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
			<li><a href="https://www.facebook.com/SIGMA-SA-109147023255336/"><i class="fab fa-facebook-f trans_300"></i></a></li>
			{{-- <li><a href="#"><i class="fab fa-twitter trans_300"></i></a></li> --}}
			<li><a href="https://www.instagram.com/sigma_s.a/"><i class="fab fa-instagram trans_300"></i></a></li>
			{{-- <li><a href="#"><i class="fab fa-dribbble trans_300"></i></a></li> --}}
			{{-- <li><a href="#"><i class="fab fa-behance trans_300"></i></a></li> --}}
			{{-- <li><a href="#"><i class="fab fa-linkedin-in trans_300"></i></a></li> --}}
		</ul>
	</div>