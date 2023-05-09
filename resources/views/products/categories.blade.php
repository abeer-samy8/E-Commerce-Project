@extends("layouts.frontHome")

@section("title","Categories")

@section("css")
<!-- theme stylesheet-->
<!-- <link rel="stylesheet" href="{{asset('universal-theme/css/style.default.css')}}" id="theme-stylesheet"> -->
<!--linear icon css-->
<!-- <link rel="stylesheet" href="{{asset('universal-theme/assets/css/linearicons.css')}}"> -->

<style>
.nav-pills .nav-link {
  border-radius: 0;
}
.nav-link:focus, .nav-link:hover {
    color: black;
}

.nav-pills .nav-link:hover {
  background: white;
}

.nav-pills .nav-link.active {
  background: #4fbfa8;
}
.category-menu a.nav-link {
  text-transform: uppercase;
  letter-spacing: 0.1em;
  font-weight: 700;
}

ul ul a.nav-link {
  padding-left: 30px !important;
  font-size: 0.85rem;
  text-transform: none !important;
  font-weight: 400 !important;
  color: #777;
}

.heading.text-center h1:after, .text-center.panel-heading h1:after, .heading.text-center h2:after, .text-center.panel-heading h2:after,   .heading.text-center h4:after, .text-center.panel-heading h4:after, .heading.text-center h5:after, .text-center.panel-heading h5:after, .heading.text-center h6:after, .text-center.panel-heading h6:after {
  margin-left: auto;
  margin-right: auto;
}

.heading h1, .panel-heading h1, .heading h2, .panel-heading h2, .heading h3, .panel-heading h3, .heading h4, .panel-heading h4, .heading h5, .panel-heading h5, .heading h6, .panel-heading h6 {
    line-height: 1.1;
    display: inline-block;
    margin-bottom: 0;
    padding-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

.panel-heading {
  margin-bottom: 10px;
}

.panel-heading h3 {
  margin-top: 5px;
  color: black;
}
.heading h1:after, .panel-heading h1:after, .heading h2:after, .panel-heading h2:after, .heading h3:after, .panel-heading h3:after, .heading h4:after, .panel-heading h4:after, .heading h5:after, .panel-heading h5:after, .heading h6:after, .panel-heading h6:after {
  content: " ";
  display: block;
  width: 100px;
  height: 2px;
  margin-top: .6rem;
  background:  #4fbfa8;
}

.badge {
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  padding: 3px 5px;
}

.badge-primary {
  color: #111;
  background-color: #4fbfa8;
}

.badge-primary[href]:focus, .badge-primary[href]:hover {
  color: #111;
  text-decoration: none;
  background-color: #3aa18c;
}

.badge-secondary {
  color: #fff;
  background-color: #868e96;
}

.badge-secondary[href]:focus, .badge-secondary[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #6c757d;
}

.badge-success {
  color: #fff;
  background-color: #28a745;
}

.badge-success[href]:focus, .badge-success[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #1e7e34;
}

.badge-info {
  color: #fff;
  background-color: #17a2b8;
}

.badge-info[href]:focus, .badge-info[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #117a8b;
}

.badge-warning {
  color: #111;
  background-color: #ffc107;
}

.badge-warning[href]:focus, .badge-warning[href]:hover {
  color: #111;
  text-decoration: none;
  background-color: #d39e00;
}

.badge-danger {
  color: #fff;
  background-color: #dc3545;
}

.badge-danger[href]:focus, .badge-danger[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #bd2130;
}

.badge-light {
  color: #111;
  background-color: #f8f9fa;
}

.badge-light[href]:focus, .badge-light[href]:hover {
  color: #111;
  text-decoration: none;
  background-color: #dae0e5;
}

.badge-dark {
  color: #fff;
  background-color: #343a40;
}

.badge-dark[href]:focus, .badge-dark[href]:hover {
  color: #fff;
  text-decoration: none;
  background-color: #1d2124;
}
.sidebar-menu .badge {
  font-weight: 700;
  margin: 0;
}

</style>
@endsection

@section('content')
	<!-- Start Hero Section -->
    <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Categories</h1>
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
                <h3 class="h4 panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                <ul class="nav nav-pills flex-column text-sm category-menu">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <div class="d-flex justify-content-start align-items-center">
                        <!-- checkbox input and label for filtering -->
                        <!-- <input type="checkbox" id="category_{{ $category->id }}" name="category[]" value="{{ $category->id }}" {{ in_array($category->id, request()->get('category') ?? []) ? 'checked' : '' }}> -->
                        <label for="category_{{ $category->id }}" class="w-100">
                            <!-- category link with name and product count -->
                            <a class="nav-link d-flex align-items-center justify-content-between" id='category' name='category' data-category-id="{{ $category->id }}">
                            <span style='color: #198754 !important;'>{{ $category->name }}</span>
                            <span class="badge badge-secondary">{{ $category->products()->count() }}</span>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function(){
    $(".category-menu li").click(function(){
        var categoryId = $(this).find(".nav-link").data("category-id");
        $.get("/category-products/"+categoryId,function(json){
            $("#products").html(""); // clear existing products
            $(json).each(function(){
                var html = '<div class="col-12 col-md-4 col-lg-4 mb-5 mb-md-0">';
                html += '<a class="product-item" href="{{route('add-to-cart',$product->id)}}">';
                html += '<img src="{{asset("storage/assets/img/")}}/'+this.main_image+'" class="img-fluid product-thumbnail">';
                html += '<h3 class="product-title">'+this.title+'</h3>';
                if (this.sale_price == '') {
                    html += '<strong class="product-price">'+this.regular_price+'$</strong>';
                } else {
                    html += '<p>';
                    html += '<del style = " color: #888888; display: inline-block; margin-right: 10px;}">'+this.regular_price+'$</del>';
                    html += '<strong class="product-price">'+this.sale_price+'$</strong>';
                    html += '</p>';
                    html += '<div class="ribbon-holder">';
                    html += '<div class="ribbon sale">SALE</div>';
                    html += '<div class="ribbon new">NEW</div>';
                    html += '</div>';
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
