<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Customer::join("users","user_id","users.id")
            ->where('email','like',"%$q%")
            ->orWhere('name','like',"%$q%")
            ->select("customers.*","users.name","users.email")
            ->paginate(10)
            ->appends(['q'=>$q]);
        return view("admin.customer.index")->with('items',$items);
        



    }

    public function show($id)
    {
    $item = Customer::find($id);
        if(!$item){
            Alert::warning('Invalid ID', 'Warning Message');

            return redirect(route("customer.index"));
        }
        // $users = User::get();
        // return view("customer.show",compact('item','users'))->with("item",$item);
        return view("admin.customer.show",compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemDB = Customer::find($id);
        if($itemDB->orders->count()>0){
            Alert::error('The customer cannot be deleted because he has orders.', 'Error Message');

            return redirect(route("customer.index"));
        }
        $itemDB->delete();
        Alert::success('Deleted Successfuly!', 'Success Message');

        return redirect(route("customer.index"));
    }
}
