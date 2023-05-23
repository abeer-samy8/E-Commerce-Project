<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\BillingDetails;
use App\Jobs\InformNewOrder;
use App\Mail\OrderDetails as MailOrderDetails;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewCustomerOrder;
use App\Mail\NewOrderNotification;
class CartController extends Controller
{

    public function index()
    {
        return view('products.index');
    }


    public function postCart(Request $request) {
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
                $totalPrice = 0;
                for($i=0;$i<count($request->id);$i++){
                    $productId = $request->id[$i];
                    $quantity = $request->quantity[$i];
                    $product=Product::find($productId);
                    $totalPrice+=($product->sale_price??$product->regular_price)*$quantity;
                }
                if(!auth()->check()){
                    return redirect('login');
                }

                $user = auth()->user();
                $orderData = [
                    'customer_id' => $user->id,
                    'order_status' => Order::STATUS_NEW,
                    'total_price' => $totalPrice,
                    'total_items' => count($request->id),
                    'name' => $user->name,
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'phone' => $user->customer->phone ?? '',
                    'mobile' => $user->customer->mobile ?? '',
                    'city' => $user->customer->city ?? '',
                    'address' => $user->customer->address ?? '',
                ];

                $orderDetailsData = [];
                for ($i = 0; $i < count($request->id); $i++) {
                    $productId = $request->id[$i];
                    $quantity = $request->quantity[$i];
                    $product = Product::find($productId);
                    $price = ($product->sale_price ?? $product->regular_price);
                    $total = $price * $quantity;
                    $orderDetailsData[] = [
                        'product_id' => $productId,
                        'price' => $price,
                        'quantity' => $quantity,
                        'total_price' => $total,
                    ];
                }
                session(['orderData' => $orderData]);
                session(['orderDetailsData' => $orderDetailsData]);
                return redirect()->route('checkout');

    }

}




    public function cart(){
        return view('products.cart');
    }

    public function addToCart($id){
        $cartItems = json_decode(request()->cookie('cart'),true)??[];
        if(isset($cartItems[$id]))
            $cartItems[$id] += 1;
        else
            $cartItems[$id] = 1;
        $cartItemsJsonString = json_encode($cartItems);
        Cookie::queue('cart', $cartItemsJsonString, 60*24*14);

        return back();
    }



    public function removeFromCart($id){
        $cartItems = json_decode(request()->cookie('cart'),true)??[];
        unset($cartItems[$id]);
        $cartItemsJsonString = json_encode($cartItems);
        Cookie::queue('cart', $cartItemsJsonString, 60*24*14);
        return back();
    }

    public function check(){
        $bills = BillingDetails::all();
        return view("products.checkout", compact('bills'));
    }

    public function checkout(Request $request){
            $requestData=$request->all();
            BillingDetails::create($requestData);

            $orderData = session('orderData');
            $orderDetailsData = session('orderDetailsData');
            $order = Order::create($orderData);
            foreach ($orderDetailsData as $orderDetailData) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $orderDetailData['product_id'],
                    'price' => $orderDetailData['price'],
                    'quantity' => $orderDetailData['quantity'],
                    'total_price' => $orderDetailData['total_price'],
                ]);
            }
            session()->forget(['orderData', 'orderDetailsData']);

            Cookie::queue('cart', '', 60*24*14);

            $order = $request->all();

            // Mail::to('admin@aa.net')->send(new NewOrderNotification($order));



                $admins = User::where('role', 'admin')->get();
                foreach ($admins as $admin) {
                    $adminEmail = $admin->email;
                    Mail::to($adminEmail)->send(new NewOrderNotification($order));
                }

            return redirect('thankyou');
    }

    public function thankyou(){
        return view("products.thankyou");
    }


}
