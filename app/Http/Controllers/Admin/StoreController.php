<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Store\CreateRequest;
use App\Http\Requests\store\EditRequest;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q=$request->q;
        $items=Store::whereRaw("true");
        if($q)
        {
            $items->whereRaw('(name like ? )',["%$q%"]);
        }
        $items=$items->paginate(10)
        ->appends([
            'q'=>$q,
        ]);

        return view('admin.store.index')->with("items",$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.store.create');

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
        Store::create($data);
        return redirect()->route("store.index")->with('msg','s:Store added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= Store::findOrFail($id);
        return view("admin.store.show",compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Store::findOrFail($id);
        return view("admin.store.edit",compact('item'));
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
        $item=Store::find($id);
        $data=$request->all();
        $item->update($data);
        return redirect()->route("store.index")->with('msg','s:Store Updated Successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Store::findOrFail($id);
        $item->delete();
        return redirect()->route("store.index")->with('msg','s:Store Deleted Successfuly!');;


    }
}
