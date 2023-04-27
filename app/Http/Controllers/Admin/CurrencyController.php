<?php

namespace App\Http\Controllers\Admin;
use App\Models\Currency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Currency\CreateRequest;
use App\Http\Requests\Currency\EditRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q=$request->q;
        $items=Currency::whereRaw("true");


        if($q)
        {
            $items->whereRaw('(name like ? )',["%$q%"]);
        }

        $items=$items->paginate(10)
        ->appends([
            'q'=>$q
        ]);

        return view('admin.currency.index')->with("items",$items);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.currency.create');

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
        Currency::create($data);
        Alert::success('Currency added successfully!', 'Success Message');
        return redirect (route("currency.index"));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item= Currency::find($id);
        if(!$item)
        {
            Alert::error('Invalid ID', 'Error Message');
            return redirect(route("currency.index"));

        }
        return view("admin.currency.edit",compact('item'));
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
        $item=Currency::find($id);
        $data=$request->all();

        $item->update($data);

        Alert::success('Currency Updated Successfuly!', 'Success Message');

        return redirect (route("currency.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$item) {
            Alert::error('Invalid ID', 'Error Message');

        }
        $item->delete();
        // return a success message
        Alert::success('Currency Deleted Successfuly!', 'Success Message');
        return redirect (route("currency.index"));

    }
}
