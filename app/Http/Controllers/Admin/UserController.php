<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelHasRole;

use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use Spatie\Permission\Models\Role;
use Session;
use RealRashid\SweetAlert\Facades\Alert;


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
        $user = User::create($requestData);
      //  $user->assignRole('admin');
       $role= new ModelHasRole;
       $role->role_id=1;
       $role->model_type='App\Models\User';
       $role->model_id=$user->id;
       $role->save();
    Alert::success('User Added successfully!', 'Success Message');

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
            Alert::warning('Incorrect user address', 'Warning Message');

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

        Alert::success('User Updated successfully!', 'Success Message');
        return redirect(route("user.index"));
    }


    public function destroy($id)
    {
        $itemDB = User::find($id);
        $itemDB->delete();
        Alert::success('User Deleted successfully!', 'Success Message');
        return redirect(route("user.index"));
    }




    public function links($id)
    {
        $item = User::find($id);
        if(!$item){
            Alert::error('Incorrect user address', 'Error Message');

            return redirect(route("user.index"));
        }
        $links = \App\Models\Link::all();
        return view("admin.user.links",compact('item','links'));
    }


    public function postLinks($id,Request $request)
    {
        \DB::table("users_links")->where('user_id',$id)->delete();//روح ع الجدول هادا وكل اللينكات تحت هاد اليوزر يطيرها
        if($request->links){
            foreach($request->links as $link){
                \DB::table("users_links")->insert([
                    'link_id'=>$link,
                    'user_id'=>$id,
                    'created_at'=>new \DateTime()
                ]);
            }
        }
        Alert::success('Permissions saved successfully!', 'Success Message');
        return redirect(route("user.index"));
    }

}
