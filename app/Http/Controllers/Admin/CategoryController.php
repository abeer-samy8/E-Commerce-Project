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

        $q = $request->q;
        $status = $request->status;
        $items = Category::whereRaw("true");

        if ($status) {
            $items->where("status", $status);
        }

        if ($q) {
            $items->whereRaw('(name LIKE ?)', ["%$q%"]);
        }

        $items = $items->paginate(10)->appends([
            'q' => $q,
            'status' => $status
        ]);

        return view('admin.category.index')->with("items", $items);

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
        return redirect()->route("category.index")->with('msg','Category added successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Category::findOrFail($id);
        return view("admin.category.show", compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Category::findOrFail($id);
        return view("admin.category.edit", compact('item'));

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
        $item = Category::find($id);
        $data = $request->all();
        if ($request->status === Category::STATUS[0]) {
            $data['status'] = Category::STATUS[0];
        } else {
            $data['status'] = Category::STATUS[1];
        }
        $item->update($data);
        return redirect()->route("category.index")->with('msg', 'Category Updated Successfully!');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();
        session()->flash('msg','s:Category Deleted Successfully!');
        return redirect()->route("category.index")->with('msg','s:Category Deleted Successfully!');



    }



}
