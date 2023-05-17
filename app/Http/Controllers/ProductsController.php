<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\Store;
use App\Models\BillingDetails;

class ProductsController extends Controller
{
    function index(Request $request){
        $q = $request->q;
        $status = Product::STATUS_ACTIVE;
        $query = Product::where('status', $status);

        if ($q) {
            $query->whereRaw('(title LIKE ? OR slug LIKE ? OR details LIKE ?)', ["%$q%", "%$q%", "%$q%"]);
        }

        $products = $query->paginate(6)->appends([
            'q' => $q
        ]);

        return view("products.index", compact('products'));
        }

        public function search(Request $request)
        {
            $query = $request->input('query');
            $status = Product::STATUS_ACTIVE;
            $products = Product::where('title', 'LIKE', '%' . $query . '%')->where('status', $status)->get();
            return view('products.index', ['products' => $products]);
        }


    public function categoryProducts($id){
        $products = Product::where('category_id',$id)->get();
        return $products;

    }


    public function categories(Request $request)
{
    $q = $request->q;
    $categoryId = $request->category;
    $status = Product::STATUS_ACTIVE;
    $query = Product::where('status', $status);
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
    // $stores = Store::where('store_id',$id)->get();
    $stores = \DB::table('products')->where('store_id',$id)->get();

    return $stores;

}


public function stores(Request $request)
{
$storeId = $request->store;
$status = Product::STATUS_ACTIVE;
$query = Product::where('status', $status);
if ($storeId) {
    $query->where('store_id', $storeId);
}

$products = $query->paginate(6)
    ->appends([
        'store' => $storeId
    ]);

$stores = Store::with('products')->get();

return view("products.stores", compact('products', 'stores'));
}





    public function details($slug)
    {
        $product = Product::where('products.slug', $slug)
    ->where('status', Product::STATUS_ACTIVE)
    ->first();

if (!$product) {
    session()->flash("msg", "e: الرابط المطلوب غير موجود");
    return redirect(asset('products'));
}

return view('products.details', compact('product'));





}
}
