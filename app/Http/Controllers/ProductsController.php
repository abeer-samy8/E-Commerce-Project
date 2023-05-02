<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;

class ProductsController extends Controller
{
    function index(){
        // $q = $request->q;
        $query = product::whereRaw('active=1');
        // if($q){
        //     $query->whereRaw('(title like ? or slug like ? or details like ? )',["%$q%","%$q%","%$q%"]);
        // }
        $products = $query->paginate(6)
        ->appends([
            // 'q'     =>$q
        ]);
        return view("products.index",compact('products'));
    }

    public function categories(Request $request)
    {
        $q = $request->q;
        $category=$request->category;
        $query = product::whereRaw('active=1');
        if($q){
            $query->whereRaw('(title like ? or slug like ? or details like ? )',["%$q%","%$q%","%$q%"]);
        }
        if($category){
            $query->whereIn('category_id',$category);
        }
        $products = $query->paginate(6)
        ->appends([
            'q'     =>$q,
            'category' => $category
        ]);

        // $categories= category::all();
        $categories = Category::with('products')->get();

        return view("products.categories",compact('products','categories'));

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

