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
    public function index(Request $request)
    {
        $q = $request->q;
        $category = $request->category;
        $store = $request->store;
        $active = $request->active;

        $query = product::whereRaw('true');

        if($active!=''){
            $query->where('active',$active);
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
            'active'=>$active
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
        Alert::success('Product added successfully!', 'Success Message');
        return redirect(route("product.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        if(!$product){
            // Alert::warning('The address is incorrect', 'Warning Message');
            return redirect(route("product.index"));
        }
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
        $product = product::find($id);
        if(!$product){
            Alert::error('Invalid ID', 'Error Message');
            return redirect(route("product.index"));
        }

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
       // $request['slug'] = Str::slug($request['title']);
        $request['images'] = "2";
        if($request['main_image']){
            $requestData = $request->all();
            $fileName = $request->main_image->store("public/assets/img");
            $imageName = $request->main_image->hashName();
            $requestData['main_image'] = $imageName;
            $productDB->update($requestData);
        }
        else{
            product::where('id', $id)->update(array('title' => $request['title'],
                                                    'quantity'=> $request['quantity'],
                                                    'category_id'=> $request['category_id'],
                                                    'store_id'=> $request['store_id'],
                                                    'currency_id'=> $request['currency_id'],
                                                    'regular_price'=> $request['regular_price'],
                                                    'sale_price'=> $request['sale_price'],
                                                    'details'=> $request['details'],
                                                     //'slug'=> $request['slug'],
                                                    'active'=> $request['active']
                                                    ));
        }


        Alert::success('Category Updated Successfuly!', 'Success Message');
        return redirect(route("product.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::find($id);
        if (!$item) {
        Alert::error('Invalid ID', 'Error Message');
        }
        $item->delete();
        // return a success message
        Alert::success('Product Deleted Successfuly!', 'Success Message');
        return redirect (route("product.index"));

    }
}
