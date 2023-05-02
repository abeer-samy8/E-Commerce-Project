@extends("layouts.frontHome")

@section("title","الصفحة الرئيسية")

@section("css")
<!-- theme stylesheet-->
<link rel="stylesheet" href="{{asset('universal-theme/css/style.default.css')}}" id="theme-stylesheet">
<!--linear icon css-->
<!-- <link rel="stylesheet" href="{{asset('universal-theme/assets/css/linearicons.css')}}"> -->

@endsection

@section('content')

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
                        <input type="checkbox" id="category_{{ $category->id }}" name="category[]" value="{{ $category->id }}" {{ in_array($category->id, request()->get('category') ?? []) ? 'checked' : '' }}>
                        <label for="category_{{ $category->id }}" class="w-100">
                            <!-- category link with name and product count -->
                            <a href="{{ asset('products?category[]=' . $category->id) }}" class="nav-link d-flex align-items-center justify-content-between">
                            <span style='color: #198754 !important;'>{{ $category->name }}</span>
                            <span class="badge badge-secondary">{{ $category->products()->count() }}</span>
                            </a>
                        </label>
                        </div>
                        <!-- nested list of products for this category -->
                        <ul class="nav nav-pills flex-column">
                        @foreach ($category->products as $product)
                            <li class="nav-item">
                            <a href="" class="nav-link">{{ $product->title }}</a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    @endforeach


                </ul>
                </div>
            </div>


            </div>
            <div class="col-md-9">
            <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>
            @if($products->count()>0)
            <div class="row products products-big">
                @foreach($products as $product)
                <div class="col-12 col-md-4 col-lg-4 mb-5 mb-md-0">
						<a class="product-item" href="#">
							<img src='{{asset("storage/assets/img/{$product->main_image}")}}' class="img-fluid product-thumbnail">
							<h3 class="product-title">{{$product->title}}</h3>
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
                            <img src="{{asset('furni/images/cross.svg')}}" class="img-fluid">
							</span>
						</a>
				</div>
                @endforeach


            </div>

            <div class=" text-center" style=' padding: 15px; text-align: center;' >
            {{ $products->links() }}
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
