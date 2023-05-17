<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\EditRequest;
use Session;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{

    public function index(Request $request)
    {
        $q = $request->q;
        $items = User::where('role', User::ROLE_ADMIN)
                    ->where(function($query) use ($q) {
                        $query->where('email', 'like', "%$q%")
                            ->orWhere('name', 'like', "%$q%");
                    })
                    ->paginate(10)
                    ->appends(['q' => $q]);

        return view("admin.user.index")->with('items', $items);

    }

    public function create()
    {
        return view("admin.user.create");
    }

    public function store(CreateRequest $request)
    {
        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);
        $requestData['role'] = User::ROLE_ADMIN; // تعيين دور المستخدم للقيمة المناسبة
        $user = User::create($requestData);

        return redirect()->route("user.create")->with('msg', 's:User Added successfully!');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $item = User::findOrFail($id);
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
        return redirect()->route("user.index")->with('msg','s:User Updated successfully!');
    }


    public function destroy($id)
    {
        $itemDB = User::find($id);
        $itemDB->delete();
        return redirect()->route("user.index")->with('msg','s:User Deleted successfully!');
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
        return redirect()->route("user.index")->with('msg','s:Permissions saved successfully!');
    }

}
