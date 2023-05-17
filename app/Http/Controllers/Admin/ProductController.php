<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Currency;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\product\ProdRequest;
use App\Http\Requests\product\ProdRequestEdit;
use Illuminate\Support\Str;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\EditRequest;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//this function for status checkbox


public function activate($id)
{
    $item = Product::find($id);
    if ($item) {
        $newStatus = ($item->status === \App\Models\Product::STATUS_ACTIVE) ? \App\Models\Product::STATUS_INACTIVE : \App\Models\YourModel::STATUS_ACTIVE;
        $item->status = $newStatus;
        $item->save();
        return response()->json(['status' => 1, 'msg' => 'Updated successfully']);
    }
    return response()->json(['status' => 0, 'msg' => 'Invalid ID']);
}



    public function index(Request $request)
    {
        $q = $request->q;
        $category = $request->category;
        $store = $request->store;
        $status = $request->status;
        $query = product::whereRaw('true');
        if($status!=''){
            $query->where('status',$status);
        }
        if($category){
            $query->where('category_id',$category);
        }
        if($store){
            $query->where('store_id',$store);
        }
        if($q){
            $query->whereRaw('(title like ? or slug like ?)',["%$q%","%$q%"]);
        }

        $products = $query->paginate(8)
        ->appends([
            'q'     =>$q,
            'category'=>$category,
            'status'=>$status
        ]);

        $categories = category::all();
        $stores = store::all();
        $currencies = currency::all();

        return view("admin.product.index",compact('products','categories','stores','currencies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();
        $categories = category::all();
        $stores = store::all();
        $currencies = currency::all();

        return view("admin.product.create",compact('products','categories','stores','currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $fileName = $request->image->store("public/assets/img");
        $imageName = $request->image->hashName();
        $requestData = $request->all();
        $requestData['main_image'] = $imageName;
        $requestData['images'] = "1";

        product::create($requestData);
        return redirect()->route("product.index")->with('msg','Product added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = product::findOrFail($id);

        return view("admin.product.show",compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::findOrFail($id);
        $categories = category::all();
        $stores = store::all();
        $currencies = currency::all();

        return view("admin.product.edit",compact('product','categories','stores','currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $productDB = product::find($id);
        $request['images'] = "2";
        $requestData = $request->all();
        if($request['main_image']){
            $fileName = $request->main_image->store("public/assets/img");
            $imageName = $request->main_image->hashName();
            $requestData['main_image'] = $imageName;
            $productDB->update($requestData);
        }
        else{
            $productDB->update($requestData);

        }
        return redirect()->route("product.index")->with('msg','Product Updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = product::findOrFail($id);
        $item->delete();
        return redirect()->route("product.index")->with('msg','Product Deleted Successfuly!');
    }
}
