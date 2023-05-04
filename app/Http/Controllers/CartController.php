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

// use Pusher\Pusher;

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
        }
        else{
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
                    'user_id'=>$user->id,
                    'email'=>$user->email,
                    'phone'=>$user->customer->phone??'',
                    'mobile'=>$user->customer->mobile??'',
                    //'country_id'=>$user->customer->country_id??'',
                    'city'=>$user->customer->city??'',
                    'address'=>$user->customer->address??''
                ]);
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
                //inform all users we have new order
                $adminRole = Role::findByName('admin');
                $users = $adminRole->users;
                InformNewOrder::dispatch($users);
                //Mail::to(auth()->user()->email)->send(new MailOrderDetails($order));

                Mail::to(auth()->user()->email)->send(new OrderShipped($order));

                //event(new \App\Events\OrderCreated(auth()->user()->name));
                /*************PUSH NOTIFICATION USING PUSHER************ */
                $options = array(
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'encrypted' => true
                );
                $pusher = new Pusher(
                    env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'),
                    $options
                );
                $data['message'] = auth()->user()->name;
                $pusher->trigger('order-created', 'App\\Events\\OrderCreated', $data);
                /*************************************************** */

                session()->flash('msg','s: تمت اضافة الطلبية بنجاح سيتم التواصل معك');
                return redirect('products/cart');
            }
        }
    }
    public function cart()
    {
        //event(new App\Events\StatusLiked('Someone'));

        // $options = array(
        //     'cluster' => env('PUSHER_APP_CLUSTER'),
        //     'encrypted' => true
        // );
        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     $options
        // );
        // $data['message'] = auth()->user()->name;
        // $pusher->trigger('order-created', 'App\\Events\\OrderCreated', $data);
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
