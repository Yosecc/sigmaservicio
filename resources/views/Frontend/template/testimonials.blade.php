<div class="testimonials pt-5 mt-5">
		<div class="container mt-sm-5 pt-sm-5">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center section_title section_title_dark">
					<h2 class="m-0">Nuestros Clientes</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="testimonials_container">
						<div class="testimonials_container_inner"></div>

						<!-- Testimonials Slider -->

						<div class="owl-carousel owl-theme testimonials_slider">

							<!-- Testimonials Item -->
							@foreach ($comentarios as $item)
							<div class="owl-item testimonials_item d-flex flex-column align-items-center justify-content-center text-center">
								<div class="testimonials_content">
									<div class="test_user_pic"><img src="{{ Helper::imgValidate($item->url_imagen) }}" class="img-fluid"></div>
									<div class="test_name">{{ $item->nombre }}</div>
									<div class="test_title">{{ $item->procedencia }}</div>
									{{-- <div class="test_quote">"</div> --}}
									{!! $item->contenido !!}
								</div>
							</div>
							@endforeach

							
						</div>

					</div>
				</div>

				<!-- Testimonials Slider Navigation -->

				<div class="test_slider_nav test_slider_nav_left d-flex flex-column justify-content-center align-items-center trans_200">
					<i class="fas fa-chevron-left trans_200"></i>
				</div>

				<div class="test_slider_nav test_slider_nav_right d-flex flex-column justify-content-center align-items-center trans_200">
					<i class="fas fa-chevron-right trans_200"></i>
				</div>

			</div>
		</div>
	</div>