<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;

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
    if ($request->ajax()) {
        $category = Category::find($request->category);
        $categoryProducts = $category ? $category->products : [];

        return view('products.category-products', compact('categoryProducts'))->render();
    }

    $products = $query->paginate(6)
        ->appends([
            'q' => $q,
            'category' => $categoryId
        ]);

    $categories = Category::with('products')->get();


    return view("products.categories", compact('products', 'categories'));
}



// public function getProductsByCategoryId($id)
// {
//     $products = Product::where('category_id', $id)->get();
//     return response()->json($products);
// }



// public function showCategory($categoryId)
// {
//     $category = Category::find($categoryId);
//     $products = $category->products()->paginate(6);

//     return view("products.category", compact('category','products'));
// }

public function getProductsByCategory($categoryId)
{
    $products = Product::where('category_id', $categoryId)->paginate(6);
    return response()->json([
        'products' => $products->toArray(),
        'pagination' => (string) $products->links()
    ]);
}


// public function categories(Request $request)
// {
//     $q = $request->q;
//     $categoryId = $request->category;
//     $query = Product::where('active', 1);
//     if ($q) {
//         $query->whereRaw('(title like ? or slug like ? or details like ? )', ["%$q%", "%$q%", "%$q%"]);
//     }
//     if ($categoryId) {
//         $query->where('category_id', $categoryId);
//     }
//     $products = $query->paginate(12);
//     $categories = Category::all();
//     $selectedCategory = null;
//     if ($categoryId) {
//         $selectedCategory = Category::find($categoryId);
//     }
//     return view('categories', compact('products', 'categories', 'selectedCategory'));
// }

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

