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


class CartController extends Controller
{
    public function cart(){

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
}
