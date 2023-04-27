<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\EditRequest;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q=$request->q;
        $active=$request->active;
        $items=Category::whereRaw("true");

        if($active)
        {
            $items->where("active",$active); //"active" اسم العمود
        }
        if($active=="0")
        {
            $items->where("active",$active);
        }
        if($q)
        {
            $items->whereRaw('(name like ? )',["%$q%"]);
        }

        $items=$items->paginate(10)
        ->appends([
            'q'=>$q,
            'active'=>$active
        ]);

        return view('admin.category.index')->with("items",$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data=$request->all();
        Category::create($data);
        Alert::success('Category added successfully!', 'Success Message');
        return redirect (route("category.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= Category::find($id);
        if(!$item)
        {
            return redirect(route("category.index"));
        }

        return view("admin.category.show",compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Category::find($id);
        if(!$item)
        {
            Alert::error('Invalid ID', 'Error Message');
            return redirect(route("category.index"));

        }
        return view("admin.category.edit",compact('item'));
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
        $item=Category::find($id);
          $data=$request->all();
          if($request['active']==1){
            $data['active']=1;
          }
          else{
            $data['active']=0;
          }

          $item->update($data);

          Alert::success('Category Updated Successfuly!', 'Success Message');

          return redirect (route("category.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::find($id);
        if (!$item) {
            Alert::error('Invalid ID', 'Error Message');

        }
        $item->delete();
        // return a success message
        Alert::success('Category Deleted Successfuly!', 'Success Message');
        return redirect (route("category.index"));

    }



}
