
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


@endsection
