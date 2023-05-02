
@extends("layouts.frontHome")

@section("title","Services")

@section("servicesActive","active")


@section("content")
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
