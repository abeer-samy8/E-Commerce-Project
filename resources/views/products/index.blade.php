@extends("layouts.frontHome")

@section("title","Products")


@section("css")
@endsection



@section('content')

	<!-- Start Hero Section -->
    <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">

						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->


<div class="untree_co-section product-section before-footer-section">
		<div class="container">
            @if($products->count()>0)
		        <div class="row">
                @foreach($products as $product)

		    <!-- Start Column 1 -->
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
                            <button class="btn " style="padding: 5px 10px; font-size: 14px;">Details</button>

                                <span class="icon-cross">
                                    <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid">
                                </span>


						</a>
					</div>
					<!-- End Column 1 -->
                @endforeach




		      	</div>
                @endif

		    </div>
		</div>

</div>



@endsection
