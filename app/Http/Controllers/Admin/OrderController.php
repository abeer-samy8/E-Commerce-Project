<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    function index(Request $request)
{
    $q = $request->q;
    $id = $request->id;
    $order_status = $request->order_status; // تغيير اسم المتغير إلى order_status

    $query = Order::whereRaw('true');

    if ($order_status) {
        $query->where('order_status', $order_status); // تحديث اسم الحقل إلى order_status
    }

    if ($id) {
        $query->where('id', $id);
    }

    if ($q) {
        $query->whereRaw('(name like ? or address like ?)', ["%$q%", "%$q%"]);
    }

    $orders = $query->orderBy('id', 'desc')->paginate(8)
        ->appends([
            'q' => $q,
            'id' => $id,
            'order_status' => $order_status, // تحديث اسم المتغير هنا أيضًا
        ]);

    $status = [
        'STATUS_NEW' => 'New',
        'STATUS_IN_PROGRESS' => 'In progress',
        'STATUS_SENDED' => 'Sended',
        'STATUS_DELIVERED' => 'Delivered',
        'STATUS_CANCELED' => 'Canceled'
    ]; // تعريف حالات الطلب كمصفوفة مفتاح/قيمة بدلاً من النمط الثابت السابق

    return view("admin.order.index", compact('orders', 'status'));
}



public function show($id)
{
    $order = Order::findOrFail($id);
    $orderStatuses = [
        Order::STATUS_NEW => 'New',
        Order::STATUS_IN_PROGRESS => 'In progress',
        Order::STATUS_SENDED => 'Sended',
        Order::STATUS_DELIVERED => 'Delivered',
        Order::STATUS_CANCELED => 'Canceled',
    ];

    return view("admin.order.show",compact('order','orderStatuses'));
}


    public function destroy($id)
    {
        $itemDB=Order::findOrFail($id);
        $itemDB->delete();
        return redirect()->route("order.index")->with('msg','Order Deleted successfully!');

    }


    public function updateStatus ($id, Request $request)
    {
        $status = $request->status;
        $itemDB = Order::find($id);
        if ($itemDB) {
            $itemDB->order_status = $status;
            $itemDB->save();
        }
        return redirect()->route("order.index")->with('msg','Status updated successfully!');

    }

}
