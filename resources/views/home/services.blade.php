
@extends("layouts.frontHome")

@section("title","Services")

@section("servicesActive","active")


@section("content")
<!-- Start Hero Section -->
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Services</h1>
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
    @if($services->count())

			<div class="container">


				<div class="row my-5">
                @foreach($services as $item)

					<div class="col-6 col-md-6 col-lg-3 mb-4">
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
            @endif

		</div>
		<!-- End Why Choose Us Section -->


        <!-- Start Product Section -->
    <div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
						<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
						<p><a href="{{asset('/products')}}" class="btn">Shop</a></p>
					</div>
					<!-- End Column 1 -->
                @foreach($products as $product)

					<!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="{{route('add-to-cart',$product->id)}}">
							<img src='{{asset("storage/assets/img/{$product->main_image}")}}' class="img-fluid product-thumbnail">
							<h3 class="product-title">{{$product->title}}</h3>
                            @if($product->sale_price == '')
							<strong class="product-price">{{$product->regular_price}}$</strong>
                            @else
							<!-- <strong class="product-price">{{$product->regular_price}}$</strong>
                            <strong class="product-price">{{$product->sale_price}}$</strong> -->

                            <p>
                                    <del style = " color: #888888; display: inline-block; margin-right: 10px;}">{{$product->regular_price}}$</del>
                                    <strong class="product-price">{{$product->sale_price}}$</strong>
                            </p>
                            <div class="ribbon-holder">
                        <div class="ribbon sale">SALE</div>
                        <div class="ribbon new">NEW</div>
                        </div>
                            @endif

                                <span class="icon-cross">
                                    <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid">
                                </span>


						</a>
					</div>
					<!-- End Column 2 -->
                    @endforeach


				</div>
			</div>
		</div>

    </div>
	<!-- End Product Section -->



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
