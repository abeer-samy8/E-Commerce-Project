<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\Store;
use App\Models\BillingDetails;

class ProductsController extends Controller
{
    function index(){
      //  $q = $request->q;
        $query = product::whereRaw('active=1');
       // if($q){
     //   $query->whereRaw('(title like ? or slug like ? or details like ? )',["%$q%","%$q%","%$q%"]);
       // }
        $products = $query->paginate(6)
        ->appends([
       //     'q'     =>$q
        ]);
        return view("products.index",compact('products'));
    }


    public function categoryProducts($id){
        $products = Product::where('category_id',$id)->get();
        return $products;

    }


    public function categories(Request $request)
{
    $q = $request->q;
    $categoryId = $request->category;
    $query = Product::where('active', 1);
    if ($q) {
        $query->whereRaw('(title like ? or slug like ? or details like ? )', ["%$q%", "%$q%", "%$q%"]);
    }
    if ($categoryId) {
        $query->where('category_id', $categoryId);
    }

    $products = $query->paginate(6)
        ->appends([
            'q' => $q,
            'category' => $categoryId
        ]);

    $categories = Category::with('products')->get();

    return view("products.categories", compact('products', 'categories'));
}


public function storeProducts($id){
    $stores = Store::where('store_id',$id)->get();
    return $stores;

}


public function stores(Request $request)
{
$q = $request->q;
$storeId = $request->store;
$query = Product::where('active', 1);
if ($q) {
    $query->whereRaw('(title like ? or slug like ? or details like ? )', ["%$q%", "%$q%", "%$q%"]);
}
if ($storeId) {
    $query->where('store_id', $categoryId);
}

$products = $query->paginate(6)
    ->appends([
        'q' => $q,
        'store' => $storeId
    ]);

$stores = Store::with('products')->get();

return view("products.stores", compact('products', 'stores'));
}





    public function details($slug)
    {
        $product=Product::where ('products.slug',$slug)
        ->where('active',1)
        ->first();
        if(!$product){
            session()->flash("msg","e: الرابط المطلوب غير موجود");
            return redirect(asset('products'));
        }
        return view('products.details',compact('product'));
    }




}
