<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use App\Models\Service;
use App\Http\Requests\Service\CreateRequest;
use App\Http\Requests\Service\EditRequest;


class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $items =Service::all();
        $q = $request->q;
        $active = $request->active;
        $query = Service::where('id','>',0);
        if($active!=''){
            $query->where('active',$active);
        }

        if($q){
            $query->whereRaw('(title like ? )',["%$q%"]);
        }

        $items = $query->paginate(3)
        ->appends([
            'q'     =>$q,
            'active'=>$active
            ]);
        return view("admin.service.index",compact('items'));
    }
//--------------------------------------------
    public function create()
    {
        return view("admin.service.create");
    }
//------------------------------------------------------------------
    public function store(CreateRequest $request)
    {
        if(!isset($request['active'])){
            $request['active'] = 0;
        }

        $requestData = $request->all();
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
        Service::create($requestData);
        Alert::success('Service added successfully!', 'Success Message');

        return redirect(route("service.index"));
    }
    //-----------------------------------------------------------
    public function show($id)
    {
       $item = Service::find($id);
        if(!$item){
            session()->flash("msg","w:غير فعّال ");
            Alert::warning('Inactive', 'Warning Message');

            return redirect(route("service.index"));
        }
        return view("admin.service.show",compact('item'));
    }
    //---------------------------------------------------------------
    public function edit($id)
    {
        $item = Service::find($id);
        if(!$item){
            Alert::warning('Inactive', 'Warning Message');
            return redirect(route("service.index"));
        }
         return view("admin.service.edit")->with('item',$item);
    }
//--------------------------------------------------------------------
public function update(EditRequest $request, $id)
{
    $itemDB = Service::find($id);
    $requestData = $request->all();
    if($request->image){
        $fileName = $request->image->store("public/images");
        $imageName = $request->image->hashName();
        $requestData['image'] = $imageName;
    }
    $itemDB->update($requestData);

    Alert::success('Service updated successfully!', 'Success Message');
    return redirect(route("service.index"));
}
//--------------------------------------------------------------------
public function destroy($id)
{
    $itemDB = Service::find($id);
    $itemDB->delete();
    Alert::success('Service deleted successfully!', 'Success Message');
    return redirect(route("service.index"));
}
}
