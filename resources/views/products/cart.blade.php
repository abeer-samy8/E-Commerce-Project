@extends("layouts.frontHome")

@section("title","الصفحة الرئيسية")

@section("css")




@endsection


@section("content")

<!-- Start Hero Section -->
<div class="hero">
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
			</div>
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
            <div class="row" style='padding:20px'>
                    <div class="col-md-3 mb-3 mb-md-0" >
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
                                <button class="btn btn-black btn-lg py-3 btn-block">Proceed To Checkout</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
            </div>
                @else

                <div class='text-center' style='padding:30px 0;'>
                <span class="display-3 thankyou-icon text-primary">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart-check mb-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                </span>
                <h2 class="display-3 text-black">Your cart is empty!</h2>
                <p>Add items to it now.</p>
                <a href="{{asset('/products')}}" class="btn btn-outline-black btn-sm btn-block">Shop Now</a>
                </div>
                @endif
                </form>
            </div>



        </div>
    </div>





@endsection
