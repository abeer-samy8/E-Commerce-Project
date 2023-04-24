<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function store(Request $request)
    {
        $data=$request->all();
        Store::create($data);
        Alert::success('Store added successfully!', 'Success Message');
        return redirect (route("store.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= Store::find($id);
        if(!$item)
        {
            Alert::error('Invalid ID', 'Error Message');
            return redirect(route("store.index"));
        }

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
        $item= Store::find($id);
        if(!$item)
        {
            Alert::error('Invalid ID', 'Error Message');
            return redirect(route("store.index"));

        }
        return view("admin.store.edit",compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item=Store::find($id);
        $data=$request->all();

        $item->update($data);
        Alert::success('Store Updated Successfuly!', 'Success Message');
        return redirect (route("store.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Store::find($id);
        if (!$item) {
            Alert::error('Invalid ID', 'Error Message');
        }
        $item->delete();
        // return a success message
        Alert::success('Store Deleted Successfuly!', 'Success Message');
        return redirect (route("store.index"));

    }
}
