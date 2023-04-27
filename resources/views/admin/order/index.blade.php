@extends('layouts.admin')
@section('title','Orders Management')



@section("content")
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__body">
        <form>
            <div class='row mb-3'>
            <div class='col-2'>
                    <input name='id' id='id' value='{{request()->id}}' autofocus type="text" class='form-control  p-4'
                        placeholder="Order Number.." />
                </div>
                <div class='col-4'>
                    <input name='q' id='q' value='{{request()->q}}' autofocus type="text" class='form-control  p-4'
                        placeholder="Search Here..." />
                </div>
                <div class='col-3'>
                <select name='order_status_id' id='order_status_id' class='form-control '>
                        <option value=''>Order Status</option>
                        @foreach($status as $statu)
            <option value="{{$statu->id}}" {{request()->order_status_id==$statu->id ? "selected":"" }}>{{$statu->name}}</option>
            @endforeach
                    </select>
                </div>

                <div class='col-3'>
                    <input type="submit" class='btn btn-primary mr-2' value='Search' />
                    <input type="submit" class='btn btn-secondary' value='Clear'
                        onclick="document.getElementById('id').value = ''; document.getElementById('q').value = ''; document.getElementById('order_status_id').value = ''; return true;" />
                </div>
            </div>
        </form>
        <!--begin: Datatable -->
        @if($orders->count()>0)
        <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped- table-bordered table-hover">
                        <thead>
                            <tr role="row">
                                <th>
                                    #
                                </th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Order Status</th>
                                <th>Total Price</th>
                                <th>Total Quantity</th>
                                <th>Order Date</th>
                                <th >Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr role="row" class="odd">
                            <td width="5%">
                                <b>{{$order->id}}</b>
                                </td>
                                <td>{{$order->name}}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{$order->orderStatus->name??''}}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->total_items}}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('order.show',$order->id)}}" title="Show"><i
                                            class="la la-eye"></i> </a>

                                            <a class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only"
                                        href="{{route('order.delete',$order->id)}}"
                                        onclick="return confirm('Are you sure to  delete{{$order->name}} ?')" title="delete"><i
                                            class="la la-remove"></i> </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info"> There are no results in the search... </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
