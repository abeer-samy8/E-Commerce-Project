<?php


namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\CreateRequest;
use App\Http\Requests\Slider\EditRequest;
use App\Models\Slider;
use RealRashid\SweetAlert\Facades\Alert;

use Session;

class SliderController extends Controller
{
    function index(Request $request){
        $q = $request->q;
        $active = $request->active;

        $query = Slider::whereRaw('true');

        if($active!=''){
            $query->where('active',$active);
        }

        if($q){
            $query->whereRaw('(title like ? or slug like ?)',["%$q%","%$q%"]);
        }

        $items = $query->paginate(8)
        ->appends([
            'q'     =>$q,
            'active'=>$active
        ]);

        return view("admin.slider.index",compact('items'));
    }
    function create(){
        return view("admin.slider.create");
    }

    public function store(CreateRequest $request)
    {
        if(!isset($request['active'])){
            $request['active'] = 0;
        }
        if(!isset($request['new_window'])){
            $request['new_window'] = 0;
        }
        $requestData=$request->all();
        if($request->image){
            $fileName=$request->image->store('public/images');
            $imgeName=$request->image->hashName();
            $requestData['image']=$imgeName;
        }
        Slider::create($requestData);
        Alert::success('Slider added successfully!', 'Success Message');


        return redirect(route("slider.index"));
    }

    public function show($id)
    {

        $item = Slider::find($id);
        if(!$item){
            Alert::error('Invalid ID', 'Error Message');

            return redirect(route("slider.index"));
        }
        return view("admin.slider.show",compact('item'));
    }
    public function edit($id)
    {
        $item=Slider::find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("slider.index"));
        }
        return view("admin.slider.edit",compact('item'));
    }
    public function update(EditRequest $request, $id)
    {
        $request['active'] = isset($request['active'])?1:0;
        $request['new_window'] = isset($request['new_window'])?1:0;
        $itemDB = Slider::find($id);
        $requestData = $request->all();
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
        $itemDB->update($requestData);
        Alert::success('Slider Updated Successfully!', 'Success Message');

        return redirect(route("slider.index"));
    }
    public function destroy($id)
    {
        $itemDB=Slider::find($id);
        $itemDB->delete();
        Alert::success('Slider Deleted Successfully!', 'Success Message');

        return redirect(route("slider.index"));
    }

}
