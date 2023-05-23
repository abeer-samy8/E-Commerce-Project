<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use DB;
use App\Http\Controllers\Controller;
class ProductsController extends Controller
{
    function search(Request $request){
        $q = $request->q;
        $category=$request->category;
        $status = Product::STATUS_ACTIVE;
        $query = Product::where('status', $status);        if($q){
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

        return $products;
    }

    function details($id){
        $item = Product::find($id);
        if(!$item){
            return response()->json(['status'=>0,'msg'=>'Invalid Product Id']);
        }
        return response()->json(['status'=>1,'item'=>$item]);
    }
}
