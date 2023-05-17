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
        $status = $request->status;
        $query = Service::where('id','>',0);
        if($status!=''){
            $query->where('status',$status);
        }

        if($q){
            $query->whereRaw('(title like ? )',["%$q%"]);
        }

        $items = $query->paginate(3)
        ->appends([
            'q'     =>$q,
            'status'=>$status
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
        if(!isset($request['status'])){
            $request['status'] = Service::STATUS_INACTIVE;
        }

        $requestData = $request->all();
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
        Service::create($requestData);

        return redirect()->route("service.index")->with('msg', 'Service added successfully!');


    }
    //-----------------------------------------------------------
    public function show($id)
    {
        $item = Service::findOrFail($id);
        return view("admin.service.show",compact('item'));
    }
    //---------------------------------------------------------------
    public function edit($id)
    {
        $item = Service::findOrFail($id);

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
    if ($request->status === Service::STATUS_ACTIVE) {
        $requestData['status'] = Service::STATUS_ACTIVE;
    } else {
        $requestData['status'] = Service::STATUS_INACTIVE;
    }
    $itemDB->update($requestData);
    return redirect()->route("service.index")->with('msg', 'Service updated successfully!');

}
//--------------------------------------------------------------------
public function destroy($id)
{
    $itemDB = Service::findOrFail($id);
    $itemDB->delete();
    return redirect()->route("service.index")->with('msg', 'Service deleted successfully!');
}
}
