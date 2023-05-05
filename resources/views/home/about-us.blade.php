@extends("layouts.frontHome")
@section("title","About us")
@section('content')
	<!-- Start Hero Section -->
    <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>About Us</h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="{{asset('/products')}}" class="btn btn-secondary me-2">Shop Now</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{asset('furni/images/couch.png')}}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->



		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

						<div class="row my-5">
                        @foreach($services as $item)
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
                                    <img src='{{asset("/storage/images/$item->image")}}' alt="Image" class="imf-fluid">
									</div>
									<h3>{{$item->title}}</h3>
									<p>{{$item->summary}}.</p>
								</div>
							</div>
                            @endforeach


						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="{{asset('furni/images/why-choose-us-img.jpg')}}" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

        <!-- Start Testimonial Slider -->
		<div class="testimonial-section before-footer-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto text-center">
						<h2 class="section-title">Testimonials</h2>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="testimonial-slider-wrap text-center">

							<div id="testimonial-nav">
								<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
								<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
							</div>

							<div class="testimonial-slider">

                            @foreach($testimonial as $item)

                            <div class="item">
									<div class="row justify-content-center">

										<div class="col-lg-8 mx-auto">

											<div class="testimonial-block text-center">
												<blockquote class="mb-5">
													<p>&ldquo;{{$item->subject}}.&rdquo;</p>
												</blockquote>

												<div class="author-info">
													<div class="author-pic">
														<img src='{{asset("/storage/images/$item->image")}}' alt="Maria Jones" class="img-fluid">
													</div>
													<h3 class="font-weight-bold">{{$item->name}}</h3>
													<span class="position d-block mb-3">{{$item->role}}</span>
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- END item -->

                                    @endforeach
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Testimonial Slider -->



@endsection
