@extends("layouts.admin")
@section("title", " Order Detail")
@section("title-side")

@endsection

@section("content")


<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class='row'>
    <div class='col-sm-3'>
    Name:
    </div>
    <div class='col-sm-3'>
    <b>{{$order->name}}</b>
    </div>
</div>
<div class='row'>
    <div class='col-sm-3'>
    Phone:
    </div>
    <div class='col-sm-3'>
    <b>{{$order->phone}}</b>
    </div>
    <div class='col-sm-3'>
    Address:
    </div>
    <div class='col-sm-3'>
    <b>{{$order->address}}</b>
    </div>
</div>
<div class='row'>
    <div class='col-sm-3'>
    City:
    </div>
    <div class='col-sm-3'>
    <b>{{$order->city}}</b>
    </div>
    <div class='col-sm-3'>
    Order Date
    </div>
    <div class='col-sm-3'>
    <b>{{$order->created_at}}</b>
    </div>
</div>

<div class='row'>
    <div class='col-sm-3'>
    Order Status:
    </div>
    <form method='POST' action='{{route("order.updateStatus",$order->id)}}' class='col-sm-3'>
        @csrf
        <div class='row'>
        <div class='col-sm-8'>
    <select class='form-control' name='status'>
        @foreach($orderStatuses as $orderStatusKey => $orderStatusValue)
            <option {{$orderStatusKey == $order->order_status ? "selected" : ""}} value='{{$orderStatusKey}}'>{{$orderStatusValue}}</option>
        @endforeach
    </select>
</div>


            <div class='col-sm-4'>
                <button class='btn btn-primary'>حفظ</button>
            </div>
        </div>
    </form>


</div>
<hr>

            <div class="row">
                <div class="col-sm-12">

                    <table
                        class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline"
                        id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1150px;">
                        <thead>
                            <tr role="row">
                                <th>Product Name</th>
                                <th>Price </th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0 ?>
                        @foreach($order->orderItems as $item)
                            <?php $total+=$item->total_price ?>
                            <tr role="row" class="odd">

                                <td>{{ $item->product['title']}}</td>
                                <td>{{ $item->price??''}}</td>
                                <td>{{ $item->quantity??'' }}</td>
                                <td>{{ $item->total_price??'' }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class='text-right'>
                                <b>Total Price</b>
                                </th>
                                <th>
                                    <b>{{$total}}</b>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    <a class='btn btn-info' href='{{route("order.index")}}'>Back To Order</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
