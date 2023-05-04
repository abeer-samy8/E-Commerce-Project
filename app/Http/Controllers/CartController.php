<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Jobs\InformNewOrder;
use Spatie\Permission\Models\Role;
use App\Mail\OrderDetails as MailOrderDetails;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    public function index()
    {
        return view('products.index');
    }


    public function postCart(Request $request)
    {
        if($request->refresh){
            $cartItems = [];
            for($i=0;$i<count($request->id);$i++){
                $productId = $request->id[$i];
                $quantity = $request->quantity[$i];
                $cartItems[$productId] = $quantity;
            }
            $cartItemsJsonString = json_encode($cartItems);
            Cookie::queue('cart', $cartItemsJsonString, 60*24*14);
            return back();
        }else{
            if(!auth()->check()){
                return redirect('login');
            }
            else{
                $totalPrice = 0;
                for($i=0;$i<count($request->id);$i++){
                    $productId = $request->id[$i];
                    $quantity = $request->quantity[$i];
                    $product=Product::find($productId);
                    $totalPrice+=($product->sale_price??$product->regular_price)*$quantity;
                }
                $user = auth()->user();
                $order = Order::create([
                    'customer_id'=>$user->id,
                    'order_status_id'=>1,
                    'total_price'=>$totalPrice,
                    'total_items'=>count($request->id),
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'phone'=>$user->customer->phone??'',
                    'city'=>$user->customer->city??'',
                    'address'=>$user->customer->address??''
                ]);
                // dd($user);
                for($i=0;$i<count($request->id);$i++){
                    $productId = $request->id[$i];
                    $quantity = $request->quantity[$i];
                    $product = Product::find($productId);
                    $price = ($product->sale_price??$product->regular_price);
                    $total = $price * $quantity;
                    OrderDetails::create([
                        'order_id'=>$order->id,
                        'product_id'=>$productId,
                        'price'=>$price,
                        'quantity'=>$quantity,
                        'total_price'=>$total,
                    ]);
                }
                Cookie::queue('cart', '', 60*24*14);


                Alert::success('The order has been added successfully, we will contact you', 'Success Message');

                return redirect('products/cart');
        }
    }
}

    public function cart()
    {


        return view('products.cart');
    }

    public function addToCart($id)
    {
        $cartItems = json_decode(request()->cookie('cart'),true)??[];
        if(isset($cartItems[$id]))
            $cartItems[$id] += 1;
        else
            $cartItems[$id] = 1;
        $cartItemsJsonString = json_encode($cartItems);
        Cookie::queue('cart', $cartItemsJsonString, 60*24*14);

        return back();
    }
    public function removeFromCart($id)
    {
        $cartItems = json_decode(request()->cookie('cart'),true)??[];
        unset($cartItems[$id]);
        $cartItemsJsonString = json_encode($cartItems);
        Cookie::queue('cart', $cartItemsJsonString, 60*24*14);
        return back();
    }
}
