<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use Spatie\Permission\Models\Role;

use Session;


class UserController extends Controller
{

    public function index(Request $request)
    {

        $q = $request->q;
        
        $adminRole = Role::findByName('admin');
        $items = $adminRole->users()->whereRaw('(email like ? or name like ?)',["%$q%","%$q%"])
            ->paginate(10)
            ->appends(['q'=>$q]);

        return view("admin.user.index")->with('items',$items);
    }

    public function create()
    {
        return view("admin.user.create");
    }

    public function store(CreateRequest $request)
    {
        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);
        //$requestData['images']=json_encode($imageArrayNames);
        $user = User::create($requestData);
        $user->assignRole('admin');
        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect(route("user.create"));
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $item = User::find($id);
        if(!$item){
            session()->flash("msg","e:عنوان المستخدم غير صحيح");
            return redirect(route("user.index"));
        }
        return view("admin.user.edit",compact('item'));
    }

    public function update(EditRequest $request, $id)
    {
        $user = User::find($id);
        $requestData = $request->all();
        if($request->password){
            $requestData['password'] = bcrypt($requestData['password']);
        }
        else{
            unset($requestData['password']);
        }
        $user->update($requestData);

        session()->flash("msg","s:تم تعديل بيانات المستخدم بنجاح");
        return redirect(route("user.index"));
    }


    public function destroy($id)
    {
        $itemDB = User::find($id);
        $itemDB->delete();
        session()->flash("msg","w:تم حذف المستخدم بنجاح");
        return redirect(route("user.index"));
    }
    public function links($id)
    {
        $item = User::find($id);
        if(!$item){
            session()->flash("msg","e:عنوان المستخدم غير صحيح");
            return redirect(route("user.index"));
        }
        $links = \App\Models\Link::all();
        return view("admin.user.links",compact('item','links'));
    }
    public function postLinks($id,Request $request)
    {
        \DB::table("users_links")->where('user_id',$id)->delete();
        if($request->links){
            foreach($request->links as $link){
                \DB::table("users_links")->insert([
                    'link_id'=>$link,
                    'user_id'=>$id,
                    'created_at'=>new \DateTime()
                ]);
            }
        }
        session()->flash("msg","s:تم حفظ الصلاحيات بنجاح");
        return redirect(route("user.index"));
    }
}
