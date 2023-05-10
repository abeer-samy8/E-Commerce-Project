@extends("layouts.frontHome")

@section("title","Stores")

@section("css")

@endsection

@section('content')
	<!-- Start Hero Section -->
    <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Stores</h1>
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


<div id="content" class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row bar">
            <div class="col-md-3">
            <!-- MENUS AND FILTERS-->
            <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                <h3 class="h4 panel-title">Stores</h3>
                </div>
                <div class="panel-body">
                <ul class="nav nav-pills flex-column text-sm category-menu">
                @foreach ($stores as $store)
                    <li class="nav-item">
                        <div class="d-flex justify-content-start align-items-center">
                        <label for="store_{{ $store->id }}" class="w-100">
                        <a class="nav-link d-flex align-items-center justify-content-between" id='store' name='store' data-store-id="{{ $store->id }}">
                            <span style='color: #198754 !important;'>{{ $store->name }}</span>
                            <span class="badge badge-secondary">{{ $store->products()->count() }}</span>
                            </a>
                        </label>
                        </div>
                    </li>
                    @endforeach

                    <li class="pt-3 mt-2 search-top-line">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input name='q' id='q' value='{{request()->q}}' autofocus type="text"
                                                    class='form-control' placeholder="Search product..." />
                                            </div>
                                            <div class="col-1 p-0 m-0">
                                                <button type="submit" class="btn btn-primary brd-small-search">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>

                    </li>
                </ul>
                </div>
            </div>


            </div>
            <div class="col-md-9">
            <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>
            @if($products->count()>0)
            <div class="row products products-big" id='products' name='products'>
                @foreach($products as $product)
                <div class="col-12 col-md-4 col-lg-4 mb-5 mb-md-0">
						<a class="product-item" href="{{route('add-to-cart',$product->id)}}">
							<img src='{{asset("storage/assets/img/{$product->main_image}")}}' class="img-fluid product-thumbnail">
							<h3 class="product-title" >{{$product->title}}</h3>
                            @if($product->sale_price == '')
							<strong class="product-price">{{$product->regular_price}}$</strong>
                            @else
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
                            <img src="{{asset('furni/images/cross.svg')}}" class="img-fluid" >
							</span>
						</a>
				</div>
                @endforeach
        </div>
            <div>
            {{ $products->links()}}
            </div>

            @else
            <div class='alert alert-info alert-dismissible fade show'>
            <div><b>Sorry! </b>There are no results to display</div>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif

            </div>
        </div>
        </div>
    </div>
    <!-- page content end -->


</div>
@endsection
@section('js')
<script>
$(function(){
    $(".category-menu li").click(function(){
        var storeId = $(this).find(".nav-link").data("store-id");
        $.get("/store-products/"+storeId,function(json){
            $("#products").html(""); // clear existing products
            $(json).each(function(){
                var html = '<div class="col-12 col-md-4 col-lg-4 mb-5 mb-md-0">';
                var addToCartLink = "{{route('add-to-cart', ':productId')}}".replace(':productId', this.id); // تعريف رابط إضافة المنتج إلى السلة مع تحديد المنتج
                html += '<a class="product-item" href="'+addToCartLink+'">';
                html += '<img src="{{asset("storage/assets/img/")}}/'+this.main_image+'" class="img-fluid product-thumbnail">';
                html += '<h3 class="product-title">'+this.title+'</h3>';
                if (this.sale_price !== null && this.sale_price !== undefined && this.sale_price !== '' && this.sale_price !== false && this.sale_price !== 0) {
                    html += '<p>';
                    html += '<del style = " color: #888888; display: inline-block; margin-right: 10px;}">'+this.regular_price+'$</del>';
                    html += '<strong class="product-price">'+this.sale_price+'$</strong>';
                    html += '</p>';
                    html += '<div class="ribbon-holder">';
                    html += '<div class="ribbon sale">SALE</div>';
                    html += '<div class="ribbon new">NEW</div>';
                    html += '</div>';
                } else {
                    html += '<strong class="product-price">'+this.regular_price+'$</strong>';
                }
                html += '<span class="icon-cross">';
                html += '<img src="{{asset('furni/images/cross.svg')}}" class="img-fluid" >';
                html += '</span>';
                html += '</a>';
                html += '</div>';
                $("#products").append(html);
            });
        });
    });
});

</script>

@endsection
