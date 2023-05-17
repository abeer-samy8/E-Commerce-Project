<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


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

        $items = Customer::with('user')
            ->whereHas('user', function ($query) use ($q) {
                $query->where('email', 'like', "%$q%")
                    ->orWhere('name', 'like', "%$q%");
            })
            ->paginate(10)
            ->appends(['q' => $q]);

        return view("admin.customer.index")->with('items', $items);





    }

    public function show($id)
    {
        $item = Customer::findOrFail($id);
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
        $itemDB = Customer::findOrFail($id);
        $itemDB->delete();
        return redirect()->route("customer.index")->with('msg','Customer Deleted successfully!');


    }

}
