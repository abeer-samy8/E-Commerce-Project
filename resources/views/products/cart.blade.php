@extends("layouts.frontHome")

@section("title","الصفحة الرئيسية")

@section("css")




@endsection


@section("content")

<!-- Start Hero Section -->
<!-- <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">

						</div>
					</div>
				</div>
			</div> -->
		<!-- End Hero Section -->

        @include("layouts.shared.msg")


		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post" action="{{route('post-cart')}}">
                @csrf
                <?php
                    $cartItems = json_decode(request()->cookie('cart'),true)??[];
                ?>
                <?php $total = 0 ?>
                @if(count($cartItems))

                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($cartItems as $productId=>$quantity)
                            <?php $product = \App\Models\Product::find($productId);
                                $price = $product->sale_price??$product->regular_price;
                                $total+=$price *$quantity;
                            ?>
                        <tr>
                          <td class="product-thumbnail">
                            <img src='{{asset("storage/assets/img/{$product->main_image}")}}' alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">{{$product->title}}</h2>
                          </td>
                          <td>${{$price}}</td>

                          <!-- <td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-black decrease" type="button" name='id[]'>&minus;</button>
                              </div>
                              <input type="text" name='quantity[]' class="form-control text-center quantity-amount" value="{{$quantity}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append">
                                <button class="btn btn-outline-black increase" type="button" name='id[]'>&plus;</button>
                              </div>
                            </div>
                          </td> -->

                          <td>
                          <div  style="max-width: 80px;">
                                    <input type='hidden' name='id[]' value='{{$product->id}}' />
                                    <input name='quantity[]' type="number" value="{{$quantity}}" class="form-control">
                                    </div>

                            </td>

                          <td>${{$price*$quantity}}</td>
                          <td><a href="{{route('remove-from-cart',$productId)}}" class="btn btn-black btn-sm" onclick='return confirm("Are You Sure? ")'>X</a></td>
                        </tr>
                        @endforeach


                    </tbody>
                    </table>
                </div>
            <div class="row">
                    <div class="col-md-3 mb-3 mb-md-0">
                    <button type="submit" value='1' name='refresh' class="btn btn-black btn-sm btn-block">Update Cart</button>
                    </div>
                    <div class="col-md-3">
                    <a href="{{asset('/products')}}" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>
                    </div>

                    <div class="col-md-6 mb-3 mb-md-0">
                    <div class="row">
                    <div class="col-md-12 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6">
                                <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                <strong class="text-black">${{$total}}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location=''">Proceed To Checkout</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>



            </div>
                @else
                <div class='alert alert-warning'>There are no products in the cart.</div>
                <a href="{{asset('/products')}}" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>

                @endif
                </form>
            </div>



        </div>
    </div>





@endsection
